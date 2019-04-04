$(function(){

// モーダルウィンドウが開くときの処理
$(".modalOpen").click(function(){

    var navClass = $(this).attr("class"),//navClassに”modalOpen”を取得
        href = $(this).attr("href");//href="#modal01”を取得
        $(href).show();//#modal01をfadeInする
    $(this).addClass("open");

     $(href).children(".inner").css("animation","fadeIn 2s ease 0s 1 normal");//href(#modal01)の子要素である.innerを取得してcssを加える
    return false;
});

//slider
/*
var slideWidth = $('.slide').outerWidth();	// .slideの幅を取得して代入
	var slideNum = $('.slide').length;	// .slideの数を取得して代入
	var slideSetWidth = slideWidth * slideNum;	// .slideの幅×数で求めた値を代入
	$('.slideSet').css('width', slideSetWidth);	// .slideSetのスタイルシートにwidth: slideSetWidthを指定

	var slideCurrent = 0;	// 現在地を示す変数

	// アニメーションを実行する独自関数
	var sliding = function(){
		// slideCurrentが0以下だったら
		if( slideCurrent < 0 ){
			slideCurrent = slideNum - 1;

		// slideCurrentがslideNumを超えたら
		}else if( slideCurrent > slideNum - 1 ){	// slideCUrrent >= slideNumでも可
			slideCurrent = 0;

		}

		$('.slideSet').stop().animate({
			left: slideCurrent * -slideWidth
		});
	}

	// 前へボタンが押されたとき
	$('.slider-prev').click(function(){
		slideCurrent--;
		sliding();
	});

	// 次へボタンが押されたとき
	$('.slider-next').click(function(){
		slideCurrent++;
		sliding();
	});*/
});
