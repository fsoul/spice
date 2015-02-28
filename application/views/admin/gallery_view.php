<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="pad">
            <span>Фотографии галереи</span>
        </div>
       <?//@todo выровнять и переделать загрузчик?>

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



        <hr/>
        <? foreach ($gallery as $item): ?>
        <div class="col-md-3 marg">
            <img class="img-responsive g-photo" src="<?= base_url($item['gallery_photo']); ?>" alt="gallery_photo"/>
            <p class="pad text-center">
                <span class="pad"><?= rus_date_format($item['created_at']); ?></span>
                <a class="pad text-danger" href="<?= base_url('/admin/delete/gallery/' . $item['id']) ?>">Удалить</a>
            </p>
            <hr class="hr"/>
        </div>
        <? endforeach; ?>
    </div>
</div>