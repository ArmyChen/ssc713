<!DOCTYPE HTML>
<html>
<head>
<?php $this->display('inc_skin.php',0,'首页'); ?>
<link rel="stylesheet" type="text/css" href="<?=$this->settings['templateurl'] ?>/template/css/index.css">
<script language="javascript" type="text/javascript" src="<?=$this->settings['templateurl'] ?>/template/js/base/main.js"></script><!--index切换框-->
</head>
<body>
<?php $this->display('inc_header.php'); ?>
                <!-- 主内页区域  开始-->
        <div id="rightcon">
            <div class="wrapper bigbox">	
<!--star of banner -->
<div class="swiper-main" style="color:#FFFFFF;">
    <div class="swiper-container swiper1">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="banner-box1" style="width: 364px;">
                    <p>全新平台,完美体验</p>
                    <h1>报道有礼，精彩不停</h1>
                    <a href="<?=$this->basePath('Event-huodong') ?>" class="banner-bt">马上参与</a>               
				 </div>
                <div class="banner-box2"></div>
                <div class="banner-box3"></div>
                <div class="banner-box4"></div>
                <div class="banner-box5"></div>
                <div class="banner-box6"></div>
                <div class="banner-box7"></div>
                <div class="banner-box8"></div>
                <div class="banner-box9"></div>
                <div class="banner-box10"></div>
                <div class="banner-box11"></div>
            </div>
        </div>
    </div>
    <div class="pagination pagination1"></div>
</div>
<!--end of banner -->

