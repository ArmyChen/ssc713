<?php
$this->getSystemSettings();

	$sql="select * from {$this->prename}members where ";
	if($_GET['username'] && $_GET['username']!='用户名'){
		$_GET['username']=wjStrFilter($_GET['username']);
		if(!ctype_alnum($_GET['username'])) throw new Exception('用户名包含非法字符,请重新输入');
		// 按用户名查找时
		// 只要符合用户名且是自己所有下级的都可查询
		// 用户名用模糊方式查询
		
		$sql.="username like '%{$_GET['username']}%' and concat(',',parents,',') like '%,{$this->user['uid']},%'";
	}else{
		unset($_GET['username']);
		switch($_GET['type']){
			case 0:
				// 所有人
				$sql.="concat(',',parents,',') like '%,{$this->user['uid']},%'";
			break;
			case 1:
				// 我自己
				$sql.="uid={$this->user['uid']}";
			break;
			case 2:
				// 直属下级
				if(!$_GET['uid']) $_GET['uid']=$this->user['uid'];
				$sql.="parentId={$_GET['uid']}";
			break;
			case 3:
				// 所有下级
				$sql.="concat(',',parents,',') like '%,{$this->user['uid']},%' and uid!={$this->user['uid']}";
			break;
			case 4:
				// 当前在线（所有人）
				$sql.="concat(',',parents,',') like '%,{$this->user['uid']},%'";
			break;
			
		}
	}
	//echo $sql;
	//if($_GET['uid']=$this->user['uid']) unset($_GET['uid']);
	$data=$this->getPage($sql, $this->page, $this->pageSize);
	unset($para[$this->baseMethodKey()]);
	unset($_GET['txpgs']);
	$params=http_build_query($_GET, '', '&');
	//echo $params;
