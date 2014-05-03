<?php 
include_once "globalpath.php";
include_once ROOT_PATH."/weblogic/header.php";
?>
<!DOCTYPE HTML>
<!--[if lt IE 9]><html class="ie"><![endif]-->
<!--[if gte IE 9]><!--><html><!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="canonical" href="<?php echo GLOBAL_PATH;?>/contact/"/>
<title>Contact Hollyton</title>
<meta name="description" content="Welcome to Hollyton Website" />
<meta name="keywords" content="Hollyton" />
<?php include "include/common-files.php";?>
<!-- main mobile Js -->
</head>
<body lang="en">
<div id="wrapper"><!----> 
  <!--Header Start Here-->
  <header>
    <div class="banner"> <img src="<?php echo GLOBAL_PATH;?>/assets/images/contact-banner.jpg" alt="Contact Hollyton Banner" > </div>
    <div class="header-outer">
      <div class="header-inner">
        <?php include "include/header.php";?>
      </div>
    </div>
    <!--Caption start here-->
    <div class="banner-caption">
      <div class="caption-text"> Valued in 2003 at £290,000. Valued in 2014 at £595,000. A rise of 105%. Average rental yield during that time of 4.8%. </div>
    </div>
    <!--Caption End Here-->
    <div class="clear"></div>
  </header>
  <!--Header End Here--> 
  
  <!--Content start Here-->
  <figure id="content">
    <div id="heading">
      <div class="content-inner">
        <h2>Contact Hollyton</h2>
        <div class="content-part">
          <div class="content-left">
            <p>You have probably already met us and are holding one of our cards.</p>
            <p>If you don't already have our contact details, please feel free to call Sam on X to discuss any aspect of our service.
            </p>
          </div>
          <div class="content-right">
            <article>
              <form method="post" action="<?php echo GLOBAL_PATH.'/'.SUBMITFORM_PATH.'/submit-contactus.php';?>" name="contactus">
                <fieldset class="default">
                  <ol>
                    <li>
                      <label>Title</label>
                      <input type="text" name="title" id="title">
                    </li>
                    <li>
                      <label>*Firstname</label>
                      <input type="text" name="fname" id="fname">
                    </li>
                    <li>
                      <label>Surname</label>
                      <input type="text" name="sname" id="sname">
                    </li>
                    <li>
                      <label>*Email</label>
                      <input type="email" name="email" id="email">
                    </li>
                    <li>
                      <label>Phone</label>
                      <input type="number" name="phone" id="phone">
                    </li>
                    <li>
                      <label>Comments</label>
                      <textarea name="comment" id="comment" rows="5" cols="29"></textarea>
                    </li>
                    <li>
                      <label></label>
                      <input type="submit" name="submitcontactus" value="Submit" class="button">
                    </li>
                  </ol>
                </fieldset>
              </form>
            </article>
          </div>
        </div>
      </div>
    </div>
  </figure>
  <!--Content end Here--> 
  <!--Footer Start Here-->
  <footer>
    <?php include "include/footer.php";?>
  </footer>
  <!--Footer End Here--> 
</div>
</body>
</html>