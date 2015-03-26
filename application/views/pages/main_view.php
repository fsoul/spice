<div style="margin-top: 20px; margin-bottom: 10px; ">
    <div>
        <div style="width: 1140px; margin: 0 auto;">
            <? foreach($preview as $item): ?>
            <div style="float: left; margin: 10px 5px; overflow: hidden;position: relative; width: 275px; height: 450px;" class="show-hint">
                <img style="position: absolute; top:; height: 450px; left:-25%;" src="<?= thumb($item['finish_photo']); ?>"/>
                <div class="hint" style="padding:5px; background: rgba(231,231,231,0.8);position: absolute; width: 275px; height: 225px; bottom: 0; left:0;">
                    <p style="border-bottom: 1px solid #a1a1a1;" class="text-uppercase"><?= $item['title_ru']; ?></p>

                    <p style="font-size: 12px; font-family: sans-serif;"><?= $item['description_ru']; ?></p>
                </div>
            </div>
            <? endforeach; ?>
        </div>
    </div>

    <hr>
</div>
<div style="clear: both"></div>
