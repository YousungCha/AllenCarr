	<div class="continer-fluid bacnavy set-mgn">
    <div class="h020 desk"></div>
    <center>
    <div class="def-width-1000 tale pdg20">
	   	<div class="h030"></div>			
      <a href="#" onclick="moveTop();"><img src="/images/logo.png" style="width:150px;"></a>
      <div class="h030"></div>
      <p class="cp3 twhite we200 lt003 ln18">
      (주)와이에이치 I 대표이사 : 차유성 I 경기도 군포시 산본로 378, 907<br>
      사업자등록번호 : 123-86-36014 I 통신판매업신고 : 0214-경기군포-0073 I 개인정보책임자 : 김창환<br>
      문의(개인) : <font class="torange">1599-5332</font>&nbsp;&nbsp;&nbsp;&nbsp;E-mail : <a class="twhite2 lt000" href="mailto:master@allencarr.co.kr" >master@allencarr.co.kr</a><br>
      문의(기업) : <font class="torange">080-080-8883</font>&nbsp;&nbsp;&nbsp;&nbsp;
      </p>	
      <div class="h015"></div>
      <p class="cp4 twhite we500 lt000 ln18">Copyright ©2018 Allen Carr's Easyway (International) Ltd
      All rights reserved</p>

      <div class="h020"></div>
    </div>
    </center> 
    <div class="h020 desk"></div>
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
		speed: 1000,
		loop: true,
		autoplay: {
	        delay: 1000,
	        disableOnInteraction: false,
      	},
	});

	// Script for Thumbnail Gallery Section
  function slideOtherGalleryTo(sGalleryName, nSlideIndex)
  {
      sGalleryName.slideTo(nSlideIndex);
  }
  
  var galleryTop = new Swiper('.gallery-top', {
        spaceBetween: 0,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        slidesPerView: 1,
        on:{
            transitionStart:function()
            {
                  // Move thumbnails Gallery to the selected image
                  slideOtherGalleryTo(galleryThumbs, this.activeIndex);
            }
        }
      });
  var galleryThumbs = new Swiper('.gallery-thumbs', {
    spaceBetween: 10,
    slidesPerView: 4,
    touchRatio: 0.2,
    slideToClickedSlide: true,
    centeredSlides: true,
    virtualTranslate: false,
    on:{
          transitionStart: function(){
              translate = this.getTranslate();
              slidesPerView = this.params.slidesPerView == 'auto ' ?this.slidesPerViewDynamic() : this.params.slidesPerView;                
              if(this.slides.length<=slidesPerView){
                  return;
              }

              var y = 0;
              var z = 0;
              var x = 0;

              if(this.activeIndex>1 && this.activeIndex > slidesPerView/2)
              {
                  translate = this.activeIndex == this.slides.length -1 ? -this.snapGrid[this.snapGrid.length - 2] : this.translate;

                  if (this.isHorizontal()) {
                      x = this.params.rtl ? -translate : translate;
                  } else {
                      y = translate;
                  }

                  if (this.roundLengths) {
                      x = Math.floor(x);
                      y = Math.floor(y);
                  }
              }else
              {
                  y = 0;
                  z = 0;
                  x = 0;

              }                
              if (this.support.transforms3d) { this.$wrapperEl.transform(("translate3d(" + x + "px, " + y + "px, " + z + "px)")); }
              else { this.$wrapperEl.transform(("translate(" + x + "px, " + y + "px)")); }
           	 // Move main Gallery to the selected image
              slideOtherGalleryTo(galleryTop, this.activeIndex);
          }
      },
  });
  //galleryTop.controller.control = galleryThumbs;
  //galleryThumbs.controller.control = galleryTop;
	</script>	

	</body>
</html>