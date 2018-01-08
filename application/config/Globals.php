<?php

// Create customized config variables
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 $parts = explode('/', $actual_link);
$new_url = $parts[0].'/'.$parts[1].'/'.$parts[2].'/'.$parts[3].'/';


$config['IMG_PATH']= $new_url.'/assets1/images/';
$config['IMG_PATH1'] = $new_url.'/assets/images/';
$config['title']= 'CodeIgniter Global Variable';

?>