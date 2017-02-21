// 彩票开奖配置
exports.cp=[

{
	title:'重庆时时彩官网',
	source:'重庆时时彩官网',
	name:'cqssc',
	enable:true,
	timer:'cqssc1', 

	option:{
		host:"data.shishicai.cn",
		timeout:25000,
		path: '/cqssc/haoma/',
		headers:{
			"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
		}
	},
	parse:function(str){
		try{
			return getCQsscGw(str,1,'重庆时时彩');
		}catch(err){
			throw('重庆时时彩解析数据不正确');
		}
	}
},
	{
		title:'重庆时时彩',
		source:'彩经网',
		name:'cqssc',
		enable:true,
		timer:'cqssc2', 

		option:{
			host:"kj.cjcp.com.cn",
			timeout:25000,
			path: '/',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
			}
		},
		parse:function(str){
			try{
				return getCQssc(str,1);
			}catch(err){
				throw('重庆时时彩解析数据不正确');
			}
		}
	},

//重庆时时彩 结束  从官网和彩经网抓取---------------------------------------------------------	
	{
		title:'江西时时彩官网',
		source:'重庆时时彩官网',
		name:'jxssc',
		enable:true,
		timer:'jxssc1',
 

		option:{
			host:"data.shishicai.cn",
			timeout:10000,
			path: '/jxssc/haoma/',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
			}
		},
		parse:function(str){
			try{
				//console.log("江西时时彩官网开始解析数据");
				
				return getCQsscGw(str,3,'江西时时彩');
			}catch(err){
				throw('江西时时彩官网解析数据不正确');
			}
		}
	},
	{
		title:'江西时时彩',
		source:'360彩票',
		name:'jxssc',
		enable:true,
		timer:'jxssc2',
 

		option:{
			host:"cp.360.cn",
			timeout:10000,
			path: '/sscjx/',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
			}
		},
		parse:function(str){
			try{
				//console.log("江西时时彩开始解析数据");
				
				return getFrom360CP(str,3);
			}catch(err){
				throw('江西时时彩解析数据不正确');
			}
		}
	},

	//江西时时彩 结束  从ssc.cn 和360抓取 ---------------------------------------------------------	
	
	{
		title:'江西11选5官网',
		source:'重庆时时彩网站',
		name:'jx11x5',
		enable:true,
		timer:'jx11x51',
 

		option:{
			host:"data.shishicai.cn",
			timeout:10000,
			path: '/jx11x5/haoma/',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
			}
		},
		parse:function(str){
			try{
				return getsyxwNew(str,16,'江西11选5');
			}catch(err){
				throw('江西11选5官网解析数据不正确');
			}
		}
	},
	{
		title:'江西11选5',
		source:'360彩票',
		name:'jx11x5',
		enable:true,
		timer:'jx11x52',
 

		option:{
			host:"cp.360.cn",
			timeout:10000,
			path: '/dlcjx/',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
			}
		},
		parse:function(str){
			try{
				return getFrom360CP(str,16);
			}catch(err){
				//throw('江西多乐彩解析数据不正确');
			}
		}
	},
	//江西11选5 结束  从ssc.cn 和360抓取  ---------------------------------------------------------	
	
	{
		title:'江苏快3官网',
		source:'重庆时时彩官网',
		name:'jsk3',
		enable:true,
		timer:'jsk31',
 

		option:{
			host:"data.shishicai.cn",
			timeout:10000,
			path: '/jsk3/haoma/',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
			}
		},
		parse:function(str){
			try{
				return getCQsscGwKs(str,25,"江苏快3");
			}catch(err){
				throw('江苏快3官网解析数据不正确');
			}
		}
	},
	{
		title:'江苏快3',
		source:'360彩票',
		name:'jsk3',
		enable:true,
		timer:'jsk32',
 

		option:{
			host:"cp.360.cn",
			timeout:10000,
			path: '/k3js/',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
			}
		},
		parse:function(str){
			try{
				return getFrom360CPK3(str,25);
			}catch(err){
				throw('江苏快3解析数据不正确');
			}
		}
	},
	//江苏快3官网 结束  从ssc.cn 和360抓取  ---------------------------------------------------------	
	
	{
		title:'重庆快乐十分官网',
		source:'重庆时时彩官网',
		name:'klsf',
		enable:true,
		timer:'klsf1',

		option:{
			host:"data.shishicai.cn",
			timeout:10000,
			path: '/cqkl10/haoma/',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0)"
			}
		},
		
		parse:function(str){
			try{
				return getsyxwNew(str,18,'重庆快乐十分');
			}catch(err){
				throw('重庆快乐十分官网解析数据不正确');
			}
		}
	},
	{
		title:'重庆快乐十分百度',
		source:'百度',
		name:'klsf',
		enable:true,
		timer:'klsf2',

		option:{
			host:"baidu.lecai.com",
			timeout:10000,
			path: '/lottery/draw/view/566',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0)"
			}
		},
		
		parse:function(str){
			try{	
				return getBaiduData(str,18,'幸运农场');
				
			}catch(err){
				throw('重庆快乐十分百度解析数据不正确');
			}
		}
	},
