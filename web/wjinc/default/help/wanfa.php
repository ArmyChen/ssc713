<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->display('inc_skin.php',0,'首页'); ?>
</head>
<body>
<?php $this->display('inc_header.php'); ?>
  <script type="text/javascript">
    $(function() {
        $("#tab").find("span").click(function() {
            $("#tab").find("span").attr("class", "tab-back");
            $(this).attr("class", "tab-front");
            var id = $(this).attr("id").split("_");
            $(".news_list").hide();
            $("#content_" + id[1]).show();
        });
        var id = 0;
        if (id > 0) {
            $("#tab_" + id).click();
        }
    });
</script>
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
    <p id="page-title"><span class="fa fa-question"></span>帮助中心</p>
    <div class="top_menu">
        <a href="<?=$this->basePath('Help-index') ?>">常见问题</a>
        <a class="act" href="<?=$this->basePath('Help-wanfa') ?>">玩法介绍</a>
        <a href="<?=$this->basePath('Help-gongneng') ?>">功能介绍</a>
    </div>
    <div class="page-info">
        <div id="tab" class="page_list">
            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="page_bar">
                                                <a><span id="tab_13" class="tab-front">时时彩</span>
                                                <a><span id="tab_3" class="tab-back">11选5</span>
                                                <a><span id="tab_28" class="tab-back">时时乐</span>
                                                <a><span id="tab_30" class="tab-back">快三</span>
                                                <a><span id="tab_31" class="tab-back">北京快乐八</span>
                                                <a><span id="tab_29" class="tab-back">排列三/五</span>
                                                <a><span id="tab_14" class="tab-back">3D</span>
                                            </td>
                </tr>
            </table>
        </div>
        <div class="page_list">
            <table>
                <tr>
                    <td>
                                                <ul id="content_13" class="news_list" style="display:block" >
                            <li><table border="0" cellpadding="3" cellspacing="1" width="100%">
    <tbody>
        <tr width="100%">
            <td colspan="5" class="title">重庆时时彩、新疆时时彩、江西时时彩、黑龙江时时彩、天津时时彩</td>
        </tr>
        <tr>
            <th>玩法群</th>
            <th>玩法组</th>
            <th>玩法</th>
            <th>玩法说明</th>
            <th>中奖示例</th>
        </tr>
        <tr height="38">
            <td rowspan="9" height="304" class="xl67" width="73" style="height: 228pt;  text-align: center; "><font class="font8">五星</font></td>
            <td rowspan="2" class="xl67" width="97" style=" text-align: center; "><font class="font8">五星直选</font></td>
            <td class="xl68" width="109" style=" text-align: center; ">直选（复式）</td>
            <td class="xl66" width="419"><font class="font9">从万位、千位、百位、十位、个位中选择一个</font><font class="font7">5</font><font class="font9">位数号码组成一注，所选号码与开奖号码相同，且顺序一致，即为中奖。</font></td>
            <td rowspan="2" class="xl66"><font class="font9">投注方案：1</font><font class="font7">3456</font><font class="font9">；</font><font class="font7"> </font><font class="font9">开奖号码：1</font><font class="font7">3456</font><font class="font9">，即中五星直选。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl68" width="109" style="height: 28.5pt;  text-align: center; ">直选（单式）</td>
            <td class="xl66" width="419"><font class="font9">手动输入一个</font><font class="font7">5</font><font class="font9">位数号码组成一注，所选号码的万位、千位、百位、十位、个位与开奖号码相同，且顺序一致，即为中奖。</font></td>
        </tr>
        <tr height="76" style="height:57.0pt">
            <td height="76" class="xl67" width="97" style="height: 57pt;  text-align: center; "><font class="font8">五星组合</font></td>
            <td class="xl68" width="109" style=" text-align: center; ">&nbsp;&nbsp;&nbsp; 组合</td>
            <td class="xl66" width="419"><font class="font9">从万位、千位、百位、十位、个位中至少各选一个号码组成</font><font class="font7">1-5</font><font class="font9">星的组合，共五注，所选号码的个位与开奖号码相同，则中</font><font class="font7">1</font><font class="font9">个</font><font class="font7">5</font><font class="font9">等奖；所选号码的个位、十位与开奖号码相同，则中</font><font class="font7">1</font><font class="font9">个</font><font class="font7">5</font><font class="font9">等奖以及</font><font class="font7">1</font><font class="font9">个</font><font class="font7">4</font><font class="font9">等奖，依此类推，最高可中</font><font class="font7">5</font><font class="font9">个奖。</font></td>
            <td class="xl66" width="352"><font class="font9">五星组合示例，如购买：4+</font><font class="font7">5+6+7+8</font><font class="font9">，该票共</font><font class="font7">10</font><font class="font9">元，由以下5</font><font class="font9">注：45678(五星)、</font><font class="font7">5678(</font><font class="font9">四星</font><font class="font7">)</font><font class="font9">、</font><font class="font7">678(</font><font class="font9">三星</font><font class="font7">)</font><font class="font9">、</font><font class="font7">78(</font><font class="font9">二星</font><font class="font7">)</font><font class="font9">、</font><font class="font7">8(</font><font class="font9">一星</font><font class="font7">)</font><font class="font9">构成。开奖号码：4</font><font class="font7">5678</font><font class="font9">，即可中五星、四星、三星、二星、一星各</font><font class="font7">1</font><font class="font9">注。</font></td>
        </tr>
        <tr height="38">
            <td rowspan="6" height="152" class="xl67" width="97" style="height: 114pt;  text-align: center; "><font class="font8">五星组选</font></td>
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">五星组选</font><font class="font7">120</font></td>
            <td class="xl66" width="419">从0-9中任意选择5个号码组成一注，所选号码与开奖号码的万位、千位、百位、十位、个位相同，顺序不限，即为中奖。</td>
            <td class="xl66" width="352">投注方案：10568，开奖号码：10568（顺序不限），即可中五星组选120。</td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">五星组选60</font></td>
            <td class="xl66" width="419">选择1个二重号码和三个单号号码组成一注，所选的单号号码与开奖号码相同，且所选二重号码在开奖号码中出现了2次，即为中奖。</td>
            <td class="xl66" width="352">投注方案：二重号：8；单号：016，开奖号码：01688（顺序不限），即可中五星组选60。</td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">五星组选30</font></td>
            <td class="xl66" width="419">选择2个二重号和1个单号号码组成一注，所选的单号号码与开奖号码相同，且所选的2个二重号码分别在开奖号码中出现了2次，即为中奖。</td>
            <td class="xl66" width="352">投注方案：二重号：68；单号：0，开奖号码：06688（顺序不限），即可中五星组选30。</td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">五星组选20</font></td>
            <td class="xl66" width="419">选择1个三重号码和两个单号号码组成一注，所选的单号号码与开奖号码相同，且所选三重号码在开奖号码中出现了3次，即为中奖。</td>
            <td class="xl66" width="352">投注方案：三重号：8；单号：01，开奖号码：01888（顺序不限），即可中五星组选20。</td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">五星组选10</font></td>
            <td class="xl66" width="419">选择1个三重号码和1个二重号码，所选三重号码在开奖号码中出现3次，并且所选二重号码在开奖号码中出现了2次，即为中奖。</td>
            <td class="xl66" width="352"><font class="font9">投注方案：三重号：8；二重号：1，</font>开奖号码：11888（顺序不限），即可中五星组选10。</td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">五星组选5</font></td>
            <td class="xl66" width="419">选择1个四重号码和1个单号号码组成一注，所选的单号号码与开奖号码相同，且所选四重号码在开奖号码中出现了4次，即为中奖。</td>
            <td class="xl66" width="352"><font class="font9">投注方案：四重号：8；单号：1，</font>开奖号码：18888（顺序不限），即可中五星组选5。</td>
        </tr>
        <tr height="38">
            <td rowspan="7" height="304" class="xl67" width="73" style="height: 228pt;  text-align: center; "><font class="font8">四星</font></td>
            <td rowspan="2" class="xl67" width="97" style=" text-align: center; "><font class="font8">四星直选</font></td>
            <td class="xl68" width="109" style=" text-align: center; ">直选（复式）</td>
            <td class="xl66" width="419"><font class="font9">从千位、百位、十位、个位中选择一个</font><font class="font7">4</font><font class="font9">位数号码组成一注，所选号码与开奖号码相同，且顺序一致，即为中奖。</font></td>
            <td rowspan="2" class="xl66"><font class="font9">投注方案：</font><font class="font7">3456</font><font class="font9">；</font><font class="font7"> </font><font class="font9">开奖号码：</font><font class="font7">3456</font><font class="font9">，即中四星直选。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl68" width="109" style="height: 28.5pt;  text-align: center; ">直选（单式）</td>
            <td class="xl66" width="419"><font class="font9">手动输入一个</font><font class="font7">4</font><font class="font9">位数号码组成一注，所选号码的千位、百位、十位、个位与开奖号码相同，且顺序一致，即为中奖。</font></td>
        </tr>
        <tr height="76" style="height:57.0pt">
            <td height="76" class="xl67" width="97" style="height: 57pt;  text-align: center; "><font class="font8">四星组合</font></td>
            <td class="xl68" width="109" style=" text-align: center; ">&nbsp;&nbsp;&nbsp; 组合</td>
            <td class="xl66" width="419"><font class="font9">从千位、百位、十位、个位中至少各选一个号码组成</font><font class="font7">1-4</font><font class="font9">星的组合，共四注，所选号码的个位与开奖号码相同，则中</font><font class="font7">1</font><font class="font9">个</font><font class="font7">4</font><font class="font9">等奖；所选号码的个位、十位与开奖号码相同，则中</font><font class="font7">1</font><font class="font9">个</font><font class="font7">4</font><font class="font9">等奖以及</font><font class="font7">1</font><font class="font9">个</font><font class="font7">3</font><font class="font9">等奖，依此类推，最高可中</font><font class="font7">4</font><font class="font9">个奖。</font></td>
            <td class="xl66" width="352"><font class="font9">四星组合示例，如购买：</font><font class="font7">5+6+7+8</font><font class="font9">，该票共</font><font class="font7">8</font><font class="font9">元，由以下</font><font class="font7">4</font><font class="font9">注：</font><font class="font7">5678(</font><font class="font9">四星</font><font class="font7">)</font><font class="font9">、</font><font class="font7">678(</font><font class="font9">三星</font><font class="font7">)</font><font class="font9">、</font><font class="font7">78(</font><font class="font9">二星</font><font class="font7">)</font><font class="font9">、</font><font class="font7">8(</font><font class="font9">一星</font><font class="font7">)</font><font class="font9">构成。开奖号码：</font><font class="font7">5678</font><font class="font9">，即可中四星、三星、二星、一星各</font><font class="font7">1</font><font class="font9">注。</font></td>
        </tr>
        <tr height="38">
            <td rowspan="4" height="152" class="xl67" width="97" style="height: 114pt;  text-align: center; "><font class="font8">四星组选</font></td>
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">四星组选</font><font class="font7">24</font></td>
            <td class="xl66" width="419"><font class="font9">从</font><font class="font7">0-9</font><font class="font9">中任意选择</font><font class="font7">4</font><font class="font9">个号码组成一注，所选号码与开奖号码的千位、百位、十位、个位相同，且顺序不限，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：</font><font class="font7">0568</font><font class="font9">，开奖号码的四个数字只要包含</font><font class="font7">0</font><font class="font9">、</font><font class="font7">5</font><font class="font9">、</font><font class="font7">6</font><font class="font9">、</font><font class="font7">8</font><font class="font9">，即可中四星组选</font><font class="font7">24</font><font class="font9">。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">四星组选</font><font class="font7">12</font></td>
            <td class="xl66" width="419"><font class="font9">选择</font><font class="font7">1</font><font class="font9">个二重号码和</font><font class="font7">2</font><font class="font9">个单号号码组成一注，所选号码与开奖号码的千位、百位、十位、个位相同，且所选二重号码在开奖号码千位、百位、十位、个位中出现了</font><font class="font7">2</font><font class="font9">次，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：二重号：</font><font class="font7">8</font><font class="font9">，单号：</font><font class="font7">0</font><font class="font9">、</font><font class="font7">6</font><font class="font9">，只要开奖的四个数字从小到大排列为</font><font class="font7"> 0</font><font class="font9">、</font><font class="font7">6</font><font class="font9">、</font><font class="font7">8</font><font class="font9">、</font><font class="font7">8</font><font class="font9">，即可中四星组选</font><font class="font7">12</font><font class="font9">。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">四星组选</font><font class="font7">6</font></td>
            <td class="xl66" width="419"><font class="font9">选择</font><font class="font7">2</font><font class="font9">个二重号码组成一注，所选的</font><font class="font7">2</font><font class="font9">个二重号码在开奖号码千位、百位、十位、个位分别出现了</font><font class="font7">2</font><font class="font9">次，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：二重号：</font><font class="font7">2</font><font class="font9">、</font><font class="font7">8</font><font class="font9">，只要开奖的四个数字从小到大排列为</font><font class="font7"> 0</font><font class="font9">、</font><font class="font7">2</font><font class="font9">、</font><font class="font7">2</font><font class="font9">、</font><font class="font7">8</font><font class="font9">、</font><font class="font7">8</font><font class="font9">，即可中四星组选</font><font class="font7">6</font><font class="font9">。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">四星组选</font><font class="font7">4</font></td>
            <td class="xl66" width="419"><font class="font9">选择</font><font class="font7">1</font><font class="font9">个三重号码和</font><font class="font7">1</font><font class="font9">个单号号码组成一注，所选号码与开奖号码的千位、百位、十位、个位相同，且所选三重号码在开奖号码千位、百位、十位、个位中出现了</font><font class="font7">3</font><font class="font9">次，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：三重号：</font><font class="font7">8</font><font class="font9">，单号：</font><font class="font7">0</font><font class="font9">、</font><font class="font7">2</font><font class="font9">，只要开奖的四个数字从小到大排列为</font><font class="font7"> 0</font><font class="font9">、</font><font class="font7">2</font><font class="font9">、</font><font class="font7">8</font><font class="font9">、</font><font class="font7">8</font><font class="font9">、</font><font class="font7">8</font><font class="font9">，即可中四星组选</font><font class="font7">4</font><font class="font9">。</font></td>
        </tr>
        <tr height="38">
            <td rowspan="14" height="608" class="xl67" width="73" style="height: 456pt;  text-align: center; "><font class="font8">三星后三</font></td>
            <td rowspan="4" class="xl67" width="97" style=" text-align: center; "><font class="font8">后三直选</font></td>
            <td class="xl68" width="109" style=" text-align: center; ">直选（复式）</td>
            <td class="xl66" width="419"><font class="font9">从百位、十位、个位中选择一个</font><font class="font7">3</font><font class="font9">位数号码组成一注，所选号码与开奖号码后</font><font class="font7">3</font><font class="font9">位相同，且顺序一致，即为中奖。</font></td>
            <td rowspan="2" class="xl66" width="352"><font class="font9">投注方案：</font><font class="font7">345</font><font class="font9">；</font><font class="font7"> </font><font class="font9">开奖号码：</font><font class="font7">345</font><font class="font9">，即中后三直选。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl68" width="109" style="height: 28.5pt;  text-align: center; ">直选（单式）</td>
            <td class="xl66" width="419"><font class="font9">手动输入一个</font><font class="font7">3</font><font class="font9">位数号码组成一注，所选号码的百位、十位、个位与开奖号码相同，且顺序一致，即为中奖。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">直选和值</font></td>
            <td class="xl66" width="419"><font class="font9">所选数值等于开奖号码的百位、十位、个位三个数字相加之和，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：和值</font><font class="font7">1</font><font class="font9">；开奖号码后三位：</font><font class="font7">001,010,100,</font><font class="font9">即中后三直选。</font></td>
        </tr>
        <tr height="57" style="height:42.75pt">
            <td height="57" class="xl69" width="109" style="height: 42.75pt;  text-align: center; "><font class="font9">直选跨度</font></td>
            <td class="xl66" width="419"><font class="font9">所选数值等于开奖号码的后</font><font class="font7">3</font><font class="font9">位最大与最小数字相减之差，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：跨度</font><font class="font7">8</font><font class="font9">；开奖号码后三位：</font><font class="font7">(1)</font><font class="font9">开出的三个数字包括</font><font class="font7">0,8,x</font><font class="font9">，其中</font><font class="font7">x</font><font class="font9">&ne;</font><font class="font7">9</font><font class="font9">，即可中后三直选</font><font class="font7">;(2)</font><font class="font9">开出的三个数字包括</font><font class="font7">1,9,x</font><font class="font9">，其中</font><font class="font7">x</font><font class="font9">&ne;</font><font class="font7">0</font><font class="font9">，即可中后三直选。</font></td>
        </tr>
        <tr height="57" style="height:42.75pt">
            <td height="57" class="xl67" width="97" style="height: 42.75pt;  text-align: center; "><font class="font8">后三组合</font></td>
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">组合</font></td>
            <td class="xl66" width="419"><font class="font9">从百位、十位、个位中至少各选择一个号码组成</font><font class="font7">1-3</font><font class="font9">星的组合共三注，当个位号码与开奖号码相同，则中</font><font class="font7">1</font><font class="font9">个</font><font class="font7">3</font><font class="font9">等奖；如果个位与十位号码与开奖号码相同，则中</font><font class="font7">1</font><font class="font9">个</font><font class="font7">3</font><font class="font9">等奖以及</font><font class="font7">1</font><font class="font9">个</font><font class="font7">2</font><font class="font9">等奖，依此类推，最高可中</font><font class="font7">3</font><font class="font9">个奖。</font></td>
            <td class="xl66" width="352"><font class="font9">后三组合示例，如购买：</font><font class="font7">6+7+8</font><font class="font9">，该票共</font><font class="font7">6</font><font class="font9">元，由以下</font><font class="font7">3</font><font class="font9">注：</font><font class="font7">678(</font><font class="font9">三星</font><font class="font7">)</font><font class="font9">、</font><font class="font7">78(</font><font class="font9">二星</font><font class="font7">)</font><font class="font9">、</font><font class="font7">8(</font><font class="font9">一星</font><font class="font7">)</font><font class="font9">构成。开奖号码：</font><font class="font7">678</font><font class="font9">，即可中三星、二星、一星各</font><font class="font7">1</font><font class="font9">注。</font></td>
        </tr>
        <tr height="38">
            <td rowspan="5" height="228" class="xl67" width="97" style="height: 171pt;  text-align: center; "><font class="font8">后三组选</font></td>
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">组三</font></td>
            <td class="xl66" width="419"><font class="font9">从</font><font class="font7">0-9</font><font class="font9">中选择</font><font class="font7">2</font><font class="font9">个数字组成两注，所选号码与开奖号码的百位、十位、个位相同，且顺序不限，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：</font><font class="font7">5,8,8</font><font class="font9">；开奖号码后三位：</font><font class="font7">1</font><font class="font9">个</font><font class="font7">5</font><font class="font9">，</font><font class="font7">2</font><font class="font9">个</font><font class="font7">8 (</font><font class="font9">顺序不限</font><font class="font7">)</font><font class="font9">，即中后三组三。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">组六</font></td>
            <td class="xl66" width="419"><font class="font9">从</font><font class="font7">0-9</font><font class="font9">中任意选择</font><font class="font7">3</font><font class="font9">个号码组成一注，所选号码与开奖号码的百位、十位、个位相同，顺序不限，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：</font><font class="font7">2,5,8</font><font class="font9">；开奖号码后三位：</font><font class="font7">1</font><font class="font9">个</font><font class="font7">2</font><font class="font9">、</font><font class="font7">1</font><font class="font9">个</font><font class="font7">5</font><font class="font9">、</font><font class="font7">1</font><font class="font9">个</font><font class="font7">8 (</font><font class="font9">顺序不限</font><font class="font7">)</font><font class="font9">，即中后三组六。</font></td>
        </tr>
        <tr height="57" style="height:42.75pt">
            <td height="57" class="xl69" width="109" style="height: 42.75pt;  text-align: center; "><font class="font9">组选和值<br />
            </font><font class="font7">(</font><font class="font9">不含豹子号</font><font class="font7">)</font></td>
            <td class="xl66" width="419"><font class="font9">所选数值等于开奖号码百位、十位、个位三个数字相加之和</font><font class="font7">(</font><font class="font9">不含豹子号</font><font class="font7">)</font><font class="font9">，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：和值</font><font class="font7">3</font><font class="font9">；开奖号码后三位：</font><font class="font7">(1)</font><font class="font9">开出</font><font class="font7">003</font><font class="font9">号码，顺序不限，即中后三组三；</font><font class="font7">(2)</font><font class="font9">开出</font><font class="font7">012</font><font class="font9">号码，顺序不限，即中后三组六。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">组选包胆<br />
            </font><font class="font7">(</font><font class="font9">不含豹子号</font><font class="font7">)</font></td>
            <td class="xl66" width="419"><font class="font9">从</font><font class="font7">0-9</font><font class="font9">中任意选择</font><font class="font7">1</font><font class="font9">个包胆号码，开奖号码的百位、十位、个位中任意</font><font class="font7">1</font><font class="font9">位与所选包胆号码相同</font><font class="font7">(</font><font class="font9">不含豹子号</font><font class="font7">)</font><font class="font9">，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：包胆</font><font class="font7">3</font><font class="font9">；开奖号码后三位：</font><font class="font7">(1)</font><font class="font9">出现</font><font class="font7">3xx</font><font class="font9">或者</font><font class="font7">33x,</font><font class="font9">即中后三组三；</font><font class="font7">(2)</font><font class="font9">出现</font><font class="font7">3xy</font><font class="font9">，即中后三组六。</font></td>
        </tr>
        <tr height="57" style="height:42.75pt">
            <td height="57" class="xl69" width="109" style="height: 42.75pt;  text-align: center; "><font class="font9">混合组选</font></td>
            <td class="xl66" width="419"><font class="font9">手动输入一个</font><font class="font7">3</font><font class="font9">位数号码组成一注</font><font class="font7">(</font><font class="font9">不含豹子号</font><font class="font7">)</font><font class="font9">，开奖号码的百位、十位、个位符合后三组三或组六均为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：分別投注</font><font class="font7">(0,0,1),</font><font class="font9">以及</font><font class="font7">(1,2,3)</font><font class="font9">，开奖号码后三位包括：</font><font class="font7">(1)0,0,1</font><font class="font9">，顺序不限，即中得后三组三；或者</font><font class="font7">(2)1,2,3</font><font class="font9">，顺序不限，即中得后三组六。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl67" width="97" style="height: 28.5pt;  text-align: center; "><font class="font8">后三和值尾数</font></td>
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">和值尾数</font></td>
            <td class="xl66" width="419"><font class="font9">所选数值等于开奖号码的百位、十位、个位三个数字相加之和的尾数，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：和值尾数</font><font class="font7">8</font><font class="font9">，开奖号码：后三位和值尾数为</font><font class="font7">8</font><font class="font9">，即中得和值尾数。</font></td>
        </tr>
        <tr height="38">
            <td rowspan="3" height="114" class="xl67" width="97" style="height: 85.5pt;  text-align: center; "><font class="font8">后三特殊</font></td>
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">豹子</font></td>
            <td rowspan="3" class="xl66" width="419"><font class="font9">所选的号码特殊属性和开奖号码后</font><font class="font7">3</font><font class="font9">位的属性一致，即为中奖。其中：</font><font class="font7">1.</font><font class="font9">顺子号的个、十、百位不分顺序(特别号码：019、089也是顺子号<font class="font9">)；</font><font class="font7">2.</font><font class="font9">对子号指的是开奖号码的后三位当中，任意</font><font class="font7">2</font><font class="font9">位数字相同的三位数号码。</font></font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：豹子；开奖号码后三位：三个数字全部相同，即中得豹子。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">顺子</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：顺子；开奖号码后三位：为连续数字，例如</font><font class="font7">678</font><font class="font9">，即中得顺子。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">对子</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：对子；开奖号码后三位：</font><font class="font7">3</font><font class="font9">个数字中有</font><font class="font7">2</font><font class="font9">个数字相同，即中得对子。</font></td>
        </tr>
        <tr height="38">
            <td rowspan="14" height="608" class="xl67" width="73" style="height: 456pt;  text-align: center; "><font class="font8">三星前三</font></td>
            <td rowspan="4" class="xl67" width="97" style=" text-align: center; "><font class="font8">前三直选</font></td>
            <td class="xl68" width="109" style=" text-align: center; ">直选（复式）</td>
            <td class="xl66" width="419"><font class="font9">从万位、千位、百位中选择一个</font><font class="font7">3</font><font class="font9">位数号码组成一注，所选号码与开奖号码的前</font><font class="font7">3</font><font class="font9">位相同，且顺序一致，即为中奖。</font></td>
            <td rowspan="2" class="xl66" width="352"><font class="font9">投注方案：</font><font class="font7">345</font><font class="font9">；</font><font class="font7"> </font><font class="font9">开奖号码：</font><font class="font7">345</font><font class="font9">，即中前三直选。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl68" width="109" style="height: 28.5pt;  text-align: center; ">直选（单式）</td>
            <td class="xl66" width="419"><font class="font9">手动输入一个</font><font class="font7">3</font><font class="font9">位数号码组成一注，所选号码的万位、千位、百位与开奖号码相同，且顺序一致，即为中奖。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">直选和值</font></td>
            <td class="xl66" width="419"><font class="font9">所选数值等于开奖号码的万位、千位、百位三个数字相加之和，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：和值</font><font class="font7">1</font><font class="font9">；开奖号码前三位：</font><font class="font7">001,010,100,</font><font class="font9">即中前三直选。</font></td>
        </tr>
        <tr height="57" style="height:42.75pt">
            <td height="57" class="xl69" width="109" style="height: 42.75pt;  text-align: center; "><font class="font9">直选跨度</font></td>
            <td class="xl66" width="419"><font class="font9">所选数值等于开奖号码的前</font><font class="font7">3</font><font class="font9">位最大与最小数字相减之差，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：跨度</font><font class="font7">8</font><font class="font9">；开奖号码前三位：</font><font class="font7">(1)</font><font class="font9">开出的三个数字包括</font><font class="font7">0,8,x</font><font class="font9">，其中</font><font class="font7">x</font><font class="font9">&ne;</font><font class="font7">9</font><font class="font9">，即可中前三直选</font><font class="font7">;(2)</font><font class="font9">开出的三个数字包括</font><font class="font7">1,9,x</font><font class="font9">，其中</font><font class="font7">x</font><font class="font9">&ne;</font><font class="font7">0</font><font class="font9">，即可中前三直选。</font></td>
        </tr>
        <tr height="57" style="height:42.75pt">
            <td height="57" class="xl67" width="97" style="height: 42.75pt;  text-align: center; "><font class="font8">前三组合</font></td>
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">组合</font></td>
            <td class="xl66" width="419"><font class="font9">从万位、千位、百位中至少各选择一个号码组成</font><font class="font7">1-3</font><font class="font9">星的组合共三注，当百位号码与开奖号码相同，则中</font><font class="font7">1</font><font class="font9">个</font><font class="font7">3</font><font class="font9">等奖；如果百位与千位号码与开奖号码相同，则中</font><font class="font7">1</font><font class="font9">个</font><font class="font7">3</font><font class="font9">等奖以及</font><font class="font7">1</font><font class="font9">个</font><font class="font7">2</font><font class="font9">等奖，依此类推，最高可中</font><font class="font7">3</font><font class="font9">个奖。</font></td>
            <td class="xl66" width="352"><font class="font9">前三组合示例，如购买：</font><font class="font7">6+7+8</font><font class="font9">，该票共</font><font class="font7">6</font><font class="font9">元，由以下</font><font class="font7">3</font><font class="font9">注：</font><font class="font7">678(</font><font class="font9">三星</font><font class="font7">)</font><font class="font9">、</font><font class="font7">78(</font><font class="font9">二星</font><font class="font7">)</font><font class="font9">、</font><font class="font7">8(</font><font class="font9">一星</font><font class="font7">)</font><font class="font9">构成。开奖号码：</font><font class="font7">678</font><font class="font9">，即可中三星、二星、一星各</font><font class="font7">1</font><font class="font9">注。</font></td>
        </tr>
        <tr height="38">
            <td rowspan="5" height="228" class="xl67" width="97" style="height: 171pt;  text-align: center; "><font class="font8">前三组选</font></td>
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">组三</font></td>
            <td class="xl66" width="419"><font class="font9">从</font><font class="font7">0-9</font><font class="font9">中选择</font><font class="font7">2</font><font class="font9">个数字组成两注，所选号码与开奖号码的万位、千位、百位相同，且顺序不限，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：</font><font class="font7">5,8,8</font><font class="font9">；开奖号码前三位：</font><font class="font7">1</font><font class="font9">个</font><font class="font7">5</font><font class="font9">，</font><font class="font7">2</font><font class="font9">个</font><font class="font7">8 (</font><font class="font9">顺序不限</font><font class="font7">)</font><font class="font9">，即中前三组三。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">组六</font></td>
            <td class="xl66" width="419"><font class="font9">从</font><font class="font7">0-9</font><font class="font9">中任意选择</font><font class="font7">3</font><font class="font9">个号码组成一注，所选号码与开奖号码的万位、千位、百位相同，顺序不限，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：</font><font class="font7">2,5,8</font><font class="font9">；开奖号码前三位：</font><font class="font7">1</font><font class="font9">个</font><font class="font7">2</font><font class="font9">、</font><font class="font7">1</font><font class="font9">个</font><font class="font7">5</font><font class="font9">、</font><font class="font7">1</font><font class="font9">个</font><font class="font7">8 (</font><font class="font9">顺序不限</font><font class="font7">)</font><font class="font9">，即中前三组六。</font></td>
        </tr>
        <tr height="57" style="height:42.75pt">
            <td height="57" class="xl69" width="109" style="height: 42.75pt;  text-align: center; "><font class="font9">组选和值<br />
            </font><font class="font7">(</font><font class="font9">不含豹子号</font><font class="font7">)</font></td>
            <td class="xl66" width="419"><font class="font9">所选数值等于开奖号码万位、千位、百位三个数字相加之和</font><font class="font7">(</font><font class="font9">不含豹子号</font><font class="font7">)</font><font class="font9">，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：和值</font><font class="font7">3</font><font class="font9">；开奖号码前三位：</font><font class="font7">(1)</font><font class="font9">开出</font><font class="font7">003</font><font class="font9">号码，顺序不限，即中前三组三；</font><font class="font7">(2)</font><font class="font9">开出</font><font class="font7">012</font><font class="font9">号码，顺序不限，即中前三组六。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">组选包胆<br />
            </font><font class="font7">(</font><font class="font9">不含豹子号</font><font class="font7">)</font></td>
            <td class="xl66" width="419"><font class="font9">从</font><font class="font7">0-9</font><font class="font9">中任意选择</font><font class="font7">1</font><font class="font9">个包胆号码，开奖号码的万位、千位、百位中任意</font><font class="font7">1</font><font class="font9">位只要和所选包胆号码相同</font><font class="font7">(</font><font class="font9">不含豹子号</font><font class="font7">)</font><font class="font9">，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：包胆</font><font class="font7">3</font><font class="font9">；开奖号码后三位：</font><font class="font7">(1)</font><font class="font9">出现</font><font class="font7">3xx</font><font class="font9">或者</font><font class="font7">33x,</font><font class="font9">即中前三组三；</font><font class="font7">(2)</font><font class="font9">出现</font><font class="font7">3xy</font><font class="font9">，即中前三组六。</font></td>
        </tr>
        <tr height="57" style="height:42.75pt">
            <td height="57" class="xl69" width="109" style="height: 42.75pt;  text-align: center; "><font class="font9">混合组选</font></td>
            <td class="xl66" width="419"><font class="font9">手动输入一个</font><font class="font7">3</font><font class="font9">位数号码组成一注</font><font class="font7">(</font><font class="font9">不含豹子号</font><font class="font7">)</font><font class="font9">，开奖号码的万位、千位、百位符合后三组三或组六均为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：分別投注</font><font class="font7">(0,0,1),</font><font class="font9">以及</font><font class="font7">(1,2,3)</font><font class="font9">，开奖号码前三位包括：</font><font class="font7">(1)0,0,1</font><font class="font9">，顺序不限，即中得组三；或者</font><font class="font7">(2)1,2,3</font><font class="font9">，顺序不限，即中得组六。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl67" width="97" style="height: 28.5pt;  text-align: center; "><font class="font8">前三和值尾数</font></td>
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">和值尾数</font></td>
            <td class="xl66" width="419"><font class="font9">所选数值等于开奖号码的万位、千位、百位三个数字相加之和的尾数，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：和值尾数</font><font class="font7">8</font><font class="font9">，开奖号码：前三位和值尾数为</font><font class="font7">8</font><font class="font9">，即中得和值尾数。</font></td>
        </tr>
        <tr height="38">
            <td rowspan="3" height="114" class="xl67" width="97" style="height: 85.5pt;  text-align: center; "><font class="font8">前三特殊</font></td>
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">豹子</font></td>
            <td rowspan="3" class="xl66" width="419"><font class="font9">所选的号码特殊属性和开奖号码前</font><font class="font7">3</font><font class="font9">位的属性一致，即为中奖。其中：</font><font class="font7">1.</font><font class="font9">顺子号的万、千、百位不分顺序(特别号码：019、089也是顺子号)；</font><font class="font7">2.</font><font class="font9">对子号指的是开奖号码的前三位当中，任意</font><font class="font7">2</font><font class="font9">位数字相同的三位数号码。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：豹子；开奖号码前三位：三个数字全部相同，即中得豹子。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">顺子</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：顺子；开奖号码前三位：为连续数字，例如</font><font class="font7">678</font><font class="font9">，即中得顺子。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">对子</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：对子；开奖号码前三位：</font><font class="font7">3</font><font class="font9">个数字中有</font><font class="font7">2</font><font class="font9">个数字相同，即中得对子。</font></td>
        </tr>
        <tr height="38">
            <td rowspan="16" height="608" class="xl67" width="73" style="height: 456pt;  text-align: center; "><font class="font8">二星</font></td>
            <td rowspan="8" class="xl67" width="97" style=" text-align: center; "><font class="font8">二星直选</font></td>
            <td class="xl68" width="109" style=" text-align: center; ">前二直选<br />
            （复式）</td>
            <td class="xl66" width="419"><font class="font9">从万位、千位中选择一个</font><font class="font7">2</font><font class="font9">位数号码组成一注，所选号码与开奖号码的前</font><font class="font7">2</font><font class="font9">位相同，且顺序一致，即为中奖。</font></td>
            <td rowspan="2" class="xl66" width="352"><font class="font9">投注方案：</font><font class="font7">58</font><font class="font9">；开奖号码前二位：</font><font class="font7">58</font><font class="font9">，即中前二直选。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl68" width="109" style="height: 28.5pt;  text-align: center; ">前二直选<br />
            （单式）</td>
            <td class="xl66" width="419"><font class="font9">手动输入一个</font><font class="font7">2</font><font class="font9">位数号码组成一注，所选号码的万位、千位与开奖号码相同，且顺序一致，即为中奖。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">前二直选和值</font></td>
            <td class="xl66" width="419"><font class="font9">所选数值等于开奖号码的万位、千位二个数字相加之和，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：和值</font><font class="font7">1</font><font class="font9">；开奖号码前二位：</font><font class="font7">01,10</font><font class="font9">，即中前二直选。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">前二直选跨度</font></td>
            <td class="xl66" width="419"><font class="font9">所选数值等于开奖号码的前</font><font class="font7">2</font><font class="font9">位最大与最小数字相减之差，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：跨度</font><font class="font7">9</font><font class="font9">；开奖号码为</font><font class="font7">9,0,-,-,-</font><font class="font9">或</font><font class="font7">0,9,-,-,-</font><font class="font9">，即中前二直选。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl68" width="109" style="height: 28.5pt;  text-align: center; ">后二直选<br />
            （复式）</td>
            <td class="xl66" width="419"><font class="font9">从十位、个位中选择一个</font><font class="font7">2</font><font class="font9">位数号码组成一注，所选号码与开奖号码的十位、个位相同，且顺序一致，即为中奖。</font></td>
            <td rowspan="2" class="xl66" width="352"><font class="font9">投注方案：</font><font class="font7">58</font><font class="font9">；开奖号码后二位：</font><font class="font7">58</font><font class="font9">，即中后二直选。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl68" width="109" style="height: 28.5pt;  text-align: center; ">后二直选<br />
            （单式）</td>
            <td class="xl66" width="419"><font class="font9">手动输入一个</font><font class="font7">2</font><font class="font9">位数号码组成一注，所选号码的十位、个位与开奖号码相同，且顺序一致，即为中奖。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">后二直选和值</font></td>
            <td class="xl66" width="419"><font class="font9">所选数值等于开奖号码的十位、个位二个数字相加之和，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：和值</font><font class="font7">1</font><font class="font9">；开奖号码后二位：</font><font class="font7">01,10</font><font class="font9">，即中后二直选。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">后二直选跨度</font></td>
            <td class="xl66" width="419"><font class="font9">所选数值等于开奖号码的后</font><font class="font7">2</font><font class="font9">位最大与最小数字相减之差，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：跨度</font><font class="font7">9</font><font class="font9">；开奖号码为</font><font class="font7">-,-,-,9,0</font><font class="font9">或</font><font class="font7">-,-,-,0,9</font><font class="font9">，即中后二直选。</font></td>
        </tr>
        <tr height="38">
            <td rowspan="8" height="304" class="xl67" width="97" style="height: 228pt;  text-align: center; "><font class="font8">二星组选</font></td>
            <td class="xl68" width="109" style=" text-align: center; ">前二组选<br />
            （复式）</td>
            <td class="xl66" width="419"><font class="font9">从</font><font class="font7">0-9</font><font class="font9">中选</font><font class="font7">2</font><font class="font9">个号码组成一注，所选号码与开奖号码的万位、千位相同，顺序不限（不含对子号），即中奖。</font></td>
            <td rowspan="2" class="xl66" width="352"><font class="font9">投注方案：</font><font class="font7">5,8</font><font class="font9">；开奖号码前二位：</font><font class="font7">85 </font><font class="font9">或</font><font class="font7">58(</font><font class="font9">顺序不限，不含对子号</font><font class="font7">)</font><font class="font9">，即中前二组选。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl68" width="109" style="height: 28.5pt;  text-align: center; ">前二组选<br />
            （单式）</td>
            <td class="xl66" width="419"><font class="font9">手动输入一个</font><font class="font7">2</font><font class="font9">位数号码组成一注，所选号码的万位、千位与开奖号码相同，顺序不限（不含对子号），即为中奖。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">前二组选和值</font></td>
            <td class="xl66" width="419"><font class="font9">所选数值等于开奖号码的万位、千位二个数字相加之和（不含对子号），即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：和值</font><font class="font7">1</font><font class="font9">；开奖号码前二位：</font><font class="font7">10</font><font class="font9">或</font><font class="font7">01 (</font><font class="font9">顺序不限，不含对子号</font><font class="font7">)</font><font class="font9">，即中前二组选。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">前二组选包胆</font></td>
            <td class="xl66" width="419"><font class="font9">从</font><font class="font7">0-9</font><font class="font9">中任意选择</font><font class="font7">1</font><font class="font9">个包胆号码，开奖号码的万位、千位中任意</font><font class="font7">1</font><font class="font9">位包含所选的包胆号码（不含对子号），即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：包胆号码</font><font class="font7">8</font><font class="font9">；开奖号码前二位：出现</font><font class="font7">1</font><font class="font9">个</font><font class="font7">8</font><font class="font9">（不包括</font><font class="font7">2</font><font class="font9">个</font><font class="font7">8</font><font class="font9">），即中前二组选。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl68" width="109" style="height: 28.5pt;  text-align: center; ">后二组选<br />
            （复式）</td>
            <td class="xl66" width="419"><font class="font9">从</font><font class="font7">0-9</font><font class="font9">中选</font><font class="font7">2</font><font class="font9">个号码组成一注，所选号码与开奖号码的十位、个位相同，顺序不限（不含对子号），即为中奖。</font></td>
            <td rowspan="2" class="xl66" width="352"><font class="font9">投注方案：</font><font class="font7">5,8</font><font class="font9">；开奖号码后二位：</font><font class="font7">85 </font><font class="font9">或</font><font class="font7">58 (</font><font class="font9">顺序不限，不含对子号</font><font class="font7">)</font><font class="font9">，即中后二组选。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl68" width="109" style="height: 28.5pt;  text-align: center; ">后二组选<br />
            （单式）</td>
            <td class="xl66" width="419"><font class="font9">手动输入一个</font><font class="font7">2</font><font class="font9">位数号码组成一注，所选号码的十位、个位与开奖号码相同，顺序不限（不含对子号），即为中奖。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">后二组选和值</font></td>
            <td class="xl66" width="419"><font class="font9">所选数值等于开奖号码的十位、个位二个数字相加之和（不含对子号），即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：和值</font><font class="font7">1</font><font class="font9">；开奖号码后二位：</font><font class="font7">10</font><font class="font9">或</font><font class="font7">01(</font><font class="font9">顺序不限，不含对子号</font><font class="font7">)</font><font class="font9">，即中后二组选。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">后二组选包胆</font></td>
            <td class="xl66" width="419"><font class="font9">从</font><font class="font7">0-9</font><font class="font9">中任意选择</font><font class="font7">1</font><font class="font9">个包胆号码，开奖号码的十位、个位中任意</font><font class="font7">1</font><font class="font9">位包含所选的包胆号码（不含对子号），即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：包胆号码</font><font class="font7">8</font><font class="font9">；开奖号码后二位：出现</font><font class="font7">1</font><font class="font9">个</font><font class="font7">8</font><font class="font9">（不包括</font><font class="font7">2</font><font class="font9">个</font><font class="font7">8</font><font class="font9">），即中后二组选。</font></td>
        </tr>
        <tr height="19" style="height:14.25pt">
            <td rowspan="5" height="95" class="xl67" width="73" style="height: 71.25pt;  text-align: center; "><font class="font8">定位胆</font></td>
            <td rowspan="5" class="xl67" width="97" style=" text-align: center; "><font class="font8">定位胆</font></td>
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">万位</font></td>
            <td rowspan="5" class="xl66" width="419"><font class="font9">从万位、千位、百位、十位、个位任意位置上至少选择</font><font class="font7">1</font><font class="font9">个以上号码，所选号码与相同位置上的开奖号码一致，即为中奖。</font></td>
            <td rowspan="5" class="xl66" width="352"><font class="font9">投注方案：万位</font><font class="font7"> 1</font><font class="font9">；开奖号码万位：</font><font class="font7">1</font><font class="font9">，即中定位胆万位。</font></td>
        </tr>
        <tr height="19" style="height:14.25pt">
            <td height="19" class="xl69" width="109" style="height: 14.25pt;  text-align: center; "><font class="font9">千位</font></td>
        </tr>
        <tr height="19" style="height:14.25pt">
            <td height="19" class="xl69" width="109" style="height: 14.25pt;  text-align: center; "><font class="font9">百位</font></td>
        </tr>
        <tr height="19" style="height:14.25pt">
            <td height="19" class="xl69" width="109" style="height: 14.25pt;  text-align: center; "><font class="font9">十位</font></td>
        </tr>
        <tr height="19" style="height:14.25pt">
            <td height="19" class="xl69" width="109" style="height: 14.25pt;  text-align: center; "><font class="font9">个位</font></td>
        </tr>
        <tr height="38">
            <td rowspan="8" height="304" class="xl67" width="73" style="height: 228pt;  text-align: center; "><font class="font8">不定位</font></td>
            <td rowspan="4" class="xl67" width="97" style=" text-align: center; "><font class="font8">三星不定位</font></td>
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">后三一码不定位</font></td>
            <td class="xl66" width="419"><font class="font9">从</font><font class="font7">0-9</font><font class="font9">中选择</font><font class="font7">1</font><font class="font9">个号码，每注由</font><font class="font7">1</font><font class="font9">个号码组成，只要开奖号码的百位、十位、个位中包含所选号码，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：</font><font class="font7">1</font><font class="font9">；开奖号码后三位：至少出现</font><font class="font7">1</font><font class="font9">个</font><font class="font7">1</font><font class="font9">，即中后三一码不定位。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">后三二码不定位</font></td>
            <td class="xl66" width="419"><font class="font9">从</font><font class="font7">0-9</font><font class="font9">中选择</font><font class="font7">2</font><font class="font9">个号码，每注由</font><font class="font7">2</font><font class="font9">个不同的号码组成，开奖号码的百位、十位、个位中同时包含所选的</font><font class="font7">2</font><font class="font9">个号码，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：</font><font class="font7">1,2</font><font class="font9">；开奖号码后三位：至少出现</font><font class="font7">1</font><font class="font9">和</font><font class="font7">2</font><font class="font9">各</font><font class="font7">1</font><font class="font9">个，即中后三二码不定位。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">前三一码不定位</font></td>
            <td class="xl66" width="419"><font class="font9">从</font><font class="font7">0-9</font><font class="font9">中选择</font><font class="font7">1</font><font class="font9">个号码，每注由</font><font class="font7">1</font><font class="font9">个号码组成，只要开奖号码的万位、千位、百位中包含所选号码，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：</font><font class="font7">1</font><font class="font9">；开奖号码前三位：至少出现</font><font class="font7">1</font><font class="font9">个</font><font class="font7">1</font><font class="font9">，即中前三一码不定位。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">前三二码不定位</font></td>
            <td class="xl66" width="419"><font class="font9">从</font><font class="font7">0-9</font><font class="font9">中选择</font><font class="font7">2</font><font class="font9">个号码，每注由</font><font class="font7">2</font><font class="font9">个不同的号码组成，开奖号码的万位、千位、百位中同时包含所选的</font><font class="font7">2</font><font class="font9">个号码，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：</font><font class="font7">1,2</font><font class="font9">；开奖号码前三位：至少出现</font><font class="font7">1</font><font class="font9">和</font><font class="font7">2</font><font class="font9">各</font><font class="font7">1</font><font class="font9">个，即中前三二码不定位。</font></td>
        </tr>
        <tr height="38">
            <td rowspan="2" height="76" class="xl67" width="97" style="height: 57pt;  text-align: center; "><font class="font8">四星不定位</font></td>
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">四星一码不定位</font></td>
            <td class="xl66" width="419"><font class="font9">从</font><font class="font7">0-9</font><font class="font9">中选择</font><font class="font7">1</font><font class="font9">个号码，每注由</font><font class="font7">1</font><font class="font9">个号码组成，只要开奖号码的千位、百位、十位、个位中包含所选号码，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：</font><font class="font7">1</font><font class="font9">；开奖号码后四位：至少出现</font><font class="font7">1</font><font class="font9">个</font><font class="font7">1</font><font class="font9">，即中四星一码不定位。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">四星二码不定位</font></td>
            <td class="xl66" width="419"><font class="font9">从</font><font class="font7">0-9</font><font class="font9">中选择</font><font class="font7">2</font><font class="font9">个号码，每注由</font><font class="font7">2</font><font class="font9">个不同的号码组成，开奖号码的千位、百位、十位、个位中同时包含所选的</font><font class="font7">2</font><font class="font9">个号码，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：</font><font class="font7">1,2</font><font class="font9">；开奖号码后四位：至少出现</font><font class="font7">1</font><font class="font9">和</font><font class="font7">2</font><font class="font9">各</font><font class="font7">1</font><font class="font9">个，即中四星二码不定位。</font></td>
        </tr>
        <tr height="38">
            <td rowspan="2" height="76" class="xl67" width="97" style="height: 57pt;  text-align: center; "><font class="font8">五星不定位</font></td>
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">五星二码不定位</font></td>
            <td class="xl66" width="419"><font class="font9">从</font><font class="font7">0-9</font><font class="font9">中选择</font><font class="font7">2</font><font class="font9">个号码，每注由</font><font class="font7">2</font><font class="font9">个不同的号码组成，开奖号码的万位、千位、百位、十位、个位中同时包含所选的</font><font class="font7">2</font><font class="font9">个号码，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：</font><font class="font7">1,2</font><font class="font9">；开奖号码：至少出现</font><font class="font7">1</font><font class="font9">和</font><font class="font7">2</font><font class="font9">各</font><font class="font7">1</font><font class="font9">个，即中五星二码不定位。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">五星三码不定位</font></td>
            <td class="xl66" width="419"><font class="font9">从</font><font class="font7">0-9</font><font class="font9">中选择</font><font class="font7">3</font><font class="font9">个号码，每注由</font><font class="font7">3</font><font class="font9">个不同的号码组成，开奖号码的万位、千位、百位、十位、个位中同时包含所选的</font><font class="font7">3</font><font class="font9">个号码，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：</font><font class="font7">1,2,3</font><font class="font9">；开奖号码：至少出现</font><font class="font7">1</font><font class="font9">、</font><font class="font7">2</font><font class="font9">、</font><font class="font7">3</font><font class="font9">各</font><font class="font7">1</font><font class="font9">个，即中五星三码不定位。</font></td>
        </tr>
        <tr height="57" style="height:42.75pt">
            <td rowspan="4" height="228" class="xl67" width="73" style="height: 171pt;  text-align: center; "><font class="font8">大小单双</font></td>
            <td rowspan="4" class="xl67" width="97" style=" text-align: center; "><font class="font8">大小单双</font></td>
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">后二大小单双</font></td>
            <td class="xl66" width="419"><font class="font9">对十位和个位的</font><font class="font7">&ldquo;</font><font class="font9">大（</font><font class="font7">56789</font><font class="font9">）小（</font><font class="font7">01234</font><font class="font9">）、单（</font><font class="font7">13579</font><font class="font9">）双（</font><font class="font7">02468</font><font class="font9">）</font><font class="font7">&rdquo;</font><font class="font9">形态进行购买，所选号码的位置、形态与开奖号码的位置、形态相同，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：大单；开奖号码十位与个位：大单，即中后二大小单双。</font></td>
        </tr>
        <tr height="57" style="height:42.75pt">
            <td height="57" class="xl69" width="109" style="height: 42.75pt;  text-align: center; "><font class="font9">后三大小单双</font></td>
            <td class="xl66" width="419"><font class="font9">对百位、十位和个位的</font><font class="font7">&ldquo;</font><font class="font9">大（</font><font class="font7">56789</font><font class="font9">）小（</font><font class="font7">01234</font><font class="font9">）、单（</font><font class="font7">13579</font><font class="font9">）双（</font><font class="font7">02468</font><font class="font9">）</font><font class="font7">&rdquo;</font><font class="font9">形态进行购买，所选号码的位置、形态与开奖号码的位置、形态相同，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：大单大；开奖号码百、十、个位：大单大，即中后三大小单双。</font></td>
        </tr>
        <tr height="57" style="height:42.75pt">
            <td height="57" class="xl69" width="109" style="height: 42.75pt;  text-align: center; "><font class="font9">前二大小单双</font></td>
            <td class="xl66" width="419"><font class="font9">对万位、千位的</font><font class="font7">&ldquo;</font><font class="font9">大（</font><font class="font7">56789</font><font class="font9">）小（</font><font class="font7">01234</font><font class="font9">）、单（</font><font class="font7">13579</font><font class="font9">）双（</font><font class="font7">02468</font><font class="font9">）</font><font class="font7">&rdquo;</font><font class="font9">形态进行购买，所选号码的位置、形态与开奖号码的位置、形态相同，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：小双；开奖号码万位与千位：小双，即中前二大小单双。</font></td>
        </tr>
        <tr height="57" style="height:42.75pt">
            <td height="57" class="xl69" width="109" style="height: 42.75pt;  text-align: center; "><font class="font9">前三大小单双</font></td>
            <td class="xl66" width="419"><font class="font9">对万位、千位和百位的</font><font class="font7">&ldquo;</font><font class="font9">大（</font><font class="font7">56789</font><font class="font9">）小（</font><font class="font7">01234</font><font class="font9">）、单（</font><font class="font7">13579</font><font class="font9">）双（</font><font class="font7">02468</font><font class="font9">）</font><font class="font7">&rdquo;</font><font class="font9">形态进行购买，所选号码的位置、形态与开奖号码的位置、形态相同，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：小双小；开奖号码万、千、百位：小双小，即中前三大小单双。</font></td>
        </tr>
        <tr height="38">
            <td rowspan="4" height="152" class="xl67" width="73" style="height: 114pt;  text-align: center; ">&nbsp;趣味</td>
            <td rowspan="4" class="xl67" width="97" style=" text-align: center; "><font class="font8">五星特殊</font></td>
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">一帆风顺</font></td>
            <td class="xl66" width="419"><font class="font9">从</font><font class="font7">0-9</font><font class="font9">中任意选择</font><font class="font7">1</font><font class="font9">个号码组成一注，只要开奖号码的万位、千位、百位、十位、个位中包含所选号码，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：</font><font class="font7">8</font><font class="font9">；开奖号码：至少出现</font><font class="font7">1</font><font class="font9">个</font><font class="font7">8</font><font class="font9">，即中一帆风顺。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">好事成双</font></td>
            <td class="xl66" width="419"><font class="font9">从</font><font class="font7">0-9</font><font class="font9">中任意选择</font><font class="font7">1</font><font class="font9">个号码组成一注，只要所选号码在开奖号码的万位、千位、百位、十位、个位中出现</font><font class="font7">2</font><font class="font9">次，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：</font><font class="font7">8</font><font class="font9">；开奖号码：至少出现</font><font class="font7">2</font><font class="font9">个</font><font class="font7">8</font><font class="font9">，即中好事成双。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">三星报喜</font></td>
            <td class="xl66" width="419"><font class="font9">从</font><font class="font7">0-9</font><font class="font9">中任意选择</font><font class="font7">1</font><font class="font9">个号码组成一注，只要所选号码在开奖号码的万位、千位、百位、十位、个位中出现</font><font class="font7">3</font><font class="font9">次，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：</font><font class="font7">8</font><font class="font9">；开奖号码：至少出现</font><font class="font7">3</font><font class="font9">个</font><font class="font7">8</font><font class="font9">，即中三星报喜。</font></td>
        </tr>
        <tr height="38">
            <td height="38" class="xl69" width="109" style="height: 28.5pt;  text-align: center; "><font class="font9">四季发财</font></td>
            <td class="xl66" width="419"><font class="font9">从</font><font class="font7">0-9</font><font class="font9">中任意选择</font><font class="font7">1</font><font class="font9">个号码组成一注，只要所选号码在开奖号码的万位、千位、百位、十位、个位中出现</font><font class="font7">4</font><font class="font9">次，即为中奖。</font></td>
            <td class="xl66" width="352"><font class="font9">投注方案：</font><font class="font7">8</font><font class="font9">；开奖号码：至少出现</font><font class="font7">4</font><font class="font9">个</font><font class="font7">8</font><font class="font9">，即中四季发财。</font></td>
        </tr>
        <tr height="38">
            <td rowspan="6" height="152" class="xl67" width="73" style="height: 114pt;  text-align: center; ">&nbsp;任选二</td>
            <td rowspan="3" class="xl67" width="97" style=" text-align: center; "><font class="font8">任二直选</font></td>
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">直选复式</font></td>
            <td class="xl66" width="419">从万位、千位、百位、十位、个位中任意选择两个位，在这两个位上至少各选1个号码组成一注，所选2个位置上的开奖号码与所选号码完全相同，且顺序一致，即为中奖。</td>
            <td class="xl66" width="352">投注方案：万位1，十位2； 开奖号码：1**2*，即中任二直选。</td>
        </tr>
        <tr height="38">
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">直选单式</font></td>
            <td class="xl66" width="419">从万位、千位、百位、十位、个位中任意勾选两个位置，手动输入一个两位数号码组成一注，所选2个位置和输入的号码都与开奖号码相同，且顺序一致，即为中奖。</td>
            <td class="xl66" width="352">投注方案：勾选位置千位、个位，输入号码12； 开奖号码：*1**2，即中任二直选。</td>
        </tr>
        <tr height="38">
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">直选和值</font></td>
            <td class="xl66" width="419">从万位、千位、百位、十位、个位中任意勾选两个位置，然后选择一个和值，所选2个位置的开奖号码相加之和与所选和值一致，且顺序一致，即为中奖。</td>
            <td class="xl66" width="352">投注方案：勾选位置千位、个位，选择和值15； 开奖号码：*8**7，即中任二直选和值。</td>
        </tr>
        <tr height="38">
            <td rowspan="3" class="xl67" width="97" style=" text-align: center; "><font class="font8">任二组选</font></td>
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">组选复式</font></td>
            <td class="xl66" width="419">从万位、千位、百位、十位、个位中任意勾选两个位置，然后从0-9中选择两个号码组成一注，所选2个位置的开奖号码与所选号码一致，顺序不限，即为中奖。</td>
            <td class="xl66" width="352">投注方案：勾选位置万位、个位，选择号码79； 开奖号码：9***7 或 7***9，均中任二组选。</td>
        </tr>
        <tr height="38">
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">组选单式</font></td>
            <td class="xl66" width="419">从万位、千位、百位、十位、个位中任意勾选两个位置，然后输入两个号码组成一注，所选2个位置的开奖号码与输入号码一致，顺序不限，即为中奖。</td>
            <td class="xl66" width="352">投注方案：勾选位置万位、个位，输入号码79； 开奖号码：9***7 或 7***9，均中任二组选。</td>
        </tr>
        <tr height="38">
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">组选和值(不含对子号)</font></td>
            <td class="xl66" width="419">从万位、千位、百位、十位、个位中任意勾选两个位置，然后选择一个和值，所选2个位置的开奖号码相加之和与所选和值一致，顺序不限，即为中奖。</td>
            <td class="xl66" width="352">投注方案：勾选位置千位、个位，选择和值6； 开奖号码：*4**2 或 *2**4，均中任二组选和值。</td>
        </tr>
        <tr height="38">
            <td rowspan="9" height="152" class="xl67" width="73" style="height: 114pt;  text-align: center; ">&nbsp;任选三</td>
            <td rowspan="3" class="xl67" width="97" style=" text-align: center; "><font class="font8">任三直选</font></td>
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">直选复式</font></td>
            <td class="xl66" width="419">从万位、千位、百位、十位、个位中任意选择三个位，在这三个位上至少各选1个号码组成一注，所选3个位置上的开奖号码与所选号码完全相同，且顺序一致，即为中奖。</td>
            <td class="xl66" width="352">投注方案：万位1、千位5、十位2； 开奖号码：15*2*，即中任三直选。</td>
        </tr>
        <tr height="38">
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">直选单式</font></td>
            <td class="xl66" width="419">从万位、千位、百位、十位、个位中任意勾选三个位置，手动输入一个三位数号码组成一注，所选三个位置上的开奖号码与输入号码完全相同，且顺序一致，即为中奖。</td>
            <td class="xl66" width="352">投注方案：勾选位置万位、千位、个位，输入号码152； 开奖号码：15**2，即中任三直选。</td>
        </tr>
        <tr height="38">
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">直选和值</font></td>
            <td class="xl66" width="419">从万位、千位、百位、十位、个位中任意勾选三个位置，然后选择一个和值，所选3个位置的开奖号码相加之和与所选和值一致，且顺序一致，即为中奖。</td>
            <td class="xl66" width="352">投注方案：勾选位置万位、千位、个位，选择和值8； 开奖号码：22**4，即中任三直选和值。</td>
        </tr>
        <tr height="38">
            <td rowspan="6" class="xl67" width="97" style=" text-align: center; "><font class="font8">任三组选</font></td>
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">组三复式</font></td>
            <td class="xl66" width="419">从万位、千位、百位、十位、个位中任意勾选三个位置，然后从0-9中选择两个号码组成一注，所选三个位置的开奖号码与所选号码一致，顺序不限，即为中奖。</td>
            <td class="xl66" width="352">投注方案：勾选位置万位、千位、个位，选择号码18； 开奖号码：11**8 或 18**1，均中任三组三。</td>
        </tr>
        <tr height="38">
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">组三单式</font></td>
            <td class="xl66" width="419">从万位、千位、百位、十位、个位中任意勾选三个位置，然后输入两个相同号码和一个不同号码组成一注，所选3个位置的开奖号码与输入号码一致，顺序不限，即为中奖。</td>
            <td class="xl66" width="352">投注方案：勾选位置万位、千位、个位，输入号码779； 开奖号码：97**7 或 79**7，均中任三组三。</td>
        </tr>
        <tr height="38">
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">组六复式</font></td>
            <td class="xl66" width="419">从万位、千位、百位、十位、个位中任意勾选三个位置，然后从0-9中选择三个号码组成一注，所选3个位置的开奖号码与所选号码一致，顺序不限，即为中奖。</td>
            <td class="xl66" width="352">投注方案：勾选位置万位、百位、个位，选择号码159； 开奖号码：1*5*9 或 9*1*5，均中任三组六。</td>
        </tr>
        <tr height="38">
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">组六单式</font></td>
            <td class="xl66" width="419">从万位、千位、百位、十位、个位中任意勾选三个位置，然后输入三个各不相同的3个号码组成一注，所选3个位置的开奖号码与输入号码一致，顺序不限，即为中奖。</td>
            <td class="xl66" width="352">投注方案：勾选位置万位、百位、个位，选择号码159； 开奖号码：1*5*9 或 9*1*5，即中任三组六。</td>
        </tr>
        <tr height="38">
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">混合组选</font></td>
            <td class="xl66" width="419">从万位、千位、百位、十位、个位中任意勾选三个位置，然后输入三个号码组成一注，所选3个位置的开奖号码与输入号码一致，顺序不限，即为中奖。</td>
            <td class="xl66" width="352">投注方案：勾选位置千位、百位、个位，分別投注(0,0,1),以及(1,2,3)，开奖号码：*00*1，顺序不限，即中任三组三；或者(2)*21*3，顺序不限，即中任三组六。</td>
        </tr>
        <tr height="38">
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">组选和值(不含豹子号)</font></td>
            <td class="xl66" width="419">从万位、千位、百位、十位、个位中任意勾选三个位置，然后选择一个和值，所选3个位置的开奖号码相加之和与所选和值一致，顺序不限，即为中奖。</td>
            <td class="xl66" width="352">投注方案：选择位置万位、十位、个位,选择和值号码8，开奖号码：51812，即中任三组选和值。</td>
        </tr>
        <tr height="38">
            <td rowspan="6" height="152" class="xl67" width="73" style="height: 114pt;  text-align: center; ">&nbsp;任选四</td>
            <td rowspan="2" class="xl67" width="97" style=" text-align: center; "><font class="font8">任四直选</font></td>
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">直选复式</font></td>
            <td class="xl66" width="419">从万位、千位、百位、十位、个位中任意选择四个位置，在这四个位上至少各选1个号码组成一注，所选4个位置上的开奖号码与所选号码完全相同，且顺序一致，即为中奖。</td>
            <td class="xl66" width="352">投注方案：万位1、千位5、十位2、个位4； 开奖号码：15*24，即中任四直选。</td>
        </tr>
        <tr height="38">
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">直选单式</font></td>
            <td class="xl66" width="419">从万位、千位、百位、十位、个位中任意勾选四个位置，手动输入一个四位数号码组成一注，所选4个位置上的开奖号码与输入号码完全相同，且顺序一致，即为中奖。</td>
            <td class="xl66" width="352">投注方案：勾选位置万位、千位、十位、个位，输入号码1524； 开奖号码：15*24，即中任四直选。</td>
        </tr>
        <tr height="38">
            <td rowspan="4" class="xl67" width="97" style=" text-align: center; "><font class="font8">任四组选</font></td>
            <td class="xl69" width="109" style=" text-align: center; "><font class="font9">组选24</font></td>
            <td class="xl66" width="419">从万位、千位、百位、十位、个位中任意勾选四个位置，然后从0-9中选择四个号码组成一注，所选4个位置的开奖号码与所选号码一致，顺序不限，即为中奖。</td>
            <td class="xl66" width="352">投注方案：勾选位置万位、千位、十位、个位，选择号码1234； 开奖号码：12*34 或 13*24，均中任四组选24。</td>
        </tr>
        <tr height="38">
            <td class="xl69" width="109" style=" text-align: center; ">组选12</td>
            <td class="xl66" width="419">从万位、千位、百位、十位、个位中任意勾选四个位置，然后选择1个二重号码和2个单号号码组成一注，所选4个位置的开奖号码中包含与所选号码，且所选二重号码在所选4个位置的开奖号码中出现了2次，即为中奖。</td>
            <td class="xl66" width="352">投注方案：勾选位置万位、千位、十位、个位，选择二重号：8，单号：0、6； 开奖号码：88*06 或 08*68，均中任四组选12。</td>
        </tr>
        <tr height="38">
            <td class="xl69" width="109" style=" text-align: center; ">组选6</td>
            <td class="xl66" width="419">从万位、千位、百位、十位、个位中任意勾选四个位置，然后从0-9中选择2个二重号组成一注，所选4个位置的开奖号码与所选号码一致，并且所选的2个二重号码在所选4个位置的开奖号码中分别出现了2次，顺序不限，即为中奖。</td>
            <td class="xl66" width="352">投注方案：勾选位置万位、千位、十位、个位，选择二重号：6、8； 开奖号码：66*88 或 68*68，均中任四组选6。</td>
        </tr>
        <tr height="38">
            <td class="xl69" width="109" style=" text-align: center; ">组选4</td>
            <td class="xl66" width="419">从万位、千位、百位、十位、个位中任意勾选四个位置，然后从0-9中选择1个三重号和1个单号组成一注，所选4个位置的开奖号码与所选号码一致，并且所选三重号码在所选4个位置的开奖号码中出现了3次，顺序不限，即为中奖。</td>
            <td class="xl66" width="352">投注方案：勾选位置万位、千位、十位、个位，选择三重号：8，单号：0； 开奖号码：88*80 或 80*88，均中任四组选4。</td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p></li>
                        </ul>
                                                <ul id="content_3" class="news_list" style="display:none" >
                            <li><table border="0" cellpadding="3" cellspacing="1" width="100%">
    <tbody>
        <tr>
            <td colspan="4" class="title">十一运夺金、江西多乐彩、重庆11选5、广东11选5</td>
        </tr>
        <tr>
            <th width="10%">玩法组</th>
            <th width="10%">玩法</th>
            <th>玩法说明</th>
            <th>中奖示例</th>
        </tr>
        <tr height="44">
            <td rowspan="5" height="286" class="xl70" style="text-align: center;"><font class="font10">三码</font></td>
            <td class="xl70" style="text-align: center;"><font class="font10">前三直选复式</font></td>
            <td class="xl71"><font class="font10">从</font><font class="font9">01-11</font><font class="font10">共</font><font class="font9">11</font><font class="font10">个号码中选择</font><font class="font9">3</font><font class="font10">个不重复的号码组成一注，所选号码与当期顺序摇出的</font><font class="font9">5</font><font class="font10">个号码中的前</font><font class="font9">3</font><font class="font10">个号码相同，且顺序一致，即为中奖。</font></td>
            <td class="xl71">&nbsp; <font class="font10">如：选择</font><font class="font9">01</font><font class="font10">，</font><font class="font9">02</font><font class="font10">，</font><font class="font9">03</font><font class="font10">，开奖号码顺序为</font><font class="font9">01</font><font class="font10">，0</font><font class="font9">2</font><font class="font10">，</font><font class="font9">03 * *</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="44">
            <td height="44" class="xl70" style="text-align: center;"><font class="font10">前三直选单式</font></td>
            <td class="xl71"><font class="font10">手动输入</font><font class="font9">3</font><font class="font10">个号码组成一注，所输入的号码与当期顺序摇出的</font><font class="font9">5</font><font class="font10">个号码中的前</font><font class="font9">3</font><font class="font10">个号码相同，且顺序一致，即为中奖。</font></td>
            <td class="xl71">&nbsp; <font class="font10">如：手动输入</font><font class="font9">01 02 03</font><font class="font10">，开奖号码是</font><font class="font9">01 02 03 * *</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="66">
            <td height="66" class="xl70" style="text-align: center;"><font class="font10">前三组选复式</font></td>
            <td class="xl71"><font class="font10">从</font><font class="font9">01-11</font><font class="font10">中共</font><font class="font9">11</font><font class="font10">个号码中选择</font><font class="font9">3</font><font class="font10">个号码，所选号码与当期顺序摇出的</font><font class="font9">5</font><font class="font10">个号码中的前</font><font class="font9">3</font><font class="font10">个号码相同，顺序不限，即为中奖。</font></td>
            <td class="xl71">&nbsp; <font class="font10">如：选择</font><font class="font9">01 02 03</font><font class="font10">（展开为</font><font class="font9">01 02 03 * *</font><font class="font10">，</font><font class="font9">01 03 02 * *</font><font class="font10">，</font><font class="font9">02 01 03 * *</font><font class="font10">，</font><font class="font9">02 03 01 * *</font><font class="font10">，</font><font class="font9">03 01 02 * *</font><font class="font10">，</font><font class="font9">03 02 01 * *</font><font class="font10">），开奖号码为</font><font class="font9">03 01 02&nbsp; </font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="66">
            <td height="66" class="xl70" style="text-align: center;"><font class="font10">前三组选单式</font></td>
            <td class="xl71"><font class="font10">手动输入</font><font class="font9">3</font><font class="font10">个号码组成一注，所输入的号码与当期顺序摇出的</font><font class="font9">5</font><font class="font10">个号码中的前</font><font class="font9">3</font><font class="font10">个号码相同，顺序不限，即为中奖。</font></td>
            <td class="xl71">&nbsp; <font class="font10">如：手动输入</font><font class="font9">01 02 03</font><font class="font10">（展开为</font><font class="font9">01 02 03 * *</font><font class="font10">，</font><font class="font9">01 03 02 * * , 02 01 03 * *</font><font class="font10">，</font><font class="font9">02 03 01 * *</font><font class="font10">，</font><font class="font9">03 01 02 * *</font><font class="font10">，</font><font class="font9">03 02 01 * *</font><font class="font10">），开奖号码为</font><font class="font9">01 03 02 * *</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="66">
            <td height="66" class="xl70" style="text-align: center;"><font class="font10">前三组选胆拖</font></td>
            <td class="xl71"><font class="font10">分别从胆码和拖码的</font><font class="font9">01-11</font><font class="font10">中，至少选择</font><font class="font9">1</font><font class="font10">个胆码和</font><font class="font9">2</font><font class="font10">个拖码组成一注。当期顺序摇出的</font><font class="font9">5</font><font class="font10">个号码中的前</font><font class="font9">3</font><font class="font10">个号码中同时包含所选的</font><font class="font9">1</font><font class="font10">个胆码和</font><font class="font9">2</font><font class="font10">个拖码，顺序不限，即为中奖。</font></td>
            <td class="xl71">&nbsp; <font class="font10">如：选择胆码</font><font class="font9"> 01</font><font class="font10">，选择拖码</font><font class="font9">   02 06</font><font class="font10">，开奖号码为</font><font class="font9"> 02 01 06 *   *</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="44">
            <td rowspan="5" height="242" class="xl70" style="text-align: center;"><font class="font10">二码</font></td>
            <td class="xl70" style="text-align: center;"><font class="font10">前二直选复式</font></td>
            <td class="xl71"><font class="font10">从</font><font class="font9">01-11</font><font class="font10">共</font><font class="font9">11</font><font class="font10">个号码中选择</font><font class="font9">2</font><font class="font10">个不重复的号码组成一注，所选号码与当期顺序摇出的</font><font class="font9">5</font><font class="font10">个号码中的前</font><font class="font9">2</font><font class="font10">个号码相同，且顺序一致，即中奖。</font></td>
            <td class="xl72" width="341">&nbsp; <font class="font10">如：选择</font><font class="font9">01 02</font><font class="font10">，开奖号码</font><font class="font9">   01 02 * * *</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="44">
            <td height="44" class="xl70" style="text-align: center;"><font class="font10">前二直选单式</font></td>
            <td class="xl71"><font class="font10">手动输入</font><font class="font9">2</font><font class="font10">个号码组成一注，所输入的号码与当期顺序摇出的</font><font class="font9">5</font><font class="font10">个号码中的前</font><font class="font9">2</font><font class="font10">个号码相同，且顺序一致，即为中奖。</font></td>
            <td class="xl72" width="341">&nbsp; <font class="font10">如：手动输入</font><font class="font9"> 01 02</font><font class="font10">，开奖号码为</font><font class="font9">01 02 * * *</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="44">
            <td height="44" class="xl70" style="text-align: center;"><font class="font10">前二组选复式</font></td>
            <td class="xl71"><font class="font10">从</font><font class="font9">01-11</font><font class="font10">中共</font><font class="font9">11</font><font class="font10">个号码中选择</font><font class="font9">2</font><font class="font10">个号码，所选号码与当期顺序摇出的</font><font class="font9">5</font><font class="font10">个号码中的前</font><font class="font9">2</font><font class="font10">个号码相同，顺序不限，即为中奖。</font></td>
            <td class="xl72" width="341">&nbsp; <font class="font10">如：选择</font><font class="font9">01 02</font><font class="font10">（展开为</font><font class="font9">01   02 * * *</font><font class="font10">，</font><font class="font9">02 01 * * *</font><font class="font10">），开奖号码为</font><font class="font9">02 01 * * * </font><font class="font10">或</font><font class="font9"> 01 02 * * *</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="44">
            <td height="44" class="xl70" style="text-align: center;"><font class="font10">前二组选单式</font></td>
            <td class="xl71"><font class="font10">手动输入</font><font class="font9">2</font><font class="font10">个号码组成一注，所输入的号码与当期顺序摇出的</font><font class="font9">5</font><font class="font10">个号码中的前</font><font class="font9">2</font><font class="font10">个号码相同，顺序不限，即为中奖。</font></td>
            <td class="xl72" width="341">&nbsp; <font class="font10">如：手动输入</font><font class="font9">01 02</font><font class="font10">（展开为</font><font class="font9">01   02 * * *</font><font class="font10">，</font><font class="font9">02 01 * * *</font><font class="font10">），开奖号码为</font><font class="font9">02 01 *** </font><font class="font10">或</font><font class="font9"> 01 02 ***</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="66">
            <td height="66" class="xl70" style="text-align: center;"><font class="font10">前二组选胆拖</font></td>
            <td class="xl71"><font class="font10">分别从胆码和拖码的</font><font class="font9">01-11</font><font class="font10">中，至少选择</font><font class="font9">1</font><font class="font10">个胆码和</font><font class="font9">1</font><font class="font10">个拖码组成一注。当期顺序摇出的</font><font class="font9">5</font><font class="font10">个号码中的前</font><font class="font9">2</font><font class="font10">个号码中同时包含所选的</font><font class="font9">1</font><font class="font10">个胆码和</font><font class="font9">1</font><font class="font10">个拖码，顺序不限，即为中奖。</font></td>
            <td class="xl72" width="341">&nbsp; <font class="font10">如：选择胆码</font><font class="font9"> 01</font><font class="font10">，选择拖码</font><font class="font9">   06</font><font class="font10">，开奖号码为</font><font class="font9"> 06 01* * *</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="66">
            <td height="66" class="xl70" style="text-align: center;"><font class="font10">不定位</font></td>
            <td class="xl70" style="text-align: center;"><font class="font10">前三不定位</font></td>
            <td class="xl71"><font class="font10">从</font><font class="font9">01-11</font><font class="font10">中共</font><font class="font9">11</font><font class="font10">个号码中选择</font><font class="font9">1</font><font class="font10">个号码，每注由</font><font class="font9">1</font><font class="font10">个号码组成，只要当期顺序摇出的第一位、第二位、第三位开奖号码中包含所选号码，即为中奖。</font></td>
            <td class="xl72" width="341">&nbsp; <font class="font10">如：选择</font><font class="font9">01</font><font class="font10">，开奖号码为</font><font class="font9">01   * * * *</font><font class="font10">，</font><font class="font9">* 01 * * *</font><font class="font10">，</font><font class="font9">* * 01 * *,</font><font class="font10">即为中奖。</font></td>
        </tr>
        <tr height="22" style="height:16.5pt">
            <td rowspan="3" height="66" class="xl70" style="text-align: center;"><font class="font10">定位胆</font></td>
            <td class="xl70" style="text-align: center;"><font class="font10">第一位</font></td>
            <td rowspan="3" class="xl75" width="397"><font class="font10">从第一位，第二位，第三位任意</font><font class="font9">1</font><font class="font10">个位置或多个位置上选择</font><font class="font9">1</font><font class="font10">个号码，所选号码与相同位置上的开奖号码一致，即为中奖。</font></td>
            <td class="xl71">&nbsp; <font class="font10">如：第一位上选择</font><font class="font9">01</font><font class="font10">，开奖号码为</font><font class="font9">01   * * * *</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="22" style="height:16.5pt">
            <td height="22" class="xl70" style="text-align: center;"><font class="font10">第二位</font></td>
            <td class="xl71">&nbsp; <font class="font10">如：第二位上选择</font><font class="font9">01</font><font class="font10">，开奖号码为</font><font class="font9">   * 01* * *</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="22" style="height:16.5pt">
            <td height="22" class="xl70" style="text-align: center;"><font class="font10">第三位</font></td>
            <td class="xl71">&nbsp; <font class="font10">如：第三位上选择</font><font class="font9">01</font><font class="font10">，开奖号码为</font><font class="font9">   * * 01 * *</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="44">
            <td rowspan="2" height="110" class="xl70" style="text-align: center;"><font class="font10">趣味性</font></td>
            <td class="xl70" style="text-align: center;"><font class="font10">定单双</font></td>
            <td class="xl71"><font class="font10">从</font><font class="font9">5</font><font class="font10">种单双个数组合中选择</font><font class="font9">1</font><font class="font10">种组合，当期开奖号码的单双个数与所选单双组合一致，即为中奖。</font></td>
            <td class="xl71">&nbsp; <font class="font10">如：选择</font><font class="font9">5</font><font class="font10">单</font><font class="font9">0</font><font class="font10">双，开奖号码</font><font class="font9">01</font><font class="font10">，</font><font class="font9">03</font><font class="font10">，</font><font class="font9">05</font><font class="font10">，</font><font class="font9">07</font><font class="font10">，</font><font class="font9">09</font><font class="font10">五个单数，即为中奖。</font></td>
        </tr>
        <tr height="66">
            <td height="66" class="xl70" style="text-align: center;"><font class="font10">猜中位</font></td>
            <td class="xl71"><font class="font10">从</font><font class="font9">3-9</font><font class="font10">中选择</font><font class="font9">1</font><font class="font10">个号码进行购买，所选号码与</font><font class="font9">5</font><font class="font10">个开奖号码按照大小顺序排列后的第</font><font class="font9">3</font><font class="font10">个号码相同，即为中奖。</font></td>
            <td class="xl71">&nbsp; <font class="font10">如：选择</font><font class="font9">8</font><font class="font10">，开奖号码为</font><font class="font9">11</font><font class="font10">，</font><font class="font9">04</font><font class="font10">，</font><font class="font9">09</font><font class="font10">，</font><font class="font9">05</font><font class="font10">，</font><font class="font9">08</font><font class="font10">，按开奖号码的数字大小排列为</font><font class="font9">04</font><font class="font10">，</font><font class="font9">05</font><font class="font10">，</font><font class="font9">08</font><font class="font10">，</font><font class="font9">09</font><font class="font10">，</font><font class="font9">11</font><font class="font10">，中间数</font><font class="font9">08</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="44">
            <td rowspan="8" height="352" class="xl70" style="text-align: center;"><font class="font10">任选</font></td>
            <td class="xl70" style="text-align: center;"><font class="font10">任选一中一</font></td>
            <td class="xl71"><font class="font10">从</font><font class="font9">01-11</font><font class="font10">共</font><font class="font9">11</font><font class="font10">个号码中选择</font><font class="font9">1</font><font class="font10">个号码进行购买，只要当期顺序摇出的</font><font class="font9">5</font><font class="font10">个开奖号码中包含所选号码，即为中奖。</font></td>
            <td class="xl73">&nbsp; <font class="font10">如：选择</font><font class="font9">05</font><font class="font10">，开奖号码为</font><font class="font9">08   04 11 05 03</font><font class="font10">，即为中奖</font></td>
        </tr>
        <tr height="44">
            <td height="44" class="xl70" style="text-align: center;"><font class="font10">任选二中二</font></td>
            <td class="xl71"><font class="font10">从</font><font class="font9">01-11</font><font class="font10">共</font><font class="font9">11</font><font class="font10">个号码中选择</font><font class="font9">2</font><font class="font10">个号码进行购买，只要当期顺序摇出的</font><font class="font9">5</font><font class="font10">个开奖号码中包含所选号码，即为中奖。</font></td>
            <td class="xl71">&nbsp; <font class="font10">如：选择</font><font class="font9">05 04</font><font class="font10">，开奖号码为</font><font class="font9">08 04 11 05 03</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="44">
            <td height="44" class="xl70" style="text-align: center;"><font class="font10">任选三中三</font></td>
            <td class="xl71"><font class="font10">从</font><font class="font9">01-11</font><font class="font10">共</font><font class="font9">11</font><font class="font10">个号码中选择</font><font class="font9">3</font><font class="font10">个号码进行购买，只要当期顺序摇出的</font><font class="font9">5</font><font class="font10">个开奖号码中包含所选号码，即为中奖。</font></td>
            <td class="xl71">&nbsp; <font class="font10">如：选择</font><font class="font9">05 04 11</font><font class="font10">，开奖号码为</font><font class="font9">08 04 11 05 03</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="44">
            <td height="44" class="xl70" style="text-align: center;"><font class="font10">任选四中四</font></td>
            <td class="xl71"><font class="font10">从</font><font class="font9">01-11</font><font class="font10">共</font><font class="font9">11</font><font class="font10">个号码中选择</font><font class="font9">4</font><font class="font10">个号码进行购买，只要当期顺序摇出的</font><font class="font9">5</font><font class="font10">个开奖号码中包含所选号码，即为中奖。</font></td>
            <td class="xl71">&nbsp; <font class="font10">如：选择</font><font class="font9">05 04 08 03</font><font class="font10">，开奖号码为</font><font class="font9">08 04 11 05 03</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="44">
            <td height="44" class="xl70" style="text-align: center;"><font class="font10">任选五中五</font></td>
            <td class="xl71"><font class="font10">从</font><font class="font9">01-11</font><font class="font10">共</font><font class="font9">11</font><font class="font10">个号码中选择</font><font class="font9">5</font><font class="font10">个号码进行购买，只要当期顺序摇出的</font><font class="font9">5</font><font class="font10">个开奖号码中包含所选号码，即为中奖。</font></td>
            <td class="xl71">&nbsp; <font class="font10">如：选择</font><font class="font9">05 04 11 03 08</font><font class="font10">，开奖号码为</font><font class="font9">08 04 11 05 03</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="44">
            <td height="44" class="xl70" style="text-align: center;"><font class="font10">任选六中五</font></td>
            <td class="xl71"><font class="font10">从</font><font class="font9">01-11</font><font class="font10">共</font><font class="font9">11</font><font class="font10">个号码中选择</font><font class="font9">6</font><font class="font10">个号码进行购买，只要当期顺序摇出的</font><font class="font9">5</font><font class="font10">个开奖号码中包含所选号码，即为中奖。</font></td>
            <td class="xl71">&nbsp; <font class="font10">如：选择</font><font class="font9">05 10 04 11 03 08</font><font class="font10">，开奖号码为</font><font class="font9">08 04 11 05 03</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="44">
            <td height="44" class="xl70" style="text-align: center;"><font class="font10">任选七中五</font><font class="font9">&nbsp;</font></td>
            <td class="xl71"><font class="font10">从</font><font class="font9">01-11</font><font class="font10">共</font><font class="font9">11</font><font class="font10">个号码中选择</font><font class="font9">7</font><font class="font10">个号码进行购买，只要当期顺序摇出的</font><font class="font9">5</font><font class="font10">个开奖号码中包含所选号码，即为中奖。</font></td>
            <td class="xl71">&nbsp; <font class="font10">如：选择</font><font class="font9">05 04 10 11 03 08 09</font><font class="font10">，开奖号码为</font><font class="font9">08 04 11 05 03</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="44">
            <td height="44" class="xl70" style="text-align: center;"><font class="font10">任选八中五</font></td>
            <td class="xl71"><font class="font10">从</font><font class="font9">01-11</font><font class="font10">共</font><font class="font9">11</font><font class="font10">个号码中选择</font><font class="font9">8</font><font class="font10">个号码进行购买，只要当期顺序摇出的</font><font class="font9">5</font><font class="font10">个开奖号码中包含所选号码，即为中奖。</font></td>
            <td class="xl71">&nbsp; <font class="font10">如：选择</font><font class="font9">05 04 11 03 08 10 09 01</font><font class="font10">，开奖号码为</font><font class="font9">08 04 11 05 03</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="66">
            <td rowspan="7" height="462" class="xl70" style="text-align: center;"><font class="font10">任选胆拖</font></td>
            <td class="xl70" style="text-align: center;"><font class="font10">任选二中二</font></td>
            <td class="xl71"><font class="font10">分别从胆码和拖码的</font><font class="font9">01-11</font><font class="font10">中，至少选择</font><font class="font9">1</font><font class="font10">个胆码和</font><font class="font9">1</font><font class="font10">个拖码组成一注，只要当期顺序摇出的</font><font class="font9">5</font><font class="font10">个开奖号码中同时包含所选的</font><font class="font9">1</font><font class="font10">个胆码和</font><font class="font9">1</font><font class="font10">个拖码，即为中奖。</font></td>
            <td class="xl72" width="341">&nbsp; <font class="font10">如：选择胆码</font><font class="font9"> 08</font><font class="font10">，选择拖码</font><font class="font9">   06</font><font class="font10">，开奖号码为</font><font class="font9"> 06 08 11 09   02</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="66">
            <td height="66" class="xl70" style="text-align: center;"><font class="font10">任选三中三</font></td>
            <td class="xl71"><font class="font10">分别从胆码和拖码的</font><font class="font9">01-11</font><font class="font10">中，至少选择</font><font class="font9">1</font><font class="font10">个胆码和</font><font class="font9">2</font><font class="font10">个拖码组成一注，只要当期顺序摇出的</font><font class="font9">5</font><font class="font10">个开奖号码中同时包含所选的</font><font class="font9">1</font><font class="font10">个胆码和</font><font class="font9">2</font><font class="font10">个拖码，即为中奖。</font></td>
            <td class="xl72" width="341">&nbsp; <font class="font10">如：选择胆码</font><font class="font9"> 08</font><font class="font10">，选择拖码</font><font class="font9">   06 11</font><font class="font10">，开奖号码为</font><font class="font9"> 06 08 11   09 02</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="66">
            <td height="66" class="xl70" style="text-align: center;"><font class="font10">任选四中四</font></td>
            <td class="xl71"><font class="font10">分别从胆码和拖码的</font><font class="font9">01-11</font><font class="font10">中，至少选择</font><font class="font9">1</font><font class="font10">个胆码和</font><font class="font9">3</font><font class="font10">个拖码组成一注，只要当期顺序摇出的</font><font class="font9">5</font><font class="font10">个开奖号码中同时包含所选的</font><font class="font9">1</font><font class="font10">个胆码和</font><font class="font9">3</font><font class="font10">个拖码，即为中奖。</font></td>
            <td class="xl72" width="341">&nbsp; <font class="font10">如：选择胆码</font><font class="font9"> 08</font><font class="font10">，选择拖码</font><font class="font9">   06 09 11</font><font class="font10">，开奖号码为</font><font class="font9"> 06 08   11 09 02</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="66">
            <td height="66" class="xl70" style="text-align: center;"><font class="font10">任选五中五</font></td>
            <td class="xl71"><font class="font10">分别从胆码和拖码的</font><font class="font9">01-11</font><font class="font10">中，至少选择</font><font class="font9">1</font><font class="font10">个胆码和</font><font class="font9">4</font><font class="font10">个拖码组成一注，只要当期顺序摇出的</font><font class="font9">5</font><font class="font10">个开奖号码中同时包含所选的</font><font class="font9">1</font><font class="font10">个胆码和</font><font class="font9">4</font><font class="font10">个拖码，即为中奖。</font></td>
            <td class="xl72" width="341">&nbsp; <font class="font10">如：选择胆码</font><font class="font9"> 08</font><font class="font10">，选择拖码</font><font class="font9">   02 06 09 11</font><font class="font10">，开奖号码为</font><font class="font9">&nbsp; 06 08 11 09 02</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="66">
            <td height="66" class="xl70" style="text-align: center;"><font class="font10">任选六中五</font></td>
            <td class="xl71"><font class="font10">分别从胆码和拖码的</font><font class="font9">01-11</font><font class="font10">中，至少选择</font><font class="font9">1</font><font class="font10">个胆码和</font><font class="font9">5</font><font class="font10">个拖码组成一注，只要当期顺序摇出的</font><font class="font9">5</font><font class="font10">个开奖号码中同时包含所选的</font><font class="font9">1</font><font class="font10">个胆码和任意</font><font class="font9">4</font><font class="font10">个拖码，即为中奖。</font></td>
            <td class="xl72" width="341">&nbsp; <font class="font10">如：选择胆码</font><font class="font9"> 08</font><font class="font10">，选择拖码</font><font class="font9">   01 02 05 06 09 11</font><font class="font10">，开奖号码为</font><font class="font9">   06 08 11 09 02</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="66">
            <td height="66" class="xl70" style="text-align: center;"><font class="font10">任选七中五</font><font class="font9">&nbsp;</font></td>
            <td class="xl71"><font class="font10">分别从胆码和拖码的</font><font class="font9">01-11</font><font class="font10">中，至少选择</font><font class="font9">1</font><font class="font10">个胆码和</font><font class="font9">6</font><font class="font10">个拖码组成一注，只要当期顺序摇出的</font><font class="font9">5</font><font class="font10">个开奖号码中同时包含所选的</font><font class="font9">1</font><font class="font10">个胆码和任意</font><font class="font9">4</font><font class="font10">个拖码，即为中奖。</font></td>
            <td class="xl72" width="341">&nbsp; <font class="font10">如：选择胆码</font><font class="font9"> 08</font><font class="font10">，选择拖码</font><font class="font9">   01 02 05 06 07 09 11</font><font class="font10">，开奖号码为</font><font class="font9"> 06 08 11 09 02</font><font class="font10">，即为中奖。</font></td>
        </tr>
        <tr height="66">
            <td height="66" class="xl70" style="text-align: center;"><font class="font10">任选八中五</font></td>
            <td class="xl71"><font class="font10">分别从胆码和拖码的</font><font class="font9">01-11</font><font class="font10">中，至少选择</font><font class="font9">1</font><font class="font10">个胆码和</font><font class="font9">7</font><font class="font10">个拖码组成一注，只要当期顺序摇出的</font><font class="font9">5</font><font class="font10">个开奖号码中同时包含所选的</font><font class="font9">1</font><font class="font10">个胆码和任意</font><font class="font9">4</font><font class="font10">个拖码，即为中奖。</font></td>
            <td class="xl72" width="341">&nbsp; <font class="font10">如：选择胆码</font><font class="font9"> 08</font><font class="font10">，选择拖码</font><font class="font9">   01 02 03 05 06 07 09 11</font><font class="font10">，开奖号码为</font><font class="font9"> 06 08 11 09 02</font><font class="font10">，即为中奖。</font></td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p></li>
                        </ul>
                                                <ul id="content_28" class="news_list" style="display:none" >
                            <li><table border="0" cellpadding="3" cellspacing="1" width="100%">
    <tbody>
        <tr>
            <td colspan="4" class="title">上海时时乐</td>
        </tr>
        <tr>
            <th width="10%">玩法组</th>
            <th width="10%">玩法</th>
            <th>玩法说明</th>
            <th>中奖示例</th>
        </tr>
        <tr height="45" style="mso-height-source:userset;height:33.75pt">
            <td rowspan="3" height="139" class="xl65" style="height: 104.25pt; border-top-style: none; text-align: center; ">直选</td>
            <td class="xl66" style="border-top-style: none; border-left-style: none; text-align: center; ">直选复式</td>
            <td class="xl67" style="border-top:none;border-left:none">从百位、十位、个位中选择一个3位数号码组成一注，所选号码与开奖号码相同，且顺序一致，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：选择123，开奖号码为123，即为中奖。</td>
        </tr>
        <tr height="50" style="mso-height-source:userset;height:37.5pt">
            <td height="50" class="xl66" style="height: 37.5pt; border-top-style: none; border-left-style: none; text-align: center; ">直选单式</td>
            <td class="xl67" style="border-top:none;border-left:none">手动输入一个3位数号码组成一注，所选号码与开奖号码相同，且顺序一致，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：手动输入123，开奖号码为123，即为中奖。</td>
        </tr>
        <tr height="44" style="height:33.0pt">
            <td height="44" class="xl66" style="height: 33pt; border-top-style: none; border-left-style: none; text-align: center; ">直选和值</td>
            <td class="xl67" style="border-top:none;border-left:none">所选数值等于开奖号码的三个数字相加之和，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp;   如：选择6，开奖号码为123、141、114、006、060等任意一个和值为6的结果，即为中奖。</td>
        </tr>
        <tr height="67" style="mso-height-source:userset;height:50.25pt">
            <td rowspan="4" height="247" class="xl65" style="height: 185.25pt; border-top-style: none; text-align: center; ">组选</td>
            <td class="xl66" style="border-top-style: none; border-left-style: none; text-align: center; ">组三</td>
            <td class="xl67" style="border-top:none;border-left:none">从0-9中任意选择2个数字组成两注，所选号码与开奖号码相同，顺序不限，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：选择12（展开为122，212，221 和   112、121、211），开奖号码为212 或 121，即为中奖。</td>
        </tr>
        <tr height="72" style="mso-height-source:userset;height:54.0pt">
            <td height="72" class="xl66" style="height: 54pt; border-top-style: none; border-left-style: none; text-align: center; ">组六</td>
            <td class="xl67" style="border-top:none;border-left:none">从0-9中任意选择3个号码组成一注，所选号码与开奖号码相同，顺序不限，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp;   如：选择123（展开为123，132，231，213，312，321），开奖号码为321，即为中奖。</td>
        </tr>
        <tr height="46" style="mso-height-source:userset;height:34.5pt">
            <td height="46" class="xl66" style="height: 34.5pt; border-top-style: none; border-left-style: none; text-align: center; ">组选和值</td>
            <td class="xl67" style="border-top:none;border-left:none">所选数值等于开奖号码的三个数字相加之和，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：选择6，开奖号码为114中组三奖，开奖号码为015中组六奖。</td>
        </tr>
        <tr height="62" style="mso-height-source:userset;height:46.5pt">
            <td height="62" class="xl66" style="height: 46.5pt; border-top-style: none; border-left-style: none; text-align: center; ">混合组选</td>
            <td class="xl67" style="border-top:none;border-left:none">手动输入购买号码，3个数字为一注，开奖号码符合组三或组六均为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：选择123、455，开奖号码为321即中组六奖，开奖号码为545即中组三奖。</td>
        </tr>
        <tr height="48" style="mso-height-source:userset;height:36.0pt">
            <td height="48" class="xl65" style="height: 36pt; border-top-style: none; text-align: center; ">不定位</td>
            <td class="xl66" style="border-top-style: none; border-left-style: none; text-align: center; ">一码不定位</td>
            <td class="xl67" style="border-top:none;border-left:none">从0-9中选择1个号码，每注由1个号码组成，只要开奖结果中包含所选号码，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：选择一码不定位4，开出4**、*4*、**4即为中奖。</td>
        </tr>
        <tr height="49" style="mso-height-source:userset;height:36.75pt">
            <td rowspan="8" height="387" class="xl65" style="height: 290.25pt; border-top-style: none; text-align: center; ">二星</td>
            <td class="xl66" style="border-top-style: none; border-left-style: none; text-align: center; ">前二直选复式</td>
            <td class="xl67" style="border-top:none;border-left:none">从百位和十位上至少各选1个号码，所选号码与开奖号码百位、十位相同，且顺序一致，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：选择号码34，开出34*即为中奖。</td>
        </tr>
        <tr height="48" style="mso-height-source:userset;height:36.0pt">
            <td height="48" class="xl66" style="height: 36pt; border-top-style: none; border-left-style: none; text-align: center; ">前二直选单式</td>
            <td class="xl67" style="border-top:none;border-left:none">手动输入一个2位数号码组成一注，所选号码与开奖号码的百位、十位相同，且顺序一致，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：手动输入12，开奖号码为12*，即为中奖。</td>
        </tr>
        <tr height="48" style="mso-height-source:userset;height:36.0pt">
            <td height="48" class="xl66" style="height: 36pt; border-top-style: none; border-left-style: none; text-align: center; ">前二组选复式</td>
            <td class="xl67" style="border-top:none;border-left:none">从0-9中选2个号码组成一注，所选号码与开奖号码的百位、十位相同，顺序不限，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：百位选择7，十位选择8，开奖号码78*或87*即为中奖。</td>
        </tr>
        <tr height="49" style="mso-height-source:userset;height:36.75pt">
            <td height="49" class="xl66" style="height: 36.75pt; border-top-style: none; border-left-style: none; text-align: center; ">前二组选单式</td>
            <td class="xl67" style="border-top:none;border-left:none">手动输入购买号码，2个数字为一注，所选号码与开奖号码的百位、十位相同，顺序不限，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：手动输入12，开奖号码为21*或12*，即为中奖。</td>
        </tr>
        <tr height="50" style="mso-height-source:userset;height:37.5pt">
            <td height="50" class="xl66" style="height: 37.5pt; border-top-style: none; border-left-style: none; text-align: center; ">后二直选复式</td>
            <td class="xl67" style="border-top:none;border-left:none">从十位和个位上至少各选1个号码，所选号码与开奖号码的十位、个位相同，且顺序一致，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：选择号码34，开出*34即为中奖。</td>
        </tr>
        <tr height="47" style="mso-height-source:userset;height:35.25pt">
            <td height="47" class="xl66" style="height: 35.25pt; border-top-style: none; border-left-style: none; text-align: center; ">后二直选单式</td>
            <td class="xl67" style="border-top:none;border-left:none">手动输入一个2位数号码组成一注，所选号码与开奖号码的十位、个位相同，且顺序一致，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：手动输入12，开奖号码为*12，即为中奖。</td>
        </tr>
        <tr height="48" style="mso-height-source:userset;height:36.0pt">
            <td height="48" class="xl66" style="height: 36pt; border-top-style: none; border-left-style: none; text-align: center; ">后二组选复式</td>
            <td class="xl67" style="border-top:none;border-left:none">从0-9中选2个号码组成一注，所选号码与开奖号码的十位、个位相同，顺序不限，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：十位选择7，个位选择8，开奖号码*78或*87即为中奖。</td>
        </tr>
        <tr height="48" style="mso-height-source:userset;height:36.0pt">
            <td height="48" class="xl66" style="height: 36pt; border-top-style: none; border-left-style: none; text-align: center; ">后二组选单式</td>
            <td class="xl67" style="border-top:none;border-left:none">手动输入购买号码，2个数字为一注，所选号码与开奖号码的十位、个位相同，顺序不限，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：手动输入12，开奖号码为*21或者*12，即为中奖。</td>
        </tr>
        <tr height="44" style="mso-height-source:userset;height:33.0pt">
            <td rowspan="3" height="133" class="xl65" style="height: 99.75pt; border-top-style: none; text-align: center; ">定位胆</td>
            <td class="xl66" style="border-top-style: none; border-left-style: none; text-align: center; ">百位</td>
            <td rowspan="3" class="xl67" style="border-top:none">从百位、十位、个位任意1个位置或多个位置上选择1个号码，所选号码与相同位置上的开奖号码一致，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：定百位为3，开奖号码为3**即为中奖。</td>
        </tr>
        <tr height="44" style="mso-height-source:userset;height:33.0pt">
            <td height="44" class="xl66" style="height: 33pt; border-top-style: none; border-left-style: none; text-align: center; ">十位</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：定十位为4，开奖号码为*4*即为中奖。</td>
        </tr>
        <tr height="45" style="mso-height-source:userset;height:33.75pt">
            <td height="45" class="xl71" style="height: 33.75pt; border-top-style: none; border-left-style: none; text-align: center; ">个位</td>
            <td class="xl72" style="border-top:none;border-left:none">&nbsp; 如：定个位为5，开奖号码为**5即为中奖。</td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p></li>
                        </ul>
                                                <ul id="content_30" class="news_list" style="display:none" >
                            <li><table border="0" cellpadding="2" cellspacing="1" width="100%">
    <tbody>
        <tr>
            <td colspan="4" class="title">江苏快三</td>
        </tr>
        <tr>
            <th width="10%">玩法组</th>
            <th width="10%">玩法</th>
            <th>玩法说明</th>
            <th>中奖示例</th>
        </tr>
        <tr height="45">
            <td style="text-align: center; ">和值</td>
            <td style="text-align: center; ">和值</td>
            <td>是指对三个开奖号码的和值进行购买,和值从3到18，所选数值等于三个开奖号码的相加之和，即为中奖。</td>
            <td>&nbsp; 如：选择5，开奖号码为是113(和值为5)(顺序不限)，即为中奖。</td>
        </tr>
        <tr height="45">
            <td rowspan="2" style="text-align: center; ">三同号</td>
            <td style="text-align: center; ">通选</td>
            <td>是指对所有相同的三个号码(111、222、&hellip;、666)进行投注。</td>
            <td>&nbsp; 如：开奖号码为(111、222、&hellip;、666)(顺序不限)，即为中奖。</td>
        </tr>
        <tr height="45">
            <td style="text-align: center; ">单选</td>
            <td>是指从所有相同的三个号码(111、222、&hellip;、666)中任意选择一组号码进行投注。</td>
            <td>&nbsp;   如：选择111，开奖号码为111(顺序不限)，即为中奖。</td>
        </tr>
        <tr height="45">
            <td rowspan="2" style="text-align: center; ">二同号</td>
            <td style="text-align: center; ">复选</td>
            <td>是指对三个号码中两个指定的相同号码和一个任意号码进行投注。</td>
            <td>&nbsp; 如：选择11*，开奖号码为112,113,114,115,116(顺序不限)，即为中奖。</td>
        </tr>
        <tr height="45">
            <td style="text-align: center; ">单选</td>
            <td>是指对三个号码中两个指定的相同号码和一个指定的不同号码进行投注。</td>
            <td>&nbsp;   如：选择112，开奖号码为112(顺序不限)，即为中奖。</td>
        </tr>
        <tr height="45">
            <td rowspan="4" style="text-align: center; ">三不同号</td>
            <td style="text-align: center; ">标准选号</td>
            <td>是指对三个各不相同的号码进行投注。</td>
            <td>&nbsp; 如：选择123，开奖号码为123(顺序不限)，即为中奖。</td>
        </tr>
        <tr height="45">
            <td style="text-align: center; ">单式选号</td>
            <td>是指对三个各不相同的号码进行投注。</td>
            <td>&nbsp;   如：选择123，开奖号码为123(顺序不限)，即为中奖。</td>
        </tr>
        <tr height="45">
            <td style="text-align: center; ">胆拖选号</td>
            <td>是指对三个各不相同的号码进行投注。</td>
            <td>&nbsp;   如：选择123，开奖号码为123(顺序不限)，即为中奖。</td>
        </tr>
        <tr height="45">
            <td style="text-align: center; ">和值选号</td>
            <td>是指对三个各不相同的号码和值进行投注。</td>
            <td>&nbsp;   如：选择10，开奖号码为136或者235或者145限)，即为中奖。</td>
        </tr>
        <tr height="45">
            <td rowspan="3" style="text-align: center; ">二不同号</td>
            <td style="text-align: center; ">标准选号</td>
            <td>是指对三个号码中两个指定的不同号码和一个任意号码进行投注。</td>
            <td>&nbsp; 如：选择12，开奖号码为12*(顺序不限)，即为中奖。</td>
        </tr>
        <tr height="45">
            <td style="text-align: center; ">单式选号</td>
            <td>是指对三个号码中两个指定的不同号码和一个任意号码进行投注。</td>
            <td>&nbsp;&nbsp;如：选择12，开奖号码为12*(顺序不限)，即为中奖。</td>
        </tr>
        <tr height="45">
            <td style="text-align: center; ">胆拖选号</td>
            <td>是指对三个号码中两个指定的不同号码和一个任意号码进行投注。</td>
            <td>&nbsp;&nbsp;如：选择12，开奖号码为12*(顺序不限)，即为中奖。</td>
        </tr>
        <tr height="45">
            <td style="text-align: center; ">三连号通选</td>
            <td style="text-align: center; ">三连号通选</td>
            <td>是指对所有三个相连的号码(仅限：123、234、345、456)进行投注。</td>
            <td>&nbsp; 如：开奖号码为123,234,345,456(顺序不限)，即为中奖。</td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p></li>
                        </ul>
                                                <ul id="content_31" class="news_list" style="display:none" >
                            <li><table border="0" cellpadding="3" cellspacing="1" width="100%">
    <tbody>
        <tr>
            <td colspan="4" class="title">北京快乐八</td>
        </tr>
        <tr>
            <th width="10%">玩法组</th>
            <th width="10%">玩法</th>
            <th>玩法说明</th>
            <th>中奖示例</th>
        </tr>
        <tr height="45" style="mso-height-source:userset;height:33.75pt">
            <td rowspan="7" height="139" class="xl65" style="height: 104.25pt; border-top-style: none; text-align: center; ">任选型</td>
            <td class="xl66" style="border-top-style: none; border-left-style: none; text-align: center; ">任选一</td>
            <td class="xl67" style="border-top:none;border-left:none">从01-80中任选1个以上号码。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 从01-80中任选1个以上号码,开奖号码中至少有一个号码与选择号码相同即中奖。</td>
        </tr>
        <tr height="50" style="mso-height-source:userset;height:37.5pt">
            <td height="50" class="xl66" style="height: 37.5pt; border-top-style: none; border-left-style: none; text-align: center; ">任选二</td>
            <td class="xl67" style="border-top:none;border-left:none">从01-80中任选2至8个号码。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 从01-80中任选2个以上号码,开奖号码中至少有两个号码与选择号码相同即中奖。</td>
        </tr>
        <tr height="44" style="height:33.0pt">
            <td height="44" class="xl66" style="height: 33pt; border-top-style: none; border-left-style: none; text-align: center; ">任选三</td>
            <td class="xl67" style="border-top:none;border-left:none">从01-80中任选3至8个号码。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp;  从01-80中任选3个以上号码,开奖号码中至少有两个号码与选择号码相同即中奖。</td>
        </tr>
        <tr height="44" style="height:33.0pt">
            <td height="44" class="xl66" style="height: 33pt; border-top-style: none; border-left-style: none; text-align: center; ">任选四</td>
            <td class="xl67" style="border-top:none;border-left:none">从01-80中任选4至8个号码。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp;  从01-80中任选4个以上号码,开奖号码中至少有两个号码与选择号码相同即中奖。</td>
        </tr>
        <tr height="44" style="height:33.0pt">
            <td height="44" class="xl66" style="height: 33pt; border-top-style: none; border-left-style: none; text-align: center; ">任选五</td>
            <td class="xl67" style="border-top:none;border-left:none">从01-80中任选5至8个号码。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp;  从01-80中任选5个以上号码,开奖号码中至少有三个号码与选择号码相同即中奖。</td>
        </tr>
        <tr height="44" style="height:33.0pt">
            <td height="44" class="xl66" style="height: 33pt; border-top-style: none; border-left-style: none; text-align: center; ">任选六</td>
            <td class="xl67" style="border-top:none;border-left:none">从01-80中任选6至8个号码。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp;  从01-80中任选6个以上号码,开奖号码中至少有三个号码与选择号码相同即中奖。</td>
        </tr>
        <tr height="44" style="height:33.0pt">
            <td height="44" class="xl66" style="height: 33pt; border-top-style: none; border-left-style: none; text-align: center; ">任选七</td>
            <td class="xl67" style="border-top:none;border-left:none">从01-80中任选7或8个号码。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp;  从01-80中任选7个以上号码,开奖号码中至少有四个号码与选择号码相同或者所有号码都不相同即为中奖。</td>
        </tr>
        <tr height="45" style="mso-height-source:userset;height:33.75pt">
            <td rowspan="3" height="139" class="xl65" style="height: 104.25pt; border-top-style: none; text-align: center; ">趣味型</td>
            <td class="xl66" style="border-top-style: none; border-left-style: none; text-align: center; ">上下盘</td>
            <td class="xl67" style="border-top:none;border-left:none">选择20个开奖号码中包含&ldquo;上盘(01-40)&rdquo;与&ldquo;下盘(41-80)&rdquo;号码个数多少关系。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 选择20个开奖号码中包含&ldquo;上盘(01-40)&rdquo;与&ldquo;下盘(41-80)&rdquo;号码个数多少关系<span style="color: rgb(255, 0, 0);">(上盘号码个数&gt;下盘号码个数则为上盘，上盘号码个数&lt;下盘号码个数则为下盘，上盘号码个数=下盘号码个数则为中盘)</span>，如果开奖号码属性与选择属性相同即中奖。</td>
        </tr>
        <tr height="44" style="height:33.0pt">
            <td height="44" class="xl66" style="height: 33pt; border-top-style: none; border-left-style: none; text-align: center; ">奇偶盘</td>
            <td class="xl67" style="border-top:none;border-left:none">选择20个开奖号码中包含&ldquo;奇&middot;偶&rdquo;号码个数多少关系。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; &nbsp;选择20个开奖号码中包含&ldquo;奇&middot;偶&rdquo;号码个数多少关系<span style="color: rgb(255, 0, 0);">(奇数&gt;偶数则为奇盘，奇数&lt;偶数则为偶盘，奇数=偶数则为和盘)</span>，如果开奖号码属性与选择属性相同即中奖。</td>
        </tr>
        <tr height="44" style="height:33.0pt">
            <td height="44" class="xl66" style="height: 33pt; border-top-style: none; border-left-style: none; text-align: center; ">和值大小单双</td>
            <td class="xl67" style="border-top:none;border-left:none">选择20个开奖号码总和值的&ldquo;大小单双&rdquo;属性组合。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp;  选择20个开奖号码总和值的&ldquo;大小单双&rdquo;属性组合<span style="color: rgb(255, 0, 0);">(总和值小于或等于810属于小，大于810属于大)</span>，如果开奖号码属性组合与选择属性组合相同即中奖。</td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p></li>
                        </ul>
                                                <ul id="content_29" class="news_list" style="display:none" >
                            <li><table width="100%" border="0" cellspacing="1" cellpadding="3">
    <tbody>
        <tr>
            <td class="title" colspan="4">排列三、五</td>
        </tr>
        <tr>
            <th width="10%">玩法组</th>
            <th width="10%">玩法</th>
            <th>玩法说明</th>
            <th>中奖示例</th>
        </tr>
        <tr height="45" style="height: 33.75pt; mso-height-source: userset;">
            <td height="139" class="xl70" rowspan="3" style="height: 104.25pt; text-align: center; border-top-style: none;">直选</td>
            <td class="xl70" style="text-align: center; border-top-style: none; border-left-style: none;">排三直选复式</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">从万位、千位、百位中选择一个3位数号码组成一注，所选号码与开奖号码相同，且顺序一致，即为中奖。</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp; 如：选择123，开奖号码为123**，即为中奖。</td>
        </tr>
        <tr height="50" style="height: 37.5pt; mso-height-source: userset;">
            <td height="50" class="xl70" style="height: 37.5pt; text-align: center; border-top-style: none; border-left-style: none;">排三直选单式</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">手动输入一个3位数号码组成一注，所选号码与开奖号码的万位、千位、百位相同，且顺序一致，即为中奖。</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp; 如：手动输入123，开奖号码为123**，即为中奖。</td>
        </tr>
        <tr height="44" style="height: 33pt;">
            <td height="44" class="xl70" style="height: 33pt; text-align: center; border-top-style: none; border-left-style: none;">排三直选和值</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">所选数值等于开奖号码的万位、千位、百位三个数字相加之和，即为中奖。</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp;   如：选择6，开奖号码为123**、141**、114**、006**、060**等任意一个和值为6的结果，即为中奖。</td>
        </tr>
        <tr height="67" style="height: 50.25pt; mso-height-source: userset;">
            <td height="247" class="xl70" rowspan="4" style="height: 185.25pt; text-align: center; border-top-style: none;">组选</td>
            <td class="xl70" style="text-align: center; border-top-style: none; border-left-style: none;">排三组三</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">从0-9中任意选择2个号码组成两注，所选号码与开奖号码的万位、千位、百位相同，顺序不限，即为中奖。</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp; 如：选择12（展开为122，212，221 和   112、121、211），开奖号码为212** 或121**，即为中奖。</td>
        </tr>
        <tr height="72" style="height: 54pt; mso-height-source: userset;">
            <td height="72" class="xl70" style="height: 54pt; text-align: center; border-top-style: none; border-left-style: none;">排三组六</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">从0-9中任意选择3个号码组成一注，所选号码与开奖号码的万位、千位、百位相同，顺序不限，即为中奖。</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp;   如：选择123（展开为123，132，231，213，312，321），开奖号码为321**，即为中奖。</td>
        </tr>
        <tr height="46" style="height: 34.5pt; mso-height-source: userset;">
            <td height="46" class="xl70" style="height: 34.5pt; text-align: center; border-top-style: none; border-left-style: none;">排三组选和值</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">所选数值等于开奖号码的的万位、千位、百位三个数字相加之和（非豹子号），即为中奖。</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp; 如：选择6，开奖号码为114中组三奖，开奖号码为015**中组六奖。</td>
        </tr>
        <tr height="62" style="height: 46.5pt; mso-height-source: userset;">
            <td height="62" class="xl70" style="height: 46.5pt; text-align: center; border-top-style: none; border-left-style: none;">排三混合组选</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">手动输入购买号码，3个号码为一注，开奖号码的万位、千位、百位符合组三或组六均为中奖。</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp;   如：选择123、455，开奖号码为321**即中组六奖，开奖号码为545**，即中组三奖。</td>
        </tr>
        <tr height="48" style="height: 36pt; mso-height-source: userset;">
            <td height="114" class="xl67" rowspan="2" style="text-align: center; border-top-style: none;">不定位</td>
            <td class="xl70" style="text-align: center; border-top-style: none; border-left-style: none;">一码不定位</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">从0-9中选择1个号码，每注由1个号码组成，只要开奖号码的万位、千位、百位中包含所选号码，即为中奖。</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp; 如：选择一码不定位4，开出**4**、***4*、****4，即为中奖。</td>
        </tr>
        <tr height="66" style="height: 49.5pt;">
            <td height="66" class="xl70" style="height: 49.5pt; text-align: center; border-top-style: none; border-left-style: none;">二码不定位</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">从0-9中选择2个号码，每注由2个号码组成，只要开奖号码的万位、千位、百位中包含所选2个号码，即为中奖。</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp; &nbsp; 如：选择二码不定位45，开出**45*、**54*、**5*4、**4*5、***54、***45、即为中奖。</td>
        </tr>
        <tr height="49" style="height: 36.75pt; mso-height-source: userset;">
            <td height="387" class="xl70" rowspan="8" style="height: 290.25pt; text-align: center; border-top-style: none;">二星</td>
            <td width="122" class="xl83" style="text-align: center; border-top-style: none; border-left-style: none;">（前二）<br />
            排五直选复式</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">从万位和千位上至少各选1个号码，所选号码与开奖号码万位、千位相同，且顺序一致，即为中奖。</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp; 如：选择号码34，开出34***，即为中奖。</td>
        </tr>
        <tr height="48" style="height: 36pt; mso-height-source: userset;">
            <td width="122" height="48" class="xl83" style="height: 36pt; text-align: center; border-top-style: none; border-left-style: none;">（前二）<br />
            排五直选单式</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">手动输入一个2位数号码组成一注，所选号码与开奖号码的万位、千位相同，且顺序一致，即为中奖。</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp; 如：手动输入12，开奖号码为12***，即为中奖。</td>
        </tr>
        <tr height="48" style="height: 36pt; mso-height-source: userset;">
            <td width="122" height="48" class="xl83" style="height: 36pt; text-align: center; border-top-style: none; border-left-style: none;">（前二）<br />
            排五组选复式</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">从0-9中选2个号码组成一注，所选号码与开奖号码的万位、千位相同，顺序不限，即为中奖。</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp; 如：万位选择7，千位选择8，开奖号码78***或87***，即为中奖。</td>
        </tr>
        <tr height="49" style="height: 36.75pt; mso-height-source: userset;">
            <td width="122" height="49" class="xl83" style="height: 36.75pt; text-align: center; border-top-style: none; border-left-style: none;">（前二）<br />
            排五组选单式</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">手动输入购买号码，2个号码为一注，所选号码与开奖号码的万位、千位相同，顺序不限，即为中奖。</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp; 如：手动输入12，开奖号码为21***或12***，即为中奖。</td>
        </tr>
        <tr height="50" style="height: 37.5pt; mso-height-source: userset;">
            <td width="122" height="50" class="xl83" style="height: 37.5pt; text-align: center; border-top-style: none; border-left-style: none;">（后二）<br />
            排五直选复式</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">从十位和个位上至少各选1个号码，所选号码与开奖号码的十位、个位相同，且顺序一致，即为中奖。</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp; 如：选择号码34，开出***34，即为中奖。</td>
        </tr>
        <tr height="47" style="height: 35.25pt; mso-height-source: userset;">
            <td width="122" height="47" class="xl83" style="height: 35.25pt; text-align: center; border-top-style: none; border-left-style: none;">（后二）<br />
            排五直选单式</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">手动输入一个2位数号码组成一注，所选号码与开奖号码的十位、个位相同，且顺序一致，即为中奖。</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp; 如：手动输入12，开奖号码为***12，即为中奖。</td>
        </tr>
        <tr height="48" style="height: 36pt; mso-height-source: userset;">
            <td width="122" height="48" class="xl83" style="height: 36pt; text-align: center; border-top-style: none; border-left-style: none;">（后二）<br />
            排五组选复式</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">从0-9中选2个号码组成一注，所选号码与开奖号码的十位、个位相同，顺序不限，即为中奖。</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp; 如：十位选择7，个位选择8，开奖号码***78或***87，即为中奖。</td>
        </tr>
        <tr height="48" style="height: 36pt; mso-height-source: userset;">
            <td width="122" height="48" class="xl83" style="height: 36pt; text-align: center; border-top-style: none; border-left-style: none;">（后二）<br />
            排五组选单式</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">手动输入购买号码，2个号码为一注，所选号码与开奖号码的十位、个位相同，顺序不限，即为中奖。</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp; 如：手动输入12，开奖号码为***21或者***12，即为中奖。</td>
        </tr>
        <tr height="48" style="height: 36pt; mso-height-source: userset;">
            <td height="229" class="xl67" rowspan="5" style="text-align: center; border-top-style: none;">定位胆</td>
            <td width="122" class="xl83" style="text-align: center; border-top-style: none; border-left-style: none;">万位</td>
            <td width="370" class="xl85" rowspan="5" style="border-top-color: currentColor; border-bottom-color: black; border-top-width: medium; border-bottom-width: 0.5pt; border-top-style: none; border-bottom-style: solid;">从万位、千位、百位、十位、个位任意1个位置或多个位置上选择1个号码，所选号码与相同位置上的开奖号码一致，即为中奖。</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp; 如：定万位为1，开奖号码为1****，即为中奖。</td>
        </tr>
        <tr height="48" style="height: 36pt; mso-height-source: userset;">
            <td width="122" height="48" class="xl83" style="height: 36pt; text-align: center; border-top-style: none; border-left-style: none;">千位</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp; 如：定千位为2，开奖号码为*2***，即为中奖。</td>
        </tr>
        <tr height="44" style="height: 33pt; mso-height-source: userset;">
            <td height="44" class="xl70" style="height: 33pt; text-align: center; border-top-style: none; border-left-style: none;">百位</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp; 如：定百位为3，开奖号码为**3**，即为中奖。</td>
        </tr>
        <tr height="44" style="height: 33pt; mso-height-source: userset;">
            <td height="44" class="xl70" style="height: 33pt; text-align: center; border-top-style: none; border-left-style: none;">十位</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp; 如：定十位为4，开奖号码为***4*，即为中奖。</td>
        </tr>
        <tr height="45" style="height: 33.75pt; mso-height-source: userset;">
            <td height="45" class="xl67" style="height: 33.75pt; text-align: center; border-top-style: none; border-left-style: none;">个位</td>
            <td class="xl65" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp; 如：定个位为5，开奖号码为****5，即为中奖。</td>
        </tr>
        <tr height="66" style="height: 49.5pt;">
            <td height="132" class="xl81" rowspan="2" style="text-align: center; border-top-style: none;">大小单双</td>
            <td class="xl70" style="text-align: center;">前二大小单双</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">对万位、千位的&ldquo;大（56789）小（01234）、单（13579）双（02468）&rdquo;形态进行购买，所选号码的位置、形态与开奖号码的位置、形态相同，即为中奖。</td>
            <td class="xl65" style="border-left-color: currentColor; border-left-width: medium; border-left-style: none;">&nbsp;   如：选择前二大小单双&ldquo;大单&rdquo;，开奖号码万位与千位为&ldquo;大单&rdquo;，即为中奖。</td>
        </tr>
        <tr height="66" style="height: 49.5pt;">
            <td height="66" class="xl70" style="height: 49.5pt; text-align: center; border-top-style: none;">后二大小单双</td>
            <td class="xl68" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">对十位、个位的&ldquo;大（56789）小（01234）、单（13579）双（02468）&rdquo;形态进行购买，所选号码的位置、形态与开奖号码的位置、形态相同，即为中奖。</td>
            <td class="xl65" style="border-left-color: currentColor; border-left-width: medium; border-left-style: none;">&nbsp;   如：选择后二大小单双&ldquo;小双&rdquo;，开奖号码十位与个位为&ldquo;小双&rdquo;，即为中奖。</td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p></li>
                        </ul>
                                                <ul id="content_14" class="news_list" style="display:none" >
                            <li><table border="0" cellpadding="3" cellspacing="1" width="100%">
    <tbody>
        <tr>
            <td colspan="4" class="title">3D</td>
        </tr>
        <tr>
            <th width="10%">玩法组</th>
            <th width="10%">玩法</th>
            <th>玩法说明</th>
            <th>中奖示例</th>
        </tr>
        <tr height="45" style="mso-height-source:userset;height:33.75pt">
            <td rowspan="3" height="139" class="xl72" style="height: 104.25pt; border-top-style: none; text-align: center; ">直选</td>
            <td class="xl68" style="border-top-style: none; border-left-style: none; text-align: center; ">直选复式</td>
            <td class="xl67" style="border-top:none;border-left:none">从百位、十位、个位中选择一个3位数号码组成一注，所选号码与开奖号码相同，且顺序一致，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：选择123，开奖号码为是123，即为中奖。</td>
        </tr>
        <tr height="50" style="mso-height-source:userset;height:37.5pt">
            <td height="50" class="xl68" style="height: 37.5pt; border-top-style: none; border-left-style: none; text-align: center; ">直选单式</td>
            <td class="xl67" style="border-top:none;border-left:none">手动输入一个3位数号码组成一注，所选号码与开奖号码相同，且顺序一致，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：手动输入123，开奖号码为是123，即为中奖。</td>
        </tr>
        <tr height="44" style="height:33.0pt">
            <td height="44" class="xl68" style="height: 33pt; border-top-style: none; border-left-style: none; text-align: center; ">直选和值</td>
            <td class="xl67" style="border-top:none;border-left:none">所选数值等于开奖号码的三个数字相加之和，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp;   如：选择6，开奖号码为123、141、114、006、060等任意一个和值为6的结果，即为中奖。</td>
        </tr>
        <tr height="67" style="mso-height-source:userset;height:50.25pt">
            <td rowspan="4" height="247" class="xl72" style="height: 185.25pt; border-top-style: none; text-align: center; ">组选</td>
            <td class="xl68" style="border-top-style: none; border-left-style: none; text-align: center; ">组三</td>
            <td class="xl67" style="border-top:none;border-left:none">从0-9中任意选择2个数字组成两注，所选号码与开奖号码相同，顺序不限，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：选择12（展开为122，212，221 和   112、121、211），开奖号码为212 或 121，即为中奖。</td>
        </tr>
        <tr height="72" style="mso-height-source:userset;height:54.0pt">
            <td height="72" class="xl68" style="height: 54pt; border-top-style: none; border-left-style: none; text-align: center; ">组六</td>
            <td class="xl67" style="border-top:none;border-left:none">从0-9中任意选择3个号码组成一注，所选号码与开奖号码相同，顺序不限，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp;   如：选择123（展开为123，132，231，213，312，321），开奖号码为321，即为中奖。</td>
        </tr>
        <tr height="46" style="mso-height-source:userset;height:34.5pt">
            <td height="46" class="xl68" style="height: 34.5pt; border-top-style: none; border-left-style: none; text-align: center; ">组选和值</td>
            <td class="xl67" style="border-top:none;border-left:none">所选数值等于开奖号码的三个数字相加之和，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：选择6，开奖号码为114中组三奖，开奖号码为015中组六奖。</td>
        </tr>
        <tr height="62" style="mso-height-source:userset;height:46.5pt">
            <td height="62" class="xl68" style="height: 46.5pt; border-top-style: none; border-left-style: none; text-align: center; ">混合组选</td>
            <td class="xl67" style="border-top:none;border-left:none">手动输入购买号码，3个数字为一注，开奖号码符合组三或组六均为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：选择123、455，开奖号码为321即中组六奖，开奖号码为545即中组三奖。</td>
        </tr>
        <tr height="48" style="mso-height-source:userset;height:36.0pt">
            <td rowspan="2" height="96" class="xl73" style="border-bottom-width: 0.5pt; border-bottom-style: solid; border-bottom-color: black; height: 72pt; border-top-style: none; text-align: center; ">不定位</td>
            <td class="xl68" style="border-top-style: none; border-left-style: none; text-align: center; ">一码不定位</td>
            <td class="xl67" style="border-top:none;border-left:none">从0-9中选择1个号码，每注由1个号码组成，只要开奖结果中包含所选号码，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：选择一码不定位4，开出4**、*4*、**4，即为中奖。</td>
        </tr>
        <tr height="48" style="mso-height-source:userset;height:36.0pt">
            <td height="48" class="xl68" style="height: 36pt; border-top-style: none; border-left-style: none; text-align: center; ">二码不定位</td>
            <td class="xl67" style="border-top:none;border-left:none">从0-9中选择2个号码，每注由2个号码组成，只要开奖结果中包含所选2个号码，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：选择一码不定位45，开出45*、54*、*54、*45、5*4、4*5，即为中奖。</td>
        </tr>
        <tr height="49" style="mso-height-source:userset;height:36.75pt">
            <td rowspan="8" height="387" class="xl72" style="height: 290.25pt; border-top-style: none; text-align: center; ">二星</td>
            <td class="xl68" style="border-top-style: none; border-left-style: none; text-align: center; ">前二直选复式</td>
            <td class="xl67" style="border-top:none;border-left:none">从百位和十位上至少各选1个号码，所选号码与开奖号码百位、十位相同，且顺序一致，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：选择号码34，开出34*即为中奖。</td>
        </tr>
        <tr height="48" style="mso-height-source:userset;height:36.0pt">
            <td height="48" class="xl68" style="height: 36pt; border-top-style: none; border-left-style: none; text-align: center; ">前二直选单式</td>
            <td class="xl67" style="border-top:none;border-left:none">手动输入一个2位数号码组成一注，所选号码与开奖号码的百位、十位相同，且顺序一致，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：手动输入12，开奖号码为是12*，即为中奖。</td>
        </tr>
        <tr height="48" style="mso-height-source:userset;height:36.0pt">
            <td height="48" class="xl68" style="height: 36pt; border-top-style: none; border-left-style: none; text-align: center; ">前二组选复式</td>
            <td class="xl67" style="border-top:none;border-left:none">从0-9中选2个号码组成一注，所选号码与开奖号码的百位、十位相同，顺序不限，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：百位选择7，十位选择8，开奖号码78*或87*，即为中奖。</td>
        </tr>
        <tr height="49" style="mso-height-source:userset;height:36.75pt">
            <td height="49" class="xl68" style="height: 36.75pt; border-top-style: none; border-left-style: none; text-align: center; ">前二组选单式</td>
            <td class="xl67" style="border-top:none;border-left:none">手动输入购买号码，2个数字为一注，所选号码与开奖号码的百位、十位相同，顺序不限，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：手动输入12，开奖号码为是21*或12*，即为中奖。</td>
        </tr>
        <tr height="50" style="mso-height-source:userset;height:37.5pt">
            <td height="50" class="xl68" style="height: 37.5pt; border-top-style: none; border-left-style: none; text-align: center; ">后二直选复式</td>
            <td class="xl67" style="border-top:none;border-left:none">从十位和个位上至少各选1个号码，所选号码与开奖号码的十位、个位相同，且顺序一致，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：选择号码34，开出*34，即为中奖。</td>
        </tr>
        <tr height="47" style="mso-height-source:userset;height:35.25pt">
            <td height="47" class="xl68" style="height: 35.25pt; border-top-style: none; border-left-style: none; text-align: center; ">后二直选单式</td>
            <td class="xl67" style="border-top:none;border-left:none">手动输入一个2位数号码组成一注，所选号码与开奖号码的十位、个位相同，且顺序一致，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：手动输入12，开奖号码为是*12，即为中奖。</td>
        </tr>
        <tr height="48" style="mso-height-source:userset;height:36.0pt">
            <td height="48" class="xl68" style="height: 36pt; border-top-style: none; border-left-style: none; text-align: center; ">后二组选复式</td>
            <td class="xl67" style="border-top:none;border-left:none">从0-9中选2个号码组成一注，所选号码与开奖号码的十位、个位相同，顺序不限，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：十位选择7，个位选择8，开奖号码*78或*87，即为中奖。</td>
        </tr>
        <tr height="48" style="mso-height-source:userset;height:36.0pt">
            <td height="48" class="xl68" style="height: 36pt; border-top-style: none; border-left-style: none; text-align: center; ">后二组选单式</td>
            <td class="xl67" style="border-top:none;border-left:none">手动输入购买号码，2个数字为一注，所选号码与开奖号码的十位、个位相同，顺序不限，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：手动输入12，开奖号码为是*21或者*12，即为中奖。</td>
        </tr>
        <tr height="44" style="mso-height-source:userset;height:33.0pt">
            <td rowspan="3" height="133" class="xl72" style="height: 99.75pt; border-top-style: none; text-align: center; ">定位胆</td>
            <td class="xl68" style="border-top-style: none; border-left-style: none; text-align: center; ">百位</td>
            <td rowspan="3" class="xl67" style="border-top:none">从百位、十位、个位任意1个位置或多个位置上选择1个号码，所选号码与相同位置上的开奖号码一致，即为中奖。</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：定百位为3，开奖号码为3**，即为中奖。</td>
        </tr>
        <tr height="44" style="mso-height-source:userset;height:33.0pt">
            <td height="44" class="xl68" style="height: 33pt; border-top-style: none; border-left-style: none; text-align: center; ">十位</td>
            <td class="xl67" style="border-top:none;border-left:none">&nbsp; 如：定十位为4，开奖号码为*4*，即为中奖。</td>
        </tr>
        <tr height="45" style="mso-height-source:userset;height:33.75pt">
            <td height="45" class="xl66" style="height: 33.75pt; border-top-style: none; border-left-style: none; text-align: center; ">个位</td>
            <td class="xl65" style="border-top:none;border-left:none">&nbsp; 如：定个位为5，开奖号码为**5，即为中奖。</td>
        </tr>
        <tr height="66" style="height:49.5pt">
            <td rowspan="2" height="132" class="xl81" style="border-bottom-width: 0.5pt; border-bottom-style: solid; border-bottom-color: black; height: 99pt; text-align: center; ">大小单双</td>
            <td class="xl68" style="text-align: center; ">前二大小单双</td>
            <td class="xl67" style="border-left:none">对百位、十位的&ldquo;大（56789）小（01234）、单（13579）双（02468）&rdquo;形态进行购买，所选号码的位置、形态与开奖号码的位置、形态相同，即为中奖。</td>
            <td class="xl65" style="border-left:none">&nbsp;   如：选择前二大小单双&ldquo;大单&rdquo;，开奖号码百位与十位为&ldquo;大单&rdquo;，即为中奖。</td>
        </tr>
        <tr height="66" style="height:49.5pt">
            <td height="66" class="xl68" style="height: 49.5pt; border-top-style: none; text-align: center; ">后二大小单双</td>
            <td class="xl67" style="border-top:none;border-left:none">对十位、个位的&ldquo;大（56789）小（01234）、单（13579）双（02468）&rdquo;形态进行购买，所选号码的位置、形态与开奖号码的位置、形态相同，即为中奖。</td>
            <td class="xl65" style="border-left:none">&nbsp;   如：选择后二大小单双&ldquo;小双&rdquo;，开奖号码十位与个位为&ldquo;小双&rdquo;，即为中奖。</td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p></li>
                        </ul>
                                            </td>
                </tr>
            </table>
        </div>
    </div>
</div>
</div>
<?php $this->display('inc_footer.php') ?>
</body>
</html>
