<?php namespace App\Controllers;

use App\Models\FAQModel;
use CodeIgniter\Controller;

class FAQController extends Controller
{
    protected FAQModel $faq_model;
    protected \Parsedown $parsedown;

    public function __construct()
    {
        $this->faq_model = new FAQModel();
        $this->parsedown = new \Parsedown();
    }

    public function page($page = 0)
    {
        $data = [
            'faq_list' => $this->faq_model->paginate(5),
            'faq_pager' => $this->faq_model->pager
        ];

        return view('faq', $data);
    }

    public function single($id)
    {
        $faq = $this->faq_model->getWhere([
            'id' => $id
        ])->getFirstRow();

        if (!$faq)
        {
            return view('errors/html/error_404');
        }

        $data = [
            'thumbnail_url' => $faq->thumbnail_url,
            'question_en' => $faq->question_en,
            'answer_en' => $this->parsedown->text($faq->answer_en),
            'question_id' => $faq->question_id,
            'answer_id' => $this->parsedown->text($faq->answer_id),
            'updated_at' => $faq->updated_at
        ];

        return view('faq_single', $data);
    }
}
