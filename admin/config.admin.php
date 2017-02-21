<?php
require_once('sqlin.php');
$conf['debug']['level']=5;

/*		DAVID UPDATE 2015-05-05		*/
$conf['db']['dsn']='mysql:host=localhost;dbname=david';
$conf['db']['host']='localhost' ;
$conf['db']['port']=3306 ;
$conf['db']['dbname']='david';  //数据库名称
$conf['db']['user']='root';  //数据库用户名  默认root
$conf['db']['password']='root';  //数据库密码   默认root
$conf['db']['charset']='utf8';
$conf['db']['prename']='ssc_';

$conf['cache']['expire']=0;
$conf['cache']['dir']='_cache#57^%2RE/';

$conf['url_modal']=2;

$conf['safeCode']='e10adc3949ba59abbe56e057f20f883e';  //MD5密文 http://tool.chinaz.com/Tools/MD5.aspx 到这个网站生成32位小写md5

$conf['action']['template']='wjinc/admin/';
$conf['action']['modals']='wjaction/admin/';

$conf['member']['sessionTime']=15*60;	 
$conf['node']['access']='http://localhost:8800';	

error_reporting(E_ERROR & ~E_NOTICE);
ini_set('date.timezone', 'asia/shanghai');

ini_set('display_errors', 'Off');
