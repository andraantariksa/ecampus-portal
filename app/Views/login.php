<!DOCTYPE html>
<html lang="en">
<head>
    <?= view('_partial/head') ?>
</head>
<body>
<?= view('_partial/navbar') ?>

<!-- Page Content -->
<div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
        <h1 class="display-3">Admin Login</h1>
        <form method="post">
        <?= ($errorMsg)?$errorMsg:'' ?>
        <div class="input-group">
            <input type="text" name="username" class="form-control" placeholder="username"><br />
            <?= ($errorField)?$errorField['username']:'' ?>
        </div>
        <div class="input-group">
            <input type="password" name="password" class="form-control" placeholder="password"><br />
            <?= ($errorField)?$errorField['password']:'' ?>
        </div>
        <div class="input">
            <button class="btn btn-primary" type="submit">Login</button>
        </div>
        </form>
    </header>



</div>
<!-- /.container -->

<?= view('_partial/footer') ?>
<?= view('_partial/body_end') ?>
</body>
</html>