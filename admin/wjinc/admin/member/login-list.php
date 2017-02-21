<?php
	$para=$_GET;
	// 用户名限制
	if($para['username']){
		$para['username']=wjStrFilter($para['username']);
		if(!ctype_alnum($para['username'])) throw new Exception('用户名包含非法字符,请重新输入');
		$userWhere=" and username='{$para['username']}'";
	}
	
	// IP限制
	if($para['ip']){
		$para['ip']=wjStrFilter($para['ip']);
		if(strlen($para['ip']) > 15) throw new Exception('IP不正确,请重新输入');
		$ip = ip2long($para['ip']);
		if(!$ip) throw new Exception('IP不正确,请重新输入');
		$ipWhere=" and loginIp=$ip";
	}
	
	// 浏览器限制
	if($para['browser']){
		$para['browser']=wjStrFilter($para['browser']);
		$browserWhere=" and browser='{$para['browser']}'";
	}
	// 操作系统限制
	if($para['os']){
		$para['os']=wjStrFilter($para['os']);
		$osWhere=" and os='{$para['os']}'";
	}
	
	// 时间限制
	if($_REQUEST['fromTime'] && $_REQUEST['toTime']){
		$fromTime=strtotime($_REQUEST['fromTime']);
		$toTime=strtotime($_REQUEST['toTime'])+24*3600;
		$timeWhere="and loginTime between $fromTime and $toTime";
	}elseif($_REQUEST['fromTime']){
		$fromTime=strtotime($_REQUEST['fromTime']);
		$timeWhere="and loginTime>=$fromTime";
	}elseif($_REQUEST['toTime']){
		$toTime=strtotime($_REQUEST['toTime'])+24*3600;
		$timeWhere="and loginTime<$fromTime";
	}

	$sql="select * from {$this->prename}member_session where 1 $timeWhere $userWhere $ipWhere $browserWhere $osWhere order by loginTime desc";
// 	echo $sql;
	$data=$this->getPage($sql, $this->page, $this->pageSize);
?>
<article class="module width_full">
<input type="hidden" value="<?=$this->user['username']?>" />
    <header>
    	<h3 class="tabs_involved">登录日志
            <form action="/admin778899.php/member/loginLog" target="ajax" dataType="html" call="defaultSearch" class="submit_link wz">
                会员名：<input type="text" class="alt_btn" style="width:100px;" name="username" value="<?=$para['username'] ?>"/>&nbsp;&nbsp;
      IP：<input type="text" class="alt_btn" style="width:100px;" name="ip" value="<?=$para['ip'] ?>"/>&nbsp;&nbsp;
                时间：从 <input type="date" class="alt_btn" name="fromTime" value="<?=$para['fromTime'] ?>"/> 到 <input type="date" class="alt_btn" name="toTime" value="<?=$para['toTime'] ?>"/>&nbsp;&nbsp;
                <input type="submit" value="查找" class="alt_btn">
            </form>
        </h3>
    </header>
	<table class="tablesorter" cellspacing="0">
	<thead>
		<tr>
			<td>ID</td>
			<td>用户名</td>
			<td>IP</td>
			<td>浏览器</td>
			<td>操作系统</td>
			<td>移动设备</td>
			<td>登录时间</td>
			<td>操作</td>
		</tr>
	</thead>
	<tbody id="nav01">
	<?php if($data['data']) foreach($data['data'] as $var){ ?>
		<tr>
			<td><?=$var['id']?></td>
			<td><a href="member/loginLog?username=<?=$var['username']?>"><?=$var['username']?></a></td>
			<td><a href="member/loginLog?ip=<?=long2ip($var['loginIP'])?>"><?=long2ip($var['loginIP'])?></a></td>
			<td><a href="member/loginLog?browser=<?=$var['browser']?>"><?=$var['browser']?></a></td>
			<td><a href="member/loginLog?os=<?=$var['os']?>"><?=$var['os']?></a></td>
			<td><?=$this->iff($var['isMobileDevices'], '是', '否')?></td>
			<td><?=date('Y-m-d H:i:s', $var['loginTime'])?></td>
			<td><a href="member/loginLog?username=<?=$var['username']?>">只看此人</a></td>
		</tr>
	<?php } ?>
	</tbody>
    </table>
	<footer>
	<?php
		$rel=get_class($this).'/loginLog-{page}?'.http_build_query($_GET,'','&');
		$this->display('inc/page.php', 0, $data['total'], $rel, 'defaultReplacePageAction');
	?>
	</footer>
</article>
<script type="text/javascript">  
ghhs("nav01","tr");  
</script>