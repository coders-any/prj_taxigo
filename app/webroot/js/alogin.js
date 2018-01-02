$(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
    // $( ".icheckbox_square-blue" ).addClass( "checked" );
    $("#register .iCheck-helper").click(function(){
        var val = $(".icheckbox_square-blue").attr('aria-checked');
          if(val == 'true'){
              $("#submit-form").attr('disabled',false);
          } else {
              $("#submit-form").attr('disabled',true);
          }
      });
});

          
