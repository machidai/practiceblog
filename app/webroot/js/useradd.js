$(function (){
    //alert('jQuery is ready.')
    $("input[type='text']").on('change',function(){
        $.ajax({
            url: "/zipcodes/fetch",
            type: 'POST',
            success: function (data) {
                //console.log(data);
                alert('success');
            },
            error: function () {
                alert("読み込み失敗");
            }
        });
    });
});
