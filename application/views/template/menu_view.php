<div>

    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid" id="nav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a target="_blank" class="navbar-brand" href="<?= base_url(); ?>">spiceandpassion.me</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="<?= base_url('/admin/view/recipes/'); ?>">РЕЦЕПТЫ</a></li>
                    <li><a href="<?= base_url('/admin/view/ideas/'); ?>">ИДЕИ</a></li>
                    <li><a href="<?= base_url('/admin/view/gallery/'); ?>">ГАЛЕРЕЯ</a></li>
                    <li><a href="<?= base_url('/admin/view/movies/'); ?>">ФИЛЬМЫ</a></li>
                    <li><a href="<?= base_url('/admin/view/settings/'); ?>">НАСТРОЙКИ</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

</div>