//重庆快乐十分结束 从ssc.cn 和彩乐乐抓取-----------------------------------------------------------------------------
	{
		title:'北京PK10官网',
		source:'北京福利彩票网',
		name:'bjpk10',
		enable:true,
		timer:'bjpk101',

		option:{

			host:"www.bwlc.gov.cn",
			timeout:10000,
			path: '/bulletin/trax.html',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
			}
		},
		
		parse:function(str){
			try{
				console.log("开始采集北京pk10----------------------------");
				return getFromPK10(str,20);
			}catch(err){
				throw('解析数据不正确');
			}
		}
	},
	{
		title:'北京PK10彩经',
		source:'彩经',
		name:'bjpk10',
		enable:true,
		timer:'bjpk102',

		option:{

			host:"kj.cjcp.com.cn",
			timeout:10000,
			path: '/bjpk10/',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
			}
		},
		
		parse:function(str){
			try{
				return getPk10Fromcj(str,20);
			}catch(err){
				throw('解析数据不正确');
			}
		}
	},
	
	//北京PK10 结束  从北京福利彩票网  彩经网抓取  ---------------------------------------------------------	
{
		title:'新疆时时彩',
		source:'新疆福利彩票网',
		name:'xjssc',
		enable:true,
		timer:'xjssc',

		option:{
			host:"www.xjflcp.com",
			timeout:10000,
			path: '/ssc/',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
			}
		},
		
		parse:function(str){
			return getFromXJFLCPWeb(str,12);
		}
	},
	/*{
		title:'新疆时时彩-彩经',
		source:'彩经网',
		name:'xjssc',
		enable:true,
		timer:'xjssc',

		option:{
			host:"shishicai.cjcp.com.cn",
			timeout:10000,
			path: '/xinjiang/kaijiang/',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
			}
		},
		
		parse:function(str){
			return getXinJiangFromcj(str,12);
		}
	},*/
	//新疆时时彩 结束  从官网 彩经抓取---------------------------------------------------------	
	{
		title:'福彩3D',
		source:'500万彩票网',
		name:'fc3d',
		enable:true,
		timer:'fc3d',

		option:{
			host:"www.500wan.com",
			timeout:10000,
			path: '/static/info/kaijiang/xml/sd/list10.xml',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
			}
		},
		
		parse:function(str){
			try{
				str=str.substr(0,300);
				var m;
				var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)" trycode="[\d\,]*?" tryinfo="" \/>/;
                                        
				if(m=str.match(reg)){
					return {
						type:9,
						time:m[3],
						number:m[1],
						data:m[2]
					};
				}
			}catch(err){
				throw('福彩3D解析数据不正确');
			}
		}
	},
	//福彩3d 结束 从500w抓取  ---------------------------------------------------------	
	{
		title:'排列3',
		source:'500万彩票网',
		name:'pai3',
		enable:true,
		timer:'pai3',

		option:{
			host:"www.500wan.com",
			timeout:10000,
			path: '/static/info/kaijiang/xml/pls/list10.xml',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
			}
		},
		
		parse:function(str){
			try{
				str=str.substr(0,300);
				var m;	 
				var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;
				if(m=str.match(reg)){
					return {
						type:10,
						time:m[3],
						number:20+m[1],
						data:m[2]
					};
				}
			}catch(err){
				throw('排3解析数据不正确');
			}
		}
	},
	//排列三 结束  从500w抓取 ---------------------------------------------------------	
	{
		title:'广东11选5',
		source:'360彩票',
		name:'gd11x5',
		enable:true,
		timer:'gd11x5',

 

		option:{
			host:"cp.360.cn",
			timeout:10000,
			path: '/gd11/',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
			}
		},
		parse:function(str){
			try{
				return getFrom360CP(str,6);
			}catch(err){
				//throw('广东11选5解析数据不正确');
			}
		}
	},
//广东11选五结束  从彩经网 360采集====================================================================	
	
	{
		title:'山东11选5-彩经网',
		source:'彩经网',
		name:'sd11x5',
		enable:true,
		timer:'sd11x51', 

		option:{
			host:"kj.cjcp.com.cn",
			timeout:10000,
			path: '/',
			headers:{
				"User-Agent": "Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0; Sleipnir/2.9.8) "
			}
		},
		parse:function(str){
			try{
				return getshandong11Fromcj(str,7);
			}catch(err){
			throw('彩经网-山东11选5解析数据不正确');
			}
		}
	},
	{
		title:'山东11选5',
		source:'360彩票网',
		name:'sd11x5',
		enable:true,
		timer:'sd11x52', 

		option:{
			host:"cp.360.cn",
			timeout:10000,
			path: '/yun11/',
			headers:{
				"User-Agent": "Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0; Sleipnir/2.9.8) "
			}
		},
		parse:function(str){
			try{
				return getFrom360sd11x5(str,7);
			}catch(err){
				//throw('山东11选5解析数据不正确');
			}
		}
	},

	//山东11选五结束  从彩经网 360采集====================================================================	
	

	{
		title:'广东快乐十分-彩经网',
		source:'彩经网',
		name:'gdklsf',
		enable:true,
		timer:'gdklsf1',

		option:{
			host:"kj.cjcp.com.cn",
			timeout:10000,
			path: '/',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0)"
			}
		},
		
		parse:function(str){
			try{
				
				return getguangdong10Fromcj(str,17);
			}catch(err){
				throw('彩经网---广东快乐十分解析数据不正确');
			}
		}
	},
	{
		title:'广东快乐十分-爱彩乐',
		source:'爱彩乐',
		name:'gdklsf',
		enable:true,
		timer:'gdklsf2',

		option:{
			host:"pub.icaile.com",
			timeout:10000,
			path: '/',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0)"
			}
		},
		
		parse:function(str){
			try{
				
				return getguangdong10Fromacl(str,17);
			}catch(err){
				throw('彩经网---广东快乐十分解析数据不正确');
			}
		}
	},
	//广东快乐十分结束  从彩经网  爱彩乐抓取==================================================
	{
		title:'五分彩',
		source:'qtllc',
		name:'qtllc',
		enable:true,
		timer:'qtllc',

		option:{
			host:"这里输入你的域名",
			timeout:10000,
			path: '/index.php?tnt=5fc',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "
			}
		},
		parse:function(str){
			try{
				str=str.substr(0,200);
				
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
				//<row expect="20130720017" opencode="4,9,1,2,9" opentime="2013-07-20 01:25:30"/>
				
				var m;
				if(m=str.match(reg)){
					return {
						type:14,
						time:m[3],
						number:m[1],
						data:m[2]
					};
				}					
				
			}catch(err){
				throw('五分彩解析数据不正确');
			}
		}
	},

	{
		title:'两分彩',
		source:'lfc',
		name:'lfc',
		enable:true,
		timer:'lfc',

		option:{
			host:"这里输入你的域名",
			timeout:10000,
			path: '/index.php?tnt=2fc',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "
			}
		},
		parse:function(str){
			try{
				str=str.substr(0,200);
				
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
				//<row expect="20130720017" opencode="4,9,1,2,9" opentime="2013-07-20 01:25:30"/>
				
				var m;
				if(m=str.match(reg)){
					return {
						type:26,
						time:m[3],
						number:m[1],
						data:m[2]
					};
				}					
				
			}catch(err){
				throw('两分彩解析数据不正确');
			}
		}
	},

	{
		title:'分分彩',
		source:'ffc',
		name:'ffc',
		enable:true,
		timer:'ffc',
		option:{
			host:"这里输入你的域名",
			timeout:10000,
			path: '/index.php?tnt=ffc',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "
			}
		},
		parse:function(str){
			try{
				str=str.substr(0,200);	
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
				var m;
				if(m=str.match(reg)){
					return {
						type:5,
						time:m[3],
						number:m[1],
						data:m[2]
					};
				}					
			}catch(err){
				throw('分分彩解析数据不正确');
			}
		}
	}
];

