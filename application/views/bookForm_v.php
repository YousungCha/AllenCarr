	<!-- Booking Page -->
	<style type="text/css">
		input::placeholder {
			color:silver;
			font-weight: 200;
		}
	</style>
	<div class="container-fluid bacnavy set-mgn" style="margin-top:0px;">
		<div class="h080"></div>
		<p class="sb2 we700 tace ln15 twhite">
			예약정보 입력하기
		</p>
		<div class="h015"></div>
		<p class="cp3 tace lt100 tsilver ln18">Book Information</p>
		<div class="h050"></div>
		
		<center>
			<div class="def-width-800 bwhite pdg30 tale">
				<?php 
		            $sdate = mdate("%Y-%m-%d",human_to_unix($data->sdate));
		            $stime = mdate("%g%A",human_to_unix($data->sdate));
		            $etime = mdate("%g%A",human_to_unix($data->sdate) + (3600 * 5));
		            $ref = array("일요일","월요일","화요일","수요일","목요일","금요일","토요일");
		            $day = $ref[date("w",strtotime($sdate))];
				?>
				<div class="container-fluid bacred2">
					<div class="h030"></div>
					<?php if ($data->type == "live") : ?>
						<p class="dp3 twhite tace">알렌카 1차 정규테라피 (현장 참여)</p>
						<div class="h015"></div>
						<p class="dp4 we200 twhite1 tace"><?=$sdate?> <?=$day?> <?=$stime?> ~ <?=$etime?></p>
						<p class="cp2 we200 torange tace">
							서울 강남구 테헤란로103길 14, 토즈 삼성점
						</p>
					<?php elseif ($data->type == "online") : ?>

					<?php endif ?>
					<div class="h025"></div>
				</div>

				<div class="h030"></div>

				<?php 
					$attributes = array('name' => 'bookForm', 'method' => 'post');
					echo form_open(site_url('MainSystem/btnBookForm'),$attributes); 
				?>				
					<?php if ($data->type == "live") : ?>
						<input type="hidden" name="class" value="live">
					<?php elseif ($data->type == "online") : ?>
						<input type="hidden" name="class" value="online">
					<?php endif ?>
					<input type="hidden" name="date_1" value="<?=$data->sdate?>">
					<table width="100%">
						<tr>
							<td width="90" class="dp4">이름 </td>
							<td><input class="input-underbar we200" type="text" name="name"></td>
						</tr>
						<tr style="height: 25px;"></tr>
						<tr>
							<td class="dp4">휴대폰</td>
							<td><input class="input-underbar we200" type="text" name="phone" placeholder="ex) 010-1234-1234"></td>
						</tr>
						<tr style="height: 25px;"></tr>
						<tr>
							<td class="dp4">이메일 </td>
							<td>
								<p class="cp1 we500" style="padding-top:12px;"><?=$this->session->userdata('email')?></p>
								<input type="hidden" name="email" value="<?=$this->session->userdata('email')?>">
							</td>
						</tr>
						<tr style="height: 25px;"></tr>
						<tr>
							<td class="dp4">인원</td>
							<td>				
								<select id="session_quantity" class="input-underbar" name="quantity">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>					
								</select>
							</td>
						</tr>
						<tr style="height: 25px;"></tr>
						<tr>
							<td class="dp4">결제방식 </td>
							<td>
								<select id="payType" class="input-underbar we200" name="payment">
									<option value="1">신용카드, 간편결제 등</option>
									<option value="2">무통장입금</option>		
								</select>									
							</td>
						</tr>
						<tr style="height: 25px;"></tr>
						<tr>
							<td class="dp4">할인코드 </td>
							<td><input class="input-underbar" type="text" name="sales_code" placeholder="할인코드가 없을 경우 공란으로 두세요."></td>
						</tr>
						<tr style="height: 25px;"></tr>
						<tr>
							<?php 
								$price = $data->price * ((100 - $data->discount) * 0.01);
							 ?>
							<td class="dp4">결제비용 </td>
							<td><div class="h010"></div><p id="price" class="dp3 torange"><?=number_format($price)?>원</p></td>
							<input type="hidden" name="price" value="<?=$price?>">

						</tr>
						<tr style="height: 25px;"></tr>
						<tr>
							<td colspan="2">
								<textarea style="width:100%; height: 350px; font-family: 'default'; line-height: 1.8;">
