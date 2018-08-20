	<div class="continer-fluid bacred2 set-mgn">
		<div class="h080"></div>
		<center>
		<div class="row def-width-1200">
			<div class="col-md-6 tale">
				<a href="#" onclick="moveTop();"><img src="/images/logo.png" style="width:180px;"></a>
				<div class="h020"></div>
				<p class="cp3 twhite we200 lt003 ln18 tale">
					(주)와이에이치 I 대표이사 : 차유성 I 경기도 군포시 산본로 378 산본사이버텔 907호<br>
					사업자등록번호 : 123-86-36014 I 통신판매업신고 : 0214-경기군포-0073 I 개인정보책임자 : 김창환<br>
				</p>	
				<p class="cp3 twhite we500 lt000 ln18">Copyright ©2018 Allen Carr's Easyway (International) Ltd
	All rights reserved</p>
				<div class="h010"></div>
			</div>
			<div class="col-md-6">

			</div>			
		</div>
		<center>
		<div class="h070"></div>
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
		virtualTranslate: false,
		on:{
			transitionStart: function() {
				translate = this.getTranslate();
				console.log('translate',translate);
				slidesPerView = this.params.slidesPerView == 'auto ' ?this.slidesPerViewDynamic() : this.params.slidesPerView;
				console.log(this,this.slidesPerView,this.slides.length);
				if(this.slides.length<=slidesPerView) {
					return;
				}

				var y = 0;
				var z = 0;
				var x = 0;

				if(this.activeIndex > slidesPerView / 2)
				{
					console.log(this.activeIndex);
					translate = this.activeIndex == this.slides.length - 1 ? - this.snapGrid[this.snapGrid.length - 2] : this.translate;

					if (this.isHorizontal()) {
						x = this.params.rtl ? -translate : translate;
					} 
					else {
						y = translate;
					}

					if (this.roundLengths) {
						x = Math.floor(x);
						y = Math.floor(y);
					}
				}

				if (this.support.transforms3d) { 
					this.$wrapperEl.transform(("translate3d(" + x + "px, " + y + "px, " + z + "px)")); 
				}
				else { 
					this.$wrapperEl.transform(("translate(" + x + "px, " + y + "px)")); 
				}

			}
			},		
	});
	galleryTop.controller.control = galleryThumbs;
	galleryThumbs.controller.control = galleryTop;
	</script>	
	</body>
</html>