<?php
/**
 * 注数计算函数
 */
class Bet{

	//{{{ 计算函数集
	
	// 直选复式
	// 大小单双
	public static function fs($bet){
		$bets=explode(',', $bet);
		$ret=1;
		
		foreach($bets as $b){
			$codes=str_split($b);
			$ret*=count($codes);
		}
		
		return $ret;
	}

	// 直选单式
	// 二星直选组选单式
	public static function ds($bet){
		return count(explode('|', $bet));
	}
	
	// 组三
	public static function z3($bet){
		if(strpos($bet, ',')===false && !preg_match('/(\d).*\1/', $bet)){
			return self::A(count(str_split($bet)), 2);
		}else{
			// 来自混合组选
			return count(explode(',', $bet));
		}
	}
	
	// 组六
	public static function z6($bet){
		if(strpos($bet, ',')===false && !preg_match('/(\d).*\1/', $bet)){
			return self::C(count(str_split($bet)), 3);
		}else{
			return count(explode(',', $bet));
		}
	}
	
	// 组二
	public static function z2($bet){
		return self::C(count(str_split($bet)), 2);
	}
	
	// 五星定位胆
	// 三星定位胆
	// 五星定胆
	public static function dwd($bet){
		return strlen(str_replace(array(',','-'), '', $bet));
	}
	
	// 十星定胆
	public static function dwd10($bet){
		return strlen(str_replace(array(',','-',' '), '', $bet))/2;
	}
	
	// 大小单双
	public static function dxds($bet){
		$bet=str_replace(array('大','小','单', '双'), array(1,2,3,4), $bet);
		return self::fs($bet);
	}

	// 定单双
	public static function dds($bet){
		$bet=str_replace(array('5单0双','4单1双','3单2双','2单3双','1单4双','0单5双'), array(1,2,3,4,5,6), $bet);
		return self::fs($bet);
	}
	
	// 龙虎
	public static function lh($bet){
		$bet=str_replace(array('龙','虎'), array(1,2), $bet);
		return self::fs($bet);
	}

	// 组选120
	public static function zx120($bet){
		$check=array('0','1','2','3','4','5','6','7','8','9');
		$bet=explode(',', $bet);$bet0=array_unique($bet);$codes=0;
        foreach($bet0 as $bets){
           if(in_array($bets,$check)) $codes+=1;
        }
        if($codes==count($bet)) return self::C($codes,5);
	}

	// 任选一
	public static function r1sscqw($bet){
		$check=array('0','1','2','3','4','5','6','7','8','9');
		$bet=explode(' ', $bet);$bet0=array_unique($bet);$count=0;
		foreach($bet0 as $bets){
			if(in_array($bets,$check)) $count+=1;
		}
		if($count==count($bet)) return $count;
	}
	// 任选2单式
	public static function rx2ds($bet){
		$a=explode('|', $bet);
        foreach($a as $b){
          $c=explode(',', $b);
          $e=array_count_values($c);
          if($e['-']!=3 || count($c)!=5) return 0;
        }
        return count($a);
	}
	// 任选3单式
	public static function rx3ds($bet){
		$a=explode('|', $bet);
        foreach($a as $b){
          $c=explode(',', $b);
          $e=array_count_values($c);
          if($e['-']!=2 || count($c)!=5) return 0;
        }
        return count($a);
	}
	// 任选4单式
	public static function rx4ds($bet){
		$a=explode('|', $bet);
        foreach($a as $b){
          $c=explode(',', $b);
          $e=array_count_values($c);
          if($e['-']!=1 || count($c)!=5) return 0;
        }
        return count($a);
	}

	//{{{ 十一选五
	
	// 任选一
	public static function r111x5($bet){
		$check=array('01','02','03','04','05','06','07','08','09','10','11');
		$bet=explode(' ', $bet);$bet0=array_unique($bet);$count=0;
		foreach($bet0 as $bets){
			if(in_array($bets,$check)) $count+=1;
		}
		if($count==count($bet)) return $count;
	}
	
	// 任选二
	// 前二组选
	public static function r211x5($bet){
		$check=array('01','02','03','04','05','06','07','08','09','10','11');
		$k=$bet;$k=explode(' ', $k);$bet0=array_unique($k);$count=0;
		foreach($bet0 as $bets){
			if(in_array($bets,$check)) $count+=1;
		}
		if($count==count($k)) return self::rx($bet, 2);
	}
	
