<!DOCTYPE html>
<html lang="en">
<head>
    <?= view('_partial/head') ?>
</head>
<body class="d-flex flex-column min-vh-100">
<?= view('_partial/navbar') ?>
<div class="container">
    <div class="mt-4 mb-4">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="input-title">Title</label>
                <input class="form-control" id="input-title" name="title" placeholder="Enter a title" />
            </div>
            <div class="form-group">
                <label for="textarea-description">Description</label>
                <textarea class="form-control" id="textarea-description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="input-thumbnail-url">Thumbnail URL</label>
                <input class="form-control" id="input-thumbnail-url" name="thumbnail_url" placeholder="Enter a thumbnail URL" />
            </div>
            <div class="form-group">
                <label for="input-thumbnail-url">Document Type</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="_radio" id="radio-choice-file" checked>
                    <label class="form-check-label" for="radio-choice-file">
                        File
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="_radio" id="radio-choice-url">
                    <label class="form-check-label" for="radio-choice-url">
                        URL
                    </label>
                </div>
            </div>
            <div class="form-group" id="div-choice-file">
                <label for="file-report">Document Upload</label>
                <input type="file" class="form-control-file" id="file-report" name="document_upload" />
            </div>
            <div class="form-group d-none" id="div-choice-url">
                <label for="input-url">Url</label>
                <input class="form-control" id="input-url" name="url" placeholder="Enter a URL" />
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
<script type="text/javascript">
const radioChoiceFile = document.querySelector("#radio-choice-file");
const radioChoiceURL = document.querySelector("#radio-choice-url");
const divChoiceFile = document.querySelector("#div-choice-file");
const divChoiceURL = document.querySelector("#div-choice-url");

radioChoiceFile.addEventListener("change", () => {
    if (radioChoiceFile.checked) {
        divChoiceFile.classList.remove("d-none");
        divChoiceURL.classList.add("d-none");
    }
});

radioChoiceURL.addEventListener("change", () => {
    if (radioChoiceURL.checked) {
        divChoiceURL.classList.remove("d-none");
        divChoiceFile.classList.add("d-none");
    }
});
</script>
<?= view('_partial/footer') ?>
<?= view('_partial/body_end') ?>
</body>
</html>