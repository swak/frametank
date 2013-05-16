<?php
  //site context will come from get string
  if (isset($_GET['page'])) {
  	$context = htmlspecialchars($_GET['page'], ENT_QUOTES, 'UTF-8');

  	//Set the site context Constant which gets used everywhere.
  	$SITE_CONTEXT = $_GET['page'];
  }

  /**
   *
   * Load some awesome dependencies and utilities
   * utilities.php *
   * houses our utility functions
   *
   * config.php *
   * this is the cuts of the application it builds the
   * $SITE array which has the site structure available.
   *
   * templateBodyParser.php *
   * this is a simple processor which takes html or php files
   * and populates them into $SITE['BODY_CONTENT']
   *
  **/
  include 'app/utilities.php';
  include 'app/config.php';
  include 'app/templateBodyParser.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $SITE['PAGES'][$SITE_CONTEXT]['title']; ?></title>s

<?php
  /**
   *
   * simple for loop goes through the site the $SITE['PAGES'] array and uses
   * the $SITE_CONTEXT to find the page and serve it's stylesheets
   * 
   * this is all set in /apps/config.php
   * 
   * next optimization:
   * have paths pull from constant sheet so you can update easier.
   * 
   * future future -- 
   * add option maybe fire compass job to aggregate and compile css.
   *
  **/
  for($i = 0; $i < count($SITE['PAGES'][$SITE_CONTEXT]['stylesheets']); $i++) {
    echo '<link type="text/css" rel="stylesheet" href="css/' . $SITE['PAGES'][$SITE_CONTEXT]['stylesheets'][$i] . '"/>';
  }
?>
  </head>
  <body>
    <div id="site-wrapper">
      <?php include 'model/global/global_header.php'; ?>
	
      <div id="content-wrapper">
        <?php
          //get body content set from app/page.tpl.php
          //should rename page.
          echo $SITE['BODY_CONTENT']; 
          
          //get footer
          include 'app/global/global_footer.php';
         ?>
      </div>
    </div>
  </body>
</html>