<!DOCTYPE html>
<html lang="en">
<head>
    <?= view('_partial/head') ?>
    <script type='text/javascript'
            src='https://platform-api.sharethis.com/js/sharethis.js#property=5ef5b8bdb71a170012eecee8&product=inline-share-buttons&cms=sop'
            async='async'></script>
</head>
<body class="d-flex flex-column min-vh-100">
<?= view('_partial/navbar') ?>
<div class="container flex-grow-1">
    <div class="card">
        <?php
        if ($thumbnail_url) {
            ?>
            <!-- TODO styling -->
            <img class="card-img-top" alt="<?= esc($question_en) ?> | <?= esc($question_id) ?>">
            <?php
        }
        ?>
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">Last updated
                on: <?= date('l jS \of F Y h:i:s A', $updated_at) ?></h6>
            <div class="container">
                <h1 class="display-4"><?= $question_en ?></h1>
                <?= $answer_id ?>

                <div class="border-top my-3"></div>

                <h1 class="display-4"><?= $question_id ?></h1>
                <?= $answer_id ?>
            </div>
            <div class="sharethis-inline-share-buttons"></div>
        </div>
    </div>
</div>
<?= view('_partial/footer') ?>
<?= view('_partial/body_end') ?>
</body>
</html>