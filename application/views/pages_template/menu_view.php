
    <div id="menu_wrap">
        <nav class="navbar navbar-default" role="navigation">
            <div id="inner_menu_block">
                <ul class="nav navbar-nav">
                    <? foreach($pages as $page): ?>
                        <li class="main_menu_li">
                            <a class="text-uppercase menu_links" href="<?= base_url().$page['href']?>"><?= $page['name_ru']?></a>
                        </li>
                    <? endforeach; ?>
                </ul>
            </div>
        </nav>
    </div>
    <img src="<?= base_url('assets/images/site/tmp/1.jpg')?>" id="main_img">
    <div id="trapezoid"></div>
