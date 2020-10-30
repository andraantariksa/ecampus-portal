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
        <h1 class="display-3">Request Video Conference</h1>
        <?= form_open() ?>
        <div class="form-group">
            <?= form_label('Date', 'field-date') ?>
            <input type="date" name="date">
            <script>
                if (!Modernizr.inputtypes.date) {
                    $('input[type=date]').datepicker({
                        // Consistent format with the HTML5 picker
                        dateFormat: 'yy-mm-dd'
                    });
                }
            </script>
        </div>
        <div class="form-group">
            <?= form_label('Start hour', 'field-starthour') ?>
            <?php
            $options = [
                '0600' => '06.00',
                '0630' => '06.30',
                '0700' => '07.00',
                '0730' => '07.30',
                '0800' => '08.00',
                '0830' => '08.30',
                '0900' => '09.00',
                '0930' => '09.30',
                '1000' => '10.00',
                '1030' => '10.30',
                '1100' => '11.00',
                '1130' => '11.30',
                '1200' => '12.00',
                '1230' => '12.30',
                '1300' => '13.00',
                '1330' => '13.30',
                '1400' => '14.00',
                '1430' => '14.30',
                '1500' => '15.00',
                '1530' => '15.30',
                '1600' => '16.00',
                '1630' => '16.30',
                '1700' => '17.00',
                '1730' => '17.30',
                '1800' => '18.00',
                '1830' => '18.30',
                '1900' => '19.00',
                '1930' => '19.30',
                '2000' => '20.00',
                '2030' => '20.30',
                '2100' => '21.00',
                '2130' => '21.30',
                '2200' => '22.00'
            ];

            echo form_dropdown('starthour', $options, '0600');
            ?>
        </div>
        <div class="form-group">
            <?= form_label('Duration (hours)', 'field-duration') ?>
            <?php
            $options = [
                '60' => '1',
                '90' => '1.5',
                '120' => '2',
                '150' => '2.5',
                '180' => '3',
                '210' => '3.5',
                '240' => '4'
            ];

            echo form_dropdown('duration', $options, '60');
            ?>
        </div>
        <?= form_button([
            'class' => 'btn btn-primary',
            'type' => 'submit'
        ], 'Request')
        ?>
        <?= form_close() ?>
    </header>
    <header class="jumbotron my-4">
        <h1 class="display-3">Video Conference Schedule</h1>

    </header>
</div>
<?= view('_partial/footer') ?>
<?= view('_partial/body_end') ?>
</body>
</html>