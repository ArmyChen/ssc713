<?php 

	$sql="select * from {$this->prename}links where lid=?";
	$linkData=$this->getRow($sql, $args[0]);
	
	if($linkData['uid']){
		$parentData=$this->getRow("select fanDian, fanDianBdw, username from {$this->prename}members where uid=?", $linkData['uid']);
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
  <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     <h4 class="modal-title" id="myModalLabel">注册链接返点信息</h4>
   </div>
   <div class="modal-body" >
    <ul>
	  <li><em>上级会员：</em><span class="red"><?=$parentData['username']?></span></li>
	   <li><em>返点：</em><input type="text" name="fanDian" value="<?=$linkData['fanDian']?>" max="<?=$parentData['fanDian']?>" min="0" fanDianDiff=<?=$this->settings['fanDianDiff']?> >%&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#999">0—<?=$parentData['fanDian']?>%</span></li>
	    <li><em>不定返点：</em><input type="text" name="fanDianBdw" value="<?=$linkData['fanDianBdw']?>" max="<?=$parentData['fanDianBdw']?>" min="0"/>%&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#999">0—<?=$parentData['fanDianBdw']?>%</span></li>
		 <li><em>注册推广链接：</em><input style="width: 350px;" class="t-c t-c-w1" id="adv-url" readonly="readonly" value="http://<?=$_SERVER['HTTP_HOST']?><?=$this->basePath('User-r', $linkData['code']) ?>" />
		 </li><li><div class="btn-a copy1">
             <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-advlink" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="<?=$this->settings['templateurl'] ?>/template/js/base/copy.swf?movieID=copy-advlink&inputID=adv-url" />
                <param name="quality" value="high" />
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="<?=$this->settings['templateurl'] ?>/template/js/base/copy.swf?movieID=copy-advlink&inputID=adv-url" width="62" height="33" name="copy-advlink" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></embed>
             </object>
             </div></li>
	  	</ul>
	</div>
   <div class="modal-footer">
     <button type="button" class="btn btn-action" data-dismiss="modal">关闭</button>
   </div>  