<?php
  /**
   * $SITE
   * A giant multidemensional array which helps define
   * the structure and configureation for our site
   * The construct takes a few different parameters
   * and could be extended easily to include other cusomizable
   * options.
   *
   * $SITE['TITLE']
   * the title of the site printed out in the <title/>
   *
   * $SITE['PAGES']
   * This is the page array. It works as such
   * $SITE['PAGES']['<name of desired page to map to $_GET['page'] parameter>']
   * The second level of the array represents a parameter that in our case is taken
   * from the get string of our request.
   *
   * In this example template.com/index.php?page=home would map to $SITE['PAGES']['home']
   * and from there we would use all of the configuration options to reneder that page.
   * 
   * Tip *********************************************************************************
   * You can use apache mod_rewrite in a .htaccess file to get clean urls
   * i.e. my .htaccess file would have something like
   * 
   * Here the first line takes / (root) and rewrites it to serve
   * index.php?page=home which maps to the same behavior we mentioned earlier.
   * RewriteRule ^/?$ index.php?page=home [QSA,L]
   * 
   * This line would take anything after / and serve is back so that is
   * how site.com/home would work
   * RewriteRule ^(\w+)/?$ index.php?page=$1 [QSA,L]
   * 
   * for more reference see .htaccess in the root of this template structure.
   ***************************************************************************************
   *
   * $SITE['PAGES']['<page>']['@var']
   * file == the file to serve can currently use .php and .html -- could probably serve other types but
   *         you should set correct headers if you do. I.E. .txt, .json, etc.
   *
   * title == title of the individual page
   * inMenu == boolean, whether or not to show in nav
   *           this is currently printed out in /app/global/global_header.php
   *
   * name == This is currently mainly used as the text for the link in the navigation.
   * 
   * stylesheets == the stylesheets array, you can load MULTIPLEZZZZ
   *                **printed out in the index.php**
   *
   * Obvious Tip *************************************************************************
   * If it wasn't clear in order to set new pages just add another entry onto the 'PAGES'
   * array of $SITE. You could probably also extend the pages property to be whatever
   * you want it to be.
   ***************************************************************************************
   *
  **/
  $SITE = array();
  $SITE['TITLE'] = 'Template';

  $SITE['PAGES'] = array();

  $SITE['PAGES']['home'] = array(
		'file' => 'home.php',
		'title' => 'This Template',
		'inMenu' => true,
		'name' => 'Home',
		'stylesheets' => array('home.css'),
  );
	
  $SITE['PAGES']['test'] = array(
		'file' => 'home.html',
		'title' => 'An HTML Template',
		'inMenu' => true,
		'name' => 'test name',
		'stylesheets' => array('home.css'),
  );
?>