$(document).ready(function () {

    $('.adminCategories li:first-child table').addClass( "tableActive" );
    $('.adminCategories li:first-child').addClass( "catActive" );
    $(document).on('click', '.category', function (e) {
        for(var i=0; i<$('.adminGoods').length; i++ ){
            var table = $('.adminGoods')[i];
            var li = $('.adminCategories li')[i];
            if($(table).hasClass('tableActive') && $(li).hasClass('catActive')){
                $(table).removeClass('tableActive');
                $(li).removeClass('catActive');
            }
        }
        $(this).siblings().addClass('tableActive');
        $(this).parent().addClass('catActive');
    });





});






































