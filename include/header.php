<?php

switch ($getUrl) {
	
	case '/':
		$home = 'active';
		break;
		
	case '/why-london.php':
		$whyLondon = 'active';
		break;
	
	case '/looking-invest.php':
		$lookingInvest = 'active';
		break;
		
	case '/property-sell.php':
		$propertySell = 'active';
		break;
		
	case '/philosophy.php':
		$philosophy = 'active';
		break;
	
	case '/contact.php':
		$contact = 'active';
		break;
}
?>
<!--Logo Start Here-->
<div id="logo">
  <h1><a href="<?php echo GLOBAL_PATH;?>"><img src="<?php echo GLOBAL_PATH;?>/assets/images/logo.png" title="Hollyton" alt="Hollyton"> </a></h1>
</div>
<!--Logo end Here-->
<div id="head-right">
  <div class="call-us"><span class="ico-phone"><img src="<?php echo GLOBAL_PATH;?>/assets/images/phone.png" alt="phone" /> <?php echo CONTACT_NO;?></span> <span class="ico-mail"><img src="assets/images/mail.png" alt="mail" /> <a href="mailto:<?php echo SALES_EMAIL_ID;?>"><?php echo SALES_EMAIL_ID;?></a></span></div>
  <div class="clear-750"></div>
  <!--Nav Start Here-->
  
  <nav>
    <div class="nav_750 display750"> <a href="#menuu" class="menu-link">Menu</a>  </div>
    <div id="menuu" class="menu">
      <ul>
        <li><a href="<?php echo GLOBAL_PATH;?>" class="<?php echo $home;?>"> Home</a></li>
        <li><a href="<?php echo GLOBAL_PATH;?>/why-london.php" class="<?php echo $whyLondon;?>">WHY LONDON?</a></li>
        <li><a href="<?php echo GLOBAL_PATH;?>/looking-invest.php" class="<?php echo $lookingInvest;?>">LOOKING TO INVEST?</a></li>
        <li><a href="<?php echo GLOBAL_PATH;?>/property-sell.php" class="<?php echo $propertySell;?>">PROPERTY TO SELL?</a></li>
        <li><a href="<?php echo GLOBAL_PATH;?>/philosophy.php" class="<?php echo $philosophy;?>">HOLLYTON'S PHILOSOPHY</a></li>
        <li class="no-divder"><a href="<?php echo GLOBAL_PATH;?>/contact.php" class="<?php echo $contact;?>">CONTACT</a></li>
      </ul>
    </div>
  </nav>
  <!--Nav End Here--> 
</div>
