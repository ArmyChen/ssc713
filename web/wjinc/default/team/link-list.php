<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php $this->display('inc_skin.php', 0 , '推广链接-代理中心'); ?>
<script type="text/javascript" src="<?=$this->settings['templateurl'] ?>/template/js/comm/team.js"></script>
<!--//复制程序 flash+js-->
<script type="text/javascript" src="<?=$this->settings['templateurl'] ?>/template/js/base/swfobject.js"></script>
<script language="JavaScript">
function Alert(msg) {
	davidOk(msg);
}
function thisMovie(movieName) {
	 if (navigator.appName.indexOf("Microsoft") != -1) {   
		 return window[movieName];   
	 } else {   
		 return document[movieName];   
	 }   
 } 
function copyFun(ID) {
	thisMovie(ID[0]).getASVars($("#"+ID[1]).attr('value'));
}
</script>
<!--//复制程序 flash+js------end-->
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
    <p id="page-title"><span class="fa fa-users"></span>推广链接</p>
    <div class="top_menu">
        <a href="<?=$this->basePath('Team-memberList') ?>">会员管理</a>
        <a href="<?=$this->basePath('Team-gameRecord') ?>">游戏记录</a>
        <a href="<?=$this->basePath('Team-report') ?>">盈亏报表</a>
        <a href="<?=$this->basePath('Team-coinall') ?>">团队统计</a>
        <a href="<?=$this->basePath('Team-coin') ?>">帐变记录</a>
        <a href="<?=$this->basePath('Team-cashRecord') ?>">提现记录</a>
        <a class="act" href="<?=$this->basePath('Team-linkList') ?>">推广链接</a>
    </div>
    <div class="page-info">
	 <div class="page_search">
      <input type="button" value="添加链接"  style=" margin-top:8px; margin-left:28px;" class="btn_search btn btn-action"  onclick="window.location='<?=$this->basePath('Team-addLink') ?>'"/>
     </div>
	
        <div class="clear"></div>
	  <div class="page_list">
          	<?php
	$sql="select * from {$this->prename}links where uid={$this->user['uid']}";
	
	if($_GET['uid']=$this->user['uid']) unset($_GET['uid']);
	$data=$this->getPage($sql, $this->page, $this->pageSize);
	?>
	<table width="100%" class='table_b'>
	<thead>
		<tr class="table_b_th">
			<td>编号</td>
            <td>类型</td>
			<td>返点</td>
            <td>不定位返点</td>
            <td>已注册人数</td>
			<td>状态</td>
			<td>操作</td>
		</tr>
	</thead>
	<tbody class="table_b_tr">
	<?php if($data['data']) foreach($data['data'] as $var){ ?>
		<tr>
			<td><?=$var['code']?></td>
			<td><?php if($var['type']){echo'代理';}else{echo '会员';}?></td>
			<td><?=$var['fanDian']?>%</td>
            <td><?=$var['fanDianBdw']?>%</td>
            <td><?=$var['count']?></td>
			<td><?php if($var['enable']){echo'<font color=#007500>正常</font>';}else{echo '<font color=#FF2D2D>已停用</font>';}?></td>
			<td>
				 <a href="<?=$this->basePath('Team-switchLinkStatus', $var['lid']) ?>" target="ajax" call="sysReload"><?=$this->iff($var['enable'],'停用','启用') ?></a> | 
				 <a data-toggle="modal" href="<?=$this->basePath('Team-linkUpdate', $var['lid'])?>" title="修改注册链接" data-target="#linkUpdate">修改</a> | 
				 <a data-toggle="modal" href="<?=$this->basePath('Team-getLinkCode', $var['lid']) ?>" title="获取链接" data-target="#getLinkCode">获取链接</a> | 
				 <a data-toggle="modal" href="<?=$this->basePath('Team-linkDelete', $var['lid']) ?>" title="删除注册链接" data-target="#linkDelete">删除</a> | 
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
	<?php $this->display('inc_page.php',0,$data['total'],$this->pageSize, $this->basePath('Team-linkList', '', true).'&txpgs={page}');?>
	  </div>
        <div class="clear"></div>
    </div>
</div>
</div>
<!-- 模态框（Modal） -->
<div class="modal fade" id="linkUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content" style="width:800px;  margin-left:-100px;">
        
      </div><!-- /.modal-content -->
   </div><!-- modal-dialog -->
</div><!-- /.modal -->
<!-- 模态框（Modal） -->
<div class="modal fade" id="getLinkCode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content" style="width:800px;  margin-left:-100px;">
        
      </div><!-- /.modal-content -->
   </div><!-- modal-dialog -->
</div><!-- /.modal -->
<!-- 模态框（Modal） -->
<div class="modal fade" id="linkDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content" style="width:800px;  margin-left:-100px;">
        
      </div><!-- /.modal-content -->
   </div><!-- modal-dialog -->
</div><!-- /.modal -->
</div><?php $this->display('inc_footer.php'); ?>
</body>
</html>
  
   
 