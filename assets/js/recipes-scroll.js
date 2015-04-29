/**
 * Created by fsoul on 29.04.2015.
 */
$(document).ready(function () {
    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }
    var lang = getCookie('lang');

    var searching = false;
    $('.srch_inp').on('keyup', function(e){
        var like = $(this).val();
        if(like.length > 0) {

            $.ajax({
                url: '/' + lang + '/recipes/search',
                method: 'POST',
                data: {"like" : like},
                beforeSend: function () {
                    console.log('before');
                    $('.recipe_item').remove();
                    $('.em').remove();
                    searching = true;
                },
                complete: function () {
                    console.log('complete');
                }
            }).done(function (data) {
                obj = jQuery.parseJSON(data);

                if (obj.recipes.length > 0) {
                    //console.log(obj.recipes.length);

                    $.each(obj.recipes, function (index, item) {
                        console.log(item);
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

                        $.each(item.categories, function (index, res) {
                            var cat_items = $('<span class="cat_items"></span>');
                            cat_items.html(res['title_' + lang]);
                            recipe_item_cat.append(cat_items);
                        });

                        rec_item_cat_wrap.append(recipe_item_cat);
                        recipe_a.append(recipe_a_img);
                        recipe_a.attr('href', '/' + lang + '/recipe/' + item.id);
                        recipe_a_img.attr('src', src);
                        recipe_item_title.html(item['title_' + lang]);
                        recipe_item_desc.html(item['description_' + lang]);
                        recipe_item_text.append(recipe_item_title).append(recipe_item_desc).append(rec_item_cat_wrap);
                        recipe_item.append(recipe_a).append(recipe_item_text).append(rec_item_clear);
                        recipe_item.appendTo('#rec_wrap');

                    });

                     searching = false;
                }else{
                    console.log(obj.recipes.empty[lang]);
                    var empty_div = $('<div></div>');
                    empty_div.css('padding', '10px 0').attr('class', 'em text-center bg-warning').html(obj.recipes.empty[lang]);
                    $('#rec_wrap').append(empty_div);

                    searching = false;
                }
                console.log('done');
            });
        }
    });

    var inProgress = false;
    var startFrom = 2;
    var cat_id = $('.back').attr('id');

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() && !inProgress) {
            var like = $('.srch_inp').val();

            $.ajax({
                url: '/' + lang + '/recipes/ajax_load_content',
                method: 'POST',
                data: {"startFrom": startFrom, "cat_id": cat_id, "like" : like},
                beforeSend: function () {
                    $('.loader').removeClass('hide_loader');
                    inProgress = true;
                },
                complete: function () {
                    $('.loader').addClass('hide_loader');
                }
            }).done(function (data) {
                data = jQuery.parseJSON(data);
                if (data.length > 0) {

                    $.each(data, function (index, item) {
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

                        $.each(item.categories, function (index, res) {
                            var cat_items = $('<span class="cat_items"></span>');
                            cat_items.html(res['title_' + lang]);
                            recipe_item_cat.append(cat_items);
                        });
                        rec_item_cat_wrap.append(recipe_item_cat);
                        recipe_a.append(recipe_a_img);
                        recipe_a.attr('href', '/' + lang + '/recipe/' + item.id);
                        recipe_a_img.attr('src', src);
                        recipe_item_title.html(item['title_' + lang]);
                        recipe_item_desc.html(item['description_' + lang]);
                        recipe_item_text.append(recipe_item_title).append(recipe_item_desc).append(rec_item_cat_wrap);
                        recipe_item.append(recipe_a).append(recipe_item_text).append(rec_item_clear);
                        recipe_item.appendTo('#rec_wrap');

                    });

                    inProgress = false;
                    startFrom += 2;
                }
            });
        }
    });
});