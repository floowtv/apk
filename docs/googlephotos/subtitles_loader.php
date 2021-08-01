<?php 
  $mimes = array('application/octet-stream');
  if(isset($_FILES['file'])){
    
    $fileName = $_FILES['file']['name'];
    $replaceFilename = array(' ', '_.', '._', '-', '..');
    $fileName = str_replace($replaceFilename, '.', $fileName);
    $fileType = $_FILES['file']['type'];
    $fileError = $_FILES['file']['error'];
    $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
    $extensions= array("srt","vtt","ancokplayer");
      if ($_FILES['file']['size'] < 2048000) {
      if(in_array($file_ext,$extensions)=== false){
         $fileStatus['message'] ="<>Extension not allowed, please choose a srt or vtt file!";
      }
      else {
		$domainServer = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);		
        move_uploaded_file($_FILES["file"]["tmp_name"], 'sub/' . $_SERVER['SERVER_NAME'] . '.' . $fileName);
        $imagePath = $domainServer . '/sub/' . $_SERVER['SERVER_NAME'] . '.' . $fileName;
        $fileStatus['status'] = 1;
        $fileStatus['message'] = 'Your file has been uploaded successfully!';
        $fileStatus['result'] = '<input type="text" class="form-control" value="'.$imagePath.'" onclick="this.select();"/>';
      }
    } 
  }    
    else{
        $fileStatus['status'] = 0;
        $fileStatus['message'] = 'The maximum file size for uploads is 2MB.';
        $fileStatus['result'] = '';}    
    echo json_encode($fileStatus);
    exit();
  
?>
