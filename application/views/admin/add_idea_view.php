<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="pad">
            <a href="/admin/view/ideas">Список идей</a> > <span>Добавление идеи</span>
        </div>
        <hr/>
        <form enctype="multipart/form-data" method="post" action="/admin/add/idea/">

            <div class="upl-photo">
                <p>Выбрать фото</p>
                <p>(можно просто перетащить нужное фото в эту область)</p>
                <input type="file" name="idea_photo"/>
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
                            <textarea name="title_ru" id="title_ru"></textarea>
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
                            <textarea name="title_en" id="title_en"></textarea>
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
                            <textarea name="title_de" id="title_de"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button id="cancel" class="btn btn-primary btn-sm pull-left marg-lt-rt"/>Отмена</button>
            <input name="submit" type="submit" value="Сохранить" class="btn btn-primary btn-lg pull-right marg-lt-rt"/>
        </form>
    </div>
</div>