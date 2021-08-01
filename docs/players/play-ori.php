<?php
require 'includes/autoload.php';
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

//Split link
function split_link($link) {
	$spilt = chunk_split($link, 500, "=");
	$array = explode('=', $spilt);
	foreach($array as $i => $data) {
		$list .= 'id'.($i+1).'='.$data.'&';
	}
	$split_link = rtrim($list, '&');
	return $split_link;
}
function curl($url){
		$ch = @curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		$head[] = "Connection: keep-alive";
		$head[] = "Keep-Alive: 300";
		$head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
		$head[] = "Accept-Language: en-us,en;q=0.5";
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36');
		//curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_TIMEOUT, 15);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);		
		$page = curl_exec($ch);
		curl_close($ch);
		return $page;
}
function ancokplayer_hashx( $string, $action = 'e' ) {
  $secret_key = 'ancokplayer_ganteng';
  $secret_iv = 'google';
  $output = false;
  $encrypt_method = "AES-256-CBC";
  $key = hash( 'sha256', $secret_key );
  $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
  if( $action == 'e' ) {
    $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
  }else if( $action == 'd' ){
    $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
  }
  return $output;
}
$url= $_GET['id'];
$url_ori = ancokplayer_hashx($url,'d');
$basedomain  = base_url("json.php?id=$url_ori");
$basedomainx  = base_url();
$dancok = $basedomain;
if(empty($_GET['id']))
{
$myjson->status = error;
$myjson->message = "Invalid ID or No ID Found!";
$myjson->app = "Ancok Player";
$JsonOut = json_encode($myjson);
echo $JsonOut;
exit(0);
}
$sub=$_GET['sub'];
$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => "".$dancok."",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'GET',	
));

$response = curl_exec($curl);
curl_close($curl);
$json=json_decode($response);
$moviestitle=$json->title;
$url=$json->Main_url;
if(empty($url)) {
$url = 'https://www2.nontongo.win/just-error.mp4';
}
$url1=$json->Embed_url1;
$url2=$json->Embed_url2;
if(empty($url2)) {
$url2 = ''.$basedomainx.'/no-video.php?url=https://www2.nontongo.win/no-video.mp4';
}
$url3=$json->Embed_url3;
if(empty($url3)) {
$url3 = ''.$basedomainx.'/no-video.php?url=https://www2.nontongo.win/no-video.mp4';
}
$url4=$json->Embed_url4;
if(empty($url4)) {
$url4 = ''.$basedomainx.'/no-video.php?url=https://www2.nontongo.win/no-video.mp4';
}
$sub=$json->subtitle;
$poster=$json->poster;
if(empty($poster)) {
$poster = 'assets/images/default-poster.jpg';
}
$main_sourcex = '{"type": "video/mp4", "label": "Original", "file":"'.$url.'"}';
if(isset($url) && strpos($url,"//drive.google.com/") || strpos($url,"//photos.google.com/") || strpos($url,"//www.youtube.com/")|| strpos($url,"//vimeo.com/")|| strpos($url,"//www.facebook.com/") || strpos($url,"//www.mp4upload.com/") || strpos($url,"//yadi.sk/") || strpos($url,"//www.mediafire.com/")|| strpos($url,"//od.lk/")|| strpos($url,"//photos.app.goo.gl/")!== FALSE){
$main_sourcex = curl('https://nontongo.win/ancoknew.php?stream/*=ancokplayer&url='.$url); 
}
$url_source = 'videoplayback.php?'.split_link(encrypte($url,'streamnont')).'';
$url1_source = 'videoplayback.php?'.split_link(encrypte($url1,'streamnont')).'';
$url2_source = 'videoplayback.php?'.split_link(encrypte($url2,'streamnont')).'';
$url3_source = 'videoplayback.php?'.split_link(encrypte($url3,'streamnont')).'';
$url4_source = 'videoplayback.php?'.split_link(encrypte($url4,'streamnont')).'';

$dancok_ads  = base_url("json_ads.php?id=1");
$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => "".$dancok_ads."",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'GET',	
));

