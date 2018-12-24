<?php  
	$ACTION = "";    
	$NAME = "";
	$SIGN = "";
	$EMAIL = "";
	$URL_KO99 = "_message.html?+YXak9CP+YXak9CP+InY84jcixjPw9CPpkTOgI3byJXZoAiL0NXZ1FXZyBic19Weg0mcpZmbvNGIvRHIyVGZy9GIulGIzVGd15WatBydlZGIulGIzxWah1WZgIXdvlHIrNWZoNGIlNXYlxGUg4SdvlHIvRHI05WZzBiblVmYgMXYoBCbpFWblBibB5Dc84jIhJXYw1yd0JSPzNXYsNGI2lGZ84TMo9CPu9Wa0FWbylmZu92Yg42bpRHcpJ3YzJWdT5TMoxjPiIXZ05WZjpjbnlGbh1Cd4VGdi0TZslHdzBidpRGP";
	$URL_KO2 = "_message.html?=4jdpR2L84jdpR2L84jcixjPyJGP+A3L8kiMgI3byJXZoAiL0NXZ1FXZyBic19Weg0mcpZmbvNGIvRHIyVGZy9GIulGIzVGd15WatBydlZGIulGIzxWah1WZgIXdvlHIrNWZoNGIlNXYlxGUg4SdvlHIvRHI05WZzBiblVmYgMXYoBCbpFWblBibB5Dc84jIhJXYw1yd0JSPzNXYsNGI2lGZ84TMo9CPu9Wa0FWbylmZu92Yg42bpRHcpJ3YzJWdT5TMoxjPiIXZ05WZjpjbnlGbh1Cd4VGdi0TZslHdzBidpRGP";
	$URL_SUB_CONF = "_message.html?+YXak9CP+YXak9CP+InY84jcixjPw9CPuU3b5ByauFGaUBiLzJXdvhGI3VmZgEGIulGIlZXa0NWZmZWZgUmYgwGbpdHI0lEIuQWZyVGdzl2ZlJHIuVWZiBychhGI0NXZ1FXZyBSZilmcjNnY1NHIyV3bZ5Dc84jIhJXYw1yd0JSPzNXYsNGI2lGZ84TMo9CPu9Wa0FWbylmZu92Yg42bpRHcpJ3YzJWdT5TMoxjPiIXZ05WZjpjbnlGbh1Cd4VGdi0TZslHdzBidpRGP";
	$URL_UNSUB_CONF = "_message.html?==gP2lGZvwjP2lGZvwjPyJGP+InY84DcvwjL19WegsmbhhGVg4ycyV3boBydlZGIhBibpBSZ2lGdjVmZmVGIlJGIsxWa3BCdJBiLkVmclR3cpdWZyBiblVmYgMXYoBCdzVWdxVmcgUmYpJ3YzJWdz5WdgIXdvllPwxjPiEmchBXL3RnI9M3chx2YgYXakxjPxg2L842bpRXYtJXam52bjBibvlGdwlmcjNnY1NnbV5TMoxjPiIXZ05WZjpjbnlGbh1Cd4VGdi0TZslHdzBidpRGP";
	$HTTP_PREFIX = (false)?'https://':'http://';		
	while( list($key, $val) = each($_GET) ) {  
		if( $key == "mlaction" )
			$ACTION = $val;
		else if( $key == "mlsign" )
			$SIGN = $val;
		else if( $key == "mlemail" )
			$EMAIL = ( $val );    
		else if( $key == "mlname" )
			$NAME = ( $val );    
	}  
	$HREF = $HTTP_PREFIX.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	$HREF = substr( $HREF, 0, strpos( $HREF, '_iserv' ) );
	if( $SIGN !== md5( $EMAIL . "dbdf758f13d51e3ea23bdae3b79ccd79" ) ) {
		header( 'Location: ' . $HREF . $URL_KO99 );		
		exit;
	}
	$old_mask = umask( 0 );
	if( !is_dir( 'data' ) ) {
		if( mkdir( 'data', 0775 ) === FALSE ) {
			umask( $old_mask ); 
			header( 'Location: ' . $HREF . $URL_KO2 );		
			exit;
		}
		else {
			touch( 'data/index.html' );
		}
	}
	chdir( 'data' );
	if( $ACTION == 'sub' ) {
		if( file_exists( $EMAIL.'.unsub' ) )
			rename( $EMAIL.'.unsub', $EMAIL.'.sub' );
		touch( $EMAIL . '.sub' );
		header( 'Location: ' . $HREF . $URL_SUB_CONF );		
	}
	else if ( $ACTION == 'unsub' ) {
		if( file_exists( $EMAIL.'.sub' ) )
			rename( $EMAIL.'.sub', $EMAIL.'.unsub' );
		touch( $EMAIL . '.unsub' );
		header( 'Location: ' . $HREF . $URL_UNSUB_CONF );		
	}
?>  
