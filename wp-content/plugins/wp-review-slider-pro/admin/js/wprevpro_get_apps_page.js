
		
(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 * $( document ).ready(function() same as
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work. 
	 */
	//document ready
	$(function(){
		
		var getrevformtempid='';

		//help button clicked
		$( "#wprevpro_helpicon_posts" ).on("click",function() {
		  openpopup(adminjs_script_vars.popuptitle, '<p>'+adminjs_script_vars.popupmsg+' </p>', "");
		});
		
		
		//launch pop-up windows code--------
		function openpopup(title, body, body2){
			//set text
			jQuery( "#popup_titletext").html(title);
			//jQuery( "#popup_bobytext1").html(body);
			//jQuery( "#popup_bobytext2").html(body2);
			
			var popup = jQuery('#popup_review_list').popup({
				width: 400,
				offsetX: -100,
				offsetY: 0,
			});
			
			popup.open();
			//set height
			var bodyheight = Number(jQuery( ".popup-content").height()) + 10;
			jQuery( "#popup_review_list").height(bodyheight);

		}
		
		//===========for pop-up==========
		//retrieve reviews button clicked
		var totaltoinsert = 0;
		$( ".retreviewsbtn" ).on("click",function(event) {
			event.preventDefault();
			//check to see if the text area wprevpro_cookie is on page, and has value.
			if($('#wprevpro_cookie').length){
				if(!$('#wprevpro_cookie').val().length){
					alert(adminjs_script_vars.msg1);
					return;
				}
			}
			
			//get id and badge type
			getrevformtempid = $( this ).parent().attr( "templateid" );
			totaltoinsert = $( this ).closest('.locationrow').attr( "data-blocks" );
			var url = "#TB_inline?inlineId=retreivewspopupdiv";
			tb_show(adminjs_script_vars.Downloading_Reviews, url);
			$( "#TB_window" ).css({ "height":"auto !important" });
			$( "#TB_ajaxContent" ).css({ "max-height":"600px" });
			$( "#TB_ajaxContent" ).css({ "width":"auto" });
			$( "#TB_ajaxContent" ).css({ "height":"300px" });
			$( "#getrevsbtnpopup" ).attr("tabindex",-1).focus();
			//call ajax to scrape the reviews.
			$( ".ajaxmessagediv" ).html('');
			ajaxgetrevform(1,100);
			
		});

		
		//for actually downloading the revs, use ajax probably
		var howmanyloopstomake = 0;
		var nextpnum = 0;
		var totrevsreturned = 0;
		var totalrevsinserted = 0;
		var nextpageurl = '';

		function ajaxgetrevform(pnum,perp){
			var temptimer;
			var spinnerdiv = $( ".downloadrevsbtnspinner" );
			spinnerdiv.addClass('loadingspinner');
			//make ajax call here to pull reviews from server
			//pass funnel id
			// use funnel id to get funnel details from db
			//use funnel details, plus license info, to pull reviews from server and display results
			var senddata = {
				action: 'wprp_getapps_getrevs',	//required
				wpfb_nonce: adminjs_script_vars.wpfb_nonce,
				fid: getrevformtempid,
				pnum:pnum,
				perp:perp,
				totalrevsin:totalrevsinserted,
				npagerul:nextpageurl
				};
			//send to ajax to update db
			console.log(senddata);
			var jqxhr = jQuery.post(ajaxurl, senddata, function (response){
				spinnerdiv.removeClass('loadingspinner');
				console.log(response);
				//$( ".ajaxmessagediv" ).html(response);
				if (!$.trim(response)){
					//alert("Error returning reviews for this url, please contact support.");
					$( ".ajaxmessagediv" ).html(adminjs_script_vars.msg2+response);
				} else {
					var formobject = JSON.parse(response);
					var msghtml='';
					if(typeof formobject =='object')
					{
					  // It is JSON, safe to continue here
						if(formobject.numreturned>0){
							totrevsreturned = totrevsreturned + formobject.numreturned;
							totalrevsinserted = totalrevsinserted + formobject.numinserted;
							//console.log(formobject.numinserted+'-'+totaltoinsert+'-'+totalrevsinserted);
							msghtml =  msghtml + "<br><b>"+String(formobject.numreturned) + "</b> "+adminjs_script_vars.msg3+" ";
							msghtml =  msghtml + "<br><b>"+String(totalrevsinserted) + "</b> "+adminjs_script_vars.msg4+". ";
							//if the numinserted is greater than 0 then we need to loop
							if(formobject.numinserted>0 && totaltoinsert > totalrevsinserted && formobject.stoploop!='stop'){
								console.log('loop');
								//loop here, need a break if we loop too many times
								nextpnum = pnum + 1;
								//set next page url in case we are using.
								nextpageurl = formobject.nextpageurl;
								temptimer = setTimeout(ajaxgetrevform(nextpnum,perp), 2000);
							} else {
								//console.log('finished');
								//must be finished
								if(totalrevsinserted<1){
									msghtml =  msghtml + "<br>"+adminjs_script_vars.Done+". ";
								} else {
									msghtml =  msghtml + "<br>"+adminjs_script_vars.msg5+" ";
								}
								updateavatars();
								totalrevsinserted = 0;
							}
							$( ".ajaxmessagediv" ).html(msghtml);
						} else if(formobject.numreturned<1 && totalrevsinserted>0){
							$( ".ajaxmessagediv" ).append("<br>"+adminjs_script_vars.Done+"! ");
							totalrevsinserted = 0;
							//console.log('finished2');
							updateavatars();
							
						} else if(formobject.numreturned==0 && formobject.numinserted==0){
							$( ".ajaxmessagediv" ).append("<br>"+adminjs_script_vars.msg6+" ");
						} else {
							msghtml =  msghtml + " "+adminjs_script_vars.msg7+" ";
							console.log(response);
							$( ".ajaxmessagediv" ).append(msghtml);
							//$( ".ajaxmessagediv" ).append('<br>');
							//$( ".ajaxmessagediv" ).append(response);
						}
						
						if(formobject.ack!='success' && formobject.ack!=''){
							$( ".ajaxmessagediv" ).append("<br>"+formobject.ack+" ");
							if(formobject.msg!=''){
								$( ".ajaxmessagediv" ).append("<br>"+formobject.msg+" ");
							}
						}

					}
					else
					{
						$( ".ajaxmessagediv" ).html(adminjs_script_vars.msg8+" " +response);
						console.log(response);
					}
					//testing
					//console.log('finished3');
					//updateavatars();
				}
			});
			jqxhr.fail(function() {
			  alert( adminjs_script_vars.msg9 );
			  $( ".ajaxmessagediv" ).append(adminjs_script_vars.msg9);
			  spinnerdiv.removeClass('loadingspinner');
			});
			
		}
		//=========================
		//update the cache avatars
		function updateavatars(){
			console.log('updating avatars');
				var senddata = {
					action: 'wpfb_update_avatars',	//required
					wpfb_nonce: adminjs_script_vars.wpfb_nonce,
					};
				jQuery.post(ajaxurl, senddata, function (response){console.log(response);});
		}
		
		//--------------------------------
		//get the url parameter-----------
		function getParameterByName(name, url) {
			if (!url) {
			  url = window.location.href;
			}
			name = name.replace(/[\[\]]/g, "\\$&");
			var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
				results = regex.exec(url);
			if (!results) return null;
			if (!results[2]) return '';
			return decodeURIComponent(results[2].replace(/\+/g, " "));
		}
		//---------------------------------

		
		//hide or show edit template form ----------
		var checkedittemplate = getParameterByName('taction'); // "lorem"
		var currentrtype = getParameterByName('rtype');
		var totallocations = $('.locationrow').length;
		if(checkedittemplate=="edit"){
			jQuery("#wprevpro_new_template").show("slow");
		} else {
			jQuery("#wprevpro_new_template").hide();
		}
		
		$( "#wprevpro_addnewtemplate" ).on("click",function() {
			//if this is Google then count total locations first to limit them. appformstable
			if(currentrtype=='Google' && totallocations>300){
				alert(adminjs_script_vars.msg23);
			} else {
				jQuery("#wprevpro_new_template").show("slow");
			}
		});	
		$( "#wprevpro_addnewtemplate_cancel" ).on("click",function() {
		  jQuery("#wprevpro_new_template").hide("slow");
		  //reload page without taction and tid
		  setTimeout(function(){ 
			window.location.href = "?page=wp_pro-get_apps&rtype="+currentrtype; 
		  }, 500);
		  
		});	
		

		 var placeid = '';
		//function wpfbr_testapikey(pagename) {
		$("#savetest").on("click",function(event){
			
			//hide button
			$( this ).hide();
			//add class wprevloader to parent div
			$( '#buttonloader' ).show();
			$( '#googletestresults' ).hide();
			$( '#googletestresultstext2' ).html('');
			$( '#googletestresultserrortext2' ).html('');
			$( '#googletestresults2' ).hide();

			placeid = $("#wprevpro_url").val();
			if(placeid==''){
				//alert("Please enter your Place ID.");
				//return false;
			}
			var data = {
			action	:	'wprevpro_crawl_placeid',
			gplaceid	:	placeid,
			_ajax_nonce		: adminjs_script_vars.wpfb_nonce,
				};
			var myajax = jQuery.post(ajaxurl, data, function(response) {
					console.log(response);
					    try {
							const objresponse = JSON.parse(response);
							$( '#divgoogletestresults' ).show();
							console.log(objresponse);
							if(objresponse.ack!='success'){
								//show error
								$( '#divdownloadreviews' ).hide();
								$( '#googletestresults' ).hide();
								$( '#googletestresultserror' ).show();
								$( '#googletestresultserrortext' ).html('<p>'+objresponse.ackmsg+'</p>');
							} else {
								$( '#divdownloadreviews' ).show();
								$( '#googletestresults' ).show();
								$( '#googletestresultserror' ).hide();
								if(objresponse.img!=''){
								$( '#businessimg' ).attr("src", objresponse.img);
								}
								$( '#businessname' ).html(objresponse.businessname);
								$( '#website' ).html(objresponse.website);
								$( '#googleurl' ).html(objresponse.googleurl);
								$( '#googleurl' ).attr("href", objresponse.googleurl);
								$( '#wprevpro_google_page_id' ).val(objresponse.foundplaceid);
								$( '#reviewtext' ).html('Rated <b>'+objresponse.rating+'</b> out of <b>'+objresponse.totalreviews+'</b>');
								$( '#downloadreviews' ).show();
							}
						} catch (e) {
							$( '#googletestresults' ).hide();
							$( '#googletestresultserror' ).show();
							$( '#googletestresultserror' ).html('<p>Error crawling Google. Please contact support.</p>');
							return false;
						}
					//show button
					$("#savetest").show();
					//add class wprevloader to parent div
					$( '#buttonloader' ).hide();
					
			});
			jQuery(window).unload( function() { myajax.abort(); } );

		});
		
		
		//-------------------------------
		//form validation 
		$("#wprevpro_submittemplatebtn").on("click",function(){
			if(jQuery( "#wprevpro_template_title").val()==""){
				alert(adminjs_script_vars.msg20);
				//$( "#wprevpro_template_title" ).focus();
				return false;
			}
			//loop through title to see if it's been used yet. only if not editing
			var uniquename=true;
			if($("#edittid").val()==''){
				$( ".titlespan" ).each(function() {
				  var temptitle = $( this ).text();
				  if(jQuery( "#wprevpro_template_title").val()==temptitle){
					  uniquename=false;
				  }
				});
				if(uniquename==false){
					alert(adminjs_script_vars.msg20);
					return false;
				}
			}
			
			if($("#wprevpro_site_type").val()!='google' && $("#wprevpro_site_type").val()!='Google'){
				if(jQuery( "#wprevpro_url").val()==""){
					alert(adminjs_script_vars.msg21);
					//$( "#wprevpro_url" ).focus();
					return false;
				}
			} else {
				//make sure they tested and got the place id.
				//if #googletestresults is shown then we assume it is set correctly.
				if($("#googletestresults").is(":visible")){
					
				} else {
					alert(adminjs_script_vars.msg22);
					return false;
				}
				if(currentrtype=='Google' && totallocations>300){
					alert(adminjs_script_vars.msg23);
					return false;
				}
				
			}
			
			return true;
		});
		
		function ValidURL(str) {
            var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
            '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|'+ // domain name
            '((\\d{1,3}\\.){3}\\d{1,3}))'+ // ip (v4) address
            '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ //port
            '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
            '(\\#[-a-z\\d_]*)?$','i');
		  if(!pattern.test(str)) {
			return false;
		  } else {
			return true;
		  }
		}
		
		function timeConverter(UNIX_timestamp){
		  var a = new Date(UNIX_timestamp * 1000);
		  var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
		  var year = a.getFullYear();
		  var month = months[a.getMonth()];
		  var date = a.getDate();
		  var hour = a.getHours();
		  var min = a.getMinutes();
		  //var sec = a.getSeconds();
		  var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min ;
		  return time;
		}
		
	});

})( jQuery );

