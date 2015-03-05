function del(cnt) {
    var append_div = document.getElementById('append' + cnt);
    append_div.remove();
}

var cnt = 2;

$(document).ready(function () {
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
     * cancel of adding
     */
    $('#cancel').click(function (e) {
        e.preventDefault();
        window.location.href = document.referrer;
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
     * extra checkbox view
     */
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

//
    /*
     $('.tmp').mouseenter(function(el){
     var id = '#'+el.currentTarget.children[0].children[2].attributes.id.value;
     console.log(id);
     $(id).fileupload({
     dropZone: $('.tmp'),
     multipart: true,
     drop: function (e, data) {
     $.each(data.files, function (index, file) {
     handleAddFile(file, e.target);
     });
     },
     change: function (e, data) {
     $.each(data.files, function (index, file) {
     handleAddFile(file, e.target);
     });
     }
     });

     function handleAddFile(file, target) {
     if (file)
     if (file.size < 1000000) {
     var reader = new FileReader();
     reader.onload = function (e) {
     $(target).parent().remove();

     var img = $('<img class="img" >');
     var src =  img.attr('src', e.target.result);
     var div = '<div><p></p><p></p><input type="file" id="dsadas"/><img class="img" src="'+img[0].attributes.src.value+'"/></div>';
     $('.tmp').append(div);
     console.log(img[0].attributes.src.value);
     }
     reader.readAsDataURL(file);
     } else {
     alert('файл слишком большой');
     }
     }
     });
     */
    /*
     $('#userfile').fileupload({
     dropZone: $('#upl-wrap'),
     multipart: true,
     drop: function (e, data) {
     $.each(data.files, function (index, file) {
     handleFile(file)
     });
     },
     change: function (e, data) {
     $.each(data.files, function (index, file) {
     handleFile(file)
     });
     }

     });

     function handleFile(file) {
     if(file)
     if(file.size< 1000000){
     var reader = new FileReader();
     reader.onload = function(e) {
     var img = $('<img class="img-thumbnail" >');
     img.attr('src', e.target.result);
     $('#preview').append(img);
     }
     reader.readAsDataURL(file);
     }else{
     alert('файл слишком большой');
     }
     }*/
});


