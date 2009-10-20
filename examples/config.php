<?PHP

$shell['title1'] = "jQuery postMessage";
$shell['link1']  = "http://benalman.com/projects/jquery-postmessage-plugin/";

ob_start();
?>
  <a href="http://benalman.com/projects/jquery-postmessage-plugin/">Project Home</a>,
  <a href="http://benalman.com/code/projects/jquery-postmessage/docs/">Documentation</a>,
  <a href="http://github.com/cowboy/jquery-postmessage/">Source</a>
<?
$shell['h3'] = ob_get_contents();
ob_end_clean();

$shell['jquery'] = 'jquery-1.3.2.js';

$shell['shBrush'] = array( 'JScript' );

?>
