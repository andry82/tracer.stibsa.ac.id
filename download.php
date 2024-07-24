
<?php
// Source Code Download File dengan PHP
if(isset($_GET['nama_file'])){
        $back_dir = "document/";
	$file = $back_dir.$_GET['nama_file'];	
	if (file_exists($file))
	{
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($file));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: private');
		header('Pragma: private');
		header('Content-Length: ' . filesize($file));
		ob_clean();
		flush();
		readfile($folder.$file);
		exit;

	} 
	else 
	{
		echo "file {$_GET['nama_file']} sudah tidak ada.";
	}
	
}
?>