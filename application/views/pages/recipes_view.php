<?
    $data['placeholder']['ru'] = 'Поиск';
    $data['placeholder']['en'] = 'Search';
    $data['placeholder']['de'] = 'Suche';
    $data['sort']['ru'] = 'Все';
    $data['sort']['en'] = 'All';
    $data['sort']['de'] = 'Aller';
?>
<div id="recipes_main">
    <div id="bar">
        <div id="sort"><?= $data['sort'][$lang]; ?></div>
        <div id="bordik"><div></div></div>
        <div id="rec_search">
            <form>
                <input class="srch_inp" maxlength="60" placeholder="<?= $data['placeholder'][$lang]; ?>" type="text"/>
                <input class="xreset" type="reset" value="X"/>
            </form>
        </div>
    </div>
    <div id="rec_wrap">
        <? foreach($recipes as $item): ?>
        <div class="recipe_item">
            <a href="<?= '/'.$lang.'/recipe/'.$item['id']; ?>">
                <img class="recipe_item_img" src="<?= thumb($item['finish_photo']); ?>">
            </a>
            <div class="recipe_item_text">
                <p class="recipe_item_title">
                    <?= $item['title_'.$lang];?>
                </p>
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