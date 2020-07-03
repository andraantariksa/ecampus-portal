<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= base_url() ?>">eCampus Portal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="<?= base_url('') ?>">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="<?= base_url('news') ?>">News</a>
            <a class="nav-item nav-link" href="<?= base_url('video-conference') ?>">Video Conference</a>
            <a class="nav-item nav-link" href="<?= base_url('faq') ?>">FAQ</a>
            <a class="nav-item nav-link" href="<?= base_url('documents') ?>">Documents</a>
<?php
            if (!$authentication->isAuthenticated())
            {
?>
                <a class="nav-item nav-link" href="<?= base_url('login') ?>">Login</a>
<?php
            }
            else
            {
?>
                <a class="nav-item nav-link" href="<?= base_url('logout') ?>">Logout</a>
<?php
            }
?>
            ?>
        </div>
    </div>
</nav>