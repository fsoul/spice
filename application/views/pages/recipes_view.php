<?
    $data['placeholder']['ru'] = 'Поиск';
    $data['placeholder']['en'] = 'Search';
    $data['placeholder']['de'] = 'Suche';
    $data['sort']['ru'] = 'Все';
    $data['sort']['en'] = 'All';
    $data['sort']['de'] = 'Aller';
    $undefined = 'undefined';
?>
<div id="recipes_main">
    <div id="bar">
        <div class="sort">
            <?= $data['sort'][$lang]; ?>
            <div class="fade_cat">
                <div class="row">
                    <div class="col-lg-12">
                        <? foreach($categories as $k=>$cat): ?>
                            <div class="col-lg-2 sort-table">
                                <a class="cat_sort <?=$k<12?"no_bro":""?>" href="/<?= $lang.'/recipes/'.$cat['id']?>"><?= $cat['title_'.$lang]?></a>
                            </div>
                        <? endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="bordik"><div></div></div>
        <div id="rec_search">
            <form method="post" action="/<?= $lang.'/recipes/search'?>">
                <input class="srch_sbmt" type="submit" value=""/>
                <input class="srch_inp" name="like" maxlength="60" placeholder="<?= $data['placeholder'][$lang]; ?>" type="text"/>
                <input class="xreset" type="reset" value=""/>
            </form>
        </div>
    </div>
    <div id="rec_wrap">
        <? if (isset($recipes['empty'])) : ?>
            <div style="padding: 10px 0;" class="text-center bg-warning"><?= $recipes['empty'][$lang]; ?></div>
        <? else : ?>
        <? foreach($recipes as $item): ?>
                <?
                foreach($item as $k=>$v){
                    if(!is_array($item[$k]) && empty($item[$k])) {
                        $item[$k] = $undefined;
                    }
                }
                ?>
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
        <? endif; ?>
    </div>
    <div class="loader hide_loader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>