<?php
require( "s3.class.php" );

function uploadToS3($bucketname, $imagePath, $imageFileName)
{
$s3svc = new S3();

$fh = fopen($imagePath.$imageFileName, 'r' );
$contents = fread( $fh, filesize($imagePath.$imageFileName ) );
fclose( $fh );
$meta = array("Cache-Control" => "max-age=315360000");
$out = $s3svc->putObject( $imageFileName, $contents, $bucketname , 'public-read', 'image/jpeg' );
return $out;
}

function linkUploadToS3($bucketname,$imgLink,$s3FileName)
{
	$s3svc = new S3();
	$contents = file_get_contents($imgLink);
	$meta = array("Cache-Control" => "max-age=315360000");
	$out = $s3svc->putObject( $s3FileName, $contents, $bucketname , 'public-read', 'image/jpeg',$meta);
	return $out;
}

function contentUploadToS3($bucketname,$contents,$s3FileName,$type = 'image/jpeg')
{
	$s3svc = new S3();
	$meta = array('Cache-Control' => 'max-age=315360000');
	$out = $s3svc->putObject( $s3FileName, $contents, $bucketname , 'public-read',$type,$meta);
	return $out;
}

function linkUploadToS3xml($bucketname,$imgLink,$s3FileName)
{
	$s3svc = new S3();
	$contents = file_get_contents($imgLink);
	$meta = array('Cache-Control' => 'max-age=315360000');
	$out = $s3svc->putObject( $s3FileName, $contents, $bucketname , 'public-read', 'text/xml',$meta );
	return $out;
}

function uploadToS3ForPNG($bucketname,$contents,$s3FileName){
	$s3svc = new S3();
	$meta = array('Cache-Control' => 'max-age=315360000');
	$out = $s3svc->putObject( $s3FileName, $contents, $bucketname , 'public-read', 'image/png',$meta );
	return $out;
}

function s3DleteImage($bucketname,$imageName){
	$s3svc = new S3();
	$out =$s3svc->deleteObject ($imageName,$bucketname);
	return $out;
}

function s3SwfUploader($bucketname,$contents,$s3FileName) {
	$s3svc = new S3();
	$meta = array('Cache-Control' => 'max-age=315360000');
	$out = $s3svc->putObject( $s3FileName, $contents, $bucketname , 'public-read', 'application/x-shockwave-flash',$meta );
	return $out;
}
?>