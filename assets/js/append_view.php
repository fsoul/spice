<?php

echo '<div class="step-wrap"><p onclick="del('.$_POST['cnt'].');" class="close out" aria-hidden="true">&times;</p><div class="tmp"><div class="upl-photo"><p>Выбрать фото</p><p>(можно просто перетащить нужное фото в эту область)</p><input rel="'+cnt+'" class="drop" type="file" name="photos[]"/></div></div><div class="panel-group" id="accordion_s'.$_POST['cnt'].'" role="tablist" aria-multiselectable="true"><div class="panel panel-default"><div class="panel-heading" role="tab" id="step_ru_'.$_POST['cnt'].'"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion_s'.$_POST['cnt'].'" href="#collapseStepRu'.$_POST['cnt'].'" aria-expanded="true" aria-controls="collapseStepRu'.$_POST['cnt'].'">Русский</a></h4></div><div id="collapseStepRu'.$_POST['cnt'].'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="step_ru_'.$_POST['cnt'].'"><div class="panel-body area-view"><textarea name="step_ru[]"></textarea></div></div></div><div class="panel panel-default"><div class="panel-heading" role="tab" id="step_en_'.$_POST['cnt'].'"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion_s'.$_POST['cnt'].'" href="#collapseStepEn'.$_POST['cnt'].'" aria-expanded="false" aria-controls="collapseStepEn'.$_POST['cnt'].'">English</a></h4></div><div id="collapseStepEn'.$_POST['cnt'].'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="step_en_'.$_POST['cnt'].'"><div class="panel-body area-view"><textarea name="step_en[]"></textarea></div></div></div><div class="panel panel-default"><div class="panel-heading" role="tab" id="step_de_'.$_POST['cnt'].'"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion_s'.$_POST['cnt'].'" href="#collapseStepDe'.$_POST['cnt'].'" aria-expanded="false" aria-controls="collapseStepDe'.$_POST['cnt'].'">Deutch</a></h4></div><div id="collapseStepDe'.$_POST['cnt'].'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="step_de_'.$_POST['cnt'].'"><div class="panel-body area-view"><textarea name="step_de[]"></textarea></div></div></div></div></div>';


