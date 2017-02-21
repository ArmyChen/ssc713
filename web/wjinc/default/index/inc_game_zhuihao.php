     <!--追号区开始-->
     <div id="lt_trace_box"  class="trace_box">
        <div class="tabcon_n">
          <label class="zh_continue" name="lt_trace_stop">
          <input name="lt_trace_stop" id="lt_trace_stop"  value="yes" type="checkbox" checked="checked">中奖后停止追号
          </label>
        </div>
        <div class="unit1">
          <div class="unit_title2">
            <div class="u_tab_div" id="tab02">
              <div class="bd">
                 <div class="bd2" id="general_txt_100">
                    <table class="tabbar-div-s3" width="100%">
                    <tbody><tr>
                    <td id="lt_trace_label">
					<span id="lt_margin" class="tab-front"><span class="tabbar-left"></span><span class="content">同倍追号</span><span class="tabbar-right"></span></span>
					</td>
                    </tr>
                    </tbody></table>
                 <div class="bl3p"></div>
                 </div>
              </div>
            </div>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
          <div class="zhgen">
            <table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr>
              <td>&nbsp;&nbsp;&nbsp;
              追号期数:<select id="lt_trace_qissueno">
                <option value="" selected="selected">请选择</option>
                <option value="5">5期</option>
                <option value="10">10期</option>
                <option value="15">15期</option>
                <option value="20">20期</option>
                <option value="25">25期</option>
                <option value="all">全部</option>
              </select>&nbsp;&nbsp;
              总期数: <span class="y qs" id="lt_trace_count">0</span> 期  总倍数: <span class="y beishu" id="lt_trace_beishu">0</span> 倍  追号总金额: <span class="y amount" id="lt_trace_hmoney">0</span> 元
              </td>
              <td align="left"><div class="g_submit" id="lt_trace_ok" onclick="btnquerenzhuihao()"><span>确认追号</span></div></td>
			  <td><div class="g_submit" onclick="btnquxiaozhuihao()"><span>取消追号</span></div></td>
            </tr></tbody></table>
			<div class="yxlist" style="height:300px; width:100%; overflow-x:auto; overflow-y:auto;">
		     <table width="100%" class="zhui-hao-modal">
              <thead>
                <tr>
                <td><input type="checkbox" />
                <td>期号</td>
                <td>倍数</td>
                <td>金额</td>
                <td>开奖时间</td>
                </tr>
              </thead>
              <tbody id="zhuihaolist">
              </tbody>
              </table>
			  </div>
            </div>
        </div>
     </div>
     <!--追号区结束-->