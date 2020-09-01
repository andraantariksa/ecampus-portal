<?php

namespace App\Controllers;

use App\Models\DocumentModel;
use App\Models\DocumentUploadModel;
use \Parsedown;

class DocumentController extends CustomBaseController
{

    protected DocumentModel $document_model;
    protected DocumentUploadModel $document_upload_model;
    protected Parsedown $parsedown;

    public function __construct()
    {
        $this->document_model = new DocumentModel();
        $this->document_upload_model = new DocumentUploadModel();
        $this->parsedown = new Parsedown();

        helper('Misc');
    }

    public function index()
    {
        $list = $this->document_model->orderBy('updated_at')->get()->getResultArray();
        return $this->view('document/list', [
            'list_data' => $list
        ]);
    }

    public function single($id)
    {
        $document = $this->document_model->getWhere([
            'id' => $id
        ])->getFirstRow();

        if (!$document) {
            return $this->errorNotFound();
        }

        $data = [
            'title' => $document->title,
            'thumbnail_url' => $document->thumbnail_url,
            'description' => $this->parsedown->text($document->description),
            'url' => $document->url,
            'document_upload_id' => $document->document_upload_id
        ];

        return $this->view('document/single', $data);
    }

    public function new()
    {
        return $this->view('document/new');
    }

    public function create()
    {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $url = nullOnEmpty($_POST['url']);
        $thumbnail_url = nullOnEmpty($_POST['thumbnail_url']);

        $data_to_insert = [
            'title' => $title,
            'description' => $description,
            'url' => $url,
            'thumbnail_url' => $thumbnail_url,
        ];

        $file = $this->request->getFile('document_upload');
        if ($file) {
            $file->move(WRITEPATH . 'uploads');
            $this->document_upload_model->insert([
                'filename' => $file->getName()
            ]);

            $data_to_insert['document_upload_id'] = $this->document_upload_model->getInsertID();
        }

        $this->document_model->insert($data_to_insert)->resultID;

        return redirect(base_url("document/id/" . $this->document_model->getInsertID()));
    }

    public function download($id)
    {
        $document_upload = $this->document_upload_model->getWhere([
            'id' => $id
        ])->getFirstRow();

        if (!$document_upload) {
            return $this->view("document/error_download", [
                "message" => "No such document exists"
            ]);
        }

        $filename = $document_upload->filename;
        $filepath = WRITEPATH . "uploads/" . $filename;
        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            readfile($filepath);
        } else {
            return $this->view("document/error_download", [
                "message" => "File was missing from the server.\nPlease contact us immediately and give us these information \"File id = '${id}', filename = '${filename}'\""
            ]);
        }
    }

}
