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
var ct_ajax_nonce = ctCommentsCheck.ct_ajax_nonce,
	ct_comments_total = 0,
	ct_comments_checked = 0,
	ct_comments_spam = 0,
	ct_comments_bad = 0,
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

function ct_clear_comments(){
	var data = {
		'action': 'ajax_clear_comments',
		'security': ct_ajax_nonce
	};
	
	jQuery.ajax({
		type: "POST",
		url: ajaxurl,
		data: data,
		success: function(msg){
			ct_send_comments();
		}
	});
}

//Continues the check after cooldown time
//Called by ct_send_users();
function ct_cooling_down_toggle(){
	ct_cooling_down_flag = false;
	ct_send_comments();
	ct_show_info();
}

function ct_send_comments(){
	
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
		'action': 'ajax_check_comments',
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
				location.href='edit-comments.php?page=ct_check_spam&ct_worked=1';
			}else{
				ct_new_check = false;
				if(parseInt(msg.end) == 0){
					ct_comments_checked += msg.checked;
					ct_comments_spam += msg.spam;
					ct_comments_bad += msg.bad;
					ct_unchecked = ct_comments_total - ct_comments_checked - ct_comments_bad;
					var status_string = String(ctCommentsCheck.ct_status_string);
					var status_string = status_string.printf(ct_comments_total, ct_comments_checked, ct_comments_spam, ct_comments_bad);
					if(parseInt(ct_comments_spam) > 0)
						status_string += ctCommentsCheck.ct_status_string_warning;
					jQuery('#ct_checking_status').html(status_string);
					jQuery('#ct_error_message').hide();
					ct_send_comments();
				}else if(parseInt(msg.end) == 1){
					ct_working=false;
					jQuery('#ct_working_message').hide();
					location.href='edit-comments.php?page=ct_check_spam&ct_worked=1';
				}
			}
		},
        error: function(jqXHR, textStatus, errorThrown) {
			jQuery('#ct_error_message').show();
			jQuery('#cleantalk_ajax_error').html(textStatus);
			jQuery('#cleantalk_js_func').html('Check comments');
			setTimeout(ct_send_comments(), 3000);   
        },
        timeout: 25000
	});
}
function ct_show_info(){
	
	if(ct_working){
		
		if(ct_cooling_down_flag == true){
			jQuery('#ct_cooling_notice').html('Waiting for API to cool down. (About a minute)');
			jQuery('#ct_cooling_notice').show();
			return;			
		}else{
			jQuery('#ct_cooling_notice').hide();
		}	
		
		setTimeout(ct_show_info, 3000);
		
		if(!ct_comments_total){
			var data = {
				'action': 'ajax_info_comments',
				'security': ct_ajax_nonce
			};
			jQuery.ajax({
				type: "POST",
				url: ajaxurl,
				data: data,
				success: function(msg){
					msg = jQuery.parseJSON(msg);
					jQuery('#ct_checking_status').html(msg.message);
					ct_comments_total = msg.total;
				},
				error: function(jqXHR, textStatus, errorThrown) {
					jQuery('#ct_error_message').show();
					jQuery('#cleantalk_ajax_error').html(textStatus);
					jQuery('#cleantalk_js_func').html('Check comments');
					setTimeout(ct_show_info(), 3000);   
				},
				timeout: 15000
			});
		}
	}
}
function ct_insert_comments(){
	var data = {
		'action': 'ajax_insert_comments',
		'security': ct_ajax_nonce
	};
	
	jQuery.ajax({
		type: "POST",
		url: ajaxurl,
		data: data,
		success: function(msg){
			alert(ctCommentsCheck.ct_comments_added + ' ' + msg + ' ' + ctCommentsCheck.ct_comments_added_after);
		}
	});
}
function ct_delete_all(){
	var data = {
		'action': 'ajax_delete_all',
		'security': ct_ajax_nonce
	};
	
	jQuery.ajax({
		type: "POST",
		url: ajaxurl,
		data: data,
		success: function(msg){
			if(msg>0){
				jQuery('#cleantalk_comments_left').html(msg);
				ct_delete_all();
			}else{
				location.href='edit-comments.php?page=ct_check_spam&ct_worked=1';
			}
		},			
		error: function(jqXHR, textStatus, errorThrown) {
			jQuery('#ct_error_message').show();
			jQuery('#cleantalk_ajax_error').html(textStatus);
			jQuery('#cleantalk_js_func').html('Check comments');
			setTimeout(ct_delete_all(), 3000);   
		}
	});
}
function ct_delete_checked(){
	ids=Array();
	var cnt=0;
	jQuery('input[id^=cb-select-][id!=cb-select-all-1]').each(function(){
		if(jQuery(this).prop('checked')){
			ids[cnt]=jQuery(this).attr('id').substring(10);
			cnt++;
		}
	});
	var data = {
		'action': 'ajax_delete_checked',
		'security': ct_ajax_nonce,
		'ids':ids
	};
	
	jQuery.ajax({
		type: "POST",
		url: ajaxurl,
		data: data,
		success: function(msg){
			location.href='edit-comments.php?page=ct_check_spam&ct_worked=1';
			//alert(msg);
		},
		error: function(jqXHR, textStatus, errorThrown) {
			jQuery('#ct_error_message').show();
			jQuery('#cleantalk_ajax_error').html(textStatus);
			jQuery('#cleantalk_js_func').html('Check comments');
			setTimeout(ct_delete_checked(), 3000);   
		}
	});
}