// 出错时等待 1
exports.errorSleepTime=1;

// 重启时间间隔，以小时为单位，0为不重启
//exports.restartTime=0;
exports.restartTime=0;

exports.submit={
	host:'localhost',
	path:'/admin778899.php/dataSource/kj'
}

exports.dbinfo={
	host:'localhost',
	user:'root',
	password:'root',
	database:'david'

}

/*exports.dbinfo={
		host:'localhost',
		user:'root',
		password:'root',
		database:'david'

	}*/

global.log=function(log){
	var date=new Date();
	console.log('['+date.toDateString() +' '+ date.toLocaleTimeString()+'] '+log)
}

function getFromXJFLCPWeb(str, type){
	str=str.substr(str.indexOf('<td><a href="javascript:detatilssc'), 300).replace(/[\r\n]+/g,'');
         
	var reg=/(\d{10}).+(\d{2}\:\d{2}).+<p>([\d ]{9})<\/p>/,
	match=str.match(reg);
	
	if(!match) throw new Error('数据不正确');
	//console.log('期号：%s，开奖时间：%s，开奖数据：%s', match[1], match[2], match[3]);
	
	try{
		var data={
			type:type,
			time:match[1].replace(/^(\d{4})(\d{2})(\d{2})\d{2}/, '$1-$2-$3 ')+match[2],
			number:match[1].replace(/^(\d{8})(\d{2})$/, '$1-$2'),
			data:match[3].split(' ').join(',')
		};
		//console.log(data);
		return data;
	}catch(err){
		throw('解析数据失败');
	}
}


function getFromCaileleWeb(str, type, slen){
	if(!slen) slen=380;
	str=str.substr(str.indexOf('<tr bgcolor="#FFFAF3">'),slen);
	//console.log(str);
	var reg=/<td.*?>(\d+)<\/td>[\s\S]*?<td.*?>([\d\- \:]+)<\/td>[\s\S]*?<td.*?>((?:[\s\S]*?<div class="ball_yellow">\d+<\/div>){3,5})\s*<\/td>/,
	match=str.match(reg);
	if(match.length>1){
		
		if(match[1].length==7) match[1]='2014'+match[1].replace(/(\d{4})(\d{3})/,'$1-$2');
		if(match[1].length==8){
			if(parseInt(type)!=11){
				match[1]='20'+match[1].replace(/(\d{6})(\d{2})/,'$1-0$2');
			}else{match[1]='20'+match[1].replace(/(\d{6})(\d{2})/,'$1-$2');}
		}
		if(match[1].length==9) match[1]='20'+match[1].replace(/(\d{6})(\d{2})/,'$1-$2');
		if(match[1].length==10) match[1]=match[1].replace(/(\d{8})(\d{2})/,'$1-0$2');
		var mynumber=match[1].replace(/(\d{8})(\d{3})/,'$1-$2');
	try{
		var data={
			type:type,
			time:match[2],
			number:mynumber
		}
		
		reg=/<div.*>(\d+)<\/div>/g;
		data.data=match[3].match(reg).map(function(v){
			var reg=/<div.*>(\d+)<\/div>/;
			return v.match(reg)[1];
		}).join(',');
		
		//console.log(data);
		return data;
	}catch(err){
		throw('解析数据失败');
	}
   }
}

