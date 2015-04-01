<div id="recipe_main">
    <div id="recipe_main_top">
        <img class="rec_main_top_img" src="/assets/images/site/tmp/omar.jpg"/>
        <div class="rec_main_top_in">
            <div class="recipe_main_title">Спагетти с омаром</div>
            <div class="recipe_main_cat">
                <span class="cat_item">Гарнир</span>
                <span class="cat_item">Паста</span>
                <span class="cat_item">Рыба и морепродукты</span>
            </div>
        </div>
    </div>

    <div class="recipe_desc">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac risus ac eros tincidunt mattis ac velificient massa. Vestibulum augue turpis, dignissim tincidunt rutrum sed, lacinia ac mi.
    </div>
    <?
    function bold_first_word($str){
        $arr = explode(' ', $str);
        $bold = '<b>'.$arr[0].'</b>';
        array_shift($arr);
        $str = implode(' ', $arr);

        return $bold.' '.$str;
    }

    $ing = array('1 кг мороженого', '100 г шоколада', '20 г сливок', '50 г малины', '1 кг мороженого', '100 г шоколада', '20 г сливок', '50 г малины');

    ?>
    <div class="recipe_ingr">
        <div class="ing_title">
            <label>Ингридиенты</label>
        </div>
        <div class="ingr">
            <ul class="ingr_ul">
                <? foreach($ing as $item): ?>
                    <li class="ingr_li"><?= bold_first_word($item)?></li>
                <? endforeach; ?>
            </ul>
        </div>

        <div class="steps">
            <? foreach($ing as $k => $val): ?>
                <div class="step_wrap">
                    <img src="/assets/images/site/tmp/5.jpg"/>
                    <div class="text_wrap">
                        <div class="step_val">
                            <?= ($k+1).'.'; ?>
                        </div>
                        <div class="step_text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum gravida et lacus at sollicitudin. Cras suscipit tempor risus, at vulputate ligula sollicitudin nec. Morbi finibus turpis lorem, id placerat turpis convallis eu. Phasellus non erat quis metus mattis molestie sed non ligula. Maecenas gravida non elit eget finibus.
                            Fusce et felis rutrum, interdum risus in, cursus sem. Sed vulputate metus nunc, quis accumsan nisl dignissim id. Maecenas ut suscipit nisl, eu auctor quam. Ut sed sapien porta, eleifend magna vitae, interdum nisl. Praesent ac vehicula nulla, id volutpat purus.
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            <? endforeach; ?>
        </div>
        <div class="bon_appetit">
            Приятного аппетита!
        </div>
        <div class="simple_recipes">
            <p class="simple">Похожие рецепты</p>
            <div id="main_view">
                <div>
                    <div id="page_wrap">
                        <? foreach($ing as $k => $item):
                            if($k > 3)
                                break;
                            ?>
                            <div class="show-hint">
                                <img src="/assets/images/site/tmp/5.jpg"/>
                                <div class="hint">
                                    <p class="text-uppercase">Паста Карбонара</p>

                                    <p>Вкусное блюдо</p>
                                </div>
                            </div>
                        <? endforeach; ?>
                    </div>
                </div>
            </div>
            <div style="clear: both"></div>
        </div>
    </div>