
<?php $info=$args[0]; ?>
<style type="text/css">
.modal-body {height:270px; font-size:14px;}
.modal-body ul{ position:absolute;width:800px;}
.modal-body li{ float:left; margin:10px 30px 10px 30px;}
</style>
   <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     <h4 class="modal-title" id="myModalLabel"><?=$info['title']?></h4>
   </div>
   <div class="modal-body" >
    <ul>
	  <li>
	    <em>公告内容：</em><br /><br />
	    <span class="red" style="word-break:break-all"><?=nl2br($info['content'])?></span><br />
	  </li>
	   <li style="float:right; margin-right:100px;">
	    <em>发布日期：</em><span class="green"><?=date("Y-m-d",nl2br($info['addTime']))?></span>
	  </li>
	  </ul>
   </div>
   <div class="modal-footer">
     <button type="button" class="btn btn-action" data-dismiss="modal">关闭</button>
	 <!--<button type="button" class="btn btn-primary">提交更改</button>-->
   </div>  
