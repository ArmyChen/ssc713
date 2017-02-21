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
        <a href="<?=$this->basePath('Help-wanfa') ?>">玩法介绍</a>
        <a class="act" href="<?=$this->basePath('Help-gongneng') ?>">功能介绍</a>
    </div>
    <div class="page-info">
        <div id="tab" class="page_list">
            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="page_bar">
                                                <a><span id="tab_19" class="tab-front">会员中心</span>
                                                <a><span id="tab_20" class="tab-back">开始游戏</span>
                                                <a><span id="tab_21" class="tab-back">充值提现</span>
                                                <a><span id="tab_22" class="tab-back">游戏记录</span>
                                                <a><span id="tab_23" class="tab-back">用户管理</span>
                                                <a><span id="tab_24" class="tab-back">报表管理</span>
                                                <a><span id="tab_26" class="tab-back">账户中心</span>
                                                <a><span id="tab_27" class="tab-back">帮助中心</span>
                                            </td>
                </tr>
            </table>
        </div>
        <div class="page_list">
            <table>
                <tr>
                    <td>
                                                <ul id="content_19" class="news_list" style="display:block" >
                            <li><p class="arrow"><strong>用户昵称</strong>：点击&ldquo;用户昵称&rdquo;直接对昵称进行修改。</p>
<p class="arrow"><strong>余额</strong>：  显示此账号当前&ldquo;可用余额&rdquo;，并且每次资金变动系统都会对余额进行及时刷新。</p>
<p class="arrow"><strong>刷新余额</strong>：点击&quot;刷新按钮&quot;可以手动刷新余额。</p>
<br /></li>
                        </ul>
                                                <ul id="content_20" class="news_list" style="display:none" >
                            <li><p>在&ldquo;全部游戏&rdquo;中选择任意一款游戏，进入游戏界面，在同一游戏中，常规玩法与任选玩法可随时切换。</p>
<p>1、 在玩法区域选择您中意的玩法；</p>
<p>2、  根据其玩法规则，选择或者输入要购买的号码；</p>
<p>3、  填写想购买的&ldquo;倍数&rdquo;，选择&ldquo;元、角、分模式&rdquo;，然后点击&ldquo;添加&rdquo;，同时可以重复&ldquo;第一步&rdquo;到&ldquo;第三步&rdquo;，以添加不同玩法的投注项；</p>
<p>4、  如果想购买尚未开始销售的奖期，可以在&ldquo;未来期&rdquo;进行选择；</p>
<p>5、  如果需要追号，点击&ldquo;我要追号&rdquo;，在展开的追号计划表中，根据自己的需要填写追号计划；</p>
<p>6、  最后点击&ldquo;确认投注&rdquo;，在弹出的确认窗口中确认投注内容和所购买的奖期是否无误，确认无误后，点击&ldquo;确定&rdquo;，直至显示&ldquo;购买成功&rdquo;，投注完成。</p></li>
                        </ul>
                                                <ul id="content_21" class="news_list" style="display:none" >
                            <li><p><strong>1、  自动充值</strong></p>
<p>自动充值为系统自动处理（推荐使用），选择一个&ldquo;充值银行&rdquo;，输入&ldquo;充值金额&rdquo;，点击进入下一步，严格按照充值说明完成整个充值，（详情请见：常见问题&rarr;工行、建行、农行充值说明）。</p>
<p><strong>2、  平台提现</strong></p>
<p>需要在平台绑定银行卡后，才能发起提现申请。选择一张已绑定在平台的银行卡作为&ldquo;收款银行卡&rdquo;，输入&ldquo;提现金额&rdquo;，点击&quot;下一步&quot;，按照提现流程完成整个提现，（详情请见：常见问题&rarr;平台提现说明）。</p>
<p><strong>3、  提现记录</strong></p>
<p>成功发起提现申请后，在此页面能查看到时间段内所有提现申请单，以及每个提现申请的当前处理状态。</p></li>
                        </ul>
                                                <ul id="content_22" class="news_list" style="display:none" >
                            <li><p>游戏记录中可以查看时间段内每个&ldquo;投注单&rdquo;以及&ldquo;追号单&rdquo;的详细记录。</p>
<p><strong>1、  投注记录</strong></p>
<p>默认不显示任何投注记录，设置好搜索条件，点击&ldquo;搜索&rdquo;才能查看到符合搜索条件的所有投注单。</p>
<p>点击每个投注单的&ldquo;注单编号&rdquo;，可以查看该注单的投注详情。在投注详情中可以对在撤单时间范围内的注单执行撤单操作<span style="color: rgb(255, 0, 0); ">（注意：只能在注单购买当期尚未停止销售时才能进行撤单操作）</span>，如果是追号单，可以点击&ldquo;查看追号详情&rdquo;切换到追号详情界面。</p>
<p><strong>2、  追号记录</strong></p>
<p>默认不显示任何追号记录，设置好搜索条件，点击&ldquo;搜索&rdquo;才能查看到符合搜索条件的所有追号单。</p>
<p>点击每个追号单的&ldquo;追号编号&rdquo;，可以查看到该追号单的追号详情。在追号详情中可以对正在销售中以及尚未开始销售的奖期执行撤消追号操作。</p></li>
                        </ul>
                                                <ul id="content_23" class="news_list" style="display:none" >
                            <li><p>管理自己的下级用户，默认显示所有直接下级信息，点击某下级用户名即可查看此下级的再下一层用户信息。也可通过设置搜索条件进行准确搜索。</p>
