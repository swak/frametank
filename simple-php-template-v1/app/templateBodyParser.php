<?php
  $included_content_file = $SITE['PAGES'][$SITE_CONTEXT]['file'];
	
  ob_start();
	
	include $included_content_file;
	
  $SITE['BODY_CONTENT'] = ob_get_contents();
  ob_clean();
?>