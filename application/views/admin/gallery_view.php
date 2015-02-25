<div class="container">
    <div class="row">
        <div>
            <span>Фотографии галереи</span>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 spice-add">
                <?php
                if (isset($error)) {
                    echo $error;
                }
                ?>
                <form enctype="multipart/form-data" method="post" action="/upload/do_upload">
                    <input type="file" name="userfile" class="btn btn-info btn-lg pull-left"/>
                    <input type="submit" value="Добавить" class="btn btn-primary btn-lg pull-right"/>
                </form>
            </div>
        </div>

        <hr/>
        <? foreach ($gallery as $item): ?>
            <div class="col-md-3">
                <img class="img-responsive" src="<?= base_url($item['gallery_photo']); ?>" alt="gallery_photo"/>

                <p>
                    <span class="pull-left"><?= rus_date_format($item['created_at']); ?></span>
                    <a class="pull-right text-danger" href="<?= base_url('/admin/delete/gallery/' . $item['id']) ?>">Удалить</a>
                </p>
                <hr/>
            </div>
        <? endforeach; ?>
    </div>
</div>