<?php
	 function HmacMd5($data,$key)
			{
			$key=iconv("GB2312","UTF-8",$key);
			$data=iconv("GB2312","UTF-8",$data);
			$b=64;
			if(strlen($key)>$b)
			{
			$key=pack("H*",md5($key));
			}
			$key=str_pad($key,$b,chr(0x00));
			$ipad=str_pad('',$b,chr(0x36));
			$opad=str_pad('',$b,chr(0x5c));
			$k_ipad=$key^$ipad;
			$k_opad=$key^$opad;
			return md5($k_opad.pack("H*",md5($k_ipad.$data)));
} 
?>