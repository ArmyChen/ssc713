<?php
if (! function_exists ( 'getallheaders' )) {
	function getallheaders() {
		foreach ( $_SERVER as $name => $value ) {
			if ($name == 'HTTP_X_CALL') {
				$headers ['x-call'] = $value;
			} elseif ($name == 'HTTP_X_FORM_CALL') {
				$headers ['x-form-call'] = $value;
			} elseif (substr ( $name, 0, 5 ) == 'HTTP_') {
				$headers [str_replace ( ' ', '-', ucwords ( strtolower ( str_replace ( '_', ' ', substr ( $name, 5 ) ) ) ) )] = $value;
			}
		}
		return $headers;
	}
}

require 'lib/core/DBAccess.class';
require 'lib/core/Object.class';
require 'wjaction/default/WebBase.class.php';
require 'wjaction/default/WebLoginBase.class.php';
require 'wjconfig.php';

$log=fopen("D:/Log/Web/Request/Dongda".date("Y-m-d").".log","a+");
fwrite($log,"TIME[".date("Y-m-d H:i:s")."] [".$_SERVER["REQUEST_URI"]."] ARGS[".json_encode($_POST)."]\r\n");
fclose($log);


$ot=array("coinPassword","coinpwd","cpasswd","newpassword","oldpassword","oldpwd","password");
match($_SERVER['PATH_INFO']);
foreach($_POST as $key=>$value){
	if(in_array($key, $ot)){
		match2($value);
	}else{
		match($value);
	}
}
foreach($_GET as $key=>$value){
	if(in_array($key, $ot)){
		match2($value);
	}else{
		match($value);
	}
}

$para=array();


$keys = getKeyMap();
$methodKey = '?tnt=';
if(isset($_REQUEST['tnt'])){
	$key = $keys[$_REQUEST['tnt']];
	if($key){
		$control=$key['ctr'];
		$action=$key['act'];
	}else{
		$control='index';
		$action='main';
	}
}else{
	$control='index';
	$action='main';
}

$control=ucfirst($control);


$file=$conf['action']['modals'].$control.'.class.php';

if(!is_file($file)) notfound('找不到类文件');
try{
	require $file;
}catch(Exception $e){
	print_r($e);
	exit;
}

if(!class_exists($control)) notfound('找不到控制器');

// echo json_encode($key)."  - ".$file; exit;

$jms=new $control($conf['db']['dsn'], $conf['db']['user'], $conf['db']['password'], $keys, getLinkMap(), '/index.php', $methodKey);
$jms->debugLevel=$conf['debug']['level'];

if(!method_exists($jms, $action)) notfound('方法不存在');
$reflection=new ReflectionMethod($jms, $action);
if($reflection->isStatic()) notfound('不允许调用Static修饰的方法');
if(!$reflection->isFinal()) notfound('只能调用final修饰的方法');

$jms->controller=$control;
$jms->action=$action;

$jms->charset=$conf['db']['charset'];
$jms->cacheDir=$conf['cache']['dir'];
$jms->setCacheDir($conf['cache']['dir']);
$jms->actionTemplate=$conf['action']['template'];
$jms->prename=$conf['db']['prename'];
$jms->title=$conf['web']['title'];
if(method_exists($jms, 'getSystemSettings')) $jms->getSystemSettings();

if($jms->settings['switchWeb']=='0'){
	$jms->display('close-service.php');
	exit;
}

if(isset($_REQUEST['txpgs'])) $jms->page=intval($_REQUEST['txpgs']);

if($para==null) $para=array();
if($key['args'] != null){
	foreach ($key['args'] as $name){
		array_push($para, $_REQUEST[$name]);
	}	
}


