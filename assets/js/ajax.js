/**
 * Created by fsoul on 28.03.15.
 */
var AjaxContent = function(){
    var container_div = '';
    var content_div = '';
    return {
        getContent : function(url){
            $(container_div).animate({opacity:0}, //Прозрачность на 0
                function(){ // загружает контент с помощью ajax
                    $(container_div).load(url+" "+content_div, //загружает только выбранную часть
                        function(){
                            $(container_div).animate({opacity:1}); //возвращает прозрачность обратно на  1
                        }
                    );
                });
        },
        ajaxify_links: function(elements){
            $(elements).click(function(){
                AjaxContent.getContent(this.href);
                history.pushState(null, null, this.href);

                return false; //предотвращает нажатие на ссылку
            });
        },
        init: function(params){ //задает первоначальные настройки
            container_div = params.containerDiv;
            content_div = params.contentDiv;
            return this; //выводит объект
        }
    }
}();