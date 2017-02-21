<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $this->display('inc_skin.php', 0 , '�Żݻ�������'); ?>
</head>
<?php
$data = array();
if($this->settings['huoDongRegister']){
    $data[] = 'huoDongRegister';
}
if($this->settings['rechargeCommissionAmount']){
    $data[] = 'rechargeCommissionAmount';
}
if($this->settings['conCommissionBase']){
    $data[] ='conCommissionBase';
}
//�׳��ֵ�
$rdata = $this->getRows("select * from {$this->prename}events where enable=1 and isdelete=0 and state=0");
if($rdata){
    //��Ƿ����
    foreach($rdata as $k=>$val)
    {
        if($val['end_time'] && $val['end_time'] < $this->time){
            $this->update("update {$this->prename}events set `state`=1,`enabled`=0 where id={$val['id']}");
            unset($rdata[$k]);
        } else{
            $data[] = $rdata[$k];
        }
    }
}
?>
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
    <p id="page-title"><span class="fa fa-bullhorn"></span>�Żݻ</p>
    <div class="top_menu">
        <a class="act" href="<?=$this->basePath('Event-huodong') ?>">�Żݻ</a>
        <a href="<?= $this->basePath('Deposit-main') ?>">��</a>
         <!--<a href="<?= $this->basePath('ChouJiang-main') ?>">�齱</a>
        <a href="<?= $this->basePath('Event-shuiguoji') ?>">ˮ����</a>-->
    </div>
    <div class="page-info">
	  <div class="page_list">
	   <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
        <?php if($data){?>
        <?php foreach($data as $k=>$item){?>
        <tr>
            <td class="huodongtitlebg">
                <div>�&nbsp;<?=$x = $k+1?></div>
            </td>
        </tr>
        <tr>
            <td class="hd1bg">
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td valign="top" class="padding_left10 lineheight28">
                            <?php if(is_string($item) && $item=='huoDongRegister'){?>
                            <span class="fontgreen">�ʱ�䣺����</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="fontbule">����ƣ����ͻ</span><br/>
                            �˵����<br/>
                            �״�ע������п������޹��У���<?= $this->settings['huoDongRegister'] ?>Ԫ ÿ��ǩ��ÿ����<?= $this->settings['huoDongSign'] ?>Ԫ
                            <?php }elseif(is_string($item) && $item=='rechargeCommissionAmount'){?>
                            <span class="fontgreen">�ʱ�䣺����</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="fontbule">����ƣ���ֵӶ��</span><br/>
                            �˵����<br/>
                            ÿ���״γ�ֵ���5000Ԫ����,ϵͳ�Զ����Ͱٷ�֮��Ĳʽ�
                            <?php }elseif(is_string($item) && $item=='conCommissionBase'){?>
                            <span class="fontgreen">�ʱ�䣺����</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="fontbule">����ƣ�����Ӷ��</span><br/>
                            �˵����<br/>
                            ÿ�����Ѵﵽ1��Ԫ,ϵͳ�Զ��Ͱٷ�֮��Ĳʽ�
                            <?php }elseif(is_array($item)){?>
                            <?php
                                $today = date('Y-m-d',$this->time);
                                $start = strtotime($today);
                                $end = $start+3600*12*2;
                                $ret = $this->getRow("select * from {$this->prename}event_sign where `uid`={$this->user['uid']} and `goodId`={$item['id']} and `state` IN (0,1) and `isdelete`=0 and `c_time` between {$start} and {$end} order by c_time desc");
                            ?>
                            <span class="fontgreen">�ʱ�䣺<?=$item['end_time'] ? date('Y-m-d',$item['start_time']).'~'.date('Y-m-d',$item['end_time']) : 'ÿ��'?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="fontbule">����ƣ�<?=$item['title']?></span><br/>
                            �˵����<br/>
                                <?php
                                $condition = explode("|",$item['condition']);
                                $rate = explode("|",$item['rate']);
                                $tplMain = <<<TPL
            ÿ���״γ�ֵ %s Ԫ���ϣ���߿�����ȡ %s ��<br/>
                    %s

TPL;
                                $tplTip = <<<TIP
       %s %s��%s ����ˮ����ȡ�״γ�ֵ��� %s ���Ļ���;<br/>
TIP;
                                $radio = "<input type='radio' name='chose_".$item['id']."' %s value='%s'/>";
                                $html ="";
                                for($i=0;$i<count($condition);$i++)
                                {
                                    $checked = ($ret['rate_value']) ==$i ? "checked" : "";

                                    $input =sprintf($radio, $checked, $i);
                                    $html .= sprintf($tplTip, $input, $i+1, $condition[$i],$rate[$i]);
                                }
                                $html = sprintf($tplMain, $item['coin'], $item['max_rebate'], $html);

                                if(!$ret){?>
                                <?=$html?>
                                <button onclick="hdSign(<?=$item['id']?>,<?=$this->user['uid']?>,'chose_<?=$item["id"]?>')" style="width:95px; height:28px;  border:0; background:url('/images/common/hd_sign.png') no-repeat left top; margin-top:10px">&nbsp;</button>
                                <?php }else{?>
                                    <?=$html?>
                                <button onclick="hdGet(<?=$item['id']?>,<?=$this->user['uid']?>,'chose_<?=$item["id"]?>')" style="width:95px; height:28px;  border:0; background:url('/images/common/hd_get.png') no-repeat left top; margin-top:10px">&nbsp;</button>
                                <?php }?>
                            <?php }?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <?php } ?>
        <?php } ?>
        <?php 
        $adata = $this->getRows("select * from {$this->prename}activity where enable=1 and isdelete=0 order by id");
        if($adata){?>
        <?php foreach($adata as $key=>$var){?>
        <tr>
            <td class="huodongtitlebg">
                <div>�&nbsp;<?=$x = $x+1?></div>
            </td>
        </tr>
        <tr>
            <td class="hd1bg">
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td valign="top" class="padding_left10 lineheight28">
                            <span class="fontgreen">�ʱ�䣺<?=$this->iff($var['stop'], (date('Y-m-d',$var['start']).' -- '.date('Y-m-d',$var['stop'])), "����") ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="fontbule">����ƣ�<?=$var['name'] ?></span><br/>
                            �˵����<br/>
        <?=$var['des'] ?>
 
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <?php } ?>
        <?php } ?>
    </table>
	  </div>
    </div>
</div>
</div>
</div><?php $this->display('inc_footer.php'); ?>
</body>
</html>
  
   
 