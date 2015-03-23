<div style="background-image: url('http://spiceandpassion.me/assets/images/site/tmp/1.jpg');background-repeat: no-repeat;
 background-position: center center;
 height: 898px;
 margin-top: 10px;
 ">
    <div style="background-color: rgba(255,255,255,0.7); height: 50px;">
        <div class="col-xs-8 col-xs-offset-2">
            <nav style="background-color: transparent" class="navbar navbar-default" role="navigation">
                <ul class="nav navbar-nav">
                    <? foreach($pages as $page): ?>
                    <li>
                        <a class="text-uppercase" href="<?= base_url().$page['href']?>"><?= $page['name_ru']?></a>
                    </li>
                    <? endforeach; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>