function getFrom360CP(str, type){

	str=str.substr(str.indexOf('<em class="red" id="open_issue">'),380);
	
	//console.log(str);
	var reg=/[\s\S]*?(\d+)<\/em>[\s\S].*?<ul id="open_code_list">((?:[\s\S]*?<li class=".*?">\d+<\/li>){3,5})[\s\S]*?<\/ul>/,
	match=str.match(reg);
	var myDate = new Date();
	var year = myDate.getFullYear();       //年   
    var month = myDate.getMonth() + 1;     //月   
    var day = myDate.getDate();            //日
	if(month < 10) month="0"+month;
	if(day < 10) day="0"+day;
	var mytime=year + "-" + month + "-" + day + " " +myDate.toLocaleTimeString();
	//console.log(match);
	if(match.length>1){
		if(match[1].length==7) match[1]=year+match[1].replace(/(\d{8})(\d{3})/,'$1-$2');
		if(match[1].length==6) match[1]=year+match[1].replace(/(\d{4})(\d{2})/,'$1-0$2');
		if(match[1].length==9) match[1]='20'+match[1].replace(/(\d{6})(\d{2})/,'$1-$2');
		if(match[1].length==10) match[1]=match[1].replace(/(\d{8})(\d{2})/,'$1-0$2');
		var mynumber=match[1].replace(/(\d{8})(\d{3})/,'$1-$2');
		
		try{
			var data={
				type:type,
				time:mytime,
				number:mynumber
			}
			
			reg=/<li class=".*?">(\d+)<\/li>/g;
			data.data=match[2].match(reg).map(function(v){
				var reg=/<li class=".*?">(\d+)<\/li>/;
				return v.match(reg)[1];
			}).join(',');
			
			//console.log(data);
			return data;
		}catch(err){
			throw('解析数据失败');
		}
	}
}

function getFrom360CPK3(str, type){

	str=str.substr(str.indexOf('<em class="red" id="open_issue">'),380);
	//console.log(str);
	var reg=/[\s\S]*?(\d+)<\/em>[\s\S].*?<ul id="open_code_list">((?:[\s\S]*?<li class=".*?">\d+<\/li>){3,5})[\s\S]*?<\/ul>/,
	match=str.match(reg);
	var myDate = new Date();
	var year = myDate.getFullYear();       //年   
    var month = myDate.getMonth() + 1;     //月   
    var day = myDate.getDate();            //日
	if(month < 10) month="0"+month;
	if(day < 10) day="0"+day;
	var mytime=year + "-" + month + "-" + day + " " +myDate.toLocaleTimeString();
	//console.log(match);
	match[1]=match[1].replace(/(\d{4})(\d{2})/,'$1$2');
		
		try{
			var data={
				type:type,
				time:mytime,
				number:match[1]
			}
			
			reg=/<li class=".*?">(\d+)<\/li>/g;
			data.data=match[2].match(reg).map(function(v){
				var reg=/<li class=".*?">(\d+)<\/li>/;
				return v.match(reg)[1];
			}).join(',');
			
			//console.log(data);
			return data;
		}catch(err){
			throw('解析数据失败');
		}
}

function getCQsscGwKs(str, type,gameName){
	


	str = str.substr(str.indexOf('name="description"'),100).replace(/[\r\n]+/g,'');
	var reg =new RegExp(gameName+"第(\\d+-\\d+)期开奖号码:(\\d+),开奖时间",""); 
	
	var match=str.match(reg);
	
	if(!match) throw new Error('-------------------------'+gameName+'官网数据不正确');
	

	var ano =  match[1];
	
	var data= match[2]+'';
	var data = data.split("").join(',');
	
	var myDate = new Date();
	var year = myDate.getFullYear();       //年   
    var month = myDate.getMonth() + 1;     //月   
    var day = myDate.getDate();            //日
	if(month < 10) month="0"+month;
	if(day < 10) day="0"+day;
	var mytime=year + "-" + month + "-" + day + " " +myDate.toLocaleTimeString();
	
	
	var ano1=ano.substr(4,4);
	var ano2 = ano.substr(10);
	ano=ano1+ano2;
	try{
		var data={
			type:type,
			time:mytime,
			number:ano,
			data:data
		}
		
	//	console.log(gameName);
		//console.log(data);
		return data;
	}catch(err){
		throw('解析'+gameName+'官网数据失败');
	}
}
function getCQsscGw(str, type,gameName){
	


	str = str.substr(str.indexOf('name="description"'),100).replace(/[\r\n]+/g,'');
	var reg =new RegExp(gameName+"第(\\d+-\\d+)期开奖号码:(\\d+),开奖时间",""); 
	
	var match=str.match(reg);
	
	if(!match) throw new Error('-------------------------'+gameName+'官网数据不正确');
	

	var ano =  match[1];
	
	var data= match[2]+'';
	var data = data.split("").join(',');
	
	var myDate = new Date();
	var year = myDate.getFullYear();       //年   
    var month = myDate.getMonth() + 1;     //月   
    var day = myDate.getDate();            //日
	if(month < 10) month="0"+month;
	if(day < 10) day="0"+day;
	var mytime=year + "-" + month + "-" + day + " " +myDate.toLocaleTimeString();
	
	
	
	try{
		var data={
			type:type,
			time:mytime,
			number:ano,
			data:data
		}
		
	//	console.log(gameName);
		//console.log(data);
		return data;
	}catch(err){
		throw('解析'+gameName+'官网数据失败');
	}
}

function getsyxwNew(str, type,gameName){
	


	str = str.substr(str.indexOf('name="description"'),100).replace(/[\r\n]+/g,'');
	var reg =new RegExp(gameName+"第(\\d+-\\d+)期开奖号码:([\\d\\,]+?)开奖时间","");

	var match=str.match(reg);
	
	if(!match) throw new Error('-------------------------'+gameName+'官网数据不正确');
	

	var ano =  match[1];
	
	var data= match[2]+'';
	var data =data.substr(0,data.length-1);

	var myDate = new Date();
	var year = myDate.getFullYear();       //年   
    var month = myDate.getMonth() + 1;     //月   
    var day = myDate.getDate();            //日
	if(month < 10) month="0"+month;
	if(day < 10) day="0"+day;
	var mytime=year + "-" + month + "-" + day + " " +myDate.toLocaleTimeString();
	
	
	

	try{
		var data={
			type:type,
			time:mytime,
			number:ano,
			data:data
		}
		
		//console.log(gameName);
	//	console.log(data);
		return data;
	}catch(err){
		throw('解析'+gameName+'官网数据失败');
	}
}

