var esperto;

(function($){

    var webinane = {
       like_it : function(obj) {      
        $('a.add-to-wishlist').on('click', function(e){
            var id = $(this).data('id');
            
            var thisis = this;
            var like_it = ( $(this).find('.fa-thumbs-o-up').length ) ? 'like' : 'unlike';
            var data = { action : 'actavista_ajax', subaction: 'actavista_like_it', id : id, type: like_it, nonce: actavista_data.nonce };
            var loggedin = $(this).data('loggedin');

            if ( loggedin === 0 ) {
                sweetAlert('Login', 'Please loggedin first to like or unlike this post', 'error');
                return false;
            }

            if ( ! like_it ) {
                return false;
            }
            
            swal.showLoading();

            $.ajax({
                url: actavista_data.ajaxurl,
                type: 'POST',
                data: data,
                success: function( res ) {

                    if ( res.type !== undefined ) {
                        if( like_it === 'like' ) {

                            $(thisis).find('i.fa').removeClass('fa-thumbs-o-up').addClass('fa-thumbs-up');
                        } else if ( like_it === 'unlike' ) {

                            $(thisis).find('i.fa').removeClass('fa-thumbs-up').addClass('fa-thumbs-o-up');
                        }
                        $(thisis).find('span').text(res.count);
                        sweetAlert( res.title, res.message, res.type );
                        
                    } else {
                        sweetAlert('Error', 'Something wrong you can not like this.', 'error');
                    }
                },
                complete: function( res ) {

                }
            });

            return false;
        },
        )},
        


        
    }

    esperto = webinane;


    $(document).ready(function(){
        webinane.like_it();


    });


})(jQuery); 