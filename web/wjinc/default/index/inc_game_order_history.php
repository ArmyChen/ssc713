   <!-- 模态框（Modal） -->
   <div class="modal fade" id="betInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content" style="width:800px;  margin-left:-100px;">
        
         </div><!-- /.modal-content -->
      </div><!-- modal-dialog -->
   </div><!-- /.modal -->
   <!-- 模态框（Modal）结束 -->
<?php
	if(!$this->types) $this->getTypes();
	if(!$this->playeds) $this->getPlayeds();
	$modes=array(
		'0.001'=>'厘',
		'0.002'=>'厘',
		'0.010'=>'分',
		'0.020'=>'分',
		'0.100'=>'角',
		'0.200'=>'角',
		'1.000'=>'元',
		'2.000'=>'元'
	);
	$toTime=strtotime('00:00:00');
	$sql="select id,wjorderId,actionNo,actionTime,fpEnable,playedId,type,left(actionData,15) as shows,beiShu,mode,actionNum,lotteryNo,bonus,isDelete,kjTime,zjCount from {$this->prename}bets where  isDelete=0 and uid={$this->user['uid']} and actionTime>{$toTime} order by id desc limit 10";
	//echo $sql;
	if($list=$this->getRows($sql, $actionNo['actionNo'])){
	foreach($list as $var){
?>
	<tr data-code='<?=json_encode($var)?>'>
		<td> <a data-toggle="modal" href="<?=$this->basePath('Record-betInfo', $var['id'])?>" data-target="#betInfo"><?=$var['wjorderId']?></a></td>
		<!--<td><?=date('H:i:s', $var['actionTime'])?></td>-->
		<!--<td><?=$this->types[$var['type']]['shortName']?></td>-->
		<td><?=$this->playeds[$var['playedId']]['name'].$this->iff($var['fpEnable'], ' 飞盘', '')?></td>
		<td><?=$var['actionNo']?></td>
		<td><?=$var['shows']?></td>
		<td><?=$var['beiShu']?>倍</td>
		<!--<td><?=$var['actionNum']?></td>-->
		<td><?=$modes[$var['mode']]?></td>
        <td><?=$var['beiShu']*$var['mode']*$var['actionNum']*(intval($this->iff($var['fpEnable'], '2', '1')))?></td>
		<td><?=$this->iff($var['lotteryNo'], number_format($var['bonus'], 3), '0.000')?></td>
		<td>
			<?php
				if($var['isDelete']==1){
					echo '<font color="#999999">已撤单</font>';
				}elseif(!$var['lotteryNo']){
					echo '<font color="#009900">未开奖</font>';
				}elseif($var['zjCount']){
					echo '<font color="red">已派奖</font>';
				}else{
					echo '未中奖';
				}
			?>
			</td>
		<td>
		<?php if($var['lotteryNo'] || $var['isDelete']==1 || $var['kjTime']<$this->time || $var['qz_uid']){ ?>
            --
        <?php }else{ ?>
             <a target="ajax" call="gameFreshOrdered"  onajax="confirmCancel" dataType="json" href="<?=$this->basePath('Game-deleteCode', $var['id']) ?>">撤单</a>
        <?php } ?>
        </td>
	</tr>
<?php } }else{ ?>
<tr class="no-records">
      <td colspan="11" height="33" align="center">没有找到指定条件的投注记录</td>
</tr>
<?php } ?>