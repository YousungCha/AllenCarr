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
						<?php if ($this->session->userdata('email') == "master@allencarr.co.kr") : ?>
							<font class="txt-menu tblack1" onclick="location.href='<?=site_url("AdminSystem")?>'">관리자페이지</font>
						<?php endif ?>
						<?php if ($this->session->userdata('email')) : ?>
							<font class="txt-menu tblack1" onclick="location.href='<?=site_url("MainSystem/MyPage")?>'">마이페이지(<?=$this->session->userdata('email')?>)</font>						
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
					<td class="cp4 tblack1 tari" style="background-color: #F5F5F5;">
						<?php if ($this->session->userdata('email') == "master@allencarr.co.kr") : ?>
							<font class="txt-menu tblack1" onclick="location.href='<?=site_url("AdminSystem")?>'">관리자페이지</font>
						<?php endif ?>						
						<?php if ($this->session->userdata('email')) : ?>
							<font class="txt-menu tblack1" onclick="location.href='<?=site_url("MainSystem/MyPage")?>'">마이페이지(<?=$this->session->userdata('email')?>)</font>								
							<font class="txt-menu" onclick="location.href='<?=site_url("MainSystem/btnLogout")?>'">LOG-OUT</font>
						<?php else : ?>						
							<font class="txt-menu" onclick="location.href='<?=site_url("MainSystem/Login")?>'">LOG-IN</font>
						<?php endif ?>
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
						<img src="/images/logo.png" style="width: 90px;" onclick="location.href='<?=site_url("MainSystem")?>'">
					</td>
					<td align="right">
						<a href="javascript:void(0);" onclick="menuSlide();" id="smallMenu"><img src="/images/menu-icon.png"></a>
					</td>
				</tr>
			</table>
		</div>
		<div class="menu-contents bacnavy">
						
			<?php if (!$this->uri->segment(2)) : ?>						
			<table width="100%">								
				<tr onclick="MoveScroll_m('tag-value')">
					<td class="dp3 twhite pdg25" style="border-bottom: 1px solid #555555; padding-left: 0px;">Values</td>
				</tr>
				<tr onclick="MoveScroll_m('tag-method')">
					<td class="dp3 twhite pdg25" style="border-bottom: 1px solid #555555; padding-left: 0px;">Method</td>
				</tr>
				<tr onclick="MoveScroll_m('tag-team')">
					<td class="dp3 twhite pdg25" style="border-bottom: 1px solid #555555; padding-left: 0px;">Team</td>
				</tr>
				<tr onclick="MoveScroll_m('tag-partner')">
					<td class="dp3 twhite pdg25" style="border-bottom: 1px solid #555555; padding-left: 0px;">Partners</td>
				</tr>
				<tr onclick="MoveScroll_m('tag-testi')">
					<td class="dp3 twhite pdg25" style="border-bottom: 1px solid #555555; padding-left: 0px;">TESTIMONIAL</td>
				</tr>
				<tr onclick="MoveScroll_m('tag-faq')">
					<td class="dp3 twhite pdg25" style="border-bottom: 1px solid #555555; padding-left: 0px;">FAQ</td>
				</tr>				
				<tr onclick="location.href='<?=site_url('MainSystem/Book')?>'">
					<td class="dp3 twhite pdg25" style="border-bottom: 1px solid #555555; padding-left: 0px;"><b>예약페이지 바로가기</b></td>
				</tr>				
			</table>
			<?php else : ?>
			<table width="100%">		
				<tr onclick="location.href='<?=site_url('MainSystem/Book')?>'">
					<td class="dp3 twhite pdg25" style="border-bottom: 1px solid #555555; padding-left: 0px;">예약페이지</td>
				</tr>				
				<?php if ($this->session->userdata('email') == "master@allencarr.co.kr") : ?>						
					<tr onclick="location.href='<?=site_url('AdminSystem')?>'">
						<td class="dp3 twhite pdg25" style="border-bottom: 1px solid #555555; padding-left: 0px;">관리자페이지</td>
					</tr>									
				<?php endif ?>
				<?php if ($this->session->userdata('email')) : ?>						
					<tr onclick="location.href='<?=site_url('MainSystem/MyPage')?>'">
						<td class="dp3 twhite pdg25" style="border-bottom: 1px solid #555555; padding-left: 0px;">마이페이지</td>
					</tr>									
					<tr onclick="location.href='<?=site_url('MainSystem/btnLogout')?>'">
						<td class="dp3 twhite pdg25" style="border-bottom: 1px solid #555555; padding-left: 0px;">로그아웃</td>
					</tr>
				<?php else : ?>					
					<tr onclick="location.href='<?=site_url('MainSystem/Login')?>'">
						<td class="dp3 twhite pdg25" style="border-bottom: 1px solid #555555; padding-left: 0px;">로그인</td>
					</tr>
				<?php endif ?>				
			</table>				
			<?php endif ?>			
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
		var brHeight = window.innerHeight;
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