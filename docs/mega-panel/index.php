<?php
	error_reporting(0);
	include "curl.php";
	if($_POST["submit"] != ""){
		$link = $_POST["url"];
		$link = str_replace("https://mega.nz/#","",$link);
		$backup = $_POST["ancok/*"];
		$sub = $_POST["sub"];
		$poster = $_POST["poster"];
		$ad_vast_url = $_POST["advast/*"];
		$iframeid = my_simple_crypt($link);
		$backup_link = my_simple_crypt($backup);
		$advast = my_simple_crypt($ad_vast_url);
	}
	$domain_name = (isset($_SERVER["HTTPS"]) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	
	?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mega NZ Jwplayer Script</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<style>@-webkit-keyframes spin{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}@-moz-keyframes spin{0%{-moz-transform:rotate(0)}100%{-moz-transform:rotate(360deg)}}@keyframes spin{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}.ancok-spinner{position:fixed;top:0;left:0;width:100%;height:100%;z-index:1003;background: #000000;overflow:hidden}  .ancok-spinner div:first-child{display:block;position:relative;left:50%;top:50%;width:150px;height:150px;margin:-75px 0 0 -75px;border-radius:50%;box-shadow:0 3px 3px 0 rgba(255,56,106,1);transform:translate3d(0,0,0);animation:spin 2s linear infinite}  .ancok-spinner div:first-child:after,.ancok-spinner div:first-child:before{content:'';position:absolute;border-radius:50%}  .ancok-spinner div:first-child:before{top:5px;left:5px;right:5px;bottom:5px;box-shadow:0 3px 3px 0 rgb(255, 228, 32);-webkit-animation:spin 3s linear infinite;animation:spin 3s linear infinite}  .ancok-spinner div:first-child:after{top:15px;left:15px;right:15px;bottom:15px;box-shadow:0 3px 3px 0 rgba(61, 175, 255,1);animation:spin 1.5s linear infinite}</style>
	<script type="text/javascript" src="https://cdn.rawgit.com/ufilestorage/a/master/jquery-2.2.3.min.js"></script>	
  </head>
  <body>
    <div class="container" style="width:70%">
      <div class="row">
        <div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
				  <h3 class="panel-title">Mega NZ Jwplayer Script</h3>
				</div>
				<div class="panel-body">
				    					<form action="" method="POST" class="form-horizontal">
						<div class="form-group">
							<label for="drive" class="col-md-3 control-label"> Mega Link</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="drive" name="url" placeholder="https://mega.nz/#!irhWQCZa!L4QVMH0V09LEkASLgKYgbB5Brg1G8iQWUFZv8iF2_iM" required>
							</div>
							<br><br>
							<label for="drive" class="col-md-3 control-label"> Backup Link <br>(<span style="color:red">Use only embed link!</span>)</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="drive" name="ancok/*" placeholder="https://mega.nz/embed#!irhWQCZa!L4QVMH0V09LEkASLgKYgbB5Brg1G8iQWUFZv8iF2_iM">
							</div>
						</div>
				
										<div class="form-group">
								<label for="subtitle" class="col-md-3 control-label">Subtitle</label>
								<div class="col-md-8">
									<input type="text" class="form-control" placeholder="https://dl.dropboxusercontent.com/s/qcyb7vhrcuwxr00/ancok-demo-english.srt" name="sub">
								</div>
							</div>
							           <div class="form-group">
								<label for="poster" class="col-md-3 control-label">Ad Vast Url</label>
								<div class="col-md-8">
									<input type="text" class="form-control" placeholder="https://ancokplayer.win/assets/exoclick.xml" name="advast/*">
								</div>
							</div>
					
													<div class="form-group">
								<label for="poster" class="col-md-3 control-label">Poster</label>
								<div class="col-md-8">
									<input type="text" class="form-control" placeholder="https://m.media-amazon.com/images/M/MV5BMDBhOTMxN2UtYjllYS00NWNiLWE1MzAtZjg3NmExODliMDQ0XkEyXkFqcGdeQXVyMjMxOTE0ODA@._V1_SY1000_CR0,0,631,1000_AL_.jpg" name="poster">
								</div>
							</div>							
		
						<div class="form-group">
							<div class="col-md-6 col-md-offset-3">
								<button value="GET" name="submit" class="btn btn-success" id="btn-create">GET & WATCH MOVIE</button>
							</div>
						</div>
					</form>
					<b>Sample link :</b><br> https://mega.nz/#!irhWQCZa!L4QVMH0V09LEkASLgKYgbB5Brg1G8iQWUFZv8iF2_iM  <br>
					<b>Sample backup link :</b><br> https://mega.nz/embed#!irhWQCZa!L4QVMH0V09LEkASLgKYgbB5Brg1G8iQWUFZv8iF2_iM<br>
					<b>Sample Advast Url :</b><br> https://ancokplayer.win/assets/exoclick.xml<br>
					<b>Note:</b> <span style="color:red">Backup Link will work to replace the main link if an error occurs!.</span>
				</div>
			</div>
		</div>
		<div class="row">
<div class="col-md-8 col-md-offset-2">
<?php if($iframeid){echo 'Video Preview:<br><iframe src="'.$domain_name.'embed.php?url='.$iframeid.'&sub='.$sub.'&poster='.$poster.'&ancok/*='.$backup_link.'&advast/*='.$advast.'" width="100%" height="350px" frameborder="0" scrolling="no" allowfullscreen></iframe>';}?>
</div>
</div><br><br>
	 </div>
<br>
<div><?php if($iframeid){echo 'Iframe Embed:<br><textarea style="margin:10px;width:98%;height:90px;">&lt;iframe src="'.$domain_name.'embed.php?url='.$iframeid.'&sub='.$sub.'&poster='.$poster.'&ancok/*='.$backup_link.'&advast/*='.$advast.'" width="100%" height="100%" frameborder="0" scrolling="no" allowfullscreen&gt;&lt;/iframe&gt;</textarea>';}?></div>
		<br>
<?php if($iframeid){echo 'Direct Link:<br><textarea style="margin:10px;width:98%;height:90px;">'.$domain_name.'embed.php?url='.$iframeid.'&sub='.$sub.'&poster='.$poster.'&ancok/*='.$backup_link.'&advast/*='.$advast.'</textarea>';}?></div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<noscript><i>Javascript required</i></noscript>
<center>© 2017 Ancokplayer. All Right Reserved. </center>