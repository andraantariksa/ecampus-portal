<!DOCTYPE html>
<html lang="en">
<head>
    <?= view('_partial/head') ?>
</head>
<body class="d-flex flex-column min-vh-100">
<?= view('_partial/navbar') ?>
<div class="container">
    <div class="row mt-4 mb-4">
        <h2>Report Table</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Course ID</th>
                <th scope="col">Course Name</th>
                <th scope="col">Course Category</th>
                <th scope="col">Participation Count</th>
                <th scope="col">Teaching Count</th>
                <th scope="col">Qualified Activity</th>
            </tr>
            </thead>
            <tbody>
<?php
    $num = 1;
    foreach ($overview_data as $row)
    {
?>
    <tr>
        <th scope="row"><?= $num; ?></th>
        <td><?= $row['name']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['course_id']; ?></td>
        <td><?= $row['course_name']; ?></td>
        <td><?= $row['category']; ?></td>
        <td><?= $row['participation_count']; ?></td>
        <td><?= $row['teaching_count']; ?></td>
        <td><input type="checkbox"  disabled="disabled" <?= $row['is_qualified_activity']? "checked" : ""; ?> /></td>
    </tr>
<?php
        $num += 1;
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