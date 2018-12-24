<?php  
	$FROM = "nueigsynergy@gmail.com";
	$URL_OK = "_message.html?=4jdpR2L84jdpR2L84jcixjPyJGP+A3L84CdzVWdxVmcgIXdvlHItJXam52bjByb0BiclRmcvBibpByclRXdulWbgcXZmBibpBycslWYtVGIyV3b5ByajVGajBSZzFWZsBFIuU3b5Byb0BCduV2cg4WZlJGIzFGagwWah1WZg4WQ+AHP+IDavwDI+IDa84jIhJXYw1yd0JSPzNXYsNGI2lGZ84TMo9CPu9Wa0FWbylmZu92Yg42bpRHcpJ3YzJWdT5TMoxjPiIXZ05WZjpjbnlGbh1Cd4VGdi0TZslHdzBidpRGP";
	$URL_KO = "_message.html?+YXak9CP+YXak9CP+InY84jcixjPw9CPuIXZ0NXYtJWZ3BSZoRHI0NWY052bjBSZzFWZsBFIuIXZ2JXZzBSZoRHIu9GIkVmcyV3Yj9GIy9mcyVGIuFGIskncy92U+AHP+IDavwDI+IDa84jIhJXYw1yd0JSPzNXYsNGI2lGZ84TMo9CPu9Wa0FWbylmZu92Yg42bpRHcpJ3YzJWdT5TMoxjPiIXZ05WZjpjbnlGbh1Cd4VGdi0TZslHdzBidpRGP";
	$TO = "";
	$NAME = "";
	$CONFACTION = "";
	$CONFSUBJECT = "";
	$CONFTEXT = "";
	$CRLF = "\r\n";	
	while( list($key, $val) = each($_POST) ) {
		if( $key == "mlemail" )
			$TO = ( $val );
		else if( $key == "mlconfaction" )
			$CONFACTION = ( $val );
		else if( $key == "mlconfsubject" )
			$CONFSUBJECT = ( $val );
		else if( $key == "mlconftext" )
			$CONFTEXT = ( $val );
		else if( $key == "mlname" )
			$NAME = ( $val );
	}  
	$LANGEXT = substr($_SERVER['PHP_SELF'], -7);
	if( $LANGEXT[0] == '-' ) {
		$LANGEXT = substr($LANGEXT,0,3);
	} else
		$LANGEXT = "";
	$HREF = getenv("HTTP_REFERER");
	$HREF = substr( $HREF, 0, strrpos( $HREF, '/' ) + 1 );
	if( $TO != "" )
	{
		$SIGN = md5( $TO . "dbdf758f13d51e3ea23bdae3b79ccd79" );
		$URL = $HREF."_iserv/mailinglist/mlconfirm".$LANGEXT.".php?mlaction=".$CONFACTION."&mlsign=".$SIGN."&mlemail=".$TO."&mlname=".$NAME;
		$CONFSUBJECT = str_replace( "\'", "'", $CONFSUBJECT );
		$CONFTEXT = str_replace( "<br>", $CRLF, $CONFTEXT );
		$CONFTEXT = str_replace( "\'", "'", $CONFTEXT );		
		$headers = 
			"MIME-Version: 1.0" . $CRLF .
			"Content-Type: text/plain; charset=utf-8" . $CRLF .
			"Content-Transfer-Encoding: 8bit" . $CRLF .
			"From: $FROM" . $CRLF .
			"Return-Path: $FROM" . $CRLF .
			"X-Mailer: PHP/" . phpversion() . $CRLF;
		mail($TO, '=?UTF-8?B?'.base64_encode($CONFSUBJECT).'?=', $CONFTEXT . $CRLF . $URL, $headers );
		header( 'Location: ' . $HREF . $URL_OK );		
	} else
		header( 'Location: ' . $HREF . $URL_KO );		
?>  