	// 任选三
	// 前三组选
	public static function r311x5($bet){
		$check=array('01','02','03','04','05','06','07','08','09','10','11');
		$k=$bet;$k=explode(' ', $k);$bet0=array_unique($k);$count=0;
		foreach($bet0 as $bets){
			if(in_array($bets,$check)) $count+=1;
		}
		if($count==count($k)) return self::rx($bet, 3);
	}
	public static function r411x5($bet){
		$check=array('01','02','03','04','05','06','07','08','09','10','11');
		$k=$bet;$k=explode(' ', $k);$bet0=array_unique($k);$count=0;
		foreach($bet0 as $bets){
			if(in_array($bets,$check)) $count+=1;
		}
		if($count==count($k)) return self::rx($bet, 4);
	}
	public static function r511x5($bet){
		$check=array('01','02','03','04','05','06','07','08','09','10','11');
		$k=$bet;$k=explode(' ', $k);$bet0=array_unique($k);$count=0;
		foreach($bet0 as $bets){
			if(in_array($bets,$check)) $count+=1;
		}
		if($count==count($k)) return self::rx($bet, 5);
	}
	public static function r611x5($bet){
		$check=array('01','02','03','04','05','06','07','08','09','10','11');
		$k=$bet;$k=explode(' ', $k);$bet0=array_unique($k);$count=0;
		foreach($bet0 as $bets){
			if(in_array($bets,$check)) $count+=1;
		}
		if($count==count($k)) return self::rx($bet, 6);
	}
	public static function r711x5($bet){
		$check=array('01','02','03','04','05','06','07','08','09','10','11');
		$k=$bet;$k=explode(' ', $k);$bet0=array_unique($k);$count=0;
		foreach($bet0 as $bets){
			if(in_array($bets,$check)) $count+=1;
		}
		if($count==count($k)) return self::rx($bet, 7);
	}
	public static function r811x5($bet){
		$check=array('01','02','03','04','05','06','07','08','09','10','11');
		$k=$bet;$k=explode(' ', $k);$bet0=array_unique($k);$count=0;
		foreach($bet0 as $bets){
			if(in_array($bets,$check)) $count+=1;
		}
		if($count==count($k)) return self::rx($bet, 8);
	}



	public static function r1($bet){
		return count(explode(' ', $bet));
	}
	
	// 任选二
	// 前二组选
	public static function r2($bet){
		return self::rx($bet, 2);
	}
	
	// 任选三
	// 前三组选
	public static function r3($bet){
		return self::rx($bet, 3);
	}
	public static function r4($bet){
		return self::rx($bet, 4);
	}
	public static function r5($bet){
		return self::rx($bet, 5);
	}
	public static function r6($bet){
		return self::rx($bet, 6);
	}
	public static function r7($bet){
		return self::rx($bet, 7);
	}
	public static function r8($bet){
		return self::rx($bet, 8);
	}
	public static function r9($bet){
		return self::rx($bet, 9);
	}
	public static function r10($bet){
		return self::rx($bet, 10);
	}
	
	// 十一选五直选
	public static function zx11($bet){
		$bets=explode(',', $bet);
		$ret=1;
		
		foreach($bets as $b){
			$codes=explode(' ', $b);
			$ret*=count($codes);
		}
		
		return $ret;
	}
	
	// 排除对子 豹子
	public static function descar($bet){
		$bets=explode(',', $bet);
		$ret=1;
		foreach($bets as $b){
			$codes=str_split($b);
			$ret*=count($codes);

		}
		return $ret;
	}

	//{{{ 常用算法
	//排列
	//A(n,m)=n(n-1)(n-2)……(n-m+1)= n!/(n-m)!
	public static function A($n, $m){
		if($n<$m) return false;
		$num=1;
		for($i=0; $i<$m; $i++) $num*=$n-$i;
		return $num;
	}

	//组合
	//C(n,m)=A(n,m)/m!=n!/((n-m)!*m!)
	public static function C($n, $m){
		if($n<$m) return false;
		return self::A($n, $m)/self::A($m, $m);
	}

	// 十一选五任选
	public static function rx($bet, $num){
		if($pos=strpos($bet, ')')){
			$dm=substr($bet, 1, $pos-1);
			$tm=substr($bet, $pos+1);
			
			//printf("胆码：%s，拖码：%s", $dm, $tm);
			$len = count(explode(' ', $tm));
			$num-=count(explode(' ', $dm));
		}else{
			$len = count(explode(' ', $bet));
		}
		
		return self::C($len, $num);
	}
	//}}}
	public static function Sames($a,$b){
	$num=0;
	for ($i=0;$i<count($a);$i++)
	{   $zt=0;
		for ($j=0;$j<count($b);$j++)
		{
			if($a[$i]-$b[$j]==0){
				$zt=1;
			}
		}
		if($zt==1){
			$num+=1; 
		}
	}
	return $num;
    }
}