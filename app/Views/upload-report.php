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
                <label for="file-report">File</label>
                <input type="file" class="form-control-file" id="file-report" name="report"/>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</div>
<?= view('_partial/footer') ?>
<?= view('_partial/body_end') ?>
</body>
</html>