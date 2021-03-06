<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="pad">
                <a href="/admin/view/movies/0">Список фильмов</a> > <span>Добавление фильмов</span>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1 bord">
            <div style="margin-top: 30px;">
                <h4 style="color: #454545; margin-left: 15px;">Название фильма</h4>

                <form action="/admin/search_tmdb_movies" method="post">
                    <div class="field-wrap">
                        <input id="search-view" name="query" type="text" class="form-control" placeholder="Поиск"/>
                        <input class="button" value="" type="submit"/>
                        <input class="btn-reset" type="reset" value="Очистить"/>
                    </div>
                </form>
            </div>
            <table class="table list">
                <tbody>
                <?
                /*
                echo '<pre>';

                print_r($movies);
                echo '</pre>';
                */
                if (isset($_POST['query'])) {
                    $data = $search_result;
                } else {
                    $data = $movies;
                }
                if (isset($data['no_match'])):
                    ?>
                    <div style="padding: 10px 0;" class="text-center bg-warning"><?= $data['no_match']; ?></div>
                <?
                else:
                    foreach ($data as $k => $movie):
                        if ($k > 0) {
                            if ($data[$k]['title'] == $data[$k - 1]['title']) {
                                continue;
                            }
                        }
                        if (empty($movie['overview'])) {
                            $movie['overview'] = 'Описание отсутствует';
                        }

                        $overview = character_limiter($movie['overview'], 750);
                        ?>

                        <tr>
                            <td width="200">
                                <? if (!empty($movie['poster_path'])): ?>
                                    <img width="185"
                                         src="<?= 'http://cf2.imgobject.com/t/p/w185' . $movie['poster_path']; ?>"
                                         alt="photo"/>
                                <? else: ?>
                                <img width="185"
                                     src="<?= base_url( '/assets/images/site/empty_mov_pic.png');?>"
                                     alt="photo"/>
                            </td>
                            <? endif; ?>
                            <td width="200" class="text-uppercase">
                                <div class="parent">
                                    <div class="child">
                                        <p><?= $movie['title']; ?></p>

                                        <p><?= movie_release($movie['release_date']); ?></p>
                                    </div>
                                    <div class="helper"></div>
                                </div>
                            </td>
                            <td class="text-justify">
                                <div class="parent">
                                    <div class="child"><?= $overview; ?></div>
                                    <div class="helper"></div>
                                </div>
                            </td>
                            <td width="100" class="text-center ajax">
                                <a class="ajax_add" rel="<?= $movie['id'];?>" href="/admin/add_from_tmdb/<?= $movie['id'];?>">Добавить</a>
                            </td>
                        </tr>
                    <? endforeach; ?>
                <? endif; ?>
                </tbody>
            </table>
            <? if($page): ?>
            <div id="pagination">
                <nav class="text-center">
                    <ul class="pagination movie">
                        <li class="<?=($page == '1' || $page == '')?' active':'';?>"><a href="http://spice/admin/add/movie/1">1</a></li>
                        <li class="<?=($page == '2')?' active':'';?>"><a href="http://spice/admin/add/movie/2">2</a></li>
                        <li class="<?=($page == '3')?' active':'';?>"><a href="http://spice/admin/add/movie/3">3</a></li>
                        <li class="<?=($page == '4')?' active':'';?>"><a href="http://spice/admin/add/movie/4">4</a></li>
                        <li class="<?=($page == '5')?' active':'';?>"><a href="http://spice/admin/add/movie/5">5</a></li>
                        <li class="<?=($page == '6')?' active':'';?>"><a href="http://spice/admin/add/movie/6">6</a></li>
                        <li class="<?=($page == '7')?' active':'';?>"><a href="http://spice/admin/add/movie/7">7</a></li>
                        <li class="<?=($page == '8')?' active':'';?>"><a href="http://spice/admin/add/movie/8">8</a></li>
                        <li class="<?=($page == '9')?' active':'';?>"><a href="http://spice/admin/add/movie/9">9</a></li>
                        <li class="<?=($page == '10')?' active':'';?>"><a href="http://spice/admin/add/movie/10">10</a></li>
                    </ul>
                </nav>
            </div>
            <? endif; ?>
        </div>
    </div>
</div>