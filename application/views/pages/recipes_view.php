<div id="recipes_main">
    <div id="bar">
        <div id="sort">Все</div>
        <div id="bordik"><div></div></div>
        <div id="rec_search"><input placeholder="Поиск" type="text"></div>
    </div>

    <div id="rec_wrap">
        <? foreach($recipes as $item): ?>
        <div class="recipe_item">
            <img class="recipe_item_img" src="<?= thumb($item['finish_photo']); ?>">
            <div class="recipe_item_text">
                <a class="rec_detail" href="<?= '/recipe/'.$item['id']; ?>"><p class="recipe_item_title"><?= $item['title_ru']?></p></a>
                <p class="recipe_item_desc"><?= $item['description_ru']?></p>
                <div class="rec_item_cat_wrap">
                    <div class="recipe_item_cat">
                        <span class="cat_items">Десерты,</span>
                        <span class="cat_items">Морепродукты,</span>
                        <span class="cat_items">Выпечка,</span>
                        <span class="cat_items">Тесто,</span>
                        <span class="cat_items">Десерты,</span>
                    </div>
                </div>
            </div>
            <div style="clear: both;"></div>
        </div>
        <? endforeach; ?>
    </div

</div>