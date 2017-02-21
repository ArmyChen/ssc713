<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php $this->display('inc_skin.php', 0 , '添加会员－代理中心'); ?>
<script type="text/javascript" src="<?=$this->settings['templateurl'] ?>/template/js/comm/team.js"></script>
<script type="text/javascript">
function khao(fanDian, bFanDian){
	$('input[name=fanDian]').val(fanDian);
	$('input[name=fanDianBdw]').val(bFanDian);
	return false;
}
</script>
</head> 
 <body>
<?php $this->display('inc_header.php'); ?>
<div id="rightcon">
            <div class="head-box">
                <div class="haed-box-wrapper">
                    <div class="head-box-bg1" id="transform"></div>
                    <div class="head-box-bg2" id="transform"></div>
                    <div class="head-box-bg3"></div>
                </div>
            </div>
            <div class="wrapper bigbox">
<div class="page-wrapper">
    <p id="page-title"><span class="fa fa-users"></span>游戏记录</p>
    <div class="top_menu">
        <a class="act" href="<?=$this->basePath('Team-memberList') ?>">会员管理</a>
        <a href="<?=$this->basePath('Team-gameRecord') ?>">游戏记录</a>
        <a href="<?=$this->basePath('Team-report') ?>">盈亏报表</a>
        <a href="<?=$this->basePath('Team-coinall') ?>">团队统计</a>
        <a href="<?=$this->basePath('Team-coin') ?>">帐变记录</a>
        <a href="<?=$this->basePath('Team-cashRecord') ?>">提现记录</a>
        <a href="<?=$this->basePath('Team-linkList') ?>">推广链接</a>
    </div>
    <div class="page-info">
	 <div class="page_search">
  <form action="<?=$this->basePath('Team-insertMember') ?>" method="post" target="ajax" onajax="teamBeforeAddMember" call="teamAddMember">
	<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
		    <tr class='table_b_th'>
		      <td align="left" style="font-weight:bold;padding-left:10px;" colspan=2>新增成员</td> 
		    </tr>
		    <tr height=25 class='table_b_tr_b'>
		      <td align="right" style="font-weight:bold;">账号类型：</td>
		      <td align="left" ><label><input type="radio" name="type" value="1" title="代理" checked="checked" style="width:auto;" />代理</label><label><input name="type" type="radio" value="0" title="会员" style="margin-left:30px;width:auto;"  />会员</label></td> 
		    </tr>  
		    <tr height=25 class='table_b_tr_b'>
		      <td align="right" style="font-weight:bold;">用户名：</td>
		      <td align="left" ><input name="username" type="text"  value="" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')"/><span style="color:#000; margin-left:10px;">用户名由4-16位的字母或数字组成</span></td> 
		    </tr> 
		     <tr height=25 class='table_b_tr_b'>
		      <td align="right" style="font-weight:bold;">密码：</td>
		      <td align="left" ><input name="password" type="password"  value="123456" /><span style="color:#000; margin-left:10px;">默认密码：123456</span></td> 
		    </tr>  
		     <tr height=25 class='table_b_tr_b'>
		      <td align="right" style="font-weight:bold;">确认密码：</td>
		      <td align="left" ><input id="cpasswd" type="password" value="123456" /></td> 
		    </tr> 
		     <tr height=25 class='table_b_tr_b'>
		      <td align="right" style="font-weight:bold;">联系 Q Q：</td>
		      <td align="left" ><input name="qq" value="" type="text" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"/></td> 
		    </tr>
		    <tr height=25 class='table_b_tr_b'>
		      <td align="right" style="font-weight:bold;">返点%：</td>
		      <td align="left" ><input name="fanDian" type="text" max="<?=$this->user['fanDian']?>" value=""  fanDianDiff=<?=$this->settings['fanDianDiff']?> onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')"/><span style="color:#000; margin-left:10px;">0-<?=$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<=0,0,$this->user['fanDian']-$this->settings['fanDianDiff'])?>%</span></td> 
		    </tr>
			<?php if($this->user['fanDianBdw']<=0){
			         $none='style="display:none"'; } ?>
		     <tr height=25 class='table_b_tr_b' <?=$none ?> >
		      <td align="right" style="font-weight:bold;">不定位返点%：</td>
		      <td align="left" ><input name="fanDianBdw" type="text" max="<?=$this->user['fanDianBdw']?>" value=""  ōnkeyup="if(isNaN(value))execCommand(''undo'')" onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')"/><span style="color:#000; margin-left:10px;">0-<?=$this->iff($this->user['fanDianBdw']-$this->settings['fanDianDiff']<=0,0,$this->user['fanDianBdw']-$this->settings['fanDianDiff'])?>%</span></td>
		    </tr>
		    <?php if($this->user['red']>0 || $this->settings['noRedToRed']){?>
			<tr>
				<td align="right" style="font-weight:bold;">亏损分红%：</td>
				<td align="left" ><input type="text" name="red" value="<?=$userData['red']?>" max="<?=$this->user['red']?>" min="0" val="<?=$userData['red']?>"/><span style="color:#000; margin-left:10px;">0-<?=$this->user['red']?>%</span></td>
			</tr>
		<?php } ?>
		     <tr height=25 class='table_b_tr_b'>
		      <td align="right" style="font-weight:bold;"></td>
		      <td align="left"><input type="submit" id='put_button_pass'  class="btn_search addbtn btn btn-action" value="增加成员" ><input type="reset" class="btn btn-action" value="重置" /></td> 
		    </tr>
		</table> 
  </form> 
    </div>
	
        <div class="clear"></div>
	  <div class="page_list">
          <?php
		$sql="select s.*, (select count(*) from {$this->prename}members m where m.parentId={$this->user['uid']} and m.fanDian=s.fanDian) registerUserCount from {$this->prename}params_fandianset s where s.fanDian=<{$this->user['fanDian']}  order by s.fanDian desc";
		//echo $sql;
		if($data=$this->getRows($sql)){ ?>
		<table width="100%">
			<tr class="table_b_th">
				<td>返点</td>
				<td>不定位返点</td>
				<td>注册人数</td>
				<td>剩余人数</td>
				<td>操作</td>
			</tr>
		<?php foreach($data as $var){ if($var['userCount']-$var['registerUserCount']){?>
			<tr class="table_b_tr">
				<td><?=$var['fanDian']?></td>
				<td><?=$var['bFanDian']?></td>
				<td><?=$var['registerUserCount']?></td>
				<td><?=$var['userCount']-$var['registerUserCount']?></td>
				<td>
					<?php if($var['userCount']-$var['registerUserCount']>0 or true){ ?>
						<a href="javascript:;" onclick="khao(<?=$var['fanDian']?>, <?=$var['bFanDian']?>)">开号</a>
					<?php }else{ ?>
						--
					<?php } ?>
				</td>
			</tr>
		<?php } }?>
		</table>
		<?php } ?>
	  </div>
        <div class="clear"></div>
    </div>
</div>
</div>
</div><?php $this->display('inc_footer.php'); ?>
</body>
</html>
  
   
 