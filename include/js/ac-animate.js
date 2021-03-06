
// Animation Name and Order
$(window).scroll(function() {
	var scrPos = $(document).scrollTop();
	doAnimation(scrPos,'p#mt-value','fadeInDown');
	/*
	doAnimation(scrPos,'#st-value','fadeInUp');
	doAnimation(scrPos,'#img1-value','jackInTheBox');
	doAnimation(scrPos,'#tbox1-value','flipInY');
	doAnimation(scrPos,'#tbox2-value','flipInX');
	doAnimation(scrPos,'#tbox1-prog','fadeInDown');
	doAnimation(scrPos,'#tbox2-prog','fadeInUp');
	doAnimation(scrPos,'#tbox3-prog','fadeInUp');
	doAnimation(scrPos,'#title-method','fadeInDown');
	doAnimation(scrPos,'#sub-method','fadeInUp');
	progLine(scrPos);
	methodBox(scrPos);
	*/
	$('.ani-circle-par').css("visibility","visible");
	$('.ani-circle-chd').css("visibility","visible");
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


var progFlag = false;
function progLine(scr)
{	
	var target = $("#prg-table").offset().top - (window.innerHeight);
	if (scr >= target && progFlag === false)
	{
		progFlag = true;
		$("#prg-table").stop().animate({"width":"90%"},500);
		$(".prg-circle").stop().animate({"top":"-11px"},500);
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
	setTimeout(function() {
		$("#aniCircle_2").animate({
			width: '220px',
			height: '220px',
			top: '-35px',
			left: '-35px',
			opacity: '0.0'
		}, 1500);
	}, 750);
	$("#aniCircle_1, #aniCircle_2").animate({
		width: '150px',
		height: '150px',
		top: '0px',
		left: '0px',
		opacity: '1.0'
	}, 0);	
}, 2250);

function methodBox(scr)
{	
	var target = $("#sub-method").offset().top - (window.innerHeight) + 250;
	if (scr >= target)
	{
		console.log(scr + "," + target);
		setTimeout(function(){ $("#tbox1-method").css("visibility","visible").addClass('animated fadeInUp') },0);
		setTimeout(function(){ $("#tbox2-method").css("visibility","visible").addClass('animated fadeInUp') },250);
		setTimeout(function(){ $("#tbox3-method").css("visibility","visible").addClass('animated fadeInUp') },500);
	}
}