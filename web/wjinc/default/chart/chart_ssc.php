<!--[if IE 8]><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"><![endif]-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:esun>
<head>
<?php 
	$type=intval($args[0]);
	$count=intval($args[1]);
	$this->getTypes();
?>
	<title>58彩票娱乐平台-查看历史号码</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Pragma" content="no-cache" />
	<style>
		font,div,td{font-size:12px;}
	</style>
	<link rel="stylesheet" href="<?=$this->settings['templateurl'] ?>/template/chart/css/line.css" type="text/css" />
	<script language="javascript" type="text/javascript" src="<?=$this->settings['templateurl'] ?>/template/chart/js/jquery.js"></script>
	<script language="javascript" type="text/javascript" src="<?=$this->settings['templateurl'] ?>/template/chart/js/line.js"></script>
	<script language="javascript" type="text/javascript" src="<?=$this->settings['templateurl'] ?>/template/chart/js/calendar/jquery.dyndatetime.js"></script>
	<script language="javascript" type="text/javascript" src="<?=$this->settings['templateurl'] ?>/template/chart/js/calendar/lang/calendar-utf8.js"></script>
	<link rel="stylesheet" href="<?=$this->settings['templateurl'] ?>/template/chart/js/calendar/css/calendar-win2k-cold-1.css" type="text/css" />
	<style type="text/css">
		#title {width:115px; text-align:center;}
		html {overflow:-moz-scrollbars-vertical; overflow-y:scroll;}
	</style>
	<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		  ga('create', 'UA-45549745-1', 'hengcaipiao.com');
		  ga('send', 'pageview');
	</script>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-49350907-1', 'hengcai88.com');
		ga('send', 'pageview');
	</script>
</head>
<body style="background:none;">
	<div id="right_01">
		<div class="right_01_01"></div>
	</div>
<script language="javascript">
	fw.onReady(function(){
		Chart.init();	
		DrawLine.bind("chartsTable","has_line");
			DrawLine.color('#499495');
		DrawLine.add((parseInt(0)*10+5+1),2,10,0);
			DrawLine.color('#E4A8A8');
		DrawLine.add((parseInt(1)*10+5+1),2,10,0);
			DrawLine.color('#499495');
		DrawLine.add((parseInt(2)*10+5+1),2,10,0);
			DrawLine.color('#E4A8A8');
		DrawLine.add((parseInt(3)*10+5+1),2,10,0);
			DrawLine.color('#499495');
		DrawLine.add((parseInt(4)*10+5+1),2,10,0);
			DrawLine.draw(Chart.ini.default_has_line);
		if($("#chartsTable").width()>$('body').width())
		{
		   $('body').width($("#chartsTable").width() + "px");
		}
		$("#container").height($("#chartsTable").height() + "px");
		$("#missedTable").width($("#chartsTable").width() + "px");
	    resize();
		jQuery("#starttime").dynDateTime({
			ifFormat: "%Y-%m-%d",
			daFormat: "%l;%M %p, %e %m,  %Y",
			align: "Br",
			electric: true,
			singleClick: true,
			button: ".next()", //next sibling
			onUpdate:function(){
				$("#starttime").change();
			},
			showOthers: true,
			weekNumbers: true,
			showsTime: false
		});
		jQuery("#starttime").change(function(){
			if(! validateInputDate(jQuery("#starttime").val()) )
			{
				jQuery("#starttime").val('');
				$.alert("日期格式不正确,正确的格式为:2009-06-10");
			}
			if($("#endtime").val()!="")
			{
				if($("#starttime").val()>$("#endtime").val())
				{
					$("#starttime").val("");
					$.alert("输入的日期不符合逻辑.");
				}
				else
				{
				    if(daysBetween($("#starttime").val(),$("#endtime").val()) > 1)
				    {
				  $("#starttime").val("");
				  $.alert("输入的时间跨度不能超过2天！");
				    }
				}
			}
		});
		jQuery("#endtime").dynDateTime({
			ifFormat: "%Y-%m-%d",
			daFormat: "%l;%M %p, %e %m,  %Y",
			align: "Br",
			electric: true,
			singleClick: true,
			button: ".next()", //next sibling
			onUpdate:function(){
				$("#endtime").change();
			},
			showOthers: true,
			weekNumbers: true,
			showsTime: false
		});
		jQuery("#endtime").change(function(){
			if(! validateInputDate(jQuery("#endtime").val()) )
			{
				jQuery("#endtime").val('');
				$.alert("日期格式不正确,正确的格式为:2009-06-10");
			}
			if($("#starttime").val()!="")
			{
				if($("#starttime").val()>$("#endtime").val())
				{
					$("#endtime").val("");
					$.alert("输入的日期不符合逻辑.");
				}
				else
				{
				    if(daysBetween($("#starttime").val(),$("#endtime").val()) > 1)
				    {
				  $("#endtime").val("");
				  $.alert("输入的时间跨度不能超过2天！");
				    }
				}
			}
		});
	});
	function resize(){
	    window.onresize = func;
	    function func(){
	  window.location.href=window.location.href;
	    }
	}
	function daysBetween(start, end){
	   var startY = start.substring(0, start.indexOf('-'));
	   var startM = start.substring(start.indexOf('-')+1, start.lastIndexOf('-'));
	   var startD = start.substring(start.lastIndexOf('-')+1, start.length);
	  
	   var endY = end.substring(0, end.indexOf('-'));
	   var endM = end.substring(end.indexOf('-')+1, end.lastIndexOf('-'));
	   var endD = end.substring(end.lastIndexOf('-')+1, end.length);
	  
	   var val = (Date.parse(endY+'/'+endM+'/'+endD)-Date.parse(startY+'/'+startM+'/'+startD))/86400000;
	   return Math.abs(val);
	}
	function toggleMiss(){
	    $('#missedTable').toggle();
	}
