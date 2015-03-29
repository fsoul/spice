<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" context="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title><?= $title ?></title>
    <meta name="description" content="">

    <link rel="shortcut icon" href="<?= base_url('assets/images/spiceandpassion.ico'); ?>" type="image/x-icon"/>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/template.css') ?>" rel="stylesheet">
</head>
<body>
<div id="main">
    <div id="rght_block" class="pull-right">
        <div id="music">
            <div id="eq" class="off">
                <div class="line blue"></div>
                <div class="line white w1"></div>
                <div style="width: 1px;" class="line blue"></div>
                <div class="line white w2"></div>
                <div class="line blue"></div>
                <div class="line white w3"></div>
                <div class="line blue"></div>
                <div class="line white w4"></div>
                <div class="line blue"></div>
                <div class="line white w5"></div>
            </div>
            <audio loop="loop" id="audio-player">
                <source src="/assets/audio/track.mp3" type="audio/mpeg">
                Тег audio не поддерживается вашим браузером.
                <a href="/assets/audio/track.mp3">Скачайте музыку</a>.
            </audio>
        </div>
        <div id="lang">РУССКИЙ</div>
    </div>
</div>
<div id="wrapper">
    <div id="logo1"></div>
    <div id="stamp">
        <div id="logo2"></div>
    </div>
</div>