function getBaiduData(str, type,gameName){
	
	
	str = str.substr(str.indexOf('name="description"'),100).replace(/[\r\n]+/g,'');
	
	var reg =new RegExp(gameName+"(\\d+)期，开奖结果：(\\d+)。",""); 

	var match=str.match(reg);

	if(!match) throw new Error('-------------------------'+gameName+'百度数据不正确');
	

	var ano =  match[1];
	
	var datastr= match[2]+'';
	var dataarr = datastr.split("");
	var data='';
	for(var i in dataarr){
		
		if(i%2==0 && i!=0){
			
			data+=','+dataarr[i];
		}else{
			data+=dataarr[i];
		}
		
	}
	var myDate = new Date();
	var year = myDate.getFullYear();       //年   
    var month = myDate.getMonth() + 1;     //月   
    var day = myDate.getDate();            //日
	if(month < 10) month="0"+month;
	if(day < 10) day="0"+day;
	var mytime=year + "-" + month + "-" + day + " " +myDate.toLocaleTimeString();
	
	if(ano.length==7) ano=year+ano.replace(/(\d{8})(\d{3})/,'$1-$2');
	if(ano.length==6) ano=year+ano.replace(/(\d{4})(\d{2})/,'$1-0$2');
	if(ano.length==9) ano='20'+ano.replace(/(\d{6})(\d{2})/,'$1-$2');
	if(ano.length==10) ano=ano.replace(/(\d{8})(\d{2})/,'$1-0$2');
	var mynumber=ano.replace(/(\d{8})(\d{3})/,'$1-$2');
	

	try{
		var data={
			type:type,
			time:mytime,
			number:mynumber,
			data:data
		}
		
	//	console.log(gameName+"------------------------------ baidu");
	//	console.log(data);
		return data;
	}catch(err){
		throw('解析'+gameName+'官网数据失败');
	}
}
//从彩经网获取重庆时时彩 
function getCQssc(str, type){
	
	str = str.substr(str.indexOf('id="n_cqssc"'),700).replace(/[\r\n]+/g,'');
	
	
	var reg =/value="(\d)"/g;
	
	//var reg=/<td>(\d+)<\/td>[\s\S]*?<td>(.*)<\/td>[\s\S]*?<td>([\d\:\- ]+?)<\/td>[\s\S]*?<\/tr>/,
	var data='';
	while(reg.test(str)){
		data+=RegExp.$1+",";
		
		}
	
	if(data.length==0){
		throw new Error('重庆时时彩数据不正确');
		
	}
	data=data.substr(0,data.length-1);
	reg=/<td class="qihao">(\d+)[\s\S]*?<\/td>/;
	var match=str.match(reg);
	if(!match) throw new Error('重庆时时彩数据不正确');
	
	var myDate = new Date();
	var year = myDate.getFullYear();       //年   
    var month = myDate.getMonth() + 1;     //月   
    var day = myDate.getDate();            //日
	if(month < 10) month="0"+month;
	if(day < 10) day="0"+day;
	var mytime=year + "-" + month + "-" + day + " " +myDate.toLocaleTimeString();
	var ano = match[1];
	

	if(ano.length==7) ano=year+ano.replace(/(\d{8})(\d{3})/,'$1-$2');
	if(ano.length==6) ano=year+ano.replace(/(\d{4})(\d{2})/,'$1-0$2');
	if(ano.length==9) ano='20'+ano.replace(/(\d{6})(\d{2})/,'$1-$2');
	if(ano.length==10) ano=ano.replace(/(\d{8})(\d{2})/,'$1-0$2');
	var mynumber=ano.replace(/(\d{8})(\d{3})/,'$1-$2');
	
	try{
		var data={
			type:type,
			time:mytime,
			number:mynumber,
			data:data
		}
		
	
	
		return data;
	}catch(err){
		throw('解析重庆时时彩数据失败');
	}
}
//从彩经获取pk10
function getPk10Fromcj(str, type){
	
	str = str.substr(str.indexOf('id="n_bjpk10"'),1050).replace(/[\r\n]+/g,'');
	
	
	var reg =/value='(\d+)'/g;
	
	var data='';
	while(reg.test(str)){
		data+=RegExp.$1+",";
		
		}

	if(data.length==0){
		throw new Error('pk10数据不正确');
		
	}
	data=data.substr(0,data.length-1);
	reg=/<td class="qihao">(\d+)[\s\S]*?<\/td>/;
	var match=str.match(reg);
	if(!match) throw new Error('pk10数据不正确');
	
	var myDate = new Date();
	var year = myDate.getFullYear();       //年   
    var month = myDate.getMonth() + 1;     //月   
    var day = myDate.getDate();            //日
	if(month < 10) month="0"+month;
	if(day < 10) day="0"+day;
	var mytime=year + "-" + month + "-" + day + " " +myDate.toLocaleTimeString();
	var ano = match[1];
	

	
	
	try{
		var data={
			type:type,
			time:mytime,
		
			number:ano,
			data:data
		}
		
		return data;
	}catch(err){
		throw('解析pk10数据失败');
	}
}
//从彩经获取山东11选5数据
function getshandong11Fromcj(str, type){

	

	str = str.substr(str.indexOf('id="n_11ydj"'),800).replace(/[\r\n]+/g,'');

	
	var reg =/value='(\d+)'/g;
	
	var data='';
	while(reg.test(str)){
		data+=RegExp.$1+",";
		
		}

	if(data.length==0){
		throw new Error('彩经网山东11选5数据不正确');
		
	}
	data=data.substr(0,data.length-1);
	reg=/<td class="qihao">(\d+)[\s\S]*?<\/td>/;
	var match=str.match(reg);
	if(!match) throw new Error('彩经网山东11选5数据不正确');
	
	var myDate = new Date();
	var year = myDate.getFullYear();       //年   
    var month = myDate.getMonth() + 1;     //月   
    var day = myDate.getDate();            //日
	if(month < 10) month="0"+month;
	if(day < 10) day="0"+day;
	var mytime=year + "-" + month + "-" + day + " " +myDate.toLocaleTimeString();
	var ano = match[1];

	

	if(ano.length==7) ano=year+ano.replace(/(\d{8})(\d{3})/,'$1-$2');
	if(ano.length==6) ano=year+ano.replace(/(\d{4})(\d{2})/,'$1-0$2');
	if(ano.length==9) ano='20'+ano.replace(/(\d{6})(\d{2})/,'$1-$2');
	if(ano.length==10) ano=ano.replace(/(\d{8})(\d{2})/,'$1-0$2');
	var mynumber=ano.replace(/(\d{8})(\d{3})/,'$1-$2');

	
	
	try{
		var data={
			type:type,
			time:mytime,
			number:mynumber,
			data:data
		}
		//console.log('彩经网山东11选5 from caijing');
	
		//console.log(data);
		return data;
	}catch(err){
		throw('解析彩经网山东11选5数据失败');
	}

}
//从彩经获取广东11选5数据
function getguangdong11Fromcj(str, type){
	

	str = str.substr(str.indexOf('id="n_gd11x5"'),800).replace(/[\r\n]+/g,'');
	
	
	var reg =/value='(\d+)'/g;
	
	var data='';
	while(reg.test(str)){
		data+=RegExp.$1+",";
		
		}

	if(data.length==0){
		throw new Error('彩经网广东11选五数据不正确');
		
	}
	data=data.substr(0,data.length-1);
	reg=/<td class="qihao">(\d+)[\s\S]*?<\/td>/;
	var match=str.match(reg);
	if(!match) throw new Error('彩经网广东11选五数据不正确');
	
	var myDate = new Date();
	var year = myDate.getFullYear();       //年   
    var month = myDate.getMonth() + 1;     //月   
    var day = myDate.getDate();            //日
	if(month < 10) month="0"+month;
	if(day < 10) day="0"+day;
	var mytime=year + "-" + month + "-" + day + " " +myDate.toLocaleTimeString();
	var ano = match[1];

	

	if(ano.length==7) ano=year+ano.replace(/(\d{8})(\d{3})/,'$1-$2');
	if(ano.length==6) ano=year+ano.replace(/(\d{4})(\d{2})/,'$1-0$2');
	if(ano.length==9) ano='20'+ano.replace(/(\d{6})(\d{2})/,'$1-$2');
	if(ano.length==10) ano=ano.replace(/(\d{8})(\d{2})/,'$1-0$2');
	var mynumber=ano.replace(/(\d{8})(\d{3})/,'$1-$2');

	
	
	try{
		var data={
			type:type,
			time:mytime,
			number:mynumber,
			data:data
		}
		//console.log('彩经网广东11选五 from caijing');
	//
		//console.log(data);
		return data;
	}catch(err){
		throw('解析彩经网广东11选五数据失败');
	}
}
//从彩经获取广东快乐十分数据
function getguangdong10Fromcj(str, type){
	

	str = str.substr(str.indexOf('id="n_gdklsf"'),1000).replace(/[\r\n]+/g,'');
	
	
	var reg =/value='(\d+)'/g;
	
	var data='';
	while(reg.test(str)){
		data+=RegExp.$1+",";
		
		}

	if(data.length==0){
		throw new Error('彩经网广东快乐十分数据不正确');
		
	}
	data=data.substr(0,data.length-1);
	reg=/<td class="qihao">(\d+)[\s\S]*?<\/td>/;
	var match=str.match(reg);
	if(!match) throw new Error('彩经网广东快乐十分数据不正确');
	
	var myDate = new Date();
	var year = myDate.getFullYear();       //年   
    var month = myDate.getMonth() + 1;     //月   
    var day = myDate.getDate();            //日
	if(month < 10) month="0"+month;
	if(day < 10) day="0"+day;
	var mytime=year + "-" + month + "-" + day + " " +myDate.toLocaleTimeString();
	var ano = match[1];

	

	if(ano.length==7) ano=year+ano.replace(/(\d{8})(\d{3})/,'$1-$2');
	if(ano.length==6) ano=year+ano.replace(/(\d{4})(\d{2})/,'$1-0$2');
	if(ano.length==9) ano='20'+ano.replace(/(\d{6})(\d{2})/,'$1-$2');
	if(ano.length==10) ano=ano.replace(/(\d{8})(\d{2})/,'$1-0$2');
	var mynumber=ano.replace(/(\d{8})(\d{3})/,'$1-$2');

	
	
	try{
		var data={
			type:type,
			time:mytime,
			number:mynumber,
			data:data
		}
		//console.log('彩经网广东快乐十分from caijing');
	
		//console.log(data);
		return data;
	}catch(err){
		throw('解析彩经网广东快乐十分数据失败');
	}
}