알렌카의 이지웨이 환불보증제도

알렌카(Allen Carr)는 1983년 그의 금연법을 최초로 개발하였습니다. 이후 그의 금연법을 기반으로 한 클리닉이 전 세계58개국에 설립되었고, 38개의 언어로 세계 각국에서 금연 테라피를 진행하고 있습니다. 그는 현재 금연 업계를 선도하는 전문가로 널리 인정받고 있으며, 이 금연법(Allen Carr's Easyway to Stop Smoking)의 명성이 지속해서 성장하는 이유는 '금연이 된다'는 단순한 이유 때문입니다.

잘 아시는 바와 같이 저희는 고객이 금연에 실패하면 테라피 비용을 전액 환불해주는 독보적인 금연전문기업입니다. 이것이 가능한 이유는 우리의 금연 성공률이 그만큼 높기 때문입니다. 3개월 환불 보증에 근거한 금연 성공률은 90%에 육박합니다.

귀하가 진심으로 금연을 원하신다면, 우리의 금연법은 그 소망을 이루어드릴 뿐만 아니라, 상대적으로 쉽게 해드립니다. 테라피 중 드리는 지시사항을 따르면 비흡연자가 될 수 있으며, 금단증상을 느끼는 시기에도 전혀 고통 없이 지낼 수 있습니다. 무엇보다 중요한 점은 귀하가 흡연을 그리워하지 않게 된다는 점입니다.

테라피에 참석하는 대부분 흡연자는 단 1회의 테라피로 행복한 비흡연자가 됩니다. 하지만 예외적인 상황에 한하여 1회 이상의 테라피가 필요할 때도 있습니다. 이때는 처음 지불한 비용에 모든 것이 포함되어 있으므로 추가 비용이 발생하지 않습니다.

***환불 조건

이 서류에 서명한 이후로 3개월이 지났음에도 불구하고 여전히 담배를 피우신다면, 귀하가 지불하신 금액은 아무런 질문 없이 환불처리 됩니다. 저희는 실패했다는 고객의 말씀을 신뢰하고 겸허한 자세로 인정합니다. 그러나 저희는 고객이 진심으로 담배를 끊고 싶다는 마음으로 이 테라피에 참석하시기를 바랍니다.

이 환불조항은 아래와 같은 상황이 발생할 경우 효력을 잃습니다.

1) 1차 테라피 참여 이후 보증기간(3개월)이 경과한 경우
2) 어떤 테라피이든 무단 불참, 연기, 혹은 15분 이상 지각한 경우
3) 테라피 1차에 참석한 이후 3개월 이내에 심화 테라피 2차, 테라피 3차에 각각 1회 이상 참석하지 않은 경우
   (테라피 2차, 테라피 3차는 테라피 1차와 전혀 다른 내용이며, 각각 약 3시간 정도의 시간이 소요됨)

