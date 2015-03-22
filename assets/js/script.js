function del(cnt) {
    var append_div = document.getElementById('append' + cnt);
    append_div.remove();
}

var cnt = 2;

$(document).ready(function () {
    $('#userfile').fileupload({
        dropZone: $('#upl-wrap'),
        url: "/admin/gogo",
        multipart: true,
        drop: function(e,data){
            $.each(data.files, function(index, file){
                gallery_handler(file);
            });
        },
        change: function(e,data){
            $.each(data.files, function(index, file){
                gallery_handler(file);
            });
        },
        done: function (e, data) {
            var arr = $.parseJSON(data.result);

            var im = $('<img>');
            im.attr('class', 'img-responsive g-photo').attr('src', arr.thumb).attr('alt', 'gallery_photo');
            var p = $('<p></p>');
            p.attr('class', 'text-center');
            var span = $('<span></span>');
            span.attr('class', 'date marg-r');
            span.text(arr.created_at);
            var a = $('<a></a>');
            a.attr('style', 'cursor:pointer;').attr('class', 'text-danger delete').attr('name', 'gallery').attr('rel', arr.id);
            a.text('Удалить');
            var hr = $('<hr>');
            hr.attr('class', 'hr');
            p.append(span).append(a);
            var targ = $('.bord .temporary').slice(-1);

            targ.html('').append(im).append(p).append(hr).removeClass('temporary');
            targ.find('.delete').bind('click', function (e) {
                    e.preventDefault();
                    var id = e.target.attributes.rel.value;
                    var name = e.target.attributes.name.value;

                    if (e.target.text == 'Удалить') {
                        e.target.text = 'Возобновить';
                        e.target.attributes.class.value = 'delete';
                        var set_value = 1;
                    } else {
                        e.target.text = 'Удалить';
                        e.target.attributes.class.value = 'text-danger delete';
                        var set_value = 0;
                    }

                    $.ajax({
                        type: "POST",
                        url: "/admin/pre_delete",
                        data: "id=" + id + "&name=" + name + "&set_value=" + set_value
                    });
                }
            );
        },
        fail: function (e, data) {
            $('.bord .temporary:last-child').html('error').removeClass('temporary');

        }
    })

    function gallery_handler(file) {
        if(file)
            if(file.size< 1024*1024*5){
            $('#empty-gallery').remove();
            $('.bord #upl-wrap').after('<div  class="col-md-3 marg m temporary text-center"><img style="margin-top:50px; opacity: 0.5;" src="http://spiceandpassion.me/assets/images/site/loader.gif"/></div>');

            }

    }

    /**
     *
     */
    $('.hint').hide();
    $('.show-hint').hover(
        function(){
            $(this).find('.hint').show();
        },
        function(){
            $(this).find('.hint').hide();
        });

    /**
     * pre_delete function
     *
     */

    $('.delete').click(function (e) {
        e.preventDefault();
        var id = e.target.attributes.rel.value;
        var name = e.target.attributes.name.value;

        if (e.target.text == 'Удалить') {
            e.target.text = 'Возобновить';
            e.target.attributes.class.value = 'delete';
            var set_value = 1;
        } else {
            e.target.text = 'Удалить';
            e.target.attributes.class.value = 'text-danger delete';
            var set_value = 0;
        }

        $.ajax({
            type: "POST",
            url: "/admin/pre_delete",
            data: "id=" + id + "&name=" + name + "&set_value=" + set_value
        });
    });


    /**
     *
     */

    var href = window.location.href;
//    console.log(document.getElementsByClassName('movie'));



    /**
     *
     */

    /*$('.ajax').click(function (e) {
        e.preventDefault();
        var id = e.target.attributes.rel.value;
        var method = '';

        if (e.target.text == 'Добавить') {
            e.target.text = 'Отменить';
            e.target.attributes.class.value = 'ajax_delete';
            method = 'method=add';
        } else {
            e.target.text = 'Добавить';
            e.target.attributes.class.value = 'ajax_add';
            method = 'method=cancel';
        }

        $.ajax({
            type: "POST",
            url: "/admin/data",
            data: "id=" + id + "&" + method
        });
    });*/


    /**
     *  add steps to recipe
     */
    $('#add').click(function () {
        var append_div = document.getElementById('append' + cnt);
        $.ajax({
            type: "POST",
            url: "/assets/js/append_view.php",
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

    /**
     *  menu highlighting
     */
    $('.navbar-nav li').each(function () {
        var location = window.location.href;
        var link = this.children;
        if (location == link[0]) {
            $(this).addClass('active');
        }
    });

    $(document).on('change', '.drop', function(e) {
        handler(this.files[0], this);
    });
});

function label(){
    $('label').click(function () {
        var id = this.getAttribute('for');
        var targ = document.getElementById(id);
        if (targ.checked) {
            this.style.backgroundPosition = 'left 0px';
            this.style.color = '#737373';
        } else {
            this.style.backgroundPosition = 'left -20px';
            this.style.color = '#42CEFF';
        }
    });
}
function handler(file, target) {
    if(file && (file.type == 'image/jpeg' || file.type == 'image/png' || file.type == 'image/gif')){
        if(file.size< 1024*1024*5){
            var reader = new FileReader();
            reader.onload = function(e) {

                var tmp = target.parentNode.parentNode;
                var div = $(target).parent();

                $(div).removeClass('upl-photo');
                $(target).siblings('p').remove();

                var img = $('<img  >');
                img.attr('src', e.target.result).attr('class', 'img');
                var inpt = $('<input >');
                inpt.attr('value', 'Заменить').attr('type', 'button').attr('class', 'change btn btn-primary');
                inpt.bind('click', function () {
                    $(target).trigger('click')
                });

                $(tmp).find('.img').remove();
                $(tmp).find('.change').remove();
                $(div).append(img).append(inpt);

                $('.drop').bind('change', function (e) {
                    handler(this.files[0], this);
                })
            }
            reader.readAsDataURL(file);
        }else{
            $.notify('файл слишком большой');
        }
    }else{

        $.notify('файл не правильного формата');
    }
}


