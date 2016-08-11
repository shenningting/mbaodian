<?php
$appid='wxdb534d344f595bfb';
$redirect_uri = urlencode ('http://www.mbaodian.com/getUserInfo.php');
$url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$redirect_uri&response_type=code&scope=snsapi_base&state=1#wechat_redirect";
header("Location:".$url);
?>
