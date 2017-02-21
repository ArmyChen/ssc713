<!--//复制程序 flash+js------end-->
<div class="page-info">
    <div class="help">
      <p>充值说明：</p>
      <p>1.每次"充值编号"均不相同,务必将"充值编号"正确复制填写到引号汇款页面的"附言"栏目中;</p>
      <p>2.帐号不固定，转帐前请仔细核对该帐号;</p>
      <p>3.充值金额与网友转账金额不符，充值将无法到账;</p>
      <p>4.转账后如10分钟未到账，请联系客服，告知您的充值编号和您的充值金额及你的银行用户姓名。</p>
	 </div>
<!--//复制程序 flash+js------end-->

<?php
$mBankId=$args[0]['mBankId'];
$sql="select mb.*, b.name bankName, b.logo bankLogo, b.home bankHome from {$this->prename}sysadmin_bank mb, {$this->prename}bank_list b where mb.id=$mBankId and b.isDelete=0 and mb.bankId=b.id";
$memberBank=$this->getRow($sql);
if($memberBank['bankId']==12){
?>
<!--左边栏body-->
<style type="text/css">
<!--
.banklogo input{
height:15px; width:15px
}
.banklogo{}
-->
</style>

<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr height=25 class='table_b_tr_b' >
      <td align="right" height="80" class="copyss">充值银行：</td>
      <td align="left" ><img id="bank-type-icon" class="bankimg" src="/<?=$memberBank['bankLogo']?>" title="<?=$memberBank['bankName']?>" /></td> 
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="right" class="copyss">充值金额：</td>
      <td align="left" ><input id="recharg-amount" readonly value="<?=$args[0]['amount']?>" type="text" />
     </td>
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="right" class="copyss"> 充值编号 ：</td>
      <td align="left"><input id="username" readonly value="<?=$args[0]['rechargeId']?>" type="text" />
        </td> 
    </tr>
	<tr height=25 class='table_b_tr_h'>
    <td colspan="2" align="right" class="copyss">
	<form action="<?=$this->basePath('Cash-mpay') ?>" method="post" name="a" target="_blank" > 
    <input name="p2_Order" type="hidden" value="<?=$args[0]['rechargeId']?>" />
    <input name="p3_Amt" type="hidden" value="<?=$args[0]['amount']?>" />
    <input name="pa_MP" type="hidden" value="<?=$this->user['username']?>" />
<table   border="0" cellspacing="1" cellpadding="4" class='table_b' width="100%">
    <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;">充值银行：</td>
      <td align="left">
	  <SCRIPT language=Javascript type=text/javascript>
	    function SelectBank(n) {
           document.getElementById("bank" + n).checked = true;
	    }
	  </SCRIPT>
	  <table  border="0" width="100%" align="left" cellpadding="0" cellspacing="0"   >
        <tr>
          <td><input type="radio" style="width:15px;" name="Bankco" id="bank1" value="ICBC" checked="checked"/></td>
          <td><div align="left"><a href="javascript:SelectBank(1);"><img src="<?=$this->settings['templateurl'] ?>/template/images/bank/zggsyh.gif"  alt="中国工商银行" /></a></div></td>
          <td><input type="radio" style="width:15px;" name="Bankco"  id="bank14" value="PAB"></td>
          <td><div align="left"><a href="javascript:SelectBank(14);"><img src="<?=$this->settings['templateurl'] ?>/template/images/bank/payh.gif"  alt="中国平安银行" /></a></div></td>
          <td><input type="radio" style="width:15px;" name="Bankco"  id="bank2" value="CMB"></td>
          <td><div align="left"><a href="javascript:SelectBank(2);"><img src="<?=$this->settings['templateurl'] ?>/template/images/bank/zsyh.gif"  alt="中国招商银行" /></a></div></td>
          <td><input type="radio" style="width:15px;" name="Bankco"  id="bank3" value="CMBC"></td>
          <td><div align="left"><a href="javascript:SelectBank(3);"><img src="<?=$this->settings['templateurl'] ?>/template/images/bank/zgmsyh.gif"  alt="民生银行" /></a></div></td>	  
        </tr>
        <tr>
          <td><input type="radio" style="width:15px;" name="Bankco" id="bank4" value="ABC"></td>
          <td><div align="left"><a href="javascript:SelectBank(4);"><img src="<?=$this->settings['templateurl'] ?>/template/images/bank/zgnyyh.gif"  alt="中国农业银行" /></a></div></td>
          <td><input type="radio" style="width:15px;" name="Bankco"  id="bank5" value="HXB"></td>
          <td><div align="left"><a href="javascript:SelectBank(5);"><img src="<?=$this->settings['templateurl'] ?>/template/images/bank/hxyh.gif" id="bank1" alt="中国华夏银行" /></a></div></td>
          <td><input type="radio" style="width:15px;" name="Bankco" id="bank6" value="CCB"></td>
          <td width="1"><div align="left"><a href="javascript:SelectBank(6);"><img src="<?=$this->settings['templateurl'] ?>/template/images/bank/zgjsyh.gif"  alt="中国建设银行" /></a></div></td>
          <td><input type="radio" style="width:15px;" name="Bankco"   id="bank7" value="BOC"></td>
          <td><div align="left"><a href="javascript:SelectBank(7);"><img src="<?=$this->settings['templateurl'] ?>/template/images/bank/zgyh.gif"  id="bank1" alt="中国银行" /></a></div></td>
        </tr>
        <tr>
          <td><input type="radio" style="width:15px;" name="Bankco"  id="bank8" value="COMM"></td>
          <td><div align="left"><a href="javascript:SelectBank(8);"><img src="<?=$this->settings['templateurl'] ?>/template/images/bank/jtyh.gif"  alt="中国交通银行" /></a></div></td>
          <td><input type="radio" style="width:15px;" name="Bankco" id="bank9" value="CEB"></td>
          <td><div align="left"><a href="javascript:SelectBank(9);"><img src="<?=$this->settings['templateurl'] ?>/template/images/bank/zggdyh.gif"  alt="中国光大银行" /></a></div></td>
          <td><input type="radio" style="width:15px;" name="Bankco" id="bank10" value="CIB"></td>
          <td><div align="left"><a href="javascript:SelectBank(10);"><img src="<?=$this->settings['templateurl'] ?>/template/images/bank/xyyh.gif"  alt="中国兴业银行" /></a></div></td>
          <td><input type="radio" style="width:15px;" name="Bankco"  id="bank15" value="SPDB"></td>
          <td><div align="left"><a href="javascript:SelectBank(15);"><img src="<?=$this->settings['templateurl'] ?>/template/images/bank/pdfzyh.gif"  alt="中国上海浦东发展银行" /></a></div></td>
        </tr>
        <tr>
          <td><input type="radio" style="width:15px;" name="Bankco" id="bank11" value="GDB"></td>
          <td><div align="left"><a href="javascript:SelectBank(11);"><img src="<?=$this->settings['templateurl'] ?>/template/images/bank/gdfzyh.gif"  alt="广东发展银行" /></a></div></td>
          <td><input type="radio" style="width:15px;" name="Bankco" id="bank12" value="PSBC"></td>
          <td><div align="left"><a href="javascript:SelectBank(12);"><img src="<?=$this->settings['templateurl'] ?>/template/images/bank/yzcxyh.gif"  alt="中国邮政银行" /></a></div></td>
          <td><input type="radio" style="width:15px;" name="Bankco" id="bank13" value="CNCB" /></td>
          <td><div align="left"><a href="javascript:SelectBank(13);"><img src="<?=$this->settings['templateurl'] ?>/template/images/bank/zxyh.gif"  alt="中国中信银行" /></a></div></td>
          <td><input type="radio" style="width:15px;" name="Bankco" id="bank16" value="Mobaopay" /></td>
          <td><div align="left"><a href="javascript:SelectBank(16);"><img src="<?=$this->settings['templateurl'] ?>/template/images/bank/mobaopay.gif"  alt="其他银联支付网银" /></a></div></td>
        </tr>
      </table>
	  </td>
    </tr>
    <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;"></td>
      <td align="left" ><input name="submit2" type='submit' style="width:130px; height:36px; margin-left:40%" class="btn btn-action" value="确认支付" /></td> 
    </tr>
    </table>
</form>
</td>
</tr>
</table>

    <!--左边栏body结束-->
<? }else if($memberBank['bankId']==2){  //支付宝 ?>

<table width="100%" border="0" cellspacing="1" cellpadding="3" class='table_b'>
    <tr class='table_b_th'>
      <td align="left" style="font-weight:bold;padding-left:10px;" colspan=2>充值信息</td> 
    </tr>
    
    <tr height=25 class='table_b_tr_b' >
      <td align="right" class="copys">充值银行：</td>
      <td align="left" ><img id="bank-type-icon" class="bankimg" src="/<?=$memberBank['bankLogo']?>" title="<?=$memberBank['bankName']?>" />
      </td> 
    </tr>
	<tr height=25 class='table_b_tr_b'>
      <td align="right" class="copys">收款户名：</td>
      <td align="left" ><input id="bank-username" readonly value="<?=$memberBank["username"]?>" style="width:200px" type="text"/>
	  <div class="btn-a copy" for="bank-username">
	  <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-bankuser" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-bankuser&inputID=bank-username" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-bankuser&inputID=bank-username" width="62" height="23" name="copy-bankuser" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
        </object> 
	  </div></td> 
    </tr>
    <tr height=25 class='table_b_tr_b' >
      <td align="right" class="copys" >收款账号：</td>
      <td align="left" ><input id="bank-account" readonly value="<?=$memberBank["account"]?>"  style="width:200px" type="text"/>
	  <div class="btn-a copy" for="bank-account">
	  <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-account" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-account&inputID=bank-account" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-account&inputID=bank-account" width="62" height="23" name="copy-account" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
        </object>
		</div>
	  </td> 
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="right" class="copys">充值金额：</td>
      <td align="left" ><input id="recharg-amount" readonly value="<?=$args[0]['amount']?>" type="text" />
      <div class="btn-a copy" for="recharg-amount"><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-recharg" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-recharg&inputID=recharg-amount" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-recharg&inputID=recharg-amount" width="62" height="23" name="copy-recharg" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </object>
	 </div>&nbsp;&nbsp;&nbsp;<div class="spn12" style="display:inline;">*网银充值金额必须与网站填写金额一致方能到账！</div>
      </td>
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="right" class="copys">充值编号：</td>
      <td align="left"><input id="username" readonly value="<?=$args[0]['rechargeId']?>" type="text" />
         <div class="btn-a copy" for="username">
            <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-username" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-username&inputID=username" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-username&inputID=username" width="62" height="23" name="copy-username" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </object> 
        </div>&nbsp;&nbsp;&nbsp;<div class="spn12"  style="display:inline;">*网银充值请务必将此编号填写到汇款“附言”里，每个充值编号仅用于一笔充值！</div>
	   </td> 
    </tr>
	<tr>
	<td height="40" colspan="4" align="center">
	<form name="alipaypay" method="post" accept-charset="gbk" target="_blank" onsubmit="document.charset='gbk'" action="https://shenghuo.alipay.com/send/payment/fill.htm">
	<input type="hidden" name="optEmail" value="<?=$memberBank['account']?>">
    <input type="hidden" name="payAmount" value="<?=$args[0]['amount']?>">
    <input type="hidden" name="title" value="<?=$this->user['username']?>">
    <input type="hidden" name="memo" value="<?=$args[0]['rechargeId']?>">
    <input type="hidden" name="isSend" value="">
    <input type="hidden" name="smsNo" value=""> 
	<input name="submit" type="submit" style="width:250px;" value="前往支付宝充值(免填信息直充)" class="btn chazhao btn-action"/>
	 </form></td>
	 </tr>
   <div class="help">
      <p>支付宝充值：</p>
        <dd>1.平台已与支付宝合作，开通直接转账功能，会员将无需再次输入帐号、备注信息;</dd>
        <dd>2.跳往支付宝充值页面时，请会员再次核实金额、账户名是否符合;</dd>
        <dd>3.转账后如5分钟未到账，请联系客服，告知您的充值编号和您的充值金额及你的支付宝姓名。</dd>
	 </div>
</table>
<? }else{  //其它收款方式 ?>
<!--左边栏body-->
<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr class='table_b_th'>
      <td align="left" style="font-weight:bold;padding-left:10px;" colspan=2>充值信息</td> 
    </tr>
    
    <tr height=25 class='table_b_tr_b' >
      <td align="right" class="copys">充值银行：</td>
      <td align="left" ><img id="bank-type-icon" class="bankimg" src="/<?=$memberBank['bankLogo']?>" title="<?=$memberBank['bankName']?>" />
            <a id="bank-link" target="_blank" href="<?=$memberBank['bankHome']?>" class="spn11" style="margin-left:50px;">进入银行网站>></a>
      </td> 
    </tr>
	<tr height=25 class='table_b_tr_b'>
      <td align="right" class="copys">收款户名：</td>
      <td align="left" ><input id="bank-username" readonly value="<?=$memberBank["username"]?>" style="width:200px" type="text"/>
	  <div class="btn-a copy" for="bank-username">
	  <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-bankuser" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-bankuser&inputID=bank-username" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-bankuser&inputID=bank-username" width="62" height="23" name="copy-bankuser" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
        </object> 
	  </div></td> 
    </tr>
    <tr height=25 class='table_b_tr_b' >
      <td align="right" class="copys" >收款账号：</td>
      <td align="left" ><input id="bank-account" readonly value="<?=$memberBank["account"]?>"  style="width:200px" type="text"/>
	  <div class="btn-a copy" for="bank-account">
	  <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-account" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-account&inputID=bank-account" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-account&inputID=bank-account" width="62" height="23" name="copy-account" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
        </object>
		</div>
	  </td> 
     <tr height=25 class='table_b_tr_b'>
      <td align="right" class="copys">充值金额：</td>
      <td align="left" ><input id="recharg-amount" readonly value="<?=$args[0]['amount']?>" type="text" />
      <div class="btn-a copy" for="recharg-amount"><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-recharg" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-recharg&inputID=recharg-amount" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-recharg&inputID=recharg-amount" width="62" height="23" name="copy-recharg" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </object>
	 </div>&nbsp;&nbsp;&nbsp;<div class="spn12" style="display:inline;">*网银充值金额必须与网站填写金额一致方能到账！</div>
      </td>
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="right" class="copys">充值编号：</td>
      <td align="left"><input id="username" readonly value="<?=$args[0]['rechargeId']?>" type="text" />
         <div class="btn-a copy" for="username">
            <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-username" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-username&inputID=username" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-username&inputID=username" width="62" height="23" name="copy-username" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </object> 
        </div>&nbsp;&nbsp;&nbsp;<div class="spn12"  style="display:inline;">*网银充值请务必将此编号填写到汇款“附言”里，每个充值编号仅用于一笔充值！</div>
	   </td> 
    </tr>
<!--左边栏body结束-->
<?php if($memberBank["rechargeDemo"]){?>
   <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;"></td>
      <td align="left" > <div class="example">充值图示：<div class="example2" rel="<?=$memberBank["rechargeDemo"]?>">查看</div></div></td> 
  </tr>
<? }?>
</table> 
<?php }?>