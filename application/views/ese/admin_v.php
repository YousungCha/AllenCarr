	<div class="container">
		 <div class="h100"></div>
		 <form method="post" action="<?=site_url('TableBuilder/btnCreateApp')?>">
		 <table style="width:100%;">
		 	<tr>
		 		<td width="250" class="dp3">신청자명</td>
		 		<td><input type="text" name="name" style="height:35px; width: 200px;"></td>
		 	</tr>
		 	<tr style="height: 15px;"></tr>
		 	<tr>
		 		<td width="250" class="dp3">게시판명(영문+숫자 조합)</td>
		 		<td><input type="text" name="board_name" style="height:35px; width: 200px;"></td>
		 	</tr>
		 	<tr style="height: 15px;"></tr>
		 	<tr>
		 		<td width="250" class="dp3">결혼일</td>
		 		<td><input type="text" name="date" placeholder="2018-09-17" style="height:35px; width: 200px;"></td>
		 	</tr>
		 	<tr style="height: 35px;"></tr>
		 	<tr>
		 		<td colspan="2">
		 			<button class="btn-trans dp3 tacred" type="submit" style="width: 352px;">페이지 생성</button>
		 		</td>
		 	</tr>
		 </table>
		</form>
		 <div class="h100"></div>
	</div>