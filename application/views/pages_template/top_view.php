<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" context="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title><?= $meta['title_'.$lang]; ?></title>
    <meta name="description" content="">

    <link rel="shortcut icon" href="/assets/images/spiceandpassion.ico" type="image/x-icon"/>

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/css/template.css" rel="stylesheet">
    <link href="/assets/css/component.css" rel="stylesheet">
    <link href="/assets/css/blueimp-gallery.css" rel="stylesheet">
</head>
<body>
<div id="main">
    <div id="rght_block">
        <div id="music">
            <div id="eq" class="off">
                <div class="line blue"></div>
                <div class="line white w1"></div>
                <div class="line blue"></div>
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
        <div id="lang">
            <ul class="lang_ul">
                <?
                    if(!empty($curr_id)){
                        $curr_id = '/'.$curr_id;
                    }
                    $lang_arr = array(
                        'ru'=>'<a href="/ru/'.$current_controller.$curr_id.'">РУССКИЙ</a>',
                        'en'=>'<a href="/en/'.$current_controller.$curr_id.'">ENGLISH</a>',
                        'de'=>'<a href="/de/'.$current_controller.$curr_id.'">DEUTCH</a>'
                    );
                ?>
                <li class="lang_li">
                    <?= $lang_arr[$lang]; ?>
                </li>
                <? foreach($lang_arr as $k=>$v){
                    if($k!=$lang){
                        echo '<li class="lang_li">';
                        echo $v;
                        echo '</li>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<div id="wrapper">
    <div id="logo1"></div>
    <div id="stamp">
        <div id="logo2"></div>
    </div>
</div>

