
	<!-- Swiper -->
	<div class="swiper-container set-mgn">
		<div class="swiper-wrapper">
			<!-- Slide 1 -->
			<div class="swiper-slide bacred2">
				<div class="h070"></div>
				<p class="dp1 we700 twhite tace ln15">이제 집에서 테라피스트를 만나세요!</p>
				<p class="dp3 we700 twhite1 tace ln15">
					알렌카, 온라인 라이브 금연테라피를 곧 개시합니다.
				</p>
				<div class="h080"></div>
			</div>

			<!-- Slide 2 -->
			<div class="swiper-slide bacnavy" style="background-color: #95CFD3;">
				<div class="h070"></div>
				<p class="dp1 we700 twhite tace ln15">이제 집에서 테라피스트를 만나세요!</p>
				<p class="dp3 we700 twhite1 tace ln15">
					알렌카, 온라인 라이브 금연테라피를 곧 개시합니다.
				</p>
				<div class="h080"></div>
			</div>
		</div>	

	    <!-- Add Arrows -->
	    <!--
	    <div class="swiper-button-next"></div>
	    <div class="swiper-button-prev"></div>
		-->
	</div>

	<!-- Swiper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>

	<!-- Initialize Swiper -->
	<script>
	var swiper = new Swiper('.swiper-container', {
		effect: 'fade',
		loop: true,
		/*
		autoplay: {
	        delay: 3500,
	        disableOnInteraction: false,
      	},
      	*/
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		pagination: {
	        el: '.swiper-pagination',
	        clickable: true,
      	},
	});
	</script>