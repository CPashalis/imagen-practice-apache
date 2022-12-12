<?php
class Template_Functions {
	
	//============================================================
	//functions for creating and setting up the template display, each template will call these functions
	//--------------------------
	public function wprevpro_get_media($review,$template_misc_array){	//get media and add to template
		$media='';
		//default this to turned on.
		if(!isset($template_misc_array['showmedia'])){
			$template_misc_array['showmedia']='yes';
		}
		if($template_misc_array['showmedia']=='yes'){
			$mediaurls = stripslashes($review->mediaurlsarrayjson);
			$mediathumburls = stripslashes($review->mediathumburlsarrayjson);
			$mediathumburlsarray = json_decode($mediathumburls, true);
			
			if(isset($mediaurls) && $mediaurls!=''){
				//turn back in to array then loop
				$mediaurlsarray = json_decode($mediaurls, true);
				if(is_array($mediaurlsarray)){
					$mediaurlsarray = array_filter($mediaurlsarray);
					if(count($mediaurlsarray)>0){
					$media='<div class="wprev_media_div '.count($mediaurlsarray).'">';
					$mediaurlsarray = array_values($mediaurlsarray);
					$n=0;
					foreach ($mediaurlsarray as &$urlvalue) {
						if($urlvalue!=""){
							$urlvalue = esc_url($urlvalue);
							//use thumbnail if we have it
							if(isset($mediathumburlsarray[$n]) && $mediathumburlsarray[$n]!=''){
								$thumburl = $mediathumburlsarray[$n];
							} else {
								$thumburl = $urlvalue;
							}
							$thumburl = esc_url($thumburl);
							$media= $media . '<a class="wprev_media_img_a" href="'.$urlvalue.'" data-lity><img src="'.$thumburl.'" class="wprev_media_img"  alt="media thumbnail '.$n.'"></a>';
						}
						$n++;
					}
					$media= $media . '</div>';
					}
				}
			}
		}
		return $media;
	}
	
