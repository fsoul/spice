$('#idea_photo').fileupload({
    dropZone: $('.tmp'),
    multipart: true,
    drop: function (e, data) {
        $.each(data.files, function (index, file) {
            handleFile(file);
        });
    },
    change: function (e, data) {
        $.each(data.files, function (index, file) {
            handleFile(file);
        });
    }
});

$('#finish_photo').fileupload({
    dropZone: $('.tmp'),
    multipart: true,
    drop: function (e, data) {
        $.each(data.files, function (index, file) {
            handleFile(file);
        });
    },
    change: function (e, data) {
        $.each(data.files, function (index, file) {
            handleFile(file);
        });
    }
});


$('#add_finish_photo').fileupload({
    dropZone: $('.tmp'),
    multipart: true,
    drop: function (e, data) {
        $.each(data.files, function (index, file) {
            handleAddFile(file);
        });
    },
    change: function (e, data) {
        console.log(e);
        $.each(data.files, function (index, file) {
            handleAddFile(file, e.target);
        });
    }
});

function handleFile(file) {
    if (file)
        if (file.size < 1000000) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var img = $('.img');
                img.attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        } else {
            alert('файл слишком большой');
        }
}

function handleAddFile(file, target) {
    if (file)
        if (file.size < 1000000) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(target).parent().remove()

                var img = $('<img class="img" >');
                img.attr('src', e.target.result);
                $('.tmp').append(img);
            }
            reader.readAsDataURL(file);
        } else {
            alert('файл слишком большой');
        }
}
