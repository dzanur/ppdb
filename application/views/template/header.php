<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--favicon icon-->
    <link rel="icon" href="<?= base_url() ?>assets/img/favicon.png" type="image/png" sizes="16x16">

    <!--title-->
    <title>PPDB KOTA TANGERANG</title>

    <!--build:css-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css">
    <!-- endbuild -->
    <?php foreach ($extraCss as $value) { ?>
        <!-- <script src="<?= base_url(); ?>vendor/js/<?= $value ?>"></script> -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/css/<?= $value ?>">
    <?php } ?>
    <style>
        div.demo {
            height: 70px;
            width: 300px;
            border: 1px black;
            background: #FF0000;
            position: fixed;
            z-index: 1;
            top: 20px;
            /* margin-bottom: 30px; */
            left: 45%;
        }

        .demo-text {
            padding-top: 5%;
            color: #FFFFFF;
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>