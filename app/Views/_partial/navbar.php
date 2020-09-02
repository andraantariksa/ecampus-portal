<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= base_url() ?>">eCampus Portal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="<?= base_url('') ?>">Home</a>
            <a class="nav-item nav-link" href="<?= base_url('news') ?>">News</a>
            <a class="nav-item nav-link" href="<?= base_url('video-conference') ?>">Video Conference</a>
            <a class="nav-item nav-link" href="<?= base_url('faq') ?>">FAQ</a>
            <a class="nav-item nav-link" href="<?= base_url('document') ?>">Documents</a>
<?php
if (!$authentication->isAuthenticated()) {
    // Unauthenticated user parts
    ?>
    <a class="nav-item nav-link" href="<?= base_url('login') ?>">Login</a>
    <?php
    // End unauthenticated user parts
} else {
    // Authenticated user parts
    ?>

    <?php
    // TODO
    // Staff logic
    $isStaff = true;
    if ($isStaff) {
        // Staff only parts
        ?>
<!--        <a class="nav-item nav-link" href="--><?//= base_url('staff/lecturer-report') ?><!--">Lecturer Report</a>-->
        <a class="nav-item nav-link" href="<?= base_url('staff/lecturer-report/upload') ?>">Upload Report</a>
        <?php
        // End staff only parts
    }
    ?>
    <a class="nav-item nav-link" href="<?= base_url('logout') ?>">Logout</a>

    <?php
    // End authenticated user parts
}
?>
            ?>
        </div>
    </div>
</nav>