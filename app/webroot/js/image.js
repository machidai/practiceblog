$(function () {
    $('button').click(function () {
        var $photo = $(this).closest('.photo');
        photoHide($photo);
        $(this).next('input[value="0"]').val('1');
    });

    //$('.photo').each(function(){
    //    if($(this).nextAll('input[value="1"]')){
    //        $(this).hide();
    //    };
    //})
     $('.hide').each(function(){
        var value = $(this).val();
        if (value === "1"){
            var $photo = $(this).closest('.photo');
            photoHide($photo);
        };
    });
    
    function photoHide($photo) {
        $photo.addClass('d-none');
    }

    //var xhr = new XMLHttpRequest();
    //xhr.open('GET',);
    //xhr.send();

    //xhr.onreadystatechange = function(){
        //if (xhr.readyState === 4 && xhr.status === 200){

        //}
    //}
});
//$(window).on('load', function() {

//});
