<div id="ideas_wrap">
    <? foreach($items as $item): ?>
        <div class="idea">
            <img width="535" src="<?= thumb($item['idea_photo']); ?>" alt="idea_photo">
            <div class="tt">
                <div class="t_row">
                    <div class="t_cell">
                        <?= character_limiter($item['title_'.$lang], 120); ?>
                    </div>
                </div>
            </div>
        </div>
    <? endforeach; ?>
    <div class="clearfix"></div>
</div>
