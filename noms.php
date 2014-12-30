<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
$arr = array();
$i = 0;
foreach (glob("images/*") as $im) {
  $arr[$i] = $im;
  $i++;
}
# echo "there are " . count($arr) . " images";
# echo var_dump($arr);
$im = $arr[rand(0,count($arr)-1)];
switch(strtolower(pathinfo($im, PATHINFO_EXTENSION))) {
  case "jpg":
    header("Content-type: image/jpeg");
    break;
  case "png":
    header("Content-type: image/png");
    break;
  case "gif":
    header("Content-type: image/gif");
    break;
  default:
    header("Content-type: application/octet-stream");
}
echo file_get_contents($im);
exit();
