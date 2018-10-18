	<!-- Booking Page -->
	<div class="container-fluid bacnavy set-mgn" style="margin-top:0px;">
		<div class="h080"></div>
		<p class="sb2 we700 tace ln15 twhite">
			마이페이지
		</p>
		<div class="h015"></div>
		<p class="cp3 tace lt100 tsilver ln18">Member Information</p>
		<div class="h050"></div>
		<center>
		<div class="def-width-1200">
			<div class="col-md-4">
				<div class="container-fluid bwhite">
					<div class="h030"></div>
					<p class="dp3 we500 tsilver">환영합니다.</p>
					<div class="h010"></div>
					<p class="cp3"><?=$mem->email?></p>
					<div class="h030"></div>
				</div>
				<div class="h015"></div>

				<?php if (isset($data->email)) : ?>
				<div class="container-fluid bwhite">
					<div class="h030"></div>
					<p class="dp3 we700">심화테라피 신청하기</p>
					<div class="h010"></div>
					<p class="cp3">
						<?php 
							$attributes = array('name' => 'boostSession', 'method' => 'post');
							echo form_open(site_url('MainSystem/btnAddBoost'),$attributes); 
						?>				
							<input type="hidden" name="email" value="<?=$mem->email?>">		
							<select name="no" style="height: 35px; width: 100%; font-size: 14px;">
							<?php foreach($schedule as $row) : ?>
								<?php if ($row['count'] != '1') : ?>
									<option value="<?=$row['no']?>"><?=$row['count']?>차 : <?=date("Y-m-d (D) gA",human_to_unix($row['sdate']))?></option>
								<?php endif ?>
							<?php endforeach ?>
							</select>
							<br><br>
							<button class="btn-general bacred2 pdg15 twhite cp1 we200" type="submit" onclick="formSubmit();" style="margin-right: 15px; height: 45px; width: 100%">심화테라피 신청하기</button>								
						</form>
					</p>			
					<div class="h020"></div>
				</div>
				<div class="h015"></div>
				<?php endif ?>
			</div>
			<div class="col-md-8">
				<div class="container-fluid bwhite pdg30">
					<?php if (!isset($data->email)) : ?>
						<div class="h030"></div>
						<p class="dp3 we500 tsilver">예약된 일정이 없습니다.</p>
						<div class="h030"></div>
						<button class="btn-general bacred2 twhite" onclick="location.href='<?=site_url("MainSystem/Book")?>';">예약페이지 바로가기</button>
						<div class="h030"></div>
					<?php else : ?>
					<table width="100%">
						<tr>
							<td width="135" class="dp4 we500">회원명 <font class="tsilver cp3">Name</font></td>
							<td class="cp1 we200"><?=$data->name?></td>
						</tr>
						<tr style="height: 25px;"></tr>
						<tr>
							<td class="dp4 we500">메일주소 <font class="tsilver cp3">Email</font></td>
							<td class="cp1 we200"><?=$data->email?></td>
						</tr>
						<tr style="height: 25px;"></tr>
						<tr>
							<td class="dp4 we500">전화번호 <font class="tsilver cp3">Phone</font></td>
							<td class="cp1 we200"><?=$data->phone?></td>
						</tr>
						<tr style="height: 30px;">
							<td colspan="2" style="border-bottom: 1px dotted silver;"></td>
						</tr>
						<tr style="height: 25px;"></tr>
						<tr>
							<td class="dp4 we500">테라피종류 <font class="tsilver cp3">Type</font></td>
							<td class="dp4 we200">
								<?php if ($data->class == "live") : ?>
								<span class="pdg05 pdglr10 cp3" style="background-color:maroon; color:white; border-radius: 10px; margin-left:-5px;" title="현장에 직접 참여하는 오프라인 금연테라피입니다.">현장 참여 테라피</span>
								<?php else : ?>
								<?php endif ?>
							</td>
						</tr>
						<tr style="height: 25px;"></tr>
						<tr>
							<td class="dp4 we500">참여 인원 </td>
							<td class="cp1 we200"><?=$data->amount?></td>
						</tr>
						<tr style="height: 30px;">
							<td colspan="2" style="border-bottom: 1px dotted silver;"></td>
						</tr>
						<tr style="height: 25px;"></tr>
						<tr>
							<td class="dp4 we500">1차 일정 </td>
							<td class="cp1 we500 torange"><?=date("Y-m-d (D) gA",human_to_unix($data->date_1))?></td>
						</tr>
						<tr style="height: 25px;"></tr>
						<tr>
							<td class="dp4 we500">2차 일정 </td>
							<td class="cp1 we500 torange">
								<?php if ($data->date_2 == 0) : ?>
									<font class="cp2 tgray">아직 예약된 일정이 없습니다.</font>									
								<?php else : ?>
									<?=date("Y-m-d (D) gA",human_to_unix($data->date_2))?>
								<?php endif ?>
							</td>
						</tr>
						<tr style="height: 25px;"></tr>
						<tr>
							<td class="dp4 we500">3차 일정 </td>
							<td class="cp1 we500 torange">
								<?php if ($data->date_3 == 0) : ?>
									<font class="cp2 tgray">아직 예약된 일정이 없습니다.</font>
								<?php else : ?>
									<?=date("Y-m-d (D) gA",human_to_unix($data->date_3))?>
								<?php endif ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td colspan="2" style="border-bottom: 1px dotted silver;"></td>
						</tr>
						<tr style="height: 25px;"></tr>
						<tr>
							<td class="dp4 we500">환불보증일 </td>
							<td class="cp1 we200">
								<?=date("Y-m-d (D)",human_to_unix($data->mbg))?>
							</td>
						</tr>						
						<tr style="height: 25px;"></tr>
						<tr>
							<td class="dp4 we500">상태 </td>
							<td class="dp4 we200">
								<!--
									wait : 예약대기
									1OK : 1차 예약 확정
									2WAIT : 2차 예약 확정
									2OK : 2차까지 참여 완료
									3WAIT : 3차 예약 확정
									3OK : 3차까지 참여 완료
								-->
								<?php 
									$attributes = array('name' => 'cancelSession', 'method' => 'post');
									echo form_open(site_url('MainSystem/btnCancelSession'),$attributes); 
								?>									
								<input type="hidden" name="email" value="<?=$mem->email?>">
								<?php if ($data->status == "cancel") : ?>
									<span class="pdg05 pdglr10 cp3 bacred2" style="color:white; border-radius: 10px; margin-left:-5px;" title="무통장 입금으로 신청하였으며, 아직 입금이 확인되지 않았습니다.">예약이 취소되었습니다.</span>
								<?php elseif ($data->status == "wait") : ?>
									<span class="pdg05 pdglr10 cp3" style="background-color:#43b4d9; color:white; border-radius: 10px; margin-left:-5px;" title="무통장 입금으로 신청하였으며, 아직 입금이 확인되지 않았습니다.">예약 대기</span>	<button class="btn-general cp3 bwhite" type="submit" style="height:30px; padding:5px;"><u>취소하기</u></button>
								<?php elseif ($data->status == "1OK") : ?>
									<span class="pdg05 pdglr10 cp3" style="background-color:#4eb840; color:white; border-radius: 10px; margin-left:-5px;">1차 예약 확정</span> 
								<?php elseif ($data->status == "2OK") : ?>
									<span class="pdg05 pdglr10 cp3" style="background-color:#4eb840; color:white; border-radius: 10px; margin-left:-5px;">2차 예약 확정</span>&nbsp;&nbsp;<button class="btn-general cp3 bwhite" type="submit" style="height:30px; padding:5px;"><u>취소하기</u></button>
								<?php elseif ($data->status == "3OK") : ?>
									<span class="pdg05 pdglr10 cp3" style="background-color:#4eb840; color:white; border-radius: 10px; margin-left:-5px;">3차 예약 확정</span>&nbsp;&nbsp;<button class="btn-general cp3 bwhite" type="submit" style="height:30px; padding:5px;"><u>취소하기</u></button>
								<?php endif ?>
								</form>
							</td>
						</tr>
						<?php if ($data->status == "wait") : ?>
						<tr style="height: 30px;">
							<td colspan="2" style="border-bottom: 1px dotted silver;"></td>
						</tr>
						<tr>
							<td class="dp4 we500">입금계좌 </td>
							<td class="cp1 we200">
								<div class="h030"></div>
								우리은행 <b>1005-502-563204</b> 
								<div class="h015"></div>
								예금주 : (주)와이에이치
							</td>
						</tr>
						<?php endif ?>
					</table>
					<div class="h015"></div>
					<?php endif ?>			
				</div>
			</div>			
		</div>
		</center>
		<div class="h100"></div>
		</center>		
	</div>