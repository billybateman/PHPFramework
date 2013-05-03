<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if(isset($site->site_title)) { echo $site->site_title; } else {  echo 'Your Title here!'; } ?></title>

    <!-- Add the standard css styles. This will render a page that will work without a theme. -->
    <link href="http://sites.whitelbl.com/assets/css/reset.css" rel="stylesheet" />
    <link href="http://sites.whitelbl.com/assets/css/typos.css" rel="stylesheet" />
    <link href="http://sites.whitelbl.com/assets/css/page.css" rel="stylesheet" />
    
    <link href="http://sites.whitelbl.com/assets/css/content.css" rel="stylesheet" />
    
    <!-- Add the default javascript libraries: JQuery and our own custom default.js -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js" type="text/javascript"></script>
    <script src="http://sites.whitelbl.com/assets/js/default.js"></script>
            
    <link href="http://sites.whitelbl.com/assets/themes/advanced/assets/css/style.css" rel="stylesheet" />
    <script src="http://sites.whitelbl.com/assets/themes/advanced/assets/js/theme.js"></script> 
            
    <style type="text/css">
    /* site-wide css */
    
    </style>

</head>

<body>
    
    <div id="page">
		
        <!-- pageHeader -->
        <div id="pageHeader">
        
            <div id="pageHeaderContainer">
        
                <h1><?php if(isset($site->site_title)) { echo $site->site_title; } else {  echo 'Your Title here!'; } ?></h1>
                
                
            </div>
        </div>
        
        <!-- pageMenu -->
        <div id="pageMenu">
                
            <div id="pageMenuContainer">
                    <?php if(isset($site->site_menu)) { echo $site->site_menu; } else {  echo '<li><ul><li><a href="#">Home</a></li></ul></li>'; } ?> 
            </div>
            
        </div>
                
          
      
        <!--- pageContent -->
        <div id="pageContent">
        
            <div id="pageContentContainer" style="position:relative;width:800px;height:800px;">
            
                <?php if(isset($site->site_content)) { echo $site->site_content; } else {  echo 'This is where your content would go, we need to change to this from text to html.'; } ?> 
                
                    
                <div class="clear-it"></div>

            
            </div>
            
        </div>
        
    </div>




    <!-- pageFooter -->
    <div id="footer">
    
        <div id="footerContainer">
    
            <div id="footerCopyright">

                &copy; 2011 <?php if(isset($site->site_title)) { echo $site->site_title; } else {  echo 'Your Title here!'; } ?>               
            
             </div> 
         
        
        </div>
    
    </div>

   
        
</body>

</html>
<?php //var_dump($test); echo $in; ?>
<?php //$urlhelper = new urlhelper();becho $urlhelper->link('/main', 'main link'); ?>