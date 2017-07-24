<?php
/*
  Plugin Name: Anti-Spam by CleanTalk
  Plugin URI: http://cleantalk.org
  Description: Max power, all-in-one, no Captcha, premium anti-spam plugin. No comment spam, no registration spam, no contact spam, protects any WordPress forms. Formerly Anti-Spam by CleanTalk. 
  Version: 5.71
  Author: СleanTalk <welcome@cleantalk.org>
  Author URI: http://cleantalk.org
*/
$cleantalk_plugin_version='5.71';
$ct_agent_version = 'wordpress-571';
$cleantalk_executed=false;
$ct_sfw_updated = false;

define('CLEANTALK_REMOTE_CALL_SLEEP', 10); // Minimum time between remote call

if(!defined('CLEANTALK_PLUGIN_DIR')){
	
    global $ct_options, $ct_data, $pagenow;
	
    define('CLEANTALK_PLUGIN_DIR', plugin_dir_path(__FILE__));
    
    require_once( CLEANTALK_PLUGIN_DIR . 'inc/cleantalk-common.php');
    require_once( CLEANTALK_PLUGIN_DIR . 'inc/cleantalk-widget.php');
	require_once( CLEANTALK_PLUGIN_DIR . 'lib/CleantalkCron.php');
		
    $ct_options=ct_get_options();
    $ct_data=ct_get_data();	
	
	// Self cron
	if(!defined('DOING_CRON') || (defined('DOING_CRON') && DOING_CRON !== true)){
		
		$ct_cron = new CleantalkCron();
		$ct_cron->checkTasks();
		
		if(!empty($ct_cron->tasks_to_run)){
			
			define('CT_CRON', true); // Letting know functions that they are running under CT_CRON
			$ct_cron->runTasks();
			unset($ct_cron);
			
		}
	}
	
	//Delete cookie for admin trial notice
	add_action('wp_logout', 'ct_wp_logout');
		
	// Early checks
	// Facebook
	if (isset($ct_options['general_contact_forms_test']) && $ct_options['general_contact_forms_test'] == 1
		&& (!empty($_POST['action']) && $_POST['action'] == 'fb_intialize')
		&& !empty($_POST['FB_userdata'])
	){
		require_once(CLEANTALK_PLUGIN_DIR . 'inc/cleantalk-public.php');
		if (ct_is_user_enable()){
			ct_cookies_test();
			$ct_check_post_result=false;
			ct_registration_errors(null);
		}
		
	}
	
    if(isset($_SERVER['REQUEST_URI']) && stripos($_SERVER['REQUEST_URI'],'admin-ajax.php')!==false && sizeof($_POST)>0 && isset($_GET['action']) && $_GET['action']=='ninja_forms_ajax_submit')
    	$_POST['action']='ninja_forms_ajax_submit';
    
	// SFW start
	$value = (isset($ct_options['spam_firewall']) ? intval($ct_options['spam_firewall']) : 0);    
    /*
        Turn off the SpamFireWall if current url in the exceptions list. 
    */
    if ($value == 1 && isset($cleantalk_url_exclusions) && is_array($cleantalk_url_exclusions)) {
        foreach ($cleantalk_url_exclusions as $v) {
            if (stripos($_SERVER['REQUEST_URI'], $v) !== false) {
                $value = 0;
                break;
            }
        } 
    }

    /*
        Turn off the SpamFireWall for WordPress core pages
    */
    $ct_wordpress_core_pages = array(
        '/wp-admin',
        '/feed'
    );
    if ($value == 1) {
		if(!empty($_SERVER['REQUEST_URI'])){
			foreach ($ct_wordpress_core_pages as $v) {
				if (stripos($_SERVER['REQUEST_URI'], $v) !== false) {
					$value = 0;
					break;
				}
			}
		}
    }
	
	// SpamFireWall check
	if($value==1 && !is_admin() || $value==1 && defined( 'DOING_AJAX' ) && DOING_AJAX && $_SERVER["REQUEST_METHOD"] == 'GET'){
		
		include_once(CLEANTALK_PLUGIN_DIR . "lib/CleantalkSFW.php");
		
	   	$is_sfw_check = true;
		$sfw = new CleantalkSFW();
		$sfw_ip = $sfw->cleantalk_get_real_ip();		

		foreach($sfw_ip as $ct_cur_ip){
	    	if(isset($_COOKIE['ct_sfw_pass_key']) && $_COOKIE['ct_sfw_pass_key'] == md5($ct_cur_ip.$ct_options['apikey'])){
				$is_sfw_check=false;
	    		if(isset($_COOKIE['ct_sfw_passed'])){
					$sfw->sfw_update_logs($ct_cur_ip, 'passed');
					$ct_data['sfw_counter']['all']++;
					update_option('cleantalk_data', $ct_data);
					if(!headers_sent())
						setcookie ('ct_sfw_passed', '0', 1, "/");
	    		}
	    	}else{
				$is_sfw_check=true;
			}
	    } 
    	if($is_sfw_check){
    		$sfw->check_ip();
    		if($sfw->result){
				$sfw->sfw_update_logs($sfw->blocked_ip, 'blocked');
				$ct_data['sfw_counter']['blocked']++;
				update_option('cleantalk_data', $ct_data);
    			$sfw->sfw_die($ct_options['apikey']);
    		}else{
				if(!empty($ct_options['set_cookies']))
					setcookie ('ct_sfw_pass_key', md5($sfw->passed_ip.$ct_options['apikey']), 0, "/");
			}
    	}
		unset($is_sfw_check, $sfw, $sfw_ip, $ct_cur_ip);
    }
	
	// Remote calls		
	if(isset($_GET['spbc_remote_call_token'], $_GET['spbc_remote_call_action'], $_GET['plugin_name']) && ($_GET['plugin_name'] == 'antispam' || $_GET['plugin_name'] == 'anti-spam')){
				
		if(isset($ct_data['last_remote_call']) && time() - $ct_data['last_remote_call'] < CLEANTALK_REMOTE_CALL_SLEEP){
			echo "FAIL TOO_MANY_ATTEMPTS";
			die();
		}else{
			$ct_data['last_remote_call'] = time();
			update_option('cleantalk_data', $ct_data);
		}	
		
		$spbc_remote_call_token = md5($ct_options['apikey']);
		
		if($_GET['spbc_remote_call_token'] == $spbc_remote_call_token){
						
			if($_GET['spbc_remote_call_action'] == 'close_renew_banner'){
				$ct_data['show_ct_notice_trial'] = 0;
				$ct_data['show_ct_notice_renew'] = 0;
				update_option('cleantalk_data', $ct_data);
				CleantalkCron::updateTask('check_account_status', 'ct_account_status_check',  86400);
				echo "OK";
				die();
			}elseif($_GET['spbc_remote_call_action'] == 'sfw_update'){
				$rc_result = ct_sfw_update();
				echo $rc_result === true ? 'OK' : 'FAIL '.$rc_result;
				die();
			}elseif($_GET['spbc_remote_call_action'] == 'sfw_send_logs'){
				$rc_result = ct_sfw_send_logs();
				echo $rc_result === true ? 'OK' : 'FAIL '.$rc_result;
				die();
			}
		}else{
			echo "FAIL WRONG_TOKEN";
			die();
		}
	}
	
    // Activation/deactivation functions must be in main plugin file.
    // http://codex.wordpress.org/Function_Reference/register_activation_hook
    register_activation_hook( __FILE__, 'ct_activation' );
    register_deactivation_hook( __FILE__, 'ct_deactivation' );
	
    // Redirect admin to plugin settings.
    if(!defined('WP_ALLOW_MULTISITE') || defined('WP_ALLOW_MULTISITE') && WP_ALLOW_MULTISITE == false)
    	add_action('admin_init', 'ct_plugin_redirect');
       
    // After plugin loaded - to load locale as described in manual
    add_action('plugin_loaded', 'ct_plugin_loaded' );
    
    if(	!empty($ct_options['use_ajax']) && 
    	stripos($_SERVER['REQUEST_URI'],'.xml')===false && 
    	stripos($_SERVER['REQUEST_URI'],'.xsl')===false)
    {
		add_action( 'wp_ajax_nopriv_ct_get_cookie', 'ct_get_cookie',1 );
		add_action( 'wp_ajax_ct_get_cookie', 'ct_get_cookie',1 );
	}
    	
	if(isset($ct_options['show_link']) && intval($ct_options['show_link']) == 1)
		add_action('comment_form_after', 'ct_show_comment_link');

	if(is_admin()){
		require_once(CLEANTALK_PLUGIN_DIR . 'inc/cleantalk-comments.php');
		require_once(CLEANTALK_PLUGIN_DIR . 'inc/cleantalk-users.php');
	}
	
	// Admin panel actions
    if (is_admin()||is_network_admin()){
		
		require_once(CLEANTALK_PLUGIN_DIR . 'inc/cleantalk-admin.php');
		
		if (!(defined( 'DOING_AJAX' ) && DOING_AJAX)){
			add_action('admin_init', 'ct_admin_init', 1);
			add_action('admin_menu', 'ct_admin_add_page');
			if(is_network_admin())
				add_action('network_admin_menu', 'ct_admin_add_page');

			add_action('admin_notices', 'cleantalk_admin_notice_message');
			add_action('network_admin_notices', 'cleantalk_admin_notice_message');
			
			//Show widget only if not IP license
			if(empty($ct_data['moderate_ip']))
				add_action('wp_dashboard_setup', 'ct_dashboard_statistics_widget' );
			
		}
		if (defined( 'DOING_AJAX' ) && DOING_AJAX||isset($_POST['cma-action'])){
			
			// Feedback for comments
			if(isset($_POST['action']) && $_POST['action'] == 'ct_feedback_comment'){
				add_action( 'wp_ajax_nopriv_ct_feedback_comment', 'ct_comment_send_feedback',1 );
				add_action( 'wp_ajax_ct_feedback_comment', 'ct_comment_send_feedback',1 );
			}
			if(isset($_POST['action']) && $_POST['action'] == 'ct_feedback_user'){
				add_action( 'wp_ajax_nopriv_ct_feedback_user', 'ct_user_send_feedback',1 );
				add_action( 'wp_ajax_ct_feedback_user', 'ct_user_send_feedback',1 );
			}
			
			$cleantalk_hooked_actions = array();
			$cleantalk_ajax_actions_to_check = array();
			require_once(CLEANTALK_PLUGIN_DIR . 'inc/cleantalk-public.php');
			require_once(CLEANTALK_PLUGIN_DIR . 'inc/cleantalk-ajax.php');
			
			// Do check for AJAX if Unknown action or Known action with mandatory check
			if(	isset($_POST['action']) &&
				defined('LOGGED_IN_COOKIE') && 
				!isset($_COOKIE[LOGGED_IN_COOKIE]) &&
				(!in_array($_POST['action'], $cleantalk_hooked_actions) || in_array($_POST['action'], $cleantalk_ajax_actions_to_check))
			){
				ct_ajax_hook();			
			}
            //
            // Some of plugins to register a users use AJAX context.
            //
            add_filter('registration_errors', 'ct_registration_errors', 1, 3);
			add_filter('registration_errors', 'ct_check_registration_erros', 999999, 3);
            add_action('user_register', 'ct_user_register');
			
			//QAEngine Theme answers
			if (intval($ct_options['general_contact_forms_test']))
				add_filter('et_pre_insert_answer', 'ct_ajax_hook', 1, 1);
		}
		
		require_once(CLEANTALK_PLUGIN_DIR . 'inc/cleantalk-public.php');
		
		//Bitrix24 contact form
		if (ct_is_user_enable()) {
			ct_cookies_test();

			if (isset($ct_options['general_contact_forms_test']) && $ct_options['general_contact_forms_test'] == 1 &&
				!empty($_POST['your-phone']) &&
				!empty($_POST['your-email']) &&
				!empty($_POST['your-message'])
			){
				$ct_check_post_result=false;
				ct_contact_form_validate();
			}
		}

		add_action('admin_enqueue_scripts', 'ct_enqueue_scripts');

		// Sends feedback to the cloud about comments
		// add_action('wp_set_comment_status', 'ct_comment_send_feedback', 10, 2);

		// Sends feedback to the cloud about deleted users
	    if($pagenow=='users.php')
	    	add_action('delete_user', 'ct_delete_user', 10, 2);
		
	    if($pagenow=='plugins.php' || (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'],'plugins.php') !== false)){
			
	    	add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'ct_plugin_action_links', 10, 2);
			add_filter('network_admin_plugin_action_links_'.plugin_basename(__FILE__), 'ct_plugin_action_links', 10, 2);
			
	    	add_filter('plugin_row_meta', 'ct_register_plugin_links', 10, 2);
	    }
		add_action('updated_option', 'ct_update_option'); // param - option name, i.e. 'cleantalk_settings'
	
	// Public pages actions
    }else{
		
		require_once(CLEANTALK_PLUGIN_DIR . 'inc/cleantalk-public.php');
		
		add_action('wp_enqueue_scripts', 'ct_enqueue_scripts_public');
		
		// Init action.
		add_action('plugins_loaded', 'ct_init', 1);
		
		// Comments
		add_filter('preprocess_comment', 'ct_preprocess_comment', 1, 1);     // param - comment data array
		add_filter('comment_text', 'ct_comment_text' );

		// Registrations
		add_action('register_form','ct_register_form');
		add_filter('registration_errors', 'ct_registration_errors', 1, 3);
		add_filter('registration_errors', 'ct_check_registration_erros', 999999, 3);
		add_action('user_register', 'ct_user_register');

		// Multisite registrations
		add_action('signup_extra_fields','ct_register_form');
		add_filter('wpmu_validate_user_signup', 'ct_registration_errors_wpmu', 10, 3);

		// Login form - for notifications only
		add_filter('login_message', 'ct_login_message');
		
		// Comments output hook
		add_filter('wp_list_comments_args', 'ct_wp_list_comments_args');
		
		// Ait-Themes fix
		if(isset($_GET['ait-action']) && $_GET['ait-action']=='register'){
			$tmp=$_POST['redirect_to'];
			unset($_POST['redirect_to']);
			ct_contact_form_validate();
			$_POST['redirect_to']=$tmp;
		}
    }
}

