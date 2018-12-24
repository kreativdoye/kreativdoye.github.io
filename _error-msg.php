<?php
$HttpStatus = "";
if( isset($_SERVER["REDIRECT_STATUS"]) ) $HttpStatus = $_SERVER["REDIRECT_STATUS"];
if( $HttpStatus == "" ) { @$HttpStatus = $_REQUEST["err"]; }
$lang = "en";
if( isset($_SERVER["HTTP_ACCEPT_LANGUAGE"]) ) $lang = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2);
$redirecturl = "index.html";
if( $HttpStatus == 400) {
$redirecturl = "_message.html?+YXak9CP+YXak9CP+InY84jcixjPw9CP0NXZ1FXZSBCZhJkPwxjPyg2L8AiPygGP+ISYyFGctcHdi0zczFGbjBidpRGP+EDavwjcvJncF5TMoxjPiIXZ05WZjpjbnlGbh1Cd4VGdi0TZslHdzBidpRGP";}
if( $HttpStatus == 404) {
$redirecturl = "_message.html?+YXak9CP+YXak9CP+InY84jcixjPw9CPk5WdvZEI09mTgU2ZhBlPwxjPyg2L8AiPygGP+ISYyFGctcHdi0zczFGbjBidpRGP+EDavwjcvJncF5TMoxjPiIXZ05WZjpjbnlGbh1Cd4VGdi0TZslHdzBidpRGP";}
if( $HttpStatus == 502) {
$redirecturl = "_message.html?+YXak9CP+YXak9CP+InY84jcixjPw9CP5F2dlRXYHBCZhJkPwxjPyg2L8AiPygGP+ISYyFGctcHdi0zczFGbjBidpRGP+EDavwjcvJncF5TMoxjPiIXZ05WZjpjbnlGbh1Cd4VGdi0TZslHdzBidpRGP";}
if( $HttpStatus == 504) {
$redirecturl = "_message.html?==gP2lGZvwjP2lGZvwjPyJGP+InY84DcvwDd19WZtlGVgkXY3VGdhdkPwxjPyg2L8AiPygGP+ISYyFGctcHdi0zczFGbjBidpRGP+EDavwjcvJncF5TMoxjPiIXZ05WZjpjbnlGbh1Cd4VGdi0TZslHdzBidpRGP";}
if( headers_sent() ) {
?>
<html>
<head>
<?php echo('<meta http-equiv="Refresh" content="0; url=/'.$redirecturl.'">'); ?>
</head>
<body><p style="text-align:center"><br><br><b><a href="/index.html">Error</a></body></html>
<?php
} else exit( header( "Location: /" . $redirecturl ) );
?>