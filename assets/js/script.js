function del(cnt) {
    var append_div = document.getElementById('append' + cnt);
    append_div.remove();
}

var cnt = 2;

$(document).ready(function () {
    $(".c_form").validate();

    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }
    var inProgress = false;
    var lang = getCookie('lang');
    var startFrom = 2;
    $(window).scroll(function() {
        if(window.location.pathname == '/'+lang+'/recipes' && $(window).scrollTop() + $(window).height() >= $(document).height() && !inProgress) {

            $.ajax({
                url: '/'+lang+'/recipes/ajax_load_content',
                method: 'POST',
                data: {"startFrom" : startFrom},
                beforeSend: function() {
                    $('.loader').removeClass('hide_loader');
                    inProgress = true;
                },
                complete: function () {
                    $('.loader').addClass('hide_loader');
                }
            }).done(function(data){
                data = jQuery.parseJSON(data);
                if (data.length > 0) {

                    $.each(data, function(index, item){
                        var recipe_item = $('<div class="recipe_item"></div>');
                        var recipe_a = $('<a></a>');
                        var recipe_a_img = $('<img class="recipe_item_img">');
                        var src = item.finish_photo.replace('.', '_thumb.');
                        var recipe_item_text = $('<div class="recipe_item_text"></div>');
                        var recipe_item_title = $('<p class="recipe_item_title"></p>');
                        var recipe_item_desc = $('<p class="recipe_item_desc"></p>');
                        var rec_item_cat_wrap = $('<div class="rec_item_cat_wrap"></div>');
                        var recipe_item_cat = $('<div class="recipe_item_cat"></div>');
                        var rec_item_clear = $('<div style="clear: both;"></div>');

                        $.each(item.categories, function(index, res){
                            var cat_items =  $('<span class="cat_items"></span>');
                            cat_items.html(res['title_'+lang]);
                            recipe_item_cat.append(cat_items);
                        });
                        rec_item_cat_wrap.append(recipe_item_cat);
                        recipe_a.append(recipe_a_img);
                        recipe_a.attr('href', '/'+lang+'/recipe/'+item.id);
                        recipe_a_img.attr('src', src);
                        recipe_item_title.html(item['title_'+lang]);
                        recipe_item_desc.html(item['description_'+lang]);
                        recipe_item_text.append(recipe_item_title).append(recipe_item_desc).append(rec_item_cat_wrap);
                        recipe_item.append(recipe_a).append(recipe_item_text).append(rec_item_clear);
                        recipe_item.appendTo('#rec_wrap');

                    });

                    inProgress = false;
                    startFrom += 2;
                }});
        }
    });

    $('#userfile').fileupload({
        dropZone: $('#upl-wrap'),
        url: "/admin/gogo",
        multipart: true,
        drop: function (e, data) {
            $.each(data.files, function (index, file) {
                gallery_handler(file);
            });
        },
        change: function (e, data) {
            $.each(data.files, function (index, file) {
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
        if (file)
            if (file.size < 1024 * 1024 * 5) {
                $('#empty-gallery').remove();
                $('.bord #upl-wrap').after('<div  class="col-md-3 marg m temporary text-center"><img style="margin-top:50px; opacity: 0.5;" src="http://spiceandpassion.me/assets/images/site/loader.gif"/></div>');

            }

    }

    /**
     *
     */
    $('.hint').hide();
    $('.show-hint').hover(
        function () {
            $(this).find('.hint').slideDown('500');
        },
        function () {
            $(this).find('.hint').slideUp('500');
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
     *   music and equalizer control
     */

    var interval = [];

    $("#music").click(function () {
        if ($('#audio-player').get(0).paused) {
            $('#audio-player').get(0).play();
            $('#eq .line.white').each(function () {
                var _this = $(this);
                var item = setInterval(function () {
                    var rand = Math.round(Math.random() * 100) + 1;
                    _this.css('height', rand + "%");
                }, 150);
                interval.push(item);
            });
        }
        else {
            $('#audio-player').get(0).pause();
            for (var i in interval) {
                clearInterval(interval[i]);
            }
        }
    });

    /**
     *  Инициализация ajax обвертки
     */
    //AjaxContent.init({containerDiv: "#ajax-wrap", contentDiv: "#ajax-response"}).ajaxify_links(".menu_links");

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

    /**
     *  scroll fich
     */
    scroll();
    var isscroll = false;
    $(window).scroll(scroll);
    function scroll() {
        if ($('body').scrollTop() > 69) {
            if (!isscroll) {
                $('#wrapper').addClass('hide_el').removeClass('show_el');
                //      setTimeout(function(){
                $('#menu_wrap').addClass('fix_menu');
                //    }, 800);
                isscroll = true;
            }
        } else {
            isscroll = false;
            $('#wrapper').removeClass('hide_el').addClass('show_el');
            $('#menu_wrap').removeClass('fix_menu');
        }

        //console.log($('body').scrollTop());
    }

    //

    /**
     * search_inp
     */
    $('.xreset').click(function(){
        $('.srch_inp').removeClass('srch_inp_focus');
    });
    var holder = $('.srch_inp').attr('placeholder');
    $('.srch_inp').on('focus', function(){
        $(this).addClass('srch_inp_focus').attr('placeholder', '');
        $(this).siblings('.xreset').addClass('show-xreset');
        $(this).parents().parents('#rec_search').addClass('highlights');
    });
    $('.srch_inp').on('blur', function(){
        if($(this).val().length==0){
            $(this).removeClass('srch_inp_focus');
        }
        $(this).attr('placeholder', holder);
        $(this).siblings('.xreset').removeClass('show-xreset');
        $(this).parents().parents().removeClass('highlights');
    });
    var open = false;
    $('.sort').click(function(){
        if(open == false){
            $(this).addClass('sort_open');
            $(this).children('span').addClass('span_back');
            $(this).children('div').addClass('back_show');
            $(this).parents('#bar').siblings('.fade_cat').addClass('fade_cat_show');
            open = true;
        }else{
            $(this).removeClass('sort_open');
            $(this).children('span').removeClass('span_back');
            $(this).children('div').removeClass('back_show');
            $(this).parents('#bar').siblings('.fade_cat').removeClass('fade_cat_show');
            open = false;
        }
    });
    /**
     * dropzone для фоток рецепта
     */
    $(document).on('change', '.drop', function (e) {
        handler(this.files[0], this);
    });
});

function label() {
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
    if (file && (file.type == 'image/jpeg' || file.type == 'image/png' || file.type == 'image/gif')) {
        if (file.size < 1024 * 1024 * 5) {
            var reader = new FileReader();
            reader.onload = function (e) {

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
        } else {
            $.notify('файл слишком большой');
        }
    } else {

        $.notify('файл не правильного формата');
    }
}
var cur_path = window.location.pathname;
if(cur_path == '/ru/gallery' || cur_path == '/en/gallery' || cur_path == '/de/gallery'){
    new AnimOnScroll( document.getElementById( 'links' ), {
        minDuration : 0.4,
        maxDuration : 0.7,
        viewportFactor : 0.2
    } );
    document.getElementById('links').onclick = function (event) {
        event = event || window.event;
        var target = event.target || event.srcElement,
            link = target.src ? target.parentNode : target,
            options = {index: link, event: event},
            links = this.getElementsByTagName('a');
        blueimp.Gallery(links, options);
    };
}