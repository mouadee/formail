/* global $, alert, console */

$(function() {

  $('.name').blur(function() {

    if ($(this).val().length > 10) {

      $(this).css('border', '1px solid #F00');

      $(this).parent().find('.nameerr').fadeIn(500);

    } else if ($(this).val().length < 1) {

      $(this).css('border', '1px solid #F00');

    } else {

      $(this).css('border', '1px solid #080');

    }
  });

  $('.msg').blur(function() {

    if ($(this).val().length < 10) {

      $(this).css('border', '1px solid #F00');

    } else {

      $(this).css('border', '1px solid #080');

    }
  });

  $('.email').blur(function() {

    if ($(this).val().length < 1) {

      $(this).css('border', '1px solid #F00');

    } else {

      $(this).css('border', '1px solid #080');

    }
  });
});
