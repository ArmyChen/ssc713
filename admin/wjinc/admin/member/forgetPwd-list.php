<table class="tablesorter" cellspacing="0"> 
	<thead> 
		<tr> 
			<th>是否处理</th>
			<th>编号</th>
			<th>用户名</th>
			<th>密码</th>
			<th>qq</th>
			<th>备注内容</th>
			<th>申请时间</th>
			<th>操作人</th>
			<th>处理时间</th>
		</tr> 
	</thead> 
	<tbody> 
	 <?php
	
	if($_GET['fromTime'] && $_GET['toTime']){
		$timeWhere=' f.actionTime between '. strtotime($_GET['fromTime']).' and '.strtotime($_GET['toTime']);
	}else if($_GET['fromTime']){
		$timeWhere=' f.actionTime >='. strtotime($_GET['fromTime']);
	}else if($_GET['toTime']){
		$timeWhere=' f.actionTime <'. strtotime($_GET['toTime']);
	}else{
		$timeWhere=' f.actionTime>'.strtotime('00:00');
	}
	
	
	$sql="select m.username as musername,f.*,left(f.content,10) as showcontent from {$this->prename}forgetpassword f left join {$this->prename}manager m on  f.mId=m.uid  where $timeWhere order by f.actionTime,f.flag desc";
	//echo $sql;
	
                $list=$this->getPage($sql, $this->page, $this->pageSize);
                if($list['data']) 
				   foreach($list['data'] as $var){
            ?>
            <tr>
			<td><?php if($var['flag']==1){
					  echo '<font color="#009900">已处理</font>';
					}else{
					  echo '<font color="#999999">未处理</font>';
					}?>
			</td>
            <td><a href="member/UpdateforgetPwd/<?=$var['id']?>" ><?=$var['id']?></a></td>	
			<td><?=$var['username']?></td>	
			<td><?=$var['password']?></td>	
			<td><?=$var['qq']?></td>	
			<td><a href="member/UpdateforgetPwd/<?=$var['id']?>" ><?=$var['showcontent']?></a></td>	
			<td><?=date("Y-m-d H:i:s",$var['actionTime'])?></td>
			<td><?=$var['musername']?></td>	
			<td><?=date("Y-m-d H:i:s",$var['mTime'])?></td>
            </tr>
            <?php }else{ ?>
            <tr>
                <td colspan="10" align="center">没有重置密码申请列表记录</td>
            </tr>
            <?php } ?>
	</tbody> 
    </table>
	<footer>
	<?php
		$rel=get_class($this).'/forgetPwd-{page}?'.http_build_query($_GET,'','&');
		$this->display('inc/page.php', 0, $list['total'], $rel, 'forgetPwdSearchPageAction');
	?>
	</footer>