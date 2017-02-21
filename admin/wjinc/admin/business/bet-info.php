<?php
	$this->getPlayeds();
	$bet=$this->getRow("select * from {$this->prename}bets where id=?", $args[0]);
	
	if(!$bet) throw new Exception('单号不存在');
	$sql="select id,name  from {$this->prename}played where type = ".$bet['type'] ;
	if($data=$this->getRows($sql)) {
	
		$select = "<select name=\"playedId\">";
		foreach($data as $key=>$var){
			$on = $var['id'] == $bet['playedId']?"selected=\"selected\"":"";
			$select .= "<option value=\"".$var['id']."\" ".$on.">".$var['name']."</option>";
		}
		$select.="</select>";
	}
	$modeName=array(
			'0.001'=>'厘',
			'0.002'=>'厘',
			'0.010'=>'分',
			'0.020'=>'分',
			'0.100'=>'角',
			'0.200'=>'角',
			'1.000'=>'元',
			'2.000'=>'元',
			'2.00'=>'元', 
			'0.20'=>'角',
			'0.02'=>'分'
		);
	$weiShu=$bet['weiShu'];
	$betCont=$bet['mode'] * $bet['beiShu'] * $bet['actionNum'] * ($bet['fpEnable']+1);
?>
<div class="bet-info popupModal">
	<form action="/admin778899.php/data/editsave" target="ajax" method="post" call="dataSubmitCode" dataType="html">
		<input type="hidden" name="id" value="<?=$bet['id'] ?>"/>
		<table cellpadding="0" cellspacing="0" width="480">
			<?php if($weiShu){ ?>
			<tr>
				<td align="right">位数：</td>
				<td colspan="3">
					<?php 
						$w=array(16=>'万',8=>'千',4=>'百',2=>'十',1=>'个');
						foreach($w as $p=>$v){
							$s = '';
							if($weiShu - $p >= 0){
								$weiShu -= $p;
								$s = ' checked="checked"';
							}
							echo '<label><input type="checkbox"'.$s.' name="cb[]" value="'.$p.'" />'.$v.'</label>';
						}
					?>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td align="right">号码：</td>
				<td colspan="3"><textarea name="data" cols="45" rows="5"><?=$bet['actionData']?></textarea></td>
			</tr>
			<tr>
				<td width="80" align="right">单号：</td>
				<td width="160"><?=$bet['wjorderId']?></td>
				<td width="80" align="right">投注数量：</td>
				<td width="160"><?=$bet['actionNum']?></td>
			</tr>
			<tr>
				<td align="right">发起人：</td>
				<td><?=$bet['username']?></td>
				<td align="right">模式：</td>
				<td><?=$modeName[$bet['mode']]?></td>
			</tr>
			<tr>
				<td align="right">倍数：</td>
				<td><?=$bet['beiShu']?></td>
				<td align="right">中奖注数：</td>
				<td><?=$this->iff($bet['lotteryNo'], $bet['zjCount'], '－')?></td>
			</tr>
			<tr>
				<td align="right">彩种：</td>
				<td><?=$this->types[$bet['type']]['title']?></td>
				<td align="right">奖金－返点：</td>
				<td><?=number_format($bet['bonusProp'], 2)?>－<?=number_format($bet['fanDian'],1)?>%</td>
			</tr>
			<tr>
				<td align="right">期号：</td>
				<td><?=$bet['actionNo']?></td>
				<td align="right">玩法：</td>
				<td><?=$select ?></td>
			</tr>
			<tr>
				<td align="right">开奖号：</td>
				<td><?=$this->ifs($bet['lotteryNo'], '－')?></td>
				<td align="right">投注时间：</td>
				<td><?=date('m-d H:i:s',$bet['actionTime'])?></td>
			</tr>
			<tr>
				<td align="right">订单状态：</td>
				<td>
				<?php
					if($bet['isDelete']==1){
						echo '<font color="#999999">已撤单</font>';
					}elseif(!$bet['lotteryNo']){
						echo '<font color="#009900">未开奖</font>';
					}elseif($bet['zjCount']){
						echo '<font color="red">已派奖</font>';
					}else{
						echo '未中奖';
					}
				?>
				</td>
				<td align="right">来源：</td>
	            <td colspan="3"><?php if($bet['betType']==0){echo 'web';}else if($bet['betType']==1){echo '手机';}else{echo '--';}?></td><?php if($bet['betType']==0){echo 'web端';}else if($bet['betType']==1){echo '手机端';}else if($bet['betType']==2){echo '客户端';}?>
			</tr>
			<!-- 投注开始 -->
			<tr>
				<td align="right">投注：</td>
				<td><?=number_format($betCont, 2)?>元</td>
				<td align="right">中奖：</td>
				<td><?=$this->iff($bet['lotteryNo'], number_format($bet['bonus'], 2) .'元', '－')?></td>
			</tr>
			<tr>
				<td align="right">返点：</td>
				<td><?=$this->iff($bet['lotteryNo'], number_format($bet['fanDianAmount'], 2). '元', '－')?></td>
				<td align="right">个人盈亏：</td>
				<td><?=$this->iff($bet['lotteryNo'], number_format($bet['bonus'] - $betCont + $bet['fanDianAmount'], 2) . '元', '－')?></td>
			</tr>
			<!-- 投注结束 -->
		</table>
	</form>
</div>