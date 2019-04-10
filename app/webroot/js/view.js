$(function(){

// モーダルウィンドウが開くときの処理
$(".modalOpen").click(function(){
    $modal = $(this).closest('.me').find('.modal');
    $modal.show();//#modal01をfadeInする
    $modal.children(".inner").css("animation","fadeIn 2s ease 0s 1 normal");//href(#modal01)の子要素である.innerを取得してcssを加える

    if(!$modal.closest('.me').prev('.me')[0]){
        $modal.find('.slider-prev').hide();
    };
    if(!$modal.closest('.me').next('.me')[0]){
        $modal.find('.slider-next').hide();
    };
    return false;
});

$(".slider-next").click(function(){
    $(this).closest('.modal').hide();
    $nextModal = $(this).closest('.me').next('.me').find('.modal');
    if(!$nextModal.closest('.me').prev('.me')[0]){
        $nextModal.find('.slider-prev').hide();
    };
    if(!$nextModal.closest('.me').next('.me')[0]){
        $nextModal.find('.slider-next').hide();
    };
    $nextModal.show();
    $nextModal.children(".inner").css("animation","fadeIn 2s ease 0s 1 normal");

});

$(".slider-prev").click(function(){
    $(this).closest('.modal').hide();
    $prevModal = $(this).closest('.me').prev('.me').find('.modal');
    if(!$prevModal.closest('.me').prev('.me')[0]){
        $prevModal.find('.slider-prev').hide();
    };
    if(!$prevModal.closest('.me').next('.me')[0]){
        $prevModal.find('.slider-next').hide();
    };
    $prevModal.show();
    $prevModal.children(".inner").css("animation","fadeIn 2s ease 0s 1 normal");
});

$(".modalClose").click(function(){
   $(this).parents(".modal").hide();
   return false
});
});
