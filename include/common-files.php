<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="googlebot" content="noindex, nofollow" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
<link rel="shortcut icon" href="<?php echo GLOBAL_PATH;?>/assets/images/favicon.ico" type="image/x-icon"  />
<link href="<?php echo GLOBAL_PATH;?>/assets/css/hollyton-style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo GLOBAL_PATH;?>/assets/js/jquery-1.8.3.min.js"></script>
<script>
jQuery( document ).ready( function( $ ) {
		$('body').addClass('js');
		  var $menu = $('#menuu'),
		  	  $menulink = $('.menu-link'),
		  	  $menuTrigger = $('.has-submenu > a');
		$menulink.click(function(e) {
			e.preventDefault();
			$menulink.toggleClass('active');
			$menu.toggleClass('active');
		});
		$menuTrigger.click(function(e) {
			e.preventDefault();
			var $this = $(this);
			$this.toggleClass('active').next('ul').toggleClass('active');
		});
});
</script>
<script type="text/javascript">
  document.createElement('figure');
      document.createElement('header');
      document.createElement('nav');
      document.createElement('section');
      document.createElement('article');
      document.createElement('aside');
      document.createElement('footer');
</script>
<!-- IE 6/7/8/9 Fix Script Ends Here-->