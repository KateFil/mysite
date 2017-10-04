$(document).ready(function () {

    $.ajax({
        'url':'../api/goods/list',
        'type':'POST',
        'dataType':'json',
        'success':function (res) {
            if(res['error']){
                $('.container').append('<div class="alert alert-danger alert-dismissible">'+res['error']+'</div>');
            }
            else{
                $('.container').append('<ul class="categories"></ul>');

                $.each(res, function (index, value) {

                    if(value['goods'].length > 0){
                        $('.categories').append('<li id="' + value.id + '"><a href="#">'+' &rsaquo; ' + value.name + '</a></li>');
                        //$('#' + value.id).append('<ul class="goods"></ul>');
                        $('#' + value.id).append('<table class="goods table table-bordered"><tr><th>Название</th><th>Модель</th><th>Описание</th><th>Цена</th></tr></table>');

                        for(var i =0; i < value['goods'].length ; i++){
                            // $('#' + value.id + ' .goods').append('<li>' + value['goods'][i].name + '</li>');
                            $('#' + value.id + ' .goods').append('<tr>' +
                                '<td>' + value['goods'][i].name + '</td>' +
                                '<td>' + value['goods'][i].model + '</td>' +
                                '<td>' + value['goods'][i].description + '</td>'+
                                '<td>' + value['goods'][i].price + '</td>'+
                                '</tr>')
                        }
                    }
                    else{
                        $('.categories').append('<li id="' + value.id + '">' + value.name +'</li>');
                    }
                });
            }

        },
        'error':function () {
            console.log('Error');
        }

    });

    $(document).on('click', 'a', function (e) {
        $(this).siblings().toggle();
    });

    $(document).on('click', '#btn', function () {
        $.ajax({
            'url':'../api/goods/view',
            'type':'POST',
            'data':{
                'id':3
            },
            'success':function (res) {
                res = JSON.parse(res);
                console.log(res);
            },
            'error':function () {
                console.log('Error');
            }

        })
    })
});