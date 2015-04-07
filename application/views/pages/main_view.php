<?
$undefined = 'undefined';
?>
<img src="<?= base_url('assets/images/site/img_main.jpg')?>" id="main_img">
<div id="trapezoid"></div>
<div id="main_view">
    <div>
        <div id="page_wrap">
            <? foreach($recipes as $item): ?>
                <? foreach($item as $k=>$v){
                    if(empty($item[$k])){
                        $item[$k] = $undefined;
                    }
                }?>
            <div class="show-hint">
                <a href="/<?= $lang.'/recipe/'.$item['id']; ?>"><img src="<?= thumb($item['finish_photo']); ?>"/>
                <div class="hint">
                    <p class="text-uppercase"><?= $item['title_'.$lang]; ?></p>

                    <p><?= $item['description_'.$lang]; ?></p>
                </div>
            </div>
            <? endforeach; ?>
        </div>
    </div>
</div>
<div style="clear: both"></div>
