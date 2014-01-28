<?
include "s3upload.php";
$purl = 'http://www.domain.com/test.jpg';
$objectName ="newfilename.jpg";
$a=linkUploadToS32("testbucket",$purl,$objectName);
print_r($a);
?>