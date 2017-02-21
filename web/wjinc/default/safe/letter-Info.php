<?php 
$letter=$this->getRow("select u.username susername,m.username as ausername,l.* from {$this->prename}letter l left join {$this->prename}members u on u.uid=sid left join {$this->prename}members m on m.uid=aid where l.id=?", $args[0]);
if($letter['aId']==$this->user['uid']){
$this->update("update {$this->prename}Letter set IsRead=1 where id=?",$args[0]);  //如果是接收人是自己更新为已读
}
?>
<style type="text/css">
.modal-body {height:400px; font-size:14px;}
.modal-body ul{ position:absolute;width:800px;}
.modal-body li{ float:left; margin:10px 30px 10px 30px;}
</style>
   <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     <h4 class="modal-title red" id="myModalLabel" ><?=$letter['title'] ?></h4>
   </div>
   <div class="modal-body" >
    <ul>
	  <li><em>发送人：</em><span class="green">
	  <?php if($letter['sId']==$this->user['uid']){
					  echo '<font color="#999999">--</font>';
					}else if($var['sId']==0){
					  echo '<font color="#009900">系统客服</font>';
					}else{
					  echo '<font color="#009900">'.$letter['susername'].'</font>';
					}
	  ?></span></li>
	  <li><em>接收人：</em><span class="green"> 
	  <?php if($letter['aId']==$this->user['uid']){
					  echo '<font color="#999999">--</font>';
					}else if($var['aId']==0){
					  echo '<font color="#009900">系统客服</font>';
					}else{
					  echo '<font color="#009900">'.$letter['ausername'].'</font>';
					}
	  ?></span></li>
	  <li><em>时间：</em><span class="green"><?=substr(date('Y-m-d H:i:s', $letter['actionTime']),2)?></span></li><br /><br /><br />
	  <li style="float:left;"><em>信息内容：</em><span><?=$letter['content']?></span></li><br /><br />
    </ul>
   </div>
   <div class="modal-footer">
     <button type="button" class="btn btn-action" data-dismiss="modal">关闭</button>
	 <!--<button type="button" class="btn btn-primary">提交更改</button>-->
   </div>  
