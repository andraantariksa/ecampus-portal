<!DOCTYPE html>
<html lang="en">
<head>
    <?= view('_partial/head') ?>
</head>
<body class="d-flex flex-column min-vh-100">
<?= view('_partial/navbar') ?>
<div class="container">
    <div class="mt-4 mb-4">
        <div class="row">
            <div class="col">
                <h2>Document Lists</h2>
            </div>
            <div class="col">
                <div class="float-right">
                    <a class="btn btn-primary text-white" href="<?= base_url("document/new"); ?>">Create</a>
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Last Update</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($list_data as $row) {
                ?>
                <tr>
                    <td><a href="<?= base_url("document/id/" . $row['id']); ?>"><?= $row['title']; ?></a></td>
                    <td><?= $row['updated_at']; ?></a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<?= view('_partial/footer') ?>
<?= view('_partial/body_end') ?>
</body>
</html>