$(function () {
    $('button').click(function () {
        $(this).closest('.photo').hide();
        $(this).next('input[value="0"]').val('1');
    });

    $('.photo').each(function(){
        if($(this).nextAll('input[value="1"]')){
            $(this).hide();
        };
    })

    var value = $('.hide').val();
        if(value === "1"){
            $("input[value='1']").closest('.photo').css("display","none");
        };


    var xhr = new XMLHttpRequest();
    xhr.open('GET',);
    xhr.send();

    xhr.onreadystatechange = function(){
        if (xhr.readyState === 4 && xhr.status === 200){

        }
    }
});
//$(window).on('load', function() {

//});
