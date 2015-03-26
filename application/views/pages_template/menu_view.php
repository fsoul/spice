
    <div style=" height: 40px; z-index: 11; width: 100%">
        <nav style="min-height: 40px; border-radius: 0; border: none; background-color: rgba(255,255,255,0.7); width: 100%;" class="navbar navbar-default" role="navigation">
            <div style="height: 40px; width: 1190px; margin: 0 auto">
                <ul class="nav navbar-nav">
                    <? foreach($pages as $page): ?>
                        <li style="width: 170px; text-align: center">
                            <a style="color: #5c5c5c; padding: 0; line-height:40px; letter-spacing: 1.5px;" class="text-uppercase" href="<?= base_url().$page['href']?>"><?= $page['name_ru']?></a>
                        </li>
                    <? endforeach; ?>
                </ul>
            </div>
        </nav>
    </div>
    <img src="http://spiceandpassion.me/assets/images/site/tmp/1.jpg" style="border-top: 1px solid #7399bf;width: 100%; margin: -41px auto 0; z-index: 0">