var teslaThemes = {

	body: jQuery('body'),
	header: jQuery('.header'),
	scroll: jQuery(window).scrollTop(),
	searchBox: jQuery('.search-box'),
	searchboxVisible: false,
	mobileNavigationVisible: false,
	contactFormVisible: false,
	percentageBarVisible: false,
	statisticsCounterVisible: false,

	init: function () {
		this.module();
	},

	module: function () {
		this.fitvids();
		this.swipeBox();
		this.loadFlickr();
		this.loadTwitter();
		this.scrollToTop();
		this.fixedHeader();
		this.searchboxToggle();
		this.mobileNavigation();
		this.footerToggle();
		this.footerToggle2();
		this.percentageBar();
		this.statisticsCounter();
		this.gallerySlider();
		this.accordion();
		this.newTeamMember();
		this.placeholderInit();
		this.mediaElementInit();
		this.wowInit();
		this.teslaSliderImageFix();
		this.mainPortfolio();
		this.gridPortfolio();
		this.mosaicPortfolio();
		this.testimonialsScrollBox();
	},

	fitvids: function () {
		var postWithVideo = jQuery('.post-cover');

		postWithVideo.fitVids();
	},

	swipeBox: function () {
		if (jQuery('.swipebox').length) {
			jQuery('.swipebox').swipebox();
		}
	},

	loadFlickr: function () {
		jQuery('.flickr_widget').each(function () {
			var stream = jQuery(this);
			var stream_userid = stream.attr('data-userid');
			var stream_items = parseInt(stream.attr('data-items'), 10);
			jQuery.getJSON("https://api.flickr.com/services/feeds/photos_public.gne?lang=en-us&format=json&id=" + stream_userid + "&jsoncallback=?", function (stream_feed) {
				var i;
				var stream_function = function (i) {
					if (stream_feed.items[i].media.m) {
						var stream_a = jQuery('<a>').addClass('PhotostreamLink').attr('href', stream_feed.items[i].link).attr('target', '_blank');
						var stream_img = jQuery('<img>').addClass('PhotostreamImage').attr('src', stream_feed.items[i].media.m).attr('alt', '').each(function () {
							var t_this = this;
							var j_this = jQuery(this);
							var t_loaded_function = function () {
								stream_a.append(t_this);
							};
							var t_loaded_ready = false;
							var t_loaded_check = function () {
								if (!t_loaded_ready) {
									t_loaded_ready = true;
									t_loaded_function();
								}
							};
							var t_loaded_status = function () {
								if (t_this.complete && j_this.height() !== 0)
									t_loaded_check();
							};
							t_loaded_status();
							jQuery(this).load(function () {
								t_loaded_check();
							});
						});
						stream.append(jQuery('<li>').append(stream_a));
					}
				};
				for (i = 0; i < stream_items && i < stream_feed.items.length; i++) {
					stream_function(i);
				}
			});
		});
	},

	loadTwitter: function () {
		var linkify = function (text) {
			text = text.replace(/(https?:\/\/\S+)/gi, function (s) {
				return '<a href="' + s + '">' + s + '</a>';
			});
			text = text.replace(/(^|)@(\w+)/gi, function (s) {
				return '<a href="http://twitter.com/' + s + '">' + s + '</a>';
			});
			text = text.replace(/(^|)#(\w+)/gi, function (s) {
				return '<a href="http://search.twitter.com/search?q=' + s.replace(/#/, '%23') + '">' + s + '</a>';
			});
			return text;
		};
		jQuery('.twitter_widget').each(function () {
			var t = jQuery(this);
			var t_date_obj = new Date();
			var t_loading = 'Loading tweets..'; //message to display before loading tweets
			var t_container = jQuery('<ul>').addClass('twitter').append('<li>' + t_loading + '</li>');
			t.append(t_container);
			var t_user = t.attr('data-user');
			var t_posts = parseInt(t.attr('data-posts'), 10);
			jQuery.getJSON("php/twitter.php?user=" + t_user, function (t_tweets) {
				t_container.empty();
				for (var i = 0; i < t_posts && i < t_tweets.length; i++) {
					var t_date = Math.floor((t_date_obj.getTime() - Date.parse(t_tweets[i].created_at)) / 1000);
					var t_date_str;
					var t_date_seconds = t_date % 60;
					t_date = Math.floor(t_date / 60);
					var t_date_minutes = t_date % 60;
					if (t_date_minutes) {
						t_date = Math.floor(t_date / 60);
						var t_date_hours = t_date % 60;
						if (t_date_hours) {
							t_date = Math.floor(t_date / 60);
							var t_date_days = t_date % 24;
							if (t_date_days) {
								t_date = Math.floor(t_date / 24);
								var t_date_weeks = t_date % 7;
								if (t_date_weeks)
									t_date_str = t_date_weeks + ' week' + (1 == t_date_weeks ? '' : 's') + ' ago';
								else
									t_date_str = t_date_days + ' day' + (1 == t_date_days ? '' : 's') + ' ago';
							} else
								t_date_str = t_date_hours + ' hour' + (1 == t_date_hours ? '' : 's') + ' ago';
						} else
							t_date_str = t_date_minutes + ' minute' + (1 == t_date_minutes ? '' : 's') + ' ago';
					} else
						t_date_str = t_date_seconds + ' second' + (1 == t_date_seconds ? '' : 's') + ' ago';
					var t_message =
						'<li>' +
						linkify(t_tweets[i].text) +
						'<i class="fa fa-twitter"></i>' + 
						'</li>';
					t_container.append(t_message);
				}
			});
		});
	},

	scrollToTop: function () {
		jQuery('.back-to-top').on('click', function () {
			jQuery('body, html').animate({
				scrollTop: 0
			}, 1200, 'swing');

			return false;
		});
	},

	fixedHeader: function () {
		jQuery(window).scroll(function () {
			teslaThemes.scroll = jQuery(window).scrollTop();
			if (!jQuery('.blog-page').length && !jQuery('.single-post').length) {
				if (teslaThemes.scroll >= 70) {
					teslaThemes.header.addClass('sticky');
				} else {
					teslaThemes.header.removeClass('sticky');
				}
			};
			
			if (!Modernizr.touch) {   
				teslaThemes.searchBox.css('margin-top', '-110px');
				teslaThemes.searchboxVisible = false;
			}
		});

		if (teslaThemes.scroll > 70) {
			teslaThemes.header.addClass('sticky');
		}
	},

	searchboxToggle: function () {

		jQuery('.header .right-box .fa-search').on('click', function () {
			if (!teslaThemes.searchboxVisible) {
				teslaThemes.searchboxVisible = true;
				teslaThemes.searchBox.css('margin', '0');
				teslaThemes.header.addClass('sticky');
			} else {
				teslaThemes.searchboxVisible = false;
				teslaThemes.searchBox.css('margin-top', '-110px');

				teslaThemes.scroll = jQuery(window).scrollTop();
				if (!jQuery('.blog-page').length && !jQuery('.single-post-page').length && teslaThemes.scroll < 70) {
					teslaThemes.header.removeClass('sticky');
				}
			}
		});

		if (Modernizr.touch) {
			jQuery('.search-box .search-input').focusout(function () {
				teslaThemes.searchboxVisible = false;
				teslaThemes.searchBox.css('margin-top', '-110px');

				teslaThemes.scroll = jQuery(window).scrollTop();
				if (!jQuery('.blog-page').length && !jQuery('.single-post-page').length && teslaThemes.scroll < 70) {
					teslaThemes.header.removeClass('sticky');
				}
			});
		}
	},

	mobileNavigation: function () {
		var mainNav = jQuery('.main-nav > ul');

		function hideMobileNavigation() {
			mainNav.removeClass('mobile-navigation');
			teslaThemes.body.css('overflow', 'auto');
			teslaThemes.body.css('left', '0');
			teslaThemes.mobileNavigationVisible = false;
		};

		jQuery('.mobile-navigation-toggle').on('click', function () {
			if (!teslaThemes.mobileNavigationVisible) {
				teslaThemes.body.css('overflow-x', 'hidden');
				teslaThemes.body.animate({ left: '250px' }, 120);
				mainNav.addClass('mobile-navigation');
				teslaThemes.mobileNavigationVisible = true;
			} else {
				hideMobileNavigation();
			}
		});

		teslaThemes.body.on('click', function (e) {
			if (!jQuery(e.target).hasClass('mobile-navigation-toggle') && teslaThemes.mobileNavigationVisible) {
				hideMobileNavigation();
			}
		});

		jQuery(window).resize(function () {
			if (jQuery(window).width() > 991) {
				hideMobileNavigation();
			}
		});
	},

	footerToggle: function () {
		var expandContactFormToggle = jQuery('.footer .upper-part .container .expand-form'),
			contactFormWrapper = jQuery('.contact-form-wrapper-footer');

		expandContactFormToggle.on('click', function () {
			if (!teslaThemes.contactFormVisible) {
				contactFormWrapper.show('fast');
				teslaThemes.contactFormVisible = true;
				expandContactFormToggle.removeClass('fa-envelope-o');
				expandContactFormToggle.addClass('icon-minus');
			} else {
				contactFormWrapper.hide('fast');
				teslaThemes.contactFormVisible = false;
				expandContactFormToggle.removeClass('icon-minus');
				expandContactFormToggle.addClass('fa-envelope-o');
			}
		});
	},
	footerToggle2: function () {
		var expandContactFormToggle = jQuery('.footer .footer-toggle i'),
			contactFormWrapper = jQuery('.footer-wrapper');

		expandContactFormToggle.on('click', function () {
			if (!teslaThemes.contactFormVisible) {
				contactFormWrapper.show('fast');
				jQuery('body').animate({scrollTop:jQuery('div.footer-wrapper').offset().top}, 500);
				teslaThemes.contactFormVisible = true;
				expandContactFormToggle.removeClass('icon-plus closed');
				expandContactFormToggle.addClass('icon-minus opened');
			} else {
				contactFormWrapper.hide('fast');
				teslaThemes.contactFormVisible = false;
				expandContactFormToggle.removeClass('icon-minus opened');
				expandContactFormToggle.addClass('icon-plus closed');
			}
		});
	},

	percentageBar: function () {
		var skillsWrapper = jQuery('.skills'); 

		function startPercentageBar () {
			if (skillsWrapper.length) {
				if (skillsWrapper.visible(true) && !teslaThemes.percentageBarVisible) {
					teslaThemes.percentageBarVisible = true;
					jQuery('.bar-percentage[data-percentage]').each(function () {
						var progress = jQuery(this);
						var percentage = Math.ceil(jQuery(this).attr('data-percentage'));

						jQuery({ countNum: 0 }).animate({ countNum: percentage }, {
							duration: 2000,
							easing:'linear',
							step: function () {
							// What todo on every count
							var pct = '';
							if (percentage === 0) {
								pct = Math.floor(this.countNum) + '%';
							} else {
								pct = Math.floor(this.countNum+1) + '%';
							}
								progress.text(pct) && progress.siblings().css('width', pct);
							}
						});
					});
				}
			}
		};

		startPercentageBar();

		jQuery(document).scroll(function () {
			startPercentageBar();
		});
	},

	statisticsCounter: function () {
		var statisticsCounterWrapper = jQuery('.statistics-counter'); 

		function startStatisticsCounter () {
			if (statisticsCounterWrapper.length) {
				if (statisticsCounterWrapper.visible(true) && !teslaThemes.statisticsCounterVisible) {
					teslaThemes.statisticsCounterVisible = true;

					setTimeout(function(){
						jQuery('.statistics-counter .count').each(function(){
							var end = jQuery(this).data('count')

							jQuery(this).jQuerySimpleCounter({
								start:  1,
								end:    end,
								easing: 'swing', // jQuery easing effects
								duration: end * 66 < 3000 ? end * 66 : 3000 ,  // animation speed
								complete: '' // callback function
							});	
						})		
					}, 500);
				}
			}
		};

		startStatisticsCounter();

		jQuery(document).scroll(function () {
			startStatisticsCounter();
		});
	},

	gallerySlider: function () {
		if (jQuery('.gallery').length) {
			jQuery('#slider').flexslider({
				animation: "fade",
				controlNav: false,
				animationLoop: false,
				slideshow: false,
				sync: "#carousel"
			});

			jQuery('#carousel').flexslider({
				animation: "slide",
				controlNav: false,
				animationLoop: false,
				slideshow: false,
				itemWidth: 165,
				asNavFor: '#slider'
			});
		}
	},

	accordion: function () {
		jQuery('.panel-collapse').on('shown.bs.collapse', function () {
			jQuery(this).prev().find(".fa").removeClass("fa-plus").addClass("fa-minus");
		});

		jQuery('.panel-collapse').on('hidden.bs.collapse', function () {
			jQuery(this).prev().find(".fa").removeClass("fa-minus").addClass("fa-plus");
		});
	},

	newTeamMember: function () {
		var teamWrapper = jQuery('.team');

		function resizeNewMember () {
			if (teamWrapper.length) {
				jQuery('.team .become-member .wrapper').css('height', jQuery('.team .member .image').height());
			}
		};

		if (teamWrapper.length) {
			teamWrapper.imagesLoaded(function () {
				resizeNewMember();
			});
		}

		jQuery(window).resize(function () {
			resizeNewMember();
		});
	},

	placeholderInit: function () {
		jQuery('input[placeholder], textarea[placeholder]').placeholder();
	},

	mediaElementInit: function () {
		if (jQuery('audio').length) {
			jQuery('audio').mediaelementplayer({
				alwaysShowControls: true,
				features: ['playpause','volume','progress'],
				audioVolume: 'horizontal',
				audioHeight: 62
			});
		}
	},

	wowInit: function () {
		new WOW().init();
	},

	teslaSliderImageFix: function () {
		jQuery('.main-slider .slide .image img').css('height', '100%');
	},

	mainPortfolio: function () {
		jQuery(window).load(function () {
			var container = jQuery('.works-wrapper');
			if (container.length) {
				container.isotope({
					filter: '*',
					layoutMode: 'packery',
					packery: {
						gutter: 0
					},
					animationOptions: {
						duration: 600,
						easing: 'swing',
						queue: false
					}
				});
			 
				jQuery('.portfolioFilter a').click(function(){
					jQuery('.portfolioFilter .current').removeClass('current');
					jQuery(this).addClass('current');
			 
					var selector = jQuery(this).attr('data-filter');
					container.isotope({
						filter: selector,
						animationOptions: {
							duration: 750,
							easing: 'linear',
							queue: false
						}
					 });
					 return false;
				});
			}
		});
	},

	gridPortfolio: function () {
		jQuery(window).load(function () {
			var container = jQuery('.portfolioContainer');
			if (container.length) {
				container.isotope({
					filter: '*',
					animationOptions: {
						duration: 750,
						easing: 'linear',
						queue: false
					}
				});
			 
				jQuery('.portfolioFilter a').click(function(){
					jQuery('.portfolioFilter .current').removeClass('current');
					jQuery(this).addClass('current');
			 
					var selector = jQuery(this).attr('data-filter');
					container.isotope({
						filter: selector,
						animationOptions: {
							duration: 750,
							easing: 'linear',
							queue: false
						}
					 });
					 return false;
				}); 
			}
		});
	},

	mosaicPortfolio: function () {
		var container = jQuery('.portfolioContainer.mosaic');

		if (container.length) {
			container.isotope({
				filter: '*',
				layoutMode: 'packery',
				packery: {
					
				},
				animationOptions: {
					duration: 600,
					easing: 'swing',
					queue: false
				}
			});
		 
			jQuery('.portfolioFilter a').click(function(){
				jQuery('.portfolioFilter .current').removeClass('current');
				jQuery(this).addClass('current');
		 
				var selector = jQuery(this).attr('data-filter');
				container.isotope({
					filter: selector,
					animationOptions: {
						duration: 750,
						easing: 'linear',
						queue: false
					}
				 });
				 return false;
			});
		}
	},

	testimonialsScrollBox: function () {
		if (jQuery('.testimonials-block > ul').length) {
			jQuery('.testimonials-block > ul').mCustomScrollbar({ scrollInertia: 100 });
		}
	},

};