	public function wprevpro_get_starhtml($review,$template_misc_array,$currentform,$starfile,$forcestars='no') {
				//starhtlm
		$starhtml='';
		$starhtml2='';
		$middlehtml='';
		$imgs_url = esc_url( plugins_url( 'imgs/', __FILE__ ) );
		
		if(!isset($review->hidestars)){
			$review->hidestars="";
		}
		
		if($forcestars=='yes' && $review->rating<1){
			//change 
			if($review->recommendation_type=='positive'){
				$review->rating = 5;
			} else if($review->recommendation_type=='negative'){
				$review->rating = 2;
			}
		}
		
		//only need this if rating greater than 0
		if($review->rating>0 && $review->hidestars!='yes'){
			
			if(!isset($template_misc_array['icon_over_yelp'])){
				$template_misc_array['icon_over_yelp']='';
			}
			if(!isset($template_misc_array['icon_over_trip'])){
				$template_misc_array['icon_over_trip']='';
			}
			
			//if trip or yelp display star images instead of fonts
			if($review->type=="Yelp" && $template_misc_array['icon_over_yelp']!="yes"){
				$starhtml='<img src="'.$imgs_url."".$starfile.'" alt="'.$review->rating.' star rating" class="wprevpro_t'.$currentform[0]->style.'_star_img_file">';
				if(isset($template_misc_array['starlocation'])){
					if($template_misc_array['starlocation'] == '2'){
						$starhtml2='<img src="'.$imgs_url."".$starfile.'" alt="'.$review->rating.' star rating" class="wprevpro_t'.$currentform[0]->style.'_star_img_file_loc2">';
						$starhtml='';
					}
				}
			} else if($review->type=="Manual" && $review->from_name=="yelp" && $template_misc_array['icon_over_yelp']!="yes"){
				$starhtml='<img src="'.$imgs_url."".$starfile.'" alt="'.$review->rating.' star rating" class="wprevpro_t'.$currentform[0]->style.'_star_img_file">';
				if(isset($template_misc_array['starlocation'])){
					if($template_misc_array['starlocation'] == '2'){
						$starhtml2='<img src="'.$imgs_url."".$starfile.'" alt="'.$review->rating.' star rating" class="wprevpro_t'.$currentform[0]->style.'_star_img_file_loc2">';
						$starhtml='';
					}
				}
			} else if($review->type=="TripAdvisor" && $template_misc_array['icon_over_trip']!="yes"){
				$starhtml='<img src="'.$imgs_url."".$starfile.'" alt="'.$review->rating.' star rating" class="wprevpro_t'.$currentform[0]->style.'_star_img_file">';
				if(isset($template_misc_array['starlocation'])){
					if($template_misc_array['starlocation'] == '2'){
						$starhtml2='<img src="'.$imgs_url."".$starfile.'" alt="'.$review->rating.' star rating" class="wprevpro_t'.$currentform[0]->style.'_star_img_file_loc2">';
						$starhtml='';
					}
				}
			} else if($review->type=="Manual" && $review->from_name=="tripadvisor" && $template_misc_array['icon_over_trip']!="yes"){
				$starhtml='<img src="'.$imgs_url."".$starfile.'" alt="'.$review->rating.' star rating" class="wprevpro_t'.$currentform[0]->style.'_star_img_file">';
				if(isset($template_misc_array['starlocation'])){
					if($template_misc_array['starlocation'] == '2'){
						$starhtml2='<img src="'.$imgs_url."".$starfile.'" alt="'.$review->rating.' star rating" class="wprevpro_t'.$currentform[0]->style.'_star_img_file_loc2">';
						$starhtml='';
					}
				}
			} else {
				if(!isset($template_misc_array['stariconfull'])){
					$template_misc_array['stariconfull']='wprsp-star';
					$template_misc_array['stariconempty']='wprsp-star-o';
				}
				if(isset($template_misc_array['stariconfull'])){
					$starhtmlstart ='<span class="starloc1 wprevpro_star_imgs wprevpro_star_imgsloc1">';
					$fullclass = esc_html($template_misc_array['stariconfull']);
					$emptyclass = esc_html($template_misc_array['stariconempty']);
					$userrating = intval($review->rating);
					if($userrating>0){
						$loopleft = 5 - $userrating;
						//loop to build based on rating
						for ($xstar = 1; $xstar <= $userrating; $xstar++) {
							$middlehtml = $middlehtml.'<span class="svgicons svg-'.$fullclass.'"></span>';
						}
						if($review->rating==1.5||$review->rating==2.5||$review->rating==3.5||$review->rating==4.5){
							//add another half only if using star, svgicons svg-wprsp-star
							if($fullclass=='wprsp-star'){
							$middlehtml = $middlehtml.'<span class="svgicons svg-wprsp-star-half"></span>';
							$loopleft--;
							}
						}
						if($loopleft>0){
							for ($ystar = 0; $ystar < $loopleft; $ystar++) {
								$middlehtml = $middlehtml.'<span class="svgicons svg-'.$emptyclass.'"></span>';
							}
						}
					}
					$starhtml=$starhtmlstart.$middlehtml.'</span>';
				}
						
				if(isset($template_misc_array['starlocation'])){
					if($template_misc_array['starlocation'] == '2'){
						$starhtml2='<span class="starloc2 wprevpro_star_imgs wprevpro_star_imgsloc2">'.$middlehtml.'</span>';
						$starhtml='';
					}
				}
			}
		} else if($review->recommendation_type=='positive' && $review->type=="Facebook"){
			$starfile = 'positive-min.png';
			$altimgtag = 'positive review';
			$starhtml = '<img src="'.$imgs_url.$starfile.'" alt="'.$altimgtag.'" class="wprevpro_t1_rec_img_file">&nbsp;';
		} else if($review->recommendation_type=='negative' && $review->type=="Facebook"){
			$starfile = 'negative-min.png';
			$altimgtag = 'negative review';
			$starhtml = '<img src="'.$imgs_url.$starfile.'" alt="'.$altimgtag.'" class="wprevpro_t1_rec_img_file">&nbsp;';
		}
		
		$starhtmlarray[0]=$starhtml;
		$starhtmlarray[1]=$starhtml2;
		return $starhtmlarray;
	}	
		
		
	public function wprevpro_get_reviewername($review,$template_misc_array) {
		$tempreviewername = stripslashes(strip_tags($review->reviewer_name));
		$words = explode(" ", $tempreviewername);
		$firstname = $words[0];
		if(isset($template_misc_array['firstnameformat'])){
			if($template_misc_array['firstnameformat']=="hide"){
				$firstname = '';
			} else if($template_misc_array['firstnameformat']=="initial"){
				$tempfirst = $words[0];
				$firstname = mb_substr($tempfirst,0,1).'.';
			}
		}
		$tempreviewername = $firstname;
		if(isset($template_misc_array['lastnameformat'])){
			if($template_misc_array['lastnameformat']=="hide"){
				$tempreviewername=$firstname;
			} else if($template_misc_array['lastnameformat']=="initial"){
				$tempfirst = $firstname;
				if(isset($words[1])){
					$templast = $words[1];
					$templast =mb_substr($templast,0,1);
					$tempreviewername = $tempfirst.' '.$templast.'.';
				} else {
					$tempreviewername = $tempfirst;
				}
			} else {
				if(isset($words[1])){
				$templast = $words[1];
				} else {
					$templast = '';
				}
				$tempreviewername = $firstname. ' '.$templast;
			}
		}
		if(!isset($template_misc_array['firstnameformat'])){
			$template_misc_array['firstnameformat'] = 'show';
		}
		if(!isset($template_misc_array['lastnameformat'])){
			$template_misc_array['lastnameformat'] = 'show';
		}
		if($template_misc_array['firstnameformat']=='show' && $template_misc_array['lastnameformat']=='show'){
			$tempreviewername = stripslashes(strip_tags($review->reviewer_name));
		}

		//add twitter handle
		if($review->type=="Twitter"){
			$metaarray = json_decode($review->meta_data,true);
			if(isset($metaarray['screenname'])){
			$screename = $metaarray['screenname'];
			$tempreviewername = $tempreviewername."<div class='wppro_twscrname'><a rel='nofollow noreferrer' target='_blank' href='https://twitter.com/".$screename."'>@".$screename."</a></div>";
			}
			
		}
		
			return $tempreviewername;
	}
	
