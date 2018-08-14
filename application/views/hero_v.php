	<div class="swiper-container set-mgn" style="margin-top:0px;">
		<div class="swiper-wrapper">
			<div class="swiper-slide">
			 	<div class="title-box container-fluid bblack1 tace" style="background-image: url('/images/background.png'); background-repeat: no-repeat; background-position: -5% 95%; background-size: 45%; margin-top:0px;">	 	
			 		<div class="h100"></div> 
			 		<div class="h010"></div> 		
			 		<p class="tt3 we700 twhite ln15 lt007"> 		
			 			<!--
			 			당신의 금연 역사를 다시 써드립니다.<br>
			 			담배를 피워본 적 없던 삶으로
			 			-->
			 			알렌카, 10월에 새롭고 강해진 모습으로<br>
			 			다시 찾아뵙겠습니다.
			 		</p>
			 		<div class="h050"></div>
			 		<p class="cp4 ln18 twhite2 lt000">Official Trademark</p>
			 		<div class="h005"></div>
			 		<img src="/images/logo.png" style="width: 120px;">
					<div class="h060"></div>	
					<img src="/images/trailer.jpg" data-toggle="modal" data-target="#modal-for-trailer" data-backdrop="static" style="width:300px; border:10px solid #E7E7E7; cursor: pointer;">
					<div class="h080"></div>

					<p class="sns-menu-desk cp2 we700 tgray1 lt000 ln20">
						<img src="/images/icon-kakao.png" style="margin-right: 7px; margin-top:-2px;"> 카카오톡 공식 채널
						<img src="/images/icon-kakao.png" style="margin-left: 20px; margin-right: 7px; margin-top:-2px;"> 네이버 카페
						<img src="/images/icon-blog.png" style="width:25px; margin-left: 20px; margin-right: 7px;"> 네이버 블로그
						<img src="/images/icon-facebook.png" style="width:25px; margin-left: 20px; margin-right: 7px; margin-top:-2px;"> Facebook
					</p>
					<div class="h100"></div>
					<div class="h040"></div>
				</div>				
			</div>
			<div class="swiper-slide"></div>
		</div>		
    	<div class="swiper-pagination" style="margin-bottom:50px;"></div>    	
	</div>

	<!-- movie -->
	<div class="modal fade" id="modal-for-trailer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="container-fluid" style="width:100%; background: rgba(0,0,0,0.5);" onclick="modalClose('#modal-for-trailer');">
			<div class="h100"></div>
			<p class="tari" style="padding-right: 30px;"><a href="#" data-dismiss="modal" onclick="modalClose('#modal-for-trailer');"><img src="/images/icon-close.png" style="width: 19px; height: 18px;"></a></p>
			<div class="h030"></div>
			<div class="container">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/MmQAXVHLCTU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>			 
				</div>
			</div>
			<div class="h100"></div>
		</div>
	</div>

	<script type="text/javascript">
	function modalClose(modalName)
	{
		$(modalName).modal('hide');
		window.location.reload();	// for stopping the movie play
	}
	// Hero Section
	var swiperHero = new Swiper('.swiper-container', {		
		slidesPerView: 1,
		loop: true,      
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},		
	});		
	</script>