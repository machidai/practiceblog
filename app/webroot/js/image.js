$(function () {
   $('button').click(function () {
      $(this).closest('.photo').hide();
        $(this).nextAll('input[value="0"]').attr('value', '1');

});
    $('.pop').click(function(e){
        e.preventDefault();
        var id = $(this).attr('href');
        $(id).fadeIn();
        $('.popupbg').fadeIn();
    })
    $('.popupbg,.close_btn').click(function(){
        $('.popup_wrapper:visible').fadeOut();
        $('.popupbg').fadeOut();
    })
});
