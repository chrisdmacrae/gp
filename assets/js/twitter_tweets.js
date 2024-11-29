(function ($) {
	"use strict";
	var reston = {
		count: 0,
		tweets: function (options, selector) {
			var nonce = $(this).find('input[name=_wpnonce]').val();
			options.action = 'actavista_ajax';
			options.subaction = 'actavista_twitter_ajax_callback';
			options.data =actavista_data.nonce;

			$.ajax({
				url: actavista_data.ajaxurl,
				type: 'POST',
				data: options,
				dataType: "json",
				success: function (res) {

					var reply = res;
					var html = '';

					$.each(reply, function (k, element) {
						var date = new Date(element.created_at);
						html += '<div class="twitter-feed"><i class="fab fa-twitter-square"></i><div class="twitter-date"><h4>@';
						html += element.user.name;
						html += '</h4>';

						html += '<span>'+timeSince(date)+'</span>';
						html += '<p>'+element.text+'</p></div></div>';


					});


					$(selector).append(html);
					$('.twitter-caro').owlCarousel({
						loop: true,
						margin: 0,
						autoplay: false,
						autoplayTimeout: 2200,
						smartSpeed: 1000,
						autoplayHoverPause: true,
						nav: false,
						dots: false,
						animateIn: 'slideInDown',
						animateOut: 'slideOutDown',
						responsiveClass:true,
						responsive:{
							0:{
								items:1,
								nav: false
							},
							600:{
								items:2,

							},
							1000:{
								items:2,
							}
						}

					});

				}
			});

		},
	};

	$.fn.tweets = function (options) {

		var settings = {
			screen_name: 'wordpress',
			count: 3,
			data:''
		};
		options = $.extend(settings, options);

		reston.tweets(options, this);
	};


})(jQuery);

function timeSince(date) {

	var seconds = Math.floor((new Date() - date) / 1000);

	var interval = Math.floor(seconds / 31536000);

	if (interval > 1) {
		return interval + " years";
	}
	interval = Math.floor(seconds / 2592000);
	if (interval > 1) {
		return interval + " months ago";
	}
	interval = Math.floor(seconds / 86400);
	if (interval > 1) {
		return interval + " days ago";
	}
	interval = Math.floor(seconds / 3600);
	if (interval > 1) {
		return interval + " hours ago";
	}
	interval = Math.floor(seconds / 60);
	if (interval > 1) {
		return interval + " minutes ago";
	}
	return Math.floor(seconds) + " seconds ago";
} 