/**
 * On activation, set a time, frequency and name of an action hook to be scheduled.
 */
if (!function_exists ( 'ct_activation')) {
    function ct_activation() {
		
		global $wpdb;
		
		$wpdb->query("CREATE TABLE IF NOT EXISTS `".$wpdb->base_prefix."cleantalk_sfw` (
			`network` int(11) unsigned NOT NULL,
			`mask` int(11) unsigned NOT NULL,
			INDEX (  `network` ,  `mask` )
			) ENGINE = MYISAM ;"
		);
			
		$wpdb->query("CREATE TABLE IF NOT EXISTS `".$wpdb->base_prefix."cleantalk_sfw_logs` (
			`ip` VARCHAR(15) NOT NULL,
			`all_entries` INT NOT NULL,
			`blocked_entries` INT NOT NULL,
			`entries_timestamp` INT NOT NULL,
			PRIMARY KEY (`ip`)) 
			ENGINE = MYISAM;"
		);
		
		// Cron tasks
		CleantalkCron::addTask('check_account_status', 'ct_account_status_check',  3600,  time()+1800); // Checks account status
		CleantalkCron::addTask('delete_spam_comments', 'ct_delete_spam_comments',  3600,  time()+3500); // Formerly ct_hourly_event_hook()
		CleantalkCron::addTask('send_feedback',        'ct_send_feedback',         3600,  time()+3500); // Formerly ct_hourly_event_hook()
		CleantalkCron::addTask('sfw_update',           'ct_sfw_update',            86400, time()+43200);// SFW update
		CleantalkCron::addTask('send_sfw_logs',        'ct_sfw_send_logs',         3600,  time()+1800); // SFW send logs
		CleantalkCron::addTask('get_brief_data',       'cleantalk_get_brief_data', 86400, time()+3500); // Get data for dashboard widget
		
		// Additional options
        add_option('ct_plugin_do_activation_redirect', true);
		add_option('ct_installing', true);
		
		// Updating SFW
        ct_sfw_update();
    }
}

