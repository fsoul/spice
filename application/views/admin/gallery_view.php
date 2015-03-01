<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div>
            <span>Фотографии галереи</span>
        </div>
    </div>
    <div class="col-md-10 col-md-offset-1 bord">
        <div class="upl-wrap">
            <div class="upl-photo-gal">
                <p><span>+Добавить фото</span><span>(можно просто перетащить нужное фото в эту область)</span></p>
                <input type="file" name="userfile"/>
            </div>
        </div>

        <? foreach ($gallery as $item): ?>
        <div class="col-md-3 marg">
            <img class="img-responsive g-photo" src="<?= base_url($item['gallery_photo']); ?>" alt="gallery_photo"/>
            <p class="text-center">
                <span class="date marg-r"><?= rus_date_format($item['created_at'], 1); ?></span>
                <a class="marg-l text-danger" href="<?= base_url('/admin/delete/gallery/' . $item['id']) ?>">Удалить</a>
            </p>
            <hr class="hr"/>
        </div>
        <? endforeach; ?>
    </div>
</div>