<p>点击&ldquo;全部下级用户名&rdquo;会展开显示所有直接下级用户名以及此每个下级的再下一层用户数量。</p>
<p><strong>1、  增加用户</strong></p>
<p>点击进入&ldquo;增加用户&rdquo;页面，选择需要新增用户的&ldquo;用户级别&rdquo;，输入&ldquo;登陆账号&rdquo;、&ldquo;登陆密码&rdquo;、&ldquo;用户昵称&rdquo;后，再选择一种返点设置方式：&ldquo;快速设置&rdquo;、&ldquo;详细设置&rdquo;设置好新增用户的返点，最后点击&ldquo;执行开户&rdquo;，直至显示&ldquo;开户成功&rdquo;。</p>
<p>快速设置：对新用户所有游戏统一设置，在可填范围内，输入一个自身账号保留的返点，系统会根据保留返点计算出新增用户每个游戏、玩法的返点。</p>
<p>详细设置：针对每个游戏、每个玩法逐个进行返点设置，在可选范围内逐个输入给新增用户的返点。</p>
<p><strong>2、  返点编辑</strong></p>
<p>点击后，进入到下级用户&ldquo;返点修改&rdquo;页面，在此页面可以查看到下级用户当前的返点设置情况，并可通过&ldquo;快速设置&rdquo;或者&ldquo;详细设置&rdquo;对下级返点进行修改。编辑方式与&ldquo;增加用户&rdquo;一致。</p>
<p><strong>3、  账变</strong></p>
<p>点击某下级用户后的&ldquo;帐变&rdquo;按钮，会切换到帐变列表，默认显示此下级用户当天的所有帐变记录。</p>
<p><strong>4、  开户额</strong></p>
<p>平台新增返点大于<font color="red"><b>7</b></font>的用户需要有开户配额，返点为<font color="red"><b>7</b></font>以下的账号可以无限制开户，代理只能给返点大于<font color="red"><b>7</b></font>的直接下级分配开户配额。</p>
<p><strong>5、  团队余额</strong></p>
<p>点击&ldquo;团队余额&rdquo;会在此用户下方展开显示此下级用户整个团队当前的可用总余额。</p></li>
                        </ul>
                                                <ul id="content_24" class="news_list" style="display:none" >
                            <li><p><strong>1、  帐变列表</strong></p>
<p>可以查看到每一笔资金操作的记录，并且可以通过设置搜索条件，进行准确搜索。与游戏有关的帐变可以点击&ldquo;帐变编号&rdquo;切换到游戏详情页面。</p>
<p><strong>2、  盈亏报表</strong></p>
<p>查看整个团队的充值、提现以及所有参与游戏的资金总额，默认显示当日<span style="color: rgb(255, 0, 0); ">凌晨03:00至次日凌晨03:00</span>，列表第一行以红色显示，此列是自身账号操作资金的所有资金总额，从第一列往下是每个直接下级整个团队的资金总额。</p>
<p>查看明细：可以查看自身和直接下级的资金明细，点击后会跳转到&ldquo;帐变列表&rdquo;并显示出时间段内所有盈亏明细。</p>
<p>自身盈亏：点击后，会在当前列的下方展开显示此用户自身操作资金的所有资金总额。</p></li>
                        </ul>
                                                <ul id="content_26" class="news_list" style="display:none" >
                            <li><p><span style="color: rgb(255, 102, 0);"><strong>1、  修改密码</strong></span></p>
<p>修改自己的登录密码和资金密码，在修改的同时是需要提供旧的登陆和资金密码，以确保用户账户安全。为了避免仿冒网站，可在此页面设置&ldquo;登陆问候语&rdquo;，设置后每次登陆平台都能。</p>
<p><span style="color: rgb(255, 102, 0);"><strong>2、  我的银行卡</strong></span></p>
<p>对自己绑定在平台的银行卡进行管理，进入管理之前需要验证资金密码无误，进入银行卡页面后可以&ldquo;绑定新的银行卡&rdquo;、&ldquo;解绑银行卡&rdquo;、&ldquo;锁定银行卡&rdquo;、&ldquo;解锁银行卡&rdquo;，</p>
<p><span style="color: rgb(255, 0, 0); ">银行一但绑定后,无法自行解锁修改！</span>。</p>
<p><span style="color: rgb(255, 102, 0);"><strong>3、  我的消息</strong></span></p>
<p>平台充值、提现、中奖均会在页面上方弹出消息提示框，如果同时有多条消息，可以点击提示框下方的&ldquo;下一页&rdquo;&ldquo;上一页&rdquo;进行查看。</p>
<p>在&ldquo;我的消息&rdquo;页面可以查看所有已读和未读消息，并且可以对其进行删除操作。</p>
<p><span style="color: rgb(255, 102, 0);"><strong>4、  奖金详情</strong></span></p>
<p>可以分游戏查看自身已开通游戏的奖金和返点设置信息。</p></li>
                        </ul>
                                                <ul id="content_27" class="news_list" style="display:none" >
                            <li><p><strong>1、  常见问题</strong></p>
<p>可查看平台使用中会遇到的常见问题的答案，以及各银行的充值和提现说明和充值免责说明。</p>
<p><strong>2、  玩法介绍</strong></p>
<p>可查看每个游戏中各个玩法的游戏方式以及中奖示例。</p>
<p><strong>3、  功能介绍</strong></p>
<p>平台所有功能的使用说明，让您更快的熟悉平台操作。</p></li>
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
