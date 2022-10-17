/*--------------------- Copyright (c) 2022 -----------------------
[Master Javascript]
Project: videospire
Version: 1.0.0
Assigned to: Theme Forest
-------------------------------------------------------------------*/
(function($) {
    "use strict";
    /*-----------------------------------------------------
    	Function  Start
    -----------------------------------------------------*/
    var videospire = {
        initialised: false,
        version: 1.0,
        collapseScreenSize: 1199,
        init: function() {
            if (!this.initialised) {
                this.initialised = true;
            } else {
                return;
            }
            /*-----------------------------------------------------
            	Function Calling
			-----------------------------------------------------*/
            this.loader();
            this.searchBox();
            this.topButton();
            this.toggleMenu();
            this.relaterProduct();
            this.Product();
			this.formmodal();
			this.ms_latest_movies_slider();
			this.ms_top_rated_slider();
			this.wonder_fadius_slider();
			this.active_plan();
			this.fixClasses();
			this.nice_select();
			this.option_menu();
			this.bottom_top();
        },
        
        /*-----------------------------------------------------
            	Function Start
		-----------------------------------------------------*/
		// latest top movies slider	
		
		ms_latest_movies_slider: function () {
		   $(function () {  
		   $(window).on('load', function(){
		    var num = $("#postcount").attr("data-count");
			var swiper = new Swiper('.ms-latest-top-movies-slider .mySwiper', {
			    
				slidesPerView: 6,
				spaceBetween: 25,
				loop: true,
				speed: 1000,
				autoplay: {
					delay: 2500,
					disableOnInteraction: false,
				},
				navigation: {
					nextEl: '.ms-letest-top-navigation .swiper-button-next',
					prevEl: '.ms-letest-top-navigation .swiper-button-prev',
				},

				breakpoints: {
					1199: {
						slidesPerView: 6,
						spaceBetween: 25,
					},
					992: {
						slidesPerView: 4,
						spaceBetween: 30,
					},
					768: {
						slidesPerView: 2,
						spaceBetween: 30,
					},
					575: {
						slidesPerView: 1,
						spaceBetween: 15,
					},
					320: {
						slidesPerView: 1,
						spaceBetween: 15,
					}
					,
					0: {
						slidesPerView: 1,
						spaceBetween: 15,
					}
				}
			});
		  
		  });
		   });
		},
		
		// latest top movies slider	
				
		// latest top movies slider			
		ms_top_rated_slider: function () {
			var swiper = new Swiper('.ms-top-rated-wrapper .mySwiper', {
				slidesPerView: 3,
				spaceBetween: 30,
				loop: true,
				speed: 2000,
				autoplay: {
					delay: 2500,
					disableOnInteraction: false,
				},
				navigation: {
					nextEl: '.ms-letest-top-navigation .swiper-button-next',
					prevEl: '.ms-letest-top-navigation .swiper-button-prev',
				},
				pagination: {
					el: '.ms-top-rated-wrapper .swiper-pagination',
					clickable: true,
				},
				breakpoints: {
					1199: {
						slidesPerView: 3,
						spaceBetween: 30,
					},
					992: {
						slidesPerView: 2,
						spaceBetween: 30,
					},
					768: {
						slidesPerView: 2,
						spaceBetween: 30,
					},
					575: {
						slidesPerView: 1,
						spaceBetween: 15,
					},
					320: {
						slidesPerView: 1,
						spaceBetween: 15,
					}
					,
					0: {
						slidesPerView: 1,
						spaceBetween: 15,
					}
				}
			});
		},
		/*-----------------------------------------------------
            	Fix Classes JS
		-----------------------------------------------------*/
        fixClasses: function() {
            $('.wc-forward, .wp-block-button__link, .woocommerce div.product form.cart .button, .woocommerce-Button.button, .yith-wcaf.yith-wcaf-settings.woocommerce input[type="submit"], .yith-wcaf.yith-wcaf-link-generator input[type="submit"], a.more-link').addClass('ms-btn');
            $('.wp-block-search__button, .search-form .search-submit, .form-submit .submit, form.post-password-form input[type="submit"], .widget.woocommerce.widget_price_filter button.button, .woocommerce-product-search button').addClass('ms-btn');
            $( ".blog-container-p" ).parent().addClass("p-0");

            
        },
        /*-----------------------------------------------------
                        Nice Select
        -----------------------------------------------------*/
        
		nice_select: function () {

			 $(document).ready(function() {
              $('select').niceSelect();      
            });    
			
		},
	
        /*-----------------------------------------------------
                        Option Menu
        -----------------------------------------------------*/
    	option_menu: function(){
    		$('.ms-more-icon').on('click',function(){
    			$('.more-option').toggleClass('open-option');
    		})
    	},
    	
    	/*-----------------------------------------------------
                        Bottom To Top
        -----------------------------------------------------*/
		bottom_top: function () {
			if ($('#button').length > 0) {

				var btn = $('#button');

				$(window).scroll(function () {
					if ($(window).scrollTop() > 300) {
						btn.addClass('show');
					} else {
						btn.removeClass('show');
					}
				});

				btn.on('click', function (e) {
					e.preventDefault();
					$('html, body').animate({ scrollTop: 0 }, '300');
				});
			}
		},


		// wonder fadius slider			
		wonder_fadius_slider: function () {
			var swiper = new Swiper('.ms-overview-wrapper .mySwiper', {
				loop: true,
				speed: 1500,
				cubeEffect: {
					slideShadows: false,
				},
				autoplay: {
				 	delay: 3000,
				 	disableOnInteraction: false,
				},
				navigation: {
					nextEl: '.ms-overview-slider-btn .swiper-button-next',
					prevEl: '.ms-overview-slider-btn .swiper-button-prev',
				},
				
			});
		},
		
		// form modals
		formmodal: function () {
		    $('#register').on( "click", function() {
                $('#loginModal').modal('hide');
                $('#registerModal').modal('show');  
        });
    	    $('#login').on( "click", function() {
               $('#registerModal').modal('hide');
               $('#loginModal').modal('show');
             
            });	
		},
		/*-----------------------------------------------------
            	Pricing Plan
		-----------------------------------------------------*/
		// active plan
		active_plan: function () {
			$('.ms-price-right-box').on('click', function () {
				$('.active2').removeClass('active2');
				$(this).addClass('active2').find('input').prop('checked', true)
			});
			$('.ms-price-right-box').on('click', function () {
				$('.active').removeClass('active');
				$(this).addClass('active').find('input').prop('checked', true)
			});
		},
		
        /*-----------------------------------------------------
            	Fix Loader JS
		-----------------------------------------------------*/
        loader: function() {
            jQuery(window).on('load', function() {
                $(".preloader").fadeOut();
                $(".preloader-inner").delay(500).fadeOut("slow");
            });
        },

        /*-----------------------------------------------------
        	Fix GoToTopButton
        -----------------------------------------------------*/
        topButton: function() {
            var scrollTop = $(".scroll");
            $(window).on('scroll', function() {
                if ($(this).scrollTop() < 500) {
                    scrollTop.removeClass("active");
                } else {
                    scrollTop.addClass("active");
                }
            });
            $('.scroll').click(function() {
                $("html, body").animate({
                    scrollTop: 0
                }, 100);
                return false;
            });
        },

        /*-----------------------------------------------------
            	Fix Mobille Menu JS
		-----------------------------------------------------*/
        toggleMenu: function() {
            /* Header Style One */
           $(".ms-toggle-btn").on('click', function() {
                $(".ms-header-menu, .ms-toggle-btn").toggleClass('open-menu');
            });
            $("body").on('click', function() {
                $(".ms-header-menu, .ms-toggle-btn").removeClass('open-menu');
            });

            $(".ms-header-menu, .ms-toggle-btn, .menu-item-has-children > a").on('click', function(e) {
                e.stopPropagation();
            });

            if ($(window).width() <= videospire.collapseScreenSize) {

                $(".ms-header-menu ul > li:has(ul)").addClass('has_sub_menu');
                $(".ms-header-menu > div > ul > li:has(ul) > a").on('click', function(e) {
                    e.preventDefault();

                    $('.ms-header-menu > div > ul > li:has(ul) > a').not($(this)).closest('li').find('.sub-menu').slideUp();
                    $('.ms-header-menu > div > ul > li:has(ul) > a').not($(this)).closest('li').removeClass('open');

                    $(this).parent('.ms-header-menu > div > ul li').children('ul.sub-menu').slideToggle();
                    $(this).parent('.ms-header-menu > div > ul li').toggleClass("open");
                });

                $(".ms-header-menu ul.sub-menu > li:has(ul) > a").on('click', function(e) {
                    e.preventDefault();

                    $('.ms-header-menu ul.sub-menu > li:has(ul) > a').not($(this)).closest('li').find('.sub-menu').slideUp();
                    $('.ms-header-menu ul.sub-menu > li:has(ul) > a').not($(this)).closest('li').removeClass('open');

                    $(this).parent('.ms-header-menu ul.sub-menu li').children('ul.sub-menu').slideToggle();
                    $(this).parent('.ms-header-menu ul.sub-menu li').toggleClass("open");
                });
                
               /* $(document).on('click', function() {
                $('.ms-profile-dropdown').removeClass("open-dropdown");
                });
                */
            }
        },
        /*-----------------------------------------------------
        	Fix Search Bar
        -----------------------------------------------------*/
        searchBox: function() {
            $('.ms-search-btn').on("click", function() {
                $('.ms-search-form').addClass('show-search');
            });
            $('.close-search').on("click", function() {
                $('.ms-search-form').removeClass('show-search');
            });
            $('.ms-search-form').on("click", function() {
                $('.ms-search-form').removeClass('show-search');
            });
            $(".ms-search-form-inner").on('click', function(e) {
                e.stopPropagation();
            });

        },
        /*-----------------------------------------------------
			Fix Related Product Slider
		----------------------------------------------------*/
        relaterProduct: function() {
            var productCount = $('.ms-related-product-swiper').attr('data-product');
            if ($('.ms-related-product-swiper').length > 0) {
                var swiper = new Swiper('.ms-related-product-swiper', {
                    slidesPerView: 4,
                    ween: 30,
                    autoplay: true,
                    speed: 1500,
                    pagination: {
                        el: '.ms-related-product-swiper .swiper-pagination',
                        clickable: true,
                    },
                    loop: false,
                    breakpoints: {
                        0: {
                            slidesPerView: 1,
                            spaceBetween: 30
                        },
                        480: {
                            slidesPerView: 1,
                            spaceBetween: 30
                        },
                        767: {
                            slidesPerView: 2,
                            spaceBetween: 30
                        },
                        991: {
                            slidesPerView: 2,
                            spaceBetween: 30
                        },
                        1200: {
                            slidesPerView: productCount,
                            spaceBetween: 30
                        },
                        navigation: {
                            nextEl: '.ms-related-product-swiper .ms-nav-next',
                            prevEl: '.ms-related-product-swiper .ms-nav-prev',
                        },
                    }

                });

            }

            $(".is-style-outline").prev().addClass("is-style-rounded");
            $(".al_product_filters select,.woocommerce div.product form.cart .variations select").addClass("select-type");
        },

        Product: function() {
            if ($('.product-slider').length > 0) {
                var swiper = new Swiper('.product-slider', {
                    slidesPerView: 4,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: true,
                    speed: 1500,
                    breakpoints: {
                        0: {
                            slidesPerView: 1,
                        },
                        480: {
                            slidesPerView: 1,
                        },
                        767: {
                            slidesPerView: 2,
                        },
                        991: {
                            slidesPerView: 2,
                        },
                        1200: {
                            slidesPerView: 4,
                        }
                    },
                    navigation: {
                        nextEl: '.ms-product-slider-wrapper .ms-nav-next',
                        prevEl: '.ms-product-slider-wrapper .ms-nav-prev',
                    },
                    pagination: {
                        el: '.ms-product-slider-wrapper .swiper-pagination',
                        clickable: true,
                    },
                });
            }
        },
    };
    
    videospire.init();

   
     $('.ms-admin').on('click', function() {
        $('.ms-profile-dropdown').toggleClass("open-dropdown");
     });
     
    $(document).on('click', function() {
        $('.ms-profile-dropdown').removeClass("open-dropdown");
    });
    $('.ms-admin').on('click', function(event) {
        event.stopPropagation();
    });
  
    /**
     * color change function
    */
    $('.toggle-box').change(function(){
    	var checkBox = document.getElementById("checbox");
    	if (checkBox.checked == true) {
    		var e = $("input[name=videospire_template_url]").val();
    		var n = e + "/assets/css/videospire-custom-style.css";
    		jQuery("#videospire-theme-change-css").attr("href", n)
    		localStorage.setItem("mode", 'true');
    		var checkBox_loc = localStorage.getItem('mode'); 
    	} else {
    		var e = $("input[name=videospire_template_url]").val();
    		var n = e + "/assets/css/videospire-custom-light-style.css";
    		jQuery("#videospire-theme-change-css").attr("href", n)
    		localStorage.setItem("mode", 'false');
    		var checkBox_loc = localStorage.getItem('mode');
    	}
    });
    
    
    $('.toggle-box-lightmode').change(function(){
    	var checkBox = document.getElementById("checbox");
    	if (checkBox.checked == true) {
    		var e = $("input[name=videospire_template_url]").val();
    		var n = e + "/assets/css/videospire-custom-light-style.css";
    		jQuery("#videospire-theme-change-css").attr("href", n)
    		localStorage.setItem("mode", 'false');
    		var checkBox_loc = localStorage.getItem('mode');
    	} else {
    		var e = $("input[name=videospire_template_url]").val();
    		var n = e + "/assets/css/videospire-custom-style.css";
    		jQuery("#videospire-theme-change-css").attr("href", n)
    		localStorage.setItem("mode", 'true');
    		var checkBox_loc = localStorage.getItem('mode'); 
    	}
    });
    /**
    *local storage data save
    **/
    var checkBox_loc = localStorage.getItem('mode'); 
    if(checkBox_loc){
    	$(window).on('load', function(){
    		var e = customscriptjs.scriptjs_url;
    		var adminid = $('#loginadmin').attr('data-adminid');
    		var lightmode = $("body").hasClass("videospire-dark");
    		var checkBox_loc = localStorage.getItem('mode'); 
    		if(adminid == '1'){
    		   if(lightmode == true){
    			   if(checkBox_loc == 'true'){
    					var n = e + "/assets/css/videospire-custom-style.css";
    					jQuery("#videospire-theme-change-css").attr("href", n)
    					$('#checbox').attr("checked");
    			   } else {
    					var n = e + "/assets/css/videospire-custom-light-style.css";
    					jQuery("#videospire-theme-change-css").attr("href", n)
    					$('#checbox').removeAttr( "checked" );
    			  }
    		   } else {
    			   if(checkBox_loc == 'true'){
    					var n = e + "/assets/css/videospire-custom-style.css";
    					jQuery("#videospire-theme-change-css").attr("href", n)
    					$('#checbox').removeAttr( "checked" ) 
    			   } else {
    					var n = e + "/assets/css/videospire-custom-light-style.css";
    					jQuery("#videospire-theme-change-css").attr("href", n)
    					$('#checbox').attr("checked");
    			   }
    		   }  
    		} 
    	});
     }
     /**
     * color box2 change function
    */
    $('.ms-switch-box-darkmode').change(function(){
    	var checkBox = $('input:checkbox[name=checkme]').is(':checked');
       if (checkBox == true) {
    		var e = $("input[name=videospire_template_url]").val();
    		var n = e + "/assets/css/videospire-custom-style.css";
    		jQuery("#videospire-theme-change-css").attr("href", n)
    		localStorage.setItem("colormode", 'true');
    		var checkBox_loc = localStorage.getItem('colormode'); 
    	} else {
    		var e = $("input[name=videospire_template_url]").val();
    		var n = e + "/assets/css/videospire-custom-light-style.css";
    		jQuery("#videospire-theme-change-css").attr("href", n)
    		localStorage.setItem("colormode", 'false');
    		var checkBox_loc = localStorage.getItem('colormode');
    	}
    	
    });	
    
     $('.ms-switch-box-lightmode').change(function(){
        var checkBox = $('input:checkbox[name=checkme]').is(':checked');
        if (checkBox == true) {
    		var e = $("input[name=videospire_template_url]").val();
    		var n = e + "/assets/css/videospire-custom-light-style.css";
    		jQuery("#videospire-theme-change-css").attr("href", n)
    		localStorage.setItem("colormode", 'false');
    		var checkBox_loc = localStorage.getItem('colormode');
    	} else {
    		var e = $("input[name=videospire_template_url]").val();
    		var n = e + "/assets/css/videospire-custom-style.css";
    		jQuery("#videospire-theme-change-css").attr("href", n)
    		localStorage.setItem("colormode", 'true');
    		var checkBox_loc = localStorage.getItem('colormode'); 
    	}
    });
    
     
    /**
     * color box2 local storage color save
    */
     var checkBox_loc = localStorage.getItem('colormode'); 
    if(checkBox_loc){
    	$(window).on('load', function(){
    		var e = customscriptjs.scriptjs_url;
    		//var adminid = $('#loginadmin').attr('data-adminid');
    		var lightmode = $("body").hasClass("videospire-dark");
    		var checkBox_loc = localStorage.getItem('colormode'); 
    	//	if(adminid == '1'){
    		   if(lightmode == true){
    			   if(checkBox_loc == 'true'){
    					var n = e + "/assets/css/videospire-custom-style.css";
    					jQuery("#videospire-theme-change-css").attr("href", n)
    					$('#checbox').attr("checked");
    			   } else {
    					var n = e + "/assets/css/videospire-custom-light-style.css";
    					jQuery("#videospire-theme-change-css").attr("href", n)
    					$('#checbox').removeAttr( "checked" );
    			  }
    		   } else {
    			   if(checkBox_loc == 'true'){
    					var n = e + "/assets/css/videospire-custom-style.css";
    					jQuery("#videospire-theme-change-css").attr("href", n)
    					$('#checbox').removeAttr( "checked" ) 
    			   } else {
    					var n = e + "/assets/css/videospire-custom-light-style.css";
    					jQuery("#videospire-theme-change-css").attr("href", n)
    					$('#checbox').attr("checked");
    			   }
    		   }  
    		//} 
    	});
     }
     
     
    /**
     * Cart Quantity Count
     */
    if (!String.prototype.getDecimals) {
        String.prototype.getDecimals = function() {
            var num = this,
                match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
            if (!match) {
                return 0;
            }
            return Math.max(0, (match[1] ? match[1].length : 0) - (match[2] ? +match[2] : 0));
        }
    }

    // Quantity "plus" and "minus" buttons
    $(document.body).on('click', '.plus, .minus', function() {
        var $qty = $(this).closest('.quantity').find('.qty'),
            currentVal = parseFloat($qty.val()),
            max = parseFloat($qty.attr('max')),
            min = parseFloat($qty.attr('min')),
            step = $qty.attr('step');

        // Format values
        if (!currentVal || currentVal === '' || currentVal === 'NaN') currentVal = 0;
        if (max === '' || max === 'NaN') max = '';
        if (min === '' || min === 'NaN') min = 0;
        if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') step = 1;

        // Change the value
        if ($(this).is('.plus')) {
            if (max && (currentVal >= max)) {
                $qty.val(max);
            } else {
                $qty.val((currentVal + parseFloat(step)).toFixed(step.getDecimals()));
            }
        } else {
            if (min && (currentVal <= min)) {
                $qty.val(min);
            } else if (currentVal > 0) {
                $qty.val((currentVal - parseFloat(step)).toFixed(step.getDecimals()));
            }
        }

        // Trigger change event
        $qty.trigger('change');
    });

    $('.add_to_cart').on('click', function() {
        var product_id = $(this).attr('data-productid');
        var formdata = 'product_id=' + product_id;
        formdata += '&action=miraculousn_woocommerce_ajax_add_to_cart';
        $.ajax({
            type: 'post',
            url: frontadminajax.ajax_url,
            data: formdata,
            success: function(response) {

                toastr.success('Product has been added to your cart');
                location.reload();
            }

        });
        $('.add_to_wishlist').on('click', function() {
            toastr.success('Product has been added to your wishlist');
        });

    });  
	 
})(jQuery);
        
        