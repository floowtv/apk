<?php
	//if (stristr($_SERVER['HTTP_REFERER'],"ancokplayer.win") || 
    //stristr($_SERVER['HTTP_REFERER'],"https://servicoop.000webhostapp.com")|| 
    //stristr($_SERVER['HTTP_REFERER'],"yourdomainname.com")) {   
;?>
<!DOCTYPE html><html><head><title>Google Photos Jwplayer | Ancok Player</title><meta name="robots" content="noindex"><meta name="referrer" content="never"/><meta name="referrer" content="no-referrer"/><link rel="icon" href="https://cdn.staticaly.com/gh/domkiddie/drive/master/assets/img/favicon.png"><style type="text/css" media="screen">html,body{background:#000;padding:0;margin:0;width:100%;height:100%;overflow:hidden}.jwplayer{position:absolute;width:100%;height:100%;}#hideads{position:absolute;z-index:9;top:0px;left:0px;width:100%;height:100%;background-color:rgba(0, 0, 0,.3);text-align:center}#ancok-player{width:100%;height:100%}.ancok-iframe{position:absolute;width:100%;height:100%}#hideads .in_player_close {position:relative;display:inline-block;background: linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%); none repeat scroll 0% 0%;color: white;width: 100%;cursor: pointer;font-size: 16px;text-decoration: none;line-height:29px;text-align: center;max-width: 300px;text-transform: uppercase;}.ads-box{color:#fff;margin:0 auto;display:block;text-align:center;max-width: 300px;max-height:300px}@media (max-width: 576px) {#hideads .in_player_close {display:inline-block;background: linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%); none repeat scroll 0% 0%;color: white;width: 100%;cursor: pointer;font-size: 13px;text-decoration: none;line-height:29px;text-align: center;max-width: 200px;text-transform: uppercase;}.ads-box img{margin:0 auto;display:block;text-align:center;max-width: 200px;max-height:200px}}</style><link href="https://api.cinemovie.co.network/process/assets/ancokplayer_loader.css" rel="stylesheet"></head><body>
        <?php 
		error_reporting(0);
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
function split_link($link) {
	$spilt = chunk_split($link, 500, "=");
	$array = explode('=', $spilt);
	foreach($array as $i => $data) {
		$list .= 'link'.($i+1).'='.$data.'&';
	}
	$split_link = rtrim($list, '&');
	return $split_link;
}
		$data = (isset($_GET['id'])) ? $_GET['id'] : '';
		if ($data != '') {
			include_once 'library.php';
			require_once 'packer.php';			
			include_once 'curl.php';
			include_once 'ancokcrypt.php';
			$data = json_decode(decode($data));
			$link = (isset($data->link)) ? $data->link : '';			
			$link = str_replace("&amp;","&",$link);
	        $link_source = curl("https://nontongo.win/api-gphotos.php?link=".$link);
	        $link4 = (isset($data->link4)) ? $data->link4 : '';
			$banner_ads = (isset($data->banner_ads)) ? $data->banner_ads : '';
			$show_hide = (isset($data->show_hide)) ? $data->show_hide : '';
			$hide_button = (isset($data->hide_button)) ? $data->hide_button : '';
            $godowncok = ancokplayer_hashx($link);
            $sub = (isset($data->sub)) ? $data->sub : '';
            $godownsub = ancokplayer_hashx($sub);
			$sub_label = (isset($data->sub_label)) ? $data->sub_label : '';
			$poster = (isset($data->poster)) ? $data->poster : '';;
			$advast = (isset($data->advast)) ? $data->advast : '';
			$pick = 'https://nontongo.win/download-gphotos.php?url='.$godowncok.'&sub='.$godownsub.'';
			$hashdown = ancokplayer_hashx($pick);
			$result = '<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
<script src="https://content.jwplatform.com/libraries/LJ361JYj.js"></script>
<script>jwplayer.key = "ypdL3Acgwp4Uh2/LDE9dYh3W/EPwDMuA2yid4ytssfI=";</script>	
<div id="ancok-player"></div>';
			$data = 'var videoPlayer = jwplayer("ancok-player");videoPlayer.setup({sources: ['.$link_source.'],preload:"auto",primary:"html5",autostart:"false",image:"'.$poster.'",width:"100%",height:"100%",playbackRateControls:[0.25,0.5,0.75,1,2,3,4],tracks:[{file:"'.$sub.'",label:"'.$sub_label.'",kind:"captions",default:"true",}],captions:{color:"#FFFF00",fontSize:15,edgeStyle:"uniform",backgroundOpacity:0,},aboutlink:"https://ancokplayer.win",abouttext:"Player By Ancok Player",sharing:{sites:["facebook","twitter","googleplus","linkedin","pinterest"]},advertising:{client:"vast",admessage:"This is an ad pod. This ad ends in xx seconds.",schedule:{adbreak1:{offset:"pre",tag:"'.$advast.'"},overlay:{offset:"5",tag: "overlay.xml",type:"nonlinear"},adbreak2:{ offset:"50%",tag:"'.$advast.'"},overlay:{offset:"5", tag:"overlay.xml",type:"nonlinear"},}}});
videoPlayer.on("error",function()
{swal({title:"Ancok Error!",text:"Please wait, we are switching to another server!",timer:3000})}
);
videoPlayer.on("error",function()
{$("#ancok-player").html("<div class=\"ancok-iframe\"> <iframe src=\"no need backup\" width=\"100%\" height=\"100%\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" class=\"ancok-box\"></iframe></div>")}
);
videoPlayer.on("adBlock",function(){
alert("Hello Users, please disable your ad blocker, thanks");
videoPlayer.load({file:"https://dl.dropboxusercontent.com/s/f4y89embdxq56dg/adblock_Ancok.mp4", image:"https://dl.dropboxusercontent.com/s/z9fmp0xto0x5xym/adblock_Ancok.jpg"});
});
'.$hide_button.'videoPlayer.addButton("https://iproxy.co.network/download.svg",
'.$hide_button.'"Download Video",function() 
'.$hide_button.'{
'.$hide_button.'window.open(
'.$hide_button.'"download.php?url='.$hashdown.'","_blank");
'.$hide_button.'},
'.$hide_button.'"download"
'.$hide_button.');
';
$packer = new Packer($data, 'Normal', true, false, true);
$packed = $packer->pack();
$result .= '<script type="text/javascript">' . $packed . '</script>';
echo $result;
} else echo 'Error, please contact Ancok Namhay!';
?>
<!-- ADS START --->
<div  style="display:<?php echo $show_hide;?>">
<div id="hideads">
<div class="ads-box">
<div style="margin-top: 20px;">
<a class="in_player_close" onclick="$('#hideads').remove();jwplayer().play();">Close ad &amp; Play</a>
<?php echo $banner_ads;?>
</div>
</div>
</div>
</div><!-- ads show hide -->
<!-- ADS END -->
</div>    
</div>
</body>
</html>
<?php
//}
//else echo '<!DOCTYPE html><html><head><title>403 Forbidden</title><style>@import url("https://fonts.googleapis.com/css?family=Share+Tech+Mono|Montserrat:700");*{margin:0;padding:0;border:0;font-size: 100%;font:inherit;vertical-align:baseline;box-sizing:border-box;color:inherit;}body{  background-image: linear-gradient(120deg,#4f0088 0%,#000000 100%);height:100vh;}h1{font-size:45vw;text-align:center;position:fixed;width:100vw;z-index:1;color:#ffffff26;text-shadow:0 0 50px rgba(0, 0, 0, 0.07);top:50%;   transform: translateY(-50%);font-family:"Montserrat",monospace;}div{background:rgba(0, 0, 0, 0);width:70vw;    position: relative;top:50%;transform:translateY(-50%);margin:0 auto;padding:30px 30px 10px;box-shadow:0 0 150px -20px rgba(0, 0, 0, 0.5);z-index:3;}p{font-family:"Share Tech Mono", monospace;color:#f5f5f5;margin:0 0 20px;   font-size:17px;line-height:1.2;}span{color:#f0c674;}i{color:#8abeb7;}div a{text-decoration: none;}b{color:#81a2be;}a.avatar{position:fixed;bottom:15px;right: -100px;animation: slide 0.5s 4.5s forwards;display:block;z-index:4}a.avatar img {border-radius:100%;width:44px;border:2px solid white;}@keyframes slide{from{right:-100px;transform:rotate(360deg);opacity:0;}to{right:15px;transform:rotate(360deg);opacity:1;}}</style><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script></head><body><h1>403</h1><div><p>><span>ERROR CODE</span>: "<i>HTTP 403 Forbidden</i>"</p><p>> <span>ERROR DESCRIPTION</span>: "<i>Access Denied. You Do Not Have The Permission To Access This Page On This Server</i>"</p><p>> <span>ERROR POSSIBLY CAUSED BY</span>: [<b>Your domain not listed in our database!, execute access forbidden, read access forbidden, write access forbidden, ssl required, ssl 128 required, ip address rejected, client certificate required, site access denied, too many users, invalid configuration, password change, mapper denied access, client certificate revoked, directory listing denied, client access licenses exceeded, client certificate is untrusted or invalid, client certificate has expired or is not yet valid, passport logon failed, source access denied, infinite depth is denied, too many requests from the same client ip</b>...]</p><p>> <span>POWERED BY</span>: [<a href="https://ancokplayer.win" id="ancokplayer">ANCOKPLAYER.WIN</a>, <a href="https://ancokplayer.win/about">ABOUT US</a>, <a href="https://ancokplayer.win/contact">CONTACT US</a>...]</p><p>> <span>HAVE A NICE DAY SIR AXLEROD :-)</span></p></div><a class="avatar ancok-player" id="ancok-player" href="https://ancokplayer.win/" title="What are you looking for Sir AXLEROD?"><img src="https://i.imgur.com/7XWsEGy.png"/></a></body></html>';
?>