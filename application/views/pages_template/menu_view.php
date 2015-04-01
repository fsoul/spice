
    <div id="menu_wrap">
        <nav class="navbar navbar-default" role="navigation">
            <div id="inner_menu_block">
                <ul class="nav navbar-nav">
                    <? foreach($pages as $page): ?>
                        <li class="main_menu_li">
                            <a class="text-uppercase menu_links" href="<?= base_url().$page['href_'.$lang]?>"><?= $page['name_'.$lang]?></a>
                        </li>
                    <? endforeach; ?>
                </ul>
            </div>
        </nav>
    </div>
    <div class="content"></div>

