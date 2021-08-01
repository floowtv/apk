<?php
$enlace =  $_GET["media"] ;

$pagina_inicio = file_get_contents('http://www.mediafire.com/file/' . $enlace. '/');
$start = strpos($pagina_inicio, 'http://download');
$end = strpos($pagina_inicio, "'",$start);

//echo "$start \n $end \n"  ;
    $pagina_inicio = substr($pagina_inicio, $start,$end - $start);
//echo $pagina_inicio;

?>
<head>
  <link href="http://vjs.zencdn.net/6.2.8/video-js.css" rel="stylesheet">

  <!-- If you'd like to support IE8 -->
  <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
  <style>

</style>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.16/build/mediaelementplayer.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,300i">
  <style> html, body { overflow-x: hidden; } #container { } .error { color: red; }  a {  word-wrap: break-word;  }   code {  font-size: 0.8em;  } #player2-container .mejs__time-buffering, #player2-container .mejs__time-current, #player2-container .mejs__time-handle, #player2-container .mejs__time-loaded, #player2-container .mejs__time-hovered, #player2-container .mejs__time-marker, #player2-container .mejs__time-total { height: 2px;} #player2-container .mejs__time-total { margin-top: 9px;} #player2-container .mejs__time-handle { left: -5px; width: 12px; height: 12px;
            border-radius: 50%;
            background: #ffffff;
            top: -5px;
            cursor: pointer;
            display: block;
            position: absolute;
            z-index: 2;
            border: none;
        }
        #player2-container .mejs__time-handle-content {
            top: 0;
            left: 0;
            width: 12px;
            height: 12px;
        }
    </style>

<style>
/* width */
::-webkit-scrollbar {
  width: 10px;
}  

/* Track */
::-webkit-scrollbar-track {
  background: #161416; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #111111; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #454345; 
}
</style>

<style>
* {margin:0;}
.container {position: absolute;top: 0;bottom: 0;width: 100%;height: 0;overflow: hidden;font-size: 0;background-color: #000000;;margin: auto;z-index: -1000;padding-bottom: 55%;}
.container2 video {position: absolute;top: 0; left: 0;width: 100%;height: 100%;}
</style>
</head>

<body class="container" style="background-color:#000000;">

<center>
<div class="player">
  <video id="my-video" class="video-js" controls autoplay preload="auto" width="640" height="320"  style="max-width: 100%"
  poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
    <source src="<?php echo $pagina_inicio;  ?>" type='video/mp4'>

  </video>
</div>
  <script src="http://vjs.zencdn.net/6.2.8/video.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/mediaelement@4.2.16/build/lang/es.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/mediaelement@4.2.16/build/mediaelement-and-player.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/mediaelement@4.2.16/build/renderers/dailymotion.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/mediaelement@4.2.16/build/renderers/facebook.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/mediaelement@4.2.16/build/renderers/soundcloud.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/mediaelement@4.2.16/build/renderers/twitch.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/mediaelement@4.2.16/build/renderers/vimeo.min.js"></script>
        <script src="https://buttons.github.io/buttons.js"></script>
        <script src="https://platform.twitter.com/widgets.js"></script>
        <script>

            var
                sourcesSelector = document.body.querySelectorAll('select'),
		        sourcesTotal = sourcesSelector.length
            ;

            for (var i = 0; i < sourcesTotal; i++) {
                sourcesSelector[i].addEventListener('change', function (e) {
                    var
                        media = e.target.closest('.media-container').querySelector('.mejs__container').id,
                        player = mejs.players[media]
                    ;

                    player.setSrc(e.target.value.replace('&amp;', '&'));
                    player.setPoster('');
                    player.load();

                });

                // These media types cannot play at all on iOS, so disabling them
                if (mejs.Features.isiOS) {
			        if (sourcesSelector[i].querySelector('option[value^="rtmp"]')) {
                        sourcesSelector[i].querySelector('option[value^="rtmp"]').disabled = true;
                    }
                    if (sourcesSelector[i].querySelector('option[value$="webm"]')) {
                        sourcesSelector[i].querySelector('option[value$="webm"]').disabled = true;
                    }
                    if (sourcesSelector[i].querySelector('option[value$=".mpd"]')) {
                        sourcesSelector[i].querySelector('option[value$=".mpd"]').disabled = true;
                    }
			        if (sourcesSelector[i].querySelector('option[value$=".ogg"]')) {
                        sourcesSelector[i].querySelector('option[value$=".ogg"]').disabled = true;
                    }
			        if (sourcesSelector[i].querySelector('option[value$=".flv"]')) {
                        sourcesSelector[i].querySelector('option[value*=".flv"]').disabled = true;
        		    }
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

                for (var i = 0; i < total; i++) {
                    new MediaElementPlayer(mediaElements[i], {
                        pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.16/build/',
                        shimScriptAccess: 'always',
                        success: function () {
                            var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                            for (var j = 0; j < targetTotal; j++) {
                                target[j].style.visibility = 'visible';
                            }
			            }
		            });
                }
            });
        </script>

  </center>
</body>
