<?php
// Connection to Oracle Database

$conn = oci_connect("system", "password", 'XE');
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit;
}
?>