/**
 * On deactivation, clear schedule.
 */
if (!function_exists ( 'ct_deactivation')) {
    function ct_deactivation() {
	
		global $wpdb;
		
		// Deleting SFW tables
		$wpdb->query("DROP TABLE IF EXISTS `".$wpdb->base_prefix."cleantalk_sfw`;");
		$wpdb->query("DROP TABLE IF EXISTS `".$wpdb->base_prefix."cleantalk_sfw_logs`;");
		
		// Deleting cron entries
		delete_option('cleantalk_cron'); 
		
    }
}

/**
 * Redirects admin to plugin settings after activation. 
 */
function ct_plugin_redirect()
{	
	if (get_option('ct_plugin_do_activation_redirect', false) && !isset($_GET['activate-multi'])){
		delete_option('ct_plugin_do_activation_redirect');
		wp_redirect("options-general.php?page=cleantalk");
	}
}

function ct_add_event($event_type)
{
	global $ct_data,$cleantalk_executed;
	
    //
    // To migrate on the new version of ct_add_event(). 
    //
    switch ($event_type) {
        case '0': $event_type = 'no';break;
        case '1': $event_type = 'yes';break;
    }

	$ct_data = ct_get_data();
	$current_hour = intval(date('G'));
	
	// Updating current hour
	if($current_hour!=$ct_data['current_hour']){
		$ct_data['current_hour']=$current_hour;
		$ct_data['array_accepted'][$current_hour]=0;
		$ct_data['array_blocked'][$current_hour]=0;
	}
	
	//Add 1 to counters
	if($event_type=='yes'){
		$ct_data['array_accepted'][$current_hour]++;
		$ct_data['all_time_counter']['accepted']++;
		$ct_data['user_counter']['accepted']++;
	}
	if($event_type=='no'){
		$ct_data['array_blocked'][$current_hour]++;
		$ct_data['all_time_counter']['blocked']++;
		$ct_data['user_counter']['blocked']++;
	}	
	
	update_option('cleantalk_data', $ct_data);
	$cleantalk_executed=true;
}

