	<!-- Booking Page -->
	<div class="container-fluid bacnavy set-mgn" style="margin-top:0px;">
		<div class="h080"></div>
		<p class="sb2 we700 tace ln15 twhite">
			알렌카 회원 로그인
		</p>
		<div class="h015"></div>
		<p class="cp3 tace lt100 tsilver ln18">Member Login</p>
		<div class="h050"></div>

		<center>
		<div class="row def-width-600 bwhite pdg30 tale">
			<?php 
				$attributes = array('name' => 'memberLogin', 'method' => 'post');
				echo form_open(site_url('MainSystem/btnLogin'),$attributes); 
			?>			
				<div class="h015"></div>
				<font class="dp4">이메일 <font class="cp1 tgray1">E-mail</font></font>
				<div class="h015"></div>
				<input type="email" name="email" style="height: 35px; width: 100%; border:0px; border-bottom: 1px solid silver;">
				<div class="h030"></div>
				<font class="dp4">비밀번호 <font class="cp1 tgray1">password</font></font>
				<div class="h015"></div>
				<input type="password" name="password" style="height: 35px; width: 100%; border:0px; border-bottom: 1px solid silver;">
				<div class="h030"></div>				
				<button class="btn-general bacred pdg15 twhite cp1 we200" type="submit" style="margin-right: 5px;"> 로그인</button>
				<button class="btn-general bblack1 pdg15 twhite cp1 we200" type="button" onclick="location.href='<?=site_url("MainSystem/Join")?>'" style="margin-right: 15px;">회원가입</button>
				비밀번호 찾기	
				<div class="h015"></div>
			</form>
		</div>
		<div class="h060"></div>
		<p class="dp3 we700 tgray1 ln18 tace">
			아직 회원 가입을 하지 않으셨나요?<br>
			회원가입은 <font class="tsilver">매우 단순해서 30초면 끝</font>납니다.
		</p>
		<div class="h080"></div>		
		</center>		
	</div>

	<div class="container-fluid bacblue set-mgn">
		<div class="h100"></div>
		<div class="h100"></div>
	</div>