(function () {
	'use strict';
	jQuery(document).ready(function(){
		teslaThemes.init();

		setTimeout(function(){
			jQuery('body').addClass('domready');
		}, 300);
	});
}());

//Likes---------------------------------------------------------
(function ($){
	$('body').on('click','.like-button',function(event){
			event.preventDefault();
			
					var like_box = $(this);
					var post_id = like_box.data('post');
					var likes = parseInt(like_box.find('span').text(),10);
					likes++;
					
					$.ajax({
							url: ajaxurl,
							type: 'POST',
							data: {action: 'motive_like_post', id:post_id},
					})
					.done(function(result) {
							if(result === 'liked'){
									like_box.find('span').html(likes);
							}
							like_box.addClass('liked');
							console.log(result);
					})
					.fail(function() {
							console.log("error-ajax");
					});
					
			
			return false;
	});
	$(document).ready(function(){
		$('.content .container > p').each(function(index,element){
			if($.trim($(element).html()) === '' )
			$(element).remove();		
		});
		$('.content .container').each(function(index,element){
			if($.trim($(element).html()) === '' )
			$(element).remove();
		});
		$('p').each(function(index,element){
			if($.trim($(element).html()) === '' )
			$(element).remove();
		});
	});

/* --------------------------- */
//Social Platforms ---------------------------------------------------------
		$('.tt_share_platform li input').on('keyup',function() {
			if(!$(this).val())
				$(this).removeClass('social_active');
			else
				$(this).addClass('social_active');
		});
})(jQuery);
