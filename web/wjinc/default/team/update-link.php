<?php 
	$sql="select * from {$this->prename}links where lid=?";
	$linkData=$this->getRow($sql, $args[0]);
	
	if($linkData['uid']){
		$parentData=$this->getRow("select fanDian, fanDianBdw from {$this->prename}members where uid=?", $linkData['uid']);
	}else{
		$this->getSystemSettings();
		$parentData['fanDian']=$this->settings['fanDianMax'];
		$parentData['fanDianBdw']=$this->settings['fanDianBdwMax'];
	}

?>
<style type="text/css">
.modal-body {height:230px; font-size:14px;}
.modal-body ul{ position:absolute;width:800px;}
.modal-body li{ float:left; margin:20px 30px 10px 30px;}
</style>
<form action="<?=$this->basePath('Team-linkUpdateed') ?>" target="ajax" method="post" call="linkDataSubmitCode" onajax="linkDataBeforeSubmitCode" dataType="html">
	<input type="hidden" name="lid" value="<?=$args[0]?>"/>
   <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     <h4 class="modal-title" id="myModalLabel">注册链接返点信息</h4>
   </div>
   <div class="modal-body" >
    <ul>
	  <li>
	    <em>返点：</em><input type="text" name="fanDian" value="<?=$linkData['fanDian']?>" max="<?=$parentData['fanDian']?>" min="0" fanDianDiff=<?=$this->settings['fanDianDiff']?> >%&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#999">0—<?=$parentData['fanDian']?>%</span>
	  </li>
	  <li>
	    <em>不定返点：</em><input type="text" name="fanDianBdw" value="<?=$linkData['fanDianBdw']?>" max="<?=$parentData['fanDianBdw']?>" min="0"/>%&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#999">0—<?=$parentData['fanDianBdw']?>%</span>
	  </li>
	   <li>
	    <em>加入时间：</em><span class="red"><?=date("Y-m-d H:i:s",$linkData['regTime'])?></span>
	  </li>
	</ul>
	</div>
   <div class="modal-footer">
     <button type="button" class="btn btn-action" data-dismiss="modal">关闭</button>
	 <button type="submit" class="btn btn-action">提交更改</button>
   </div>  

</form>