/**
 * return new cookie value
 */
function ct_get_cookie()
{
	global $ct_checkjs_def;
	$ct_checkjs_key = ct_get_checkjs_value(true); 
	print $ct_checkjs_key;
	die();
}

function ct_show_comment_link(){
	
	print "<div style='font-size:10pt;'><a href='https://cleantalk.org/wordpress-anti-spam-plugin' target='_blank'>".__( 'WordPress spam', 'cleantalk' )."</a> ".__( 'blocked by', 'cleantalk' )." CleanTalk.</div>";
	
}

add_action( 'right_now_content_table_end', 'my_add_counts_to_dashboard' );

function ct_sfw_update(){
	
	global $ct_options;
	
    if(isset($ct_options['spam_firewall']) && intval($ct_options['spam_firewall']) == 1){
		
		include_once(CLEANTALK_PLUGIN_DIR . "lib/CleantalkSFW.php");
	
		$sfw = new CleantalkSFW();
		$result = $sfw->sfw_update($ct_options['apikey']);
		unset($sfw);
		
		return $result === true ? true : $result;
		
	}
	
	return 'SFW_DISABLED';
	
}

function ct_sfw_send_logs()
{
	global $ct_options, $ct_data;
	
	$ct_options=ct_get_options();
    $ct_data=ct_get_data();	
	
	if(isset($ct_options['spam_firewall']) && intval($ct_options['spam_firewall']) == 1){
	
		include_once(CLEANTALK_PLUGIN_DIR . "lib/CleantalkSFW.php");
		
		$sfw = new CleantalkSFW();
		$result = $sfw->send_logs($ct_options['apikey']);
		unset($sfw);
		
		return $result === true ? true : $result;
		
	}
	
	return 'SFW_DISABLED';
}

function cleantalk_get_brief_data(){
	$ct_options = ct_get_options();
    $ct_data = ct_get_data();
	
	require_once('inc/cleantalk.class.php');
	$result = getAntispamReportBreif($ct_options['apikey']);
	
	$ct_data['brief_data'] = $result;
	update_option('cleantalk_data', $ct_data);
	
	return;
}

//Delete cookie for admin trial notice
function ct_wp_logout(){
	if(!headers_sent())
		setcookie('ct_trial_banner_closed', '', time()-3600);
}

/*
function myplugin_update_field( $new_value, $old_value ) {
	error_log('cleantalk_data dump: '. strlen(serialize($new_value)));
    return $new_value;
}

function myplugin_init() {
	add_filter( 'pre_update_option_cleantalk_data', 'myplugin_update_field', 10, 2 );
}

add_action( 'init', 'myplugin_init' );
*/
?>