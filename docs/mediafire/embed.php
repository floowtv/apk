<?php
$url = isset($_GET['url']) ? htmlspecialchars($_GET['url']) : null;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>MediaFire</title>


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
<div id="player"></div>
<script src="https://cdn.jwplayer.com/libraries/lqsWlr4Z.js"></script>
<script>
jwplayer("player").setup({
  playlist: [{
    "sources": <?php require 'mediafire.php';?>
  }],
  allowfullscreen: true,
  width: '100%',
  aspectratio: '16:9',
});
</script>
</body>
</html>
