<?php
helper('form');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?= view('_partial/head') ?>
</head>
<body class="d-flex flex-column min-vh-100">
<?= view('_partial/navbar') ?>
<div class="container flex-grow-1">
    <header class="jumbotron my-4">
        <h1 class="display-3">Admin Login</h1>
        <?= form_open() ?>
        <?= isset($errorMsg) ? '<div class="alert alert-danger" role="alert">' . $errorMsg . '</div>' : '' ?>
        <div class="form-group">
            <?= form_label('Username', 'field-username') ?>
            <?= form_input([
                'name' => 'username',
                'class' => 'form-control' . (isset($errorField['username']) ? ' is-invalid' : ''),
                'placeholder' => 'Enter username',
                'id' => 'field-username'
            ]) ?>
            <?= isset($errorField) ? '<div class="invalid-feedback">' . $errorField['username'] . '</div>' : '' ?>
        </div>
        <div class="form-group">
            <?= form_label('Password', 'field-password') ?>
            <?= form_password([
                'name' => 'password',
                'class' => 'form-control' . (isset($errorField['password']) ? ' is-invalid' : ''),
                'placeholder' => 'Enter password',
                'id' => 'field-password'
            ]) ?>
            <?= isset($errorField) ? '<div class="invalid-feedback">' . $errorField['password'] . '</div>' : '' ?>
        </div>
        <?= form_button([
            'class' => 'btn btn-primary',
            'type' => 'submit'
        ], 'Login') ?>
        <?= form_close() ?>
    </header>
</div>
<?= view('_partial/footer') ?>
<?= view('_partial/body_end') ?>
</body>
</html>