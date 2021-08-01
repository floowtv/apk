<?php if (isset($_GET['action']) && $_GET['action'] == 'add_subtitle'): ?>
<?php 
			$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
			$actual_link = str_replace('add_sub.php?action=add_subtitle', '', $actual_link);
		?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="https://cdn.staticaly.com/gh/domkiddie/drive/master/assets/img/favicon.png">    
    <!-- Meta -->
    <meta name="description" content="Ancok Google Photos jwPlayer Auto Backup Function with Subtitles Manager Integrated">
    <meta name="author" content="AncokNamhay">
    <meta property="og:image" content="https://ancokplayer.win/wp-content/uploads/edd/2018/12/new-google-drive-player-with-multi-backup.jpg">
    <title>Subtitle Uploader</title>    
     <link href="https://cdn.staticaly.com/gh/domkiddie/drive/master/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.staticaly.com/gh/domkiddie/drive/master/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <script src="https://cdn.staticaly.com/gh/domkiddie/drive/master/lib/jquery/jquery.min.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.staticaly.com/gh/domkiddie/drive/master/assets/js/ancoksub.js"></script>
	<link href="https://cdn.staticaly.com/gh/domkiddie/drive/master/lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.staticaly.com/gh/domkiddie/drive/master/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">	
    <link rel="stylesheet" href="https://cdn.staticaly.com/gh/domkiddie/drive/master/css/bracket.css">
    <link rel="stylesheet" href="https://cdn.staticaly.com/gh/domkiddie/drive/master/css/bracket.simple-white.css">	
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>  
    <![endif]-->
    <style>#progress-group{display:none;}.progress{height:30px;}.progress-bar{font-size:17px;line-height:25px;}</style>
      </head>
 <body>
    <div class="br-logo"><a href="<?php echo $actual_link;?>"><span>[</span>Google <i>Photos</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="<?php echo $actual_link;?>" class="br-menu-link">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item --> 
        <li class="br-menu-item">
          <a href="<?php echo $actual_link;?>add_sub.php?action=add_subtitle" class="br-menu-link active">
            <i class="menu-item-icon icon ion-ios-list-outline tx-24"></i>
            <span class="menu-item-label">Subtitle Manager</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
      </ul><!-- br-sideleft-menu -->
      <br>
      <li class="br-menu-item">
          <a href="#" class="br-menu-link active">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">How It Work:</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item --> 
        <br>
      <div class="info-list">
          <p>1. Choose your subtitle srt file</p>
<p>2. Click Upload Button, Done!</p>
        <div class="info-list-item">
        </div><!-- info-list-item -->
      </div><!-- info-list -->
      <br>
    </div><!-- br-sideleft -->
    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>		
      </div><!-- br-header-left -->
      <div class="br-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down"><?php echo '<p>Welcome: <b>' . $username . '</b></p>';?></span>
              <img src="<?php echo $actual_link;?>assets/img/user.png" class="wd-32 rounded-circle" alt="">
              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-250">          
              <ul class="list-unstyled user-profile-nav">               
                <li><a href="<?php echo $actual_link;?>?logout=true"><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
          <a id="btnRightMenu" href="" class="pos-relative">
            <i class="icon ion-ios-time-outline"></i>
            <span class="square-8 bg-danger pos-absolute t-10 r--5 rounded-circle"></span>
          </a>
        </div><!-- navicon-right -->
      </div><!-- br-header-right -->
    </div><!-- br-header -->
     <div class="br-sideright">
      <ul class="nav nav-tabs sidebar-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" role="tab" href="#calendar"><i class="icon ion-ios-timer-outline tx-24"></i></a>
        </li>
      </ul><!-- sidebar-tabs -->
      <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 schedule-scrollbar active" id="calendar" role="tabpanel">
          <label class="sidebar-label pd-x-25 mg-t-25">Time &amp; Date</label>
          <div class="pd-x-25">
            <h2 id="brTime" class="br-time"></h2>
            <h6 id="brDate" class="br-date"></h6>
          </div>		  
</div>
 </div><!-- tab-content -->
    </div><!-- br-sideright -->
     <div class="br-mainpanel">
      <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="<?php echo $actual_link;?>">Home</a>
          <span class="breadcrumb-item active">subtitles-manager</span>
        </nav>
      </div><!-- br-pageheader -->
      <div class="br-pagetitle">
        <i class="icon icon ion-ios-cloud-upload-outline"></i>
        <div class="pd-sm-l-20">
          <h4 class="tx-gray-800 mg-b-5">Subtitles Manager</h4>
          <p class="mg-b-0">Subtitles Uploader.</p>
        </div>
      </div><!-- d-flex -->      
	  <div class="br-pagebody">	
	                           <form role="form" method="post" enctype="multipart/form-data" onsubmit="return doUpload();">                                        
                                  <div class="input-group">
                                    <label class="input-group-btn">
                                        <span class="btn btn-info">
                                            Choose File <input type="file" name="file" id="file" style="display: none;" multiple/>
                                        </span>
                                    </label>
                                    <input type="text" class="form-control" readonly>
                                  </div>                               
                               <input type="submit" class="btn btn-primary mg-b-20" value="Upload" />
                            </form>
                              <div id="progress-group" class="progress mg-b-20">
            <div class="progress-bar progress-bar-striped bg-success" aria-valuemax="100">
			<div class="progress progress-bar-striped bg-success">                           
            <div class="progress-text bg-succes"></div>
            </div>
			</div>
            </div>
		                    <div class="mg-b-20">
                            <div id="result"></div>
							</div>                        
          <div class="table-wrapper" style="width:100%">
            <table id="subtitles" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th>NO</th>    
                  <th>Subtitles Name</th>
                  <th>Subtitles Url</th>
                </tr>
              </thead>
              <tbody>
               <?php 								
				$domainServer = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);								
                $dir = 'sub';
                $counter = 1;
                $file = scandir($dir, 1);
                foreach ($file as $key => $value)                                 { 
                preg_match('/([0-9]*)\..*/', $value, $match);
                if (!in_array($value, array(".", ".."))) 
                { 
                echo '<tr>
                      <td>'.$counter.'</td>
                      <td>'.$domainServer.'/sub/' . $value . '</td>
                      <td><input type="text" class="form-control" value="'.$domainServer.'/sub/' . $value . '" onclick="this.select();"/></td>
                      </tr>';$counter++;}} 
                ?>
                </tbody>
                </table>
<script type="text/javascript">$(document).ready(function(){$('#subtitles').DataTable({"order":[[1,"desc"]]});});</script>                        
                    </div><!-- /.panel-primary -->  
      <footer class="br-footer">
        <div class="footer-left">
          <div class="tx-center">Copyright &copy; 2018. Ancok Google Photos Player. All Rights Reserved.</div>
          <div class="tx-center">Powered by Ancokplayer.win</div>
        </div>
        <div class="footer-right d-flex align-items-center">
          <span class="tx-uppercase mg-r-10">Socials:</span>
          <a target="_blank" class="pd-x-5" href="https://www.facebook.com/"><i class="fab fa-facebook tx-20"></i></a>
          <a target="_blank" class="pd-x-5" href="https://twitter.com/"><i class="fab fa-twitter tx-20"></i></a>
        </div>
      </footer>
   </div><!-- /.page body -->
<script>var http_arr = new Array();
function doUpload() {
	document.getElementById('progress-group').innerHTML = ''; 
	document.getElementById('result').innerHTML = '';
	var files = document.getElementById('file').files;
	var checkEmpty = $('#file').val();
	if (checkEmpty != ''){
			$('#progress-group').css('display', 'block');
			for (i=0;i<files.length;i++) {
				uploadFile(files[i], i);
			}
	}
	return false;
}
function uploadFile(file, index) {
	var http = new XMLHttpRequest();
	http_arr.push(http);
	var ProgressGroup = document.getElementById('progress-group');
	var Progress = document.createElement('div');
	Progress.className = 'progress';
	var ProgressBar = document.createElement('div');
	ProgressBar.className = 'progress-bar';
	var ProgressText = document.createElement('div');
	ProgressText.className = 'progress-text';	
	Progress.appendChild(ProgressBar);
	Progress.appendChild(ProgressText);
	ProgressGroup.appendChild(Progress);
	var oldLoaded = 0;
	var oldTime = 0;
	http.upload.addEventListener('progress', function(event) {	
		if (oldTime == 0) { 
			oldTime = event.timeStamp;
		}	
		var fileName = file.name; 
		var fileLoaded = event.loaded; 
		var fileTotal = event.total; 
		var fileProgress = parseInt((fileLoaded/fileTotal)*100) || 1; 
		//Use variable
		ProgressBar.innerHTML = 'Uploading the file is being processed...';
		ProgressBar.style.width = fileProgress + '%';
		if (fileProgress == 100) {
			ProgressBar.addClass('progress-bar progress-bar-striped bg-success active').html('Uploading the file is being processed...');
		}
		oldTime = event.timeStamp; 
		oldLoaded = event.loaded; 
	}, false);
	var data = new FormData();
	data.append('filename', file.name);
	data.append('file', file);
	http.open('POST', './subtitles_loader.php', true);
	http.send(data);
	http.onreadystatechange = function(event) {
		if (http.readyState == 4 && http.status == 200) {			
			try { 
				var server = JSON.parse(http.responseText);
				if (server.status) {
					ProgressBar.className += ' progress-bar-success'; 
					ProgressBar.innerHTML = server.message; 
					document.getElementById("result").innerHTML = server.result;
				} else {
					ProgressBar.className += ' progress-bar-danger'; 
					ProgressBar.innerHTML = server.message; 
				}
			} catch (e) {
				ProgressBar.className += ' progress-bar-danger'; 
				ProgressBar.innerHTML = 'Extension not allowed, please choose a srt or vtt file!'; 
			}
		}
		http.removeEventListener('progress'); 
	}
}</script>
<script src="https://cdn.staticaly.com/gh/domkiddie/drive/master/lib/jquery-ui/ui/widgets/datepicker.js"></script>
<script src="https://cdn.staticaly.com/gh/domkiddie/drive/master/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.staticaly.com/gh/domkiddie/drive/master/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="https://cdn.staticaly.com/gh/domkiddie/drive/master/lib/moment/min/moment.min.js"></script>
<script src="https://cdn.staticaly.com/gh/domkiddie/drive/master/lib/jquery/bracket.js"></script>
</body>
</html>
<?php else : ?>
<!DOCTYPE html><html><head><title>403 Forbidden</title><style>@import url("https://fonts.googleapis.com/css?family=Share+Tech+Mono|Montserrat:700");*{margin:0;padding:0;border:0;font-size: 100%;font:inherit;vertical-align:baseline;box-sizing:border-box;color:inherit;}body{  background-image: linear-gradient(120deg,#4f0088 0%,#000000 100%);height:100vh;}h1{font-size:45vw;text-align:center;position:fixed;width:100vw;z-index:1;color:#ffffff26;text-shadow:0 0 50px rgba(0, 0, 0, 0.07);top:50%;   transform: translateY(-50%);font-family:"Montserrat",monospace;}div{background:rgba(0, 0, 0, 0);width:70vw;    position: relative;top:50%;transform:translateY(-50%);margin:0 auto;padding:30px 30px 10px;box-shadow:0 0 150px -20px rgba(0, 0, 0, 0.5);z-index:3;}p{font-family:"Share Tech Mono", monospace;color:#f5f5f5;margin:0 0 20px;   font-size:17px;line-height:1.2;}span{color:#f0c674;}i{color:#8abeb7;}div a{text-decoration: none;}b{color:#81a2be;}a.avatar{position:fixed;bottom:15px;right: -100px;animation: slide 0.5s 4.5s forwards;display:block;z-index:4}a.avatar img {border-radius:100%;width:44px;border:2px solid white;}@keyframes slide{from{right:-100px;transform:rotate(360deg);opacity:0;}to{right:15px;transform:rotate(360deg);opacity:1;}}</style><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script></head><body><h1>403</h1><div><p>><span>ERROR CODE</span>: "<i>HTTP 403 Forbidden</i>"</p><p>> <span>ERROR DESCRIPTION</span>: "<i>Access Denied. You Do Not Have The Permission To Access This Page On This Server</i>"</p><p>> <span>ERROR POSSIBLY CAUSED BY</span>: [<b>Your domain not listed in our database!, execute access forbidden, read access forbidden, write access forbidden, ssl required, ssl 128 required, ip address rejected, client certificate required, site access denied, too many users, invalid configuration, password change, mapper denied access, client certificate revoked, directory listing denied, client access licenses exceeded, client certificate is untrusted or invalid, client certificate has expired or is not yet valid, passport logon failed, source access denied, infinite depth is denied, too many requests from the same client ip</b>...]</p><p>> <span>POWERED BY</span>: [<a href="https://ancokplayer.win" id="ancokplayer">ANCOKPLAYER.WIN</a>, <a href="https://ancokplayer.win/about">ABOUT US</a>, <a href="https://ancokplayer.win/contact">CONTACT US</a>...]</p><p>> <span>HAVE A NICE DAY SIR AXLEROD :-)</span></p></div><a class="avatar ancok-player" id="ancok-player" href="https://ancokplayer.win/" title="What are you looking for Sir AXLEROD?"><img src="https://i.imgur.com/7XWsEGy.png"/></a> </body></html>
<?php endif; ?>