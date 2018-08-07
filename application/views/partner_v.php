	<!-- Partners -->
	<div class="h010"></div>
	<div class="container-fluid">
		<div class="h080"></div>
		<center>
		<div class="row def-width-1000">
			<div class="col-md-6">
				<p class="sb3 we700 ln18 lt009 tale">
					대한민국의 앞서가는 기업들<br>
					그들의 금연 파트너로서<br>알렌카가 함께합니다.
				</p>
			</div>
			<div class="col-md-6">
				<div class="h060"></div>
				<p class="cp1 we300 ln18 tale">
					매년 금연 행사를 개최해도 사내 흡연률이 제자리라면?<br>
					전시행정으로서의 금연을 원치 않는다면, <b class="tacred">실질적인 성과를 드리는 알렌카</b>가 답이 될 것입니다.
				</p>
			</div>
			<div class="h050"></div>

			<!-- Swiper -->					
			<style type="text/css">
			    .gallery-top {
			      height: 80%;
			      width: 100%;
			    }
			    .gallery-thumbs {
			      height: 20%;
			      box-sizing: border-box;
			      padding: 10px 0;
			    }
			    .gallery-thumbs .swiper-slide {
			      width: 25%;
			      height: 100%;
			      opacity: 0.4;
			      -webkit-filter: grayscale(100%);
			      filter: gray;
			    }
			    .gallery-thumbs .swiper-slide-active {
			      opacity: 1;
			      -webkit-filter: grayscale(0%);
			      filter: none;
			    }				
			</style>
			<div class="def-width-1000" style="height: 700px;">
				<div class="swiper-container gallery-top">
					<div class="swiper-wrapper">
						<div class="swiper-slide"><img src="/images/partners/wait/gov-gray.jpg" width="100%"></div>
						<div class="swiper-slide"><img src="/images/partners/wait/pa-gray.jpg" width="100%"></div>
						<div class="swiper-slide"><img src="/images/partners/wait/bnk-gray.jpg" width="100%"></div>
						<div class="swiper-slide"><img src="/images/partners/wait/nera-color.jpg" width="100%"></div>
						<div class="swiper-slide"><img src="/images/partners/wait/chong-gray.jpg" width="100%"></div>
						<div class="swiper-slide"><img src="/images/partners/wait/lg-gray.jpg" width="100%"></div>

					</div>
					<!-- Add Arrows -->
					<div class="swiper-button-next swiper-button-white"></div>
					<div class="swiper-button-prev swiper-button-white"></div>
				</div>
				<div class="swiper-container gallery-thumbs">
					<div class="swiper-wrapper">
						<div class="swiper-slide"><img src="/images/partners/wait/gov-small.jpg" width="100%"></div>
						<div class="swiper-slide"><img src="/images/partners/wait/pa-small.jpg" width="100%"></div>
						<div class="swiper-slide"><img src="/images/partners/wait/bnk-small.jpg" width="100%"></div>
						<div class="swiper-slide"><img src="/images/partners/wait/nera-small.jpg" width="100%"></div>
						<div class="swiper-slide"><img src="/images/partners/wait/chong-small.jpg" width="100%"></div>
						<div class="swiper-slide"><img src="/images/partners/wait/lg-small.jpg" width="100%"></div>
					</div>
				</div>
			</div>			
		</div>
		</center>
		<div class="h100"></div>
		<div class="h050"></div>
	</div>

	<!-- Swiper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.js"></script>

	<!-- Initialize Swiper -->
	<script>
	var galleryTop = new Swiper('.gallery-top', {
		spaceBetween: 10,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		autoplay: {
	        delay: 3500,
	        disableOnInteraction: true,
      	},
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