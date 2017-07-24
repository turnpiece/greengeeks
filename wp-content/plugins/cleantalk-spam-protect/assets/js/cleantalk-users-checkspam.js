// Printf for JS
String.prototype.printf = function(){
    var formatted = this;
    for( var arg in arguments ) {
		var before_formatted = formatted.substring(0, formatted.indexOf("%s", 0));
		var after_formatted  = formatted.substring(formatted.indexOf("%s", 0)+2, formatted.length);
		formatted = before_formatted + arguments[arg] + after_formatted;
    }
    return formatted;
};

// Flags
var ct_working = false,
	ct_new_check = true,
	ct_cooling_down_flag = false,
	ct_close_animate = true;
// Settings
var ct_cool_down_time = 65000,
	ct_requests_counter = 0,
	ct_max_requests = 95;
// Variables
var ct_ajax_nonce = ctUsersCheck.ct_ajax_nonce,
	ct_users_total = 0,
	ct_users_checked = 0,
	ct_users_spam = 0,
	ct_users_bad = 0,
	ct_unchecked = 'unset';

function animate_comment(to,id){
	if(ct_close_animate){
		if(to==0.3){
			jQuery('#comment-'+id).fadeTo(200,to,function(){
				animate_comment(1,id)
			});
		}else{
			jQuery('#comment-'+id).fadeTo(200,to,function(){
				animate_comment(0.3,id)
			});
		}
	}else{
		ct_close_animate=true;
	}
}

function ct_clear_users(){
	var data = {
		'action': 'ajax_clear_users',
		'security': ct_ajax_nonce
	};
	
	jQuery.ajax({
		type: "POST",
		url: ajaxurl,
		data: data,
		success: function(msg){
			ct_send_users();
		}
	});
}

//Continues the check after cooldown time
//Called by ct_send_users();
function ct_cooling_down_toggle(){
	ct_cooling_down_flag = false;
	ct_send_users();
	ct_show_users_info();
}

