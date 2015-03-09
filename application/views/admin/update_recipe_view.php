<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="pad">
            <a href="/admin/view/recipes/0">Список рецептов</a> > <span>Редактирование рецепта</span>
        </div>
        <hr/>
        <form enctype="multipart/form-data" method="post" action="/admin/update_recipe/<?= $recipe['id']; ?>">
            <div class="tmp">
                <div class="text-center">
                    <input class="drop" type="file" name="photos[]">
                    <img class="img" src="<?= $recipe['finish_photo']; ?>" alt="recipe_photo"/>
                    <input value="Заменить" type="button" class="change btn btn-primary">

                    <input type="hidden" value="<?= $recipe['finish_photo']; ?>" name="<?= $hidden= 'finish_photo'; ?>">
                </div>
            </div>
            <div class="checkbox-div text-center">
                <input checked="checked" id="is_gallery" name="is_gallery" type="checkbox"/><label class="form-label" for="is_gallery">дублировать
                        в галерею</label>
                <!--<input id="is_public" name="is_public" type="checkbox"/><span class="form-label"><label for="is_public">опубликовать
                        рецепт</label></span>-->
            </div>

            <h3>Заголовок</h3>

            <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="titleRu">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTitleRu" aria-expanded="true"
                               aria-controls="collapseTitleRu">
                                Русский
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTitleRu" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="titleRu">
                        <div class="panel-body area-view">
                            <textarea name="title_ru" id="title_ru"><?=$recipe['title_ru'];?></textarea>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="titleEN">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapseTitleEn"
                               aria-expanded="false" aria-controls="collapseTitleEn">
                                English
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTitleEn" class="panel-collapse collapse" role="tabpanel" aria-labelledby="titleEn">
                        <div class="panel-body area-view">
                            <textarea name="title_en" id="title_en"><?=$recipe['title_en'];?></textarea>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="titleDe">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapseTitleDe"
                               aria-expanded="false" aria-controls="collapseTitleDe">
                                Deutch
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTitleDe" class="panel-collapse collapse" role="tabpanel" aria-labelledby="titleDe">
                        <div class="panel-body area-view">
                            <textarea name="title_de" id="title_de"><?=$recipe['title_de'];?></textarea>
                        </div>
                    </div>
                </div>
            </div>


            <h3>Описание</h3>

            <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="descRu">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion2" href="#collapseDescRu" aria-expanded="true"
                               aria-controls="collapseDescRu">
                                Русский
                            </a>
                        </h4>
                    </div>
                    <div id="collapseDescRu" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="descRu">
                        <div class="panel-body area-view">
                            <textarea name="description_ru" id="description_ru"><?=$recipe['description_ru'];?></textarea>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="descEN">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseDescEn"
                               aria-expanded="false" aria-controls="collapseDescEn">
                                English
                            </a>
                        </h4>
                    </div>
                    <div id="collapseDescEn" class="panel-collapse collapse" role="tabpanel" aria-labelledby="descEn">
                        <div class="panel-body area-view">
                            <textarea name="description_en" id="description_en"><?=$recipe['description_en']?></textarea>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="descDe">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseDescDe"
                               aria-expanded="false" aria-controls="collapseDescDe">
                                Deutch
                            </a>
                        </h4>
                    </div>
                    <div id="collapseDescDe" class="panel-collapse collapse" role="tabpanel" aria-labelledby="descDe">
                        <div class="panel-body area-view">
                            <textarea name="description_de" id="description_de"><?=$recipe['description_de']?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <h3>Категории</h3>
            <?
            if(!isset($empty)):
                $arr = array();
                for($i=0; $i<count($recipe['categories']); $i++){
                    $arr[] .= '^'.$recipe['categories'][$i]['id'].'$';
                }
                $pattern = '/('.implode('|', $arr).')/';
            else:
                $pattern = '/\s/';
            endif;
            ?>
            <div class="row text-lora-italic">
                <div class="col-md-12 checkbox-div">
                    <?
                     foreach($categories as $category):
                     if(preg_match($pattern, $category['id'])):
                    ?>
                    <div class="col-md-4">
                        <input checked="checked" type="checkbox" name="category[<?= $category['id']?>]" id="cat<?= $category['id']?>"/>
                        <label for="cat<?= $category['id']?>"><?= $category['title_ru']?></label>
                    </div>
                    <? else:?>
                    <div class="col-md-4">
                        <input type="checkbox" name="category[<?= $category['id']?>]" id="cat<?= $category['id']?>"/>
                        <label for="cat<?= $category['id']?>"><?= $category['title_ru']?></label>
                    </div>
                    <?
                     endif;
                     endforeach;
                    ?>
                </div>
            </div>

            <h3>Ингридиенты</h3>

            <div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="ingrRu">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion3" href="#collapseIngrRu" aria-expanded="true"
                               aria-controls="collapseIngrRu">
                                Русский
                            </a>
                        </h4>
                    </div>
                    <div id="collapseIngrRu" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="ingrRu">
                        <div class="panel-body area-view">
                            <textarea name="ingridients_ru" id="ingridients_ru"><?=$recipe['ingridients_ru'];?></textarea>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="ingrEn">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapseIngrEn"
                               aria-expanded="false" aria-controls="collapseIngrEn">
                                English
                            </a>
                        </h4>
                    </div>
                    <div id="collapseIngrEn" class="panel-collapse collapse" role="tabpanel" aria-labelledby="ingrEn">
                        <div class="panel-body area-view">
                            <textarea name="ingridients_en" id="ingridients_en"><?=$recipe['ingridients_en'];?></textarea>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="ingrDe">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapseIngrDe"
                               aria-expanded="false" aria-controls="collapseIngrDe">
                                Deutch
                            </a>
                        </h4>
                    </div>
                    <div id="collapseIngrDe" class="panel-collapse collapse" role="tabpanel" aria-labelledby="ingrDe">
                        <div class="panel-body area-view">
                            <textarea name="ingridients_de" id="ingridients_de"><?=$recipe['ingridients_de'];?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <hr/>
            <h2 id="recipe-h2" class="text-center">Рецепт</h2>
            <? foreach($recipe['steps'] as $k => $step): ?>
                <? if($step['photo'] == '')
                    $step['photo'] = '/assets/images/site/empty_pic.png';
                ?>
            <div class="tmp">
                <div class="text-center">
                    <input class="drop" type="file" name="photos[]">
                    <img class="img" src="<?= $step['photo']; ?>" alt="recipe_step_photo"/>
                    <input value="Заменить" type="button" class="change btn btn-primary">
                    <input type="hidden" value="<?= $step['photo']; ?>" name="step_photo[<?= $k;?>]">
                </div>
            </div>
            <div class="panel-group" id="accordion_s<?= $k+1;?>" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="step_ru_<?= $k+1;?>">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion_s<?= $k+1;?>" href="#collapseStepRu<?= $k+1;?>" aria-expanded="true"
                               aria-controls="collapseStepRu<?= $k+1;?>">
                                Русский
                            </a>
                        </h4>
                    </div>
                    <div id="collapseStepRu<?= $k+1;?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="step_ru_<?= $k+1;?>">
                        <div class="panel-body area-view">
                            <textarea name="step_ru[]"><?= $step['description_ru']?></textarea>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="step_en_<?= $k+1;?>">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion_s<?= $k+1;?>" href="#collapseStepEn<?= $k+1;?>"
                               aria-expanded="false" aria-controls="collapseStepEn<?= $k+1;?>">
                                English
                            </a>
                        </h4>
                    </div>
                    <div id="collapseStepEn<?= $k+1;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="step_en_<?= $k+1;?>">
                        <div class="panel-body area-view">
                            <textarea name="step_en[]"><?= $step['description_en']?></textarea>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="step_de_<?= $k+1;?>">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion_s<?= $k+1;?>" href="#collapseStepDe<?= $k+1;?>"
                               aria-expanded="false" aria-controls="collapseStepDe<?= $k+1;?>">
                                Deutch
                            </a>
                        </h4>
                    </div>
                    <div id="collapseStepDe<?= $k+1;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="step_de_<?= $k+1;?>">
                        <div class="panel-body area-view">
                            <textarea name="step_de[]"><?= $step['description_de']?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <? endforeach; ?>

            <?
            /*for ($i = 2; $i < 21; $i++) {
                echo '<div id="append' . $i . '"></div>';
            }*/
            ?>

            <!--<p id="add" class="btn btn-primary btn-sm marg-lt-rt">Добавить этап</p>-->
            <hr/>
            <a href="<?= base_url().'admin/view/recipes/0';?>" class="btn btn-primary btn-sm pull-left marg-lt-rt">
            Отмена</a>

            <input name="submit" type="submit" value="Сохранить" class="btn btn-primary btn-lg pull-right"/>
        </form>
    </div>
</div>