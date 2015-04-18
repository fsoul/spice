<div id="movies_wrap">
    <? foreach($items as $item): ?>
        <div class="movie_item">
            <img class="pull-left" src="<?= $item['poster_path_'.$lang]; ?>">
            <div class="pull-left m_wrap">
                <p class="m_t"><?= $item['title_'.$lang]; ?>
                    <br>
                    <span>
                        <?= substr($item['movie_release'], 1, -1); ?>
                    </span>
                </p>
                <p class="m_o"><?= $item['overview_'.$lang]; ?></p>
            </div>
            <div class="clearfix"></div>
        </div>
    <? endforeach; ?>
</div>