//从爱彩乐 获取广东快乐十分数据
function getguangdong10Fromacl(str, type){
	
	
	str = str.substr(str.indexOf('data-id="1001"'),350).replace(/[\r\n]+/g,'');
	//console.log(str);
	
	var reg =/<em class="ball">(\d+)<\/em>/g;
	
	var data='';
	while(reg.test(str)){
		data+=RegExp.$1+",";
		
		}

	if(data.length==0){
		throw new Error('爱彩乐广东快乐十分数据不正确');
		
	}
	data=data.substr(0,data.length-1);
	reg=/<td>(\d+)<\/td>/;
	var match=str.match(reg);
	if(!match) throw new Error('爱彩乐广东快乐十分数据不正确');
	
	var myDate = new Date();
	var year = myDate.getFullYear();       //年   
    var month = myDate.getMonth() + 1;     //月   
    var day = myDate.getDate();            //日
	if(month < 10) month="0"+month;
	if(day < 10) day="0"+day;
	var mytime=year + "-" + month + "-" + day + " " +myDate.toLocaleTimeString();
	var ano = match[1];

	ano= ano.substr(2);

	if(ano.length==7) ano=year+ano.replace(/(\d{8})(\d{3})/,'$1-$2');
	if(ano.length==6) ano=year+ano.replace(/(\d{4})(\d{2})/,'$1-0$2');
	if(ano.length==9) ano='20'+ano.replace(/(\d{6})(\d{2})/,'$1-$2');
	if(ano.length==10) ano=ano.replace(/(\d{8})(\d{2})/,'$1-0$2');
	var mynumber=ano.replace(/(\d{8})(\d{3})/,'$1-$2');

	
	
	try{
		var data={
			type:type,
			time:mytime,
			number:mynumber,
			data:data
		}
	//	console.log('爱彩乐广东快乐十分from caijing');
	
	//	console.log(data);
		return data;
	}catch(err){
		throw('解析爱彩乐广东快乐十分数据失败');
	}
}
function getFromPK10(str, type){
	str=str.substr(str.indexOf('<div class="lott_cont">'),320).replace(/[\r\n]+/g,'');


	var reg=/<td>(\d+)<\/td>[\s\S]*?<td>(.*)<\/td>[\s\S]*?<td>([\d\:\- ]+?)<\/td>[\s\S]*?<\/tr>/,
	match=str.match(reg);
	if(!match) throw new Error('数据不正确');
	var myDate = new Date();
	var year = myDate.getFullYear();
	var mytime=match[3];
	try{
		var data={
			type:type,
			time:mytime,
		
			number:match[1],
			data:match[2]
		};
		
		return data;
	}catch(err){
		throw('解析数据失败');
	}
	
}

