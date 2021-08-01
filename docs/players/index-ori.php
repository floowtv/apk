<?php
session_start();
include 'includes/config.php';
$username = ''.$config['user_name'].'';
$password = ''.$config['pass_word'].'';
$random1 = 'secret_key1';
$random2 = 'secret_key2';
$hash = md5($random1 . $password . $random2);
$self = $_SERVER['REQUEST_URI'];
if(isset($_GET['logout']))
{
	unset($_SESSION['login']);
}
/* USER IS LOGGED IN */
if (isset($_SESSION['login']) && $_SESSION['login'] == $hash)
{
	logged_in_msg($username);
}
else if (isset($_POST['submit']))
{
	if ($_POST['username'] == $username && $_POST['password'] == $password)
	{
		
		$_SESSION["login"] = $hash;
		header("Location: $_SERVER[PHP_SELF]");
	}
	else
	{
		
		display_login_form();
		display_error_msg();
	}
}
else
{
	display_login_form();
}
function display_login_form()
{
?><!DOCTYPE html>
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
    <title>Ancok Google Photos jwPlayer</title>    
   <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />  
      </head>
 <body class="bg-primary bg-pattern">
<div class="account-pages my-5 pt-5"><div class="container"><div class="row justify-content-center"><div class="col-lg-5"><div class="card"><div class="card-body p-4"><div class="p-2">
<h5 class="mb-5 text-center">Sign in to Continue.</h5>	
<?php echo '<form action="' . isset($self) . '" method="post">' .
             '<div class="form-group">'.
			 '<input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>' .
			 '</div>'.
			 '<div class="form-group">'.
			 '<input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>' .
			 '</div>'.
			 '<button type="submit" name="submit" class="btn btn-info btn-block">Sign In</button><br>' .
			 '<div class="text-sm-center d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://ancokplayer.win" target="_blank" title="Ancokplayer">Ancokplayer.win</a>
                                </div>'.
		 '</form>';
}
function logged_in_msg($username)
{
?><!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Dashboard | AncokPlayer New Iframe Embed Manager</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="AncokPlayer New Iframe Embed Manager With Backup Function" name="description" />
        <meta content="AncokNamhay" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- slick css -->
        <link href="assets/libs/slick-slider/slick/slick.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/slick-slider/slick/slick-theme.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />    

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        
    </head>

    <body data-sidebar="dark">
    
        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.php" class="logo logo-dark">
                                <span class="logo-sm">
                                    AP
                                </span>
                                <span class="logo-lg">
                                    AncokPlayer
                                </span>
                            </a>

                            <a href="index.php" class="logo logo-light">
                                <span class="logo-sm">
                                   AP
                                </span>
                                <span class="logo-lg">
                                    AncokPlayer
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="mdi mdi-backburger"></i>
                        </button>

                       
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-none d-lg-inline-block ml-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen"></i>
                            </button>
                        </div>
                     
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/avatar-1.png"
                                    alt="Header Avatar">
                                <span class="d-none d-sm-inline-block ml-1">Admin</span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="logout.php"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Logout</a>
                            </div>
                        </div>
            
                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">
                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                          

                            <li>
                                <a href="index.php" class="waves-effect">
                                    <i class="mdi mdi-view-dashboard"></i><span class="badge badge-pill badge-success float-right">1</span>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li>
                                <a class="waves-effect" data-toggle="modal" data-target="#modalForm2">
                                <i class="mdi mdi-view-dashboard"></i><span class="badge badge-pill badge-success float-right">2</span>
    <span>Add New Movies</span>
</a>
                            </li>
                            <li>
                                <a href="ads-manager.php" class="waves-effect">
                                    <i class="mdi mdi-view-dashboard"></i><span class="badge badge-pill badge-success float-right">3</span>
                                    <span>Ads Manager</span>
                                </a>
                            </li></ul>

                        
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ancok New Iframe Manager</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4">Movies List</h4>

                                        <div class="table-responsive">
                                            <table id="datatable" class="table table-centered table-nowrap mb-0">
                                                <thead>
                                                    <tr>                                                                                                              
                                                        <th scope="col">No</th>
                                                        <th scope="col">Poster</th>
                                                        <th scope="col">Movies Title</th>
                                                        <th scope="col">Direct Link</th>
                                                        <th scope="col">Embed Code</th>
                                                        <th scope="col">Confirm Added</th>
                                                        <th scope="col">Action</th>
                                                        
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
 
					<?php  
					        function ancokplayer_hashx( $string, $action = 'e' ) {
                                                $secret_key = 'ancokplayer_ganteng'; // DO NOT EDIT THIS!
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
					        $counter = 1;
					        $domain_name = (isset($_SERVER["HTTP"]) ? "https" : "https") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                                $domain_name = str_replace("/index.php","",$domain_name);
						require 'includes/conn.php';                                                
						$sql = $conn->prepare("SELECT * FROM `ancokembed`");						
						$sql->execute();                                        
						while($fetch = $sql->fetch()){
						$id = $fetch['ancokembed_id'];
						$hashit = ancokplayer_hashx($id);
						if(empty($fetch['poster'])) {
                                                $fetch['poster'] = 'assets/images/default-poster.jpg';
                                                }
                                        ?>                                        
					<tr>    <td><?= $counter; ?></td>
					        <td><img src="<?php echo $fetch['poster']?>" alt="Image" class="avatar-xs rounded-circle" /></td>
						<td><?php echo $fetch['moviestitle']?></td>
						<td class="text-center"><a class="btn btn-primary btn-sm" href="play.php?id=<?php echo $hashit;?>" target="_blank">Direct Link</a></td>
						<td class="text-center"><button type="button" class="btn btn-success btn-sm" data-target="#modal_embed<?php echo $fetch['ancokembed_id']?>" data-toggle="modal"> Embed Code</button>
						<td><i class="mdi mdi-checkbox-blank-circle text-success mr-1"></i> Confirm</td>
						<td class="text-center"><button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#update<?php echo $fetch['ancokembed_id']?>">Edit</button>  <button type="button" class="btn btn-outline-danger btn-sm" data-target="#modal_delete<?php echo $fetch['ancokembed_id']?>" data-toggle="modal"> Delete</button></td>
					        
					</tr>
					<?php $counter++; ?>
					<div class="modal fade" id="modal_embed<?php echo $fetch['ancokembed_id']?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Iframe Embed</h3>
                                </div>
                                <div class="modal-body">
                                    &lt;iframe href="<?php echo $domain_name;?>/play.php?id=<?php echo $hashit;?>" frameborder="0" width="100%" height="100%" allowfullscreen="allowfullscreen"&gt; &lt;/iframe&gt;
                                </div>
                                <div class="modal-footer">
                                 <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>   
                                    
                                </div>
                            </div>
                        </div>
                    </div>  
                    
                    
                    
					<div class="modal fade" id="modal_delete<?php echo $fetch['ancokembed_id']?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Remove Data Movies!</h3>
                                </div>
                                <div class="modal-body">
                                    <center><h4>Are you sure you want to remove this data?</h4></center>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                    <a type="button" class="btn btn-danger" href="delete.php?id=<?php echo $fetch['ancokembed_id']?>">Yes</a>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <!-- modal update start -->
					<div class="modal fade" id="update<?php echo $fetch['ancokembed_id']?>" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<form method="POST" action="update.php">
									<div class="modal-header">
										<h3 class="modal-title">Edit Movies Data</h3>
									</div>	
									<div class="modal-body">										
										<div class="col-md-12">
											<div class="form-group">
												<label>New Movies Title</label>
												<input class="form-control" type="text" value="<?php echo $fetch['moviestitle']?>" name="moviestitle"/>
												<input type="hidden" value="<?php echo $fetch['ancokembed_id']?>" name="ancokembed_id"/>
											</div>
											<div class="form-group">
												<label>New Support Url</label>
												<input class="form-control" type="text" value="<?php echo $fetch['gdrivelink']?>" name="gdrivelink"/>
											</div>
											<div class="form-group">
												<label>New Embed Link 1</label> 
												<input class="form-control" type="text" value="<?php echo $fetch['embed1']?>" name="embed1"/>
											</div>
											<div class="form-group">
												<label>New Embed Link 2</label> 
												<input class="form-control" type="text" value="<?php echo $fetch['embed2']?>" name="embed2"/>
											</div>
											<div class="form-group">
												<label>New Embed Link 3</label> 
												<input class="form-control" type="text" value="<?php echo $fetch['embed3']?>" name="embed3"/>
											</div>
											<div class="form-group">
												<label>New Embed Link 4</label> 
												<input class="form-control" type="text" value="<?php echo $fetch['embed4']?>" name="embed4"/>
											</div>
											<div class="form-group">
												<label>New Subtitle Link</label> 
												<input class="form-control" type="text" value="<?php echo $fetch['subtitle']?>" name="subtitle"/>
											</div>
											<div class="form-group">
												<label>New Poster Link</label> 
												<input class="form-control" type="text" value="<?php echo $fetch['poster']?>" name="poster"/>
											</div>
											<div class="form-group">
												<button class="btn btn-success form-control" type="submit" name="update">Update</button>
											</div>
										</div>	
									</div>	
									<br style="clear:both;"/>
									<div class="modal-footer">
										<button class="btn btn-info" data-dismiss="modal">Close</button>
									</div>
								</form>
							</div>
						</div>
					</div>	
					<!-- Update end -->		
					
	<?php
            }        
        ?>
				
				
				</tbody>
                                                
                                                
                                                
                                               
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                2020 © New Iframe Manager 
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://ancokplayer.win" target="_blank" title="Ancokplayer">Ancokplayer.win</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        
        <!-- Modal Add New Movies -->
<div class="modal fade" id="modalForm2" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">             
                <h4 class="modal-title" id="myModalLabel">Add New Movies</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form method="POST" action="add.php">
				<div class="form-group">
					<label>Movies Title</label>
					<input class="form-control" type="text" name="moviestitle" required/>
				</div>
				<div class="form-group">
					<label>Support Link (insert Gdrive, Gphotos, Mp4, or m3u8 link here)</label>
					<input class="form-control" type="url" placeholder="https://domain.com/files.mp4" name="gdrivelink" required/>
				</div>
				<div class="form-group">
					<label>Link Server 1 (insert <span style="color:red">only embed link</span> here)</label> 
					<input class="form-control" type="url" placeholder="https://domain.com/embed-bqstfizku2j4.html" name="embed1" />
				</div>
				<div class="form-group">
					<label>Link Server 2 (insert <span style="color:red">only embed link</span> here)</label> 
					<input class="form-control" type="url" placeholder="https://domain.com/embed-bqstfizku2j4.html" name="embed2"/>
				</div>
				<div class="form-group">
					<label>Link Server 3 (insert <span style="color:red">only embed link</span> here)</label> 
					<input class="form-control" type="url" placeholder="https://domain.com/embed-bqstfizku2j4.html" name="embed3"/>
				</div>
				<div class="form-group">
					<label>Link Server 4 (insert <span style="color:red">only embed link</span> here)</label> 
					<input class="form-control" type="url" placeholder="https://domain.com/embed-bqstfizku2j4.html" name="embed4"/>
				</div>
				<div class="form-group">
					<label>Link Subtitle</label> 
					<input class="form-control" type="url" placeholder="https://domain.com/sub/subtitles.srt" name="subtitle"/>
				</div>
				<div class="form-group">
					<label>Link Poster</label> 
					<input class="form-control" type="url" placeholder="https://domain.com/img/poster.jpg" name="poster"/>
				</div>
				<div class="form-group">
				<button class="btn btn-primary form-control" type="submit" name="save">Add to Database</button>	
				</div>
			</form>
            </div>
            <div class="modal-footer">
	<button class="btn btn-primary" data-dismiss="modal">Close</button>
	</div>
        </div>
    </div>
</div>		
<!-- modal add movies end -->	

       <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

<!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="assets/libs/slick-slider/slick/slick.min.js"></script>
     
<!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/js/pages/datatables.init.js"></script>
        <script src="assets/js/pages/dashboard.init.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
<?php
	}
function display_error_msg()
{
	echo '<center><p class="error"><span class="tx-danger tx-13 tx-bold">Username or Password is Invalid!</span></p></center>';
}
?></div></div></div></div></div></div></div></body></html>