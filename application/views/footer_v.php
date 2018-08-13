	<div class="continer-fluid bacred2 set-mgn">
		<div class="h080"></div>
		<center>
		<div class="row def-width-1200">
			<div class="col-md-6 tale">
				<a href="#" onclick="moveTop();"><img src="/images/logo.png" style="width:150px;"></a>
				<div class="h030"></div>
				<p class="cp3 twhite we200 lt000 ln18 tale">
					(주)와이에이치 I 대표이사 : 차유성 I 경기도 군포시 산본로 378 산본사이버텔 907호<br>
					사업자등록번호 : 123-86-36014 I 통신판매업신고 : 0214-경기군포-0073 I 개인정보책임자 : 김창환<br>
				</p>	
				<div class="h010"></div>
				<p class="cp3 twhite we500 lt000 ln18">Copyright ©2018 Allen Carr's Easyway (International) Ltd
	All rights reserved</p>
			</div>
			<div class="col-md-6">

			</div>			
		</div>
		<center>
		<div class="h070"></div>
	</div>
		
	<script>
	// Move Top Page
	function moveTop() { $('html, body').animate({'scrollTop' : 0}, 750); }

	// Script for Partner Section
	var swiper = new Swiper('.swiper-container-partner', {
		effect: 'fade',
		loop: true,
		autoplay: {
	        delay: 3500,
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
		slidesPerView: 'auto',
		touchRatio: 0.2,
		slideToClickedSlide: true,
	});
	galleryTop.controller.control = galleryThumbs;
	galleryThumbs.controller.control = galleryTop;
	</script>	
	</body>
</html>