function getFromK8(str, type){

	str=str.substr(str.indexOf('<div class="lott_cont">'),450).replace(/[\r\n]+/g,'');
    //console.log(str);
	var reg=/<tr class=".*?">[\s\S]*?<td>(\d+)<\/td>[\s\S]*?<td>(.*)<\/td>[\s\S]*?<td>(.*)<\/td>[\s\S]*?<td>([\d\:\- ]+?)<\/td>[\s\S]*?<\/tr>/,
	match=str.match(reg);
	if(!match) throw new Error('数据不正确');
	//console.log(match);
	try{
		var data={
			type:type,
			time:match[4],
			number:match[1],
			data:match[2]+'|'+match[3]
		};
		//console.log(data);
		return data;
	}catch(err){
		throw('解析数据失败');
	}
	
}


function getFromCJCPWeb(str, type){

	//console.log(str);
	str=str.substr(str.indexOf('<table class="qgkj_table">'),1200);
	
	//console.log(str);
	
	var reg=/<tr>[\s\S]*?<td class=".*">(\d+).*?<\/td>[\s\S]*?<td class=".*">([\d\- \:]+)<\/td>[\s\S]*?<td class=".*">((?:[\s\S]*?<input type="button" value="\d+" class=".*?" \/>){3,5})[\s\S]*?<\/td>/,
	match=str.match(reg);
	
	//console.log(match);
	
	if(!match) throw new Error('数据不正确');
	try{
		var data={
			type:type,
			time:match[2],
			number:match[1].replace(/(\d{8})(\d{2})/,'$1-0$2')
		}
		
		reg=/<input type="button" value="(\d+)" class=".*?" \/>/g;
		data.data=match[3].match(reg).map(function(v){
			var reg=/<input type="button" value="(\d+)" class=".*?" \/>/;
			return v.match(reg)[1];
		}).join(',');
		
		//console.log(data);
		return data;
	}catch(err){
		throw('解析数据失败');
	}
	
}

function getFromCaileleWeb_1(str, type){
	str=str.substr(str.indexOf('<tbody id="openPanel">'), 120).replace(/[\r\n]+/g,'');
         
	var reg=/<tr.*?>[\s\S]*?<td.*?>(\d+)<\/td>[\s\S]*?<td.*?>([\d\:\- ]+?)<\/td>[\s\S]*?<td.*?>([\d\,]+?)<\/td>[\s\S]*?<\/tr>/,
	match=str.match(reg);
	if(!match) throw new Error('数据不正确');
	//console.log(match);
	var number,_number,number2;
	var d = new Date();
	var y = d.getFullYear();
	if(match[1].length==9 || match[1].length==8){number='20'+match[1];}else if(match[1].length==7){number='2014'+match[1];}else{number=match[1];}
	_number=number;
	if(number.length==11){number2=number.replace(/^(\d{8})(\d{3})$/, '$1-$2');}else{number2=number.replace(/^(\d{8})(\d{2})$/, '$1-0$2');_number=number.replace(/^(\d{8})(\d{2})$/, '$10$2');}
	try{
		var data={
			type:type,
			time:_number.replace(/^(\d{4})(\d{2})(\d{2})\d{3}/, '$1-$2-$3 ')+match[2],
			number:number2,
			data:match[3]
		};
		//console.log(data);
		return data;
	}catch(err){
		throw('解析数据失败');
	}
}

