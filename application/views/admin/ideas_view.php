<div class="container">
    <div class="row">
        <div>
            <span>Список идей</span>
        </div>
        <hr/>
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
                        <td><img width="160" src="<?= $item['idea_photo']; ?>" alt="idea_photo"/></td>
                        <td><?= $item['title_ru']; ?></td>
                        <td><?= rus_date_format($item['created_at']); ?></td>
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