function del(cnt) {
    var append_div = document.getElementById('append' + cnt);
    append_div.remove();
}

var cnt = 2;

$(document).ready(function () {

    $('#add').click(function () {
        var append_div = document.getElementById('append' + cnt);
        //$('#append').append('<div class="append-wrap"><h4 class="form-label">Шаг '+cnt+'</h4><input type="file" name="step_'+cnt+'_photo" class="btn btn-info btn-lg marg-top-btm"/><div class="panel-group" id="accordion_s'+cnt+'" role="tablist" aria-multiselectable="true"><div class="panel panel-default"><div class="panel-heading" role="tab" id="step_ru_'+cnt+'"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion_s'+cnt+'" href="#collapseStepRu'+cnt+'" aria-expanded="true" aria-controls="collapseStepRu'+cnt+'">Русский</a></h4></div><div id="collapseStepRu'+cnt+'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="step_ru_'+cnt+'"><div class="panel-body area-view"><textarea name="step_ru[]"></textarea></div></div></div><div class="panel panel-default"><div class="panel-heading" role="tab" id="step_en_'+cnt+'"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion_s'+cnt+'" href="#collapseStepEn'+cnt+'" aria-expanded="false" aria-controls="collapseStepEn'+cnt+'">English</a></h4></div><div id="collapseStepEn'+cnt+'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="step_en_'+cnt+'"><div class="panel-body area-view"><textarea name="step_en[]"></textarea></div></div></div><div class="panel panel-default"><div class="panel-heading" role="tab" id="step_de_'+cnt+'"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion_s'+cnt+'" href="#collapseStepDe'+cnt+'" aria-expanded="false" aria-controls="collapseStepDe'+cnt+'">Deutch</a></h4></div><div id="collapseStepDe'+cnt+'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="step_de_'+cnt+'"><div class="panel-body area-view"><textarea name="step_de[]"></textarea></div></div></div></div></div>');
        $.ajax({
            type: "POST",
            url: "http://spice/assets/js/append_view.php",
            data: "cnt=" + cnt,
            success: function (data) {
                append_div.innerHTML = data;
            }
        });
        cnt++;
        if (cnt > 20) {
            $('#add').hide();
        }
    });


    $('#cancel').click(function (e) {
        e.preventDefault();
        window.location.href = document.referrer;
    });

    $('.navbar-nav li').each(function () {
        var location = window.location.href;
        var link = this.children;
        if(location == link[0]) {
            $(this).addClass('active');
        }

    });
});