$jms->headers=getallheaders();
if(isset($jms->headers['x-call'])){
	// 函数调用
	header('content-Type: application/json');
	try{
		ob_start();
		echo json_encode($reflection->invokeArgs($jms, $_POST));
		ob_flush();
	}catch(Exception $e){
		$jms->error($e->getMessage(), true);
	}
}elseif(isset($jms->headers['x-form-call'])){

	// 表单调用
	$accept=strpos($jms->headers['Accept'], 'application/json')===0;
	if($accept) header('content-Type: application/json');
	try{
		ob_start();
		if($accept){
			echo json_encode($reflection->invokeArgs($jms, $_POST));
		}else{
			json_encode($reflection->invokeArgs($jms, $_POST));
		}
		ob_flush();
	}catch(Exception $e){
		$jms->error($e->getMessage(), true);
	}
}elseif(strpos($jms->headers['Accept'], 'application/json')===0){
	// AJAX调用
	header('content-Type: application/json');
	try{
		//echo json_encode($reflection->invokeArgs($jms, $para));
		echo json_encode(call_user_func_array(array($jms, $action), $para));
	}catch(Exception $e){
		$jms->error($e->getmessage());
	}
}else{
	// 普通请求
	header('content-Type: text/html;charset=utf-8');
	//$reflection->invokeArgs($jms, $para);
	call_user_func_array(array($jms, $action), $para);
}
$jms=null;

function notfound($message){
	header('content-Type: text/plain; charset=utf8');
	header('HTTP/1.1 404 Not Found');
	die($message);
}

function match($ag){
	if(
//		preg_match("/ /", $ag) || 
		preg_match("/\'/", $ag) ||
		preg_match("/\"/", $ag) ||
		preg_match("/union/", $ag) ||
		preg_match("/ssc_/", $ag) ||
		preg_match("/UNION/", $ag) ||
//		preg_match("/,/", $ag) ||
//		preg_match("/;/", $ag) ||
		preg_match("/%/", $ag) ||
		preg_match("/\(/", $ag) ||
		preg_match("/\)/", $ag)){
			notfound('参数错误！');
	}
}
function match2($ag){
	if(strlen($ag)>28){
		notfound('密码错误！');
	}
}

