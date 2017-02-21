<?php
/* *
 * 功能：一般支付处理文件
 * 版本：2.0
 * 日期：2015-05-22
 * 说明：
 * DAVID 适应万金大部分版本。
 */
 
	require_once("Mobaopay.Config.php");
	require_once("MobaoPay.class.php");


	// 请求数据赋值
	$data = "";
	// 商户APINMAE，WEB渠道一般支付
	$data['apiName'] = $mobaopay_apiname_pay;
	// 商户API版本
	$data['apiVersion'] = $mobaopay_api_version;
	// 商户在Mo宝支付的平台号
	$data['platformID'] = $platform_id;
	// Mo宝支付分配给商户的账号
	$data['merchNo'] = $merchant_acc;
	// 商户通知地址
	$data['merchUrl'] = $merchant_notify_url;
	// 银行代码，不传输此参数则跳转Mo宝收银台
	$data['bankCode'] = $_REQUEST['Bankco'];
	
	//商户订单号
	$data['orderNo'] = $_POST["p2_Order"];
	// 商户订单日期
	$data['tradeDate'] = date('Ymd');
	// 商户交易金额
	$data['amt'] = number_format($_POST["p3_Amt"], 2, '.', '');
	// 商户参数
	$data['merchParam'] = $_POST['username'];   
	// 商户交易摘要
	$data['tradeSummary'] = $_POST['pa_MP'];
	
	// 对含有中文的参数进行UTF-8编码
	// 将中文转换为UTF-8
	if(!preg_match("/[\xe0-\xef][\x80-\xbf]{2}/", $data['merchUrl']))
	{
  	$data['merchUrl'] = iconv("GBK","UTF-8", $data['merchUrl']);
	}
	
	if(!preg_match("/[\xe0-\xef][\x80-\xbf]{2}/", $data['merchParam']))
	{

  	$data['merchParam'] = iconv("GBK","UTF-8", $data['merchParam']);
	}

	if(!preg_match("/[\xe0-\xef][\x80-\xbf]{2}/", $data['tradeSummary']))
	{
  	$data['tradeSummary'] = iconv("GBK","UTF-8", $data['tradeSummary']);
	}
	
	// 初始化
	$cMbPay = new MbPay($mbp_key, $mobaopay_gateway);
	// 准备待签名数据
	$str_to_sign = $cMbPay->prepareSign($data);
	// 数据签名
	$sign = $cMbPay->sign($str_to_sign);
	$data['signMsg'] = $sign;
	// 生成表单数据
	echo $cMbPay->buildForm($data, $mobaopay_gateway);
	
	//$cMbPay->mobaopayOrder($data);
?> 