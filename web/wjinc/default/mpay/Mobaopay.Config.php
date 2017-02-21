﻿<?php
/* *
 * 配置文件
 * 版本：1.0
 * 日期：2015-04-23
 * 说明：
 * DAVID 适应万金大部分版本。
 */
 
	/*--请在这里配置您的基本信息--*/
	
	// 商户APINAME，WEB渠道一般支付
	$mobaopay_apiname_pay = "WEB_PAY_B2C";
	// 商户APINAME，商户订单信息查询
	$mobaopay_apiname_query = "MOBO_TRAN_QUERY";
	// 商户APINAME，Mo宝支付退款申请
	$mobaopay_apiname_refund = "MOBO_TRAN_RETURN";
	// 商户API版本
	$mobaopay_api_version = "1.0.0.0";
	
	/****以下信息以实际为准****/

	// Mo宝支付系统密钥
	$mbp_key = "f0e5ad52d955ce2c7ea3ee5275621f67";
	// Mo宝支付系统网关地址（正式环境）
	$mobaopay_gateway = "https://trade.mobaopay.com/cgi-bin/netpayment/pay_gate.cgi";
	// 商户在Mo宝支付的平台号
	$platform_id = "210001350004432";
	// Mo宝支付分配给商户的账号
	$merchant_acc = "210001350004432";
	// 商户通知地址（请根据自己的部署情况设置下面的路径）
	$merchant_notify_url = "/index.php?tnt=ccall"; //摩宝回调地址 callback.php
	
	// 银行代码列表
	$bankcode['MOBOACC'] = "Mobaopay";// 此选择将跳转摩宝收银台
	// 工行
	$bankcode['ICBC'] = "ICBC";
	// 农行 
	$bankcode['ABC'] = "ABC";
	// 中行
	$bankcode['BOC'] = "BOC";
	// 建行
	$bankcode['CCB'] = "CCB";
	// 交行 
	$bankcode['COMM'] = "COMM";
	// 招行 
	$bankcode['CMB'] = "CMB";
	// 浦发 
	$bankcode['SPDB'] = "SPDB";
	// 兴业 
	$bankcode['CIB'] = "CIB";
	// 民生 
	$bankcode['CMBC'] = "CMBC";
	// 广发 
	$bankcode['CGB'] = "CGB";
	// 中信 
	$bankcode['CNCB'] = "CNCB";
	// 光大 
	$bankcode['CEB'] = "CEB";
	// 华夏 
	$bankcode['HXB'] = "HXB";
	// 邮储 
	$bankcode['PSBC'] = "PSBC";
	// 平安 
	$bankcode['PAB'] = "PAB";
	// 东亚  
	$bankcode['BEA'] = "BEA";
	// 北京  
	$bankcode['BOBJ'] = "BOBJ";
	// 南京  
	$bankcode['BONJ'] = "BONJ";
	// 杭州
	$bankcode['BOHZ'] = "BOHZ";
	// 浙商  
	$bankcode['CZSB'] = "CZSB";
	// 北京农商  
	$bankcode['BJCRB'] = "BJCRB";

?>
