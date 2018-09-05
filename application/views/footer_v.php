	<div class="continer-fluid bacred2 set-mgn">
		<div class="h060"></div>
		<center>		
			<a href="#" onclick="moveTop();"><img src="/images/logo.png" style="width:180px;"></a>
			<div class="h030"></div>
			<p class="cp3 twhite we200 lt003 ln18">
				(주)와이에이치 I 대표이사 : 차유성 I 경기도 군포시 산본로 378 산본사이버텔 907호<br>
				사업자등록번호 : 123-86-36014 I 통신판매업신고 : 0214-경기군포-0073 I 개인정보책임자 : 김창환<br>
				Tel : 1599-5332&nbsp;&nbsp;&nbsp;&nbsp;E-mail : <a class="twhite2 lt000" href="mailto:master@allencarr.co.kr" >master@allencarr.co.kr</a>
			</p>	
			<div class="h015"></div>
			<p class="cp4 twhite we500 lt000 ln18">Copyright ©2018 Allen Carr's Easyway (International) Ltd
All rights reserved</p>
		<center>
		<div class="h050"></div>
	</div>

	<script type="text/javascript">

	// Open Section
	function openSection(id)
	{		
		data = "div#" + id;	
		if ($(data).css('display') == 'none') {			
			$(data).slideDown(300);
			$(".plus_" + id).html("-");
		}	
		else {
			$(data).slideUp(300);
			$(".plus_" + id).html("+");
		}		
	}		

	// Move Top Page
	function moveTop() { $('html, body').animate({'scrollTop' : 0}, 750); }

	// Script for Partner Section
	var swiper = new Swiper('.swiper-container-partner', {
		effect: 'fade',
		speed: 1500,
		loop: true,
		autoplay: {
	        delay: 3000,
	        disableOnInteraction: false,
      	},
	});

	// Script for Thumbnail Gallery Section
	var galleryTop = new Swiper('.gallery-top', {
		spaceBetween: 10,
	});
	var galleryThumbs = new Swiper('.gallery-thumbs', {		
		spaceBetween: 10,
		centeredSlides: true,
		slidesPerView: '4',
		touchRatio: 0.2,
		slideToClickedSlide: true,

	});
	galleryTop.controller.control = galleryThumbs;
	galleryThumbs.controller.control = galleryTop;
	</script>	
	</body>
</html>