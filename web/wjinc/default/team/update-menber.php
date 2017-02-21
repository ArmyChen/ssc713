
<?php 
	$sql="select * from {$this->prename}members where uid=?";
	$userData=$this->getRow($sql, $args[0]);
	
	if($userData['parentId']){
		$parentData=$this->getRow("select fanDian, fanDianBdw from {$this->prename}members where uid=?", $userData['parentId']);
	}else{
		$this->getSystemSettings();
		$parentData['fanDian']=$this->settings['fanDianMax'];
		$parentData['fanDianBdw']=$this->settings['fanDianBdwMax'];
	}
?>
<style type="text/css">
.modal-body {height:240px; font-size:14px;}
.modal-body ul{ position:absolute;width:800px;}
.modal-body li{ float:left; margin:10px 30px 10px 30px;}
</style>

<form action="<?=$this->basePath('Team-userUpdateed') ?>" target="ajax" method="post" call="userDataSubmitCode" onajax="userDataBeforeSubmitCode" dataType="html">
	<input type="hidden" name="type" value="<?=$userData['type']?>"/>
	<input type="hidden" name="uid" value="<?=$args[0]?>"/>
   <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     <h4 class="modal-title" id="myModalLabel">修改团队会员信息</h4>
   </div>
   <div class="modal-body" >
    <ul>
	  <?php if($userData['parentId']){ ?>
	  <li>
	    <em>上级关系：</em><span class="red"><?=$this->getValue("select username from {$this->prename}members where uid={$userData['parentId']} ")?> > <?=$userData['username']?></span>
	  </li>
	  <?php } ?>
	   <li>
	    <em>用户名：</em><span class="red"><?=$userData['username']?></span>
	  </li>
	   <li>
	    <em>会员类型：</em><span><input type="radio" value="1" name="type" <?php if($userData['type']) echo 'checked="checked"'?>/>代理</label>&nbsp;&nbsp;<label><input type="radio" value="0" name="type" <?php if(!$userData['type']) echo 'checked="checked"'?>/>会员</span>
	  </li>
	   <li>
	    <em>返点：</em><input type="text" name="fanDian" value="<?=$userData['fanDian']?>" max="<?=$parentData['fanDian']?>" min="0" fanDianDiff=<?=$this->settings['fanDianDiff']?> val="<?=$userData['fanDian']?>" >%&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#999">0—<?=$this->iff($parentData['fanDian']-$this->settings['fanDianDiff']<=0,0,$parentData['fanDian']-$this->settings['fanDianDiff'])?>%</span>
	  </li>
	  <li>
	    <em>不定返点：</em><input type="text" name="fanDianBdw" value="<?=$userData['fanDianBdw']?>" max="<?=$parentData['fanDianBdw']?>" min="0" val="<?=$userData['fanDianBdw']?>"/>%&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#999">0—<?=$this->iff($parentData['fanDianBdw']-$this->settings['fanDianDiff']<=0,0,$parentData['fanDianBdw']-$this->settings['fanDianDiff'])?>%</span>
	  </li>
	  <?php if($this->user['red']>0 || $this->settings['noRedToRed']){?>
	  <li>
	    <em>亏损分红：</em><input type="text" name="red" value="<?=$userData['red']?>" max="<?=$this->user['red']?>" min="0" val="<?=$userData['red']?>"/>%&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#999">0—<?=$this->user['red']?>%</span>
	  </li>
	  <?php } ?>
	   <li>
	    <em>注册时间：</em><span class="green"><?=date("Y-m-d",$userData['regTime'])?></span>
	  </li>
	  </ul>
   </div>
   <div class="modal-footer">
     <button type="button" class="btn btn-action" data-dismiss="modal">关闭</button>
	 <button type="sumbit" class="btn btn-action">提交更改</button>
   </div>  
</form>