	public function wprevpro_get_profilelink($review,$currentform,$userpic,$tempreviewername,$template_misc_array,$burl) {
		$imgs_url = esc_url( plugins_url( 'imgs/', __FILE__ ) );
		$review->reviewer_name = esc_html($review->reviewer_name);
		$tempprofileurl='';
		if(	$currentform[0]->add_profile_link=="yes" || $currentform[0]->add_profile_link=="fol"){
			if($review->type=="Yelp"){
				if($review->from_url_review!=''){
					$tempprofileurl = urldecode($review->from_url_review);
				} else {
					$tempprofileurl = 'https://www.yelp.com/user_details?userid='.$review->reviewer_id;
				}
			} else if($review->type=="TripAdvisor"){
				//if name has a space then default to main trip page otherwise send to profile
				if($review->from_url_review!=''){
					$tempprofileurl = $review->from_url_review;
				} else {
					if ( preg_match('/\s/',$review->reviewer_name) ){
						$tempprofileurl = $burl;
					} else {
						$tempprofileurl = 'https://www.tripadvisor.com/members/'.urlencode($review->reviewer_name);
					}
				}
			} else if($review->type=="Google"){
				if($review->from_url_review!=''){
					$tempprofileurl = $review->from_url_review;
				} else {
				$tempprofileurl = 'https://www.google.com/maps/contrib/'.urlencode($review->reviewer_id);
				}
			} else if($review->type=="Facebook"){
				$tempprofileurl = 'https://www.facebook.com/search/top/?q='.urlencode($review->reviewer_name);
			} else if($review->type=="Submitted"){
				$tempprofileurl = $review->company_url;
			} else if($review->type=="Airbnb"){
				$tempprofileurl = 'https://www.airbnb.com/users/show/'.$review->reviewer_id;
			} else if($review->type=="Freemius"){
				$tempprofileurl = '';
			} else {
				if($review->from_url_review!=''){
					$tempprofileurl = urldecode($review->from_url_review);
				} else if($review->from_url!='') {
					$tempprofileurl = urldecode($review->from_url);
				}
			}
			if($tempprofileurl!=""){
				if($currentform[0]->add_profile_link=="fol"){
					$profilelink['start'] = '<a href="'.$tempprofileurl.'" target="_blank">';
				} else {
					$profilelink['start'] = '<a href="'.$tempprofileurl.'" target="_blank" rel="nofollow noreferrer">';
				}
				$profilelink['end'] = '</a>';
			} else {
				$profilelink['start'] = '';
				$profilelink['end'] = '';
			}
		} else {
			$profilelink['start'] = '';
			$profilelink['end'] = '';
		}
		
			
			return $profilelink;
	}
	
	
	public function wprevpro_get_datestring($review, $template_misc_array) {
		
		//hide date 
		if(isset($template_misc_array['showdate']) && $template_misc_array['showdate']=="no"){
			$datestring = '';
		} else {
			if(isset($template_misc_array['dateformat'])){
				if($template_misc_array['dateformat']=="DD/MM/YY"){
					$datestring = date("d/m/y",$review->created_time_stamp);
				} else if($template_misc_array['dateformat']=="DD/MM/YYYY"){
					$datestring = date("d/m/Y",$review->created_time_stamp);
				} else if($template_misc_array['dateformat']=="DD-MM-YYYY"){
					$datestring = date("d-m-Y",$review->created_time_stamp);
				} else if($template_misc_array['dateformat']=="YYYY-MM-DD"){
					$datestring = date("Y-m-d",$review->created_time_stamp);
				} else if($template_misc_array['dateformat']=="d M Y"){
					$datestring = date_i18n("d M Y",$review->created_time_stamp);
				} else if($template_misc_array['dateformat']=="timesince"){
					$timestamp = $review->created_time_stamp;
					$datestring = $this->wprevpro_time_elapsed_string($timestamp, $full = false);
				} else if($template_misc_array['dateformat']=="wpadmin"){
					//get and form wp admin date setting
					$datestring = date_i18n( get_option('date_format'), $review->created_time_stamp );
				} else if($template_misc_array['dateformat']=="hide"){
					//get and form wp admin date setting
					$datestring = '';
				} else {
					$datestring = date("n/d/Y",$review->created_time_stamp);
				}
			} else {
				$datestring = date("n/d/Y",$review->created_time_stamp);
			}
		}
			return $datestring;
	}
	
	public function wprevpro_get_companyhtml($review, $template_misc_array, $template = "t1") {
		$companyhtml = '';
		$titlehtml = '';
		$companyurl = '';
		$companyname = '';
		$companytitle = '';
		$location = '';
		if(isset($template_misc_array['showcdetails'])){
			if($template_misc_array['showcdetails']=="yes"){
				//get companyurl if set
				if(isset($review->company_url)){
							if($review->company_url!=''){
								$companyurl = esc_html($review->company_url);
							}
				}
				//get company name if set
				if(isset($review->company_name)){
							if($review->company_name!=''){
								$companyname = esc_html($review->company_name);
							}
				}
				if(isset($review->company_title)){
							if($review->company_title!=''){
								$companytitle = esc_html($review->company_title).", ";
							}
				}
				if(isset($template_misc_array['showcdetailslink']) && $companyurl!="" && $companyname!=""){
					if($template_misc_array['showcdetailslink']=="yes"){
						$companyname = "<a href='".$companyurl."' target='_blank' rel='nofollow noreferrer'>".esc_html($companyname)."</a>";
					}
					if($template_misc_array['showcdetailslink']=="yesf"){
						$companyname = "<a href='".$companyurl."' target='_blank'>".esc_html($companyname)."</a>";
					}
				}
				if($companyname!=''){
					$companyhtml = '<div class="wprevpro_'.$template.'_SPAN_6 wprevcompany">'.esc_html($companytitle).$companyname.'</div>';
				}
			}
		}
		if(isset($template_misc_array['showlocation'])){
			if($template_misc_array['showlocation']=="yes"){
				
				$location = '<div class="wprevpro_'.$template.'_SPAN_7 wprevlocation">'.esc_html($review->location).'</div>';
			}
		}
			return stripslashes($location.$companyhtml);
	}
	
	
	private function wprevpro_time_language_translate ($timestringphrase,$resnum){
		
		//first replace the number with 10 then replace back at the end
		if($resnum > 1){
			$timestringphrase = str_replace($resnum, '10', $timestringphrase);
		} else {
			$timestringphrase = str_replace($resnum, '1', $timestringphrase);
		}
		
		$us = array("10 seconds ago", "1 minute ago", "10 minutes ago", "1 hour ago", "10 hours ago", "1 day ago", "10 days ago", "1 week ago", "10 weeks ago", "1 month ago", "10 months ago", "1 year ago", "10 years ago", "just now");
		//$bloglang = get_bloginfo('language');
		$bloglang = substr( get_bloginfo ( 'language' ), 0, 2 ); //should be 2 digit code
		
		//echo 'bloglang:'.$bloglang;
		
		if($bloglang=='fr' || $bloglang=='fr-be'|| $bloglang=='fr-FR'){
			$new = array("il y a 10 secondes", "il y a 1 minute", "il y a 10 minutes", "il y a 1 heure", "il y a 10 heures", "il y a 1 jour", "il y a 10 jours", "il y a 1 semaine", "10 il y a quelques semaines", "il y a 1 mois", "il y a 10 mois", "il y a 1 an", "il y a 10 ans", "tout à l'heure");
			$newphrase = str_replace($us, $new, $timestringphrase);
		} else if($bloglang=='nl' || $bloglang=='nl-nl'|| $bloglang=='nl-NL'){
			$new = array("10 seconden geleden", "1 minuut geleden", "10 minuten geleden", "1 uur geleden", "10 uur geleden", "1 dag geleden", "10 dagen geleden", "1 week geleden", "10 weken geleden", "1 maand geleden", "10 maanden geleden", "1 jaar geleden", "10 jaar geleden", "zojuist");
			$newphrase = str_replace($us, $new, $timestringphrase);
		}  else if($bloglang=='sv' || $bloglang=='sv-sv'|| $bloglang=='sv-SE'){
			$new = array("10 sekunder sedan", "1 minut sedan", "10 minuter sedan", "1 timme sedan", "10 timmar sedan", "1 dag sedan", "10 dagar sedan", "1 vecka sedan", "10 veckor sedan", "1 månad sedan", "10 månader sedan", "1 år sedan", "10 år sedan", "just nu");
			$newphrase = str_replace($us, $new, $timestringphrase);
		} else if($bloglang=='it'){
			$new = array("10 secondi fa", "1 minuto fa", "10 minuti fa", "1 ora fa", "10 ore fa", "1 giorno fa", "10 giorni fa", "1 settimana fa", "10 settimane fa", "1 mese fa", "10 mesi fa", "1 anno fa", "10 anni fa", "proprio ora");
			$newphrase = str_replace($us, $new, $timestringphrase);
		} else if($bloglang=='de'){
			$new = array("Vor 10 Sekunden", "Vor 1 Minute", "Vor 10 Minuten", "Vor 1 Stunde", "Vor 10 Stunden", "Vor 1 Tag", "Vor 10 Tagen", "Vor 1 Woche", "10 vor Wochen", "vor 1 Monat", "vor 10 Monaten", "vor 1 Jahr", "vor 10 Jahren", "gerade jetzt");
			$newphrase = str_replace($us, $new, $timestringphrase);
		} else {
			$newphrase = $timestringphrase;
		}
		
		//replace back with correct time values
		if($resnum>1){
			$newphrase = str_replace('10', $resnum, $newphrase);
		} else {
			$newphrase = str_replace('1', $resnum, $newphrase);
		}
		
		
		return $newphrase;

	}
	//----------------------------
	public function wprevpro_time_elapsed_string($datetime, $full = false) {
		//$t=time();
		$time = current_time( 'timestamp' );
		$now = new DateTime('@'.$time);
		$ago = new DateTime('@'.$datetime);
		$diff = $now->diff($ago);

		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;

		$string = array(
			'y' => __('year', 'wp-review-slider-pro'),
			'm' => __('month', 'wp-review-slider-pro'),
			'w' => __('week', 'wp-review-slider-pro'),
			'd' => __('day', 'wp-review-slider-pro'),
			'h' => __('hour', 'wp-review-slider-pro'),
			'i' => __('minute', 'wp-review-slider-pro'),
			's' => __('second', 'wp-review-slider-pro'),
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			} else {
				unset($string[$k]);
			}
		}
		if (!$full) $string = array_slice($string, 0, 1);
		