function ct_send_users(){
	
	if(ct_cooling_down_flag == true)
		return;
	
	if(ct_requests_counter >= ct_max_requests){
		setTimeout(ct_cooling_down_toggle, ct_cool_down_time);
		ct_requests_counter = 0;
		ct_cooling_down_flag = true;
		return;
	}else{
		ct_requests_counter++;
	}
	
	var data = {
		'action': 'ajax_check_users',
		'security': ct_ajax_nonce,
		'new_check': ct_new_check,
		'unchecked': ct_unchecked
	};
	
	jQuery.ajax({
		type: "POST",
		url: ajaxurl,
		data: data,
		success: function(msg){
			
			msg = jQuery.parseJSON(msg);
			
			if(parseInt(msg.error)){
				ct_working=false;
				alert(msg.error_message);
				location.href='users.php?page=ct_check_users&ct_worked=1';
			}else{
				ct_new_check = false;
				if(parseInt(msg.end) == 0){
					ct_users_checked += msg.checked;
					ct_users_spam += msg.spam;
					ct_users_bad += msg.bad;
					ct_unchecked = ct_users_total - ct_users_checked - ct_users_bad;
					var status_string = String(ctUsersCheck.ct_status_string);
					var status_string = status_string.printf(ct_users_total, ct_users_checked, ct_users_spam, ct_users_bad);
					if(parseInt(ct_users_spam) > 0)
						status_string += ctUsersCheck.ct_status_string_warning;
					jQuery('#ct_checking_users_status').html(status_string);
					jQuery('#ct_error_message').hide();
					ct_send_users();
				}else if(parseInt(msg.end) == 1){
					ct_working=false;
					jQuery('#ct_working_message').hide();
					location.href='users.php?page=ct_check_users&ct_worked=1';
				}
			}
		},
        error: function(jqXHR, textStatus, errorThrown) {
			jQuery('#ct_error_message').show();
			jQuery('#cleantalk_ajax_error').html(textStatus);
			jQuery('#cleantalk_js_func').html('Check users');
			setTimeout(ct_send_users(), 3000);
        },
        timeout: 15000
	});
}
function ct_show_users_info(){
	
	if(ct_working){
		
		if(ct_cooling_down_flag == true){
			jQuery('#ct_cooling_notice').html('Waiting for API to cool down. (About a minute)');
			jQuery('#ct_cooling_notice').show();
			return;			
		}else{
			jQuery('#ct_cooling_notice').hide();
		}
		
		setTimeout(ct_show_users_info, 3000);
		
		if(!ct_users_total){
			var data = {
				'action': 'ajax_info_users',
				'security': ct_ajax_nonce
			};
			jQuery.ajax({
				type: "POST",
				url: ajaxurl,
				data: data,
				success: function(msg){
					msg = jQuery.parseJSON(msg);
					jQuery('#ct_checking_users_status').html(msg.message);
					ct_users_total = msg.total;
				},
				error: function (jqXHR, textStatus, errorThrown){
					jQuery('#ct_error_message').show();
					jQuery('#cleantalk_ajax_error').html(textStatus);
					jQuery('#cleantalk_js_func').html('Show users');
					setTimeout(ct_show_users_info(), 3000);
				},
				timeout: 15000
			});
		}
	}
}
function ct_insert_users(){
	
	var data = {
		'action': 'ajax_insert_users',
		'security': ct_ajax_nonce
	};
	
	jQuery.ajax({
		type: "POST",
		url: ajaxurl,
		data: data,
		success: function(msg){
		    alert(ctUsersCheck.ct_inserted + ' ' + msg + ' ' + ctUsersCheck.ct_iusers);
		}
	});
}
function ct_delete_all_users(){
	
	var data = {
		'action': 'ajax_delete_all_users',
		'security': ct_ajax_nonce
	};
	
	jQuery.ajax({
		type: "POST",
		url: ajaxurl,
		data: data,
		success: function(msg){
			if(msg>0){
				jQuery('#cleantalk_users_left').html(msg);
				ct_delete_all_users();
			}else{
				location.href='users.php?page=ct_check_users&ct_worked=1';
			}
		},
        error: function(jqXHR, textStatus, errorThrown) {
			jQuery('#ct_error_message').show();
			jQuery('#cleantalk_ajax_error').html(textStatus);
			jQuery('#cleantalk_js_func').html('All users deleteion');
			setTimeout(ct_delete_all_users(), 3000);
        },
        timeout: 25000
	});
}
function ct_delete_checked_users(){
	
	ids=Array();
	var cnt=0;
	jQuery('input[id^=cb-select-][id!=cb-select-all-1]').each(function(){
		if(jQuery(this).prop('checked')){
			ids[cnt]=jQuery(this).attr('id').substring(10);
			cnt++;
		}
	});
	var data = {
		'action': 'ajax_delete_checked_users',
		'security': ct_ajax_nonce,
		'ids':ids
	};
	
	jQuery.ajax({
		type: "POST",
		url: ajaxurl,
		data: data,
		success: function(msg){
			location.href='users.php?page=ct_check_users&ct_worked=1';
			//alert(msg);
		},
		error: function(jqXHR, textStatus, errorThrown) {
			jQuery('#ct_error_message').show();
			jQuery('#cleantalk_ajax_error').html(textStatus);
			jQuery('#cleantalk_js_func').html('All users deleteion');
			setTimeout(ct_delete_checked_users(), 3000);
		},
		timeout: 15000
	});
	return false;
}