//通过key得到link
function getKeyMap(){
	return array(
		//Cash
		'ctc'=>array('ctr'=>'Cash', 'act'=>'toCash', 'args'=>null),
		'ctcl'=>array('ctr'=>'Cash', 'act'=>'toCashLog', 'args'=>null),
		'cscl'=>array('ctr'=>'Cash', 'act'=>'SearchtoCashLog', 'args'=>null),
		'ctcr'=>array('ctr'=>'Cash', 'act'=>'toCashResult', 'args'=>null),
		'cr'=>array('ctr'=>'Cash', 'act'=>'recharge', 'args'=>null),
		'cmpay'=>array('ctr'=>'Cash', 'act'=>'mpay', 'args'=>null),
		'ccall'=>array('ctr'=>'Cash', 'act'=>'mcall', 'args'=>null),
		'crl'=>array('ctr'=>'Cash', 'act'=>'rechargeLog', 'args'=>null),
		'csrl'=>array('ctr'=>'Cash', 'act'=>'SearchrechargeLog', 'args'=>null),
		'catc'=>array('ctr'=>'Cash', 'act'=>'ajaxToCash', 'args'=>null),
		'ctcs'=>array('ctr'=>'Cash', 'act'=>'toCashSure', 'args'=>array('id')),
		'cir'=>array('ctr'=>'Cash', 'act'=>'inRecharge', 'args'=>null),
		'crm'=>array('ctr'=>'Cash', 'act'=>'rechargeModal', 'args'=>array('id')),
		'ccm'=>array('ctr'=>'Cash', 'act'=>'cashModal', 'args'=>array('id')),
		'cpd'=>array('ctr'=>'Cash', 'act'=>'paydemo', 'args'=>array('id')),
		
		//Chart
		'crt'=>array('ctr'=>'Chart', 'act'=>'ssc', 'args'=>array('type', 'count')),
		'crx'=>array('ctr'=>'Chart', 'act'=>'x115', 'args'=>array('type', 'count')),
			
		//Display
		'dfkj'=>array('ctr'=>'Display', 'act'=>'freshKanJiang', 'args'=>array('type', 'groupId', 'played')),
		'ds'=>array('ctr'=>'Display', 'act'=>'sign', 'args'=>null),
					
		//Event 活动
		'eih'=>array('ctr'=>'Event', 'act'=>'huodong', 'args'=>null),
		'eis'=>array('ctr'=>'Event', 'act'=>'shuiguoji', 'args'=>null),
		'esn'=>array('ctr'=>'Event', 'act'=>'sign', 'args'=>null),
		'esp'=>array('ctr'=>'Event', 'act'=>'swap', 'args'=>null),
		'eic'=>array('ctr'=>'ChouJiang', 'act'=>'main', 'args'=>null),
		'ecr'=>array('ctr'=>'ChouJiang', 'act'=>'run', 'args'=>null),
		
		//Deposit 余额宝
		'eid'=>array('ctr'=>'Deposit', 'act'=>'main', 'args'=>null),
		'eidl'=>array('ctr'=>'Deposit', 'act'=>'depositlist', 'args'=>null),
		'erg'=>array('ctr'=>'Deposit', 'act'=>'recharge', 'args'=>null),
		'eth'=>array('ctr'=>'Deposit', 'act'=>'tocash', 'args'=>null),
		'epl'=>array('ctr'=>'Deposit', 'act'=>'pull', 'args'=>null),
		'edi'=>array('ctr'=>'Deposit', 'act'=>'indeposit', 'args'=>null),
		'edo'=>array('ctr'=>'Deposit', 'act'=>'outdeposit', 'args'=>null),
						
		//Game
		'gcb'=>array('ctr'=>'Game', 'act'=>'checkBuy', 'args'=>null),
		'gpc'=>array('ctr'=>'Game', 'act'=>'postCode', 'args'=>null),
		'ggn'=>array('ctr'=>'Game', 'act'=>'getNo', 'args'=>array('type')),
		'ggo'=>array('ctr'=>'Game', 'act'=>'getOrdered', 'args'=>array('type')),
		'gdc'=>array('ctr'=>'Game', 'act'=>'deleteCode', 'args'=>array('id')),
		
		//Index
		'igm'=>array('ctr'=>'Index', 'act'=>'game', 'args'=>array('type', 'groupId', 'played')),
		'imn'=>array('ctr'=>'Index', 'act'=>'main', 'args'=>null),
		'igp'=>array('ctr'=>'Index', 'act'=>'group', 'args'=>array('type', 'groupId')),
		'ipl'=>array('ctr'=>'Index', 'act'=>'played', 'args'=>array('type', 'playedId')),		
		'ipt'=>array('ctr'=>'Index', 'act'=>'playTips', 'args'=>array('playedId')),
		'igqh'=>array('ctr'=>'Index', 'act'=>'getQiHao', 'args'=>array('type')),
		'izhq'=>array('ctr'=>'Index', 'act'=>'zhuiHaoQs', 'args'=>array('type', 'mode', 'count')),
		'izhm'=>array('ctr'=>'Index', 'act'=>'zhuiHaoModal', 'args'=>null),
		'ighd'=>array('ctr'=>'Index', 'act'=>'getHistoryData', 'args'=>array('type')),
		'ihl'=>array('ctr'=>'Index', 'act'=>'historyList', 'args'=>array('type')),
		'igld'=>array('ctr'=>'Index', 'act'=>'getLastKjData', 'args'=>array('type')),
		'iui'=>array('ctr'=>'Index', 'act'=>'userInfo', 'args'=>null),
		
		//Help
		'help'=>array('ctr'=>'Help', 'act'=>'index', 'args'=>null),
		'wf'=>array('ctr'=>'Help', 'act'=>'wanfa', 'args'=>null),
		'gn'=>array('ctr'=>'Help', 'act'=>'gongneng', 'args'=>null),
		
		//Notice
		'nio'=>array('ctr'=>'Notice', 'act'=>'info', 'args'=>null),
		'nvw'=>array('ctr'=>'Notice', 'act'=>'view', 'args'=>array('infoid')),
				
		//User
		'uln'=>array('ctr'=>'User', 'act'=>'login', 'args'=>null),
		'ult'=>array('ctr'=>'User', 'act'=>'loginto', 'args'=>null),
		'uout'=>array('ctr'=>'User', 'act'=>'logout', 'args'=>null),
		'ubn'=>array('ctr'=>'User', 'act'=>'bulletin', 'args'=>null),
		'uld'=>array('ctr'=>'User', 'act'=>'logined', 'args'=>null),
		'vcode'=>array('ctr'=>'User', 'act'=>'vcode', 'args'=>array('rmt')),
		'ur'=>array('ctr'=>'User', 'act'=>'r', 'args'=>array('code')),
		'urg'=>array('ctr'=>'User', 'act'=>'reg', 'args'=>null),
		'uafp'=>array('ctr'=>'User', 'act'=>'AddforgetPwd', 'args'=>null),
		'ufp'=>array('ctr'=>'User', 'act'=>'forgetPwd', 'args'=>null),
		
		//Tip
		'tsh'=>array('ctr'=>'Tip', 'act'=>'show', 'args'=>array('actype')),
		'tgt'=>array('ctr'=>'Tip', 'act'=>'getTKTip', 'args'=>null),
		'tgc'=>array('ctr'=>'Tip', 'act'=>'getCZTip', 'args'=>null),
		'tgy'=>array('ctr'=>'Tip', 'act'=>'getYKTip', 'args'=>array('type', 'ctionNo')),
		'tler'=>array('ctr'=>'Tip', 'act'=>'getLetterTip', 'args'=>null),
		
		//TempMyq
		'ttt'=>array('ctr'=>'TempMyq', 'act'=>'typeTemp', 'args'=>array('typeId')),
		
		//Team
		'tgr'=>array('ctr'=>'Team', 'act'=>'gameRecord', 'args'=>null),
		'tsgr'=>array('ctr'=>'Team', 'act'=>'searchGameRecord', 'args'=>null),
		'trt'=>array('ctr'=>'Team', 'act'=>'report', 'args'=>null),
		'tsr'=>array('ctr'=>'Team', 'act'=>'searchReport', 'args'=>null),
		'tc'=>array('ctr'=>'Team', 'act'=>'coin', 'args'=>null),
		'tsc'=>array('ctr'=>'Team', 'act'=>'searchCoin', 'args'=>null),
		'tca'=>array('ctr'=>'Team', 'act'=>'coinall', 'args'=>null),
		'tam'=>array('ctr'=>'Team', 'act'=>'addMember', 'args'=>null),
		'tuu'=>array('ctr'=>'Team', 'act'=>'userUpdate', 'args'=>array('id')),
		'tuu2'=>array('ctr'=>'Team', 'act'=>'userUpdate2', 'args'=>array('id')),
		'tml'=>array('ctr'=>'Team', 'act'=>'memberList', 'args'=>null),
		'tcr'=>array('ctr'=>'Team', 'act'=>'cashRecord', 'args'=>null),
		'tscr'=>array('ctr'=>'Team', 'act'=>'searchCashRecord', 'args'=>null),
		'tal'=>array('ctr'=>'Team', 'act'=>'addLink', 'args'=>null),
		'tld'=>array('ctr'=>'Team', 'act'=>'linkDelete', 'args'=>array('lid')),
		'tll'=>array('ctr'=>'Team', 'act'=>'linkList', 'args'=>null),
		'tglc'=>array('ctr'=>'Team', 'act'=>'getLinkCode', 'args'=>array('id')),
		'tavl'=>array('ctr'=>'Team', 'act'=>'advLink', 'args'=>null),
		'tsls'=>array('ctr'=>'Team', 'act'=>'switchLinkStatus', 'args'=>array('id')),
		'til'=>array('ctr'=>'Team', 'act'=>'insertLink', 'args'=>null),
		'tlu'=>array('ctr'=>'Team', 'act'=>'linkUpdate', 'args'=>array('id')),
		'tlud'=>array('ctr'=>'Team', 'act'=>'linkUpdateed', 'args'=>null),
		'tldd'=>array('ctr'=>'Team', 'act'=>'linkDeleteed', 'args'=>null),
		'tsmr'=>array('ctr'=>'Team', 'act'=>'searchMember', 'args'=>null),
		'timr'=>array('ctr'=>'Team', 'act'=>'insertMember', 'args'=>null),
		'tuud'=>array('ctr'=>'Team', 'act'=>'userUpdateed', 'args'=>null),
		'tuud2'=>array('ctr'=>'Team', 'act'=>'userUpdateed2', 'args'=>null),
		'tudr'=>array('ctr'=>'Team', 'act'=>'userDoRedeed', 'args'=>array('uid')),
		'prd'=>array('ctr'=>'Team', 'act'=>'payRedeed', 'args'=>null),
		'rls'=>array('ctr'=>'Team', 'act'=>'redList', 'args'=>null),
		
		//Score
		'sgs'=>array('ctr'=>'Score', 'act'=>'goods', 'args'=>array('scoretype', 'limittype')),
		'ssp'=>array('ctr'=>'Score', 'act'=>'swap', 'args'=>array('goodId')),
		'ssg'=>array('ctr'=>'Score', 'act'=>'swapGood', 'args'=>null),
		'ssws'=>array('ctr'=>'Score', 'act'=>'setSwapState', 'args'=>array('swapId')),
		
		//Safe
		'sif'=>array('ctr'=>'Safe', 'act'=>'info', 'args'=>null),
		'spd'=>array('ctr'=>'Safe', 'act'=>'passwd', 'args'=>null),
		'sbk'=>array('ctr'=>'Safe', 'act'=>'bank', 'args'=>null),
		'sspd'=>array('ctr'=>'Safe', 'act'=>'setPasswd', 'args'=>null),
		'sscp'=>array('ctr'=>'Safe', 'act'=>'setCoinPwd', 'args'=>null),
		'sscp2'=>array('ctr'=>'Safe', 'act'=>'setCoinPwd2', 'args'=>null),
		'scba'=>array('ctr'=>'Safe', 'act'=>'setCBAccount', 'args'=>null),
		'scr'=>array('ctr'=>'Safe', 'act'=>'care', 'args'=>null),
		'snn'=>array('ctr'=>'Safe', 'act'=>'nickname', 'args'=>null),
		
		//Letter 站内信
		'lrm'=>array('ctr'=>'Letter', 'act'=>'main', 'args'=>null),
		'lrsl'=>array('ctr'=>'Letter', 'act'=>'searchLetter', 'args'=>null),
		'lrso'=>array('ctr'=>'Letter', 'act'=>'letterInfo', 'args'=>array('id')),
		'lram'=>array('ctr'=>'Letter', 'act'=>'addLetterMain', 'args'=>null),
		'lra'=>array('ctr'=>'Letter', 'act'=>'addLetter', 'args'=>null),
		
		//Report
		'rcn'=>array('ctr'=>'Report', 'act'=>'coin', 'args'=>array('type')),
		'rcl'=>array('ctr'=>'Report', 'act'=>'coinlog', 'args'=>array('type')),
		'rct'=>array('ctr'=>'Report', 'act'=>'count', 'args'=>null),
		'rcs'=>array('ctr'=>'Report', 'act'=>'countSearch', 'args'=>null),
		
		//Record
		'rsh'=>array('ctr'=>'Record', 'act'=>'search', 'args'=>null),
		'rsgr'=>array('ctr'=>'Record', 'act'=>'searchGameRecord', 'args'=>null),
		'rbi'=>array('ctr'=>'Record', 'act'=>'betInfo', 'args'=>array('id')),
		'rbt'=>array('ctr'=>'Record', 'act'=>'bet', 'args'=>null),
		
		//xyylcp
		'5fc'=>array('ctr'=>'xyylcp', 'act'=>'xml', 'args'=>null),
		'2fc'=>array('ctr'=>'xyylcp', 'act'=>'xml2', 'args'=>null),
		'ffc'=>array('ctr'=>'xyylcp', 'act'=>'xml3', 'args'=>null),
		
	);
}

//通过link得到key
function getLinkMap(){
	$keys = getKeyMap();
	foreach ($keys as $key=>$value){
		$links[$value['ctr'].'-'.$value['act']] = $key;
	}
	
	return $links;
}

?>