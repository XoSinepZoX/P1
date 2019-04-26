<?php
$conn = new mysqli('','root','','test');
if ($conn->connect_errno)
{
	echo "Connect Fail!";
}
?>
