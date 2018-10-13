	<!-- Booking Page -->
	<div class="container-fluid bacnavy set-mgn" style="margin-top:0px;">
		<div class="h080"></div>
		<p class="sb2 we700 tace ln15 twhite">
			관리자 스텝 전용 페이지
		</p>
		<div class="h015"></div>
		<p class="cp3 tace lt100 tsilver ln18">Administrative Pages</p>
		<div class="h100"></div>
		
		<center>
		<div class="def-width-1200">

			<div class="container-fluid bwhite pdg15">
				<div class="h030"></div>
				<p class="dp2 we700 tsilver">스케줄 관리</p>
				<div class="h030"></div>
				<table width="100%">
					<tr class="bacnavy twhite we200 tace" style="height:40px;">
						<td class="cp3">차수</td>
						<td class="cp3">Date</td>
						<td class="cp3">Dis</td>
						<td class="cp3">Type</td>
						<td class="cp3">Status</td>
						<td class="cp3">etc</td>
					</tr>
					<?php foreach($schedule as $row) :?>
						<tr style="height:15px; border-bottom: 1px solid silver;"></tr>
						<tr>
							<td class="cp3 we200 tace"><?=$row['count']?>차</td>
							<td class="cp3 we200 tace"><?=mdate("%Y-%m-%d %g%A",human_to_unix($row['sdate']))?></td>
							<td class="cp3 we200 tace"><?=$row['discount']?>%</td>
							<td class="cp3 we200 tace"><?=$row['type']?></td>
							<td class="cp3 we200 tace">
								<?php 
									$attributes = array('name' => 'sessionStatus', 'method' => 'post');
									echo form_open(site_url('AdminSystem/btnChangeSessionStatus'),$attributes); 
								?>	
									<input type="hidden" name="no" value="<?=$row['no']?>">
									<input type="hidden" name="status" value="<?=$row['status']?>">
									<?php if ($row['status'] == "active") : ?>
										<button class="btn-general twhite" type="submit" style="background-color: #4eb840; padding: 10px;">예약가능</button>
									<?php elseif ($row['status'] == "closed") : ?>
										<button class="btn-general twhite bblack1" type="submit" style="padding:10px;">마감</button>
									<?php elseif ($row['status'] == "hidden") : ?>
										<button class="btn-general twhite" type="submit" style="padding:10px;">숨김</button>
									<?php endif ?>
								</form>
							</td>
							<td class="cp3 we200 tace">
								<?php 
									$attributes = array('name' => 'sessionEtc', 'method' => 'post');
									echo form_open(site_url('AdminSystem/btnChangeSessionEtc'),$attributes); 
								?>
								<input type="hidden" name="no" value="<?=$row['no']?>">
								<input type="text" name="etc" value="<?=$row['etc']?>" style="width: 80%;">
								<button class="btn-general twhite" type="submit" style="background-color: #4eb840; padding: 7px;">수정</button>
								</form>
							</td>
						</tr>
						<tr style="height:12px; border-bottom: 1px solid silver;"></tr>
						<tr style="height: 1px; background-color: #eeeeee"><td colspan="6"></td></tr>
					<?php endforeach ?>
				</table>
				<div class="h030"></div>
			</div>
			<div class="h030"></div>


			<div class="container-fluid bwhite pdg15">
				<div class="h030"></div>
				<p class="dp2 we700 tsilver">신청자 관리</p>
				<div class="h030"></div>
				<table width="100%">
					<tr class="bacnavy twhite we200 tace" style="height:40px;">
						<td class="cp3">이름</td>
						<td class="cp3">종류</td>
						<td class="cp3">인원</td>
						<td class="cp3">날짜</td>
						<td class="cp3">상태</td>
						<td class="cp3">결제방식</td>
					</tr>
					<?php foreach($session as $row) :?>
						<tr style="height:15px;"></tr>
						<tr onclick="openMember(<?=$row['no']?>);">
							<td class="cp3 we200 tace"><?=$row['name']?></td>						
							<td class="cp3 we200 tace"><?=$row['class']?></td>
							<td class="cp3 we200 tace"><?=$row['amount']?></td>
							<td class="cp3 we200 tace"><?=mdate("%Y-%m-%d %g%A",human_to_unix($row['date_1']))?></td>
							<td class="cp3 we200 tace"><?=$row['status']?></td>
							<td class="cp3 we200 tace"><?=$row['payment']?></td>
						</tr>
						<tr style="height:15px;"></tr>
						<tr style="height: 1px; background-color: #eeeeee;"><td colspan="6"></td></tr>
						
						<tr>
							<td colspan="6">
								<div class="container-fluid bwhite1" id="<?=$row['no']?>" style="display: none;">
									sfddfs
								</div>
							</td>
						</tr>
					<?php endforeach ?>
				</table>				
				<div class="h030"></div>		
			</div>								
			<div class="h015"></div>

			<div class="container-fluid bwhite pdg30">
				<p class="dp2 we700 tsilver">메일링 리스트</p>
			</div>
			<div class="h015"></div>


			<div class="container-fluid bwhite pdg30">
				<p class="dp2 we700 tsilver">멤버 관리</p>
			</div>								
			<div class="h015"></div>

		</div>
		</center>

		<div class="h100"></div>	
		</center>		
	</div>

	<script type="text/javascript">
		function openMember(id)
		{		
			data = "#" + id;	
			if ($(data).css('display') == 'none') {			
				$(data).slideDown(300);
			}	
			else {
				$(data).slideUp(300);
			}		
		}
	</script>