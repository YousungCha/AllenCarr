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
					</table>
					<div class="h030"></div>
					<button class="btn-general bacred2 pdg15 twhite cp1 we200" type="button" onclick="formSubmit();" style="margin-right: 15px; height: 55px; width: 100%">결제하기</button>
					<div class="h015"></div>
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

			// 폼 검증 후 이상없으면 결제 모듈 띄움
			if (!name) { alert("이름을 입력하세요."); }
			else if (!phone) alert("전화번호를 입력하세요.");
			else if (!email) alert("이메일 주소를 입력하세요.");
			else if (!paymentType) { alert("결제 방식을 선택해주세요"); }
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
			            	alert(receiveData);
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
			$("form[name=bookForm]").html('<p class="nor-t2 tc-std-silver pdg-30"><img src="/images/ajax/lg.rotating-balls-spinner.gif"><br><br>잠시만 기다리세요. 결제를 진행 중입니다..<br><br><br></p>');
	        var IMP = window.IMP;
	        IMP.init('imp04349282'); //'iamport' 대신 부여받은 "가맹점 식별코드"를 사용.
			IMP.request_pay({
			    pg : 'inicis', // version 1.1.0부터 지원.
			    pay_method : 'card',
			    merchant_uid : 'merchant_' + new Date().getTime(),
			    name : '알렌카 정규 금연테라피',
			    amount : quantity * price,
			    buyer_email : email,
			    buyer_name : name,
			    buyer_tel : phone,
			    m_redirect_url : ''

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
			            url : '/MainSystem/InsertSession',
			            data : queryString,
			            dataType : 'html',

			            success: function(receiveData) {
			            	location.href = "/MainSystem/mypage/paid_ok";
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
				location.href = "/MainSystem/mypage/paid_ok";
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