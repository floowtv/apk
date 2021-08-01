<?php
$file = $_GET['url'];
?>
<!DOCTYPE html><html><head><title>Ancok Player</title><meta name="robots" content="noindex"><meta name="referrer" content="never" /><meta name="referrer" content="no-referrer" /><link rel="icon" href="https://cdn.staticaly.com/gh/domkiddie/drive/master/assets/img/favicon.png"><style type="text/css" media="screen">html,body{background:#000;padding:0;margin:0;width:100%;height:100%;overflow:hidden}.jwplayer{position:absolute;width:100%;height:100%;}#hideads{position:absolute;z-index:9;top:0px;left:0px;width:100%;height:100%;background-color:rgba(0, 0, 0,.3);text-align:center}#ancok-player{width:100%;height:100%}.ancok-iframe{position:absolute;width:100%;height:100%}#hideads .in_player_close {position:relative;display:inline-block;background: linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%); none repeat scroll 0% 0%;color: white;width: 100%;cursor: pointer;font-size: 16px;text-decoration: none;line-height:29px;text-align: center;max-width: 300px;text-transform: uppercase;}.ads-box{color:#fff;margin:0 auto;display:block;text-align:center;max-width: 300px;max-height:300px}@media (max-width: 576px) {#hideads .in_player_close {display:inline-block;background: linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%); none repeat scroll 0% 0%;color: white;width: 100%;cursor: pointer;font-size: 13px;text-decoration: none;line-height:29px;text-align: center;max-width: 200px;text-transform: uppercase;}.ads-box img{margin:0 auto;display:block;text-align:center;max-width: 200px;max-height:200px}}</style></head><body>
<script src="https://content.jwplatform.com/libraries/0P4vdmeO.js" type="text/javascript"></script>
<div id="ancok-player"></div>
<script type="text/javascript">var videoPlayer=jwplayer("ancok-player");
videoPlayer.setup(
	{
	sources:[
		{
		file:"<?php echo $file;?>",label:"Default",type:"video/mp4"
	}
	],preload:"auto",primary:"html5",autostart:"true",image:"",width:"100%",height:"100%",playbackRateControls:[0.25,0.5,0.75,1,2,3,4],tracks:[
		{
		file:"nofile",label:"Default",kind:"captions",default:"true",
	}
	],captions:
		{
		color:"#FFFF00",fontSize:15,edgeStyle:"uniform",backgroundOpacity:0,
	}
	
});
</script>
</body>
</html>