<?php
/**
  * wechat php test
  */

//define your token
define("TOKEN", "baodian");
$wechatObj = new wechatCallbackapiTest();
//$wechatObj->valid();
$wechatObj->responseMsg();
//$wechatObj->uploadmenu();
class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		//$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
		$postStr = file_get_contents("php://input");
		
		file_put_contents("/opt/lampp/htdocs/canon/wxapi/log.txt",$postStr);
      	//extract post data
		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";             
				if($keyword=="php")
                {
              		$msgType = "text";
                	$contentStr = "php 是世界上最好的语言，没有之一！";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }elseif($keyword=="衬衫"){

					echo $this->replytuwen($postObj);
					
				}else{
                	echo "Input something...";
                }

        }else {
        	echo "";
        	exit;
        }
    }
		
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
	
	function uploadmenu(){
		
		
		$at_url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxdb534d344f595bfb&secret=bfb27291ec050ffb98677aeead9495f5';
		$data = file_get_contents($at_url);
		var_dump($data);
		$dataarr = json_decode($data,true);
		$str = '{
     "button":[
     {	
          "type":"click",
          "name":"今日歌曲",
          "key":"V1001_TODAY_MUSIC"
      },
      {
           "name":"菜单",
           "sub_button":[
           {	
               "type":"view",
               "name":"搜索",
               "url":"http://www.soso.com/"
            },
            {
               "type":"view",
               "name":"视频",
               "url":"http://v.qq.com/"
            },
            {
               "type":"click",
               "name":"赞一下我们",
               "key":"V1001_GOOD"
            }]
       }]
 }';
		$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$dataarr['access_token'];
		echo $url."<br>";
		$ch = curl_init ();
		// print_r($ch);
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_POST, 1 );
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $str );
		$return = curl_exec ( $ch );
		curl_close ( $ch );
		 
		print_r($return);
	}
	
	function replytuwen($object){
		
		$newsArray = array();
		$newsArray[] = array("Title"=>"多图文衬衫1标题", "Description"=>"衬衫1描述描述描述描述描述描述描述", "PicUrl"=>"http://img5.imgtn.bdimg.com/it/u=2866043875,3549028736&fm=11&gp=0.jpg", "Url" =>"http://123.56.249.121/canon/wxapi/goods.php?id=1");
		$newsArray[] = array("Title"=>"多图文衬衫2标题", "Description"=>"衬衫2描述描述描述描述描述描述描述", "PicUrl"=>"http://img3.imgtn.bdimg.com/it/u=2528850634,2095077327&fm=21&gp=0.jpg", "Url" =>"http://123.56.249.121/canon/wxapi/goods.php?id=1");
		$newsArray[] = array("Title"=>"多图文衬衫3标题", "Description"=>"衬衫3描述描述描述描述描述描述描述", "PicUrl"=>"http://heilongjiang.sinaimg.cn/2013/0923/U9117P1274DT20130923134717.jpg", "Url" =>"http://123.56.249.121/canon/wxapi/sample.php");
		if(!is_array($newsArray)){
            return;
        }
        $itemTpl = "<item>
			<Title><![CDATA[%s]]></Title>
			<Description><![CDATA[%s]]></Description>
			<PicUrl><![CDATA[%s]]></PicUrl>
			<Url><![CDATA[%s]]></Url>
		</item>";
        $item_str = "";
		
        foreach ($newsArray as $item){
            $item_str .= sprintf($itemTpl, $item['Title'], $item['Description'], $item['PicUrl'], $item['Url']);
        }
        $xmlTpl = "<xml>
			<ToUserName><![CDATA[%s]]></ToUserName>
			<FromUserName><![CDATA[%s]]></FromUserName>
			<CreateTime>%s</CreateTime>
			<MsgType><![CDATA[news]]></MsgType>
			<ArticleCount>%s</ArticleCount>
			<Articles>
			$item_str</Articles>
			</xml>";

        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time(), count($newsArray));
				file_put_contents("/opt/lampp/htdocs/canon/wxapi/log.txt",$result);
        return $result;	   
 
	}
 
}

?>