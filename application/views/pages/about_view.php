<div id="about_main">
    <div id="left_bord" class="about_border"></div>
    <img id="img_about" src="<?= base_url('/assets/images/site/img_about_photo.png')?>">
    <div id="about_text" class="text-justify">
        <? foreach($text[$lang] as $block): ?>
        <p><?= $block?></p>
        <? endforeach; ?>
    <div id="quotes"></div>
    <div id="author"><?= $author[$lang]; ?></div>
    </div>
    <div id="right_bord" class="about_border"></div>
</div>
<div style="clear: both; margin-bottom: 58px"></div>