jQuery(document).ready(function(){
	
	jQuery(".cleantalk_delete_user_button").click(function(){
		id = jQuery(this).attr("data-id");
		ids=Array();
		ids[0]=id;
		var data = {
			'action': 'ajax_delete_checked_users',
			'security': ct_ajax_nonce,
			'ids':ids
		};
		jQuery.ajax({
			type: "POST",
			url: ajaxurl,
			data: data,
			success: function(msg){
				ct_close_animate=false;
				jQuery("#comment-"+id).hide();
				jQuery("#comment-"+id).remove();
				ct_close_animate=true;
			},
			timeout: 15000
		});
	});
	
	jQuery(".cleantalk_delete_user_button").click(function(){
		id = jQuery(this).attr("data-id");
		animate_comment(0.3, id);
	});

	// Check users
	jQuery("#ct_check_users_button").click(function(){
	//	jQuery('#ct_checking_users_status').html('');
		jQuery('#ct_delete_checked_users').hide();
		jQuery('#ct_check_users_table').hide();
		jQuery('#ct_check_users_button').hide();
		jQuery('#ct_delete_all_users').hide();
		jQuery('#ct_get_csv_file').hide();
		jQuery('div.pagination').hide();
		jQuery('#ct_info_message').hide();
		jQuery('#ct_working_message').show();
		jQuery('#ct_preloader').show();
		ct_working=true;
		ct_clear_users();
		ct_show_users_info();
	});
	
	jQuery("#ct_insert_users").click(function(){
		ct_insert_users();
	});

	jQuery("#ct_stop_deletion").click(function(){
		//window.location.reload();
		window.location.href='users.php?page=ct_check_users&ct_worked=1';
	});
	
	// Delete all spam users
	jQuery("#ct_delete_all_users").click(function(){
		if (!confirm(ctUsersCheck.ct_confirm_deletion_all))
			return false;
		jQuery('#ct_checking_users_status').hide();
		jQuery('#ct_check_users_table').hide();
		jQuery('#ct_tools_buttons').hide();
		jQuery('#ct_info_message').hide();
		jQuery('#ct_ajax_info_users').hide();
		jQuery('#ct_check_users_button').hide();
		jQuery('#ct_search_info').hide();
		jQuery('div.pagination').hide();
		jQuery('#ct_deleting_message').show();
		jQuery('#ct_preloader').show();
		jQuery('#ct_stop_deletion').show();
		jQuery("html, body").animate({ scrollTop: 0 }, "slow");
		ct_delete_all_users();
	});
	jQuery("#ct_delete_checked_users").click(function(){
		if (!confirm(ctUsersCheck.ct_confirm_deletion_checked))
			return false;

		ct_delete_checked_users();
	});
	jQuery(".cleantalk_user").mouseover(function(){
		id = jQuery(this).attr("data-id");
		jQuery("#cleantalk_delete_user_"+id).show();
	});
	jQuery(".cleantalk_user").mouseout(function(){
		id = jQuery(this).attr("data-id");
		jQuery("#cleantalk_delete_user_"+id).hide();
	});
	
	//Show/hide action on mouse over/out
	jQuery(".cleantalk_user").mouseover(function(){
		id = jQuery(this).attr("data-id");
		jQuery("#cleantalk_button_set_"+id).show();
	});
	jQuery(".cleantalk_user").mouseout(function(){
		id = jQuery(this).attr("data-id");
		jQuery("#cleantalk_button_set_"+id).hide();
	});
	
	//Approve button
	jQuery(".cleantalk_delete_from_list_button").click(function(){
		ct_id = jQuery(this).attr("data-id");
		var data = {
			'action': 'ajax_ct_approve_user',
			'security': ct_ajax_nonce,
			'id': ct_id
		};
		jQuery.ajax({
			type: "POST",
			url: ajaxurl,
			data: data,
			success: function(msg){
				jQuery("#comment-"+ct_id).fadeOut('slow', function(){
					jQuery("#comment-"+ct_id).remove();
				});
			},
		});
		
		// Positive feedback
		var data = {
			'action': 'ct_feedback_user',
			'security': ct_ajax_nonce,
			'user_id': ct_id,
			'status': 'approve'
		};
		jQuery.ajax({
			type: "POST",
			url: ajaxurl,
			data: data,
			success: function(msg){
				if(msg == 1){
					// Success
				}
				if(msg == 0){
					// Error occurred
				}
				if(msg == 'no_hash'){
					// No hash
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				
			},
			timeout: 5000
		});
		
	});
	
	// Request to Download CSV file.
	jQuery("#ct_get_csv_file").click(function(){
		var data = {
			'action': 'ajax_ct_get_csv_file',
			'security': ct_ajax_nonce,
			'filename': ctUsersCheck.ct_csv_filename
		};
		jQuery.ajax({
			type: "POST",
			url: ajaxurl,
			data: data,
			success: function(msg){
				if(parseInt(msg)==0)
					alert(ctUsersCheck.ct_bad_csv);
				else
					jQuery("#ct_csv_wrapper").html("<iframe src='"+location.protocol+"//"+location.hostname+"/wp-content/plugins/cleantalk-spam-protect/check-results/"+ctUsersCheck.ct_csv_filename+".csv'></iframe>");
			},
		});
	});
	
	//Default load actions
	if(location.href.match(/ct_check_users/) && !location.href.match(/ct_worked=1/)){
		jQuery("#ct_check_users_button").click();
	}
});
