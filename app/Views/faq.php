<!DOCTYPE html>
<html lang="en">
<head>
    <?= view('_partial/head') ?>
</head>
<body class="d-flex flex-column min-vh-100">
<?= view('_partial/navbar') ?>
<div class="container flex-grow-1">
    <h1 class="display-4">Frequently Asked Question</h1>
    <form>
        <div class="input-group mb-3">
            <input name="q" type="text" class="form-control" placeholder="Search your question"
                   aria-label="Search your question" aria-describedby="search-button">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="search-button">Search</button>
            </div>
        </div>
    </form>
    <div class="container">
        <div class="row">
<?php
            foreach ($faq_list as $faq) {
?>
            <div class="col col-lg-4 col-12 col-md-6 mb-2 mt-2">
                    <div class="card bg-light">
                        <img class="card-img-top"
                             src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_172eeb8167a%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_172eeb8167a%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2299.125%22%20y%3D%2296.3%22%3EImage%20cap%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                             alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($faq['question_id']) ?></h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="<?= base_url('faq/' . $faq['id']) ?>" class="btn btn-primary">Read</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated on <?= $faq['updated_at'] ?></small>
                        </div>
                    </div>
            </div>
<?php
            }
?>
        </div>
    </div>
    <div class="container">
        <?= $faq_pager->links() ?>
    </div>
</div>
<?= view('_partial/footer') ?>
<?= view('_partial/body_end') ?>
</body>
</html>