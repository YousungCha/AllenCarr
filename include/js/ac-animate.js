
// Animation Name and Order
$(window).scroll(function() {
	var scrPos = $(document).scrollTop();
	doAnimation(scrPos,'#mt-value','fadeInDown');
	doAnimation(scrPos,'#st-value','fadeInUp');
	doAnimation(scrPos,'#img1-value','jackInTheBox');
});

// Functions
function doAnimation(scr, tg, ani)
{
	var target = $(tg).offset().top - (window.innerHeight);
	if (scr > target)
	{
		$(tg).css('visibility','visible');
		$(tg).addClass('animated' + " " + ani);
	}
}

setInterval(function circleMoving() {
	$("#aniCircle_1").animate({
		width: '220px',
		height: '220px',
		top: '-35px',
		left: '-35px',
		opacity: '0.0'
	}, 2000);
	window.setTimeout(function() {
		$("#aniCircle_2").animate({
			width: '220px',
			height: '220px',
			top: '-35px',
			left: '-35px',
			opacity: '0.0'
		}, 2000);
	}, 750);

	$("#aniCircle_1, #aniCircle_2").animate({
		width: '150px',
		height: '150px',
		top: '0px',
		left: '0px',
		opacity: '1.0'
	}, 0);	
}, 2500);