jQuery(document).ready(function(){
	
	jQuery("#ct_check_spam_button").click(function(){
		jQuery('#ct_check_spam_button').hide();
		jQuery('#ct_info_message').hide();
		jQuery('#ct_check_comments_table').hide();
		jQuery('#ct_delete_all').hide();
		jQuery('div.pagination').hide();
		jQuery('#ct_delete_checked').hide();
		jQuery('#ct_working_message').show();
		jQuery('#ct_preloader').show();

		ct_working=true;
		ct_show_info();
		ct_clear_comments();
	});

	jQuery("#ct_insert_comments").click(function(){
		ct_insert_comments();
	});
	jQuery("#ct_delete_all").click(function(){
		if (!confirm(ctCommentsCheck.ct_confirm_deletion_all))
			return false;

		jQuery('#ct_checking_status').hide();
		jQuery('#ct_tools_buttons').hide();
		jQuery('#ct_search_info').hide();
		jQuery('#ct_check_comments_table').hide();
		jQuery('div.pagination').hide();
		jQuery('#ct_deleting_message').show();
		jQuery("html, body").animate({ scrollTop: 0 }, "slow");
		ct_delete_all();
	});
	jQuery("#ct_delete_checked").click(function(){
		if (!confirm(ctCommentsCheck.ct_confirm_deletion_checked))
			return false;
		
		ct_delete_checked();
	});
	
	jQuery(".cleantalk_delete_button").click(function(){
		id = jQuery(this).attr("data-id");
		ids=Array();
		ids[0]=id;
		var data = {
			'action': 'ajax_delete_checked',
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
			}
		});
	});
	jQuery(".cleantalk_delete_button").click(function(){
		id = jQuery(this).attr("data-id");
		animate_comment(0.3, id);
	});
	
	//Show/hide action on mouse over/out
	jQuery(".cleantalk_comment").mouseover(function(){
		id = jQuery(this).attr("data-id");
		jQuery("#cleantalk_button_set_"+id).show();
	});
	jQuery(".cleantalk_comment").mouseout(function(){
		id = jQuery(this).attr("data-id");
		jQuery("#cleantalk_button_set_"+id).hide();
	});
	
	//Approve button	
	jQuery(".cleantalk_delete_from_list_button").click(function(){
		var ct_id = jQuery(this).attr("data-id");
		
		// Approving
		var data = {
			'action': 'ajax_ct_approve_comment',
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
			'action': 'ct_feedback_comment',
			'security': ct_ajax_nonce,
			'comment_id': ct_id,
			'comment_status': 'approve'
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
	
	//Default load actions
	if(location.href.match(/ct_check_spam/) && !location.href.match(/ct_worked=1/)){
		jQuery("#ct_check_spam_button").click();
	}
});
