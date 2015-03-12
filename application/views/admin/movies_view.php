<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="pad">
                <span>Список фильмов</span>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1 bord">
            <div class="alert alert-info">
                <a class="add-link" href="<?= base_url('/admin/add/movie/'); ?>"><span>+Добавить</span></a>
            </div>
            <?= $this->load->view('template/search_view'); ?>
            <table class="table list">
                <tbody>
                <? if (isset($movies['empty'])) : ?>
                    <div style="padding: 10px 0;" class="text-center bg-warning"><?= $movies['empty']; ?></div>
                <? else : ?>
                    <? foreach ($movies as $movie): ?>
                        <tr>
                            <td>
                                <img src="<?= $movie['movie_photo']; ?>" alt="movie_photo"/>
                            </td>
                            <td class="text-uppercase">
                                <div class="parent">
                                    <div class="child"><?= $movie['title']; ?></div>
                                    <div class="helper"></div>
                                </div>
                            </td>
                            <td>
                                <div class="parent">
                                    <div class="child text-justify"><?= $movie['description']; ?></div>
                                    <div class="helper"></div>
                                </div>
                            </td>
                            <td class="date text-center">
                                <div class="parent">
                                    <div class="child"><?= rus_date_format($movie['created_at'], 0); ?></div>
                                    <div class="helper"></div>
                                </div>
                            </td>
                            <td class="del_width">
                                <a class="text-danger delete" name="movies" rel="<?= $movie['id']; ?>"
                                   href="<?= base_url('/admin/delete/movie/' . $movie['id']); ?>">Удалить</a>
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