<?php
include_once("config.php");
$nim = $_GET['id'];
$result = mysqli_query($mysqli, "UPDATE msmhs SET login_pass='1' WHERE NIMHSMSMHS=$nim");
if (!empty($result));{
header("Location: index.php");
}
?>
