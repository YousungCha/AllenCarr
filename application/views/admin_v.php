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

			<div class="container-fluid bwhite pdg30">
				<p class="dp2 we700 tsilver">스케줄 관리</p>
				<div class="h030"></div>
				<table width="100%">
					<tr>
						<td class="cp3 tace">N</td>
						<td class="cp3 tace">C</td>
						<td class="cp3 tace">Date</td>
						<td class="cp3 tace">Dis</td>
						<td class="cp3 tace">Type</td>
						<td class="cp3 tace">Status</td>
						<td class="cp3 tace">etc</td>
					</tr>
					<?php foreach($schedule as $row) :?>
						<tr style="height:15px;"></tr>
						<tr>
							<td class="cp3 we200"><?=$row['no']?></td>
							<td class="cp3 we200"><?=$row['count']?></td>
							<td class="cp3 we200"><?=$row['sdate']?></td>
							<td class="cp3 we200"><?=$row['discount']?>%</td>
							<td class="cp3 we200"><?=$row['type']?></td>
							<td class="cp3 we200"><?=$row['status']?></td>
							<td class="cp3 we200"><?=$row['etc']?></td>
						</tr>
					<?php endforeach ?>
				</table>
			</div>
			<div class="h015"></div>


			<div class="container-fluid bwhite pdg30">
				<p class="dp2 we700 tsilver">신청자 관리</p>
				<table width="100%">
					<tr>
						<td class="cp3 tace">N</td>
						<td class="cp3 tace">email</td>
						<td class="cp3 tace">name</td>
						<td class="cp3 tace">phone</td>
						<td class="cp3 tace">class</td>
						<td class="cp3 tace">amount</td>
						<td class="cp3 tace">date_1</td>
						<td class="cp3 tace">status</td>
						<td class="cp3 tace">payment</td>
					</tr>
					<?php foreach($session as $row) :?>
						<tr style="height:15px;"></tr>
						<tr>
							<td class="cp3 we200"><?=$row['no']?></td>
							<td class="cp3 we200"><?=$row['email']?></td>
							<td class="cp3 we200"><?=$row['name']?></td>
							<td class="cp3 we200"><?=$row['phone']?>%</td>
							<td class="cp3 we200"><?=$row['class']?></td>
							<td class="cp3 we200"><?=$row['amount']?></td>
							<td class="cp3 we200"><?=$row['date_1']?></td>
							<td class="cp3 we200"><?=$row['status']?></td>
							<td class="cp3 we200"><?=$row['payment']?></td>
						</tr>
					<?php endforeach ?>
				</table>						
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