</script>
<style>
	esun\:*{behavior:url(#default#VML)}
</style>
			<div class="search">
				<b class="b5"></b>
				<b class="b6"></b>
				<b class="b7"></b>
				<b class="b8"></b>
				<table width="100%" id="titlemessage" border="0" cellpadding="0" cellspacing="0" style="background:#DDE0E5;">
					<tr>
						<td><b><span class="redtext"><?=$this->types[$type]['title'] ?>基本走势</span></b></td>
						<td>
							<a href="/index.php?tnt=crt&type=<?=$type ?>&count=30">最近30期</a>
							<a href="/index.php?tnt=crt&type=<?=$type ?>&count=50">最近50期</a>
							<a href="/index.php?tnt=crt&type=<?=$type ?>&count=100">最近100期</a>
						</td>
						<!-- td>
							<form method="post">
								<input type="hidden" name="controller" value="game"/>
								<input type="hidden" name="action" value="bonuscode"/>
								<input type="text" value="" name="starttime" id="starttime" style="width:80px;"/>
								<img src="skin/chart/images/icon_06.jpg" style="vertical-align:middle;"/>
								至
								<input type="text" value="" name="endtime" id="endtime" style="width:80px;"/>
								<img src="skin/chart/images/icon_06.jpg" style="vertical-align:middle;"/>
								<input type="submit" value="查询" id="showissue1"/>
							</form>
						</td  -->
					</tr>
				</table>
				<b class="b8"></b>
				<b class="b7"></b>
				<b class="b6"></b>
				<b class="b5"></b>
			</div>
			<table height=5><tr><td></td></tr></table>
			<table align="center">
				 <tr>
				  <td colspan="3" style="border:0px;">
				    标注形式选择&nbsp;<input type="checkbox" name="checkbox2" value="checkbox" id="has_line" />
				    <span><b><label for="has_line">显示走势折线</label></b></span><!--&nbsp;<input type="checkbox" name="checkbox" value="checkbox" id="no_miss" onclick="toggleMiss();" />
				    <span><b><label for="no_miss">不带遗漏数据</label></b></span>-->
				  </td>
				</tr>
			</table>
			<table height=5><tr><td></td></table>
			
			
			<?php 
				if($count<30) $count=30;
				if($count>100) $count=100;
				$data = $this->getRows("select * from (select * from {$this->prename}data where type=$type order by id desc limit $count)x order by x.id");
				$allNums = array(0,1,2,3,4,5,6,7,8,9);
			?>
			
<div style="position:relative; height: 950px;" id="container">
	<table id="chartsTable" width="100%" cellpadding="0" cellspacing="0" border="0" style="position:absolute; top:0; left:0;">
		<tr id="title">
			<td rowspan="2"><strong>期号</strong></td>
			<td rowspan="2" colspan="5" class="redtext"><strong>开奖号码</strong></td>
			<td colspan="10"><strong>万位</strong></td>
			<td colspan="10"><strong>千位</strong></td>
			<td colspan="10"><strong>百位</strong></td>
			<td colspan="10"><strong>十位</strong></td>
			<td colspan="10"><strong>个位</strong></td>
		</tr>
		<tr id="head">
			<?php 
				for($i = 0; $i < 5; $i++){
					foreach ($allNums as $xn){
						echo "<td  class=\"wdh\" align=\"center\"><strong>$xn</strong></td>";
					}
				}
			?>
		</tr>
		<?php 
			foreach ($data as $key=>$value){
				echo "<tr><td id=\"title\" >";
				echo $value['number'];
				echo "</td>";
				
				$nums = explode(',', $value['data']);
				foreach ($nums as $n){
					echo "<td class=\"wdh\" align=\"center\"><div class=\"ball02\">$n</div></td>";
				}
				
				foreach ($nums as $k=>$n){
					foreach ($allNums as $an){
						if($n!=$an){
							echo "<td class=\"wdh\" align=\"center\"><div class=\"ball03\">&nbsp;</div></td>";
						}else{
							$cxcs[$k][$an] += 1; 
							echo "<td class=\"charball\" align=\"center\"><div class=\"ball01\">$n</div></td>";
						}
					}
				}
				echo "</tr>";
			}
		?>
  		<tr>
			<td nowrap>出现总次数</td>
			<td align="center" colspan="5">&nbsp;</td>
			<?php 
				foreach ($nums as $k=>$n){
					foreach ($allNums as $an){
						if($cxcs[$k][$an] == null) $cxcs[$k][$an]=0;
						echo "<td align=\"center\">{$cxcs[$k][$an]}</td>";
					}
				}
			?>
		</tr>
		<tr>
			<td nowrap>平均遗漏值</td>
			<td align="center" colspan="5">&nbsp;</td>
			<?php 
				foreach ($nums as $k=>$n){
					foreach ($allNums as $an){
						echo "<td align=\"center\"><script>document.write({$cxcs[$k][$an]}>0 ? Math.floor({$count}/{$cxcs[$k][$an]}) : {$count}+1);</script></td>";
					}
				}
			?>
			</tr>
	<tr id="head">
		<td rowspan="2" align="center"><strong>期号</strong></td>
		<td rowspan="2" align="center" colspan="5"><strong>开奖号码</strong></td>
		<?php 
			for($i = 0; $i < 5; $i++){
				foreach ($allNums as $xn){
					echo "<td align=\"center\"><strong>$xn</strong></td>";
				}
			}
		?>
	</tr>
	<tr id="title">
		<td colspan="10"><strong>万位</strong></td>
		<td colspan="10"><strong>千位</strong></td>
		<td colspan="10"><strong>百位</strong></td>
		<td colspan="10"><strong>十位</strong></td>
		<td colspan="10"><strong>个位</strong></td>
	</tr>
</table>
</div>
</body>