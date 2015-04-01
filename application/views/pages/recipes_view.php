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
                <a class="rec_detail" href="<?= '/'.$lang.'/recipe/'.$item['id']; ?>"><p class="recipe_item_title"><?= $item['title_'.$lang];?></p></a>
                <p class="recipe_item_desc"><?= $item['description_'.$lang];?></p>
                <div class="rec_item_cat_wrap">
                    <div class="recipe_item_cat">
                        <?
                        if (!empty($item['categories'])) {
                            foreach ($item['categories'] as $k => $category) {
                                echo '<span class="cat_items">'.$category['title_'.$lang].'</span>';
                            }
                        } else {
                            echo '<span class="cat_items">'.$no_cat[$lang].'</span>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div style="clear: both;"></div>
        </div>
        <? endforeach; ?>
    </div

</div>