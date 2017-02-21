<footer class="footer">
    <div class="wrapper">
        <div class="footer-box1">
            <h2><span class="fa fa-question fa-2x"></span>帮助</h2>
            <ul>
                                <li><a href="<?=$this->basePath('Help-gongneng') ?>" title="平台功能介绍">功能介绍</a></li>
                                <li><a href="<?=$this->basePath('Help-index') ?>" title="常见问题说明">常见问题</a></li>
          </ul>
        </div>
        <div class="footer-box1 footer-box2">
            <h2><span class="fa fa-gamepad fa-2x"></span>玩法介绍</h2>
            <ul>
                                <li><a href="<?=$this->basePath('Help-wanfa') ?>" title="时时彩">时时彩</a></li>
                                <li><a href="<?=$this->basePath('Help-wanfa') ?>" title="11选5">11选5</a></li>
                                <li><a href="<?=$this->basePath('Help-wanfa') ?>" title="快三">快三</a></li>
                                <li><a href="<?=$this->basePath('Help-wanfa') ?>" title="排列三/五">排列三/五</a></li>
                                <li><a href="<?=$this->basePath('Help-wanfa') ?>" title="3D">3D</a></li>
          </ul>
        </div>
        <div class="footer-box1">
            <h2><span class="fa fa-credit-card fa-2x"></span>支持主流银行</h2>
            <img src="<?=$this->settings['templateurl'] ?>/template/images/comm/yh.png" alt="主流银行">        </div>
        <a href="javascript:void(0)" class="fa fa-cloud-download fa-3x footer-bt" onclick="down()"> <span class="footer-bt-style">下载客户端</span></a>    </div>
    <div class="footnotice"><?=$this->settings['webFT'] ?></div>
</footer>
<div id="wanjinDialog"></div>