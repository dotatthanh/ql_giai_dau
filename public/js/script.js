var Sliderbookdetail=function(){
	$('.slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		// fade: true,
		asNavFor: '.slider-nav'
		});
	$('.slider-nav').slick({
		slidesToShow: 5,
		slidesToScroll: 1,
		asNavFor: '.slider-for',
		dots: true,
		focusOnSelect: true,
		arrows: false,
		dots: false
	});
};

$(function(){
	Sliderbookdetail();
});