 <div id='fixed-bar' style="right: 0px;">
  <div id='bar-inner'>
    <a class='go-top' href='#page-wrapper' title='back to top'><img src="<?php echo GLOBAL_PATH;?>/assets/images/go-to-top.png" width="37" height="45" alt="go to top"></a>
  </div>
</div>
<script>
$(function () {
  $("#fixed-bar")
    .css({position:'fixed',bottom:'0px'})
    .hide();
  $(window).scroll(function () {
    if ($(this).scrollTop() > 200) {
      $('#fixed-bar').fadeIn(200);
    } else {
      $('#fixed-bar').fadeOut(200);
    }
  });
  $('.go-top').click(function () {
    $('html,body').animate({
      scrollTop: 0
    }, 1000);
    return false;
  });
});
</script>
