jQuery(document).ready(function($) {
    "use strict";
    /**
     * Player Class
     */ 
    var i = "",
    r = new jPlayerPlaylist({
        jPlayer: "#jquery_jplayer_1",
        cssSelectorAncestor: "#jp_container_1"
    }, [], {
	swfPath: "../../dist/jplayer",
	supplied: "webmv, ogv, m4v",
	useStateClassSkin: true,
	autoBlur: false,
	smoothPlayBar: true,
	keyEnabled: true,
	});
	
	/**
     *1 Videospire Movies
     */ 
    $(document).on("click",".ms-video-play", function(e) {
        var videoid = $(this).attr('data-videoid');
        var videotype = $(this).attr('data-videotype');
        var formdata ='videoid='+videoid+'&videotype='+videotype;
    	formdata += '&action=videospire_movies_playlist';
    	$.ajax({
    	    type: 'post', 
    		url: frontadminajax.ajax_url,
    		data: formdata,
        	success: function(response){
        	  var res = JSON.parse(response);
        	  if( res[0].status == 'success' && res.singel_page_url != '' ){
                localStorage.setItem("jp_play_data", response);
                location.href=res[0].singel_page_url;
              }else{
                    if(res[0].status == 'false' && res.plan_page != ''){
                    toastr.error("Subscribe to a plan for watching premium content.");
                    window.location.href = res[0].plan_page;
    			}else{
						toastr.error(res[0].msg);
					}
                }
            }
        });   
    }); 
    
    /**
     *2 Videospire trailer
     */ 
    $(document).on("click",".ms-video-play-trailer", function(e) {
        var videoid = $(this).attr('data-videoid');
        var videotype = $(this).attr('data-videotype');
        var formdata ='videoid='+videoid+'&videotype='+videotype;
        
    	formdata += '&action=videospire_trailers_playlist';
    	$.ajax({
    	    type: 'post', 
    		url: frontadminajax.ajax_url,
    		data: formdata,
        	success: function(response){
        	  var res = JSON.parse(response);
        	  if( res[0].status == 'success' && res.singel_page_url != '' ){
        	      
                localStorage.setItem("jp_play_data", response);
                location.href=res[0].singel_page_url;
              }else{
                   	toastr.error(res[0].msg);
    			}
    		
            }
        });   
    }); 
    
    /**
     *3 Videospire Web Series
     */ 
    $(document).on("click",".ms-video-play-webserice", function(e) {
        var videoid = $(this).attr('data-videoid');
        var videotype = $(this).attr('data-videotype');
        var formdata ='videoid='+videoid+'&videotype='+videotype;
    	formdata += '&action=videospire_webserice_playlist';
    	$.ajax({
    	    type: 'post', 
    		url: frontadminajax.ajax_url,
    		data: formdata,
        	success: function(response){
        	  var res = JSON.parse(response);
        	  if( res[0].status == 'success' && res.singel_page_url != '' ){
                localStorage.setItem("jp_play_data", response);
                location.href=res[0].singel_page_url;
              }else{
                    if(res[0].status == 'false' && res.plan_page != ''){
                    toastr.error("Subscribe to a plan for watching premium content.");
                    window.location.href = res[0].plan_page;
    			}else{
						toastr.error(res[0].msg);
					}
                }
            }
        });   
    }); 
    
    /**
     *4 Videospire Tv Show
     */ 
    $(document).on("click",".ms-video-play-tvshow", function(e) {
        var videoid = $(this).attr('data-videoid');
        var videotype = $(this).attr('data-videotype');
        var formdata ='videoid='+videoid+'&videotype='+videotype;
    	formdata += '&action=videospire_tv_playlist';
    	$.ajax({
    	    type: 'post', 
    		url: frontadminajax.ajax_url,
    		data: formdata,
        	success: function(response){
        	  var res = JSON.parse(response);
              if( res[0].status == 'success' && res.singel_page_url != '' ){
                localStorage.setItem("jp_play_data", response);
                location.href=res[0].singel_page_url;
              }else{
                    if(res[0].status == 'false' && res.plan_page != ''){
                    toastr.error("Subscribe to a plan for watching premium content.");
                    window.location.href = res[0].plan_page;
    			}else{
						toastr.error(res[0].msg);
					}
                }
            }
        });   
    }); 
    
    /**
     *5 Window Play List Video Load
     */ 
     
    $(window).on('load',function(){
        
        var playdata = localStorage.getItem('jp_play_data');
        var userid = $( '#userid' ).attr('data-userid');
        var datavideo = JSON.parse(playdata);
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const page_type = urlParams.get('video')
        
        if(page_type == 'playwebserice' || page_type == 'playtvshow' || page_type == 'playtrailer' || page_type == 'playmovies'){
            if(datavideo){
                $.each(datavideo, function( key, value ) {
                    if(value.status == 'success'){
            		  r.add({  
            			  title:value.song_name,
            			  artist:value.artists,
            			  m4v: value.video_url,
            			  ogv:value.video_url,
            			  webmv: value.video_url,
            			  poster:value.image
            			});
            		}
                });
                r.play(0);
            } 
        }else{
        /**
         * Video Playlist in Add Data
         */ 
        var videoid = '';
        var videotype = '';
        var formdata ='videoid='+videoid+'&videotype='+videotype;
        var formdata ='videoid='+videoid;
    	formdata += '&action=videospire_videoplaylist_data';
        $.ajax({
    	    type: 'post', 
    		url: frontadminajax.ajax_url,
    		data: formdata,
        	success: function(response){
        	    var plist = JSON.parse(response);
        	    if(plist){ 
        	        $.each(plist, function( key, value ) {
            	        if(value.status == 'success'){
                          r.add({  
                        	  title:value.song_name,
                    		  artist:value.artists,
                    		  m4v: value.video_url,
                    		  ogv:value.video_url,
                    		  webmv: value.video_url,
                    		  poster:value.image
                            });
                        }
                    });
        	    }
        	}
        }); 
    }     
    });
    $('#jquery_jplayer_1').bind('contextmenu',function() { return false; });
});