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
body {
    background-color: #000000;
}
</style>
<style>
img[alt*="000webhost"],
img[alt*="000webhost"][style],
img[src*="000webhost"],
img[src*="000webhost"][style],
body > div:nth-last-of-type(1)[style]{
	opacity: 0 !important;
	pointer-events:none !important;
	width: 0px !important;
	height: 0px !important;
	visibility:hidden !important;
	display:none !important;
}

</style>



</head>

<body>
<style>
.containervideo {
  position: relative;
  overflow: hidden;
  width: 100%;
 
  padding-top: 58.25%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
}

/* Then style the iframe to fit in the container div with full height and width */
.responsive-iframe {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
}


</style>

<div class="containervideo">
<center>
  <video  class="responsive-iframe" controls preload="auto" autoplay
  poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
    <source src="<?php echo $pagina_inicio;  ?>" type='video/mp4'>
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a web browser that
      <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
    </p>
  </video>

  <script src="http://vjs.zencdn.net/6.2.8/video.js"></script>
  </center>
</div>
</body>

