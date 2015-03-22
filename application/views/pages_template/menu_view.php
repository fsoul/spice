<div style="background-image: url('http://spice/assets/images/site/tmp/1.jpg');background-repeat: no-repeat;
 background-position: center center;
 border: 1px solid #000000; height: 500px;">
    <div style="background-color: #ffffff; height: 50px;">
        <div class="col-xs-8 col-xs-offset-2">
            <nav class="navbar navbar-default" role="navigation">
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

