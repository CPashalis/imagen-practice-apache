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
		 
		//page select box
		$("#wprevpro_source_page").select2({
			width: '50%',
			placeholder: adminjs_script_vars.Location_Filter
		});
		//type select box
		$("#wprevpro_site_type").select2({
			width: '50%',
			placeholder: adminjs_script_vars.Type_Filter
		});

		 
		 
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
		if(checkedittemplate=="edit"){
			jQuery("#wprevpro_new_template").show("slow");
		} else {
			jQuery("#wprevpro_new_template").hide();
		}
		
		$( "#wprevpro_addnewtemplate" ).on( "click",function() {
		  jQuery("#wprevpro_new_template").show("slow");
		});	
		$( "#wprevpro_addnewtemplate_cancel" ).on("click",function() {
		  jQuery("#wprevpro_new_template").hide("slow");
		  //reload page without taction and tid
		  setTimeout(function(){ 
			window.location.href = "?page=wp_pro-notifications"; 
		  }, 500);
		  
		});	
		
		

		var timestoloop = 0;
		var numdetectedsuccess = 0;
		var loopnum = 0;
		var timesdied = 0;
		var sentlastrevid = 0;
		
		//for adding default avater url to input rlimg
		$( "#lang_detect_btn" ).on("click",function() {
			var tempapi = $(this).prev( "#api_key" ).val();
			console.log(tempapi);
			$('#lang_progress_div').html('');
			$('#lang_progress_div2').html('');
			$('#lang_progress_div3').html('');
			$('#lang_progress_div_error').html('');
			$('.loadingspinner').show();
			//open pop-up
			var url = "#TB_inline?width=auto&height=auto&inlineId=tb_content_popup";
			tb_show("Running Language Detector...", url);
			$( "#TB_window" ).css({ "width":"600px","margin-left": "-250px" });
			$( "#TB_ajaxContent" ).css({ "width":"auto","height":"auto" });
			$( "#TB_window" ).focus();
			
			//reset
			timestoloop = 0;
			numdetectedsuccess = 0;
			loopnum = 0;
			timesdied = 0;
			sentlastrevid = 0;
			
			runlangdetector(tempapi,'0');

		});
		
		function runlangdetector(tempapi,pnum){
			//make an ajax call to run detector
			var data = {
				action		: 'wppro_run_language_detect',
				apikey	:	tempapi,
				dbpage: pnum,
				jslastrevid : sentlastrevid,
				_ajax_nonce		: adminjs_script_vars.wpfb_nonce,
			};
			//console.log(data);

			var jqxhr = jQuery.post(ajaxurl, data, function(response) {
				//console.log(response);
				if (!$.trim(response)){
					if(timesdied<3){
						timesdied = timesdied +1;
						setTimeout(runlangdetector(tempapi,pnum), 2000);
					} else {
						alert(adminjs_script_vars.msg1);
						timesdied = 0;
					}
				} else {
					timesdied = 0;
					var formobject = JSON.parse(response);
					var temptext = '';
					var initialnumtotrans = '';
					var detectobject ='';
					if(typeof formobject =='object'){
					  // It is JSON, safe to continue here
					  console.log(formobject);
					  //send back next revidtofind
					  sentlastrevid = formobject.lastrevid;
					  
					  if(Number(formobject.totalcount)>0){
						  if(loopnum==0){
						  initialnumtotrans = Number(formobject.totalcount);
						  $('#lang_progress_div').append("<br>"+adminjs_script_vars.msg2+" <b>"+initialnumtotrans+"</b> "+adminjs_script_vars.msg3+".");
						  }
						  //$('#lang_progress_div').append("<br>Results....");
						  //loop results and show any errors
						  detectobject = formobject.detect;
						  $.each( detectobject, function( key, value ) {
							  if(value.decoderresult){
								  if(value.decoderresult.code && value.decoderresult.code==200){
									numdetectedsuccess = numdetectedsuccess + 1;
								  } else {
									  if(value.decoderresult.error.message){
										$('#lang_progress_div_error').append("<br><b>"+adminjs_script_vars.Error+": "+value.decoderresult.error.message+"</b>");
									  }							
									$('#lang_progress_div_error').append("<br>"+adminjs_script_vars.msg4+" <i>"+value.strdetect+"...</i>"); 
								  }
							  }
							});
						  //update on progress
						  $('#lang_progress_div2').html("<br>"+adminjs_script_vars.Updated+" "+numdetectedsuccess+" "+adminjs_script_vars.reviews+".");
						  						  
						  //if the initialnumtotrans is greater than 10 we need to loop. Find total number of times to loop as global.
						  if(initialnumtotrans>1 && loopnum==0){
							  //we need to loop
							  timestoloop = initialnumtotrans/1;
							  timestoloop =Math.ceil(timestoloop);
							  console.log('loop:'+timestoloop);
						  }
						  //loop here if timestoloop is greater than 0
						  if(timestoloop>=loopnum && timestoloop > 0){
							  loopnum = loopnum + 1;
							  //$('#lang_progress_div2').append(" - "+adminjs_script_vars.msg5);
							  setTimeout(runlangdetector(tempapi,loopnum), 1000);
						  } else {
							  $('.loadingspinner').hide();
							  $('#lang_progress_div2').append("<br>"+adminjs_script_vars.msg6);
						  }
						  

					  } else {
						  $('.loadingspinner').hide();
						  $('#lang_progress_div3').append("<br>"+adminjs_script_vars.msg7);

					  }
					} else {
						$('.loadingspinner').hide();
						$( "#lang_progress_div3" ).html(adminjs_script_vars.msg8+" " +response);
					}
				}
			});
			
		}
		
		

		
	 });

})( jQuery );
