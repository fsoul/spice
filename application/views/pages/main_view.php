<div id="main_view">
    <div>
        <div id="page_wrap">
            <? foreach($preview as $item): ?>
            <div class="show-hint">
                <img src="<?= thumb($item['finish_photo']); ?>"/>
                <div class="hint">
                    <p class="text-uppercase"><?= $item['title_ru']; ?></p>

                    <p><?= $item['description_ru']; ?></p>
                </div>
            </div>
            <? endforeach; ?>
        </div>
    </div>
</div>
<div style="clear: both"></div>
