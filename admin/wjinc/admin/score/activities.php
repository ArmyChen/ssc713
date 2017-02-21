<?php
	$sql="select * from {$this->prename}activity where isDelete=0 order by id desc";
	$data=$this->getPage($sql, $this->page, $this->pageSize);
?>
<article class="module width_full">
<input type="hidden" value="<?=$this->user['username']?>" />
    <header>
    	<h3 class="tabs_involved">活动列表
			<div class="submit_link wz"><input type="submit" value="添加活动" onclick="sysModal('score/activityModal/0/add','添加活动',480)" class="alt_btn"></div>
        </h3>
    </header>
    <div class="tab_content">
	<table class="tablesorter" cellspacing="0"> 
		<thead> 
			<tr> 
				<th width="5%">ID</th>
				<th width="16%">活动名称</th>
				<th width="40%">描述</th>
				<th width="10%">开始时间</th>
				<th width="10%">结束时间</th>
				<th width="5%">状态</th>
				<th width="14%">操作</th> 
			</tr>
		</thead>
	<tbody>
	<?php if($data['data']) foreach($data['data'] as $var){ ?>
		<tr> 
			<td><?=$var['id'] ?></td> 
			<td><?=$var['name'] ?></td>
			<td><?=$var['des'] ?></td>
			<td><?=date('Y-m-d',$var['start'])?></td>
			<td><?=$this->iff($var['stop'], date('Y-m-d',$var['stop']), '永久') ?></td>
			<td><?=$this->iff($var['enable'], '开启', '关闭') ?></td> 
			<td>
		        <a href="/admin778899.php/Score/switchActivityStatus/<?=$var['id'] ?>" target="ajax" call="sysReload"><?=$this->iff($var['enable'],'停用','启用') ?></a> | 
				<a href="#" onclick="sysModal('Score/activityModal/<?=$var['id'] ?>/update','修改活动信息',480)">修改</a> | 
				<a href="/admin778899.php/Score/deleteActivity/<?=$var['id'] ?>" target="ajax" call="sysReload" dataType="json">删除</a>
            </td>
		</tr> 
	<?php }else{ ?>
		<tr>
			<td colspan="10" align="center">暂时还没有活动。</td>
		</tr>
	<?php } ?>
	</tbody> 
    </table>
	<footer>
	<?php
		$rel=get_class($this).'/activities-{page}?'.http_build_query($_GET,'','&');
		$this->display('inc/page.php', 0, $data['total'], $rel, 'betLogSearchPageAction'); 
	?>
	</footer>
    </div><!-- end of .tab_container -->
</article><!-- end of content manager article -->
