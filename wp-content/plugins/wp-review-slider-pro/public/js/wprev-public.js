(function( $ ) {
	'use strict';
	//document ready
	$(function(){

		//only show one review per a slide on mobile
		//get the attribute if it is set and this is in fact a slider
		$(".wprev-slider").each(function(){
			var oneonmobile = $(this).attr( "data-onemobil" );
			if(oneonmobile=='yes'){
				if (/Mobi|Android/i.test(navigator.userAgent) || $(window).width()<600) {
					/* this is a mobile device, continue */
					//get all the slider li elements, each li is a slide
					var li_elements_old = $(this).children('ul');
					//console.log(li_elements_old);
					if(li_elements_old.length>0){
						//get array of all the divs containing the individual slide
						var divrevs = li_elements_old.find('.w3_wprs-col');
						var divrevarray = divrevs.get();
						//get the classes of the 2 divs under the li
						var div1class = divrevs.parent().attr('class');
						var div2class = divrevs.attr('class');
						//only continue if finding the divs
						if(typeof div2class !== "undefined"){
							//remove the l2, l3, l4, l5 , l6
							div2class = div2class.replace(/[a-z]\d\b/g, 'l12');
							//use the divrevarray to make new li elements with one review in each
							var newulhtml = '';
							var i;
							for (i = 0; i < divrevarray.length; i++) { 
								if(i==0){
									newulhtml += '<li class="wprs_unslider-active"><div class="'+div1class+'"><div class="'+div2class+'">'+divrevarray[i].innerHTML + '</div></div></li>';
								} else {
									newulhtml += '<li><div class="'+div1class+'"><div class="'+div2class+'">'+divrevarray[i].innerHTML + '</div></div></li>';
								}
							}
							//add the load more button if found
							if($(this).find('.wprevpro_load_more_div')[0]!== undefined){
								newulhtml += '<li>'+$(this).find('.wprevpro_load_more_div')[0].outerHTML+'</li>';
							}
							newulhtml +='';
							//replace the old li with the new
							li_elements_old.html(newulhtml);
							//re-initialize the slider if we need to
						}
					}
				}
			}
		});
		//}
		//----------------------

		var savedheight= {};
		var wprevsliderini_height= {};
		var wprevsliderini_height_widget= {};
		var smallestwprev= {};
		var prevslickreadmoreheight;

			$( "body" ).on( "click", ".wprs_rd_more", function(event) {	
				event.preventDefault();
				readmoreclicked(this);
			});
			
			function readmoreclicked(thisclicked){
				//var oldheight = $(this).parent().parent().height();	//height of individual review indrevdiv
				var oldheight = $(thisclicked).closest('.indrevdiv').height();
				//var oldouterheight = $(this).parent().parent().outerHeight();
				var oldouterheight = $(thisclicked).closest('.indrevdiv').outerHeight();

				//save these heights in an object so we can access them from read less click.
				var sliderid = $(thisclicked).closest('.wprev-slider').attr('id');
				var slideid = sliderid+'-'+$(thisclicked).closest('.w3_wprs-col').index();
				var li_id = sliderid+'-'+$(thisclicked).closest('li').index();
				
				//save heights to use later
				savedheight[slideid] =$(thisclicked).closest('.indrevdiv').css("height");
				wprevsliderini_height[slideid] = $(thisclicked ).closest('.wprev-slider').css("height");
				wprevsliderini_height_widget[slideid] = $(thisclicked ).closest('.wprev-slider-widget').css("height");
				
				if(Number(wprevsliderini_height[slideid])<Number(smallestwprev[li_id]) || !smallestwprev[li_id] || typeof smallestwprev[li_id] === 'undefined'){
					//save the smallest value in this object, use if needed
					smallestwprev[li_id]=wprevsliderini_height[slideid];
				}
				if(Number(wprevsliderini_height_widget[slideid])<Number(smallestwprev[li_id]) || !smallestwprev[li_id] || typeof smallestwprev[li_id] === 'undefined'){
					//save the smallest value in this object, use if needed
					smallestwprev[li_id]=wprevsliderini_height_widget[slideid];
				}
				
				//console.log('wprevsliderini_height'+wprevsliderini_height);
				//console.log(wprevsliderini_height);
				//console.log('smallestwprev'+smallestwprev);
				//console.log(smallestwprev);
				
				$(thisclicked).closest('.indrevdiv').css( 'height', 'auto' );
				$(thisclicked).closest('.indrevdiv').parent().css( 'height', 'auto' );

				
				$(thisclicked ).hide();
				$( thisclicked ).prevAll('span.wprs_rd_more_1').hide();
				$( thisclicked ).next('span').show(0, function() {
					// Animation complete.
					$( this ).css('display', 'inline');
					$( this ).next('.wprs_rd_less').show();

					//only do this for slider or grid that is same height, also doing this for Fade transition
					if(!$(this).closest('.wprevpro').hasClass('revnotsameheight') || $(this).closest('.wprevpro').hasClass('wprs_unslider-fade') || $(this).closest('.wprevpro').hasClass('animateheight')){
						//waiting a bit for chrome
						var morelink = $(this);
						setTimeout ( function () {
							console.log('setmoreheight');
							setmoreheight(morelink);
						}, 10);
					}
					//if this is in slickslider with adaptiveHeight then we need to update
					var slideprops = $(thisclicked).closest('.wprevgoslick').attr( "data-slickwprev" );
					if(slideprops){
						var slidepropsobj = JSON.parse(slideprops);
						if(slidepropsobj.adaptiveHeight==true){
							if(slidepropsobj.rows>1){
								console.log('slick1');
								$(thisclicked).closest('.slickwprev-list').css('height', 'auto');
							} else {
								console.log('slick2');
								var newheighttemp =$(thisclicked).closest('.outerrevdiv').height();
								var oldslickheight = $(thisclicked).closest('.slickwprev-list').height();
								//alert(newheighttemp);
								if(oldslickheight<newheighttemp){
									//$(thisclicked).closest('.slickwprev-list').css('height', newheighttemp);
									$(thisclicked ).closest('.slickwprev-list').animate({
										height: newheighttemp,
									 }, 200 );
									 prevslickreadmoreheight = oldslickheight;
								}
							}
						}
					}
				});

				var newheight =$(thisclicked).closest('.indrevdiv').height();
				//fix if we made smaller then set back to what it was.
				//only do this for slider or grid that is same height----
				if(!$(thisclicked).closest('.wprevpro').hasClass('revnotsameheight')){
					//return false;
					if(newheight<oldheight){
						if(oldouterheight>oldheight){
							$(thisclicked).closest('.indrevdiv').css( 'height', oldouterheight );
						}else {
							$(thisclicked).closest('.indrevdiv').css( 'height', oldheight );
						}
					}
				}
				//update masonry
				turnonmasonry();
				
			}
			
			
			function setmoreheight(morelink){
				//find height of .wprs_unslider-active then set .wprev-slider, only change if bigger
				var liheight = $(morelink).closest( '.wprs_unslider-active' ).outerHeight(true);
				//find max height of all slides
				var heights = $(morelink).closest('.wprs_unslider').find( "li" ).map(function ()
							{
								return $(this).outerHeight();
							}).get(),
				overallheight = Math.max.apply(null, heights);
				
				if(liheight>overallheight || liheight==overallheight){
					$(morelink ).closest( '.wprev-slider' ).animate({height: liheight,}, 300 );
					$(morelink ).closest( '.wprev-slider-widget' ).animate({height: liheight,}, 300 );
				} else if(overallheight>100) {
					$(morelink ).closest( '.wprev-slider' ).animate({height: overallheight,}, 300 );
					$(morelink ).closest( '.wprev-slider-widget' ).animate({height: overallheight,}, 300 );
				}

			}
			
			//read less click
			$( "body" ).on( "click", ".wprs_rd_less", function(event) {	
				event.preventDefault();
				readlessclicked(this);
			});
			
			function readlessclicked(thisclicked){
				//get the slide ID of this read less so we know which height to pull
				var sliderid = $(thisclicked).closest('.wprev-slider').attr('id');
				var slideid = sliderid+'-'+$(thisclicked).closest('.w3_wprs-col').index();
				var li_id = sliderid+'-'+$(thisclicked).closest('li').index();
				$(thisclicked ).hide();
				$( thisclicked ).prev('span').hide( 0, function() {
					$(this ).prevAll('.wprs_rd_more').show();
					$( this ).prevAll('span.wprs_rd_more_1').show();
				});
				if(!$(thisclicked).closest('.wprevpro').hasClass('revnotsameheight') || $(thisclicked).closest('.wprevpro').hasClass('wprs_unslider-fade') || $(thisclicked).closest('.wprevpro').hasClass('animateheight')){
					//check if there are no read less then use smallest value
					var checkreadless = $(this ).closest('.wprevprodiv').find('.wprs_rd_less:visible').length;
					//if checkreadless = 0 then we need to make smallest
					var tempsliderheight = wprevsliderini_height[slideid];
					var tempsliderheightwidget = wprevsliderini_height_widget[slideid];
					if(checkreadless==0){
						tempsliderheight = smallestwprev[li_id];
						tempsliderheightwidget = smallestwprev[li_id];
					}
					$(thisclicked ).closest('.indrevdiv').animate({
						height: savedheight[slideid],
					  }, 0 );
					$(thisclicked ).closest('.wprev-slider').animate({
						height: tempsliderheight,
					 }, 200 );
					$(thisclicked ).closest('.wprev-slider-widget').animate({
						height: tempsliderheightwidget,
					  }, 200 );
				}
				
				//if this is in slickslider with adaptiveHeight then we need to update
				var slideprops = $(thisclicked).closest('.wprevgoslick').attr( "data-slickwprev" );
					if(slideprops){
						var slidepropsobj = JSON.parse(slideprops);
						if(slidepropsobj.adaptiveHeight==true){
							$(thisclicked ).closest('.slickwprev-list').animate({
										height: prevslickreadmoreheight,
									 }, 200 );
						}
					}

				
				//update masonry
				turnonmasonry();
			}
		
			
			//start of form javascript
			//find IP if set
			checkformIP();
			function checkformIP(){
				//search for form input on page and see if it has ip input set to yes 
				var wprevformip = $('.wprevpro_form').find('#wprev_ipFormInput');
				//console.log('ip:'+wprevformip.val());
				if(wprevformip.val()=='yes'){
					//find IP address and replace the value in the form
					 fetch('https://api.ipify.org?format=json')
					.then((response) => { return response.json() })
					.then((json) => {
						const ip = json.ip;
						//console.log('ip:'+ip);
						wprevformip.val(ip);
					})
					.catch((err) => { console.error('Error getting IP Address: ${err}') })
				}
			}
			//autopop-up
			formautopopupcheck();
			function formautopopupcheck(){
				//search for form on page and see if it has autopop attr
				var wprevform = $('.wprevpro_form');
				if(wprevform.attr("autopopup")=='yes' || wprevform.attr("autoclick")=='yes'){
					var modal = wprevform.find('.wprevmodal_modal');
					modal.show();
					wprevform.find(".wprevpro_form_inner").show();
				}
			}
			//show form on button click
			$(".wprevpro_btn_show_form").on("click",function(event){
				var formid = $(this).attr("formid");
				//make sure msgdb is hidden
				$(this).closest('#wprevpro_div_form_'+formid).find(".wprevpro_form_msg").hide();
				
				
				//see if this is a pop-up or slide down
				if($(this).attr('ispopup')=='yes'){
					//this is a pop-up
					// Get the modal
					var modal = $("#wprevmodal_myModal_"+formid);
					modal.show();
					$("#wprevpro_div_form_inner_"+formid).show();
				} else {
					//if this was autopopped then we need to remove modal, we won't be using again
					if($(this).closest('#wprevpro_div_form_'+formid).attr("autopopup")=='yes'){
						//destroy modal
						$(this).closest('#wprevpro_div_form_'+formid).find('.wprevmodal_modal').unbind();
						$(this).closest('#wprevpro_div_form_'+formid).find('.wprevmodal_modal').show();
						$(this).closest('#wprevpro_div_form_'+formid).find('.wprevmodal_modal').removeClass('wprevmodal_modal');
						$(this).closest('#wprevpro_div_form_'+formid).find('.wprevmodal_modal-content').removeClass('wprevmodal_modal-content');
						$(this).closest('#wprevpro_div_form_'+formid).find('.wprevmodal_close').html('');
						
					}
					$(this).next().find(".wprev_review_form").show();
					$(this).next().find(".wprevpro_form_inner").toggle(1000);
				}
			});
			//close model if not clicked on 
			$(".wprevmodal_modal").on("click",function(event){
				if(!$(event.target).closest('.wprevmodal_modal-content').length){
					$(this).hide();
					$(this).find(".wprevpro_form_inner").hide();
				}
			});
			//close modal on x click
			$(".wprevmodal_close").on("click",function(event){
					$(this).closest('.wprevmodal_modal').hide();
					$(this).closest('.wprevmodal_modal').find(".wprevpro_form_inner").hide();
			});
			
			//check the form on submit  
			$(".wprev_review_form").on("submit",function(event){
				var ratingreq = '';
				ratingreq = $( this ).find('#wprevpro_rating_req').val();
				if(ratingreq=="yes"){
					var checkedvalue = $('input[name=wprevpro_review_rating]:checked').val();
					if ($('input[name=wprevpro_review_rating]:checked').length && checkedvalue!='0') {
					   // at least one of the radio buttons was checked
					   //return true; // allow whatever action would normally happen to continue
					} else {
						   // no radio button was checked
						   alert('Please select a rating.');
						   $( ".wprevpro-rating" ).focus();
						   event.preventDefault(); 
						   return false; // stop whatever action would normally happen
					}
				}
				//if this is non-ajax hide the button
				$(this).find('.btnwprevsubmit').hide();
				$(this).find('.btnwprevsubmit').closest('.wprevform-field').next('.wprev_loader').show();
			});
			
			//check if this browser supports ajax file upload FormData
			function wprev_supportFormData() {
				return !! window.FormData;
			}
			
			function hideshowloader(buttondiv,showloader){
				//hide the sumbit button so they don't push twice
				if(showloader==true){
					buttondiv.hide();
					buttondiv.next('.wprev_loader').show();
				} else {
					buttondiv.show();
					buttondiv.next('.wprev_loader').hide();
				}
			}
			
			function resetform(theform){
				$(theform).trigger("reset");
			}
			
			function closeformandscroll(showformbtn){
				//wait a couple of seconds, hide the form after the message is shown. only on hidden form
				if ( showformbtn.length ) {
					setTimeout(function(){
						showformbtn.next().find(".wprevpro_form_inner").toggle(1000);
						//scroll up back to button
						$('html, body').animate({scrollTop: $( ".wprevpro_btn_show_form" ).offset().top-200}, 1000);
					}, 1500);
				}
			}
			
			//hide rating after click, if setting turned on .hasClass( "foo" )
			$(".wprevpro-rating").on("click",function(event){
				if($(this).closest('.wprevpro-rating-wrapper').hasClass('hideafterclick')){
					$(this).closest('.wprevpro-field-review_rating').hide();
				}
			});
			
			//when clicking stars on preview form
			$('.wprevpro-rating-radio-lbl').on("click",function() {
				var clickedstar = $( this ).prev().val();
				var clickedelement = $( this );
				hideshowrestofform(clickedelement,clickedstar);
			});
			//when clicking thumbs up or down
			$('.wprevpro_form').on( "click", "#wppro_fvoteup", function() {
				var clickedstar = 5;
				var clickedelement = $( this );
				//set radio
				$("#wprevpro_review_rating-star5").prop("checked", true);
				//remove and add class to show filled in value, different for smiles
				changthumbonclick('up',clickedelement);
				//find out if we are hiding social links logic
				hideshowrestofform(clickedelement,clickedstar);
			});
			$('.wprevpro_form').on( "click", "#wppro_fvotedown", function() {
				var clickedstar = 2;
				var clickedelement = $( this );
				//set radio
				$("#wprevpro_review_rating-star2").prop("checked", true);
				changthumbonclick('down',clickedelement);
				//find out if we are hiding social links logic
				hideshowrestofform(clickedelement,clickedstar);
			});
			//for changing thumbs icons on click wppro_updown_yellobg
			function changthumbonclick(voteupdown,clickedelement){
				var voteupbtn = clickedelement.closest('.wprevpro-rating').find('#wppro_fvoteup');
				var votedownbtn = clickedelement.closest('.wprevpro-rating').find('#wppro_fvotedown');
				if(voteupdown=='up'){
					if(voteupbtn.hasClass( "svg-wprsp-thumbs-o-up" )){
						voteupbtn.removeClass( "svg-wprsp-thumbs-o-up" );
						voteupbtn.addClass( "svg-wprsp-thumbs-up" );
						votedownbtn.removeClass( "svg-wprsp-thumbs-down" );
						votedownbtn.addClass( "svg-wprsp-thumbs-o-down" );
					} else if(voteupbtn.hasClass( "svg-wprsp-smile-o" ) || voteupbtn.hasClass( " svg-smileselect" )){
						voteupbtn.addClass( "svg-smileselect" );
						//voteupbtn.removeClass( "svg-wprsp-smile-o" );
						votedownbtn.removeClass( "svg-smileselect" );
						//votedownbtn.addClass( "svg-wprsp-frown-o" );
					}
				} else if(voteupdown=='down'){
					if(voteupbtn.hasClass( "svg-wprsp-thumbs-up" ) || voteupbtn.hasClass( "svg-wprsp-thumbs-o-up" )){
						voteupbtn.addClass( "svg-wprsp-thumbs-o-up" );
						voteupbtn.removeClass( "svg-wprsp-thumbs-up" );
						votedownbtn.addClass( "svg-wprsp-thumbs-down" );
						votedownbtn.removeClass( "svg-wprsp-thumbs-o-down" );
					} else if(votedownbtn.hasClass( "svg-wprsp-frown-o" ) || votedownbtn.hasClass( " svg-smileselect" )){
						votedownbtn.addClass( "svg-smileselect" );
						//votedownbtn.removeClass( "svg-wprsp-frown-o" );
						voteupbtn.removeClass( "svg-smileselect" );
						//voteupbtn.addClass( "svg-wprsp-smile-o" );
					}
				}
			}
			
			//hiding or showing rest of form logic
			function hideshowrestofform(clickedelement,clickedstar){
				
				var globshowval = $( clickedelement ).closest('form').find('#wprev_globshowval').val();
				var globhiderest = $( clickedelement ).closest('form').find('#wprev_globhiderest').val();
				if(globshowval!=''){
					if(clickedstar>globshowval){
						//show social links
						$( clickedelement ).closest('form').find('.wprevpro-field-social_links').removeClass('hideme');
						$( clickedelement ).closest('form').find('.wprevpro-field-social_links').hide();
						$( clickedelement ).closest('form').find('.wprevpro-field-social_links').show('2000');
						//what to do with rest of form
						if(globhiderest=='hide'){
							$( clickedelement ).closest('form').find('.rofform').hide();
						}
					} else {
						$( clickedelement ).closest('form').find('.wprevpro-field-social_links').hide('2000');
						//what to do with rest of form
						if(globhiderest=='hide'){
							$( clickedelement ).closest('form').find('.rofform').show('2000');
						}
					}
				}
			}
			
			$( '#wprevpro_submit_ajax' ).on("click",function(event) {
				//ajax form submission
				//find the form id based on this button
				var thisform = $(this).closest('form');
				var thisformcontainer = $(this).closest('.wprevpro_form');
				var thisformdbmsgdiv = thisformcontainer.find('.wprevpro_form_msg');
				var thisformsbmitdiv = thisform.find('.wprevpro_submit');
				var thisshowformbtn = thisformcontainer.find('.wprevpro_btn_show_form');
				
				//hide the sumbit button so they don't push twice
				hideshowloader(thisformsbmitdiv,true);
				thisformdbmsgdiv.removeClass('wprevpro_submitsuccess');
				thisformdbmsgdiv.removeClass('wprevpro_submiterror');
				
				var fileuploadinput = thisform.find('#wprevpro_review_avatar');
				//default to formdata, but use serialize if not uploading file and browser supports it
				var useserializemethod = false;
				
				//check if we are uploading a file, if so then see if browser supports. if not then use regular submit
				var imgVal = fileuploadinput.val(); 
				var checkformdatasupport = wprev_supportFormData();
				if(imgVal!="" && checkformdatasupport==false){
					//formdata not supported
					return false;
				} else {
					//stop regular form submission continue with ajax
					event.preventDefault();
					if(checkformdatasupport==false){
						useserializemethod = true;
					}
				}

				//if we are not uploading a file use the serialize method
				if(useserializemethod==true){
					var stringofvariables = thisform.serialize();
					//console.log(stringofvariables);
				
					var senddata = {
						action: 'wprp_save_review',	//required
						wpfb_nonce: wprevpublicjs_script_vars.wpfb_nonce,
						cache: false,
						processData : false,
						contentType : false,
						data: stringofvariables,
						};
					//send to ajax to update db
					var jqxhr = jQuery.post(wprevpublicjs_script_vars.wpfb_ajaxurl, senddata, function (data){
						console.log(data);
						var jsondata = $.parseJSON(data);
						if(jsondata.error=="no"){
								hideshowloader(thisformsbmitdiv,false);
								//display success message
								thisformdbmsgdiv.html(jsondata.successmsg);
								thisformdbmsgdiv.addClass('wprevpro_submitsuccess');
								thisformdbmsgdiv.show('slow');
								resetform(thisform);
								closeformandscroll(thisshowformbtn);
						} else {
								//display error message
								hideshowloader(thisformsbmitdiv,false);
								thisformdbmsgdiv.html(jsondata.dbmsg);
								thisformdbmsgdiv.addClass('wprevpro_submiterror');
								thisformdbmsgdiv.show('slow');
						}
						
					});
					jqxhr.fail(function() {
					  //display error message
						hideshowloader(thisformsbmitdiv,false);
						thisformdbmsgdiv.html(jsondata.dbmsg);
						thisformdbmsgdiv.addClass('wprevpro_submiterror');
						thisformdbmsgdiv.show('slow');
						hideshowloader(thisformsbmitdiv,false);
					});
				
				} else {
					//use formdata method
					//now using formdata so we can upload, almost works in all browsers
					var formdata = new FormData(thisform[0]);
					formdata.append('action', 'wprp_save_review');
					formdata.append('wpfb_nonce', wprevpublicjs_script_vars.wpfb_nonce);

					$.ajax({
						url: wprevpublicjs_script_vars.wpfb_ajaxurl,
						action: 'wprp_save_review',	//required
						wpfb_nonce: wprevpublicjs_script_vars.wpfb_nonce,
						type: 'POST',
						data: formdata,
						contentType:false,
						processData:false,
						success: function(data){
							console.log(data);
							var jsondata = $.parseJSON(data);
							console.log(jsondata);
							if(jsondata.error=="no"){
								hideshowloader(thisformsbmitdiv,false);
								//display success message
								thisformdbmsgdiv.html(jsondata.successmsg);
								thisformdbmsgdiv.addClass('wprevpro_submitsuccess');
								thisformdbmsgdiv.show('slow');
								resetform(thisform);
								closeformandscroll(thisshowformbtn);
							} else {
								//display error message
								hideshowloader(thisformsbmitdiv,false);
								thisformdbmsgdiv.html(jsondata.dbmsg);
								thisformdbmsgdiv.addClass('wprevpro_submiterror');
								thisformdbmsgdiv.show('slow');
							}
						  },
						error: function(data){
							console.log(data);
							var jsondata = $.parseJSON(data);
							console.log(jsondata);
							//display error message
								hideshowloader(thisformsbmitdiv,false);
								thisformdbmsgdiv.html(jsondata.dbmsg);
								thisformdbmsgdiv.addClass('wprevpro_submiterror');
								thisformdbmsgdiv.show('slow');
						  },
					});
					
				}

			});

			//for clicking the floating badge or a badge with a slide-out
			$( ".wprevpro_badge_container" ).on("click",function(event) {
				//console.log('here');
				var onclickaction = $(this).attr('data-onc');
				var onclickurl =  $(this).attr('data-oncurl');
				var onclickurltarget =  $(this).attr('data-oncurltarget');
				var badgeid = $(this).attr('data-badgeid');
			
				//first close any open popups or sliders
				$('.wprevpro_slideout_container').each(function(){
					var parentid = $(this).parent().attr('id');
					var slideid = $(this).attr('id');
					slideid = slideid.replace('wprevpro_badge_slide_', '');
					//if this is a different slide then we close it.
					if(Number(slideid)!=Number(badgeid) && $(this).is(":visible") && parentid!='preview_badge_outer'){
						//$( this).hide();
					}
				 });

			//only do this if not clicking an arrow  wprs_rd_less  wprev_pro_float_outerdiv-close  
			if(!$(event.target).closest('.wprs_unslider-arrow').length && !$(event.target).closest('.wprs_rd_less').length && !$(event.target).closest('.wprs_rd_more').length && !$(event.target).closest('.wprs_unslider-nav').length && !$(event.target).closest('a').length && !$(event.target).closest('.wprevpro_load_more_btn').length  && !$(event.target).closest('.wprev_pro_float_outerdiv-close').length && !$(event.target).hasClass('slickwprev-arrow') && !$(event.target).closest('.slickwprev-dots').length ) {
				//console.log('here2');
				if(onclickaction=='url'){
					if(onclickurl!=""){
						if(onclickurltarget=='same'){
							var win = window.open(onclickurl, '_self');
						} else {
							var win = window.open(onclickurl, '_blank');
						}
						if (win) {
							//Browser has allowed it to be opened
							win.focus();
						} else {
							//Browser has blocked it
							alert('Please allow popups for this website');
						}
					} else {
						alert("Please enter a Link to URL value.");
					}
					return false;
				} else if(onclickaction=='slideout'){
					//slideout the reviews from the side, find the correct one in relation to this click 
					
					$( "#wprevpro_badge_slide_"+ badgeid).toggle(0,function() {
						 //fix height if we need to. if it doesn't have the revnotsameheight class then it is same height
						var wprevprodivvar = $( "#wprevpro_badge_slide_"+ badgeid).find('.wprevpro');
						if(!wprevprodivvar.hasClass('revnotsameheight')){
							var indrevdiv = wprevprodivvar.find('div');
							if(wprevprodivvar.hasClass('wprev-no-slider')){
								//this is grid
								checkfixheightgrid(indrevdiv);
							} else if(wprevprodivvar.hasClass('wprev-slider')){
								//regular slider
								checkfixheightslider(indrevdiv);
							}
						}
						//for slick we are recreating no matter what.
						if(wprevprodivvar.hasClass('wprev-slick-slider')){
							//destroy
							console.log('badgeid:'+badgeid);
							wprevprodivvar.find('.wprevgoslick').slickwprev('unslickwprev');
							//slick slider, need to recreate slider.
							createaslick(wprevprodivvar.find('.wprevgoslick'));
						}

						//check if we need to masonry this
						turnonmasonry();
					  });
					return false;
				} else if(onclickaction=='popup'){
					//popup the reviews in to a modal, find the correct one in relation to this click 
					$( "#wprevpro_badge_pop_"+ badgeid).toggle(0,function() {
					
					  $( "#wprevpro_badge_pop_"+ badgeid).find('.wprs_unslider').css('margin-left', '25px');
					  $( "#wprevpro_badge_pop_"+ badgeid).find('.wprs_unslider').css('margin-right', '25px');
					  $( "#wprevpro_badge_pop_"+ badgeid).find('.wprev-slider').css('height', 'unset');
					  $( "#wprevpro_badge_pop_"+ badgeid).find('.wprevgoslick').css('margin-left', '12px');
					  $( "#wprevpro_badge_pop_"+ badgeid).find('.wprevgoslick').css('margin-right', '12px');
					  
					  //fix height if we need to. if it doesn't have the revnotsameheight class then it is same height
						var wprevprodivvar = $( "#wprevpro_badge_pop_"+ badgeid).find('.wprevpro');
						if(!wprevprodivvar.hasClass('revnotsameheight')){
							var indrevdiv = wprevprodivvar.find('div');
							if(wprevprodivvar.hasClass('wprev-no-slider')){
								//this is grid
								//alert('here');
								checkfixheightgrid(indrevdiv);
							} else if(wprevprodivvar.hasClass('wprev-slider')){
								//regular slider
								checkfixheightslider(indrevdiv);
							}
						}
						//for slick we recreate no matter what
						if(wprevprodivvar.hasClass('wprev-slick-slider')){
								//destroy
								wprevprodivvar.find('.wprevgoslick').slickwprev('unslickwprev');
								//slick slider, need to recreate slider.
								createaslick(wprevprodivvar.find('.wprevgoslick'));
						}
						turnonmasonry();
					});
					//if this is a showing a slider we need to unset the height
					setTimeout(function(){

					
					}, 50);
					//check if we need to masonry this
					
					return false;
				}
			}
		});
		//close slideout onclick on everything but it, also using if the slide out was opened from a badge
		$(document).on("click",function(event) { 
			if(!$(event.target).closest('.wprevpro_slideout_container').length && !$(event.target).closest('.updatesliderinput').length  && !$(event.target).closest('.wprevpro_badge').length) {
				if($('.wprevpro_slideout_container').is(":visible")) {
					$('.wprevpro_slideout_container').hide();
				}
			}        
		});
		//close slide-out on x click
		$(".wprevslideout_close").on("click",function(event){
				$(this).closest('.wprevpro_slideout_container').hide();
		});

		//for admin preview
		$( "#preview_badge_outer" ).on( "click", ".wprevpro_load_more_btn", function(event) {
				//need function to load more.
				loadmorerevs(this,'');
		});
		
			
		var lastclickedpagenum = 1;
		var loadedpagehtmls={};
		var loadedpaginationdiv={};
		//need to find first page of reviews if this is a pagination and save to global loadedpagehtmls
		//look for pagination div
		$( ".wppro_pagination" ).each(function( index ) {
			//find templateid
			var templateid = Number($( this ).attr( "data-tid" ));
			var ismasonry = $(this).attr('data-ismasonry');
			if(ismasonry=='yes'){
				var clone = $( this ).closest('div.wprevpro').find('div.wprs_masonry_js').clone();
			} else {
				var clone = $( this ).closest('div.wprevpro').clone();
			}

			clone.find('.wppro_pagination').remove();
			var reviewshtml = clone.html();
			//save in global, different if masonry proptid15p1tnullunsetundefined

			loadedpagehtmls['tid'+templateid+'p'+1+'tnullunsetundefined']=reviewshtml;
		});
		
		//for searching pagination text
		var txtsearchtimeout = null;
		$('.wprev_search').on('input', function() {
			var myValue = $(this).val();
			var myLength = myValue.length;
			clearTimeout(txtsearchtimeout);
			if(myLength>1 || myLength==0){
				//search here
				// Make a new timeout set to go off in 800ms
				txtsearchtimeout = setTimeout(function () {
					var parentdiv = $(this).closest('.wprev_search_sort_bar').next('.wprevpro').find('.wppro_pagination');
					//fix if searching using Load More button
					if(!parentdiv.length){
						parentdiv = $(this).closest('.wprev_search_sort_bar').next('.wprevpro').find('.wprevpro_load_more_btn');
					}
			
					$(this).closest('.wprev_search_sort_bar').find('.wprppagination_loading_image_search').show();
					startofgetpagination(1,parentdiv);
				}.bind(this), 600);
			}
		});
		//for using sort drop down on reviews
		$('.wprev_sort').on('change', function() {
			var myValue = $(this).val();
			var myLength = myValue.length;
			if(myLength>0 || myLength==0){
				var parentdiv = $(this).closest('.wprev_search_sort_bar').next('.wprevpro').find('.wppro_pagination');
				//fix if searching using Load More button
					if(!parentdiv.length){
						parentdiv = $(this).closest('.wprev_search_sort_bar').next('.wprevpro').find('.wprevpro_load_more_btn');
					}
				$(this).closest('.wprev_search_sort_bar').find('.wprppagination_loading_image_search').show();
				startofgetpagination(1,parentdiv);
			}
		});
		//for clicking a quick search tag
		$('.wprevpro_stag').on('click', function() {
			//if this already has the class current then we unsearch
			if($(this).hasClass('current')){
				$('.wprev_search').val('');
				$(this).removeClass('current');
			} else {
				var myValue = $(this).text();
				//remove all other current classes if we picked before
				$('.wprevpro_stag').removeClass('current');
				$(this).addClass('current');
				$('.wprev_search').val(myValue);
			}
			
			var parentdiv = $(this).closest('.wprev_search_sort_bar').next('.wprevpro').find('.wppro_pagination');
			//fix if searching using Load More button
				if(!parentdiv.length){
					parentdiv = $(this).closest('.wprev_search_sort_bar').next('.wprevpro').find('.wprevpro_load_more_btn');
				}
			$(this).closest('.wprev_search_sort_bar').find('.wprppagination_loading_image_tag').show();
			startofgetpagination(1,parentdiv);

		});
		//for clicking a quick type filter
		$('.wprevpro_stype_btn').on('click', function() {
			//if this already has the class current then we unsearch
			var myValue = $(this).text();
			if($(this).hasClass('current')){
				$(this).parent().attr("data-rtype","");
				$(this).removeClass('current');
			} else {
				//remove all currents then add to this one.
				$(this).parent().find('.wprevpro_stype_btn').removeClass('current');
				$(this).parent().attr("data-rtype",myValue);
				$(this).addClass('current');
			}
			var parentdiv = $(this).closest('.wprev_search_sort_bar').next('.wprevpro').find('.wppro_pagination');
			//fix if searching using Load More button
				if(!parentdiv.length){
					parentdiv = $(this).closest('.wprev_search_sort_bar').next('.wprevpro').find('.wprevpro_load_more_btn');
				}
			$(this).closest('.wprev_search_sort_bar').find('.wprppagination_rtypes_loading_img').show();
			startofgetpagination(1,parentdiv);

		});
		//for pagination click, ajax second page add to html, only doing for grid
		$( ".wppro_pagination" ).on( "click", ".wppro_page_numbers", function(event) {
			event.stopPropagation();
			event.preventDefault();
			var clickedthis = this;
			var parentdiv = $(clickedthis).closest('.wppro_pagination');
			var clickedpagenum = $(clickedthis).text();
			//alert(sliderid);
			if($(clickedthis).hasClass("current")==false){
				$(parentdiv).find( ".wprppagination_loading_image" ).show();
				startofgetpagination(clickedpagenum,parentdiv);
			}
		});
		//function to start get pagination data
		function startofgetpagination(clickedpagenum,parentdiv){
			//console.log('sgp');
			//if this is the slick slider and you clicked a filter then we stop here and rebuild slider
			//console.log(parentdiv.attr('data-slideshow'));
			if(parentdiv.attr('data-slideshow')=='sli'){
				//console.log('slick');
				var thisslick = parentdiv.parent().prev('.wprevgoslick');
				var thebutton = parentdiv;
				loadmorerevs(thebutton,thisslick,'yes');
				return false;
			}
			
			//console.log(parentdiv);
			//check if arrow clicked
			if(clickedpagenum=='>'){
				clickedpagenum = 1 + Number(lastclickedpagenum);
			} else if(clickedpagenum=='<'){
				clickedpagenum = Number(lastclickedpagenum)-1;
			} else {
				clickedpagenum = Number(clickedpagenum);
			}
			//if nothing clicked then this is first page
			if(clickedpagenum<2){
				clickedpagenum = 1;
			}
			
			
			var numperrow = $(parentdiv).attr('data-perrow');
			var numrows = $(parentdiv).attr('data-nrows');
			var cnum = '';
			var revtemplateid = $(parentdiv).attr('data-tid');
			var notinstr = $(parentdiv).attr('data-notinstring');
			var cpostid = Number($(parentdiv).attr('data-cpostid'));
			var shortcodepageid = $(parentdiv).attr('data-shortcodepageid');
			var shortcodelang = $(parentdiv).attr('data-shortcodelang');
			var shortcodetag = $(parentdiv).attr('data-shortcodetag');
			
			var ismasonry = $(parentdiv).attr('data-ismasonry');
			var revsameheight = $(parentdiv).attr( "data-revsameheight" );
			var lastslidenum = $(parentdiv).attr('data-lastslidenum');
			var totalreviewsindb = $(parentdiv).attr('data-totalreviewsindb');
			
			var spinner = $(parentdiv).find( ".wprppagination_loading_image" );
			//spinner.show();
			//see if we have search text
			var searchtext = $(parentdiv).closest('.wprevpro').prev('.wprev_search_sort_bar').find('.wprev_search').val();
			if(!searchtext){
				//spinner.show();
			}
			//override searchtext if we clicked a tag
			if($('.wprevpro_stag.current').text()!=''){
				searchtext = $('.wprevpro_stag.current').text();
			}
			
			//see if we are overriding default sort
			var sorttext = $(parentdiv).closest('.wprevpro').prev('.wprev_search_sort_bar').find('#wprevpro_header_sort').val();
			
			//see if we have a rating specified
			var ratingfilter = $(parentdiv).closest('.wprevpro').prev('.wprev_search_sort_bar').find('#wprevpro_header_rating').val();
			
			//see if we have a language specified
			var langfilter = $(parentdiv).closest('.wprevpro').prev('.wprev_search_sort_bar').find('#wprevpro_header_langcodes').val();
			
			//see if we are specified review type. $(this).parent().attr("data-rtype","");
			var rtype = $(parentdiv).closest('.wprevpro').prev('.wprev_search_sort_bar').find('.wprevpro_rtypes_div').attr("data-rtype");
			
			//console.log('rtype:'.rtype);

			//make ajax call
			 var senddata = {
				action: 'wprp_load_more_revs',	//required
				wpfb_nonce: wprevpublicjs_script_vars.wpfb_nonce,
				cache: false,
				processData : false,
				contentType : false,
				perrow: numperrow,
				nrows: numrows,
				callnum: cnum,
				clickedpnum: clickedpagenum,
				notinstring:notinstr,
				revid: revtemplateid,
				onereview: 'no',
				cpostid: cpostid,
				shortcodepageid: shortcodepageid,
				shortcodelang: shortcodelang,
				shortcodetag: shortcodetag,
				textsearch: searchtext,
				textsort: sorttext,
				textrating: ratingfilter,
				textlang: langfilter,
				textrtype: rtype,
				};
			console.log(senddata);
			//send to ajax to update db
			var paginationhtml = '';
			var havepagesaved = false;
			
			//check to see if this page html has been viewed before, load if so.
			var property = 'tid'+senddata.revid+'p'+senddata.clickedpnum+'t'+senddata.textsearch+senddata.textsort+senddata.textrating+senddata.textlang+senddata.textrtype;
			
			//console.log('first prop: '+property);

			if (typeof loadedpagehtmls[property] !== 'undefined'){
				havepagesaved = true;
			}
			
			//only using saved date if not using filter
			if(!ratingfilter){ratingfilter='unset';}
			if(!langfilter){langfilter='unset';}
			
			//check to see if this is a button. Button will not have spinner div
				if(!spinner.length){
					//change parentdiv here to div above btn
					parentdiv = parentdiv.parent('.wprevpro_load_more_div');
				}
			//either ajax or load from saved
			if(havepagesaved){
				//console.log('usesaveddata');
				var jsondata = new Object();
				jsondata['innerhtml'] = loadedpagehtmls[property];
				jsondata['clickedpnum'] =senddata.clickedpnum;
				jsondata['lastslidenum'] = lastslidenum;
				jsondata['totalreviewsindb'] = totalreviewsindb;
				jsondata['reviewsperpage'] = Number(numperrow)*Number(numrows);
				loadnextpaginationpage(senddata,spinner,ismasonry,revsameheight,parentdiv,jsondata);
			} else {
				ajaxcallforpagination(senddata,spinner,ismasonry,revsameheight,parentdiv);
			}
			
		}
		
		//ajax call for next pagination page clicked
		function ajaxcallforpagination(senddata,spinner,ismasonry,revsameheight,parentdiv){
			//console.log('ajax');
			var jsondata = '';
			var jqxhr = jQuery.post(wprevpublicjs_script_vars.wpfb_ajaxurl, senddata, function (data){
					var IS_JSON = true;
					//console.log(data);
					//strip everything outside of {}, workaround when wordpress generates and message
					var lastcurly = data.lastIndexOf("}");
					data = data.substring(0, lastcurly+1);
					//console.log(data);
					try
					   {
							var jsondata = $.parseJSON(data);
					   }
					   catch(err)
					   {
						   console.log('jsonparse error with return html');
						   IS_JSON = false;
							spinner.hide();
					   }
					   
					if(data && data!="" && IS_JSON){
						//update notinstring
						$(parentdiv).attr('data-notinstring',jsondata.newnotinstring);
						//if this is button then also update it
						$(parentdiv).find('.wprevpro_load_more_btn').attr('data-notinstring',jsondata.newnotinstring);
						loadnextpaginationpage(senddata,spinner,ismasonry,revsameheight,parentdiv,jsondata);
					}
				});
				jqxhr.fail(function() {
					  //display error message
						console.log("fail");
						spinner.hide();
						return;
				});
		}
		//actually going to build pagination page here
		function loadnextpaginationpage(senddata,spinner,ismasonry,revsameheight,parentdiv,jsondata){
			//console.log('load from save');
			var paginationhtml = '';
			if(jsondata!=''){
				var innerrevhtml = jsondata.innerhtml;
				//console.log(jsondata);

				//save in case we want to quick load, only save if 
				var property = 'tid'+senddata.revid+'p'+senddata.clickedpnum+'t'+senddata.textsearch+senddata.textsort+senddata.textrating+senddata.textlang+senddata.textrtype;
				loadedpagehtmls[property]=innerrevhtml;

				$('.wprppagination_loading_image_search').hide();
				$('.wprppagination_loading_image_tag').hide();
				$('.wprppagination_rtypes_loading_img').hide();
				
				//console.log(parentdiv);

				//replace the reviews, different if ismasonry
				if(ismasonry=='yes'){
					
					 $(parentdiv).prevAll( "div.wprs_masonry_js" ).fadeOut(200).promise().done(function(){
						 $(parentdiv).prevAll( "div.wprs_masonry_js" ).html('');
						 $(parentdiv).prevAll( "div.wprs_masonry_js" ).append(innerrevhtml);
						 $(parentdiv).prevAll( "div.wprs_masonry_js" ).fadeIn(200).promise().done(function(){
							if(revsameheight=='yes'){
							checkfixheightgrid(parentdiv);
							}
							turnonmasonry();
						 });

					 });

				} else {
					$(parentdiv).prevAll( "div.wprevprodiv" ).fadeOut(200).promise().done(function(){
						 $(parentdiv).prevAll( "div.wprevprodiv" ).remove();
						 $(parentdiv).closest("div.wprevpro").prepend(innerrevhtml);
						 $(parentdiv).prevAll( "div.wprevprodiv" ).fadeIn(200);
						 if(revsameheight=='yes'){
							checkfixheightgrid(parentdiv);
						}
					 });
				 
				}
				
				lastclickedpagenum = Number(jsondata.clickedpnum);
				var lastslidenum = Number(jsondata.lastslidenum);
				var temptotalrevsindb = Number(jsondata.totalreviewsindb);
				var tempreviewsperpage = Number(jsondata.reviewsperpage);
				
				//update the html data so we can pull correct number again.
				//$(parentdiv).attr('data-lastslidenum',lastslidenum);
				//$(parentdiv).attr('data-totalreviewsindb',temptotalrevsindb);
				
				var chtml = '';
				spinner.hide();
				
				//scroll to top of reviews on mobile only or if viewport smaller than div height
				if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || $(parentdiv).closest("div.wprevpro").height()>window.innerHeight) {
					var sliderid = $(parentdiv).closest("div.wprevpro");
					var offset = sliderid.offset();
					$('html, body').animate({
					scrollTop: offset.top-75
					}, 'slow');
				}

				//redraw pagination buttons, only if we don't see all reviews on this page and we are using pagination not load more btn
				if(spinner.length){
					//console.log('redraw pagination');
					//console.log(loadedpaginationdiv[property]);
					if( loadedpaginationdiv[property] ) {
						paginationhtml = loadedpaginationdiv[property];
					} else {
						paginationhtml = '<ul class="wppro_page_numbers_ul">';
						if(temptotalrevsindb > tempreviewsperpage){
							
							if(lastclickedpagenum>1){
								paginationhtml =  paginationhtml +'<li><span class="brnprevclass wppro_page_numbers prev-button"><</span></li>';
							}
							if(lastclickedpagenum==1){
								chtml ='current';
							}
							//always add first page
							paginationhtml =  paginationhtml +'<li><span class="brnprevclass wppro_page_numbers '+chtml+'">1</span></li>';
							//add dots if needed to start
							if(lastclickedpagenum>3){
								paginationhtml =  paginationhtml +'<li><span class="brnprevclass wppro_page_dots">…</span></li>';
							}
							
							for (var i = 2; i < lastslidenum; i++) {
								chtml = '';							
								if(i==lastclickedpagenum){
									chtml ='current';
								}
								if(i-1==lastclickedpagenum || i+1==lastclickedpagenum || i==lastclickedpagenum){
								paginationhtml = paginationhtml +'<li><span class="brnprevclass wppro_page_numbers '+chtml+'">'+i+'</span></li>';
								}
							}
							//add dots if needed to end
							if((lastslidenum-lastclickedpagenum)>2){
								paginationhtml =  paginationhtml +'<li><span class="brnprevclass wppro_page_dots">…</span></li>';
							}
							//always add last page
							chtml ='';
							if(lastslidenum==lastclickedpagenum){
								chtml ='current';
							}
							
							paginationhtml =  paginationhtml +'<li><span class="brnprevclass wppro_page_numbers '+chtml+'">'+lastslidenum+'</span></li>';
							
							if(lastclickedpagenum!=lastslidenum){
								paginationhtml =  paginationhtml +'<li><span class="brnprevclass wppro_page_numbers next-button">></span></li>';
							}
						}
						paginationhtml = paginationhtml +'</ul>'+spinner.get(0).outerHTML;
						
						//save so we can reuse
						loadedpaginationdiv[property]=paginationhtml;
					}
					
					//console.log(spinner);
					
					//need to do a remove add instead of re
					$(parentdiv).html( paginationhtml );
				} else {
					//this must be a button instead of pagination, see if we should hide load more
					if(temptotalrevsindb <= tempreviewsperpage){
						//hide button
						$(parentdiv).hide();
					} else {
						$(parentdiv).show();
						$(parentdiv).find('.wprevpro_load_more_btn').show();
					}
				}

			} else {
				//console.log(data);
				spinner.hide();
			}
			
		}
			
		//custom event
		$('.wprevpro_load_more_btn').on('wprevlastslide', function() {
			 // do stuff
			 //console.log('custom, load more btn click');
			 loadmorerevs(this,'');
		});
		//for load more btn click, ajax more reviews and add to html
		$( ".wprevpro_load_more_btn" ).on("click",function(event) {
			//console.log('load more btn click');
			loadmorerevs(this,'');
		});
		//console.log(wprevpublicjs_script_vars.wpfb_ajaxurl);
		function loadmorerevs(thebtn,thisslick,filterbar='no'){
			//console.log(thisslick);
			//get number of review rows and per a row, use this number for offset call to db
			var spinner = $(thebtn).next( ".wprploadmore_loading_image" );
			var loadbtn = $(thebtn);
			
			//console.log(loadbtn);
			//var templateiddiv = $(thebtn).closest('div');
			var numperrow = $(thebtn).attr('data-perrow');
			var numrows = $(thebtn).attr('data-nrows');
			var cnum = $(thebtn).attr('data-callnum');
			var revtemplateid = $(thebtn).attr('data-tid');
			
			var notinstr = $(thebtn).attr('data-notinstring');
			
			var cpostid = $(thebtn).attr('data-cpostid');
			var shortcodepageid = $(thebtn).attr('data-shortcodepageid');
			var shortcodelang = $(thebtn).attr('data-shortcodelang');
			var shortcodetag = $(thebtn).attr('data-shortcodetag');
			
			if (/Mobi|Android/i.test(navigator.userAgent) || $(window).width()<600) {
				var oneonmobile = $(thebtn).attr( "data-onemobil" );
			} else {
				var oneonmobile = 'no';
			}
			
			//see if we have search text
			var searchtext = $(thebtn).closest('.wprevpro').prev('.wprev_search_sort_bar').find('.wprev_search').val();
			//see if we are overriding default sort
			var sorttext = $(thebtn).closest('.wprevpro').prev('.wprev_search_sort_bar').find('#wprevpro_header_sort').val();
			//see if we have a rating specified
			var ratingfilter = $(thebtn).closest('.wprevpro').prev('.wprev_search_sort_bar').find('#wprevpro_header_rating').val();
			//see if we have a language specified
			var langfilter = $(thebtn).closest('.wprevpro').prev('.wprev_search_sort_bar').find('#wprevpro_header_langcodes').val();
			
			//see if we are specified review type. $(this).parent().attr("data-rtype","");
			var rtype = $(thebtn).closest('.wprevpro').prev('.wprev_search_sort_bar').find('.wprevpro_rtypes_div').attr("data-rtype");
			
			if(thisslick==''){
			spinner.show();
			}
			loadbtn.hide();

			//make ajax call
			 var senddata = {
				action: 'wprp_load_more_revs',	//required
				wpfb_nonce: wprevpublicjs_script_vars.wpfb_nonce,
				cache: false,
				processData : false,
				contentType : false,
				perrow: numperrow,
				nrows: numrows,
				callnum: cnum,
				notinstring:notinstr,
				revid: revtemplateid,
				onereview: oneonmobile,
				cpostid: cpostid,
				shortcodepageid: shortcodepageid,
				shortcodelang: shortcodelang,
				shortcodetag: shortcodetag,
				textsearch: searchtext,
				textsort: sorttext,
				textrating: ratingfilter,
				textlang: langfilter,
				filterbar: filterbar,
				textrtype: rtype,
				};
				//console.log(senddata);
				//send to ajax to update db
				var jqxhr = jQuery.post(wprevpublicjs_script_vars.wpfb_ajaxurl, senddata, function (data){
					var IS_JSON = true;
					//console.log(data);
					//strip everything outside of {}, workaround when wordpress generates and message
					data = data.substring(0, data.indexOf('}')+1);
					try
					   {
							var jsondata = $.parseJSON(data);
					   }
					   catch(err)
					   {
						   IS_JSON = false;
							spinner.hide();
					   }  
					if(data && data!="" && IS_JSON){
						var revsameheight = $(thebtn).attr( "data-revsameheight" );
						var isslider = $(thebtn).attr('data-slideshow');
						var ismasonry = $(thebtn).attr('data-ismasonry');
						//console.log(jsondata);
						var innerrevhtml = jsondata.innerhtml;
						var numreviews = jsondata.totalreviewsnum;
						var hideldbtn = jsondata.hideldbtn;
						var animateheight = jsondata.animateheight;
						//console.log('isslider:'+isslider);
						//console.log('filterbar:'+filterbar);
						//console.log('revsameheight:'+revsameheight);
						//console.log('ismasonry:'+ismasonry);

						//add to page
						if(isslider=='yes'){
							//add to btn slide
							loadbtn.parent('.wprevpro_load_more_div').before( innerrevhtml );
							if(hideldbtn!='yes'){
								//move btn slide to end
								var tempul = loadbtn.closest('li').next('li');
								var divtomove = loadbtn.parent('.wprevpro_load_more_div');
								divtomove.detach();
								tempul.append(divtomove);
							} else {
								loadbtn.closest('.wprs_unslider').find( "ol li:last").remove();
							}
							spinner.hide();
							//update slide height here if animateheight is true
							if(animateheight=='yes'){
								var liheight = $(thebtn ).closest('li').prev('li').css("height");
								$(thebtn ).closest( '.wprev-slider' ).animate({height: liheight,}, 750 );
								$(thebtn ).closest( '.wprev-slider-widget' ).animate({height: liheight,}, 750 );
							}
							//check to see if fixheight is set
							if(revsameheight=='yes'){
								checkfixheightslider(thebtn);
							}
							
						} else if(isslider=='sli'){
							okaytoloadnextslickslide = true;
							//console.log(innerrevhtml);
							//add innerhtml to the slider using the addslide method
							//if(numreviews>0){
								//destroy and rebuild if this is a filter bar change
								if(filterbar=='yes'){
									$('.wprppagination_loading_image_search').hide();
									$('.wprppagination_loading_image_tag').hide();
									$('.wprppagination_rtypes_loading_img').hide();
									//destroy
									$(thisslick).slickwprev('unslickwprev');
									//replace the html
									$(thisslick).html( innerrevhtml);
									//rebuild slick slider
									createaslick(thisslick);
								} else {
									if(numreviews>0){
									$(thisslick).slickwprev('slickwprevAdd',innerrevhtml);
									var slideprops = $(thisslick).attr( "data-slickwprev" );
									var slidepropsobj = JSON.parse(slideprops);
									//fix transition if this is a fade
									if(slidepropsobj.speed==0){
										//console.log(slidepropsobj);
										$(thisslick).find(".slickwprev-active").css("transition-duration", "0.5s");
									}
									}
								}
								if(numreviews>0){
								//if we are setting same height then we need to do it again.
								var revsameheight = $(thisslick).attr( "data-revsameheight" );		
								if(revsameheight=='yes'){
									setTimeout (() => { 
										fun_revsameheight(thisslick);
										//fun_fixheightsliajax(thisslick);
									}, 10);
								}
								var wprevmasonry = $(thisslick).attr( "data-wprevmasonry" );
								if(wprevmasonry!='yes'){
									setTimeout (() => { 
											fun_fixheightsliajax(thisslick);
										}, 20);
									}
								}
							//}
							
							
						} else {
							if(ismasonry=='yes'){
								loadbtn.parent('.wprevpro_load_more_div').prev('.wprs_masonry_js').append( innerrevhtml );
								turnonmasonry();
							} else {
								loadbtn.parent('.wprevpro_load_more_div').before( innerrevhtml );
							}
							spinner.hide();
							if(numreviews>0){
								loadbtn.show();
							}
							if(hideldbtn=='yes'){
								loadbtn.hide();
							}
							if(revsameheight=='yes'){
								checkfixheightgrid(thebtn);
							}
						}
						//update btn attribute callnum
						var newcallnum = Number(jsondata.callnum) +1;
						var newnotinstring = jsondata.newnotinstring;
						loadbtn.attr('data-notinstring',newnotinstring);
						loadbtn.attr('data-callnum',newcallnum);
						loadbtn.attr('hideldbtn',hideldbtn);

					} else {
						//console.log(data);
						spinner.hide();
					}
				});
				jqxhr.fail(function() {
					  //display error message
						console.log("fail");
						spinner.hide();
						loadbtn.show();
				});
			
		}
		
		//check if grid needs same height set, not in pop-up or float
		$( ".wprevpro.wprev-no-slider" ).each(function( index ) {
			if(!$( this ).hasClass('revnotsameheight') && !$(this).closest(".wprevmodal_modal").length && !$(this).closest(".wprevpro_float_outer").length ){
				//set revs same height
				setTimeout(() => { checkfixheightgrid($( this ).find('div')) }, 100);
				//checkfixheightgrid($( this ).find('div'));
			}
		});
						
		//when loading more for grid via button or page then we set height
		function checkfixheightgrid(thebtn){
			//first make sure this is visible.
			if($(thebtn).closest( '.wprevpro' ).is(":visible")){
				var maxheights = $(thebtn).closest( '.wprevpro' ).find(".indrevdiv").map(function (){return $(this).outerHeight();}).get();
				var maxHeightofgrid = Math.max.apply(null, maxheights);
				$(thebtn).closest( '.wprevpro' ).find(".indrevdiv").css( "height", maxHeightofgrid );
			}
		}
		
		//when loading more, check to see if we are fixing the height, if so then set the height here
		function checkfixheightslider(thebtn){
			//wprs_unslider
			var maxheights = $(thebtn).closest( '.wprs_unslider' ).find(".indrevdiv").map(function (){return $(this).outerHeight();}).get();
			var maxHeightofslide = Math.max.apply(null, maxheights);
			$(thebtn).closest( '.wprs_unslider' ).find(".indrevdiv").css( "height", maxHeightofslide );
			
			//fix if the new height is bigger than overallheight
			var liheight = $(thebtn ).closest( 'li' ).prevAll( '.wprs_unslider-active' ).outerHeight();
			//find max height of all slides
			var heights = $(thebtn ).closest('.wprs_unslider').find( "li" ).map(function ()
						{
							return $(this).outerHeight();
						}).get(),overallheight = Math.max.apply(null, heights);
						
			if(liheight>overallheight){
				$(thebtn ).closest( '.wprevpro' ).animate({height: liheight,}, 200 );
			} else {
				$(thebtn ).closest( '.wprevpro' ).animate({height: overallheight,}, 200 );
			}
		}
		
		//for closing float on click
		$( ".wprev_pro_float_outerdiv-close" ).on("click",function(event) {
			$(this).closest('.wprevpro_float_outer').hide('300');
			//add to session storage so we don't show on page reload
			//sessionStorage.setItem('wprevpro_clickedclose', 'yes');
			var floatid = $(this).attr('id');
			
			//need to grab current settings first
			var wprevfloats = JSON.parse(sessionStorage.getItem("wprevfloats") || "[]");
			wprevfloats.push({id: floatid, clickedclose: "yes"});
			
			sessionStorage.setItem("wprevfloats", JSON.stringify(wprevfloats));
			//var clickedclose = sessionStorage.getItem('wprevpro_clickedclose');
		});
		
		//check to see if sessionStorage holds a clicked x then hide if so.
		//var hiddenfloats=[];
		checksession();
		function checksession(){
			//initially show all floats here
			$("div.wprevpro_float_outer").show();
			//check to see if any floats need to be hidden
			var wprevfloats = JSON.parse(sessionStorage.getItem("wprevfloats") || "[]");
			wprevfloats.forEach(function(wprevfloat, index) {
				if(wprevfloat.clickedclose=='yes' || wprevfloat.firstvisithide =='yes'){
					//hide the float here
					$( "#"+wprevfloat.id ).closest('.wprevpro_float_outer').hide();
				}
				//console.log("[" + index + "]: " + wprevfloat.id);
			});
			//update the storage if we are only displaying on first visit here
			$("div.wprevpro_badge_container[data-firstvisit='yes']").each(function( index ) {
				var floatid = $(this).find('.wprev_pro_float_outerdiv-close').attr('id');
				var floatsaved = false;
				//only set if not set before
				var filtered=wprevfloats.filter(function(item){
					return item.firstvisithide=="yes" && item.id == floatid;        
				});
				if (filtered == false) {
					wprevfloats.push({id: floatid, firstvisithide: "yes"});
					sessionStorage.setItem("wprevfloats", JSON.stringify(wprevfloats));
				}
			});
		}
		
		//check to see if we are flying this float in and delay wprevpro_float_outer
		var wprev_popshowtime = 8000; //show review popin for 8 seconds
		var wprev_pophidetime = 6000; //hide review popin for 6 seconds
		var wprev_popnumber = 1;
		var wprev_poptotalpops = 50;	//total numer of pop-ins, force to 10 if we have time set
		var pageisvisible = true;
		var mouseisover = false;
		
		//listening for visibility change
		document.addEventListener("visibilitychange", handleVisibilityChange, false);
		function handleVisibilityChange() {
		  if (document.hidden) {
			  //console.log('hidden');
			pageisvisible = false;
		  } else  {
			  //console.log('shown');
			pageisvisible = true;
		  }
		}
		//listening for mouseover and mouseout
		$('div .wprev_pop_contain').on( "mouseenter",function(){
			 mouseisover = true;
		}).on( "mouseleave",function() {
			 mouseisover = false;
		});
	
		runfloatfunctions();
		function runfloatfunctions(){
			$(".wprevpro_float_outer").each(function() {
				var currentfloatid = $(this).attr('id');
				//get variables to see if we fly in or fade in
				var animatedir = $(this).find('.wprevpro_badge_container').attr('data-animatedir');
				var animatedelay = Number($(this).find(".wprevpro_badge_container").attr('data-animatedelay'))*1000;
				var floatdiv = $(this).find(".wprev_pro_float_outerdiv");
				
				//first we need to move it out
				slideinoutfloat(floatdiv,animatedir,'out',0);
				
				//slide or fade in the float
				if(animatedelay>0){
					setTimeout(function(){ slideinoutfloat(floatdiv,animatedir,'in',1000); }, animatedelay);
				} else {
					slideinoutfloat(floatdiv,animatedir,'in',1000);
				}

				//check to see if we are auto-closing this float
				var autoclose = $(this).find(".wprevpro_badge_container").attr('data-autoclose');
				var autoclosedelay = Number($(this).find(".wprevpro_badge_container").attr('data-autoclosedelay'))*1000 + animatedelay;
				if(autoclose=='yes' && autoclosedelay>0){
					setTimeout(function(){ 
					$(floatdiv).hide(); 
					wprev_popnumber = wprev_poptotalpops;	//end the loop
					}, autoclosedelay);
				}
				
				//check if we have any float review pops on the page. 
				if($(this).find(".wprevpro_outerrevdivpop").length){
					var thispopdiv = $(this).find(".wprevpro_outerrevdivpop");
					var firstdelay = animatedelay + wprev_popshowtime;
					//this will hide it and then loop it
					var myPopVar = setTimeout(function() { hideandload(floatdiv,thispopdiv,animatedir)}, firstdelay);
				}

			});
		}
		//does the actual sliding of the float
		function slideinoutfloat(floatdiv,animatedir,inorout,transtime){
			if(pageisvisible && !mouseisover){
			var startcssval;
			if(inorout=='in'){
				$(floatdiv).show();
			}
			if(animatedir=='right'){
				if(inorout=='in'){
					//fly this in from the right of the page
					$(floatdiv).animate({right: "10px"}, 1000 );
				} else if(inorout=='out'){
					$(floatdiv).animate({right: "-110%"}, 1000 );
				}
			} else if(animatedir=='bottom'){
				if(inorout=='in'){
					$(floatdiv).animate({bottom: "10px"}, 1000 );
				} else if(inorout=='out'){
					//already on page we need to animate off of page.
					$(floatdiv).animate({bottom: "-1000px"}, 1000 );
				}
			} else if(animatedir=='left'){
				if(inorout=='in'){
					//fly this in from the left of the page
					$(floatdiv).animate({left: "10px"}, 1000 );
				} else if(inorout=='out'){
					//already on page we need to animate off of page.
					$(floatdiv).animate({left: "-110%"}, 1000 );
				}
			} else if(animatedir=='fade'){
				if(inorout=='in'){
					//fade this in the page
					$(floatdiv).animate({opacity: 1}, 500 );
				} else if(inorout=='out'){
					//already on page we need to animate off of page.
					$(floatdiv).animate({opacity: "0"}, 500 );
				}
			}
			//wprev_popnumber = 1, then we check to see if we need to fix this advanced slider
			if($(floatdiv).find('.slickwprev-active').length > 0 && $(floatdiv).find('.slickwprev-active').width()==0){
				var thisslick = $(floatdiv).find('.wprevgoslick');
				$(thisslick).slickwprev('slickwprevGoTo',0);
			}
			}
		}

		var startoffset = 1;
		function hideandload(floatdiv,thispopdiv,animatedir) {
			//console.log('wprev_popnumber:'+wprev_popnumber);
			//console.log('wprev_poptotalpops:'+wprev_poptotalpops);
			var missedslideout = false;
			//console.log('hideload2');
			//slide or fade the float out so we can replace html, only if mouse is not overallheight
			if(pageisvisible && !mouseisover){
				slideinoutfloat(floatdiv,animatedir,'out',1000);
				missedslideout = false;
			} else {
				missedslideout = true;
			}
				wprev_popnumber = wprev_popnumber + 1;

				var formid = $(thispopdiv).attr("data-formid");
				var wtfloatid = $(thispopdiv).attr("data-wtfloatid");
				
				//load next slide
					var senddata = {
					action: 'wprp_get_float',	//required
					wpfb_nonce: wprevpublicjs_script_vars.wpfb_nonce,
					fid: formid,
					wtfid: wtfloatid,
					wtftype: 'pop',
					innerdivonly: 'yes',
					startoffset: startoffset
					};
					//console.log(senddata);
				//send to ajax to update db
				var jqxhr = jQuery.post(wprevpublicjs_script_vars.wpfb_ajaxurl, senddata, function (response){
					//console.log(response);
					//console.log(response.length);
					startoffset = startoffset +1;
					if (!$.trim(response) || response.length<100){
						//console.log('unable to find next pop review');
						wprev_popnumber = wprev_poptotalpops;	//end the loop
					} else {
						if(wprev_popnumber < wprev_poptotalpops){
							//remove current pop contents and add new
							if(pageisvisible && !mouseisover && missedslideout==false){
							$(floatdiv).find('.wprev_pop_contain').html('');
							$(floatdiv).find('.wprev_pop_contain').html(response);
							}
							//console.log(wprev_pophidetime);
							//console.log(wprev_popshowtime);
							//now add delay and re-show
							setTimeout(function(){
								slideinoutfloat(floatdiv,animatedir,'in',1000);
							}, wprev_pophidetime);
							var showdelay = wprev_pophidetime + wprev_popshowtime;
							setTimeout(function() {
								hideandload(floatdiv,thispopdiv,animatedir)
							}, showdelay);
						}
					}
				});
			
			
		}
		
		//check to see if we need to add masonry, delay so CSS can setup first
		setTimeout(function(){ turnonmasonry(); }, 100);
		function turnonmasonry(){
			//search for masonry elements
			//alert("here!");
			$(".wprevpro").find(".wprs_masonry_js").each(function( index ) {
					var numcol = parseInt($(this).attr( "data-numcol" ));
					var contwidth = parseInt($(this).closest('.wprevpro').width());
					var blockwidth = parseInt(contwidth/numcol)-30;
					//fix for small screens
					if(blockwidth<200){
						blockwidth = 200;
					}
					var masonryid = $(this).closest('.wprevpro').attr('id');
					if(numcol>0 && contwidth >0){
						var masonry = new MiniMasonry({
							container: '#'+masonryid+" .wprs_masonry_js",
							minify: true,
							gutter: 20,
							baseWidth: blockwidth
						});
					}
			});
			$(".wprevpro").find(".wprs_masonry_js").fadeTo( "fast", 1 );
		}
		
		
		function fun_revsameheight(thisslick){
					var maxheights = $(thisslick).find(".indrevdiv").map(function (){return $(this).outerHeight();}).get();
					//console.log(maxheights);
					var maxHeightofslide = Math.max.apply(null, maxheights);
					//console.log(maxHeightofslide);
					if(maxHeightofslide>0){
						$(thisslick).find(".indrevdiv").css( "min-height", maxHeightofslide );
					}
		}
		function fun_fixheightsliajax(thisslick){
					var maxheights = $(thisslick).find(".w3_wprs-col").map(function (){return $(this).outerHeight();}).get();
					//console.log(maxheights);
					var maxHeightofslide = Math.max.apply(null, maxheights);
					//console.log(maxHeightofslide);
					if(maxHeightofslide>0){
						$(thisslick).find(".w3_wprs-col").css( "min-height", maxHeightofslide );
					}
		}
		
		//need a global variable to check if mouse is over div. used to make sure slick doesn't autoadvance on read more click.
		let isMouseHover = false
		$( ".wprevgoslick" )
		  .mouseover(function() {
			isMouseHover = true
			$(this).slickwprev('slickwprevPause');
		  })
		  .mouseout(function() {
			isMouseHover = false
			//make sure this has autoplay turned on before we start it.
			var slideprops = $(this).attr( "data-slickwprev" );
			var slidepropsobj = JSON.parse(slideprops);
			if(slidepropsobj.autoplay==true){
				$(this).slickwprev('slickwprevPlay');
			}
			
			
		  });
		//if mouse is over a slickslider and it has autoplay on, then pause autoplay.
		
		
		
		//for slick slider, check to make sure there is a slick template on page first
		$( ".wprevgoslick" ).each(function( index ) {
			//if this slick is in a float then delay for 1, parent must have  class
			//if ($(this).parents('.wprevpro_slideout_container').length) {
				//this in a slideout, so we wait to create it on slideout.

			//} else {
				createaslick(this);
			//}
		});
		var okaytoloadnextslickslide = true;
		function createaslick(thisslickdiv){
			//console.log('making slick');
			//find the id of this and use it to create slick
			var thisid = $(thisslickdiv).attr('id');
			//console.log(thisid);
			//var thisslick = $( "#"+thisid );
			//change in version 11.0.9.7 so we can have same shortcode used twice on page.
			var thisslick = thisslickdiv;

			//show since hidden
			$(thisslickdiv).show();

			var revsameheight = $(thisslickdiv).attr( "data-revsameheight" );
			if(revsameheight=='yes'){
				setTimeout (() => { 
					fun_revsameheight(thisslick);
				}, 50);
			}


			//if we are doing more than one row and masonry turned off then set min-height of each reviews to largest review.
			var slideprops = $(thisslickdiv).attr( "data-slickwprev" );
			//console.log(slideprops);
			var slidepropsobj = JSON.parse(slideprops);
			//console.log(slidepropsobj);
			var displaymasonry = $(thisslickdiv).attr( "data-wprevmasonry" );
			//is this an avatar nav
			var isavatarnav = $(thisslickdiv).attr( "data-avatarnav" );
			var revsperrow = $(thisslickdiv).attr( "data-revsperrow" );
			
			if(slidepropsobj.rows > 1 && displaymasonry=='no'){
				var maxheights = $(thisslickdiv).find(".outerrevdiv").map(function (){return $(this).outerHeight();}).get();
				var maxHeightofrev = Math.max.apply(null, maxheights);
				//console.log(maxHeightofrev);
				if(revsperrow==true && revsperrow=="1"){
					//do nothing since one per a row.
				} else {
					$(thisslickdiv).find(".outerrevdiv").css( "min-height", maxHeightofrev );
				}
			}
			var centerpad = '50px';
			var centerpad2 = '50px';
			if(slidepropsobj.centerPadding && slidepropsobj.centerPadding!=''){
				if(slidepropsobj.centerMode && slidepropsobj.centerMode==true){
				centerpad2 = '100px';
				}
			}
			if(isavatarnav=='no' && slidepropsobj.slidesToShow >1){
			var options = {
			  		responsive: [
						{
						  breakpoint: 992,
						  settings: {
							slidesToShow: 2,
							slidesToScroll: 2
						  }
						},
						{
						  breakpoint: 600,
						  settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
							centerPadding: centerpad
						  }
						}
					  ]
				};
			} else if(isavatarnav=='no' && slidepropsobj.slidesToShow <2){
				var options = {
			  		responsive: [
						{
						  breakpoint: 992,
						  settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
							centerPadding: centerpad2
						  }
						},
						{
						  breakpoint: 600,
						  settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
							centerPadding: centerpad
						  }
						}
					  ]
				};
			} else {
				var options = {};
			}	
			//if adaptive height set to true and showing more than one review and only scrolling one we hack this
			if(slidepropsobj.adaptiveHeight==true && slidepropsobj.slidesToShow > 1){
				// my slick slider as constant object
				var mySlider = $(thisslick).on('init', function(slickwprev) {
				  // on init run our multi slide adaptive height function
				  wppromultiSlideAdaptiveHeight(thisslick);
				}).on('beforeChange', function(slickwprev, currentSlide, nextSlide) {
				  // on beforeChange run our multi slide adaptive height function
				  wppromultiSlideAdaptiveHeight(thisslick);
				}).slickwprev(options);
				$(thisslick).find('div[aria-hidden="true"]').find('a').attr("tabindex","-1");
			} else {
				$( thisslick ).slickwprev(options);
				$(thisslick).find('div[aria-hidden="true"]').find('a').attr("tabindex","-1");
			}
		
			//if center mode true add CSS rules
			if(slidepropsobj.centerMode==true){
				$(thisslick).find('.slickwprev-slide').css("opacity", "0.5");
				$(thisslick).find('.slickwprev-center').css("opacity", "1");
				$(thisslick).on('beforeChange', function(slickwprev) {
					$(thisslick).find('.slickwprev-slide').fadeTo( 100, 0.5 );
				});
				$(thisslick).on('setPosition', function(slickwprev) {
					$(thisslick).find('.slickwprev-center').fadeTo( 100, 1 );
				});
			}
			//if this is avatarnav then need to add on click to change slides
			if(isavatarnav=='yes'){
				$(thisslick).find('.avataronlyrevdiv').on("click",function() {
				  var clickedslickindex = $(this).parent().parent().attr( "data-slickwprev-index" );
				  $(thisslick).slickwprev('slickwprevGoTo',clickedslickindex);
				});
			}

			//load another slide on second to last slide
			if($(thisslick).next('.wprevpro_load_more_div').length){
				//console.log('load more div found');
				$(thisslick).on('afterChange', function(slickwprev) {
					//find out total number of slides and if we are on second to last
					var currentslide = $(thisslick).slickwprev('slickwprevCurrentSlide');
					var totalslides = $(thisslick).find('.slickwprev-slide').length;
					var calctemp = currentslide + slidepropsobj.slidesToShow;
					//console.log(currentslide);
					//console.log(totalslides);
					//console.log('calctemp:'+calctemp);
					if(calctemp>=totalslides){
						//console.log('loadmore');
						//get load more button and send to function
						var thebutton = $(thisslick).next('.wprevpro_load_more_div').find('.wprevpro_load_more_btn');
						//turn off transition CSS in case we are fading it
						if(slidepropsobj.speed==0){
							//alert('here');
							$(thisslick).find(".slickwprev-active").css("transition-duration", "0s");
						}
						if(okaytoloadnextslickslide==true){
							okaytoloadnextslickslide = false;
							loadmorerevs(thebutton,thisslick,'lastslide');
						}

					}
				});
			}
			//before we switch slides close the read more
			$(thisslick).on('beforeChange', function(slickwprev) {
				//check to see if any are visible
				$(thisslick).find('.wprs_rd_less:visible').trigger('click');
			});
			//fix the aria-hidden tab index error for screen readers. Add -1 tabindex to all a on hidden reviews
			$(thisslick).on('afterChange', function(slickwprev) {
				$(thisslick).find('div[aria-hidden="true"]').find('a').attr("tabindex","-1");
			});

		};
		
		// our multi slide adaptive height function passing slider object
		function wppromultiSlideAdaptiveHeight(slider) {
		  // set our vars
		  let activeSlides = [];
		  let tallestSlide = 0;
		  // very short delay in order for us get the correct active slides
		  setTimeout(function() {
			// loop through each active slide for our current slider
			$('.slickwprev-track .slickwprev-active', slider).each(function(item) {
			// add current active slide height to our active slides array
			activeSlides[item] = $(this).outerHeight();
			});
			// for each of the active slides heights
			activeSlides.forEach(function(item) {
			  // if current active slide height is greater than tallest slide height
			  if (item > tallestSlide) {
				// override tallest slide height to current active slide height
				tallestSlide = item + 15;
			  }
			});
			// set the current slider slick list height to current active tallest slide height
			//$('.slickwprev-list', slider).height(tallestSlide);
			$('.slickwprev-list', slider).animate({height: tallestSlide}, 500);
		  }, 15);

		}
		
		//going to search for media added to reviews and load lity if we find them.
		setTimeout(function(){ mediareviewpopup(); }, 500);
		function mediareviewpopup(){
			//search for masonry elements
			//alert("here!");
			//var mediadiv = $(".wprevprodiv").find(".wprev_media_div");
			var mediadiv = $(".wprev_media_div");
			if(mediadiv.length){
				//load js and css files.
				//console.log(wprevpublicjs_script_vars);
				$('<link/>', {
				   rel: 'stylesheet',
				   type: 'text/css',
				   href: wprevpublicjs_script_vars.wprevpluginsurl+"/public/css/lity.min.css"
				}).appendTo('head');
				$.getScript(wprevpublicjs_script_vars.wprevpluginsurl+"/public/js/lity.min.js", function() {
					//script is loaded and ran on document root.
				});
			}
		}

		//simple tooltip for added elements and mobile devices
		$(".wprevpro").on('mouseenter touchstart', '.wprevtooltip', function(e) {
			var titleText = $(this).attr('data-wprevtooltip');
			$(this).data('tiptext', titleText).removeAttr('data-wprevtooltip');
			$('<p class="wprevpro_tooltip"></p>').text(titleText).appendTo('body').css('top', (e.pageY - 15) + 'px').css('left', (e.pageX + 10) + 'px').fadeIn('slow');
		});
		$(".wprevpro").on('mouseleave touchend', '.wprevtooltip', function(e) {
			$(this).attr('data-wprevtooltip', $(this).data('tiptext'));
			$('.wprevpro_tooltip').remove();
		});
		$(".wprevpro").on('mousemove', '.wprevtooltip', function(e) {
			$('.wprevpro_tooltip').css('top', (e.pageY - 15) + 'px').css('left', (e.pageX + 10) + 'px');
		});
		
		
		
		//added for endless scroll option for grid, only works for one grid on page
		checkforendless();
		var loadingrevs = false;
		function checkforendless(){
			if($( ".wprevpro_load_more_btn[data-endless='yes']" ).first().length){
				console.log('found endless');
				$( window ).scroll(function(e) {
					console.log('scroll');
					var ldbtn = $( ".wprevpro_load_more_btn[data-endless='yes']" ).first();
					//find last row of reviews.
					var prediv = ldbtn.parent().prev();
					//find out if the button is in the viewport
					console.log(prediv);
					var elementTop = prediv.offset().top;
					var elementBottom = elementTop + prediv.outerHeight();
					var viewportTop = $(window).scrollTop();
					var viewportBottom = viewportTop + $(window).height();
					console.log(elementTop);
					console.log(elementBottom);
					console.log(viewportTop);
					console.log(viewportBottom);
					//click the button if scrolled down.
					if(viewportBottom>(elementBottom+50) && loadingrevs==false){
						console.log('click');
						loadmorerevs(ldbtn,'');
						loadingrevs=true;
						setTimeout(function(){ loadingrevs = false }, 1000);
					}
				});
			}
		}
	

	

	});

})( jQuery );



