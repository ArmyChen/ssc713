<!DOCTYPE HTML>
<html>
<head>
<?php $this->display('inc_skin.php', 0 , '站内公告－账户中心'); ?>
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
    <p id="page-title"><span class="fa fa-lock"></span>站内公告</p>
    <div class="top_menu">
	    
        <a href="<?=$this->basePath('Safe-info') ?>" >账户信息</a>
        <a href="<?=$this->basePath('Safe-bank') ?>">我的银行卡</a>
        <a href="<?=$this->basePath('Safe-passwd') ?>">密码管理</a>
		<a class="act" href="<?=$this->basePath('Notice-info') ?>">站内公告</a>
        <a href="<?=$this->basePath('Letter-main') ?>">站内信</a>
    </div>
    <div class="page-info">
	  <div class="page_list">
	   <table width="100%" class='table_b'>
        <thead>
            <thead>
            <tr class="table_b_th">
                <td width="10%">编号</td>
                <td>公告标题</td>
                <td width="20%" align="center">发布时间</td>
            </tr>
            </thead>
            <tbody class="table_b_tr">
           <?php
			$cout=0;
            $styles=array('tr_line_2_a','tr_line_2_b');
            if($args[0]) foreach($args[0]['data'] as $var){
			$cout+=1;
			$mod=$cout%2;
        ?>
            <tr>
            	<td><?=$var['id']?></td>
            	<td class="t2"><a data-target="#notice" data-toggle="modal" href="<?=$this->basePath('Notice-view', $var['id']) ?>"  title="<?=$var['title']?>" ><?=$var['title']?></a></td>
            	<td align="center" class="tl"><?=date('Y-m-d H:i:s', $var['addTime'])?></td>
            </tr>
            <?php }else{ ?>
            <tr>
                <td colspan="3" align="center">没有记录</td>
            </tr>
            <?php } ?>
            </tbody>
            
        </table>
        <?php $this->display('inc_page.php', 0, $args[0]['total'], $this->pageSize, $this->basePath('Notice-info','',true)."&txpgs={page}", 0); ?>
	  </div>
    </div>
</div>
</div>
 <!-- 模态框（Modal） -->
   <div class="modal fade" id="notice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content" style="width:800px;  margin-left:-100px;">
        
         </div><!-- /.modal-content -->
      </div><!-- modal-dialog -->
   </div><!-- /.modal -->
   <!-- 模态框（Modal）结束 -->
</div><?php $this->display('inc_footer.php'); ?>
</body>
</html>
  
   
 