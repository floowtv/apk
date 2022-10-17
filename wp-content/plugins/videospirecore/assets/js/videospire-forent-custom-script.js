(function($) {
	"use strict";
    /**
     * Register form 
     */ 
    	$("#form_register").on('submit', function(e){
		e.preventDefault();
		
        const validateEmail = (useremail) => {
            return useremail.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );
        };
		var username = $("#username").val();
		var useremail = $("#useremail").val();
		var password = $("#password").val();
		var confirmpass = $("#confirmpass").val();
		var user_gender = $("input[name='gender']:checked").val();
		var emptyfield = false;
		var emailvalid = false;
		var passvalid = false;
		toastr.clear();
        if(username == '' && useremail=='' && password=='' && confirmpass== ''){
         toastr.error('All fields are required.'); 
        }else{
		if( username == '' ) {
			emptyfield = true;
			toastr.error('User name are required.');
		}
		
		if(useremail == '') {
			emptyfield = true;
			toastr.error('Email are required.');
		}
		if(password == '') {
			emptyfield = true;
			toastr.error('Password are required.');
		}
		if(confirmpass == '') {
			emptyfield = true;
			toastr.error('Confirm password are required.');
		}

		  if(emptyfield == false) {
    			if ( validateEmail(useremail) ) {
    				emailvalid = true;
    			}else {
    				emailvalid = false;
    				toastr.error('Email is not valid.');
    	        }
    
    	        if(password == confirmpass){
    	        	passvalid = true;
    	        }else{
    	        	passvalid = false;
    	        	toastr.error('password does not match.');
    	        }

    		}else{
    			$(".form-msg").addClass('error-row');
    			toastr.error('All fields are required.');
    		}
        }

		if(passvalid == true && emailvalid == true) {
			var formdata ='username='+username+'&useremail='+useremail+'&password='+password+'&confirmpass='+confirmpass+'&user_gender='+user_gender;
				formdata += '&action=videospire_user_register_form';
				$("#erroremail").html('');
				$("#errorcpass").html('');
				$("#register_btn").hide();
				$(".hst_loader").show();
				$(".form-msg").html('');
				
				$.ajax({
					type: 'post', 
					url: frontadminajax.ajax_url,
					data: formdata,
				    
					success: function(response){
					   
						var result = JSON.parse(response);
						if( result.status == 'true' ) {
						  
							$(".form-msg").addClass('success-row');
							toastr.success(result.msg);
							$("#form_register")[0].reset();
							$("#registerModal").modal("hide");
							$("#loginModal").modal("show");
						}else{
							$.each(result, function(i,n){
							    if(n != 'false'){
							        toastr.error(n);   
							    }
							});
						}
						
						$(".hst_loader").hide();
						$("#register_btn").show();
					

					}
				});
		}

	});
    
   /**
     * Login Form JS
     */ 
    $("#form_login").on('submit', function(e){
	e.preventDefault();
	
	var username = $("#lusername").val();
	var password = $("#lpassword").val();
	var rem = $('#rem_check').val();
    toastr.clear();
		if(username == '' && password == ''){
			$(".form-lmsg").addClass('error-row');
			toastr.error('All fields are required.');
		}else{
			var formdata ='username='+username+'&password='+password+'&rem_check='+rem;
			formdata += '&action=videospire_user_login_form';
			$("#login_btn").hide();
			$(".hst_loader").show();
			$(".form-lmsg").html('');
			$.ajax({
				type: 'post',
				url: frontadminajax.ajax_url,
				data: formdata,
				success: function(response){
					var result = JSON.parse(response);
					if( result.status == 'false' ) {
						$(".form-lmsg").addClass('error-row');
						toastr.error(result.msg);
					}else{
					    toastr.success(result.msg);
					    location.reload();
					}
					
					$(".hst_loader").hide();
					$("#login_btn").show();

				}
			});
		}
	});
	
	/**
     * Video download function
    */
   
    $(".ms-download").on('click', function(){
       var moviesid = $(this).attr('data-movies');
       var trailerid = $(this).attr('data-trailer');
      
       if(trailerid == null){
            var trailerid = null;
        }
        var formdata ='movies_id='+moviesid+'&trailer_id='+trailerid;
        formdata += '&action=videospire_video_download'; 
        if(moviesid){
        $.ajax({
            type: 'post',
			url: frontadminajax.ajax_url,
			data: formdata,
			success: function(response){
			  var result = JSON.parse(response);
    		    if( result[0].status == 'success' && result.movieurl != '' ) {
    		    var link = document.createElement("a");
						    link.download = result[0].title+'.mp4';
						    link.href =  result[0].movieurl;
						    link.click();
						    toastr.success(result[0].msg);  
    		    }else{
    		  
		            if(result[0].status == 'false' && result.plan_page != ''){
					    toastr.error("Premium videos you will need to purchase plan to download.");
					    window.location.href = result[0].plan_page;
					}else{
						toastr.error(result[0].msg);
					}
    		    }
			}
			
        });  
        }
    });
    
	
    
   /**
     * wishlist Ajax 
     */ 
    
    $('.add_to_wishlist ').on('click', function() {

        jQuery.ajax({
            type: "post",
            url: frontadminajax.ajax_url,
            data: { 'action': "add_to_wishlist" },
            success: function(response) {

                toastr.success('Product has been added to your wishlist');
            }
        });
    });

    /**
     * Newsletter Ajax Script
     */
    $('#videospire_newsletters').on('click', function() {

        var apikey = $(this).attr('data-apikey');
        var listid = $(this).attr('data-listid');
        var customer_email = $('#astro_newsletter_email').val();

        if (!validateEmail(customer_email)) {

            $(".ss_messages").html("<span style='color:red;'>Please make sure you enter a valid email address.</span>");

        } else {

            jQuery.ajax({
                type: "post",
                url: frontadminajax.ajax_url,
                data: { 'action': "videospire_send_newsletter", apikey: apikey, listid: listid, customer_email: customer_email },
                success: function(response) {

                    if (response == "200") {
                        $(".ss_messages").html('<span style="color:green;">You have successfully subscribed to our mailing list.</span>');
                    } else if (response == "204") {
                        $(".ss_messages").html('<span style="color:red;">Your Email Alreday Subscribed List</span>');
                    } else {
                        $(".ss_messages").html('<span style="color:red;">Something is wrong</span>');
                    }
                }
            });
        }

    });

    /**
     * email checker
     */
    function validateEmail(uemail) {
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (filter.test(uemail)) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Social URL Copy
     */
     
    var $temp = $("<input>");
    $('.ms-copy').on('click', function() {
     var $url = $(this).attr('data-shareuri');
      $(".modal-footer").append($temp);
      $temp.val($url).select();
      document.execCommand("copy");
      $temp.remove();
      $("#copydata").text("Copied!");
    })
    
    
    $('.toggle').change(function(){
    var checkBox = document.getElementById("checbox");
    if (checkBox.checked == true) {
        
    } else if (checkBox.checked == false) {
       alert("UNcheck Box");
    }
     });
     
     $('#staticModal').click(function() { 
         $('staticModal1').modal('show');
         
     }); 
	 

	 /**
	 *Pricing plan js start *
	 */
	 $(".ms_plan").on('click', function(){
	     var planid = $(".active").attr("planid");
	     var cuser = $(".active").attr("cuser");
	     var planstatus = $(".active").attr("planstatus");
	     if( cuser != null ){
	         if( cuser != '0' ){
        	     if(planid != null){
        	        if(planstatus == 1){
            	        var formdata ='action=videospire_free_plan_purchase';
        			    formdata += '&planid='+planid+'&cuser='+cuser;
        			    
            	        $.ajax({
            	            type: 'post',
            	            url: frontadminajax.ajax_url,
                            data: formdata,
            	            success: function(responce){
            	                if(responce != null){
            	                    toastr.success('Plan has been purchased successfully.');
            	                    location.reload();
            	                }
            	            }
            	        });
        	        }
        	     }
	         }
	         else{
    	         toastr.error('Please login.');
    	     }
	     }
	     else{
	         toastr.error('Please select plan duration.');
	     }
	 });
	 
	 $(".ms-price-right-box").on('click', function(){
	     var planid = $(this).attr("planid");
	     var planprice = $(this).attr("planprice");
	     var cuser = $(this).attr("cuser");
	     var planstatus = $(this).attr("planstatus");
	     if( cuser != '0' ){
    	     if(planstatus == 1){
    	         $("#stripe_button").css("display", "none");
    	         $("#mobile_stripe_button").css("display", "none");
    	         $("#popstripe_button").css("display", "none");
    	         $("#popmobile_stripe_button").css("display", "none");
    	         $(".ms_plan").css("display", "block");
    	     }else{
    	         $(".stripe-button").attr('data-amount', planprice);
    	         $(".item_id").attr('value', planid);
    	         $("#stripe_button").css("display", "block");  
    	         $("#mobile_stripe_button").css("display", "block");
    	         $("#popstripe_button").css("display", "block");  
    	         $("#popmobile_stripe_button").css("display", "block");
    	         $(".ms_plan").css("display", "none");
    	     }
	    }
	 });
	 
    /**
	 *Pricing plan js end *
	 */	
	 
	 /**
	 *Playlist js end *
	 */	
	 $('document').ready(function() {
    	 $(".ms-add-to-playlist").on('click', function(){
    	     var datamovies = $(this).attr("data-movies");
    	     var datatrailer = $(this).attr("data-trailer");
    	     var dataseries = $(this).attr("data-series");
    	     var datatvhow = $(this).attr("data-tvhow");
    	     if(datamovies != null){
    	        $('#add_in_playlist_modal select[name="playlistname"]').attr("data-id", datamovies);
    	         $("#add_in_playlist_modal").modal("show");
    	     }
    	     if(datatrailer != null){
    	        $('#add_in_playlist_modal select[name="playlistname"]').attr("data-id", datatrailer);
    	         $("#add_in_playlist_modal").modal("show");
    	     }
    	     if(dataseries != null){
    	        $('#add_in_playlist_modal select[name="playlistname"]').attr("data-id", dataseries);
    	         $("#add_in_playlist_modal").modal("show");
    	     }
    	     if(datatvhow != null){
    	        $('#add_in_playlist_modal select[name="playlistname"]').attr("data-id", datatvhow);
    	         $("#add_in_playlist_modal").modal("show");
    	     }
    	 }); 
	 }); 
	 $(".ms-create-playlist").on('click', function(){
    	$("#add_in_playlist_modal").modal("hide");
    	$("#create_playlist_modal").modal("show");
    });
    $(".create-new-playlist").on('click', function(){
		var name = $("#playlist_name").val();
		if(name == ''){
			toastr.error("Please enter name of playlist.");
		}else{
			var formdata ='playlistname='+name;
				formdata += '&action=videospire_create_new_user_playlist';
			$(".create-new-playlist").hide();
			$(".hst_loader").show();
			$.ajax({
				type: 'post',
				url: frontadminajax.ajax_url,
				data: formdata,
				success: function(response){
					var result = JSON.parse(response);
					if( result.status == 'success' ) {
						location.reload();
						toastr.success(result.msg);
					}else{
						toastr.error(result.msg);
						$(".hst_loader").hide();
						$(".create-new-playlist").show();
					}
				}
			});
		}
		
	});
	$(".ms-add-in-playlist").on('click', function(){
		var key = $('#add_in_playlist_modal select[name="playlistname"]').val();
		var videoid = $('#add_in_playlist_modal select[name="playlistname"]').attr('data-id');

		var formdata ='key='+key+'&videoid='+videoid;
			formdata += '&action=videospire_add_music_in_user_playlist';

		$(".ms-add-in-playlist").hide();
        $(".hst_loader").show();
		$.ajax({
			type: 'post',
			url: frontadminajax.ajax_url,
			data: formdata,
			success: function(response){
				var result = JSON.parse(response);
				if( result.status == 'success' ) {
					$("#add_in_playlist_modal").modal("hide");
					toastr.success(result.msg);
				}else{
					toastr.error(result.msg);
				}
				$(".hst_loader").hide();
				$(".ms-add-in-playlist").show();
			}
		});
		
	});
	
	$(".ms-remove-user-playlist").on('click', function(){
		var playlist = $(this).attr('data-list');
		var formdata ='playlist='+playlist;
			formdata += '&action=videospire_remove_user_playlist';
        
        $(".ms_ajax_loader").show();
		$.ajax({
			type: 'post',
			url: frontadminajax.ajax_url,
			data: formdata,
			success: function(response){
				var result = JSON.parse(response);
				$(".ms_ajax_loader").hide();
				if( result.status == 'success' ) {
				    location.reload();
					toastr.success(result.msg);
				}else{
					toastr.error(result.msg);
				}
			}
		});
	});
	
	 /**
	 * Social share
	 */	
	$(".ms-share").on('click', function(){
	    var share_uri = $(this).attr('data-shareuri');
	    var share_title = $(this).attr('data-sharename');
	    
        if (window.innerWidth <= 640) {
    	    $(".ms_share_facebook").attr('href', 'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(share_uri));
    	    $(".ms_share_linkedin").attr('href', 'https://www.linkedin.com/cws/share?url='+encodeURIComponent(share_uri));
    	    $(".ms_share_twitter").attr('href', 'https://twitter.com/intent/tweet?text='+share_title+'&amp;url='+encodeURIComponent(share_uri)+'&amp;via=Videospire');
    	    $(".ms_share_whatsapp").attr('href', 'https://api.whatsapp.com/send?text='+encodeURIComponent(share_uri));
        }
        else {
            var width = 200;
            var height = 150;
            $(".ms_share_facebook").attr('onclick', "window.open('https://www.facebook.com/sharer/sharer.php?u="+encodeURIComponent(share_uri)+"', 'Share', width='" + width + "', height='" + height + "' )");
            $(".ms_share_linkedin").attr('onclick', "window.open('https://www.linkedin.com/cws/share?url="+encodeURIComponent(share_uri)+"', 'Share', width='" + width + "', height='" + height + "' )");
            $(".ms_share_twitter").attr('onclick', "window.open('https://twitter.com/intent/tweet?text="+share_title+"&url="+encodeURIComponent(share_uri)+"&via=Videospire' , 'Share', width='" + width + "', height='" + height + "' )");
            $(".ms_share_whatsapp").attr('onclick', "window.open('https://api.whatsapp.com/send?text="+encodeURIComponent(share_uri)+"', 'Share', width='" + width + "', height='" + height + "' )");
        }
        
        $('#copydata').attr('data-shareuri',share_uri);
        
	    
	    $("#ms_share_music_modal_id").modal("show");
	});
	
	/**
     * Movies Load More
     */
     
    var movies_loadmore = 0; 
    $('.movies_load_more').on('click',function(e) {
        e.preventDefault();
        $('.ajax-loader').show();
        var movies_cat = $('.ms_movie_cate').attr('data-cate');
        var movies_posttype = $('.ms_movie_cate').attr('data-posttype');
        var movies_load = $(this).attr('data-loadmore');
        var movies_showp = $(this).attr('data-show');
        var load_more = parseFloat(movies_load)+parseFloat(movies_showp);
        load_more +=movies_loadmore;
        movies_loadmore++;
        jQuery.ajax({ 
    	    type : "post",
            url : frontadminajax.ajax_url,
            data : {'action': "videospire_movies_load_more",movies_cat:movies_cat, movies_posttype:movies_posttype, load_more:load_more, movies_load: movies_load }, 
    		success: function(response) {
    		       $('#ms_movie_load').html(response);  
    		       $('.ajax-loader').hide();
    			}
        }); 
    });
    $('.ms-upgradeplan').on('click',function(e){
        $("#ms-pricing-hide").css("display", "none");
    });
}) (jQuery);