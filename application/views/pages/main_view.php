<img src="<?= base_url('assets/images/site/img_main.jpg')?>" id="main_img">
<div id="trapezoid"></div>
<div id="main_view">
    <div>
        <div id="page_wrap">
            <? foreach($recipes as $item): ?>
            <div class="show-hint">
                <img src="<?= thumb($item['finish_photo']); ?>"/>
                <div class="hint">
                    <p class="text-uppercase"><?= $item['title_'.$lang]; ?></p>

                    <p><?= $item['description_'.$lang]; ?></p>
                </div>
            </div>
            <? endforeach; ?>
        </div>
    </div>
</div>
<div style="clear: both"></div>
