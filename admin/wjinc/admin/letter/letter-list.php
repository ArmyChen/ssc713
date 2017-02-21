<table class="tablesorter" cellspacing="0"> 
	<thead> 
		<tr> 
			<th>编号</th>
			<!--<th>状态</th>-->
			<th>主题</th>
			<th>发送人</th>
			<th>接收人</th>
			<th>时间</th>
		</tr> 
	</thead> 
	<tbody> 
	 <?php
			
			
	// 用户类型限制
	if($_GET['username'] && $_GET['username']!='会员名'){
		$_GET['username']=wjStrFilter($_GET['username']);
		if(!ctype_alnum($_GET['username'])) throw new Exception('会员名包含非法字符,请重新输入');
		$userId=$this->getValue("select uid from {$this->prename}members where username='{$_GET['username']}'");
		//$userWhere=" and m.uid ={$userId}";
	}
	
	if($_GET['fromTime'] && $_GET['toTime']){
		$timeWhere=' l.actionTime between '. strtotime($_GET['fromTime']).' and '.strtotime($_GET['toTime']);
	}else if($_GET['fromTime']){
		$timeWhere=' l.actionTime >='. strtotime($_GET['fromTime']);
	}else if($_GET['toTime']){
		$timeWhere=' l.actionTime <'. strtotime($_GET['toTime']);
	}else{
		$timeWhere=' l.actionTime>'.strtotime('00:00');
	}
	
	
	// 发送列表 接收列表区分
	/*
	if($_GET['type']=intval($_GET['type']) && $userId !=''){
	    if($_GET['type']==1){
		    $TypeWhere=" and (sId={$userId} or aId={$userId}) "; //所有列表
		}else if($_GET['type']==2){
		    $TypeWhere=" and sId={$userId} "; //发送列表
		}else if($_GET['type']==3){
		    $TypeWhere=" and aId={$userId} "; //接收列表
		}
	}
	*/
	if($userId !=''){
	   $TypeWhere=" and (sId={$userId} or aId={$userId}) "; //所有列表
	}
	
	$sql="select u.username susername,m.username as ausername,l.* from {$this->prename}letter l left join {$this->prename}members u on u.uid=sid left join {$this->prename}members m on m.uid=aid where $timeWhere $TypeWhere  order by l.actionTime,l.IsRead desc";
	//echo $sql;
	
                $list=$this->getPage($sql, $this->page, $this->pageSize);
                if($list['data']) foreach($list['data'] as $var){
            ?>
            <tr>
               <td><?=$var['id']?></td>
			<!--<td>
			<?php if($var['IsRead']==1 && $var['sId']==$userId){
					  echo '<font color="#009900">对方已读</font>';
					}else if($var['IsRead']==0 && $var['sId']==$userId){
					  echo '<font color="#999999">对方未读</font>';
					}else if($var['IsRead']==1 && $var['aId']==$userId){
					  echo '<font color="#009900">已读信息</font>';
					}else if($var['IsRead']==0 && $var['aId']==$userId){
					  echo '<font color="#999999">未读信息</font>';
					}
			?></td>-->
            <td><a href="letter/letterInfo/<?=$var['id']?>" ><?=$var['title']?></a></td>			
			<td>
			<?php  if($var['sId']==0){
					  echo '<font color="#999999">系统客服</font>';
					}else{
					  echo '<font color="#009900">'.$var['susername'].'</font>';
					}
			?></td>	
			<td><?php if($var['aId']==0){
					   echo '<font color="#999999">系统客服</font>';
					  }else{
					   echo '<font color="#009900">'.$var['ausername'].'</font>';
					  }
			?></td>
			<td><?php echo substr(date('Y-m-d H:i:s', $var['actionTime']),2)?></td>
            </tr>
            <?php }else{ ?>
            <tr>
                <td colspan="5" align="center">没有站内信消息列表记录</td>
            </tr>
            <?php } ?>
	</tbody> 
    </table>
	<footer>
	<?php
		$rel=get_class($this).'/letter-{page}?'.http_build_query($_GET,'','&');
		$this->display('inc/page.php', 0, $list['total'], $rel, 'betLogSearchPageAction');
	?>
	</footer>