$response = curl_exec($curl);
curl_close($curl);
$json=json_decode($response);
$advast=$json->advast;
$adpopup=$json->adpopup;
?>
<!DOCTYPE html><html><head><meta name="robots" content="noindex"><title><?php echo $moviestitle;?></title><meta name="referrer" content="never" /><meta name="referrer" content="no-referrer" /><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="icon" href="https://cdn.staticaly.com/gh/domkiddie/drive/master/assets/img/favicon.png"><title><?php echo $title;?></title><style type="text/css" media="screen">html,body{background:#000;padding:0;margin:0;width:100%;height:100%;overflow:hidden;}.wrapper{position:relative;}.ancok-iframe{position:absolute !important;height:100%;width:100%;}.videocontent,#video_player{width:100%;height:100%;}.jwplayer{margin:0;position:fixed !important}@media only screen and (max-width: 450px) {.jw-settings-topbar .jw-settings-close { margin-right: 30px; !important}}.videocontent{position: relative;color: #fff;}#list-server-more{z-index: 1;padding: 10px 0 0 0;position: absolute;color: #fff;top: 0;right: 8px;text-align: right;font-family: Arial, Helvetica, sans-serif;} #show-server{color: #fff;padding: 5px 15px;font-size: 10px;background: url('https://i.imgur.com/FnWEBXC.png') no-repeat center center;z-index:999999}.list-server-items{margin-top: 10px;background: rgba(0, 0, 0, .7);}.list-server-items li {cursor: pointer;padding: 6px 5px 6px 15px;color: #ccc;text-align: right;list-style: none;border-top: solid 1px #20201f;font-size: 13px;} .list-server-items li.active, .list-server-items li:hover{color: #fff;} #load-iframe{display: none;position: relative;}.list-server-items li:first-child{border: 0;}</style><!--<script type="text/javascript" src="https://content.jwplatform.com/libraries/SPrnWq3s.js"></script>--><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script><script src="https://content.jwplatform.com/libraries/0P4vdmeO.js" type="text/javascript"></script></head><body><div class="wrapper"><div class="videocontent"><script type="text/javascript">eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('A a=["\\p\\g\\b\\k\\b\\v\\d\\S\\b\\o\\c\\B\\i\\d","\\d\\j\\q\\q\\i\\b","\\C\\i\\e\\f\\d\\m\\f\\b\\g\\k\\b\\g\\m\\e\\d\\b\\l\\f","\\r\\i\\e\\r\\T","\\s\\f\\n\\j\\D\\m\\f\\b\\g\\k\\b\\g","\\h\\c\\d\\c\\m\\k\\e\\h\\b\\j","\\c\\d\\d\\g","\\h\\c\\d\\c\\m\\f\\d\\c\\d\\B\\f","\\c\\r\\d\\e\\k\\b","\\n\\c\\f\\E\\i\\c\\f\\f","\\n\\e\\h\\b","\\e\\o\\g\\c\\l\\b","\\C\\k\\e\\h\\b\\j\\r\\j\\v\\d\\b\\v\\d\\F\\e\\l\\q","\\f\\g\\r","","\\k\\e\\h\\b\\j\\J\\p\\i\\c\\t\\b\\g","\\q\\b\\d\\U\\i\\b\\l\\b\\v\\d\\V\\t\\W\\h","\\p\\i\\c\\t","\\f\\n\\j\\D","\\s\\k\\e\\h\\b\\j\\J\\p\\i\\c\\t\\b\\g","\\f\\d\\j\\p","\\s\\i\\j\\c\\h\\m\\e\\o\\g\\c\\l\\b","\\s\\i\\j\\c\\h\\m\\e\\o\\g\\c\\l\\b\\F\\e\\o\\g\\c\\l\\b","\\g\\b\\l\\j\\k\\b\\E\\i\\c\\f\\f","\\C\\i\\e\\f\\d\\m\\f\\b\\g\\k\\b\\g\\m\\e\\d\\b\\l\\f\\F\\i\\e","\\c\\h\\h\\E\\i\\c\\f\\f","\\D\\e\\h\\d\\n","\\s\\b\\l\\X\\b\\h\\k\\e\\h\\b\\j","\\n\\b\\e\\q\\n\\d","\\g\\b\\c\\h\\t","\\o\\c\\h\\b\\Y\\B\\d"];$(w)[a[Z]](u(){G();$(a[4])[a[3]](u(x){x[a[0]]();$(a[2])[a[1]]()});$(a[K])[a[3]](u(x){x[a[0]]();A L=$(y)[a[6]](a[5]);A H=$(y)[a[6]](a[7]);z($(y)[a[9]](a[8])){1a 1b}I{$(a[11])[a[10]]();$(a[12])[a[10]]();$(a[11])[a[6]](a[13],a[14]);z(w[a[16]](a[15])){z(H==0){M[a[17]]();$(a[19])[a[18]]()}I{M[a[1c]]();$(a[19])[a[10]]()}};z(H==1){$(a[N])[a[18]]();$(a[O])[a[18]]();$(a[O])[a[6]](a[13],L)}I{$(a[N])[a[10]]()};G()};$(a[K])[a[1d]](a[8]);$(y)[a[1e]](a[8])});$(a[P])[a[Q]]($(w)[a[Q]]());$(a[P])[a[R]]($(w)[a[R]]())});u G(){1f(u(){$(a[2])[a[1g]]()},1h)}',62,80,'||||||||||_0x8e85|x65|x61|x74|x69|x73|x72|x64|x6C|x6F|x76|x6D|x2D|x68|x66|x70|x67|x63|x23|x79|function|x6E|document|_0xf5bfx1|this|if|var|x75|x2E|x77|x43|x20|closeServer|_0xf5bfx3|else|x5F|24|_0xf5bfx2|playerInstance|21|22|27|26|28|x44|x6B|x45|x42|x49|x62|x4F|29|||||||||||return|false|20|23|25|setTimeout|30|3000'.split('|'),0,{}))</script>
<script src="https://content.jwplatform.com/libraries/0P4vdmeO.js"></script><div id="list-server-more"><a href="javascript:void(0)" id="show-server" title="Alternative Servers"></a><ul class="list-server-items"><li class="active"  data-status="0" data-video="">Main Server</li><li data-status="1" data-video="<?php echo $url1_source;?>">Backup Server1</li><li data-status="1" data-video="<?php echo $url2_source;?>">Backup Server2</li><li data-status="1" data-video="<?php echo $url3_source;?>">Backup Server3</li><li data-status="1" data-video="<?php echo $url4_source;?>">Backup Server4</li></ul></div>
<div id="load-iframe"><iframe id="embedvideo" src="" allowfullscreen="true" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" style="width:100%;height:100%"></iframe></div><div id="video_player"></div>
<?php
  function encode($input)
{
    $temp = '';
    $length = strlen($input);
    for($i = 0; $i < $length; $i++)
        $temp .= '%' . bin2hex($input[$i]);
    return $temp;
}
        include'packer.php';
        $result = '';
$data = '   var playerInstance = jwplayer("video_player");
            var countplayer = 1;
            var countcheck = 0;
            playerInstance.setup({sources:['.$main_sourcex.'],image:"'.$poster.'",stretching:"uniform",width:"100%",height:"100%",autostart:"false",tracks: [{ 
            file: "getsub.php?sub='.$sub.'", 
            label: "Default",
            kind: "captions",             
        }],
        playbackRateControls:[0.25,0.5,0.75,1,2,3],
        advertising: { client: "vast", schedule: { adbreak1: { offset : "pre", tag:"'.$advast.'", skipoffset: 6 },adbreak2: {offset: "50%", tag: "'.$advast.'",skipoffset:6}} },
        captions: {color: "#FFFF00",fontSize: 14, edgeStyle:"raised",backgroundOpacity: 0,},
                        });                
                   
                    playerInstance.on("error",function(){$("#video_player").html("<div class=\"ancok-iframe\"> <iframe src=\"'.$url1_source.'\" width=\"100%\" height=\"100%\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" class=\"ancok-box\"></iframe><div class=\"ancok-logo-top-right\"></div></div>")});                  
               
           // playerInstance.addButton(
               // "https://ancokplayer.win/demo/openload/assets/img/download.svg",
                //"Download Video",
               // function() {
                    //window.open(
                        //"'.$download_link.'",
                       // "_blank"
                    //);
                //},
                //"download"
           // );   ';

        $packer = new Packer($data, 'Normal', true, false, true);
        
        $packed = $packer->pack();

        $result .= '<script type="text/javascript">' . $packed . '</script>';
        
        		
        echo '<script language="javascript">document.write(unescape("'.encode($result).'"));
</script>';
?></div></div>
<script type="text/javascript" src="<?php echo $adpopup;?>"></script>
</body></html>