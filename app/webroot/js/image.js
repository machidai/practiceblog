$(function () {
   $('button').click(function () {
      $(this).closest('.photo').hide();
        $(this).nextAll('input[value="0"]').attr('value', '1');

});

});
