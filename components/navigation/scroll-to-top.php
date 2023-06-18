<button id="top" type="button" class="btn" >
  <i class="fas fa-angle-up"></i>
</button>
<script>
  $(document).ready(function() {
    $(window).scroll(function() {
      if ($(this).scrollTop() > 100) {
        $('#top').fadeIn();
      } else {
        $('#top').fadeOut();
      }
    });
        
    $('#top').click(function() {
      $('html, body').animate({scrollTop : 0},800);
      return false;
    });
  });
</script>