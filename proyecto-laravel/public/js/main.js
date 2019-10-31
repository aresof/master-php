var url = 'http://proyecto-laravel.test';
window.addEventListener("load", function(){

    $('.btn-like').css('cursor','pointer');
    $('.btn-dislike').css('cursor','pointer');

    //Botón like
    function like() {
        $('.btn-like').unbind('click').click(function () {
            console.log('like');
            $(this).addClass('btn-dislike').removeClass('btn-like');
            $(this).attr('src', url+'/images/facebook-like-64_red.png');

            //Llamada jquery a route
            $.get(url+'/like/'+$(this).data('id'), function (response){
                //Actualizacion number like
                var number_likes = response['number_likes'];
                var id = response['id_image'];
                $('.number_likes[data-id='+id+']').html(number_likes);

            }, "json");

/*            //Llamada ajax a route
            $.ajax({
                url: 'http://proyecto-laravel.test/like/'+$(this).data('id'),
                type: 'GET',
                success: function (response) {

                    //Actualizacion number like
                    var number_likes = response['number_likes'];
                    var id = response['id_image'];
                    $('.number_likes[data-id='+id+']').html(number_likes);

                    if(response.like){
                        console.log('Has dado like');
                    }
                    else{
                        console.log('Error al dar like');
                    }
                }
            });*/

            dislike();
        });
    }
    like();

    //Botón dislike
    function dislike() {
        $('.btn-dislike').unbind('click').click(function () {
            console.log('dislike');
            $(this).addClass('btn-like').removeClass('btn-dislike');
            $(this).attr('src', url+'/images/facebook-like-64.png');

            //Llamada jquery a route
            $.get(url+'/dislike/'+$(this).data('id'), function (response){
                //Actualizacion number like
                var number_likes = response['number_likes'];
                var id = response['id_image'];
                $('.number_likes[data-id='+id+']').html(number_likes);

            }, "json");

/*            //Llamada ajax a route
            $.ajax({
                url: 'http://proyecto-laravel.test/dislike/'+$(this).data('id'),
                type: 'GET',
                success: function (response) {

                    //Actualizacion number like
                    var number_likes = response['number_likes'];
                    var id = response['id_image'];
                    $('.number_likes[data-id='+id+']').html(number_likes);

                    if(response.like){
                        console.log('Has dado dislike');
                    }
                    else{
                        console.log('Error al dar dislike');
                    }
                }
            });*/

            like();
        });
    }
    dislike();
});