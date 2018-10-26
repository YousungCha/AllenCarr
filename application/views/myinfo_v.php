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

				<div class="h015"></div>

				<?php if (isset($data->email)) : ?>
				<?php if (!isset($ques)) : ?>
				<div class="container-fluid bwhite pdg30">
					<div class="h015"></div>
					<p class="dp3 we700">참석자용 질문지</p>
					<div class="h015"></div>
					<p class="cp2 we200 ln18" style="max-width: 650px;">
						알렌카 이지웨이, 금연테라피에 참여하신 것을 진심으로 환영합니다.<br class="desk">
						본 질문자는 참석자의 성공적인 금연을 위해 제작되었습니다.<br><br>
						모든 정보는 테라피스트가 참석자의 <b>흡연 성향을 파악하기 위해 전달되므로, 정확하고 상세하게</b> 입력해주시기 바랍니다.
					</p>
					<div class="h030"></div>

					<?php 
						$attributes = array('name' => 'questionForm', 'method' => 'post');
						echo form_open(site_url('MainSystem/btnApplyQuestion'),$attributes); 
					?>	
					<input type="hidden" name="name" value="<?=$data->name?>">
					<input type="hidden" name="email" value="<?=$data->email?>">
					<input type="hidden" name="phone" value="<?=$data->phone?>">
					<input type="hidden" name="date_1" value="<?=$data->date_1?>">
					
					<table width="100%">
						<tr>
							<td width=30% class="cp1 we500 ln18">주소</td>
							<td class="cp1 we200"><input class="input-underbar we200" type="text" name="address" placeholder="ex) 서울시 강남구 테헤란로 103길"></td>
						</tr>
						<tr style="height: 20px;"></tr>
						<tr>
							<td  class="cp1 we500 ln18">직업</td>
							<td class="cp1 we200"><input class="input-underbar we200" type="text" name="occupation"></td>
						</tr>
						<tr style="height: 20px;"></tr>
						<tr>
							<td  class="cp1 we500 ln18">추천인</td>
							<td class="cp1 we200"><input class="input-underbar we200" type="text" name="recommender" placeholder="추천이 없는 경우 공란으로 두세요."></td>
						</tr>
						<tr style="height: 50px;"></tr>
						<tr>
							<td  class="cp1 we500 ln18">하루에 몇 갑 정도 피우시나요?</td>
							<td class="cp1 we200"><input class="input-underbar we200" type="text" name="ques1"></td>
						</tr>
						<tr style="height: 20px;"></tr>
						<tr>
							<td  class="cp1 we500 ln18">선호하는 담배 브랜드는?</td>
							<td class="cp1 we200"><input class="input-underbar we200" type="text" name="ques2" placeholder="ex) 말보로 라이트, 던힐, 디스 등"></td>
						</tr>
						<tr style="height: 20px;"></tr>
						<tr>
							<td  class="cp1 we500 ln18">첫담배는 어떤 느낌이었나요?</td>
							<td class="cp1 we200"><input class="input-underbar we200" type="text" name="ques3" placeholder="ex) 역겨웠다, 기침이 심했다, 맛있었다 등"></td>
						</tr>
						<tr style="height: 20px;"></tr>
						<tr>
							<td  class="cp1 we500 ln18">몇 년 동안 담배를 피우셨나요?</td>
							<td class="cp1 we200"><input class="input-underbar we200" type="text" name="ques4"></td>
						</tr>
						<tr style="height: 20px;"></tr>
						<tr>
							<td  class="cp1 we500 ln18">배우자도 담배를 피우나요?</td>
							<td class="cp1 we200"><input class="input-underbar we200" type="text" name="ques5"></td>
						</tr>
						<tr style="height: 20px;"></tr>
						<tr>
							<td  class="cp1 we500 ln18">담배를 끊으려는 가장 큰 이유는?</td>
							<td class="cp1 we200"><input class="input-underbar we200" type="text" name="ques6"></td>
						</tr>
						<tr style="height: 20px;"></tr>
						<tr>
							<td  class="cp1 we500 ln18">담배의 무엇이 가장 좋았나요?</td>
							<td class="cp1 we200"><input class="input-underbar we200" type="text" name="ques7" placeholder="ex) 야경을 내려다보며 피우는 여유"></td>
						</tr>
						<tr style="height: 20px;"></tr>
						<tr>
							<td  class="cp1 we500 ln18">흡연자의 삶이 즐거우신가요?</td>
							<td class="cp1 we200"><input class="input-underbar we200" type="text" name="ques8"></td>
						</tr>
						<tr style="height: 20px;"></tr>
						<tr>
							<td  class="cp1 we500 ln18">타인의 압력으로 금연하려 하나요?</td>
							<td class="cp1 we200"><input class="input-underbar we200" type="text" name="ques9"></td>
						</tr>						
						<tr style="height: 20px;"></tr>
						<tr>
							<td  class="cp1 we500 ln18">가장 오래 끊었던 기간은?</td>
							<td class="cp1 we200"><input class="input-underbar we200" type="text" name="ques10"></td>
						</tr>
						<tr style="height: 20px;"></tr>
						<tr>
							<td  class="cp1 we500 ln18">어떤 금연을 해보셨나요?</td>
							<td class="cp1 we200"><input class="input-underbar we200" type="text" name="ques11" placeholder="ex) 니코틴 껌, 패치, 약물, 침, 최면 등"></td>
						</tr>
						<tr style="height: 20px;"></tr>
						<tr>
							<td  class="cp1 we500 ln18">알렌카를 알게 된 계기는?</td>
							<td class="cp1 we200">
								<select id="ques12" class="input-underbar we200" type="text" name="ques12">	
									<option value="naver search">네이버 검색</option>
									<option value="google search">구글 검색</option>
									<option value="facebook ad">페이스북 광고</option>
									<option value="youtube">유튜브 영상</option>									
									<option value="banner">배너 광고</option>
									<option value="news_media">신문/방송</option>
									<option value="email ad">이메일 광고</option>
									<option value="acquaintance">지인 소개</option>
								</select>
							</td>
						</tr>
						<tr style="height: 20px;"></tr>
						<tr>
							<td  class="cp1 we500 ln18">테라피스트에게 전할 말이 있다면?</td>
							<td class="cp1 we200">
								<textarea name="ques13" style="width:100%; height: 150px; text-align: left;">** 그외의 테라피스트가 알아야 할 특이사항이 있다면 적어주세요.</textarea>
							</td>
						</tr>						
						<tr style="height: 15px;"></tr>
					</table>
					<div class="h015"></div>
					<button class="btn-general bacred2 pdg15 twhite cp1 we200" type="button" onclick="formSubmit();" style="margin-right: 15px; height: 55px; width: 100%">질문지 제출</button>			
					</form>		
				</div>		
				<?php else :?>
				<div class="container-fluid bwhite pdg30">
					<div class="h015"></div>
					<p class="dp3 we700 tsilver">금연테라피용 질문지가 제출되었습니다.</p>
					<div class="h015"></div>					
				</div>
				<?php endif ?>
				<?php endif ?>
			</div>			
		</div>
		</center>
		<div class="h100"></div>
		</center>		
	</div>

	<script type="text/javascript">

		function formSubmit() {
			var queryString = $("form[name=questionForm]").serialize();			// 폼 데이터 

			// 폼 검증
			var address = $('input[name="address"]').val();
			var occupation = $('input[name="occupation"]').val();

			var ques1 = $('input[name="ques1"]').val();
			var ques2 = $('input[name="ques2"]').val();
			var ques3 = $('input[name="ques3"]').val();
			var ques4 = $('input[name="ques4"]').val();
			var ques5 = $('input[name="ques5"]').val();
			var ques6 = $('input[name="ques6"]').val();
			var ques7 = $('input[name="ques7"]').val();
			var ques8 = $('input[name="ques8"]').val();
			var ques9 = $('input[name="ques9"]').val();
			var ques10 = $('input[name="ques10"]').val();
			var ques11 = $('input[name="ques11"]').val();
			var ques12 = $("#ques12 option:selected").val();	

			// 폼 검증 후 이상없으면 결제 모듈 띄움
			if (!address) { alert("주소를 입력하세요."); }
			else if (!occupation) alert("직업을 입력하세요.");

			else if (!ques1) alert("하루에 몇 갑 피우는지 입력해주세요.");
			else if (!ques2) alert("선호 브랜드를 적어주세요.");
			else if (!ques3) alert("첫담배의 느낌을 말해주세요.");
			else if (!ques4) alert("몇 년을 피웠는지 알려주세요.");
			else if (!ques5) alert("배우자의 흡연 여부를 입력해주세요.");
			else if (!ques6) alert("금연하려는 이유를 입력해주세요.");
			else if (!ques7) alert("담배의 좋은 점을 입력해주세요.");
			else if (!ques8) alert("흡연자의 삶이 즐거운지 입력해주세요.");
			else if (!ques9) alert("타인의 압력 여부를 적어주세요.");
			else if (!ques10) alert("가장 오래 끊은 기간을 알려주세요.");
			else if (!ques11) alert("시도했던 금연 방법을 입력해주세요.");
			else {
				var frm = $('form[name="questionForm"]');
				frm.submit();
			}
		}		
	</script>	