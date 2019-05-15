$(function (){
    //alert('jQuery is ready.')

    $("#zip_input").blur(function(){
        var zipcode = $(this).val();
        var zipcodecount = zipcode.length;
        if(zipcodecount<=6){
           $(".error_box").text('文字数が足りません。');
       }

       $.ajax({
           url: "/zipcodes/fetch",
           type: 'POST',
           data:{
               'zipcode':$('#zip_input').val(),
           },
           dataType : "json",
           success: function (data) {
       //    var obj = $.parseJSON(data);
          var jsondata = jQuery.parseJSON(data);
         // var jsondata = JSON.parse(data);
           $(".text").val(jsondata);
       //    console.log(jsondata);
           },
           error: function () {
               alert("読み込み失敗");
           }
       });

    });

    //$("input[type='text']").blur(function(){

    //});

});
