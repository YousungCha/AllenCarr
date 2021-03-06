	<!-- Booking Page -->
	<div class="container-fluid bacnavy set-mgn" style="margin-top:0px;">
		<div class="h080"></div>
		<p class="sb2 we700 tace ln15 twhite">
			금연테라피 예약하기
		</p>
		<div class="h015"></div>
		<p class="cp3 tace lt100 tsilver ln18">Booking Session</p>
		<div class="h050"></div>

		<center>
		<div class="row def-width-1200">			
		
			<?php foreach ($data as $row) : ?>
				<?php 
		            $sdate = mdate("%Y-%m-%d",human_to_unix($row['sdate']));
		            $stime = mdate("%g%A",human_to_unix($row['sdate']));
		            $etime = mdate("%g%A",human_to_unix($row['sdate']) + (3600 * 5));
		            $ref = array("일요일","월요일","화요일","수요일","목요일","금요일","토요일");
		            $day = $ref[date("w",strtotime($sdate))];
				?>
				<?php if ($row['status'] == "active" && $row['count'] == 1) : ?>		
				<?php 
					$attributes = array('name' => 'bookForm', 'method' => 'post');
					echo form_open(site_url('MainSystem/BookForm'),$attributes); 
				?>
				<input type="hidden" name="session_no" value="<?=$row['no']?>">
				<div class="col-md-6">
					<div class="container-fluid bwhite pdg25 tale" style="
						background-color: white; 
					    background-image: -webkit-linear-gradient(155deg, #eeeeee 25%, transparent 20%); 
					    background-image: -moz-linear-gradient(155deg, #eeeeee 25%, transparent 20%);
					    border-bottom: 3px solid gray;">
						<p class="dp3 we700"><?=$sdate?> (<?=$day?>) <?=$stime?> ~ <?=$etime?></p>
						<p class="dp4 we500 tgray1">알렌카 정규 금연테라피</p>
						<div class="h015"></div>
						<p class="cp1 we200 ln18">
							테라피스트와 현장에서 진행하는 알렌카 정규 금연 프로그램<br>						
							<font class="tacred">서울 강남구 테헤란로103길 14, 토즈 삼성점</font>
						</p>
						<div class="h010"></div>
						<table width="100%">
							<tr>
								<td class="tale">
									<?php if ($row['discount'] == 0) : ?>
										<div class="h029"></div>
										<b class="dp4"><?=number_format($row['price'])?>원</b>
										<div class="h015"></div>
									<?php else : ?>
										<font class="cp1 we200 tsilver"><del><?=number_format($row['price'])?>원</del></font> →
										<div class="h008 mobile"></div>
										<b class="dp4">
											<?php											
												$discount = (100 - $row['discount']) * 0.01;
												$price = $row['price'] * $discount;
												echo number_format($price)."원";
											?>										
										</b>
										<div class="h015"></div>
										<p class="cp3 torange we200 ln15" style="padding-right: 5px;"><?=$row['etc']?></p>
									<?php endif ?>
								</td>
								<td class="tari">									
									<button class="twhite pdg15 pdglr25 cp2 lt000 btn-download" type="submit" style="min-width: 135px;"><b>테라피 예약하기</b></button>								
								</td>
							</tr>
						</table>					
					</div>
					<div class="h025"></div>
				</div>
				</form>
				<?php elseif ($row['status'] == 'closed' && $row['count'] == 1) : ?>
				<div class="col-md-6">
					<div class="container-fluid bwhite pdg25 tale" style="
						background-color: white; 
					    background-image: -webkit-linear-gradient(155deg, #eeeeee 25%, transparent 20%); 
					    background-image: -moz-linear-gradient(155deg, #eeeeee 25%, transparent 20%);
					    border-bottom: 3px solid gray;">
						<p class="dp3 we700"><?=$sdate?> (<?=$day?>) <?=$stime?> ~ <?=$etime?></p>
						<p class="dp4 we500 tgray1">알렌카 정규 금연테라피</p>
						<div class="h015"></div>
						<p class="cp1 we200 ln18">
							테라피스트와 현장에서 진행하는 알렌카 정규 금연 프로그램<br>						
							<div class="h015"></div>
							<p class="tsilver dp3 we700 tace">예약 마감되었습니다.</p>
						</p>
						<div class="h010"></div>
				
					</div>
					<div class="h025"></div>
				</div>					
				<?php endif ?>
			<?php endforeach ?>
			<?php if ($count == 0) : ?>
				<p class="dp2 we700 twhite ln18 tace">
				현재 확정된 일정이 없습니다. 조금만 기다려주세요.
				</p>
			<?php endif ?>			
			<!--
			<div class="col-md-6">
				<div class="container-fluid bwhite pdg25 tale" style="
					background-color: white; 
				    background-image: -webkit-linear-gradient(155deg, #eeeeee 25%, transparent 20%); 
				    background-image: -moz-linear-gradient(155deg, #eeeeee 25%, transparent 20%);
				    border-bottom: 3px solid gray;">
					<p class="dp3 we700">2018. 10. 7. (일요일) 1PM ~ 6PM</p>
					<p class="dp4 we500 tgray1">알렌카 정규 금연테라피</p>
					<div class="h015"></div>
					<p class="cp1 we200 ln18">
						테라피스트와 현장에서 진행하는 알렌카 정규 금연 프로그램<br>						
						<font class="tacred">서울 강남구 테헤란로103길 14, 토즈 삼성점</font>						
					</p>
					<table width="100%">
						<tr>
							<td class="tale">
								<div class="h010"></div>
								<b class="dp4">398,000원</b>
							</td>
							<td class="tari">
								<button class="twhite pdg15 pdglr30 cp2 lt000 btn-download"><b>테라피 예약하기</b></button>								
							</td>
						</tr>
					</table>					
				</div>
				<div class="h025"></div>
			</div>
			<div class="col-md-6">
				<div class="container-fluid bwhite pdg25 tale" style="
					background-color: white; 
				    background-image: -webkit-linear-gradient(155deg, #deeeee 25%, transparent 20%); 
				    background-image: -moz-linear-gradient(155deg, #deeeee 25%, transparent 20%);
				    border-bottom: 3px solid gray;">
					<p class="dp3 we700">2018. 11. 21. (수요일) 1PM ~ 6PM</p>
					<p class="dp4 we500 tacred">알렌카 온라인 금연테라피</p>
					<div class="h015"></div>
					<p class="cp1 we200 ln18">
						온라인 화상 회의 시스템을 통해 진행하는 알렌카 온라인 프로그램<br>						
						<font class="tacred">원활한 인터넷 환경, 웹캠, 마이크 필수</font>						
					</p>
					<table width="100%">
						<tr>
							<td class="tale">
								<div class="h010"></div>
								<b class="dp4">318,400원</b>
							</td>
							<td class="tari">
								<button class="twhite pdg15 pdglr30 cp2 lt000 btn-download"><b>테라피 예약하기</b></button>								
							</td>
						</tr>
					</table>					
				</div>
				<div class="h025"></div>
			</div>
			-->
		</div>
		<div class="h040"></div>		
		<p class="dp3 we700 tgray1 ln18 tace">
			지불하신 비용에는 알렌카의 <font class="twhite2">1차, 2차, 3차 테라피</font>와<br>
			<font class="twhite2">100% 환불보증제도</font>가 포함되어 있습니다.
		</p>
		<div class="h100"></div>		
		</center>		
	</div>

	<div class="container-fluid bwhite">
		<div class="h060"></div>
		<p class="sb3 we700 ln18 tace">
			<font class="tacred">정규 금연테라피, 온라인 금연테라피</font><br>어떤 차이가 있을까?
		</p>
		<div class="h050"></div>
		<center>
		<div class="row def-width-1200">
			<div class="col-md-1"></div>
			<div class="col-md-5">
				<p class="dp3 we700 ln15 tale">
					정규(현장 참여식) 금연테라피
				</p>
				<div class="h010"></div>
				<p class="cp1 we300 ln18 tale">
					36년 전통의 알렌카 정규 금연 프로그램입니다. 알렌카에서 제공하는 모든 서비스 중 가장 핵심이며 원형이 되는 프로그램으로 현장에서 테라피스트가 진행합니다.<br><br>
					<img src="/images/live_sample.jpg" width="100%"><br><br>
					6 ~ 10명의 소규모 인원으로 진행하며, 마지막 담배의 시간이 될 때까지 매시간 10분씩 <b>흡연할 수 있는 시간</b>을 드립니다.<br><br>
				</p>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-5">
				<p class="dp3 we700 ln15 tale">
					온라인(화상 회의식) 금연테라피
				</p>
				<div class="h010"></div>
				<p class="cp1 we300 ln18 tale">
					현장 금연테라피의 모든 것을 완벽하게 온라인으로 참여합니다.<br>
					장소의 제약없이 1차, 2차, 3차 모든 프로그램을 본인의 PC로 참여할 수 있습니다.<br><br>
					<img src="/images/meet_sample.jpg" width="100%"><br><br>
					온라인 프로그램은 녹화된 영상이 아닌 화상 회의 방식입니다.<br>
					테라피스트를 직접 마주 보며 참여하며, 실시간으로 의사 소통이 가능합니다.<br><br>
					PC, 웹캠, 마이크와 함께 원활한 인터넷 환경이 필수적입니다. <b>스마트폰으로 접속하는 것은 불허</b>하며, 테라피 일정 전에 담당자가 참여 환경 테스트 및 안내를 진행해드립니다.
				</p>
				<div class="h020"></div>				
			</div>			
		</div>
		</center>
		<div class="h100"></div>		
	</div>