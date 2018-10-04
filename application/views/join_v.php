	<!-- Booking Page -->
	<div class="container-fluid bacnavy set-mgn" style="margin-top:0px;">
		<div class="h080"></div>
		<p class="sb2 we700 tace ln15 twhite">
			알렌카 회원 가입
		</p>
		<div class="h015"></div>
		<p class="cp3 tace lt100 tsilver ln18">Member Join</p>
		<div class="h050"></div>

		<center>
		<div class="row def-width-600 bwhite pdg30 tale">
			<?php 
				$attributes = array('name' => 'memberRegistration', 'method' => 'post');
				echo form_open(site_url('MainSystem/btnMemberRegister'),$attributes); 
			?>
				<div class="h015"></div>
				<font class="dp4">이메일 <font class="cp1 tgray1 we500">E-mail</font></font>
				<div class="h015"></div>
				<p class="cp2 we200 tgray1 ln15">로그인시 아이디로 쓰이며, 테라피 신청시에도 주요 정보가 전달되므로 정확한 기입이 필요합니다.</p>
				<input type="email" name="email" style="height: 35px; width: 100%; border:0px; border-bottom: 1px solid silver;">
				<div class="h010"></div>
				<p id="errEmail" class="cp3 torange" style="display: none;">이메일을 입력하세요.</p>
				<p id="errEmailValid" class="cp3 torange" style="display: none;">올바른 형식의 이메일을 입력하세요.</p>
				<p id="errEmailExist" class="cp3 torange" style="display: none;">이미 가입된 이메일입니다.</p>
				<div class="h030"></div>
				<font class="dp4">비밀번호 <font class="cp1 tgray1">password</font></font>
				<div class="h015"></div>
				<font class="cp2 we200 tgray1">8 ~ 32자 사이의 비밀번호를 입력해주세요.</font>
				<div class="h015"></div>
				<input type="password" name="password" style="height: 35px; width: 100%; border:0px; border-bottom: 1px solid silver;">
				<div class="h010"></div>
				<p id="errPassword" class="cp3 torange" style="display: none;">비밀번호를 입력하세요.</p>
				<p id="errPasswordLength" class="cp3 torange" style="display: none;">비밀번호는 8 ~ 32자 사이로 입력해주세요.</p>

				<div class="h030"></div>
				<font class="cp2 we200 tgray1">비밀번호를 한 번 더 정확하게 입력해주세요.</font>
				<div class="h015"></div>
				<input type="password" name="re-password" style="height: 35px; width: 100%; border:0px; border-bottom: 1px solid silver;">			
				<div class="h010"></div>
				<p id="errRePassword" class="cp3 torange" style="display: none;">비밀번호를 다시 한 번 입력하세요.</p>
				<p id="errPasswordMatch" class="cp3 torange" style="display: none;">비밀번호가 틀립니다. 다시 한 번 확인해주세요.</p>
				<div class="h030"></div>				
				<center>
				<button class="btn-general bacred2 pdg15 twhite cp1 we200" type="button" onclick="formSubmit();" style="margin-right: 15px; height: 55px; width: 100%">알렌카 회원가입</button>
				</center>
				<div class="h015"></div>
			</form>
		</div>
		<div class="h100"></div>		
		</center>		
	</div>

	<script type="text/javascript">
		function formSubmit()
		{
			valSuccess = true;
			var email = $('input[name="email"]').val();
			var password = $('input[name="password"]').val();
			var rePassword = $('input[name="re-password"]').val();
			$("#errEmail, #errEmailValid, #errEmailExist, #errPassword, #errRePassword, #errPasswordLength, #errPasswordMatch").css("display","none");

			if (!email) 
			{
				$("#errEmail").css("display","inline");
				valSuccess = false;
			}
			else if (!isEmail(email))
			{
				$("#errEmailValid").css("display","inline");
				valSuccess = false;
			}
			//alert(checkEmailExist(email));
			
			else if (checkEmailExist(email))
			{
				$("#errEmailExist").css("display","inline");
				valSuccess = false;
			}
			
			if (!password) 
			{
				$("#errPassword").css("display","inline");
				valSuccess = false;
			}			
			else if (password.length < 8)
			{
				$("#errPasswordLength").css("display","inline");
				valSuccess = false;
			}
			if (!rePassword)
			{
				$("#errRePassword").css("display","inline");
				valSuccess = false;
			}
			else if (password != rePassword)
			{
				$("#errPasswordMatch").css("display","inline");
				valSuccess = false;
			}
			if (valSuccess)
			{
				var frm = $('form[name="memberRegistration"]');
				frm.submit();
			}			
		}
		function isEmail(email) 
		{
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			return regex.test(email);
		}
		// 더보기 구현
	    function checkEmailExist(emailValue){	   

	    	var email = $('input[name="email"]').val();
	    	var result;
			$.ajax({
				type : 'post',
				url : '/MainSystem/checkEmailExist/',
				data : {email:emailValue},
				dataType : 'html',	            
				async : false,

				success: function(endData) {
					result = endData;
				},
				error: function(xhr, status, error){
					
				}
			});
			if (result === "true") return true;
			else return false;
	    }		
	</script>