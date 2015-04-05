<div id="recipe_main">
    <div id="recipe_main_top">
        <img class="rec_main_top_img" src="<?= $recipe['finish_photo']?>"/>
        <div class="rec_main_top_in">
            <div class="recipe_main_title"><?= $recipe['title_'.$lang]?></div>
            <div class="recipe_main_cat">
                <? foreach($recipe['category'] as $category): ?>
                    <span class="cat_item"><?= $category['title_'.$lang]?></span>
                <? endforeach; ?>
            </div>
        </div>
    </div>
<?
    $data['ingr']['ru'] = 'Ингридиенты';
    $data['ingr']['en'] = 'Ingredient';
    $data['ingr']['de'] = 'Bestandteile';
    $data['bon_appetit']['ru'] = 'Приятного аппетита';
    $data['bon_appetit']['en'] = 'Bon appetit';
    $data['bon_appetit']['de'] = 'Guten Appetit';
    $data['similar']['ru'] = 'Похожие рецепты';
    $data['similar']['en'] = 'Similar recipes';
    $data['similar']['de'] = 'Ähnliche Rezepte'
?>
    <div class="recipe_desc"><?= $recipe['description_'.$lang];?></div>
    <div class="recipe_ingr">
        <div class="ing_title">
            <label><?= $data['ingr'][$lang];?></label>
        </div>
        <div class="ingr">
            <ul class="ingr_ul">
                <?
                    $bold_text = bold_digit($recipe['ingridients_'.$lang]);
                    $text = str_replace("\r", "|", $bold_text);
                    $ingr = explode('|', $text);
                ?>
                <? foreach($ingr as $item): ?>
                    <li class="ingr_li"><?= $item;?></li>
                <? endforeach; ?>
            </ul>
        </div>

        <div class="steps">
            <? foreach($recipe['steps'] as $step): ?>
                <div class="step_wrap">
                    <img src="<?= $step['photo']; ?>"/>
                    <div class="text_wrap">
                        <div class="step_val">
                            <?= ($step['ord']+1).'.'; ?>
                        </div>
                        <div class="step_text">
                           <?= $step['description_'.$lang]; ?>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            <? endforeach; ?>
        </div>
        <div class="bon_appetit">
            <?= $data['bon_appetit'][$lang]; ?>
        </div>
        <div class="simple_recipes">
            <p class="simple">
                <?= $data['similar'][$lang]; ?>
            </p>
            <div id="main_view">
                <div>
                    <div id="page_wrap">
                        <? foreach($recipe['similar'] as $similar): ?>
                            <div class="show-hint">
                                <a href="/<?= $lang.'/recipe/'.$similar['id']; ?>">
                                    <img src="<?= $similar['finish_photo']; ?>"/>
                                </a>
                                <div class="hint">
                                    <p class="text-uppercase"><?= $similar['title_'.$lang]; ?></p>

                                    <p><?= $similar['description_'.$lang]?></p>
                                </div>
                            </div>
                        <? endforeach; ?>
                    </div>
                </div>
            </div>
            <div style="clear: both"></div>
        </div>
    </div>