<div id="blueimp-gallery" class="blueimp-gallery">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev"></a>
    <a class="next"></a>
    <a class="close"></a>
    <!--<a class="play-pause"></a>-->
    <ol class="indicator"></ol>
</div>
<div class="container" style="padding: 0; margin-top: 20px; margin-bottom: 10px; ">
    <ul class="grid effect-1 links" id="links">
        <? foreach($items as $item): ?>
        <li>
            <a href="<?= $item['gallery_photo'];?>" title="" alt="">
                <img src="<?= thumb($item['gallery_photo']);?>" class="img-responsive">
            </a>
        </li>
        <? endforeach; ?>
    </ul>
</div>
