<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="pad">
            <a href="/admin/view/ideas/0">Список идей</a> > <span>Редактирование идеи</span>
        </div>
        <hr/>
        <form enctype="multipart/form-data" method="post" action="/admin/update_idea/<?= $idea['id'] ?>">
            <div class="tmp">
                <div class="text-center">
                    <input class="drop" type="file" name="photos[]">
                    <img class="img" src="<?= $idea['idea_photo']; ?>" alt="idea_photo"/>
                    <input value="Заменить" type="button" class="change btn btn-primary">
                    <input type="hidden" value="<?= $idea['idea_photo']; ?>" name="<?= $hidden= 'idea_photo'; ?>">
                </div>
            </div>

            <h3>Заголовок</h3>

            <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="titleRu">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTitleRu"
                               aria-expanded="true"
                               aria-controls="collapseTitleRu">
                                Русский
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTitleRu" class="panel-collapse collapse in" role="tabpanel"
                         aria-labelledby="titleRu">
                        <div class="panel-body area-view">
                            <textarea name="title_ru" id="title_ru"><?= $idea['title_ru'] ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="titleEN">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion1"
                               href="#collapseTitleEn"
                               aria-expanded="false" aria-controls="collapseTitleEn">
                                English
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTitleEn" class="panel-collapse collapse" role="tabpanel" aria-labelledby="titleEn">
                        <div class="panel-body area-view">
                            <textarea name="title_en" id="title_en"><?= $idea['title_en'] ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="titleDe">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion1"
                               href="#collapseTitleDe"
                               aria-expanded="false" aria-controls="collapseTitleDe">
                                Deutch
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTitleDe" class="panel-collapse collapse" role="tabpanel" aria-labelledby="titleDe">
                        <div class="panel-body area-view">
                            <textarea name="title_de" id="title_de"><?= $idea['title_de'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <a href="<?= base_url().'admin/view/ideas/0';?>" class="btn btn-primary btn-sm pull-left marg-lt-rt">
                Отмена</a>
            <input name="submit" type="submit" value="Сохранить" class="btn btn-primary btn-lg pull-right marg-lt-rt"/>
        </form>
    </div>
</div>