		//print_r($string);
		
		$timeagostring = $string ? implode(', ', $string) . ' '._x( 'ago', 'Time since review.', 'wp-review-slider-pro' ) : _x( 'just now', 'Time since review.', 'wp-review-slider-pro' );
		
		$resnum = preg_replace("/[^0-9]/", "", $timeagostring);
		//echo "res:".$resnum;
		
		//try to convert if not english admin
		$timeagostring = $this->wprevpro_time_language_translate($timeagostring,$resnum);
		
		return $timeagostring;
	}
	

	//-------------
	public function wprevpro_get_user_pic($review,$width,$height,$currentform) {
		$img_locations_option = json_decode(get_option( 'wprev_img_locations' ),true);
		$pathtofile = $img_locations_option['upload_dir_wprev_cache'];
	
		if(isset($review->userpiclocal) && $review->userpiclocal!=''){
			$userpic = $review->userpiclocal;
		} else {
			$userpic = $review->userpic;
		}

		//image cache settings
		if(	$currentform->cache_settings=="image"){

			$blob = $review->reviewer_name;
			$blob = preg_replace("/[^a-zA-Z]+/", "", $blob);
			$newfilename = $review->created_time_stamp.'_'.strtolower($blob)."_".$review->id;
			
			//jpg check, this could also be a png file or even gif, only worrying about png and jpg
			//high quality version
			$exttype = '.jpg';
			$newfile = $pathtofile . $newfilename.$exttype;
			$newfileurl = esc_url( $img_locations_option['upload_url_wprev_cache'] ). $newfilename.$exttype;
			
			//low quality version
			$newfilelow = $pathtofile . $newfilename.'_60'.$exttype;
			$newfilelowurl = esc_url($img_locations_option['upload_url_wprev_cache']). $newfilename.'_60'.$exttype;

			//--------------------------
			if(file_exists($newfile)){
				$userpic = $newfileurl;
				//change size based on template
				if(	$currentform->style=="1" ||$currentform->style=="5" || $currentform->style=="6" || $currentform->style=="7"){
					if(file_exists($newfilelow)){
						$userpic = $newfilelowurl;
					}
				}
			}
			
			//now checking for png
			$exttype = '.png';
			$newfile = $pathtofile . $newfilename.$exttype;
			$newfileurl = esc_url( $img_locations_option['upload_url_wprev_cache'] ). $newfilename.$exttype;
			
			//low quality version
			$newfilelow = $pathtofile . $newfilename.'_60'.$exttype;
			$newfilelowurl = esc_url($img_locations_option['upload_url_wprev_cache']). $newfilename.'_60'.$exttype;

			//--------------------------
			if(file_exists($newfile)){
				$userpic = $newfileurl;
				//change size based on template
				if(	$currentform->style=="1" ||$currentform->style=="5" || $currentform->style=="6" || $currentform->style=="7"){
					if(file_exists($newfilelow)){
						$userpic = $newfilelowurl;
					}
				}
			}
			
		}
		
		return $userpic;
	}
	//---------------------
	public function wprevpro_get_star_logo_burl($review,$imgs_url,$currentform,$stylenum,$template_misc_array){
		
		$starfile = "stars_".$review->rating."_yellow.png";	//default stars
		$logo = "";
		$burl="";
		$temptypelower = strtolower($review->type);
		//echo "here1";
		
		//fix for pagespeed test. need to set width/height of image for aspect ratio.
		//need to set width based on review type.
		$widthheighticon = 'height=32 width=32';
		if($review->type=="Yelp"){
			$widthheighticon = 'height=32 width=64';
		}
		if($review->type=="Avvo"){
			$widthheighticon = 'height=32 width=91';
		}
		if($review->type=="BBB" || $review->type=="Bookatable"){
			$widthheighticon = 'height=32 width=22';
		}
		//change this for certain types of reviews to fix jetpack cdn
		//======================
		
		
		$hideicon = false;
		if($currentform->facebook_icon=="cho"){
			if(!isset($template_misc_array['choosetypes'])){
				$template_misc_array['choosetypes'] = [];
			}
			//see if this review type is in array
			$arraytypes = $template_misc_array['choosetypes'];
			if (in_array(strtolower($review->type), $arraytypes)){
				//echo "found in array";
				$hideicon = false;
			} else {
				//echo "not found in array";
				$hideicon = true;
			}
		}
		
		if($review->type=="Yelp" && $currentform->facebook_icon!="no"){
			//echo "here2";
			//find business url
			$from_url = $review->from_url;
			if($from_url!=''){
				$burl = urldecode($from_url);
			} else {
				$options = get_option('wprevpro_yelp_settings');
				$burl = $options['yelp_business_url'];
			}
			if($burl==""){
				$burl="https://www.yelp.com";
			}
			$starfile = "yelp_stars_".$review->rating.".png";
			if($currentform->facebook_icon_link=="no"){
				$logo = '<img '.$widthheighticon.' src="'.$imgs_url.'yelp_outline.png" alt="Yelp Logo" class="wprevpro_'.$stylenum.'_site_logo wprevsiteicon ">';
			} else {
			$logo = '<a href="'.$burl.'" target="_blank" rel="nofollow noreferrer" class="wprevpro_'.$stylenum.'_site_logo_a"><img '.$widthheighticon.' src="'.$imgs_url.'yelp_outline.png" alt="Yelp Logo" class="wprevpro_'.$stylenum.'_site_logo wprevsiteicon "></a>';
			}
		} else if($review->type=="Facebook" && $currentform->facebook_icon!="no"){
			//echo "here3";
			$starfile = "stars_".$review->rating."_yellow.png";
			$from_url = $review->from_url;
			$from_url_review = $review->from_url_review;
			if($from_url_review!=''){
				$burl = $from_url_review;
			} else if($review->unique_id!=''){
				$burl = "https://www.facebook.com/".$review->unique_id;
			} else if($from_url!=''){
				$burl = $from_url;
			} else {
				$burl = "https://www.facebook.com/pg/".$review->pageid."/reviews/";
			}
			if($currentform->facebook_icon_link=="no"){
				$logo = '<img '.$widthheighticon.' src="'.$imgs_url.'facebook_small_icon.png" alt="Facebook Logo" class="wprevpro_'.$stylenum.'_site_logo wprevsiteicon ">';
			} else if($currentform->facebook_icon_link=="fol"){
				$logo = '<a href="'.$burl.'" target="_blank" class="wprevpro_'.$stylenum.'_site_logo_a"><img '.$widthheighticon.' src="'.$imgs_url.'facebook_small_icon.png" alt="Facebook Logo" class="wprevpro_'.$stylenum.'_site_logo wprevsiteicon "></a>';
			} else {
				$logo = '<a href="'.$burl.'" target="_blank" rel="nofollow noreferrer" class="wprevpro_'.$stylenum.'_site_logo_a"><img '.$widthheighticon.' src="'.$imgs_url.'facebook_small_icon.png" alt="Facebook Logo" class="wprevpro_'.$stylenum.'_site_logo wprevsiteicon "></a>';
			}
			
		} else if($review->type=="Google" && $currentform->facebook_icon!="no"){
			//echo "here4";
			$from_url = $review->from_url;
			$from_url_review = $review->from_url_review;
			if($from_url_review!=''){
				$burl = $from_url_review;
			} else if($from_url!=''){
				$burl = $from_url;
				//change to https if https
				$burl = str_replace("http://","https://",$burl);
			} else {
				$options = get_option('wpfbr_google_options');
				if(isset($options['google_url'])){
				$burl = $options['google_url'];
				}
			}
			$starfile = "stars_".$review->rating."_yellow.png";
			if($currentform->facebook_icon_link=="no"){
				$logo = '<img '.$widthheighticon.' src="'.$imgs_url.'google_small_icon.png" alt="Google Logo" class="wprevpro_'.$stylenum.'_site_logo wprevsiteicon ">';
			} else if($currentform->facebook_icon_link=="fol"){
				 $logo = '<a href="'.$burl.'" target="_blank" class="wprevpro_'.$stylenum.'_site_logo_a"><img '.$widthheighticon.' src="'.$imgs_url.'google_small_icon.png" alt="Google Logo" class="wprevpro_'.$stylenum.'_site_logo wprevsiteicon "></a>';
			 } else {
				$logo = '<a href="'.$burl.'" target="_blank" rel="nofollow noreferrer" class="wprevpro_'.$stylenum.'_site_logo_a"><img '.$widthheighticon.' src="'.$imgs_url.'google_small_icon.png" alt="Google Logo" class="wprevpro_'.$stylenum.'_site_logo wprevsiteicon "></a>';
			}
		} else if($review->type=="TripAdvisor"){
			//echo "here5";
			//find business url
			if($review->from_url!=''){
				$burl = $review->from_url;
			} else if($review->from_url_review!=''){
				$burl = $review->from_url_review;
			} 
			if($burl==""){
				$burl="https://www.tripadvisor.com";
			}
			$starfile = "tripadvisor_stars_".$review->rating.".png";
			if($currentform->facebook_icon_link=="no"){
				$logo = '<img '.$widthheighticon.' src="'.$imgs_url.'tripadvisor_small_icon.png" alt="TripAdvisor Logo" class="wprevpro_'.$stylenum.'_site_logo wprevsiteicon ">';
			} else if($currentform->facebook_icon_link=="fol"){
				$logo = '<a href="'.$burl.'" target="_blank" class="wprevpro_'.$stylenum.'_site_logo_a"><img '.$widthheighticon.' src="'.$imgs_url.'tripadvisor_small_icon.png" alt="TripAdvisor Logo" class="wprevpro_'.$stylenum.'_site_logo wprevsiteicon "></a>';
			} else {
				$logo = '<a href="'.$burl.'" target="_blank" rel="nofollow noreferrer" class="wprevpro_'.$stylenum.'_site_logo_a"><img '.$widthheighticon.' src="'.$imgs_url.'tripadvisor_small_icon.png" alt="TripAdvisor Logo" class="wprevpro_'.$stylenum.'_site_logo wprevsiteicon "></a>';
			}
			if($currentform->facebook_icon=="no"){
				$logo ='';
			}
		} else  if($review->type=="Manual"){
			//echo "here6";
				if($review->from_name=="google"){
					$starfile = "stars_".$review->rating."_yellow.png";
				} else if($review->from_name=="yelp"){
					$starfile = "yelp_stars_".$review->rating.".png";
				} else if($review->from_name=="tripadvisor"){
					$starfile = "tripadvisor_stars_".$review->rating.".png";
				} else if($review->from_name=="facebook"){
					$starfile = "stars_".$review->rating."_yellow.png";
				} else if($review->from_name=="custom"){
					$starfile = "stars_".$review->rating."_yellow.png";
					$logo ="";
				}
		} else if($currentform->facebook_icon!="no" && $review->type!="Submitted" && $review->type!="WooCommerce"){
			//used for Airbnb and other generic types
			//echo "here4";
			$from_url = $review->from_url;
			//echo $from_url;
			$from_url_review = $review->from_url_review;
			
			if($from_url!=''){
				$burl = urldecode($from_url);
			} else if($from_url_review!=''){
				$burl = $from_url_review;
			} else {
				$options = get_option('wprevpro_'.$temptypelower.'_settings');
				$burl = $options[$temptypelower.'_business_url'];
			}
			$starfile = "stars_".$review->rating."_yellow.png";
			//make sure we have a site icon
			//$tempimagefilename = $imgs_url.str_replace(".","",$temptypelower).'_small_icon.png';
			$tempimagefilename = $imgs_url.$temptypelower.'_small_icon.png';
			
			//=======for testing
			//clearstatcache();
			//============
			//if (file_exists($tempimagefilename)) {
				if($currentform->facebook_icon_link=="no"){
					$logo = '<img '.$widthheighticon.' src="'.$tempimagefilename.'" alt="'.$temptypelower.' logo" class="wprevpro_'.$stylenum.'_site_logo">';
				} else if($currentform->facebook_icon_link=="fol"){
					$logo = '<a href="'.$burl.'" target="_blank" class="wprevpro_'.$stylenum.'_site_logo_a"><img '.$widthheighticon.' src="'.$tempimagefilename.'" alt="'.$temptypelower.' logo" class="wprevpro_'.$stylenum.'_site_logo wprevsiteicon "></a>';
				} else {
					$logo = '<a href="'.$burl.'" target="_blank" rel="nofollow noreferrer" class="wprevpro_'.$stylenum.'_site_logo_a"><img '.$widthheighticon.' src="'.$tempimagefilename.'" alt="'.$temptypelower.' logo" class="wprevpro_'.$stylenum.'_site_logo wprevsiteicon "></a>';
				}
			//}
		}
		
		//manual icon fix, if you submit a review that came from google and you want to display the icon
		if(($review->type=="Manual" || $review->type=="Submitted") && $currentform->facebook_icon!="no"){
			$burl = $review->from_url;
			$tempfromnamelower = strtolower($review->from_name);
			if($currentform->facebook_icon_link=="no"){
				if($review->from_name=="custom"){
					$logo = '<img '.$widthheighticon.' src="'.$review->from_logo.'" alt="Logo" class="wprevpro_'.$stylenum.'_site_logo">';
				} else {
					if($review->from_name!='' && $review->from_name!='manual' && $review->from_name!='none'){
						$logo = '<img '.$widthheighticon.' src="'.$imgs_url.$tempfromnamelower.'_small_icon.png" alt="'.$tempfromnamelower.' logo" class="wprevpro_'.$stylenum.'_site_logo wprevsiteicon ">';
					} else {
						$logo ='';
					}
				}
			} else {
				$temprel = 'rel="nofollow noreferrer"';
				if($currentform->facebook_icon_link=="fol"){
				$temprel = '';
				}
				if($review->from_name=="custom"){
					$logo = '<a href="'.$burl.'" target="_blank" '.$temprel.' class="wprevpro_'.$stylenum.'_site_logo_a"><img '.$widthheighticon.' src="'.$review->from_logo.'" alt="Logo" class="wprevpro_'.$stylenum.'_site_logo wprevsiteicon "></a>';
				} else {
					if($review->from_name!=''&& $review->from_name!='manual' && $review->from_name!='none'){
					$logo = '<a href="'.$burl.'" target="_blank" '.$temprel.' class="wprevpro_'.$stylenum.'_site_logo_a"><img '.$widthheighticon.' src="'.$imgs_url.$tempfromnamelower.'_small_icon.png" alt="'.$tempfromnamelower.' logo" class="wprevpro_'.$stylenum.'_site_logo wprevsiteicon "></a>';
					} else {
						$logo ='';
					}
				}
			}
		}
		
		//freemius fix since we don't have a URL to link to.
		if($review->type=="Freemius" ){
			$tempimagefilename = $imgs_url.$temptypelower.'_small_icon.png';
			$logo = '<img '.$widthheighticon.' src="'.$tempimagefilename.'" alt="'.$temptypelower.' logo" class="wprevpro_'.$stylenum.'_site_logo wprevsiteicon ">';
		}
		
		$burl = esc_url($burl);
		//echo "here8";
		//echo $logo;
		if($hideicon==true || $currentform->facebook_icon=="no"){
			$logo='';
		}
		$result=array("starfile"=>"$starfile","logo"=>"$logo","burl"=>"$burl");

		return $result;
	}
	//--------$this->closetags($html);
	public function closetags($html) {
		preg_match_all('#<(?!meta|img|br|hr|input\b)\b([a-z]+)(?: .*)?(?<![/|/ ])>#iU', $html, $result);
		$openedtags = $result[1];
		preg_match_all('#</([a-z]+)>#iU', $html, $result);
		$closedtags = $result[1];
		$len_opened = count($openedtags);
		if (count($closedtags) == $len_opened) {
			return $html;
		}
		$openedtags = array_reverse($openedtags);
		for ($i=0; $i < $len_opened; $i++) {
			if (!in_array($openedtags[$i], $closedtags)) {
				$html .= '</'.$openedtags[$i].'>';
			} else {
				unset($closedtags[array_search($openedtags[$i], $closedtags)]);
			}
		}
		return $html;
	} 
	public function wprevpro_get_reviewtext($review,$currentform,$length_type="words"){
		
		$reviewtext = "";
		if($review->review_text !=""){
			//$reviewtext = esc_html($review->review_text); //for escaping html
			$reviewtext =$review->review_text;

			$reviewtext = stripslashes(stripslashes($reviewtext));
			//if(	$currentform->read_more=="yes"){
			//	$reviewtext = strip_tags($reviewtext);	//strip out html if we are using read more
			//}
			
			$reviewtext = str_replace("&nbsp;"," ",$reviewtext); 
			$reviewtext = str_replace("\xc2\xa0",' ',$reviewtext);
		}
		
		
		//if read more is turned on then divide then add read more span links
		if(	$currentform->read_more=="yes"){
			$readmorenum = intval($currentform->read_more_num);
			$readmoretext = $currentform->read_more_text;
			if($readmoretext==''){
				$readmoretext = 'read more';
			}
			if(isset($currentform->read_less_text)){
				$readlesstext = $currentform->read_less_text;
				if($readlesstext==''){
					$readlesstext = 'read less';
				}
			} else {
				$readlesstext = 'read less';
			}

			if($length_type=="words" || $length_type==""){
				$countwords = substr_count($reviewtext, ' ');
				if($countwords>$readmorenum){
					//split in to array
					$pieces = explode(" ", $reviewtext);
					//slice the array in to two
					$part1 = array_slice($pieces, 0, $readmorenum);
					$part1 = implode(" ",$part1);
					//fix any open tags, speed this up by searching for < first.
					if (!is_null(strpos($part1,'<'))){	
						$part1 = $this->closetags($part1);
					}
					//$part2 = array_slice($pieces, $readmorenum);
					$part2=$reviewtext;
					$reviewtext = "<span class='wprs_rd_more_1'>".$part1."...</span> <span class='wprs_rd_more'>$readmoretext</span><span class='wprs_rd_more_text' style='display:none;'>".$part2."</span> <span class='wprs_rd_less' style='display:none;'>$readlesstext</span>";
				}
			} else if($length_type=="char" &&  strlen($reviewtext)>$readmorenum){
				if (extension_loaded('mbstring')) {
					$part1=mb_substr($reviewtext,0,$readmorenum);	//use mb_substr for multibyte character like japanese
				} else {
					$part1=substr($reviewtext,0,$readmorenum);
				}
				//fix any open tags
					if (!is_null(strpos($part1,'<'))){	
						$part1 = $this->closetags($part1);
					}
				//$part2=substr($reviewtext,$readmorenum);
				$part2=$reviewtext;
				$reviewtext = "<span class='wprs_rd_more_1'>".$part1."...</span> <span class='wprs_rd_more'>$readmoretext</span><span class='wprs_rd_more_text' style='display:none;'>".$part2."</span> <span class='wprs_rd_less' style='display:none;'>$readlesstext</span>";
			}
		}
		
		//add line </br> and trim all hidden line breaks from text
		//try remove double line breaks if same height setting
		if($currentform->review_same_height=='cur' || $currentform->review_same_height=='nod'){
			$reviewtext = preg_replace("/[\r\n]+/", "<br>", $reviewtext);
			//also check for <br> or </br>
			$reviewtext = str_replace("<br><br>", "<br>", $reviewtext);
			$reviewtext = str_replace("</br></br>", "</br>", $reviewtext);
		}
		if($currentform->review_same_height=='yea' || $currentform->review_same_height=='noa'){
			$reviewtext = preg_replace("/[\r\n]+/", "", $reviewtext);
			//$reviewtext=preg_replace("/[^A-Za-z ]/","",$reviewtext);
			//also check for <br> or </br>
			$reviewtext = str_replace("<br><br>", " ", $reviewtext);
			$reviewtext = str_replace("</br></br>", " ", $reviewtext);
			$reviewtext = str_replace("<br>", " ", $reviewtext);
			$reviewtext = str_replace("</br>", " ", $reviewtext);
		}
		
		$reviewtext = nl2br($reviewtext,false);
		$reviewtext = trim($reviewtext);
		
		//if this is twitter then add hashtag and @ links, also add div to showcase likes, retweets and replies
		$likediv = '';
		if($review->type=="Twitter" && $reviewtext!=''){
			//Convert urls to <a> links
			$reviewtext = preg_replace("/([\w]+\:\/\/[\w\-?&;#~=\.\/\@]+[\w\/])/", "<a rel=\"nofollow noreferrer\" target=\"_blank\" href=\"$1\">$1</a>", $reviewtext);

			//Convert hashtags to twitter searches in <a> links
			$reviewtext = preg_replace("/#([A-Za-z0-9\/\.]*)/", "<a rel=\"nofollow noreferrer\" target=\"_new\" target=\"_blank\" href=\"https://twitter.com/search?q=$1\">#$1</a>", $reviewtext);

			//Convert attags to twitter profiles in &lt;a&gt; links
			$reviewtext = preg_replace("/@([A-Za-z0-9_\/\.]*)/", "<a rel=\"nofollow noreferrer\" target=\"_blank\" href=\"https://twitter.com/$1\">@$1</a>", $reviewtext);
			
			//create like, follow div. get values from meta_data
			//{"user_url":"https:\/\/twitter.com\/brendanrfoster","favorite_count":"0","retweet_count":"0","reply_count":"0"}
			//==================
			//do this later, it will require changes to the custom icon fonts
			//================
			
			$likediv = '';
			
		}
		
		return $reviewtext;
		//------
	}
	
	public function wprevpro_get_miscpichtml($review,$currentform){

		//add product image and title for WooCommerce here, use later for instagram/twitter
		$miscpicimagehtml ="";
		$title = strip_tags($review->pagename);
		if($review->type =="WooCommerce"){
			$miscpicsrc = "";
			
			if($review->miscpic!=''){
				$miscpicsrc ='<img src="'.$review->miscpic.'" class="miscpic-listing-image rounded" width="75" height="auto" title="'.$title.'" alt="'.$title.' Image">';
			}
			$miscpicimagehtml = "<div class='miscpicdiv mpdiv_t".$currentform->style." wprev_preview_tcolor1_T".$currentform->style."'><div class='mscpic-img'><div class='mscpic-img-body'>".$miscpicsrc."</div></div><div class='mscpic-body'><span>".$title."</span></div></div>";
		}
		//add product link if set
		$linkstart="";
		$linkend="";
		if($review->from_url !="" && $miscpicimagehtml!=''){
			$linkstart='<a href="'.$review->from_url.'" class="miscpiclink" title="'.$title.'">';
			$linkend="</a>";
		}
		
		return $linkstart.$miscpicimagehtml.$linkend;
		//------
	}
	public function wprevpro_get_miscpichtml_t11($review,$currentform){

		//add product image and title for WooCommerce here, use later for instagram/twitter
		$miscpicimagehtml ="";
		$title = strip_tags($review->pagename);
		$miscpictitlehtml='';
		if($review->type =="WooCommerce"){
			$miscpicsrc = "";
			
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $review->pageid ), 'medium' );
			
			if($review->miscpic!=''){
				$miscpicsrc ='<img src="'.$image[0].'" class="miscpic-listing-image" title="'.$title.'" alt="'.$title.' Image">';
			}
			$miscpicimagehtml = "<div class='mscpic-img-side'><div class='mscpic-img-body'>".$miscpicsrc."</div></div>";
			
			$miscpictitlehtml = "<div class='miscpicdiv mpdiv_t".$currentform->style." wprev_preview_tcolor1_T".$currentform->style."'><div class='mscpic-body'><span>".$title."</span></div></div>";
			
		}
		//add product link if set
		$linkstart="";
		$linkend="";
		if($review->from_url !="" && $miscpicimagehtml!=''){
			$linkstart='<a href="'.$review->from_url.'" class="miscpiclink" title="'.$title.'">';
			$linkend="</a>";
		}
		
		$result['imagehtml']=$linkstart.$miscpicimagehtml.$linkend;
		$result['titlehtml']=$linkstart.$miscpictitlehtml.$linkend;
		
		return $result;
		//------
	}
	
	public function wprevpro_get_woodetails($review,$currentform){
		//add product image and title for WooCommerce here, use later for instagram/twitter
		$details=array("imghtml"=>"", "titlehtml"=>"");
		if($review->type =="WooCommerce"){
			$miscpicimagehtml ="";
			$title = "<div class='wprevpro_woo_title'>".strip_tags($review->pagename)." </div>";
			if($review->from_url !=""){
				$title='<a href="'.$review->from_url.'" class="miscpiclink" title="'.strip_tags($review->pagename).'">'.$title.'</a>';
			}
			$miscpicsrc = "";
			if($review->miscpic!=''){
				$miscpicsrc ='<img src="'.$review->miscpic.'" class="miscpic-listing-image rounded" width="75" height="auto" title="'.strip_tags($review->pagename).'" alt="'.strip_tags($review->pagename).' Image">';
			}
			$details=array("imghtml"=>$miscpicsrc, "titlehtml"=>$title);
		}
		return $details;
		//------
	}
	
	public function wprevpro_get_verifiedstarhtml($review,$template_misc_array,$currentform) {
		if(!isset($template_misc_array['verified'])){
			$template_misc_array['verified']='';
		}
		$verifiedstarhtml='';
		$location = 0;
		$verifiedstardesc = __('Verified', 'wp-review-slider-pro');
		if($review->type !="Manual" && $review->type !="Submitted"){
			$verifiedstardesc = __('Verified on ', 'wp-review-slider-pro').$review->type;	//_e('Yes 2', 'wp-review-slider-pro');
		}
		if($template_misc_array['verified']=="yes1"){
			$location = 1;
		} else if($template_misc_array['verified']=="yes2"){
			$location = 2;
		}
		$tooltiploc = 'right';
		if($currentform[0]->style=='10' && $location == 2){
			$tooltiploc = 'bottom';
		}
		
		$containerstarthtml = '<span class="verifiedloc'.$location.' wprevpro_verified_svg wprevtooltip" data-wprevtooltip="'.$verifiedstardesc.'">'; 
		$starhtml= '<span class="svgicons svg-wprsp-verified"></span>';
		$containerendhtml = '</span>'; 
		
		$verifiedstarhtml= $containerstarthtml.$starhtml.$containerendhtml;
		
		if($location==0){
			$verifiedstarhtmlarray[0]='';
			$verifiedstarhtmlarray[1]='';
		} else if($location==1){
			$verifiedstarhtmlarray[0]=$verifiedstarhtml;
			$verifiedstarhtmlarray[1]='';
		} else if($location==2) {
			$verifiedstarhtmlarray[0]='';
			$verifiedstarhtmlarray[1]=$verifiedstarhtml;
		}
		return $verifiedstarhtmlarray;
	}
	
	
}
	//========================================
	
	?>