금연한 지 3개월이 지난 뒤 다시 흡연한 경우, 테라피 1을 제외한 추가 테라피에는 50%의 비용으로 참석이 가능합니다. 그러나 테라피 1차에 참석한 지 1년이 지났다면, 해당 테라피에 참석할 것이 요구됩니다. 이 경우 참가비 전액을 지불해야 하며, 환불 보증 제도도 처음부터 다시 적용됩니다. 
								</textarea>
							</td>
						</tr>
						<tr style="height:15px;"></tr>
						<tr>
							<td colspan="2" style="text-align: right;">
								<input type="checkbox" name="agree_mbg"><font class="we200"> 환불보증제도에 동의합니다.</font>
							</td>
						</tr>
					</table>
					<div class="h030"></div>
					<button class="btn-general bacred2 pdg15 twhite cp1 we200" type="button" onclick="formSubmit();" style="margin-right: 15px; height: 55px; width: 100%">결제하기</button>
					<div class="h015"></div>
					<input type="hidden" name="mer_id" value="<?="merchant_".time();?>">
				</form>
			</div>
		</center>
		<div class="h100"></div>	
		</center>		
	</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
	<script type="text/javascript" src="https://service.iamport.kr/js/iamport.payment-1.1.5.js"></script>	
	<script type="text/javascript">

		function formSubmit() {
			var paymentType = $("#payType option:selected").val();	// 결제 방식
			var queryString = $("form[name=bookForm]").serialize();			// 폼 데이터 

			// 폼 검증
			var name = $('input[name="name"]').val();
			var phone = $('input[name="phone"]').val();
			var email = $('input[name="email"]').val();
			var price = $('input[name="price"]').val();
			var quantity = $("#session_quantity option:selected").val();
			var agree = $('input[name="agree_mbg"]:checked').val();
			

			// 폼 검증 후 이상없으면 결제 모듈 띄움
			if (!name) { alert("이름을 입력하세요."); }
			else if (!phone) alert("전화번호를 입력하세요.");
			else if (!email) alert("이메일 주소를 입력하세요.");
			else if (!paymentType) { alert("결제 방식을 선택해주세요"); }
			else if (agree != "on") { alert("환불보증제도에 동의해주세요."); }
			else 
			{
				if (paymentType == 1) iamPort(name, phone, email, quantity, price, queryString);	 
				else
				{
			        $.ajax({
			            type : 'post',
			            url : '/MainSystem/InsertSession',
			            data : queryString,
			            dataType : 'html',

			            success: function(receiveData) {
			            	location.href = "/MainSystem/mypage/";
			            },
						error: function(xhr, status, error){
			                alert(error);
			            }
			        });
				}
			}
		}

		function iamPort(name, phone, email, quantity, price, queryString) 
		{			
			var prevForm = $("form[name=bookForm]").html();	// 폼 태그 저장
			var mer_id = $('input[name="mer_id"]').val();
			$("form[name=bookForm]").html('<p class="dp3 pdg30 tace tsilver we700"><img src="/images/lg.rotating-balls-spinner.gif"><br><br>잠시만 기다리세요. 결제를 진행 중입니다..<br><br><br></p>');
	        var IMP = window.IMP;
	        IMP.init('imp04349282'); //'iamport' 대신 부여받은 "가맹점 식별코드"를 사용.
			IMP.request_pay({
			    pg : 'inicis', // version 1.1.0부터 지원.
			    pay_method : 'card',
			    merchant_uid : mer_id,
			    name : '알렌카 정규 금연테라피',
			    amount : quantity * price,
			    buyer_email : email,
			    buyer_name : name,
			    buyer_tel : phone,
			    m_redirect_url : 'https://allencarr.co.kr/MainSystem/InsertSession?' + queryString

			}, function(rsp) {
			    if ( rsp.success ) {
			        var msg = '결제가 완료되었습니다.';
			        msg += '고유ID : ' + rsp.imp_uid;
			        msg += '상점 거래ID : ' + rsp.merchant_uid;
			        msg += '결제 금액 : ' + rsp.paid_amount;
			        msg += '카드 승인번호 : ' + rsp.apply_num;

			       	// AJAX 호출
			        $.ajax({
			            type : 'post',
			            url : '/MainSystem/InsertSession/',
			            data : queryString,
			            dataType : 'html',

			            success: function(receiveData) {
			            	location.href = "/MainSystem/mypage/";
			            },
						error: function(xhr, status, error){
			                alert(error);
			            }
			        });
			    } else {
			        var msg = '결제에 실패하였습니다.';
			        msg += '에러내용 : ' + rsp.error_msg;
			    }
			    //alert(msg);

			    // 폼 원상 복귀
			    $("form[name=bookForm]").html(prevForm);
				$('input[name="name"]').val(name);
				$('input[name="phone"]').val(phone);
				$('input[name="email"]').val(email);
			});			
		}

	</script>
	<script type="text/javascript">
		// 선택되는 숫자 비용을 곱한다.
		$("#session_quantity").change(function() {
			var price = $('input[name="price"]').val();
			var quan = $("#session_quantity option:selected").val() * price;
			quan = numberWithCommas(quan);
			quan = quan + "원";
			var tag = "<font class='tc-darkorange'>" + quan + "</font>";
			$("#price").html(tag)
		});

		// 3자리마다 콤마 추가
		function numberWithCommas(x) {
			return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}		
	</script>	