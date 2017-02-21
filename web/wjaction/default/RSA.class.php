<?php 
function privatekey_decodeing($crypttext)  
{  
    $key_content = '-----BEGIN RSA PRIVATE KEY-----
MIICXQIBAAKBgQDqNC3UPY3/07AzVVqW2BtFMQaiZNuO9z8NRlpwUY0FfaMpqqV1
KSUZ0sin8+we7p3q/Vdlk5QHwWl9HD+7HqseKQsJVwiostKHvwj3BXUff5xVqBnh
xVRFOrU4U6YSpuETNKNxNDwIhhKzlY7JKmvz3F0yDS8z5q9FIHCyhOG6pwIDAQAB
AoGBAKDuM+OYXH/DDVtotjPa0XpNAtsJ5NirSncrta9iSj3QpBJYgRMtr6G79kd6
U/C5VGgJp0lUDC78FylyBNTmcPua3PX2RMICUbK5qW3xv19/amYO89ni95bhS3AF
g7IloRtlTj88mfZlnGyCnQVNHLv3p7T7IQUtQNaInhrMMDKpAkEA/FF2pMt5Dd4v
+PYCpiljG07K/RwCypxRdd1eACZb/nBgDWdrykjy1517AunBECuAh2cr7OmyYn1U
y2ZoB2CJRQJBAO2fDJNJjH4RJDMsn5KAgu6OThQEdG/4CXTv24x0qJ1nnZDncNg1
kUf1LXtSqo3VUk6f2fCN0FbTQtCca4c21PsCQQDd7R0Ip3rrCrFxLZh449Aq1avO
4lNGOCWiILmsMhEaA2dIgt2ZB36ozPfEQSuxeEHNVp6Y+5gN7qSlXoZDbtJtAkBd
TiTb+Pdn0UdLqOwH1NqU3eAe0BkAln7wIfct0ekb1cHzUk3nODGR9d4kHLPH+cnW
AcLMSINUdKQ50hIPCCLdAkBjRsnLbomM/auBEaiGo6Hp9RZEdmD+YTtW8cGjOMAx
S8GhHMCJ8Nl8AM6dfXIbjOBsRDYpUyNxmOXIqCEnj7zj
-----END RSA PRIVATE KEY-----';  
    $prikeyid    = openssl_get_privatekey($key_content); 
    $padding = OPENSSL_NO_PADDING;
    if (openssl_private_decrypt($crypttext, $sourcestr, $prikeyid, $padding))  
    {  
        return rtrim(strrev($sourcestr), "/0");
    }  
    return;
}
?>