?>
<table width="100%" class='table_b'>
	<thead>
		<tr class="table_b_th">
			<td>用户名</td>
            <td>用户类型</td>
            <td>账号来源</td>
            <td>返点</td>
			<td>不定位返点</td>
			<td>余额</td>
			<td>状态</td>
			<td>在线</td>
			<td>Q Q</td>
			<td>注册时间</td>
			<td width="17%">操作</td>
		</tr>
	</thead>
	<tbody class="table_b_tr">
	<?php if($data['data']) foreach($data['data'] as $var){ 
	 $login=$this->getRow("select * from {$this->prename}member_session where uid=? order by id desc limit 1", $var['uid']);
	 if($_GET['type']==4){  //过滤当前在线人员数据
	    if($login['isOnLine']==1 && ceil(strtotime(date('Y-m-d H:i:s', time()))-strtotime(date('Y-m-d H:i:s',$login['accessTime'])))<$GLOBALS['conf']['member']['sessionTime']){
	 ?>
		<tr>
			<td><?=$var['username']?></td>
            <td><?=$this->iff($var['type'],'代理','会员')?></td>
            <td><?=$this->iff($var['src']=="",'--', $var['src'])?></td>
            <td><?=$var['fanDian']?>%</td>
			<td><?=$var['fanDianBdw']?>%</td>
			<td><?=$var['coin']?></td>
			
			<td><?=$this->iff($var['enable'],'正常','冻结')?></td>
            <td><?=$this->iff($login['isOnLine'] && ceil(strtotime(date('Y-m-d H:i:s', time()))-strtotime(date('Y-m-d H:i:s',$login['accessTime'])))<$GLOBALS['conf']['member']['sessionTime'], '<font color="#FF0000">在线</font>', '离线')?></td>
			<td><?=$this->iff($var['qq'],$var['qq'],'无')?></td>
			<td><?=date('Y-m-d',$var['regTime'])?></td>
            <?php if($this->user['uid']!=$var['uid'] && $var['parentId']==$this->user['uid']){ ?>
			<td>
			 <a data-toggle="modal" href="<?=$this->basePath('Team-userUpdate', $var['uid']) ?>" title="修改团队会员信息" data-target="#userUpdateModal">修改</a>
			&nbsp;&nbsp;
			<?php if($this->settings['recharge']==1){?>
			 <a data-toggle="modal" href="<?=$this->basePath('Team-userUpdate2', $var['uid']) ?>" title="给下级充值" data-target="#userUpdateModal">充值</a>
			&nbsp;&nbsp;
            <?php }?>
			<?php if($var['red']>0 || $this->settings['noRedToRed']){ ?>
			 <a data-toggle="modal" href="<?=$this->basePath('Team-userDoRedeed', $var['uid']) ?>" title="给下级分发亏损分红" data-target="#userUpdateModal">分红</a>
			 &nbsp;&nbsp;
            <?php }?>
			<a class="caozuo" href="<?=$this->basePath('Team-searchMember','', true) ?>&type=2&uid=<?=$var['uid']?>">查看下级</a></td>
            <?php }else{ ?>
            <td><a class="caozuo" href="<?=$this->basePath('Team-searchMember','',true) ?>&type=2&uid=<?=$var['uid']?>">查看下级</a></td>
            <?php } ?>
		</tr>
	<?php 
		  }  
		}else{ //正常显示
		?>
		<tr>
			<td><?=$var['username']?></td>
            <td><?=$this->iff($var['type'],'代理','会员')?></td>
            <td><?=$this->iff($var['src']=="",'--', $var['src'])?></td>
            <td><?=$var['fanDian']?>%</td>
			<td><?=$var['fanDianBdw']?>%</td>
			<td><?=$var['coin']?></td>
			
			<td><?=$this->iff($var['enable'],'正常','冻结')?></td>
            <td><?=$this->iff($login['isOnLine'] && ceil(strtotime(date('Y-m-d H:i:s', time()))-strtotime(date('Y-m-d H:i:s',$login['accessTime'])))<$GLOBALS['conf']['member']['sessionTime'], '<font color="#FF0000">在线</font>', '离线')?></td>
			<td><?=$this->iff($var['qq'],$var['qq'],'无')?></td>
			<td><?=date('Y-m-d',$var['regTime'])?></td>
            <?php if($this->user['uid']!=$var['uid'] && $var['parentId']==$this->user['uid']){ ?>
			<td>
			 <a data-toggle="modal" href="<?=$this->basePath('Team-userUpdate', $var['uid']) ?>" title="修改团队会员信息" data-target="#userUpdateModal">修改</a>
			&nbsp;&nbsp;
			<?php if($this->settings['recharge']==1){?>
			 <a data-toggle="modal" href="<?=$this->basePath('Team-userUpdate2', $var['uid']) ?>" title="给下级充值" data-target="#userUpdateModal">充值</a>
			&nbsp;&nbsp;
            <?php }?>
			<?php if($var['red']>0 || $this->settings['noRedToRed']){ ?>
			 <a data-toggle="modal" href="<?=$this->basePath('Team-userDoRedeed', $var['uid']) ?>" title="给下级分发亏损分红" data-target="#userUpdateModal">分红</a>
			 &nbsp;&nbsp;
            <?php }?>
			<a class="caozuo" href="<?=$this->basePath('Team-searchMember','', true) ?>&type=2&uid=<?=$var['uid']?>">查看下级</a></td>
            <?php }else{ ?>
            <td><a class="caozuo" href="<?=$this->basePath('Team-searchMember','',true) ?>&type=2&uid=<?=$var['uid']?>">查看下级</a></td>
            <?php } ?>
		</tr>
	<?php	
	  }
	 } ?>
	</tbody>
</table>
<!-- 模态框（Modal） -->
<div class="modal fade" id="userUpdateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content" style="width:800px;  margin-left:-100px;">
        
      </div><!-- /.modal-content -->
   </div><!-- modal-dialog -->
</div><!-- /.modal -->
<?php 
	$this->display('inc_page.php',0,$data['total'],$this->pageSize, $this->basePath('Team-searchMember','',true).'&txpgs={page}?'.$params);
?>
