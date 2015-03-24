<div class="container" style="margin-top: 20px; margin-bottom: 10px; ">
    <div class="row">
        <div class="col-md-12">
            <? foreach($preview as $item): ?>
            <div style="margin: 10px 5px; overflow: hidden;position: relative; width: 275px; height: 450px;" class="col-md-3 show-hint">
                <img style="position: absolute; top:0; left:-111px;" src="<?= thumb($item['finish_photo']); ?>"/>
                <div class="hint" style="padding:5px; background: rgba(231,231,231,0.8);position: absolute; width: 275px; height: 225px; bottom: 0; left:0;">
                    <p style="border-bottom: 1px solid #a1a1a1;" class="text-uppercase"><?= $item['title_ru']; ?></p>

                    <p style="font-size: 9px; font-family: sans-serif;"><?= $item['description_ru']; ?></p>
                </div>
            </div>
            <? endforeach; ?>
        </div>
    </div>

    <hr>
</div>
