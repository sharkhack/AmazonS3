#!/usr/bin/perl -T

use LWP::UserAgent;
use POSIX qw/ceil floor/;
use strict;
use warnings;

use Amazon::S3;

print "Content-type: text/plain\n\n";

my $aws_access_key_id     = "";
my $aws_secret_access_key = "";

my $s3 = Amazon::S3->new({
    aws_access_key_id     => $aws_access_key_id,
    aws_secret_access_key => $aws_secret_access_key,
    retry                 => 1
});

my $bucket = $s3->bucket("testbucketname");

$bucket->add_key_filename(
'newfilename.jpg',
'/usr/lib/cgi-bin/test.jpg',
{
    content_type => 'image/jpeg',
    cache_control => 'max-age=315360000'
}
);

$bucket->set_acl({
    key       => 'newfilename.jpg',
    acl_short => 'public-read',
});


1;