//masonry
var MiniMasonry = function(conf) {
    this._sizes = [];
    this._columns = [];
    this._container = null;
    this._count = null;
    this._width = 0;
    this._gutter = 0;

    this._resizeTimeout = null,

    this.conf = {
        baseWidth: 255,
        gutter: 10,
        container: null,
        minify: true,
        ultimateGutter: 5
    };

    this.init(conf);

    return this;
}

MiniMasonry.prototype.init = function(conf) {
    for (var i in this.conf) {
        if (conf[i] != undefined) {
            this.conf[i] = conf[i];
        }
    }
    this._container = document.querySelector(this.conf.container);
    if (!this._container) {
        throw new Error('Container not found or missing');
    }
    window.addEventListener("resize", this.resizeThrottler.bind(this));

    this.layout();
};

MiniMasonry.prototype.reset = function() {
    this._sizes   = [];
    this._columns = [];
    this._count   = null;
    this._width   = this._container.clientWidth;
    var minWidth  = this.conf.baseWidth;
    if (this._width < minWidth) {
        this._width = minWidth;
        this._container.style.minWidth = minWidth + 'px';
    }
    this._gutter = this.conf.gutter;
    if (this.getCount() == 1) {
        // Set ultimate gutter when only one column is displayed
        this._gutter = this.conf.ultimateGutter;
        // As gutters are reduced, to column may fit, forcing to 1
        this._count = 1;
    }

    if (this._width < (this.conf.baseWidth + (2 * this._gutter))) {
        // Remove gutter when screen is to low
        this._gutter = 0;
    }
};

