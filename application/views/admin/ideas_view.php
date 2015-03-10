<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="pad">
                <span>Список идей</span>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1 bord">
            <div class="alert alert-info">
                <a class="add-link" href="<?= base_url('/admin/add/idea/'); ?>"><span>+Добавить</span></a>
            </div>
            <?= $this->load->view('template/search_view'); ?>
            <table class="table list">
                <tbody>
                <? if (isset($ideas['empty'])) : ?>
                    <div style="padding: 10px 0;" class="text-center bg-warning"><?= $ideas['empty']; ?></div>
                <? else : ?>
                    <? foreach ($ideas as $item): ?>
                        <tr>
                            <td>
                                <img src="<?= $item['idea_photo']; ?>" alt="idea_photo"/>
                            </td>
                            <td class="text-uppercase">
                                <div class="parent">
                                    <div class="child"><?= $item['title_ru']; ?></div>
                                    <div class="helper"></div>
                                </div>
                            </td>
                            <td class="date text-center">
                                <div class="parent">
                                    <div class="child"><?= rus_date_format($item['created_at'], 0); ?></div>
                                    <div class="helper"></div>
                                </div>
                            </td>
                            <td><a href="<?= base_url('/admin/update/idea/' . $item['id']); ?>">Редактировать</a></td>
                            <td class="del_width">
                                <a class="text-danger delete" name="ideas" rel="<?= $item['id']; ?>"
                                   href="<?= base_url('/admin/delete/idea/' . $item['id']); ?>">Удалить</a>
                            </td>
                        </tr>
                    <? endforeach; ?>
                <? endif; ?>
                </tbody>
            </table>
            <div id="pagination"><? if (isset($pages)) {
                    echo($pages);
                } ?></div>
        </div>
    </div>
</div>