<!--star of main -->
<div class="wrapper main" style="color:#FFFFFF;">
    <div class="main-left">
        <ul class="main-box1">
            <span><a href="<?=$this->basePath('Index-game',  '1/2') ?>" class="game1"></a></span>
            <li><a href="<?=$this->basePath('Index-game',  '3/2') ?>" class="game4"></a></li>
            <li><a href="<?=$this->basePath('Index-game',  '12/2') ?>" class="game5"></a></li>
            <li class="game100"></li>
            <li><a href="<?=$this->basePath('Index-game',  '14/59') ?>" class="game22"></a></li>
            <li><a href="<?=$this->basePath('Index-game',  '26/59') ?>" class="game23"></a></li>
            <li><a href="<?=$this->basePath('Index-game',  '5/59') ?>" class="game24"></a></li>
        </ul>
        <div class="clear"></div>
        <ul class="main-box2">
            <li><a href="<?=$this->basePath('Index-game',  '7/77') ?>" class="game8"></a></li>
            <li><a href="<?=$this->basePath('Index-game',  '16/77') ?>" class="game9"></a></li>
            <li><a href="<?=$this->basePath('Index-game',  '6/77') ?>" class="game11"></a></li>
            <li><a href="<?=$this->basePath('Index-game',  '18/19') ?>" class="game10"></a></li>
        </ul>
        <ul class="main-box3">
            <li><a href="<?=$this->basePath('Index-game',  '20/26') ?>" class="game12"></a></li>
            <li><a href="<?=$this->basePath('Index-game',  '25/39') ?>" class="game13"></a></li>
            <li><a href="<?=$this->basePath('Index-game',  '9/16') ?>" class="game14"></a></li>
            <li><a href="<?=$this->basePath('Index-game',  '10/16') ?>" class="game15"></a></li>
        </ul>
    </div>
    <div class="main-right">
        <p class="main-title">欢迎您，<span class="color-1" id="nickname"><?=$this->user['nickname']?></span></p>
        <div class="user-icon"><span class="fa fa-jpy fa-3x "></span></div>
        <div class="user-money">
            <p>可用余额<!--<a href="javascript:" onclick="reloadMemberInfo();" class="fa fa-refresh fa-lg"></a>--></p>
            <p class="color-1" id="usermoney"><?=$this->user['coin']?></p>
        </div>
        <a href="<?=$this->basePath('Cash-recharge') ?>" class="main-bt1"><span class="fa fa-credit-card fa-2x"></span>充值</a>
        <a href="<?=$this->basePath('Cash-toCash') ?>" class="main-bt2"><span class="fa fa-exchange fa-2x"></span>提现</a>
        <div id="user-data">
            <ul>
                <li><a class="tabulous_active" href="#tabs-1">游戏记录</a></li>
                <li><a href="#tabs-2" title="">账变明细</a></li>
                <li><a href="#tabs-3" title="">站内信件</a></li><span class="tabulousclear"></span>
            </ul>
            <div style="height: 175px; " id="tabs_container" >
                <div style="position: absolute; top: 40px;" id="tabs-1">
                    <table class="table1">
                        <tbody><tr>
                            <th>游戏编号</th>
                            <th>游戏</th>
                            <th>状态</th>
                        </tr>
                                                
		<?php
	$sql="select id,wjorderId,actionNo,actionTime,fpEnable,playedId,type,left(actionData,15) as shows,beiShu,mode,actionNum,lotteryNo,bonus,isDelete,kjTime,zjCount from {$this->prename}bets where  isDelete=0 and uid={$this->user['uid']} order by id desc limit 7";
	//echo $sql;
	if(!$this->types) $this->getTypes();
	if($list=$this->getRows($sql)){
	foreach($list as $var){
		if($var['isDelete']==1){
					$status= '<font color="#999999">已撤单</font>';
				}elseif(!$var['lotteryNo']){
					$status= '<font color="#009900">未开奖</font>';
				}elseif($var['zjCount']){
					$status= '<font color="red">已派奖</font>';
				}else{
					$status= '未中奖';
				}
            echo "<tr><td><a data-target=\"#betInfo\" data-toggle=\"modal\" href=\"index.php?tnt=rbi&id=".$var['id']."\" />{$var['wjorderId']}</a></td><td>{$this->types[$var['type']]['title']}</td><td>{$status}</td></tr>";
              } 
			}else{
			   echo "<tr><td colspan='3'><span class='norecord'>暂时没有投注记录！</span></td></tr>";
			}
		?>

              </tbody></table>
                </div>
                <div style="position: absolute; top: 40px;" class="hideflip" id="tabs-2">
                    <table class="table1">
                        <tbody><tr>
                            <th>账变类型</th>
                            <th>日期时间</th>
                            <th>当前余额</th>
                        </tr>
						<?php 
			$sql="select  l.uid,l.userCoin, l.actionTime, left(l.info,8) as showInfo  from {$this->prename}coin_log l left join {$this->prename}bets b on b.id=extfield0 where l.uid={$this->user['uid']} and l.liqType not in(4,11,104) order by l.id desc  limit 7";
	
	//echo $sql;
	if($list=$this->getRows($sql)){
	 foreach($list as $var){
		$actionTime=date("m-d H:i",$var['actionTime']);
	      echo "<tr><td>{$var['showInfo']}</td><td>{$actionTime}</td><td>{$var['userCoin']}</td></tr>";
           } 
	}else{
			   echo "<tr><td colspan='3'><span class='norecord'>暂时没有账变记录！</span></td></tr>";
	}
	 ?>
             </tbody></table>
                </div>
                <div style="position: absolute; top: 40px;" class="hideflip" id="tabs-3">
                    <table class="table1">
                        <tbody><tr>
                            <th>状态</th>
                            <th>主题</th>
                            <th>时间</th>
                        </tr>
  <?php 
     $sql="select u.username susername,m.username as ausername,l.id,left(l.title,7)as showtitle,l.actionTime,l.IsRead from {$this->prename}letter l left  join {$this->prename}members u on u.uid=sid left  join {$this->prename}members m on m.uid=aid where aId={$this->user['uid']}  order by l.actionTime,l.IsRead desc limit 7";
	 //echo $sql;
    if($list=$this->getRows($sql)){
	 foreach($list as $var){
		$actionTime=date("m-d H:i",$var['actionTime']);
		if($var['IsRead']==1){
		   $lstatus= '<font color="#009900">已读信息</font>';
		}else{
		   $lstatus= '<font color="#999999">未读信息</font>';
		}
	      echo "<tr><td>{$lstatus}</td><td><a data-target=\"#letter\" data-toggle=\"modal\" href=\"index.php?tnt=lrso&id=".$var['id']."\" >{$var['showtitle']}</a></td><td>{$actionTime}</td></tr>";
           } 
	}else{
			   echo "<tr><td colspan='3'><span class='norecord'>暂时没有站内信件！</span></td></tr>";
	}
  ?>
                                            </tbody></table>
                </div>
            </div><!--End tabs container-->
        </div><!--End tabs-->
    </div><!--end of main-right -->
    <div class="main-right main-right2">
        <p class="main-title">
            <span class="fa fa-volume-up fa-lg color-1"></span>平台动态        </p>
        <div class="main-news">
		<?php
            $data=$this->getRows("select id,title,content,addtime from {$this->prename}content where nodeId=1 and enable=1 order by addtime desc limit 6");
            if($data) foreach($data as $var){ 
            echo "<a data-target=\"#notice\" data-toggle=\"modal\" href=\"index.php?tnt=nvw&infoid=".$var['id']."\">{$var['title']}&nbsp;&nbsp;&nbsp;&nbsp;".date('Y-m-d',$var['addtime'])."</a>";
            } 
		?>
         </div>
    </div>
</div>
<!--end of main -->
<style>
    #rightcon > .wrapper {width: 100%; padding:0;}
    a {color:#fff;}
    .head-box{display:none;}
</style>
</div>
<!-- end-->
   <!-- 模态框（Modal） -->
   <div class="modal fade" id="letter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content" style="width:800px;  margin-left:-100px;">
        
         </div><!-- /.modal-content -->
      </div><!-- modal-dialog -->
   </div><!-- /.modal -->
   <!-- 模态框（Modal）结束 -->
      <!-- 模态框（Modal） -->
   <div class="modal fade" id="betInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content" style="width:800px;  margin-left:-100px;">
        
         </div><!-- /.modal-content -->
      </div><!-- modal-dialog -->
   </div><!-- /.modal -->
   <!-- 模态框（Modal）结束 -->
      <!-- 模态框（Modal） -->
   <div class="modal fade" id="notice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content" style="width:800px;  margin-left:-100px;">
        
         </div><!-- /.modal-content -->
      </div><!-- modal-dialog -->
   </div><!-- /.modal -->
   <!-- 模态框（Modal）结束 -->
<?php $this->display('inc_footer.php') ?>
</div>
				<!-- 主内页区域  结束-->
</body>
</html>
