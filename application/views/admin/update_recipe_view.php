<div class="container">
<div>
    <a href="/index.php/admin/view/recipes/">Список идей</a> > <span>Редактирование рецепта</span>
</div>
<hr/>
<form enctype="multipart/form-data" method="post" action="/index.php/admin/update_recipe/">

<h3>Фото</h3>
<input type="file" name="finish_photo" class="btn btn-info btn-lg"/>
<img src="<?=$recipe['finish_photo']?>"/>
<div class="checkbox-div">
    <input id="is_gallery" name="is_gallery" type="checkbox" checked="checked"/><span class="form-label"><label for="is_gallery">дублировать
            в галерею</label></span>
    <input id="is_public" name="is_public" type="checkbox" checked="checked"/><span class="form-label"><label for="is_public">опубликовать
            рецепт</label></span>
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
                <textarea name="title_ru" id="title_ru"><?=$recipe['title_ru']?></textarea>
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
                <textarea name="title_en" id="title_en"><?=$recipe['title_en']?></textarea>
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
                <textarea name="title_de" id="title_de"><?=$recipe['title_de']?></textarea>
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
                <textarea name="description_ru" id="description_ru"><?=$recipe['description_ru']?></textarea>
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
<div class="row">
    <div class="col-md-12">
        <div class="col-md-2">
            <input type="checkbox" name="category[1]" id="cat1"/><label for="cat1">Блины и оладьи</label>
        </div>
        <div class="col-md-2">
            <input type="checkbox" name="category[2]" id="cat2"/><label for="cat2">Гарниры</label>
        </div>
        <div class="col-md-2">
            <input type="checkbox" name="category[3]" id="cat3"/><label for="cat3">Закуски</label>
        </div>
        <div class="col-md-2">
            <input type="checkbox" name="category[4]" id="cat4"/><label for="cat4">Паста</label>
        </div>
        <div class="col-md-2">
            <input type="checkbox" name="category[5]" id="cat5"/><label for="cat5">Соленья</label>
        </div>
        <div class="col-md-2">
            <input type="checkbox" name="category[6]" id="cat6"/><label for="cat6">Рыба и морепрод.</label>
        </div>
        <div class="col-md-2">
            <input type="checkbox" name="category[7]" id="cat7"/><label for="cat7">Варенье</label>
        </div>
        <div class="col-md-2">
            <input type="checkbox" name="category[8]" id="cat8"/><label for="cat8">Десерты</label>
        </div>
        <div class="col-md-2">
            <input type="checkbox" name="category[9]" id="cat9"/><label for="cat9">Крема</label>
        </div>
        <div class="col-md-2">
            <input type="checkbox" name="category[10]" id="cat10"/><label for="cat10">Пицца</label>
        </div>
        <div class="col-md-2">
            <input type="checkbox" name="category[11]" id="cat11"/><label for="cat11">Супы</label>
        </div>
        <div class="col-md-2">
            <input type="checkbox" name="category[12]" id="cat12"/><label for="cat12">Тесто</label>
        </div>
        <div class="col-md-2">
            <input type="checkbox" name="category[13]" id="cat13"/><label for="cat13">Выпечка</label>
        </div>
        <div class="col-md-2">
            <input type="checkbox" name="category[14]" id="cat14"/><label for="cat14">Завтраки</label>
        </div>
        <div class="col-md-2">
            <input type="checkbox" name="category[15]" id="cat15"/><label for="cat15">Мясо и субпрод.</label>
        </div>
        <div class="col-md-2">
            <input type="checkbox" name="category[16]" id="cat16"/><label for="cat16">Салаты</label>
        </div>
        <div class="col-md-2">
            <input type="checkbox" name="category[17]" id="cat17"/><label for="cat17">Соусы</label>
        </div>
        <div class="col-md-2">
            <input type="checkbox" name="category[18]" id="cat18"/><label for="cat18">Хлеб</label>
        </div>
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
                <textarea name="ingridients_ru" id="ingridients_ru"><?=$recipe['ingridients_ru']?></textarea>
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
                <textarea name="ingridients_en" id="ingridients_en"><?=$recipe['ingridients_en']?></textarea>
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
                <textarea name="ingridients_de" id="ingridients_de"><?=$recipe['ingridients_de']?></textarea>
            </div>
        </div>
    </div>
</div>

<?
// @todo  доделать update_view
// foreach(steps)
?>
<hr/>
<h2 class="text-center">Рецепт</h2>

<input type="file" name="step_1_photo" class="btn btn-info btn-lg marg-top-btm"/>
<img src=""/>

<div class="panel-group" id="accordion_s1" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="step_ru_1">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion_s1" href="#collapseStepRu1" aria-expanded="true"
                   aria-controls="collapseStepRu1">
                    Русский
                </a>
            </h4>
        </div>
        <div id="collapseStepRu1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="step_ru_1">
            <div class="panel-body area-view">
                <textarea name="step_ru[]"></textarea>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="step_en_1">
            <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion_s1" href="#collapseStepEn1"
                   aria-expanded="false" aria-controls="collapseStepEn1">
                    English
                </a>
            </h4>
        </div>
        <div id="collapseStepEn1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="step_en_1">
            <div class="panel-body area-view">
                <textarea name="step_en[]"></textarea>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="step_de_1">
            <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion_s1" href="#collapseStepDe1"
                   aria-expanded="false" aria-controls="collapseStepDe1">
                    Deutch
                </a>
            </h4>
        </div>
        <div id="collapseStepDe1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="step_de_1">
            <div class="panel-body area-view">
                <textarea name="step_de[]"></textarea>
            </div>
        </div>
    </div>
</div>
<?
for ($i = 2; $i < 21; $i++) {
    echo '<div id="append' . $i . '"></div>';
}
?>

<p id="add" class="btn btn-primary btn-sm marg-lt-rt">Добавить этап</p>
<hr/>
<button id="cancel" class="btn btn-primary btn-sm pull-left marg-lt-rt"/>Отмена</button>

<input name="submit" type="submit" value="Сохранить" class="btn btn-primary btn-lg pull-right"/>

</form>

</div>