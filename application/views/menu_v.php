	<div class="bblack1 set-mgn" id="desk_menu" style="width: calc(100% - 20px); z-index: 255; margin-top:0px;">
		<div class="container-fluid pdg00">
			<table width="100%">
				<tr>	
					<td class="cp2 we700 twhite bacred pdg20" style="width: 350px;">
						무엇을 도와드릴까요?
					</td>	
					<td class="bacred tace" style="width:50px;">
						<img src="/images/icon-arrowdown.png">
					</td>
					<td class="cp4 tblack1 pdglr30" style="background-color: #F5F5F5;">
						<font class="txt-menu" onclick="MoveScroll('tag-value')">VALUES</font>
						<font class="txt-menu" onclick="MoveScroll('tag-method')">METHOD</font>
						<font class="txt-menu" onclick="MoveScroll('tag-team')">TEAM</font>						
						<font class="txt-menu" onclick="MoveScroll('tag-partner')">PARTNERS</font>
						<font class="txt-menu" onclick="MoveScroll('tag-testi')">TESTIMONIAL</font>
						<font class="txt-menu" onclick="MoveScroll('tag-faq')">FAQ</font>		
					</td>					
				</tr>
			</table>
		</div>
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
	</script>