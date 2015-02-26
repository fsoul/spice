<div class="container">
    <div class="row">
        <div>
            <span>Список идей</span>
        </div>
        <hr class="hr"/>
        <div class="alert alert-info">
            <a href="<?= base_url('/admin/view/add_idea/'); ?>">+Добавить</a>
        </div>
        <div>
            <input type="text" class="form-control" placeholder="Search">
        </div>

        <div class="table">
            <table class="table">
                <thead></thead>
                <tbody>
                <? foreach ($ideas as $item): ?>
                    <tr>
                        <td width="160">
                            <img width="160" src="<?= $item['idea_photo']; ?>" alt="idea_photo"/>
                        </td>
                        <td width="160" class="text-uppercase"><?= $item['title_ru']; ?></td>
                        <td class="text-center"><?= rus_date_format($item['created_at']); ?></td>
                        <td><a href="<?= base_url('/admin/update/idea/' . $item['id']); ?>">Редактировать</a></td>
                        <td>
                            <a class="text-danger"
                               href="<?= base_url('/admin/delete/idea/' . $item['id']); ?>">Удалить</a>
                        </td>
                    </tr>
                <? endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>