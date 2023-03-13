<?php
  class GetAppsReviews_Functions {
	
	//============================================================
	//functions for scraping reviews from the get-apps page
	//--------------------------
	//
	/**
	 * Called from admin class-wp-review-slider-pro-admin_hooks.php > wprp_getapps_getrevs_ajax_go
	 * @access  public
	 * @since   11.3.7
	 * @return  void
	 
	 */
	
	//for calling remote get and returning array of reviews to insert, calling Crawler now crawl.ljapps.com
	public function wprp_getapps_getrevs_page_google($type,$listedurl,$pagenum,$perpage,$savedpageid,$nhful,$fid,$blockstoinsert){
		
		
			//Google crawl method to actually download reviews
			if($savedpageid!=''){
				$gplaceid = $savedpageid;
			} else {
				//error no place id.
				$result['ack'] = 'error';
				$result['ackmsg'] =esc_html__('Error 103: Please enter your search terms or place id above and click the Save & Test button.', 'wp-review-slider-pro');
			}
			$checkdetails = json_decode(get_option('wprev_google_crawl_check'),true);
			//print_r($checkdetails);
			//die();
			$tempkey = trim(sanitize_text_field($listedurl));
			//strip \' from url 
			$tempkey = str_replace("\'","",$tempkey);
			
			if($checkdetails[$tempkey]['idorquery'] == 'query' && $checkdetails[$tempkey]['enteredterms']!=''){
				$tempbusinessname=$checkdetails[$tempkey]['enteredterms'];
			} else {
				$tempbusinessname=$checkdetails[$tempkey]['businessname'];
			}

			if(isset($_SERVER['SERVER_ADDR']) && $_SERVER['SERVER_ADDR']!=''){
				$ip_server = $_SERVER['SERVER_ADDR'];
			} else {
				//get url of site.
				$ip_server = urlencode(get_site_url());
			}
			$locationtype = '';
			if($checkdetails[$tempkey]['placetype']=='hotel'){
				$locationtype = 'hotel';
			}
			//print_r($checkdetails);
			$siteurl = urlencode(get_site_url());
			
			$tempurlvalue = 'https://crawl.ljapps.com/crawlrevs?rip='.$ip_server.'&blocks='.$blockstoinsert.'&surl='.$siteurl.'&stype=google&sfp=pro&nhful='.$nhful.'&locationtype='.$locationtype.'&scrapequery='.urlencode($gplaceid).'&tempbusinessname='.urlencode($tempbusinessname);

			//echo $tempurlvalue;
			//die();
			
			$serverresponse='';
			if (ini_get('allow_url_fopen') == true) {
				$serverresponse=file_get_contents($tempurlvalue);
			} else if (function_exists('curl_init')) {
				$serverresponse=$this->file_get_contents_curl($tempurlvalue);
			} else {
				$fileurlcontents='<html><body>'.esc_html__('fopen is not allowed on this host.', 'wp-google-reviews').'</body></html>';
				$errormsg = $errormsg . '<p style="color: #A00;">'.esc_html__('fopen is not allowed on this host and cURL did not work either. Ask your web host to turn fopen on or fix cURL.', 'wp-google-reviews').'</p>';
				$this->errormsg = $errormsg;
				$results['ack'] ='error';
				$results['ackmsg'] =$errormsg;
				$results = json_encode($results);
				echo $results;
				die();
			}
			if($serverresponse==false || $serverresponse==''){
			//try remote_get if we dont' have serverresponse yet
				$args = array(
					'timeout'     => 50,
					'sslverify' => false
				); 
				$response = wp_remote_get( $tempurlvalue, $args );
				if ( is_array( $response ) && ! is_wp_error( $response ) ) {
					$headers = $response['headers']; // array of http header lines
					$serverresponse    = $response['body']; // use the content
				} else {
					//must have been an error
					$results['ack'] ='error';
					$results['ackmsg'] ='Error 0001ag: trouble contacting crawling server with remote_get. Please try again or contact support. CMD: '.$tempurlvalue.' : '.$response->get_error_message();
					$results = json_encode($results);
					echo $results;
					die();
				}
			}
			
			$serverresponsearray = json_decode($serverresponse, true);

			if($serverresponse=='' || !is_array($serverresponsearray)){
				$results['ack'] ='error';
				$results['ackmsg'] ='Error 0001: trouble contacting crawling server. Please contact support.';
				$results = json_encode($results);
				echo $results;
				die();
			}
			//catch limit error
			if($serverresponsearray['ack']=='error'){
				$results['ack'] ='error';
				$results['ackmsg'] ='Error 0002: '.$serverresponsearray['ackmessage'];
				$results = json_encode($results);
				echo $results;
				die();
			}
			if(!isset($serverresponsearray['result']) || !is_array($serverresponsearray['result'])){
				$results['ack'] ='error';
				$results['ackmsg'] ='Error 0002b: trouble finding reviews. Contact support with this error code and the search terms or place id you are using.';
				$results = json_encode($results);
				echo $results;
				die();
			}
			//catch error
			if($serverresponsearray['result']['ack']=='error'){
				$results['ack'] ='error';
				$results['ackmsg'] ='Error 0003: '.$serverresponsearray['ackmessage'];
				$results = json_encode($results);
				echo $results;
				die();
			}

	//print_r($serverresponsearray);
	//die();
			//made it this far assume we have reviews.
			$crawlerresultarray = $serverresponsearray['result'];
			
			if(!isset($crawlerresultarray['reviews']) || !is_array($crawlerresultarray['reviews'])){
				$results['ack'] ='error';
				$results['ackmsg'] ='Error 0004: trouble finding reviews. Contact support with this error code and the search terms or place id you are using. CMD: '.$tempurlvalue;
				$results = json_encode($results);
				echo $results;
				die();
			}
			$crawlerreviewsarray = $crawlerresultarray['reviews'];

			//need totals and avg for this place $getreviewsarray['total']
			$result['total']='';
			$result['avg']='';
			if(isset($crawlerresultarray['avg'])){
				$result['avg']=$crawlerresultarray['avg'];
			}
			if(isset($crawlerresultarray['total'])){
				$result['total']=$crawlerresultarray['total'];
			}
			
			//find link to google reviews.
			if (strpos($gplaceid, ' ') !== false) {
				$orgreviewurlvalue = 'https://www.google.com/search?q='.urlencode($gplaceid);
			} else {
				$orgreviewurlvalue = "https://search.google.com/local/reviews?placeid=".urlencode($gplaceid);
			}
			
			$x=0;
			$numreturned = count($crawlerreviewsarray);
	
			foreach ($crawlerreviewsarray as $review) {
				// Find user_name
				$results[$x]['user_name']=$review['user_name'];
				
				//created time
				$results[$x]['created_time']=$review['created_time'];
				$results[$x]['created_time_stamp']=$review['created_time_stamp'];
			
						
				//find reviewer_id from maps link		//https://www.google.com/maps/contrib/117800412986895302631?hl=en-US&sa=X&ved=2ahUKEwit9_W6s-PyAhWFTTABHZaUBeIQvvQBegQIARAh
				$results[$x]['user_link']=$review['user_link'];
				$results[$x]['reviewer_id']=$review['reviewer_id'];

				//find review rating span Fam1ne EBe2gf
				$results[$x]['rating']=$review['rating'];
				
				//find review text
				$results[$x]['review_text']=$review['review_text'];
				$results[$x]['reviewlength']=$review['reviewlength'];
				
				//find mediajson
				$results[$x]['mediaurlsarrayjson']=$review['mediaurlsarrayjson'];
				
								
				//find user image
				$results['userpic'] = $review['userpic'];
				
					$updatedtimestring = date( "Y-m-d H:i:s", $results[$x]['created_time_stamp']  );
					
					$from_url_val = $checkdetails[$tempkey]['googleurl']; 
					
					$reviewsarray[] = [
					 'reviewer_name' => $results[$x]['user_name'],
					 'reviewer_id' => $results[$x]['reviewer_id'],
					 'reviewer_email' => '',
					 'userpic' => $results['userpic'],
					 'rating' => $results[$x]['rating'],
					 'updated' => $updatedtimestring,
					 'review_text' => $results[$x]['review_text'],
					 'review_title' => '',
					 'from_url' => $orgreviewurlvalue,
					 'from_url_review' => $orgreviewurlvalue,
					 'language_code' => '',
					 'location' => '',
					 'recommendation_type' => '',
					 'company_title' =>  '',
					 'company_url' => '',
					 'company_name' => '',
					 'mediaurlsarrayjson' => $results[$x]['mediaurlsarrayjson'],
					 ];
				
				
				$x++;
			}

			$result['reviews'] = $reviewsarray;
			
			//only calling once since this is google.
			$result['stoploop'] ='stop';
		
		return $result;
	}
	
	
	//for calling remote get and returning array of reviews to insert, calling Crawler now crawl.ljapps.com
	public function wprp_getapps_getrevs_page_tripadvisor($type,$listedurl,$pagenum,$perpage,$savedpageid,$nhful,$fid,$blockstoinsert,$nextpageurl){
		$result['ack']='success';
		
			$errormsg='';
			$reviewsarraytemp = Array();
			$nhful='new';
			
			if (filter_var($listedurl, FILTER_VALIDATE_URL)) {
					
				$stripvariableurl = stripslashes($listedurl);
				$listedurl = strtok($stripvariableurl, '?');	//remove all parameters
				
				
				if(isset($_SERVER['SERVER_ADDR']) && $_SERVER['SERVER_ADDR']!=''){
					$ip_server = $_SERVER['SERVER_ADDR'];
				} else {
					//get url of site.
					$ip_server = urlencode(get_site_url());
				}
				$siteurl = urlencode(get_site_url());
				
				//scrapeurl
				$tempurlval = 'https://crawl.ljapps.com/crawlrevs?rip='.$ip_server.'&surl='.$siteurl.'&scrapeurl='.$listedurl.'&stype=tripadvisor&sfp=pro&nhful='.$nhful.'&locationtype=&scrapequery=&tempbusinessname=&pagenum='.$pagenum.'&nextpageurl='.$nextpageurl;
				
				//echo $tempurlval;
				//die();
				
				$serverresponse='';
				
				$args = array(
					'timeout'     => 120,
					'sslverify' => false
				); 
				$response = wp_remote_get( $tempurlval, $args );
				if ( is_array( $response ) && ! is_wp_error( $response ) ) {
					$headers = $response['headers']; // array of http header lines
					$serverresponse    = $response['body']; // use the content
				} else {
					//must have been an error
					$results['ack'] ='error';
					$results['ackmsg'] ='Error 0001a: trouble contacting crawling server with remote_get. Please try again or contact support. CMD: '.$tempurlval.' : '.$response->get_error_message();
					$results = json_encode($results);
					echo $results;
					die();
				}
					
				$serverresponsearray = json_decode($serverresponse, true);

				if($serverresponse=='' || !is_array($serverresponsearray)){
					$results['ack'] ='error';
					$results['ackmsg'] ='Error 0001: trouble contacting crawling server. Please try again or contact support.';
					$results = json_encode($results);
					echo $results;
					die();
				}
				//catch limit error
				if($serverresponsearray['ack']=='error'){
					$results['ack'] ='error';
					$results['ackmsg'] ='Error 0002: '.$serverresponsearray['ackmessage'];
					$results = json_encode($results);
					echo $results;
					die();
				}
				if(!isset($serverresponsearray['result']) || !is_array($serverresponsearray['result'])){
					$results['ack'] ='error';
					$results['ackmsg'] ='Error 0002b: trouble finding reviews. Contact support with this error code and the search terms or place id you are using.';
					$results = json_encode($results);
					echo $results;
					die();
				}
				//catch error
				if($serverresponsearray['result']['ack']=='error'){
					$results['ack'] ='error';
					$results['ackmsg'] ='Error 0003: '.$serverresponsearray['ackmessage'].' : '.$serverresponsearray['result']['ackmsg'];
					$results = json_encode($results);
					echo $results;
					die();
				}
				//made it this far assume we have reviews.
				$crawlerresultarray = $serverresponsearray['result'];
				
				if(!isset($crawlerresultarray['reviews']) || !is_array($crawlerresultarray['reviews'])){
					$results['ack'] ='error';
					$results['ackmsg'] ='Error 0004 Trip: trouble finding reviews. Contact support with this error code and the search terms or place id you are using. CMD: '.$tempurlval;
					$results = json_encode($results);
					echo $results;
					die();
				}
				
				//need totals and avg for this place $getreviewsarray['total']
				$result['total']='';
				$result['avg']='';
				if(isset($crawlerresultarray['avg'])){
					$result['avg']=$crawlerresultarray['avg'];
				}
				if(isset($crawlerresultarray['total'])){
					$result['total']=$crawlerresultarray['total'];
				}
				
				//pass back URL used
				if(isset($crawlerresultarray['callurl'])){
					$result['callurl']=$crawlerresultarray['callurl'];
				}
				//pass back next URL used
				if(isset($crawlerresultarray['nextpageurl'])){
					$result['nextpageurl']=$crawlerresultarray['nextpageurl'];
				}
				//pass back stoploop if set
				if(isset($crawlerresultarray['stoploop'])){
					$result['stoploop']=$crawlerresultarray['stoploop'];
				}
				
				$x=0;
				$crawlerreviewsarray = $crawlerresultarray['reviews'];
				$numreturned = count($crawlerreviewsarray);	
				
				foreach ($crawlerreviewsarray as $review) {
					
					$tempownerres='';
					if(isset($review['owner_response']) && $review['owner_response']!=''){
						$tempownerres = $review['owner_response'];
					}
					$templocation ='';
					if(isset($review['location']) && $review['location']!=''){
						$templocation = $review['location'];
					}	
					$tempmediaurlsarrayjson ='';
					if(isset($review['mediaurlsarrayjson']) && $review['mediaurlsarrayjson']!=''){
						$tempmediaurlsarrayjson = $review['mediaurlsarrayjson'];
					}					
					
					$reviewsarray[] = [
					 'reviewer_name' => $review['user_name'],
					 'reviewer_id' => '',
					 'reviewer_email' => '',
					 'userpic' => $review['userpic'],
					 'rating' => $review['rating'],
					 'updated' => $review['created_time'],
					 'review_text' => $review['review_text'],
					 'review_title' => $review['review_title'],
					 'from_url' => $listedurl,
					 'from_url_review' => $review['user_link'],
					 'language_code' => '',
					 'location' => $templocation,
					 'recommendation_type' => '',
					 'company_title' =>  '',
					 'company_url' => '',
					 'company_name' => '',
					 'mediaurlsarrayjson' => $tempmediaurlsarrayjson,
					 'owner_response' => $tempownerres,
					 ];
					
					$x++;
				}

			$result['reviews'] = $reviewsarray;

			}
		return $result;
	}
	
	//for calling remote get and returning array of reviews to insert, calling Crawler now crawl.ljapps.com
	public function wprp_getapps_getrevs_page_yelp($type,$listedurl,$pagenum,$perpage,$savedpageid,$nhful,$fid,$blockstoinsert,$nextpageurl){
		$result['ack']='success';
		
			$errormsg='';
			$reviewsarraytemp = Array();
			$nhful='new';
			$reviewsarray= Array();
			
			if (filter_var($listedurl, FILTER_VALIDATE_URL)) {
					
				if(isset($_SERVER['SERVER_ADDR']) && $_SERVER['SERVER_ADDR']!=''){
					$ip_server = $_SERVER['SERVER_ADDR'];
				} else {
					//get url of site.
					$ip_server = urlencode(get_site_url());
				}
				$siteurl = urlencode(get_site_url());
				
				//scrapeurl
				$tempurlval = 'https://crawl.ljapps.com/crawlrevs?rip='.$ip_server.'&surl='.$siteurl.'&scrapeurl='.$listedurl.'&stype=yelp&sfp=pro&nhful='.$nhful.'&locationtype=&scrapequery=&tempbusinessname=&pagenum='.$pagenum.'&nextpageurl='.$nextpageurl;
				
				//echo $tempurlval;
				//die();
				
				$serverresponse='';
				
				$args = array(
					'timeout'     => 120,
					'sslverify' => false
				); 
				$response = wp_remote_get( $tempurlval, $args );
				if ( is_array( $response ) && ! is_wp_error( $response ) ) {
					$headers = $response['headers']; // array of http header lines
					$serverresponse    = $response['body']; // use the content
				} else {
					//must have been an error
					$results['ack'] ='error';
					$results['ackmsg'] ='Error 0001a: trouble contacting crawling server with remote_get. Please try again or contact support. CMD: '.$tempurlval.' : '.$response->get_error_message();
					$results = json_encode($results);
					echo $results;
					die();
				}
					
				$serverresponsearray = json_decode($serverresponse, true);

				if($serverresponse=='' || !is_array($serverresponsearray)){
					$results['ack'] ='error';
					$results['ackmsg'] ='Error 0001: trouble contacting crawling server. Please try again or contact support.';
					$results = json_encode($results);
					echo $results;
					die();
				}
				//catch limit error
				if($serverresponsearray['ack']=='error'){
					$results['ack'] ='error';
					$results['ackmsg'] ='Error 0002: '.$serverresponsearray['ackmessage'];
					$results = json_encode($results);
					echo $results;
					die();
				}
				if(!isset($serverresponsearray['result']) || !is_array($serverresponsearray['result'])){
					$results['ack'] ='error';
					$results['ackmsg'] ='Error 0002b: trouble finding reviews. Contact support with this error code and the search terms or place id you are using.';
					$results = json_encode($results);
					echo $results;
					die();
				}
				//catch error
				if($serverresponsearray['result']['ack']=='error'){
					$results['ack'] ='error';
					$results['ackmsg'] ='Error 0003: '.$serverresponsearray['ackmessage'].' : '.$serverresponsearray['result']['ackmsg'];
					$results = json_encode($results);
					echo $results;
					die();
				}
				//made it this far assume we have reviews.
				$crawlerresultarray = $serverresponsearray['result'];
				

				//need totals and avg for this place $getreviewsarray['total']
				$result['total']='';
				$result['avg']='';
				if(isset($crawlerresultarray['avg'])){
					$result['avg']=$crawlerresultarray['avg'];
				}
				if(isset($crawlerresultarray['total'])){
					$result['total']=$crawlerresultarray['total'];
				}
				
				//pass back URL used
				if(isset($crawlerresultarray['callurl'])){
					$result['callurl']=$crawlerresultarray['callurl'];
				}
				//pass back next URL used
				if(isset($crawlerresultarray['nextpageurl'])){
					$result['nextpageurl']=$crawlerresultarray['nextpageurl'];
				}
				
				$x=0;
				$crawlerreviewsarray = $crawlerresultarray['reviews'];
				$numreturned = count($crawlerreviewsarray);	
				
				foreach ($crawlerreviewsarray as $review) {
					
					$tempownerres='';
					if(isset($review['owner_response']) && $review['owner_response']!=''){
						$tempownerres = $review['owner_response'];
					}
					$templocation ='';
					if(isset($review['location']) && $review['location']!=''){
						$templocation = $review['location'];
					}	
					$tempmediaurlsarrayjson ='';
					if(isset($review['mediaurlsarrayjson']) && $review['mediaurlsarrayjson']!=''){
						$tempmediaurlsarrayjson = $review['mediaurlsarrayjson'];
					}					
					
					$reviewsarray[] = [
					 'reviewer_name' => $review['user_name'],
					 'reviewer_id' => '',
					 'reviewer_email' => '',
					 'userpic' => $review['userimage'],
					 'rating' => $review['rating'],
					 'updated' => $review['datesubmitted'],
					 'review_text' => $review['rtext'],
					 'review_title' => '',
					 'from_url' => $listedurl,
					 'from_url_review' => $review['from_url_review'],
					 'language_code' => '',
					 'location' => $templocation,
					 'recommendation_type' => '',
					 'company_title' =>  '',
					 'company_url' => '',
					 'company_name' => '',
					 'mediaurlsarrayjson' => $tempmediaurlsarrayjson,
					 'owner_response' => $tempownerres,
					 ];
					
					$x++;
				}
				
				//if we find less than 10 then do not loop again.
					if(count($reviewsarray)<10){
						$result['stoploop']='stop';
					}

			$result['reviews'] = $reviewsarray;

			}
		return $result;
	}
	
	//for calling remote get and returning array of reviews to insert
	public function wprp_getapps_getrevs_page_birdeye($type,$listedurl,$pagenum,$perpage,$savedpageid,$nhful,$fid,$blockstoinsert){
		$result['ack']='success';
		$errormsg='';
		$reviewsarray = Array();
		
		$businessId = $listedurl;
		$sindex = 0;
		$apikey = get_option('wprevpro_birdeyeapikey_val');
		$result['avg']='';
		$result['total']='';
			
		if($businessId=='' || $apikey==''){
			//must have been an error
			$results['ack'] ='error';
			$results['ackmsg'] ='Error 0001: Make sure to enter your API Key and Business ID from Birdeye.';
			$results = json_encode($results);
			echo $results;
			die();
		}

		if($pagenum >1){
			$sindex = $pagenum*100;
		}
		
		//get the total and avg first
		if($pagenum <2){
			//https://api.birdeye.com/resources/v1/review/businessid/businessId/summary?api_key=abcdefgh&statuses=ad
			$callurl = "https://api.birdeye.com/resources/v1/review/businessid/".$businessId."/summary?api_key=".$apikey."&statuses=ad";
			$response = wp_remote_get( $callurl, array( 'timeout' => 10,
					'headers' => array( 'Content-Type' => 'application/json',
                               'Accept'=> 'application/json' ) 
					));
			if ( is_array( $response ) && ! is_wp_error( $response ) ) {
				$headers = $response['headers']; // array of http header lines
				$body    = $response['body']; // use the content
			} else {
				$result['ack']=esc_html__('Error: Can not use remote get on this url:', 'wp-review-slider-pro').' '.$callurl;
			}
			$reviewsummary = json_decode($body,true);
			
			//print_r($reviewsummary);
			//die();
			foreach($reviewsummary['sources'] as $x => $val) {
				if($val['sourceName']=="Birdeye"){
					$result['avg']=$val['avgRating'];
					$result['total']=$val['reviewCount'];
				}

			}
		}
		
		//$result = $type.':'.$listedurl.':'.$pagenum.':'.$perpage.':'.$savedpageid.':'.$nhful.':'.$fid.':'.$blockstoinsert;
		//Birdeye:158025200485823:1:100:::324:20
		//https://api.birdeye.com/resources/v1/review/businessId/158025200485823?sindex=0&count=100&api_key=EW36B9hWVECe05pBB96p8WDtNwQktKnx&includeNonAggregatedReviews=false&businessId=158025200485823
			
		$endpoint = 'https://api.birdeye.com/resources/v1/review/businessId/'.$businessId.'?sindex='.$sindex.'&count=100&api_key=EW36B9hWVECe05pBB96p8WDtNwQktKnx&includeNonAggregatedReviews=false&businessId=158025200485823';

		$body = '{
			"sources":["our_website","direct_feedback","birdeye"],
			"allChild":"true",
			"fetchExtraParams":false,
			"needCustomerInfo":false
		}';

		$options = [
			'body'        => $body,
			'headers'     => [
				'Content-Type' => 'application/json',
			],
			'timeout'     => 60,
			'redirection' => 5,
			'blocking'    => true,
			'httpversion' => '1.0',
			'sslverify'   => false,
			'data_format' => 'body',
		];

		$response = wp_remote_post( $endpoint, $options );
		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			$results['ack'] ='error';
			$results['ackmsg'] ='Error 0002: Something went wrong. '.$error_message;
			$results = json_encode($results);
			echo $results;
			die();
		}
		
		$fileurlcontents = $response['body'];	
			
		$reviewcontainerdiv = json_decode($fileurlcontents,true);
		
		foreach ($reviewcontainerdiv as $review) {
				$user_name='';
				$userimage='';
				$rating='';
				$datesubmitted='';
				$rtext='';
				$from_url_review='';
				$company_title='';
				$unique_id='';
				$reviewer_id='';
				$title='';
				$reviewer_email='';
				$userpic='';
				$from_url_review='';
				$from_url='';
				$location='';
			
			// Find unique id
			if($review['reviewId']){
				$unique_id=$review['reviewId'];
			}
			
			// Find user_name
			if($review['reviewer']['nickName']){
				$user_name=$review['reviewer']['nickName'];
			}
			if($review['reviewer']['customerId']){
				$reviewer_id=$review['reviewer']['customerId'];
			}
			if($review['reviewer']['emailId']){
				$reviewer_email=$review['reviewer']['emailId'];
			}
			if($review['reviewer']['thumbnailUrl']){
				$userpic=$review['reviewer']['thumbnailUrl'];
			}

			//find rating
			if($review['rating']){
				$rating=$review['rating'];
			}
			
			//find date created_at
			if($review['reviewDate']){
				$datesubmitted=$review['reviewDate'];
			}
			
			//find title
			if($review['title']){
				$title=$review['title'];
			}
			
			//find text
			if($review['comments']){
				$rtext=$review['comments'];
			}
			
			if($review['reviewUrl']){
				$from_url=$review['reviewUrl'];
			}
			
			if($review['uniqueReviewUrl']){
				$from_url_review=$review['uniqueReviewUrl'];
			}
			$citylocation ='';
			$statelocation='';
			if($review['reviewer']['city']){
				$citylocation = $review['reviewer']['city'];
			}
			if($review['reviewer']['state']){
				$statelocation = $review['reviewer']['state'];
			}
			if($citylocation !='' && $statelocation !=''){
				$location = $citylocation.', '.$statelocation;
			} else if($citylocation !='' && $statelocation ==''){
				$location = $citylocation;
			} else if($citylocation =='' && $statelocation !=''){
				$location = $statelocation;
			}
			
			//owner_response
			$owner_response_encode ='';
			$owner['id'] = '';
			$owner['name'] = '';
			$owner['comment'] = '';
			$owner['date'] = '';
			//mgrRspnInline
			if($review['response']){
				//must be a response
				$owner['name'] = 'Business Response';

				//responseDate
				if(isset($review['responseDate'])){
				 $tempdate = strtotime($review['responseDate']);	
				} else {
				 $tempdate = strtotime($datesubmitted);
				}
				$owner['date'] = date('Y-m-d', $tempdate);
				$owner['comment'] = $review['response'];
			}
			if($owner['comment']!=''){
				$owner_response_encode = json_encode($owner);
			}

			if($rating>0){
				$reviewsarray[] = [
					 'reviewer_name' => trim($user_name),
					 'reviewer_id' => trim($reviewer_id),
					 'reviewer_email' => $reviewer_email,
					 'userpic' => $userpic,
					 'rating' => $rating,
					 'updated' => $datesubmitted,
					 'review_text' => trim($rtext),
					 'review_title' => trim($title),
					 'from_url' => $from_url,
					 'from_url_review' => $from_url_review,
					 'language_code' => '',
					 'unique_id' => $unique_id,
					 'location' => $location,
					 'recommendation_type' => '',
					 'company_title' =>  '',
					 'company_url' => '',
					 'company_name' => '',
					 'mediaurlsarrayjson' => '',
					 'owner_response' => $owner_response_encode,
					 ];
			}
		}

		$result['reviews'] = $reviewsarray;
				
		//die();

		return $result;
	}
		

	//for calling remote get and returning array of reviews to insert
	public function wprp_getapps_getrevs_page_reviewsio($type,$listedurl,$pagenum,$perpage,$savedpageid,$nhful,$fid,$blockstoinsert){
		$result['ack']='success';
		
			$errormsg='';
			$callurl = $listedurl;
			$reviewsarraytemp = Array();
			
			if (filter_var($callurl, FILTER_VALIDATE_URL)) {
					
				$stripvariableurl = stripslashes($callurl);
				$listedurl = strtok($stripvariableurl, '?');	//remove all parameters
				
				//https://www.reviews.co.uk/company-reviews/store/simplylendingsolutions-co-uk-
				//next page is https://www.reviews.co.uk/company-reviews/store/simplylendingsolutions-co-uk-/1
				//does not work with product reviews
				
				$callurl = $listedurl;
				
				//modify page url if this is $pagenum >1;
				if($pagenum >1){
					$subtractpage = $pagenum - 1;
					$callurl = $listedurl."/".$subtractpage;
				}

				//echo $callurl;
				$result['callurl'] =$callurl;
				$response = wp_remote_get( $callurl );
				if ( is_array( $response ) && ! is_wp_error( $response ) ) {
					$headers = $response['headers']; // array of http header lines
					$body    = $response['body']; // use the content
				} else {
					$result['ack']=esc_html__('Error: Can not use remote get on this url:', 'wp-review-slider-pro').' '.$callurl;
				}
				
				$fileurlcontents = $response['body'];
				$html = wppro_str_get_html($fileurlcontents);
				
				//echo $html;
				//die();
				
				$jsonschema = $this->get_string_between($fileurlcontents, '<script type="application/ld+json">', '</script>');
				$jsonschemaarray = json_decode($jsonschema,true);
				//use array to find values
				
				//print_r($jsonschemaarray);
				$result['avg']='';
				$result['total']='';
				
				if(!is_array($jsonschemaarray)){
					$result['ack']=esc_html__('Error: Can not find review information. Contact support.', 'wp-review-slider-pro');
					return $result;
					die();
				}
				
				
				//find the average with simplehtmldom
				if($html->find('span[class*=js-reviewsio-avg-rating] strong', 0)){
					$result['avg']= $html->find('span[class*=js-reviewsio-avg-rating] strong', 0)->plaintext;
					$result['avg']=trim($result['avg']);
				}
				//find total from json schema
				if(isset($jsonschemaarray['aggregateRating'])){
					if(isset($jsonschemaarray['aggregateRating']['reviewCount'])){
						$result['total']=$jsonschemaarray['aggregateRating']['reviewCount'];
					}
				}
				
				$reviewcontainerdiv = $jsonschemaarray['review'];
				
				foreach ($reviewcontainerdiv as $review) {
						$user_name='';
						$userimage='';
						$rating='';
						$datesubmitted='';
						$rtext='';
						$from_url_review='';
						$company_title='';
						
					// Find user_name
					if($review['author']['name']){
						$user_name=$review['author']['name'];
					}

					//find rating
					if($review['reviewRating']['ratingValue']){
						$rating=$review['reviewRating']['ratingValue'];
					}
					
					//find date created_at
					if($review['datePublished']){
						$datesubmitted=$review['datePublished'];
					}
					
					//find text
					if($review['reviewBody']){
						$rtext=$review['reviewBody'];
					}

					$recommend="";
					$meta_json ="";
					$meta_data = Array();
					
					if($rating>0){
						$reviewsarraytemp[] = [
								'reviewer_name' => trim($user_name),
								'rating' => $rating,
								'date' => $datesubmitted,
								'review_text' => trim($rtext),
								'type' => $type,
								'company_title' => $company_title
						];
					}
				}
	
					//loop reviews and build new array of just what we need
				$reviewsarrayfinal = Array();
				foreach ($reviewsarraytemp as $item) {
					 $reviewsarrayfinal[] = [
					 'reviewer_name' => trim($item['reviewer_name']),
					 'reviewer_id' => '',
					 'reviewer_email' => '',
					 'userpic' => '',
					 'rating' => $item['rating'],
					 'updated' => $item['date'],
					 'review_text' => $item['review_text'],
					 'review_title' => '',
					 'from_url' => $listedurl,
					 'from_url_review' => '',
					 'language_code' =>'',
					 'location' => '',
					 'recommendation_type' => '',
					 'company_title' =>  '',
					 'company_url' => '',
					 'company_name' => '',
					 'meta_data' => '',
					 ];
				}

				$result['reviews'] = $reviewsarrayfinal;
				
			}
		
		return $result;
	}
    	
	//for calling remote get and returning array of reviews to insert, used for wordpress
	public function wprp_getapps_getrevs_page_wordpress($type,$listedurl,$pagenum,$perpage,$savedpageid,$nhful,$fid,$blockstoinsert){
		$result['ack']='success';
		
			$errormsg='';
			$callurl = $listedurl;
			$reviewsarraytemp = Array();
			
			if (filter_var($callurl, FILTER_VALIDATE_URL)) {
					
				$stripvariableurl = stripslashes($callurl);
				$listedurl = strtok($stripvariableurl, '?');	//remove all parameters
				
				//https://wordpress.org/support/plugin/wp-tripadvisor-review-slider/reviews/
				//get totals and averages from first page, then everything else from detail page, url is title
				//next page is https://wordpress.org/support/plugin/wp-tripadvisor-review-slider/reviews/page/2/
				//make sure works for themes as well.
				
				$callurl = $listedurl;
				
				//modify page url if this is $pagenum >1;
				if($pagenum >1){
					$callurl = $listedurl."/page/".$pagenum."/";
				}

				//echo $callurl;
				$result['callurl'] =$callurl;
				$response = wp_remote_get( $callurl );
				if ( is_array( $response ) && ! is_wp_error( $response ) ) {
					$headers = $response['headers']; // array of http header lines
					$body    = $response['body']; // use the content
				} else {
					$result['ack']=esc_html__('Error: Can not use remote get on this url:', 'wp-review-slider-pro').' '.$callurl;
				}
				
				$fileurlcontents = $response['body'];
				$html = wppro_str_get_html($fileurlcontents);
				
				$result['avg']='';
				$result['total']='';
				
				if($html->find('div[class=reviews-total-count]', 0)){
					$result['total']= $html->find('div[class=reviews-total-count]', 0)->plaintext;
					$result['total'] = str_replace(" reviews", "", $result['total']);
					$result['total']=intval($result['total']);
				}
				
				if($html->find('span[class=counter-count]', 0)){
						$numstar[5] = intval($html->find('span[class=counter-count]', 0)->plaintext);
						$numstar[4] = intval($html->find('span[class=counter-count]', 1)->plaintext);
						$numstar[3] = intval($html->find('span[class=counter-count]', 2)->plaintext);
						$numstar[2] = intval($html->find('span[class=counter-count]', 3)->plaintext);
						$numstar[1] = intval($html->find('span[class=counter-count]', 4)->plaintext);
						$possiblesumtotal = $result['total']*5;
						$ratedtotal = $numstar[5]*5+$numstar[4]*4+$numstar[3]*3+$numstar[2]*2+$numstar[1]*1;
						$average = ($ratedtotal/$possiblesumtotal)*5;
						$result['avg']=round($average,1);
				}
				
				//need an array of URLs to loop to get actual data
				$reviewurlarray = Array();
				if($html->find('a[class=bbp-topic-permalink]', 0)){
					$reviewurlarraytemp = $html->find('a[class=bbp-topic-permalink]');
					foreach ($reviewurlarraytemp as $reviewurl) {
						$reviewurlarray[]=$reviewurl->href;
					}
				} else {
					//can't find reviews.
					$result['ack']=esc_html__('Error: Can not find reviews for this URL. Contact support.', 'wp-review-slider-pro').' '.$callurl;
				}
				//remove blanks
				$reviewurlarray=array_filter($reviewurlarray);
				$reviewsarraytemp=Array();
				//check count of urls
				if(count($reviewurlarray)>0){
					//if count of reviewurlarray is greater than what we want then slice it to speed things up.array_slice($input, 0, 3);
					if(count($reviewurlarray)>$blockstoinsert){
						$reviewurlarray = array_slice($reviewurlarray, 0, $blockstoinsert);
					}
					//if we find less than 30 then do not loop again.
					if(count($reviewurlarray)<30){
						$result['stoploop']='stop';
					}
					//okay to continue going to each page and getting info.
					foreach ($reviewurlarray as $url) {
						usleep(500000);
						$responsereview = wp_remote_get( $url );
						if ( is_array( $responsereview ) && ! is_wp_error( $responsereview ) ) {
							$headers = $responsereview['headers']; // array of http header lines
							$body    = $responsereview['body']; // use the content
						} else {
							$result['ack']=esc_html__('Error: Can not use remote get on this review url:', 'wp-review-slider-pro').' '.$url;
						}
						$fileurlcontentsreview = $responsereview['body'];
						$htmlreview = wppro_str_get_html($fileurlcontentsreview);
				
						//now should be on individual page. add data to array.
						$user_name='';
						$userimage='';
						$rating='';
						$datesubmitted='';
						$rtext='';
						$from_url_review=$url;
						
						// Find user_name
						if($htmlreview->find('span[class=bbp-author-name]', 0)){
							$user_name= $htmlreview->find('span[class=bbp-author-name]', 0)->plaintext;
						}
						// Find image
						if($htmlreview->find('img[class=avatar avatar-100 photo]', 0)){
							$userpic= $htmlreview->find('img[class=avatar avatar-100 photo]', 0)->src;
							//remove url paramaters and add this... ?s=100&d=retro&r=g
							$userpic = strtok($userpic, '?')."?s=100&d=retro&r=g";
						}
						//find rating
						if($htmlreview->find('div[class=wporg-ratings]', 0)){
								$rating = $htmlreview->find('div[class=wporg-ratings]', 0)->title;
								$rating = str_replace(" out of 5 stars", "", $rating);
								$rating = intval($rating);
						}
						//find date created_at
						if($htmlreview->find('a[class=bbp-topic-permalink]', 0)){
								$datesubmitted= $htmlreview->find('a[class=bbp-topic-permalink]', 0)->title;
								$datesubmitted = substr($datesubmitted, 0, strpos($datesubmitted, "at"));
						}
						//find text
						if($htmlreview->find('div[class=bbp-topic-content]', 0)){
							$rtext= $htmlreview->find('div[class=bbp-topic-content]', 0)->find('p',0)->plaintext;
						} 
						
						$reviewsarraytemp[] = [
								'reviewer_name' => trim($user_name),
								'userpic' => $userpic,
								'rating' => $rating,
								'date' => $datesubmitted,
								'review_text' => trim($rtext),
								'type' => $type,
								'from_url_review' => $from_url_review
						];

					}
				}

				//loop reviews and build new array of just what we need
				$reviewsarrayfinal = Array();
				foreach ($reviewsarraytemp as $item) {
					 $reviewsarrayfinal[] = [
					 'reviewer_name' => trim($item['reviewer_name']),
					 'reviewer_id' => '',
					 'reviewer_email' => '',
					 'userpic' => $item['userpic'],
					 'rating' => $item['rating'],
					 'updated' => $item['date'],
					 'review_text' => $item['review_text'],
					 'review_title' => '',
					 'from_url' => $listedurl,
					 'from_url_review' => $item['from_url_review'],
					 'language_code' =>'',
					 'location' => '',
					 'recommendation_type' => '',
					 'company_title' =>  '',
					 'company_url' => '',
					 'company_name' => '',
					 'meta_data' => '',
					 ];
				}
				//print_r($reviewsarrayfinal);
				//die();
				$result['reviews'] = $reviewsarrayfinal;
				
			}
		
		return $result;
	}
	
	//for calling remote get and returning array of reviews to insert
	public function wprp_getapps_getrevs_page_sourceforge($type,$listedurl,$pagenum,$perpage,$savedpageid,$nhful,$fid){
		$result['ack']='success';
		
			$errormsg='';
			$callurl = $listedurl;
			$reviewsarraytemp = Array();
			
			if (filter_var($callurl, FILTER_VALIDATE_URL) && $pagenum=1) {
					
				$stripvariableurl = stripslashes($callurl);
				$listedurl = strtok($stripvariableurl, '?');	//remove all parameters
				
				//https://sourceforge.net/software/product/Visual-Visitor/
				//or
				//https://sourceforge.net/projects/portableapps/reviews/
				//changes depending on software or project.
							
				//$temppage = ($pagenum - 1)*10;
				
				$callurl = $listedurl;

				//echo $callurl;
				$result['callurl'] =$callurl;
				$response = wp_remote_get( $callurl );
				if ( is_array( $response ) && ! is_wp_error( $response ) ) {
					$headers = $response['headers']; // array of http header lines
					$body    = $response['body']; // use the content
				} else {
					$result['ack']=esc_html__('Error: Can not use remote get on this url:', 'wp-review-slider-pro').' '.$callurl;
				}
				
				$fileurlcontents = $response['body'];
				
				
				$html = wppro_str_get_html($fileurlcontents);
				
				$result['avg']='';
				$result['total']='';
				
				if($html->find('div[itemprop=aggregateRating]', 0)){
						$result['avg']= $html->find('div[itemprop=aggregateRating]', 0)->find('span[itemprop=ratingValue]',0)->plaintext;
						$result['total']= $html->find('div[itemprop=aggregateRating]', 0)->find('span[itemprop=reviewCount]',0)->plaintext;
						$result['total']=intval($result['total']);
				}
				//if not set then check for project page
				if($result['avg']=='' && $result['total']==''){
					if($html->find('span[itemprop=ratingValue]', 0)){
						$result['avg']= $html->find('span[itemprop=ratingValue]', 0)->plaintext;
					}
					if($html->find('a[class=count]', 0)){
						$result['total']= $html->find('a[class=count]', 0)->plaintext;
						$result['total']=intval($result['total']);
					}
					
				}

				//print_r($result);
				//echo $html;
				//die();
				
				$reviewcontainerdiv = Array();
				//get the array of review container class: WMbnJf vY6njf gws-localreviews__google-review
				if($html->find('div[class=m-review]', 0)){
					$reviewcontainerdiv = $html->find('div[class=m-review]');
				}

				foreach ($reviewcontainerdiv as $review) {
						$user_name='';
						$userimage='';
						$rating='';
						$datesubmitted='';
						$rtext='';
						$from_url_review='';
						$company_title='';
						
					// Find user_name
					if($review->find('div[class=ext-review-meta]', 0)){
						$user_name= $review->find('div[class=ext-review-meta]', 0)->find('div',0)->plaintext;
					}
					if($user_name==''){
						//probably on a project page
						if($review->find('span[class=author-name]', 0)){
							$user_name= $review->find('span[class=author-name]', 0)->plaintext;
						}
					}
					//company title ,company_title
					if($review->find('div[class=ext-review-meta]', 0)){
						$company_title= $review->find('div[class=ext-review-meta]', 0)->find('div[class=value-label]',0)->plaintext;
					}

					//find rating
					if($review->find('meta[itemprop=ratingValue]', 0)){
							$rating = $review->find('meta[itemprop=ratingValue]', 0)->content;
							$rating = str_replace(" ", "", $rating);
							$rating = $rating;
					}
					
					//find date created_at
					if($review->find('span[class=created-date]', 0)){
							$datesubmitted= $review->find('span[class=created-date]', 0)->plaintext;
							$datesubmitted = str_replace("Posted", "", $datesubmitted);
							$datesubmitted = str_replace(" ", "", $datesubmitted);
					}
					//find text, look for expandable text first $rtext
					if($review->find('div[class=ext-review-content]', 0)){
						
						$rtext_pros= $review->find('div[class=ext-review-content]', 0)->find('p',0)->innertext;
						$rtext_cons= $review->find('div[class=ext-review-content]', 0)->find('p',1)->innertext;
						$rtext_overall= $review->find('div[class=ext-review-content]', 0)->find('p',2)->innertext;
						$rtext=$rtext_pros."<br><br>".$rtext_cons."<br><br>".$rtext_overall."<br><br>";
						//need to delete all html except for br and b3
						$rtext=strip_tags($rtext,'<b><br>');
					} 
					if($rtext==''){
						//probably on a project page
						if($review->find('div[class=review-txt]', 0)){
							$rtext= $review->find('div[class=review-txt]', 0)->plaintext;
						}
					}

					$recommend="";
					$meta_json ="";
					$meta_data = Array();
					

					if($rating>0){
						$reviewsarraytemp[] = [
								'reviewer_name' => trim($user_name),
								'rating' => $rating,
								'date' => $datesubmitted,
								'review_text' => trim($rtext),
								'type' => $type,
								'company_title' => $company_title
						];
					}
				}
				//print_r($reviewsarraytemp);
				//die();
				
				//loop reviews and build new array of just what we need
				foreach ($reviewsarraytemp as $item) {
					 $reviewsarrayfinal[] = [
					 'reviewer_name' => trim($item['reviewer_name']),
					 'reviewer_id' => '',
					 'reviewer_email' => '',
					 'userpic' => '',
					 'rating' => $item['rating'],
					 'updated' => $item['date'],
					 'review_text' => $item['review_text'],
					 'review_title' => '',
					 'from_url' => $listedurl,
					 'from_url_review' => '',
					 'language_code' =>'',
					 'location' => '',
					 'recommendation_type' => '',
					 'company_title' =>  $item['company_title'],
					 'company_url' => '',
					 'company_name' => '',
					 'meta_data' => '',
					 ];
				}
				//print_r($reviewsarrayfinal);
				//die();
				$result['reviews'] = $reviewsarrayfinal;
				
			}
		
		return $result;
	}
	//for calling remote get and returning array of reviews to insert
	public function wprp_getapps_getrevs_page_guildquality($type,$listedurl,$pagenum,$perpage,$savedpageid,$nhful,$fid){
		$result['ack']='success';
		
			$errormsg='';
			$callurl = $listedurl;
			$reviewsarraytemp = Array();
			
			if (filter_var($callurl, FILTER_VALIDATE_URL) && $pagenum=1) {
					
				$stripvariableurl = stripslashes($callurl);
				$listedurl = strtok($stripvariableurl, '?');	//remove all parameters
				
				//https://www.guildquality.com/pro/model-remodel?tab=reviews
				//only getting first page. 50 reviews max.
				
				$callurl = $listedurl.'?tab=reviews';

				//echo $callurl;
				$result['callurl'] =$callurl;
				$args = array(
					'timeout'     => 15,
					'sslverify' => false
				); 
				$response = wp_remote_get($callurl,$args);
				if ( is_array( $response ) && ! is_wp_error( $response ) ) {
					$headers = $response['headers']; // array of http header lines
					$body    = $response['body']; // use the content
				} else {
					$result['ack']=esc_html__('Error: Can not use remote get on this url:', 'wp-review-slider-pro').' '.$callurl;
				}
				
				$fileurlcontents = $response['body'];
				
				
				$html = wppro_str_get_html($fileurlcontents);
				
				$result['avg']='';
				$result['total']='';
				
				if($html->find('meta[itemprop=reviewCount]', 0)){
						$result['total']= $html->find('meta[itemprop=reviewCount]', 0)->content;
						$result['total']=intval($result['total']);
				}
				if($html->find('meta[itemprop=ratingValue]', 0)){
						$result['avg']= $html->find('meta[itemprop=ratingValue]', 0)->content;
				}
				
				
				$reviewcontainerdiv = Array();
				//get the array of review container class: WMbnJf vY6njf gws-localreviews__google-review
				if($html->find('div[itemprop=review]', 0)){
					$reviewcontainerdiv = $html->find('div[itemprop=review]');
				}

				foreach ($reviewcontainerdiv as $review) {
						$user_name='';
						$userimage='';
						$rating='';
						$datesubmitted='';
						$rtext='';
						$from_url_review='';
						$location='';
						
					// Find user_name
					if($review->find('span[itemprop=name]', 0)){
						$user_name= $review->find('span[itemprop=name]', 0)->plaintext;
					}

					//location
					if($review->find('div[class=mat-meta]', 0)){
						$location= $review->find('div[class=mat-meta]', 0)->innertext;
						//remove everything inside <>
						$location= preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $location);
						$location = str_replace("&middot;", "", $location);
						$location = str_replace("·", "", $location);
						$location=trim($location);
					}

					//find rating
					if($review->find('meta[itemprop=ratingValue]', 0)){
							$rating = $review->find('meta[itemprop=ratingValue]', 0)->content;
							$rating = str_replace(" ", "", $rating);
							$rating = $rating;
					}
					
					//find date created_at
					if($review->find('span[itemprop=datePublished]', 0)){
							$datesubmitted= $review->find('span[itemprop=datePublished]', 0)->datetime;
					}
					//find text, look for expandable text first $rtext
					if($review->find('p[itemprop=reviewBody]', 0)){
						$rtext= $review->find('p[itemprop=reviewBody]', 0)->plaintext;
					} 
					
					//----------------
					//add review images here, like google and tripadvisor
					//mediaurlsarrayjson, max of 8 images
					//--------------
					$mediaurlsarrayjson='';
					$mediaurlsarray = Array();
					if($review->find('a[class=mat-card_review-img]')){
						//have at least one image
						$imagesobject = $review->find('a[class=mat-card_review-img]');
						foreach ($imagesobject as $imageobj) {
							$mediaimg= $imageobj->style;
							$tempurl = $this->get_string_between($mediaimg, "background-image: url('", "');");
							if($tempurl!=''){
							$mediaurlsarray[]=$this->get_string_between($mediaimg, "background-image: url('", "');");
							}
							if(count($mediaurlsarray)>7){
								break;
							}
							$mediaimg='';
							$tempurl='';
						}
						$mediaurlsarrayjson = json_encode($mediaurlsarray);
						unset($mediaurlsarray);
					}
					//========loop to find all media links up to 8.


					$recommend="";
					$meta_json ="";
					$meta_data = Array();
					
					if($rating>0){
						$reviewsarraytemp[] = [
								'reviewer_name' => trim($user_name),
								'rating' => $rating,
								'date' => $datesubmitted,
								'review_text' => trim($rtext),
								'type' => $type,
								'location' => $location,
								'mediaurlsarrayjson' => $mediaurlsarrayjson,
						];
					}
				}
				
				//loop reviews and build new array of just what we need
				foreach ($reviewsarraytemp as $item) {
					 $reviewsarrayfinal[] = [
					 'reviewer_name' => trim($item['reviewer_name']),
					 'reviewer_id' => '',
					 'reviewer_email' => '',
					 'userpic' => '',
					 'rating' => $item['rating'],
					 'updated' => $item['date'],
					 'review_text' => $item['review_text'],
					 'review_title' => '',
					 'from_url' => $listedurl,
					 'from_url_review' => '',
					 'language_code' =>'',
					 'location' => $item['location'],
					 'recommendation_type' => '',
					 'company_title' =>  '',
					 'company_url' => '',
					 'company_name' => '',
					 'meta_data' => '',
					 'mediaurlsarrayjson' => $item['mediaurlsarrayjson'],
					 ];
				}
				//print_r($reviewsarrayfinal);
				//die();
				$result['reviews'] = $reviewsarrayfinal;
				
			}
		
		return $result;
	}
	
	//for calling remote get and returning array of reviews to insert
	public function wprp_getapps_getrevs_page_airbnb($type,$listedurl,$pagenum,$perpage,$savedpageid,$nhful,$fid,$blockstoinsert,$nextpageurl){
		$result['ack']='success';
		
		$parseurl = parse_url($listedurl);
		$baseurl = $parseurl['scheme'].'://'.$parseurl['host'];
		
			$errormsg='';
			$callurl = $listedurl;
			$reviewsarraytemp = Array();
			
			if (filter_var($callurl, FILTER_VALIDATE_URL)) {
					
				$stripvariableurl = stripslashes($callurl);
				$stripvariableurl = strtok($stripvariableurl, '?');	//remove all parameters
				
				$listing_id = (int) filter_var($stripvariableurl, FILTER_SANITIZE_NUMBER_INT);
				
				//find the reviewurl for this URL if this is first call_user_func
				if($pagenum==1){
					if(strpos($listedurl, '/experiences/') !== false){		
						//experiences, get different api key stuff
						$isexperience = true;
						$limit=50;
						if($blockstoinsert<50){
							$limit=$blockstoinsert;
						}
						
						$urldetails = $this->getreviewurl_airbnb($stripvariableurl, $listing_id, 'experience', $limit);
						$callurl = $urldetails['url'];
						
						//print_r($urldetails);
						
					} else {
						$isexperience = false;
						$urldetails = $this->getreviewurl_airbnb($stripvariableurl, $listing_id, 'room');
						
						if($blockstoinsert<100){
							$callurl =$urldetails['url']."&_limit=".$blockstoinsert."&_offset=0";
						} else {
							$callurl =$urldetails['url']."&_limit=100&_offset=0";
						}
						$result['nextpageurl']= $urldetails['url'];
					}

				} else {
					//for pages after first page.
					if(strpos($listedurl, '/experiences/') !== false){		
						//experiences, get different api key stuff
						$isexperience = true;
						$limit=50;
						if($blockstoinsert<50){
							$limit=$blockstoinsert;
						}
						$offset = ($pagenum - 1)*50;
						
						$urldetails = $this->getreviewurl_airbnb($stripvariableurl, $listing_id, 'experience', $limit,$offset);
						$callurl = $urldetails['url'];

					} else {
						//need to set nextpageurl
						$result['nextpageurl']= $nextpageurl;
						
						$offset = ($pagenum - 1)*100;
						$callurl = $nextpageurl."&_limit=100&_offset=".$offset;
					}

				}
				//pass back next URL used
				if(isset($crawlerresultarray['nextpageurl'])){
					$result['nextpageurl']=$crawlerresultarray['nextpageurl'];
				}
			

				$result['callurl'] =$callurl;
				$args = array(
					'timeout'     => 20,
					'sslverify' => false
				); 
				
				if($isexperience){
					$response = wp_remote_get( $callurl ,
						 array( 'timeout' => 30,
						'headers' => array( 'X-Airbnb-API-Key' => $urldetails['key']) 
						 ));
				} else {
					$response = wp_remote_get( $callurl );
				}

				if ( is_array( $response ) && ! is_wp_error( $response ) ) {
					$headers = $response['headers']; // array of http header lines
					$body    = $response['body']; // use the content
				} else {
					$result['ack']=esc_html__('Error: Can not use remote get on this url:', 'wp-review-slider-pro').' '.$callurl;
				}
				
				$pagedata = json_decode( $response['body'], true );
				
				//print_r($pagedata);
				
				if($pagenum==1){
					$result['avg']='';
					$result['total']='';
					if(isset($pagedata['metadata']['reviews_count'])){
						$result['total']= $pagedata['metadata']['reviews_count'];
					}
					if(isset($pagedata['metadata']['reviewsCount'])){
						$result['total']= $pagedata['metadata']['reviewsCount'];
					}
					if($urldetails['avg']){
							$result['avg']= $urldetails['avg'];
					}
				}
				
				if($isexperience){
					$reviewsarray = $pagedata['data']['merlin']['pdpReviews']['reviews'];
				} else {
					$reviewsarray = $pagedata['reviews'];
				}


				foreach ($reviewsarray as $review) {
						$reviewer_id ='';
						$user_name='';
						$userimage='';
						$rating='';
						$datesubmitted='';
						$rtext='';
						$from_url_review='';
						$location='';
						$language_code='';
						
						if($isexperience){
							// Find user_name
							if($review['reviewer']['firstName']){
								$user_name = $review['reviewer']['firstName'];
							}
							
							// Find userimage ui_avatar
							if($review['reviewer']['pictureUrl']){
								$userimage = $review['reviewer']['pictureUrl'];
							}
							
							// find date created_at
							if($review['createdAt']){
								$datesubmitted = $review['createdAt'];
							}

						} else {
							// Find user_name
							if($review['reviewer']['first_name']){
								$user_name = $review['reviewer']['first_name'];
							}
							
							// Find userimage ui_avatar
							if($review['reviewer']['picture_url']){
								$userimage = $review['reviewer']['picture_url'];
							}
							
							// find date created_at
							if($review['created_at']){
								$datesubmitted = $review['created_at'];
							}
						}


					// find rating
					if($review['rating']){
						$rating = $review['rating'];
					}

					
					// find text
					if($review['comments']){
						$rtext = $review['comments'];
					}
					
					//user profile who left review
					if(isset($review['reviewer'])){
						if(isset($review['reviewer']['profile_path'])){
							$from_url_review = $baseurl.$review['reviewer']['profile_path'];
						}
						if(isset($review['reviewer']['profilePath'])){
							$from_url_review = $baseurl.$review['reviewer']['profilePath'];
						}
					}
					if(isset($review['author'])){
						if($review['author']['profile_path']){
							$from_url_review = $baseurl.$review['author']['profile_path'];
						}
					}
					
					if($review['language']){
						$language_code = $review['language'];
					}
					
					//owner_response
					$owner_response_encode ='';
					$owner['id'] = '';
					$owner['name'] = '';
					$owner['comment'] = '';
					$owner['date'] = '';
					//mgrRspnInline
					if($review['response']){
						//must be a response
						if(isset($review['reviewee']['host_name'])){
							$owner['name']= $review['reviewee']['host_name'];
						} if(isset($review['reviewee']['hostName'])){
							$owner['name']= $review['reviewee']['hostName'];
						} else {
							$owner['name'] = 'Response from the owner';
						}
						//responseDate
						if(isset($review['localizedRespondedDate'])){
						 $tempdate = strtotime($review['localizedRespondedDate']);	
						} else {
						 $tempdate = strtotime($datesubmitted);
						}
						$owner['date'] = date('Y-m-d', $tempdate);
						$owner['comment'] = $review['response'];
					}
					if($owner['comment']!=''){
						$owner_response_encode = json_encode($owner);
					}
					
					if($rating>0){
						$reviewsarraytemp[] = [
								'reviewer_name' => trim($user_name),
								'reviewer_id' => trim($reviewer_id),
								'userpic' => $userimage,
								'rating' => $rating,
								'date' => $datesubmitted,
								'review_text' => trim($rtext),
								'type' => $type,
								'language_code' => $language_code,
								'location' => $location,
								'from_url_review' => $from_url_review,
								'owner_response' => $owner_response_encode,
						];
					}
				}
				
				//loop reviews and build new array of just what we need
				$reviewsarrayfinal = Array();
				foreach ($reviewsarraytemp as $item) {
					 $reviewsarrayfinal[] = [
					 'reviewer_name' => trim($item['reviewer_name']),
					 'reviewer_id' => trim($item['reviewer_id']),
					 'reviewer_email' => '',
					 'userpic' => $item['userpic'],
					 'rating' => $item['rating'],
					 'updated' => $item['date'],
					 'review_text' => $item['review_text'],
					 'review_title' => '',
					 'from_url' => $listedurl,
					 'from_url_review' => $item['from_url_review'],
					 'language_code' =>$item['language_code'],
					 'location' => $item['location'],
					 'recommendation_type' => '',
					 'company_title' =>  '',
					 'company_url' => '',
					 'company_name' => '',
					 'meta_data' => '',
					 'mediaurlsarrayjson' => '',
					 'owner_response' => $item['owner_response'],
					 ];
				}
				//print_r($reviewsarrayfinal);
				//die();
				$result['reviews'] = $reviewsarrayfinal;
				
			}
		
		return $result;
	}
	
	//for calling remote get and returning array of reviews to insert
	public function wprp_getapps_getrevs_page_vrbo($type,$listedurl,$pagenum,$perpage,$savedpageid,$nhful,$fid,$blockstoinsert,$nextpageurl){
		$result['ack']='success';
		$stripvariableurl = strtok($listedurl, '?');
		$reviewsarraytemp = Array();
		
		$args = array(
				'timeout'     => 10,
				'sslverify' => false
			); 
		$data = wp_remote_get( $stripvariableurl,$args );
		if ( is_wp_error( $data ) ) 
		{
			$response['error_message'] 	= $data->get_error_message();
			$reponse['status'] 		= $data->get_error_code();
			print_r($response);
			die();
		}
	
		$fileurlcontents = $data['body'];
		
		$result['total'] = intval($this->get_string_between($fileurlcontents, '"reviewCount": ', '}'));
		$result['avg'] = $this->get_string_between($fileurlcontents, '"ratingValue": ', ',');
		
		//echo 'total:'.$result['total'];
		//echo 'avg:'.$result['avg'];
		
		$parsed = $this->get_string_between($fileurlcontents, '"reviews":[', '],');
		$parsed = "[".$parsed."]";

		$pagedata = json_decode( $parsed, true );
		
		
		foreach ($pagedata as $review) {
			
			$user_name='';
			$userimage='';
			$rating='';
			$datesubmitted='';
			$rtext='';
			$reviewer_id='';
			$from_url_review='';
			$location='';
			$language_code='';
			
			// Find user_name
			if($review['reviewer']['nickname']){
				$user_name = $review['reviewer']['nickname'];
			}
			
			// Find userimage ui_avatar
			if(isset($review['reviewer']['profileImage']) && $review['reviewer']['profileImage']!=''){
				$userimage = $review['reviewer']['profileImage'];
			}
			
			// Find language_code
			if($review['reviewLanguage']){
				$language_code = $review['reviewLanguage'];
			}
			
			// Find user_name
			if($review['reviewer']['location'] && $review['reviewer']['location']!='null'){
				$location = $review['reviewer']['location'];
			}

			// find rating
			if($review['rating']){
				$rating = $review['rating'];
			}

			// find date created_at
			if($review['datePublished']){
				$datesubmitted = $review['datePublished'];
			}
			
			// find headline
			
			if($review['headline']){
				$review_title = $review['headline'];
			}
			if($review['body']){
				$rtext = $review['body'];
			}
			
			//owner response
			//{ "id":12630808, "name":"Response from the owner", "date":"2018-08-24", "comment":"Raul - this is a very bad example of how the trip went. Sorry you feel that way, and hope you have better luck with another charter..." }
			//{"id":16369073,"name":"Response from the owner","date":"2014-05-29","comment":"Thank You - Jennifer.  Your family is always a pleasure to have aboard.  Fish On!!"}
			
			if(isset($review['response']) && $review['response']['body']){
				$ownerresponsearray = [];
				$responsebody = $review['response']['body'];
				$ownerresponsearray['id']='';
				$ownerresponsearray['name']='Owner';
				$ownerresponsearray['date']='';
				$ownerresponsearray['comment']=$responsebody;
				$ownerresponsearray = json_encode($ownerresponsearray);
			} else {
				$ownerresponsearray ='';
			}
			
			
			if($rating>0){
				$review_length = str_word_count($rtext);
				if (extension_loaded('mbstring')) {
					$review_length_char = mb_strlen($rtext);
				} else {
					$review_length_char = strlen($rtext);
				}
				if($review_length_char>0 && $review_length<1){
								$review_length = 1;
							}
				

				$furlrev = 'https://www.vrbo.com/users/show/'.trim($reviewer_id);
				$reviewsarraytemp[] = [
							'reviewer_name' => trim($user_name),
							'reviewer_id' => trim($reviewer_id),
							'userpic' => $userimage,
							'rating' => $rating,
							'date' => $datesubmitted,
							'review_text' => trim($rtext),
							'type' => $type,
							'language_code' => $language_code,
							'location' => $location,
							'from_url_review' => $from_url_review,
							'owner_response' => $ownerresponsearray,
				];
	
				
				$review_length ='';
				$review_length_char='';
			}
		}
		
				
				//loop reviews and build new array of just what we need
				$reviewsarrayfinal = Array();
				foreach ($reviewsarraytemp as $item) {
					 $reviewsarrayfinal[] = [
					 'reviewer_name' => trim($item['reviewer_name']),
					 'reviewer_id' => trim($item['reviewer_id']),
					 'reviewer_email' => '',
					 'userpic' => $item['userpic'],
					 'rating' => $item['rating'],
					 'updated' => $item['date'],
					 'review_text' => $item['review_text'],
					 'review_title' => '',
					 'from_url' => $listedurl,
					 'from_url_review' => $item['from_url_review'],
					 'language_code' =>$item['language_code'],
					 'location' => $item['location'],
					 'recommendation_type' => '',
					 'company_title' =>  '',
					 'company_url' => '',
					 'company_name' => '',
					 'meta_data' => '',
					 'mediaurlsarrayjson' => '',
					 'owner_response' => $item['owner_response'],
					 ];
				}
				//print_r($reviewsarrayfinal);
				//die();
				$result['reviews'] = $reviewsarrayfinal;
				//we can currently only get one page of reviews so we send stop command back
				$result['stoploop']='stop';
			
  
 		return $result;
	}
		//for calling remote get and returning array of reviews to insert
	public function wprp_getapps_getrevs_page_zillow($type,$listedurl,$pagenum,$perpage,$savedpageid,$nhful,$fid,$blockstoinsert){
		$result['ack']='success';
		$errormsg='';
		$reviewsarray = Array();
		
		$businessId = $listedurl;
		$sindex = 0;
		//$apikey = get_option('wprevpro_birdeyeapikey_val');
		$result['avg']='';
		$result['total']='';
			

		//https://www.zillow.com/reviews/write/?s=X1-ZUvu3i2bzw4m4p_46au8
		//https://www.zillow.com/profile-page/api/public/v1/reviews?encodedZuid=X1-ZUvu3i2bzw4m4p_46au8&profileTypeIds=1%2C2%2C12%2C16&page=1&size=5&sortType=2&sortOrder=2


		$getreviews = false;
		$errormsg='';
		$callurl = $listedurl;
		$reviewsarraytemp = Array();
		if (filter_var($callurl, FILTER_VALIDATE_URL)) {
			$stripvariableurl = strtok($callurl, '?');
			$stripvariableurl = stripslashes($stripvariableurl);
			//check url to find out what kind of review page this is
			if (strpos($stripvariableurl, '/write/') !== false) {
				
				//find the id if this is the first page
				if($pagenum==1){
					$url_components = parse_url($callurl);
					parse_str($url_components['query'], $urldetails);
					
					//print_r($urldetails);
					$id = $urldetails['s'];
					update_option( 'wprevpro_zillowid', $id, false );
				} else {
					$id = get_option('wprevpro_zillowid');
				}
				//$rurl ="https://www.zillow.com/ajax/review/ReviewDisplayJSONGetPage.htm?id=".$id."&size=50&page=".$pagenum."&page_type=received&moderator_actions=0&reviewee_actions=0&reviewer_actions=0&proximal_buttons=1&hasImpersonationPermission=0&service=&sort=1";
				
				
				$rurl ="https://www.zillow.com/profile-page/api/public/v1/reviews?encodedZuid=".$id."&profileTypeIds=1%2C2%2C12%2C16&page=".$pagenum."&size=10&sortType=2&sortOrder=2";
				
				$urlvalue = esc_url_raw($rurl);
				
				//if this is a realtor page
				if(isset($id) && $id!=''){
					$getreviews = true;
				} else {
					$errormsg = $errormsg . __(' Unable to find the Zillow reviews URL. Contact support or try using a Review Funnel.','wp-review-slider-pro');
					$this->errormsg = $errormsg;
				}
			
			$result['callurl'] =$urlvalue;
							
			if($getreviews){
				
				//now actually get the reviews
				
				$data = wp_remote_get( $urlvalue );
				if ( is_wp_error( $data ) ) 
				{
					$response['error_message'] 	= $data->get_error_message();
					$reponse['status'] 		= $data->get_error_code();
					print_r($response);
					die();
				}
				if ( is_array( $data ) ) {
				  $header = $data['headers']; // array of http header lines
				  $body = $data['body']; // use the content
				}
					
				$pagedata = json_decode( $body, true );
				if(!is_array($pagedata) || count($pagedata)<1){
					$fileurlcontents =$this->file_get_contents_curl_browser($urlvalue,'');
					//echo $fileurlcontents;
					$html = wppro_str_get_html($fileurlcontents);
					$pagedata = json_decode( $html, true );
				}
				
				//print_r($pagedata);
				//die();
				
				if(isset($pagedata['filters'][0]['count'])){
						$result['total']=$pagedata['filters'][0]['count'];
				}
				
				// Find reviews
				$reviewsarray = $pagedata['reviews'];

				foreach ($reviewsarray as $review) {
						$user_name='';
						$userimage='';
						$rating='';
						$datesubmitted='';
						$rtext='';

						$from_url_review='';
						$company_title='';
						$unique_id='';
						$reviewer_id='';
						$title='';
						$reviewer_email='';
						$userpic='';
						$from_url_review='';
						$from_url='';
						$location='';
						
						// Find user_name
						if($review['reviewer']['screenName']){
							$user_name = $review['reviewer']['screenName'];
						}
						
						// Find userimage ui_avatar
						$userimage = '';

						// find rating
						if($review['rating']){
							$rating = intval($review['rating']);
						}

						// find date created_at
						if($review['createDate']){
							//11/14/2018
							$datesubmitted = $review['createDate'];
						}
						
						// find text
						if($review['reviewComment']){
							$rtext = $review['reviewComment'];
						}
						
						// find reviewer_id
						if($review['reviewer']['encodedZuid']){
							$unique_id = $review['reviewer']['encodedZuid'];
						}
						
						// find text
						if($review['reviewId']){
							$unique_id = $review['reviewId'];
						}
						
						$meta_json ="";
						$meta_data = Array();
						if($review['subRatings']){
							$meta_data['subRatings'] = json_encode($review['subRatings']);
						}
						if($review['workDescription']){
							$meta_data['workDescription'] = $review['workDescription'];
						}
						if(count($meta_data)>0){
							$meta_json = json_encode($meta_data);
						}
					
						if($rating>0){
							$reviewsarraytemp[] = [
									'reviewer_name' => trim($user_name),
									'rating' => $rating,
									'date' => $datesubmitted,
									'review_text' => trim($rtext),
									'reviewer_id' => trim($reviewer_id),
									'unique_id' => trim($unique_id),
									'meta_data' => $meta_json,
									'type' => 'Zillow'
							];
						}
				}
			}
			//print_r($reviewsarraytemp);
			//die();
			//loop reviews and build new array of just what we need
			$reviewsarrayfinal = Array();
			foreach ($reviewsarraytemp as $item) {
				 $reviewsarrayfinal[] = [
				 'reviewer_name' => trim($item['reviewer_name']),
				 'reviewer_id' => $item['reviewer_id'],
				 'reviewer_email' => '',
				 'userpic' => '',
				 'rating' => $item['rating'],
				 'updated' => $item['date'],
				 'review_text' => $item['review_text'],
				 'review_title' => '',
				 'from_url_review' => '',
				 'language_code' => '',
				 'unique_id' => $item['unique_id'],
				 'location' => '',
				 'recommendation_type' => '',
				 'company_title' =>  '',
				 'company_url' => '',
				 'company_name' => '',
				 'meta_data' => $item['meta_data'],
				 ];
			}

			//print_r($reviewsarrayfinal);
			//die();
			
			$result['reviews'] = $reviewsarrayfinal;
			} else if(strpos($stripvariableurl, '/lender-profile/') !== false){

				//for lender profile
				//$stripvariableurl
				$errormsg = $errormsg . __(' Sorry, this does not currently work for a lender profile url. You can download Lender Reviews with the Review Funnels tab above.','wp-review-slider-pro');
				$this->errormsg = $errormsg;
					
					
			}
		} else {
			$errormsg='Please enter a valid URL.';
		}
		
		$result['ack'] =$errormsg;
		if(count($reviewsarrayfinal)<10){
			//no need to loop again.
			$result['stoploop'] = "stop";
		}
		

		return $result;
	}
	
	//for calling remote get and returning array of reviews to insert
	public function wprp_getapps_getrevs_page_yotpo($type,$listedurl,$pagenum,$perpage,$savedpageid,$nhful,$fid,$blockstoinsert){
		$result['ack']='success';
		$errormsg='';
		$reviewsarray = Array();
		
		$client_id = $listedurl;
		$sindex = 0;
		$clientsecret = get_option('wprevpro_yotposecretkey_val');
		$usertoken = get_option('wprevpro_yotpousertoken');
		$result['avg']='';
		$result['total']='';
			
		if($client_id=='' || $clientsecret==''){
			//must have been an error
			$results['ack'] ='error';
			$results['ackmsg'] ='Error 0001: Make sure to enter your API Key and Business ID from Birdeye.';
			$results = json_encode($results);
			echo $results;
			die();
		}

		if($pagenum >1){
			$sindex = $pagenum*100;
		}
		
		//first make call to get user token if on page 1 or if not set yet.
		if($pagenum<2 || $usertoken==''){
			//https://api.yotpo.com/oauth/token?grant_type=client_credentials&client_id=2396MKzUZbAPHI0daFTEmeMfIa8hpLgu7e899k4l&client_secret=3iD4fxhnXZwhgIjztEyVxniBOM25pSQw36AIHfYE
			
			$callurl = "https://api.yotpo.com/oauth/token?grant_type=client_credentials&client_id=".$client_id."&client_secret=".$clientsecret;
			
			$response = wp_remote_post( $callurl, array(
					'method'      => 'POST',
					'timeout'     => 45,
					'redirection' => 5,
					'httpversion' => '1.0',
					'blocking'    => true,
					'headers'     => array(),
					'body'        => array(),
					'cookies'     => array()
					)
				);
			if ( is_array( $response ) && ! is_wp_error( $response ) ) {
				$headers = $response['headers']; // array of http header lines
				$body    = $response['body']; // use the content
			} else {
				$result['ack']=esc_html__('Error: Can not use remote post on this url:', 'wp-review-slider-pro').' '.$callurl;
			}
			$usertokenarray = json_decode($body,true);
			
			if(isset($usertokenarray['access_token'])){
				$usertoken = $usertokenarray['access_token'];
				update_option('wprevpro_yotpousertoken',$usertoken);
			}
			
			//also need to find avg and total here since this is first page.
			$callurl = "https://api.yotpo.com/products/".$client_id."/yotpo_site_reviews/bottomline";
			$response = wp_remote_get( $callurl, array( 'timeout' => 10,
					'headers' => array( 'Content-Type' => 'application/json',
                               'Accept'=> 'application/json' ) 
					));
			if ( is_array( $response ) && ! is_wp_error( $response ) ) {
				$headers = $response['headers']; // array of http header lines
				$body    = $response['body']; // use the content
			} else {
				$result['ack']=esc_html__('Error: Can not use remote get on this url:', 'wp-review-slider-pro').' '.$callurl;
			}
			$reviewsummary = json_decode($body,true);

			if($reviewsummary['response']['bottomline']){
				$result['avg']=$reviewsummary['response']['bottomline']['average_score'];
				$result['total']=$reviewsummary['response']['bottomline']['total_reviews'];
			}
			
		}
		if ( $usertoken=='') {
			$results['ack'] ='error';
			$results['ackmsg'] ='Error 0001: Can not find user token. ';
			$results = json_encode($results);
			echo $results;
			die();
		}
		
		$endpoint = "https://api.yotpo.com/v1/apps/".$client_id."/reviews?utoken=".$usertoken."&count=50&page=".$pagenum;

		$args = array(
					'timeout'     => 50,
					'sslverify' => false
				); 
		$response = wp_remote_get( $endpoint, $args );
				
		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			$results['ack'] ='error';
			$results['ackmsg'] ='Error 0002: Something went wrong. '.$error_message;
			$results = json_encode($results);
			echo $results;
			die();
		}
		
		$fileurlcontents = $response['body'];	
			
		$reviewcontainerdiv = json_decode($fileurlcontents,true);
		
		foreach ($reviewcontainerdiv['reviews'] as $review) {
				$user_name='';
				$userimage='';
				$rating='';
				$datesubmitted='';
				$rtext='';
				$from_url_review='';
				$company_title='';
				$unique_id='';
				$reviewer_id='';
				$title='';
				$reviewer_email='';
				$userpic='';
				$from_url_review='';
				$from_url='';
				$location='';
			
			// Find unique id
			if($review['id']){
				$unique_id=$review['id'];
			}
			
			// Find user_name
			if($review['name']){
				$user_name=$review['name'];
			}

			if($review['email']){
				$reviewer_email=$review['email'];
			}

			//find rating
			if($review['score']){
				$rating=$review['score'];
			}
			
			//find date created_at
			if($review['created_at']){
				$datesubmitted=$review['created_at'];
			}
			
			//find title
			if($review['title']){
				$title=$review['title'];
			}
			
			//find text
			if($review['content']){
				$rtext=$review['content'];
			}
			
			$meta_json ="";
			$meta_data = Array();
			if($review['votes_up']){
				$meta_data['votes_up'] = json_encode($review['votes_up']);
			}
			if($review['votes_down']){
				$meta_data['votes_down'] = json_encode($review['votes_down']);
			}
			if($review['sentiment']){
				$meta_data['sentiment'] = json_encode($review['sentiment']);
			}
			if($review['sku']){
				$meta_data['sku'] = json_encode($review['sku']);
			}
			if($review['reviewer_type']){
				$meta_data['reviewer_type'] = json_encode($review['reviewer_type']);
			}
			if(count($meta_data)>0){
				$meta_json = json_encode($meta_data);
			}


			if($rating>0){
				$reviewsarray[] = [
					 'reviewer_name' => trim($user_name),
					 'reviewer_id' => trim($reviewer_id),
					 'reviewer_email' => $reviewer_email,
					 'userpic' => $userpic,
					 'rating' => $rating,
					 'updated' => $datesubmitted,
					 'review_text' => trim($rtext),
					 'review_title' => trim($title),
					 'from_url' => $from_url,
					 'from_url_review' => $from_url_review,
					 'language_code' => '',
					 'unique_id' => $unique_id,
					 'location' => $location,
					 'recommendation_type' => '',
					 'company_title' =>  '',
					 'company_url' => '',
					 'company_name' => '',
					 'mediaurlsarrayjson' => '',
					 'owner_response' => '',
					 'meta_data' => $meta_json,
					 ];
			}
		}

		$result['reviews'] = $reviewsarray;
				
		//die();

		return $result;
	}
	
	
	//==========helper functions================
	private function get_string_between($string, $start, $end, $end2=''){
		$string = ' ' . $string;
		$ini = strpos($string, $start);
		if ($ini == 0) return '';
		$ini += strlen($start);
		$len = strpos($string, $end, $ini) - $ini;
		$len2 =500000;
		if($end2!=''){
			$len2 = strpos($string, $end2, $ini) - $ini;
		}
		if($len2<$len){
			$len=$len2;
		}
		return substr($string, $ini, $len);
	}
		//for using curl instead of fopen
	private function file_get_contents_curl($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
	
	private function file_get_contents_curl_browser($url,$cookieval,$auth='') {
		$agent= 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:60.0) Gecko/20100101 Firefox/60.0';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_VERBOSE, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, $agent);
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							'authority: '.$auth.'',
							'pragma: no-cache',
							'cache-control: no-cache',
							'upgrade-insecure-requests: 1',
							'user-agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36',
							'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3', 'accept-encoding: gzip, deflate, br',
							'accept-language: en-US,en;q=0.9',
							'cookie: '.$cookieval.''
					));
		curl_setopt($ch, CURLOPT_URL,$url);
		$result=curl_exec($ch);
		curl_close($ch);
		return $result;
	}
	//for returning api URL for Airbnb
	private function getreviewurl_airbnb($urlvalue, $listing_id, $listtype, $limit=50, $offset=0){
		
		//echo "testhere<br>";
		//echo $urlvalue."<br>";
		//echo $listing_id."<br>";
		//echo $listtype."<br>";
		
		$response = wp_remote_get( $urlvalue );
		if ( is_array( $response ) ) {
		  $header = $response['headers']; // array of http header lines
		  $fileurlcontents = $response['body']; // use the content
		} else {
			echo esc_html__('Error finding reviews. Please contact plugin support.', 'wp-review-slider-pro');
			die();
		}
		
		//echo $fileurlcontents;

		//going to try to pull the API key
		$dom  = new DOMDocument();
		libxml_use_internal_errors( 1 );
		$dom->loadHTML( $fileurlcontents );

		$xpath = new DOMXpath( $dom );

		$totalrevessearch = $xpath->query('//div[contains(@class,"_vy3ibx")]');
		if($totalrevessearch->item(0) !== null){
		$temptotalreviews = intval($totalrevessearch->item(0)->nodeValue);
		//update the badge total and average here
		$reviewurl['totalreviews'] = $temptotalreviews;
		}

		
		$titleNode = $xpath->query('//title');
		
		if($titleNode->item(0)){
			$temptitle = $titleNode->item(0)->nodeValue;
			$pieces = explode("-", $temptitle);
			$reviewurl['pagetitle']=$pieces[0];
		} else {
			$reviewurl['pagetitle']='';
		}

		$items = $xpath->query( '//meta/@content' );
		//$items = $dom->getElementsByTagName("meta");
		$key='';
		$findme='"api_config":{';
		if( $items->length < 1 )
		{
			die( __('Error 1: No key found.', 'wp-review-slider-pro') );
		} else {
			//print_r($items);
			foreach ($items as $item) {
				if(strpos($item->nodeValue,$findme)){
					$nodearray = json_decode( $item->nodeValue, true );
					$key = $nodearray['api_config']['key'];
					$locale = $nodearray['locale'];
					//echo $key;
					//end the loop early
					break;
				}
			}
		}
		
		if($key==""){
			//first shorten the stringtotime
			$findme = '","api_config":';
			$pos = strpos($fileurlcontents, $findme);
			//echo "<br>".$pos;
			$shortstring = substr($fileurlcontents,$pos-20,200);
			//echo "<br>".$shortstring;
			//no key found using dom method, try getting with string method
			$findme = 'api","key":"';
			$pos = strpos($shortstring, $findme);
			//echo "<br>".$pos;
			$tempendstring = substr($shortstring,$pos,100);
			//echo "<br>".$tempendstring;
			$end = strpos($tempendstring, '"},');
			//echo "<br>".$end;
			$key = substr($shortstring,$pos+12,$end-12);
			//echo "<br>".$key;
			//now fine locale
			$findme = '"locale":"';
			$firstpos = strpos($shortstring, $findme);
			//echo "<br>".$firstpos;
			$locale = substr($shortstring,$firstpos+10,2);
			//echo "<br>".$locale;
			//die();
		}

		if($key==""){
			die( __('Error 2: No key found. This could be a temporary error or an incorrectly input URL. Please check your Airbnb URL.', 'wp-review-slider-pro') );
		}
		//print_r($nodearray);
		//die();
		
		//use the key and the listing id to find review data					
		$rurl = "https://www.airbnb.com/api/v2/reviews?key=".$key."&locale=".$locale."&listing_id=".$listing_id."&role=guest&_format=for_p3&_order=recent";
		
		$reviewurl['url'] = esc_url_raw($rurl);
		
		if($listtype=='experience'){
			//$rurl = "https://www.airbnb.com/api/v2/reviews?key=".$key."&locale=".$locale."&reviewable_id=".$listing_id."&reviewable_type=MtTemplate&role=guest&_format=for_experiences_guest_flow&_order=recent";
			//$rurl = "https://www.airbnb.com/api/v2/reviews?key=".$key."&locale=".$locale."&reviewable_id=".$listing_id."&reviewable_type=MtTemplate&role=guest&_order=recent";
			
			$rurl ='https://www.airbnb.com/api/v3/ExperiencesPdpReviews?operationName=ExperiencesPdpReviews&variables={"request":{"fieldSelector":"for_p3_translation_only","entityId":"ExperienceListing:'.$listing_id.'","offset":"'.$offset.'","limit":'.$limit.',"first":'.$limit.',"showingTranslationButton":false}}&extensions={"persistedQuery":{"version":1,"sha256Hash":"c2e483a512971b1e4a3b324039d1706bd8591ea1589f2c4e93534479fdd7c582"}}';
						
			$reviewurl['url'] = $rurl;
		}
		
		$avg = $this->get_string_between($fileurlcontents, 'Rated ', ' out of 5 from');
		if(strlen($avg)>0 && strlen($avg)<8){
			floatval($avg);
		} else {
			$avg ='';
		}

		$reviewurl['avg'] = $avg;
		$reviewurl['key'] = $key;
		
		//print_r($reviewurl);
		
		return $reviewurl;
		
	}
	
  }
?>