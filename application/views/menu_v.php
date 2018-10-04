	<div class="bblack1 set-mgn" id="desk_menu" style="width: calc(100% - 20px); z-index: 255; margin-top:0px;">
		<div class="container-fluid pdg00">
			<table width="100%">
				<tr>
					<?php if ($this->uri->segment(2)) : ?>	
					<td class="cp2 we700 twhite bacred pdg20" onclick="location.href='<?=site_url("MainSystem")?>'" style="width: 350px; cursor: pointer;">메인으로 돌아가기</td>
					<td class="bacred tace" style="width:50px;"><img src="/images/icon-arrowdown.png"></td>
					<td class="cp4 tblack1 pdglr30" style="background-color: #F5F5F5;">						

						<font class="txt-menu" onclick="location.href='<?=site_url("MainSystem/Book")?>'">BOOKING PAGE</font>
					</td>
					<td class="cp4 tblack1 tari" style="background-color: #F5F5F5;">
						<?php if ($this->session->userdata('email')) : ?>
						<font class="txt-menu tblack1">마이페이지(<?=$this->session->userdata('email')?>)</font>
						<font class="txt-menu" onclick="location.href='<?=site_url("MainSystem/btnLogout")?>'">LOG-OUT</font>
						<?php else : ?>						
						<font class="txt-menu" onclick="location.href='<?=site_url("MainSystem/Login")?>'">LOG-IN</font>
						<?php endif ?>
					</td>
					<?php else : ?>
					<td class="cp2 we700 twhite bacred pdg20" onclick="location.href='<?=site_url("MainSystem/Book")?>'" style="width: 350px; cursor: pointer;">예약일정 확인하기</td>
					<td class="bacred tace" style="width:50px;"><img src="/images/icon-arrowdown.png"></td>
					<td class="cp4 tblack1 pdglr30" style="background-color: #F5F5F5;">
						<font class="txt-menu" onclick="MoveScroll('tag-value')">VALUES</font>
						<font class="txt-menu" onclick="MoveScroll('tag-method')">METHOD</font>
						<font class="txt-menu" onclick="MoveScroll('tag-team')">TEAM</font>						
						<font class="txt-menu" onclick="MoveScroll('tag-partner')">PARTNERS</font>
						<font class="txt-menu" onclick="MoveScroll('tag-testi')">TESTIMONIAL</font>
						<font class="txt-menu" onclick="MoveScroll('tag-faq')">FAQ</font>		
					</td>					
					<?php endif ?>											
				</tr>
			</table>
		</div>
	</div>

	<div class="mobile-menu">
		<div class="menu-bar bacnavy">
			<table width="100%">
				<tr>
					<td>
						<img src="/images/logo.png" width="25%" onclick="MoveTop();">
					</td>
					<td>
						<a href="javascript:void(0);" onclick="menuSlide();" id="smallMenu"><img src="/images/menu-icon.png"></a>
					</td>
				</tr>
			</table>
		</div>
		<div class="menu-contents bacnavy">
			dfsdfdfsfddsffds<br>
			dfsdfdfsfddsffds<br>
			dfsdfdfsfddsffds<br>
			dfsdfdfsfddsffds<br>
			dfsdfdfsfddsffds<br>
			dfsdfdfsfddsffds<br>
		</div>		
		<div style="height: 1px; background-color: #555555;"></div>
	</div>

	<script type="text/javascript">
	function MoveScroll(name)
	{
		$('html, body').animate({'scrollTop' : $("#" + name).offset().top}, 800);			
	}		
	$(window).scroll(function(event) {
		var st = $(this).scrollTop();
		if (st >= window.innerHeight)
		{
			$('#desk_menu').css('position','fixed');
			$('#desk_menu').addClass('animated fadeInDown');
		}
		else {
			$('#desk_menu').css('position','relative');	
			$('#desk_menu').removeClass('animated fadeInDown');
		}
	});

	// Mobile Menu Slide
	function menuSlide() 
	{
		var brHeight = window.innerHeight - 68;
		$('.menu-contents').css('height',brHeight);
		if ($('.menu-contents').css('display') == 'none') {
			$('.menu-contents').slideDown(550,'easeOutQuart');
		}			
		else {
			$('.menu-contents').slideUp(550,'easeOutQuart');
		}
	}
	function MoveTop()
	{
		$('html, body').animate({'scrollTop' : 0}, 800);
	}
	function MoveScroll(name)
	{
		$('html, body').animate({'scrollTop' : $("#" + name).offset().top}, 800);			
	}
	function MoveScroll_m(name)
	{
		$('html, body').animate({'scrollTop' : $("#" + name).offset().top}, 800);
		$('.menu-contents').slideUp(550,'easeOutQuart');			
	}	
	</script>