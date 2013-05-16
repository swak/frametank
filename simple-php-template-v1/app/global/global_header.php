<div id="site-header">
  <h1><?php echo $SITE['title']; ?></h1>

  <ul id="site-navigation" class="navigation-link-group">
    <?php
      /**
       *
       * Foreach loop that goes over the pages of the site
       * pages are derived from $SITE['PAGES'] which is set
       * in /app/config.php
       *
      **/
	  foreach ($SITE['PAGES'] as $page) {
					
        $linkItem = strtolower($page['name']);
        $linkItem = explode(' ', $linkItem);
        $linkItem = implode('-', $linkItem);	
        
        /**
         *
         * If the page is inMenu is set to true then 
         * print out a link in the header for the page item.
         *
         * this is set in /app/config.php
         *
        **/
        if ($page['inMenu']) {
		  echo "<li><a class=\"navigation-link ";		
	      
	      /**
           *
           * chooseSelectedLink is a function that takes the $SITE_CONTEXT
           * and the $linkItem compares them and returns a string of "selected"
           * which is then used in the css. You can extend chooseSelectedLink
           * in /app/bootstrap.php
           *
           * $SITE_CONTEXT (String)
           * set in /app/config.php
	      **/	
		  chooseSelectedLink($SITE_CONTEXT, $linkItem);
		  echo "\" href=\"?page=$linkItem\" title=\"" . $page['name'] . "\">" . $page['name'] . "</a></li>";
		}
      }					
    ?>
  </ul>
</div>