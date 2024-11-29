jQuery(function ($) {
       'use strict';
    actavista_show_correct_format($('#post-formats-select input[name="post_format"]:checked').attr('value'));
    $('#post-formats-select input[name="post_format"]').change(function () {
        actavista_show_correct_format($(this).attr('value'));
    });
    if($('select#actavista_audio_type').val() == 'SoundCloud'){
        $('.soundcloud-section').show();
         $('.own-url-section').hide();
    }else{
        $('.own-url-section').show();
        $('.soundcloud-section').hide();
    }
    $('select#actavista_audio_type').on('change',function(e){
        if($(this).val() == 'SoundCloud'){
            $('.soundcloud-section').show();
            $('.own-url-section').hide();
        }else if($(this).val() == 'Own Audio'){
            $('.own-url-section').show();
            $('.soundcloud-section').hide();
            
        }
    });
});

function actavista_show_correct_format(format) {
       'use strict';
    if (format == 'image') {
        actavista_featured_image_position();
    } else {
        actavista_reset_featured_image_position();
    }
    jQuery('#actavista_format_quote').hide();
    jQuery('#actavista_format_link').hide();
    jQuery('#actavista_format_audio').hide();
    jQuery('#actavista_format_gallery').hide();
    jQuery('#actavista_format_video').hide();
    jQuery('#actavista_format_status').hide();
    jQuery('#actavista_format_' + format).show();
}

function actavista_featured_image_position() {
    jQuery('#postimagediv').insertAfter('#postdivrich').find('.inside').css('text-align', 'center');
    jQuery('#postimagediv').addClass('top');
}
function actavista_reset_featured_image_position() {
    jQuery('#postimagediv').insertAfter('#tagsdiv-post_tag');
    jQuery('#postimagediv').removeClass('top');
}
 