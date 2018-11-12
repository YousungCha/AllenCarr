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

					<?php 
						$attributes = array('name' => 'newSession', 'method' => 'post');
						echo form_open(site_url('AdminSystem/btnAddNewSession'),$attributes); 
					?>
						<tr class="we200 tace" style="height:40px;">
							<td class="cp3">
								<SELECT name="count">
									<option>1차</option>
									<option>2차</option>
									<option>3차</option>
								</SELECT>
							</td>
							<td class="cp3">
								<input name="session_date" value="2018-12-01 13:00:00">
							</td>
							<td class="cp3"><input name="session_dis" value="0"></td>
							<td class="cp3"><input name="session_type" value="live"></td>
							<td class="cp3"></td>
							<td class="cp3">
								<button class="btn-general twhite" type="submit" style="background-color: #4eb840; padding: 10px;">세션 등록</button>
							</td>
						</tr>
					</form>
				</table>
				<div class="h030"></div>
			</div>
			<div class="h030"></div>


			<div class="container-fluid bwhite pdg15">
				<div class="h030"></div>
				<p class="dp2 we700 tsilver">신청자 관리 1차</p>
				<div class="h030"></div>
				<table width="100%">
					<?php foreach ($schedule as $sch_row) : ?>
						<?php if ($sch_row['count'] == 1 && $sch_row['status'] != "hidden") : ?>
						<tr onclick="openDate(<?=$sch_row['no']?>)" style="border-bottom: 1px solid silver;">
							<td colspan="6" class="bacred2 twhite tace pdg15">								
								<?=date("Y-m-d (D)",human_to_unix($sch_row['sdate']))?> : 
								<font class="we200">
								<?php 
									$sql = "select no from session where date_1='".$sch_row['sdate']."' and status!='cancel'";
									$result = $this->db->query($sql);
									echo $result->num_rows();
								 ?>
								 /
								 <?php 
									$sql = "select no from session where date_1='".$sch_row['sdate']."' and status='wait'";
									$result = $this->db->query($sql);
									echo $result->num_rows();
								 ?>								 
								</font>
								<font class="we200 cp4 lt000 torange">(<?=$sch_row['status']?>)</font>
							</td>
						</tr>
						<?php endif ?>		

						<?php if ($sch_row['count'] == 1) : ?>
						<tr style="display: none;" id="_<?=$sch_row['no']?>">
							<td>
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
										<?php if ($row['date_1'] == $sch_row['sdate']) : ?>
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
													<div class="h030"></div>
														<center>
														<?php 
															$attributes = array('name' => 'sessionMemberChange', 'method' => 'post');
															echo form_open(site_url('AdminSystem/btnChangeSessionMember'),$attributes); 
														?>					
															<input type="hidden" name="no" value="<?=$row['no']?>">						
															<table>
																<tr>
																	<td width="100">이름</td>
																	<td><input type="text" name="name" value="<?=$row['name']?>" style="width:100%;"></td>
																</tr>
																<tr style="height: 10px;"></tr>
																<tr>
																	<td>이메일</td>
																	<td><input type="text" name="email" value="<?=$row['email']?>" style="width:100%;"></td>
																</tr>
																<tr style="height: 10px;"></tr>
																<tr>
																	<td>전화번호</td>
																	<td><input type="text" name="phone" value="<?=$row['phone']?>" style="width:100%;"></td>
																</tr>	
																<tr style="height: 10px;"></tr>
																<tr>
																	<td>날짜</td>
																	<td><input type="text" name="date_1" value="<?=$row['date_1']?>" style="width:100%;"></td>
																</tr>	
																<tr style="height: 10px;"></tr>
																<tr>
																	<td>MBG</td>
																	<td><input type="text" name="mbg" value="<?=$row['mbg']?>" style="width:100%;"></td>
																</tr>	
																<tr style="height: 10px;"></tr>
																<tr>
																	<td>상태</td>
																	<td>
																		<?=$row['status']?>&nbsp;
																		<select name="status" style="width:60%;">
																			<option value="wait">wait</option>
																			<option value="1OK">1OK</option>
																			<option value="2WAIT">2WAIT</option>
																			<option value="2OK">2OK</option>
																			<option value="3WAIT">3WAIT</option>
																			<option value="3OK">3OK</option>
																			<option value="cancel">cancel</option>
																		</select>
																	</td>
																</tr>
																<tr style="height: 10px;"></tr>
																<tr>
																	<td colspan="2">
																		<select name="delete" style="width:100%;">
																			<option value="no">상태유지</option>
																			<option value="yes">제거</option>
																		</select>														
																	</td>
																</tr>												
																<tr style="height: 10px;"></tr>
																<tr>
																	<td colspan="2">
																		<button class="btn-general bacred twhite" type="submit" style="width:100%;">수정하기</button>
																	</td>
																</tr>
															</table>
														</form>
														</center>
													<div class="h030"></div>
												</div>
											</td>
										</tr>
										<?php endif ?>							
									<?php endforeach ?>
								</table>
							</td>
						</tr>
						<?php endif ?>
					<?php endforeach ?>
				</table>			


				<div class="h030"></div>
				<p class="dp2 we700 tsilver">신청자 관리 2차</p>
				<div class="h030"></div>
				<table width="100%">
					<?php foreach ($schedule as $sch_row) : ?>
						<?php if ($sch_row['count'] == 2 && $sch_row['status'] != "hidden") : ?>
						<tr onclick="openDate(<?=$sch_row['no']?>)" style="border-bottom: 1px solid silver;">
							<td colspan="6" class="bacred2 twhite tace pdg15">								
								<?=date("Y-m-d (D)",human_to_unix($sch_row['sdate']))?> : 
								<font class="we200">
								<?php 
									$sql = "select no from session where date_2='".$sch_row['sdate']."' and status='2OK'";
									$result = $this->db->query($sql);
									echo $result->num_rows();
								 ?>
								 /
								 <?php 
									$sql = "select no from session where date_2='".$sch_row['sdate']."' and status='wait'";
									$result = $this->db->query($sql);
									echo $result->num_rows();
								 ?>								 
								</font>
								<font class="we200 cp4 lt000 torange">(<?=$sch_row['status']?>)</font>
							</td>
						</tr>
						<?php endif ?>		

						<?php if ($sch_row['count'] == 2) : ?>
						<tr style="display: none;" id="_<?=$sch_row['no']?>">
							<td>
								<table width="100%">
									<tr class="bacnavy twhite we200 tace" style="height:40px;">
										<td class="cp3">이름</td>
										<td class="cp3">종류</td>
										<td class="cp3">1차 날짜</td>
										<td class="cp3">2차 날짜</td>
										<td class="cp3">상태</td>
										<td class="cp3">결제방식</td>
									</tr>									
									<?php foreach($session as $row) :?>
										<?php if ($row['date_2'] == $sch_row['sdate']) : ?>
										<tr style="height:15px;"></tr>
										<tr onclick="openMember(<?=$row['no']?>);">
											<td class="cp3 we200 tace"><?=$row['name']?></td>						
											<td class="cp3 we200 tace"><?=$row['class']?></td>
											<td class="cp3 we200 tace"><?=mdate("%Y-%m-%d %g%A",human_to_unix($row['date_1']))?></td>
											<td class="cp3 we200 tace"><?=mdate("%Y-%m-%d %g%A",human_to_unix($row['date_2']))?></td>
											<td class="cp3 we200 tace"><?=$row['status']?></td>
											<td class="cp3 we200 tace"><?=$row['payment']?></td>
										</tr>
										<tr style="height:15px;"></tr>
										<tr style="height: 1px; background-color: #eeeeee;"><td colspan="6"></td></tr>							
										<?php endif ?>							
									<?php endforeach ?>
								</table>
							</td>
						</tr>
						<?php endif ?>
					<?php endforeach ?>
				</table>		

				<div class="h030"></div>
				<p class="dp2 we700 tsilver">신청자 관리 3차</p>
				<div class="h030"></div>
				<table width="100%">
					<?php foreach ($schedule as $sch_row) : ?>
						<?php if ($sch_row['count'] == 3 && $sch_row['status'] != "hidden") : ?>
						<tr onclick="openDate(<?=$sch_row['no']?>)" style="border-bottom: 1px solid silver;">
							<td colspan="6" class="bacred2 twhite tace pdg15">								
								<?=date("Y-m-d (D)",human_to_unix($sch_row['sdate']))?> : 
								<font class="we200">
								<?php 
									$sql = "select no from session where date_3='".$sch_row['sdate']."' and status='3OK'";
									$result = $this->db->query($sql);
									echo $result->num_rows();
								 ?>
								 /
								 <?php 
									$sql = "select no from session where date_3='".$sch_row['sdate']."' and status='wait'";
									$result = $this->db->query($sql);
									echo $result->num_rows();
								 ?>								 
								</font>
								<font class="we200 cp4 lt000 torange">(<?=$sch_row['status']?>)</font>
							</td>
						</tr>
						<?php endif ?>		

						<?php if ($sch_row['count'] == 3) : ?>
						<tr style="display: none;" id="_<?=$sch_row['no']?>">
							<td>
								<table width="100%">
									<tr class="bacnavy twhite we200 tace" style="height:40px;">
										<td class="cp3">이름</td>
										<td class="cp3">종류</td>
										<td class="cp3">1차 날짜</td>
										<td class="cp3">2차 날짜</td>
										<td class="cp3">3차 날짜</td>
										<td class="cp3">상태</td>
										<td class="cp3">결제방식</td>
									</tr>									
									<?php foreach($session as $row) :?>
										<?php if ($row['date_3'] == $sch_row['sdate']) : ?>
										<tr style="height:15px;"></tr>
										<tr onclick="openMember(<?=$row['no']?>);">
											<td class="cp3 we200 tace"><?=$row['name']?></td>						
											<td class="cp3 we200 tace"><?=$row['class']?></td>
											<td class="cp3 we200 tace"><?=mdate("%Y-%m-%d %g%A",human_to_unix($row['date_1']))?></td>
											<td class="cp3 we200 tace"><?=mdate("%Y-%m-%d %g%A",human_to_unix($row['date_2']))?></td>
											<td class="cp3 we200 tace"><?=mdate("%Y-%m-%d %g%A",human_to_unix($row['date_3']))?></td>
											<td class="cp3 we200 tace"><?=$row['status']?></td>
											<td class="cp3 we200 tace"><?=$row['payment']?></td>
										</tr>
										<tr style="height:15px;"></tr>
										<tr style="height: 1px; background-color: #eeeeee;"><td colspan="6"></td></tr>							
										<?php endif ?>							
									<?php endforeach ?>
								</table>
							</td>
						</tr>
						<?php endif ?>
					<?php endforeach ?>
				</table>				

				<div class="h030"></div>
				<p class="dp2 we700 tsilver">예약 확정자 (날짜 미정)</p>
				<div class="h030"></div>
				<table width="100%">

					<tr>
						<td>
							<table width="100%">
								<tr class="bacnavy twhite we200 tace" style="height:40px;">
									<td class="cp3">이름</td>
									<td class="cp3">종류</td>
									<td class="cp3">1차 날짜</td>
									<td class="cp3">2차 날짜</td>
									<td class="cp3">상태</td>
									<td class="cp3">결제방식</td>
								</tr>									
								<?php foreach($session as $row) :?>
									<?php if ($row['date_1'] == "0000-00-00 00:00:00" && $row['status'] == "1OK") : ?>
									<tr style="height:15px;"></tr>
									<tr onclick="openMember(<?=$row['no']?>);">
										<td class="cp3 we200 tace"><?=$row['name']?></td>						
										<td class="cp3 we200 tace"><?=$row['class']?></td>
										<td class="cp3 we200 tace"><?=mdate("%Y-%m-%d %g%A",human_to_unix($row['date_1']))?></td>
										<td class="cp3 we200 tace"><?=mdate("%Y-%m-%d %g%A",human_to_unix($row['date_2']))?></td>
										<td class="cp3 we200 tace"><?=$row['status']?></td>
										<td class="cp3 we200 tace"><?=$row['payment']?></td>
									</tr>
									<tr style="height:15px;"></tr>
									<tr style="height: 1px; background-color: #eeeeee;"><td colspan="6"></td></tr>							
									<?php endif ?>							
								<?php endforeach ?>
							</table>
						</td>
					</tr>

				</table>									
				<div class="h030"></div>		
			</div>								
			<div class="h015"></div>

			<div class="container-fluid bwhite pdg30">
				<p class="dp2 we700 tsilver">질문지 관리</p>
				<p class="cp1 we200 ln18">

				<table width="100%">
				<?php foreach ($schedule as $sch_row) : ?>
					<?php if ($sch_row['count'] == 1) : ?>
					<tr onclick="openQuest(<?=$sch_row['no']?>)" style="border-bottom: 1px solid silver;">
						<td colspan="6" class="bacnavy twhite tace pdg15">								
							<?=date("Y-m-d (D)",human_to_unix($sch_row['sdate']))?> : 
							<font class="we200">
							<?php 
								$sql = "select no from session where date_1='".$sch_row['sdate']."' and status!='cancel'";
								$result = $this->db->query($sql);
								echo $result->num_rows();
							 ?>
							 /
							 <?php 
								$sql = "select no from session where date_1='".$sch_row['sdate']."' and status='wait'";
								$result = $this->db->query($sql);
								echo $result->num_rows();
							 ?>								 
							</font>
							<font class="we200 cp4 lt000 torange">(<?=$sch_row['status']?>)</font>
						</td>
					</tr>
					<?php endif ?>	
					<tr style="display: none;" id="__<?=$sch_row['no']?>">
						<td>
							<?php foreach($question as $row) : ?>
								<?php if ($row['date_1'] == $sch_row['sdate']): ?>
								<b><?=$row['name']?> | <?=$row['address']?> | <?=$row['occupation']?><br></b>
								<?=$row['ques1']?> <?=$row['ques2']?> <?=$row['ques3']?> <?=$row['ques4']?><br>
								<?=$row['ques5']?><?=$row['ques6']?><?=$row['ques7']?><?=$row['ques8']?><br>
								<?=$row['ques9']?><?=$row['ques10']?><?=$row['ques11']?><?=$row['ques12']?><?=$row['ques13']?>
								<br><Br>
								<?php endif ?>
							<?php endforeach ?>							
						</td>
					</tr>
				<?php endforeach ?>
				</table>						
			</p>
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
		function openDate(id)
		{
			data = "#_" + id;	
			if ($(data).css('display') == 'none') {			
				$(data).slideDown(300);
			}	
			else {
				$(data).slideUp(300);
			}		
		}
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
		function openQuest(id)
		{
			data = "#__" + id;	
			if ($(data).css('display') == 'none') {			
				$(data).slideDown(300);
			}	
			else {
				$(data).slideUp(300);
			}	
		}
	</script>