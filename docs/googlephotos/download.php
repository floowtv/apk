<?php 
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
function ancokplayer_hashx( $string, $action = 'e' ) {
  $secret_key = 'ancokplayer'; // Do Not Change This
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
$hashdown = $_GET['url'];
$original_url = ancokplayer_hashx($hashdown, 'd');
$croot_ancok = 'redirector.php?'.split_link(encrypte($original_url,'ancokcrypt')).'';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="https://cdn.staticaly.com/gh/domkiddie/drive/master/assets/img/favicon.png">
<title>Download Movie</title>     
<style>html,body{background:#000;padding:0;margin:0;width:100%;height:100%;overflow:hidden}#hideads{position:absolute;z-index:9;top:0px;left:0px;width:100%;height:100%;background-color:rgba(0, 0, 0,.3);text-align:center}.ancok-iframe{position:absolute;width:100%;height:100%}#hideads .in_player_close {position:relative;display:inline-block;background: linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%); none repeat scroll 0% 0%;color: white;width: 100%;cursor: pointer;font-size: 16px;text-decoration: none;line-height:29px;text-align: center;max-width: 300px;text-transform: uppercase;}.ads-box{color:#fff;margin:0 auto;display:block;text-align:center;max-width: 300px;max-height:300px}@media (max-width: 576px) {#hideads .in_player_close {display:inline-block;background: linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%); none repeat scroll 0% 0%;color: white;width: 100%;cursor: pointer;font-size: 13px;text-decoration: none;line-height:29px;text-align: center;max-width: 200px;text-transform: uppercase;}.ads-box img{margin:0 auto;display:block;text-align:center;max-width: 200px;max-height:200px}}</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
<link href="https://api.cinemovie.co.network/process/assets/ancokplayer_loader.css" rel="stylesheet">
</head>
<body>
<div id="ancokplayer-loading-style" class="spinner"><div class="spinme spinme-0"></div><div class="spinme spinme-1"></div><div class="spinme spinme-2"></div><div class="spinme spinme-3"></div><div class="spinme spinme-4"></div><div class="spinme spinme-5"></div><div class="ancok-player-notif plo ancokplugin">Processing Your Files. Please wait...!</div></div>   
<div class="ancok-iframe"> <iframe src="<?php echo $croot_ancok;?>" width="100%" height="100%" frameborder="0" allowfullscreen="allowfullscreen" class="ancok-box"></iframe></div>
<!-- REPLACE WITH YOUR OWN AD BANNER 300x250 -->
<!-- Ads Banner Start -->
<div id="hideads">
<div class="ads-box">
<div style="margin-top: 20px;">
<a class="in_player_close" onclick="$('#hideads').remove();">Close ad &amp; Download Movie</a>
<a href="/"><img src="assets/img/ancokplayer_ads300x250a.jpg" alt="300x250"/></a>
</div>
</div>
</div>
<!-- Ads Banner End -->

<!-- REPLACE WITH YOUR OWN POP UNDER CODE HERE -->

<!-- Ads Pop Under Start -->

<!-- Ads Pop Under End -->
<script src="https://api.cinemovie.co.network/process/assets/ancok_loader.js" type="text/javascript"></script>
</body>
</html>