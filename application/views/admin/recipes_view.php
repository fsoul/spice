<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="pad">
                <span>Список рецептов</span>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1 bord">
            <div class="alert alert-info">
                <a class="add-link" href="<?= base_url('/admin/add/recipe/'); ?>"><span>+Добавить</span></a>
            </div>
            <?= $this->load->view('template/search_view'); ?>
            <table class="table list">
                <tbody>
                <? if (isset($recipes['empty'])) : ?>
                    <div style="padding: 10px 0;" class="text-center bg-warning"><?= $recipes['empty']; ?></div>
                <? else : ?>
                    <? foreach ($recipes as $recipe): ?>
                        <tr>
                            <td>
                                <img src="<?= thumb($recipe['finish_photo']); ?>" alt="recipe_photo"/>
                            </td>
                            <td class="text-uppercase">
                                <div class="parent">
                                    <div class="child"><?= $recipe['title_ru']; ?></div>
                                    <div class="helper"></div>
                                </div>
                            </td>
                            <td class="date text-center">
                                <div class="parent">
                                    <div class="child"><?= rus_date_format($recipe['created_at'], 0); ?>
                                        <p class="categories">
                                            <?
                                            if (!empty($recipe['categories'])) {
                                                foreach ($recipe['categories'] as $k => $category) {
                                                    $arr[$k] = $category['title_ru'];
                                                }
                                                $cat_str = implode(', ', $arr);
                                                echo $cat_str;
                                            } else {
                                                echo 'Без категории';
                                            }
                                            ?>
                                        </p></div>
                                    <div class="helper"></div>
                                </div>
                            </td>
                            <td>
                                <a rel="recipe"
                                   href="<?= base_url('admin/update/recipe/' . $recipe['id']); ?>">Редактировать</a>
                            </td>
                            <td class="del_width">
                                <a class="text-danger delete" name="recipes" rel="<?= $recipe['id']; ?>"
                                   href="<?= base_url('admin/delete/recipe/' . $recipe['id']); ?>">Удалить</a>
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