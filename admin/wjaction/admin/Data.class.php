<?php

/**
 * 与开奖数据有关
 */
class Data extends AdminBase{
	public $pageSize=15;
	private $encrypt_key='I/On?u8v(^PQGlCMKGLt#2R&ylR06nc315/r`k-(b94@bV<sOo#u:1@BW27,N^TQOlkRvhuu,U5mUhpfWnfZu$>-=rx)rNlSH-Oc,*oUGI*a/X`YFmgM-Bre(wfFf5Gx*qE_L@~pCtr0BOfCO#n=0w:+@l,k$y5r75Q/)~.z%&kTZDjR0OM7*xlnyyfO1JL&VtRzYrF(a~2(yz1Fz:ZB#uAR;pt`4Wg;*$+G<EWhZ~o5G$8,u=PHsGr@NI*N%sdF';	// 256位随便密码
	private $dataPort=8800;
	
	public final function index($type){
		$this->type=$type;
		$this->display('data/index.php');
	}
	
	public final function add($type, $actionNo, $actionTime){
		$para=array(
			'type'=>$type,
			'actionNo'=>$actionNo,
			'actionTime'=>$actionTime
		);
		$this->display('data/add-modal.php', 0, $para);
	}
	
	
	public final function kj(){
		$para=$_GET;
		$para['key']=$this->encrypt_key;
		$url=$GLOBALS['conf']['node']['access'] . '/data/kj';
		echo $this->http_post($url, $para);
	}
	
	public final function added(){
		if(!$this->getValue("select data from {$this->prename}data where type={$_POST['type']} and number='{$_POST['number']}'")){
			$para['type']=intval($_POST['type']);
			$para['number']=$_POST['number'];
			$para['data']=$_POST['data'];
			$para['time']=$this->time;
			try{
				$this->beginTransaction();
				$this->insertRow($this->prename .'data', $para);
				$this->addLog(17,$this->adminLogType[17].'['.$para['data'].']', 0, $this->getValue("select shortName from {$this->prename}type where id=?",$para['type']).'[期号:'.$para['number'].']');
				$this->commit();
				return "添加成功！";
			}catch(Exception $e){
				$this->rollBack();
				throw $e;
			}
		}else{
			try{
				$para['data']=$_POST['data'];
				$para['time']=$this->time;
				$this->beginTransaction();
				if($this->updateRows($this->prename .'data', $para,'id='.$_POST['id'])){
					$this->addLog(17,$this->adminLogType[17].'['.$para['data'].']', 0, $this->getValue("select shortName from {$this->prename}type where id=?",$para['type']).'[期号:'.$para['number'].']');
					$this->commit();
					return "添加成功！";
				}
			}catch(Exception $e){
				$this->rollBack();
				throw $e;
			}
		}
	}
	
	public function http_post($url, $data) {
		$data_url = http_build_query ($data);
		$data_len = strlen ($data_url);
	
		return file_get_contents ($url, false, stream_context_create (array ('http'=>array ('method'=>'POST'
				, 'header'=>"Connection: close\r\nContent-Length: $data_len\r\n"
				, 'content'=>$data_url
				))));
	}
	
	public final function editsave(){
		$para=array(
			playedId=>$_POST['playedId'], 
			actionData=>$_POST['data']
		);
		if($_POST['cb']){
			$r=0;
			foreach($_POST['cb'] as $v){
				$r+=$v;
			}
			$para['weiShu']=$r;
		}
		try{
			$this->beginTransaction();
			if($this->updateRows($this->prename .'bets', $para, 'id='.intval($_POST['id']))){
				//$this->addLog(17,$this->adminLogType[17].'['.$para['data'].']', 0, $this->getValue("select shortName from {$this->prename}type where id=?",$para['type']).'[期号:'.$para['number'].']');
				$this->commit();
				return "修改成功！";
			}
		}catch(Exception $e){
			$this->rollBack();
			throw $e;
		}
	}
}
