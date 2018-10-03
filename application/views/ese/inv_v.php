	<div class="container">
		<center>
		 <div class="h100"></div>

		 <table width="100%">
		 <?php foreach ($data as $row) : ?>
		 	<?php if ($row['no'] > 1) : ?>
		 	<tr>
		 		<td class="cp2 we200 lt000 ln18 tale"><?=$row['name']?> | <?=$row['modified']?></td>
		 	</tr>		 	
		 	<tr>
		 		<td class="cp1 we500 lt000 ln18 tale">
		 			<?=$row['contents']?>
		 		</td>
		 	</tr>
		 	<tr style="height: 20px;"></tr>
		 	<?php endif ?>
		 <?php endforeach ?>
		 </table>
		 
		 <br><br><br><br>
		 <form method="post" action="<?=site_url('TableBuilder/btnSubmit')?>">
		 <input type="hidden" name="bdName" value="<?=$this->uri->segment(3,0)?>">
		 <table align="left">
		 	<tr>
		 		<td class="cp1">이 름</td>
		 		<td><input type="text" name="name" style="height:30px; width: 100%;"></td>
		 	</tr>
		 	<tr style="height: 5px;"></tr>
		 	<tr>
		 		<td colspan="2">
		 			<textarea name="contents" style="width:350px; height: 150px;"></textarea>
		 		</td>
		 	</tr>
		 	<tr style="height: 5px;"></tr>
		 	<tr>
		 		<td colspan="2">
		 			<button type="submit" style="width:100%; height: 35px;">글쓰기</button>
		 		</td>
		 	</tr>
		 </table>
		 </form>
		<center>
	</div>