MiniMasonry.prototype.getCount = function() {
    return Math.floor((this._width - this._gutter) / (this.conf.baseWidth + this._gutter));
}

MiniMasonry.prototype.layout =  function() {
    if (!this._container) {
        console.error('Container not found');
        return;
    }
    this.reset();
	
	//console.log(this.conf.baseWidth);

    //Computing columns width
    if (this._count == null) {
        this._count = this.getCount();
    }
    var width   = Math.round(((this._width - this._gutter) / this._count) - this._gutter);

    for (var i = 0; i < this._count; i++) {
        this._columns[i] = 0;
    }

    //Saving children real heights
    var children = this._container.querySelectorAll(this.conf.container + ' > *');
    for (var k = 0;k< children.length; k++) {
        // Set width before retrieving element height if content is proportional
        children[k].style.width = width + 'px';
        this._sizes[k] = children[k].clientHeight;
    }

    var initialLeft = this._gutter;
    if (this._count > this._sizes.length) {
        //If more columns than children
        initialLeft = (((this._width - (this._sizes.length * width)) - this._gutter) / 2) - this._gutter;
    }

    //Computing position of children
    for (var index = 0;index < children.length; index++) {
        var shortest = this.conf.minify ? this.getShortest() : this.getNextColumn(index);

        var x = initialLeft + ((width + this._gutter) * (shortest));
        var y = this._columns[shortest];


        children[index].style.transform = 'translate3d(' + Math.round(x) + 'px,' + Math.round(y) + 'px,0)';

        this._columns[shortest]  += this._sizes[index] + (this._count > 1 ? this._gutter : this.conf.ultimateGutter);//margin-bottom
    }

    this._container.style.height = this._columns[this.getLongest()] + 'px';
};

