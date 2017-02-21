<!-- 模态框（Modal） -->
<div class="modal fade" id="letterInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content" style="width:800px;  margin-left:-100px;">
        
      </div><!-- /.modal-content -->
   </div><!-- modal-dialog -->
</div><!-- /.modal -->
<?php
    //echo $_REQUEST['fromTime'].$_REQUEST['toTime'];
	
	// 日期限制
	if($_REQUEST['fromTime'] && $_REQUEST['toTime']){
		$timeWhere=' l.actionTime between '. strtotime($_REQUEST['fromTime']).' and '.strtotime($_REQUEST['toTime']);
	}elseif($_REQUEST['fromTime']){
		$timeWhere=' l.actionTime >='. strtotime($_REQUEST['fromTime']);
	}elseif($_REQUEST['toTime']){
		$timeWhere=' l.actionTime <'. strtotime($_REQUEST['toTime']);
	}else{
		
		if($GLOBALS['fromTime'] && $GLOBALS['toTime']) $timeWhere=' l.actionTime between '.$GLOBALS['fromTime'].' and '.$GLOBALS['toTime'].' ';
	}
	
	$TypeWhere=" and (sId={$this->user['uid']} or aId={$this->user['uid']}) "; //所有列表(默认)
	// 发送列表 接收列表区分 
	if($_REQUEST['type']=intval($_REQUEST['type'])){
		switch($_REQUEST['type']){
		  case 1:
		    $TypeWhere=" and (sId={$this->user['uid']} or aId={$this->user['uid']}) "; //所有列表
		  break;
		  case 2:
		    $TypeWhere=" and sId={$this->user['uid']} "; //发送列表
		  break;
		  case 3:
		    $TypeWhere=" and aId={$this->user['uid']} "; //接收列表
		  break;
		}
	}
	
	/*// 用户类型限制
	if($_REQUEST['username'] && $_REQUEST['username']!='用户名'){
		$_REQUEST['username']=wjStrFilter($_REQUEST['username']);
		if(!ctype_alnum($_REQUEST['username'])) throw new Exception('用户名包含非法字符,请重新输入');
		$userWhere=" and u.parents like '%,{$this->user['uid']},%' and u.username like '%{$_REQUEST['username']}%'";
	}*/

	
	$sql="select u.username susername,m.username as ausername,l.* from {$this->prename}letter l left join {$this->prename}members u on u.uid=sid left join {$this->prename}members m on m.uid=aid where $timeWhere $TypeWhere   order by l.actionTime,l.IsRead desc";
	//echo $sql;
	
	$list=$this->getPage($sql, $this->page, $this->pageSize);
	
	$para=$_POST;
	unset($para[$this->baseMethodKey()]);
	unset($para['txpgs']);
	$params=http_build_query($para, '', '&');
?>
<table width="100%" class='table_b'>
	<thead>
		<tr class="table_b_th">
			<td>编号</td>
			<td>状态</td>
			<td>主题</td>
			<td>发送人</td>
			<td>接收人</td>
			<td>时间</td>
		</tr>
	</thead>
	<tbody class="table_b_tr">
		<?php if($list['data']) foreach($list['data'] as $var){ ?>
		<tr>
			<td><?=$var['id']?></td>
			<td>
			<?php if($var['IsRead']==1 && $var['sId']==$this->user['uid']){
					  echo '<font color="#009900">对方已读</font>';
					}else if($var['IsRead']==0 && $var['sId']==$this->user['uid']){
					  echo '<font color="#999999">对方未读</font>';
					}else if($var['IsRead']==1 && $var['aId']==$this->user['uid']){
					  echo '<font color="#009900">已读信息</font>';
					}else if($var['IsRead']==0 && $var['aId']==$this->user['uid']){
					  echo '<font color="#999999">未读信息</font>';
					}
			?></td>
            <td><a data-toggle="modal" href="<?=$this->basePath('Letter-letterInfo', $var['id'])?>" data-target="#letterInfo"><?=$var['title']?></a></td>			
			<td>
			<?php if($var['sId']==$this->user['uid']){
					  echo '<font color="#999999">--</font>';
					}else if($var['sId']==0){
					  echo '<font color="#009900">系统客服</font>';
					}else{
					  echo '<font color="#009900">'.$var['susername'].'</font>';
					}
			?></td>	
			<td><?php if($var['aId']==$this->user['uid']){
					  echo '<font color="#999999">--</font>';
					}else if($var['aId']==0){
					  echo '<font color="#009900">系统客服</font>';
					}else{
					  echo '<font color="#009900">'.$var['ausername'].'</font>';
					}
			?></td>
			<td><?php echo substr(date('Y-m-d H:i:s', $var['actionTime']),2)?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php 
	$this->display('inc_page.php',0,$list['total'],$this->pageSize, $this->basePath($this->controller.'-'.$this->action,'',true)."&txpgs={page}&$params");
?>