function getFrom360sd11x5(str, type){

	str=str.substr(str.indexOf('<em class="red" id="open_issue">'),380);
	//console.log(str);
	var reg=/[\s\S]*?(\d+)<\/em>[\s\S].*?<ul id="open_code_list">((?:[\s\S]*?<li class=".*?">\d+<\/li>){3,5})[\s\S]*?<\/ul>/,
	match=str.match(reg);
	var myDate = new Date();
	var year = myDate.getFullYear();       //年   
    var month = myDate.getMonth() + 1;     //月   
    var day = myDate.getDate();            //日
	if(month < 10) month="0"+month;
	if(day < 10) day="0"+day;
	var mytime=year + "-" + month + "-" + day + " " +myDate.toLocaleTimeString(); 
	//console.log(mytime);
	//console.log(match);
	
	if(!match) throw new Error('数据不正确');
	try{
		var data={
			type:type,
			time:mytime,
			number:year+match[1].replace(/(\d{4})(\d{2})/,'$1-0$2')
		}
		
		reg=/<li class=".*?">(\d+)<\/li>/g;
		data.data=match[2].match(reg).map(function(v){
			var reg=/<li class=".*?">(\d+)<\/li>/;
			return v.match(reg)[1];
		}).join(',');
		
		//console.log(data);
		return data;
	}catch(err){
		throw('解析数据失败');
	}
}

function getFromCaileleWeb_2(str, type){
	
	if(type==17){
		str=str.substr(str.indexOf('<tbody id="openPanel">'), 500).replace(/[\r\n]+/g,'');
	
	}
	str=str.substr(str.indexOf('<tbody id="openPanel">'), 500).replace(/[\r\n]+/g,'');
	//console.log(str);
	var reg=/<tr>[\s\S]*?<td>(\d+)<\/td>[\s\S]*?<td>([\d\:\- ]+?)<\/td>[\s\S]*?<td>([\d\,]+?)<\/td>[\s\S]*?<\/tr>/,
	match=str.match(reg);
	if(!match) throw new Error('数据不正确');
	//console.log(match);
	var number,_number,number2;
	var d = new Date();
	var y = d.getFullYear();
	if(match[1].length==9 || match[1].length==8){number='20'+match[1];}else if(match[1].length==7){number='2014'+match[1];}else{number=match[1];}
	_number=number;
	if(number.length==11){number2=number.replace(/^(\d{8})(\d{3})$/, '$1-$2');}else{number2=number.replace(/^(\d{8})(\d{2})$/, '$1-0$2');_number=number.replace(/^(\d{8})(\d{2})$/, '$10$2');}
	try{
		var data={
			type:type,
			time:_number.replace(/^(\d{4})(\d{2})(\d{2})\d{3}/, '$1-$2-$3 ')+match[2],
			number:number2,
			data:match[3]
		};
		//console.log(data);
		return data;
	}catch(err){
		throw('解析数据失败');
	}
}

/*{
title:'CQC',
source:'彩乐乐',
name:'cqssc',
enable:true,
timer:'cqssc',

option:{
	host:"www.cailele.com",
	timeout:10000,
	path: '/static/ssc/newlyopenlist.xml',
	headers:{
		"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "
	}
},
parse:function(str){
	try{
		//return getFromCaileleWeb(str,1);
		str=str.substr(0,200);
		var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
		//<row expect="20130720017" opencode="4,9,1,2,9" opentime="2013-07-20 01:25:30"/>
		var m;

		if(m=str.match(reg)){
			return {
				type:1,
				time:m[3],
				number:m[1].replace(/^(\d{8})(\d{3})$/, '$1-$2'),
				data:m[2]
			};
		}					
		
	}catch(err){
		throw('重庆时时彩解析数据不正确');
	}
}
},*/
/*{
title:'JXC',
source:'彩乐乐',
name:'jxssc',
enable:true,
timer:'jxssc',

option:{
	host:"www.cailele.com",
	timeout:10000,
	path: '/static/jxssc/newlyopenlist.xml',
	headers:{
		"User-Agent": "Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0; Sleipnir/2.9.8)"
	}
},

parse:function(str){
	try{
		console.log("2222222222222222江西时时彩开始解析数据");
		//return getFromShishicaiWeb(str,3);
		str=str.substr(0,200);
		var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
		//<row expect="20130719084" opencode="3,0,6,3,6" opentime="2013-07-19 23:12:25"/>
		var m;

		if(m=str.match(reg)){
			return {
				type:3,
				time:m[3],
				number:m[1].replace(/^(\d{8})(\d{3})$/, '$1-$2'),
				data:m[2]
			};
		}	
	}catch(err){
		throw('2222222222222222222222江西时时彩解析数据不正确');
	}
}
},*/
/*{
title:'重庆11选5',
source:'彩乐乐',
name:'cq11x5',
enable:true,
timer:'cq11x5',

option:{
	host:"www.cailele.com",
	timeout:10000,
	path: '/lottery/cq11x5/',
	headers:{
		"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
	}
},
parse:function(str){
	try{
		return getFromCaileleWeb_1(str,15);
	}catch(err){
		//throw('重庆11选5解析数据不正确');
	}
}
},
{
		title:'广东快乐十分',
		source:'彩乐乐',
		name:'gdklsf',
		enable:true,
		timer:'gdklsf',

		option:{
			host:"www.cailele.com",
			timeout:10000,
			path: '/lottery/klsf/',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0)"
			}
		},
		
		parse:function(str){
			try{
				console.log("!!!!!!!!!!!!!!!!!广东快乐十分开始解析数据");
				return getFromCaileleWeb_2(str,17);
			}catch(err){
				throw('！！！！！！！！！！！！！！！！！！！！广东快乐十分解析数据不正确');
			}
		}
	},
*
*
*/