MiniMasonry.prototype.getNextColumn = function(index) {
    return index % this._columns.length;
};

MiniMasonry.prototype.getShortest = function() {
    var shortest = 0;
    for (var i = 0; i < this._count; i++) {
        if (this._columns[i] < this._columns[shortest]) {
            shortest = i;
        }
    }

    return shortest;
};

MiniMasonry.prototype.getLongest = function() {
    var longest = 0;
    for (var i = 0; i < this._count; i++) {
        if (this._columns[i] > this._columns[longest]) {
            longest = i;
        }
    }

    return longest;
};

MiniMasonry.prototype.resizeThrottler = function() {
    // ignore resize events as long as an actualResizeHandler execution is in the queue
    if ( !this._resizeTimeout ) {

        this._resizeTimeout = setTimeout(function() {
            this._resizeTimeout = null;
            //IOS Safari throw random resize event on scroll, call layout only if size has changed
            if (this._container.clientWidth != this._width) {
                this.layout();
            }
           // The actualResizeHandler will execute at a rate of 30fps
        }.bind(this), 33);
    }
}

//for turning multi select in to buttons
class CustomSelect {
  constructor(originalSelect) {
    this.originalSelect = originalSelect;
    this.customSelect = document.createElement("div");
    this.customSelect.classList.add("wprev_select");

    this.originalSelect.querySelectorAll("option").forEach((optionElement) => {
      const itemElement = document.createElement("div");

      itemElement.classList.add("wprev_select__item");
      itemElement.textContent = optionElement.textContent;
      this.customSelect.appendChild(itemElement);

      if (optionElement.selected) {
        this._select(itemElement);
      }

      itemElement.addEventListener("click", () => {
        if (
          this.originalSelect.multiple &&
          itemElement.classList.contains("wprev_select__item--selected")
        ) {
          this._deselect(itemElement);
        } else {
          this._select(itemElement);
        }
      });
    });

    this.originalSelect.insertAdjacentElement("afterend", this.customSelect);
    this.originalSelect.style.display = "none";
  }

  _select(itemElement) {
    const index = Array.from(this.customSelect.children).indexOf(itemElement);
    if (!this.originalSelect.multiple) {
      this.customSelect.querySelectorAll(".wprev_select__item").forEach((el) => {
        el.classList.remove("wprev_select__item--selected");
      });
    }
    this.originalSelect.querySelectorAll("option")[index].selected = true;
    itemElement.classList.add("wprev_select__item--selected");
  }

  _deselect(itemElement) {
    const index = Array.from(this.customSelect.children).indexOf(itemElement);
    this.originalSelect.querySelectorAll("option")[index].selected = false;
    itemElement.classList.remove("wprev_select__item--selected");
  }
}

document.querySelectorAll(".wprevpro_multiselect").forEach((selectElement) => {
  new CustomSelect(selectElement);
});
