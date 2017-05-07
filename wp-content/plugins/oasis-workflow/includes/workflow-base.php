<?php

global $workflow_message ;

/*************************************/
/*     Workflow basic functions    */
/*************************************/
class FCWorkflowBase
{
	static function get_current_user_role()
	{
		global $wp_roles;
		foreach ( $wp_roles->role_names as $role => $name ) :
			if ( current_user_can( $role ) )
				return $role ;
		endforeach;
	}

	static function get_user_role( $user_id )
	{
		global $wp_roles;
		foreach ( $wp_roles->role_names as $role => $name ) :
			if ( user_can( $user_id, $role ) )
				return $role ;
		endforeach;
	}

	static function get_menu_position($decimal_loc)
	{
		global $menu ;
		$sp = 0 ; $ep = 0 ;
		foreach ($menu as $k => $v) {
			if( $v[2] == "themes.php" )$ep = $k ;
			if( $v[2] == "edit-comments.php" )$sp = $k ;
			$menu_position[] = $k ;
		}
		for( $i = $ep ;$i > $sp ;$i-- ){
			if( !in_array($i, $menu_position)) {
				$y = $i . $decimal_loc ;
				return $y;
			}
		}
	}

	static function get_all_workflows( )
	{
	   global $wpdb;
	   $result = $wpdb->get_results( "SELECT * FROM " . FCUtility::get_workflows_table_name() . " ORDER BY name desc" );

	   return $result;

	}

	static function get_workflow_by_id( $id )
	{
	   global $wpdb;
	   $result = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM " . FCUtility::get_workflows_table_name() . " WHERE ID = %d", $id ) );

	   return $result;
	}

	static function get_workflow_by_validity( $valid )
	{
	   global $wpdb;
	   $result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM " . FCUtility::get_workflows_table_name() . " WHERE is_valid = %d ORDER BY ID desc", $valid) );

	   return $result;
	}

	static function get_workflow_by_auto_submit( $auto_submit )
	{
	   global $wpdb;
	   $result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM " . FCUtility::get_workflows_table_name() . " WHERE is_auto_submit = %d AND is_valid = 1 ORDER BY ID desc", $auto_submit) );

	   return $result;
	}

	static function get_step_by_id ( $id )
	{
	   global $wpdb;

	   $result = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM " . FCUtility::get_workflow_steps_table_name() . " WHERE ID = %d", $id ) );

	   return $result;
	}

	static function get_all_steps( )
	{
	   global $wpdb;

	   $result = $wpdb->get_results( "SELECT * FROM " . FCUtility::get_workflow_steps_table_name());

	   return $result;

	}

	static function get_action_history($action_status, $step_id, $post_id, $from_id)
	{
      global $wpdb;
      $result = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM " . FCUtility::get_action_history_table_name() . " WHERE action_status = %s AND step_id = %d AND post_id = %d AND from_id = %d",
                              $action_status, $step_id, $post_id, $from_id ) );

      return $result;
	}

   static function get_action_history_by_id ( $id )
   {
      global $wpdb;
      $result = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM " . FCUtility::get_action_history_table_name() . " WHERE ID = %d ORDER BY create_datetime DESC", $id ) );

      return $result;
   }

   static function get_action_history_by_from_id ( $from_id )
   {
      global $wpdb;
      $result = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM " . FCUtility::get_action_history_table_name() . " WHERE from_id = %d", $from_id ) );

      return $result;
   }

   static function get_action_history_by_status( $action_status, $post_id )
   {
      global $wpdb;
      if (!empty( $post_id )) {
         $result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM " . FCUtility::get_action_history_table_name() . " WHERE action_status = %s AND post_id = %d ORDER BY create_datetime DESC", $action_status, $post_id ) );
         return $result;
      }
      return null;
   }

   static function get_action_history_by_post( $post_id )
   {
      global $wpdb;
      $result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM " . FCUtility::get_action_history_table_name() . " WHERE post_id = %d ORDER BY create_datetime DESC", $post_id ) );

      return $result;
   }

	static function get_review_action( $review_status, $actor_id, $history_id )
	{
	   global $wpdb;
	   $result = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM " . FCUtility::get_action_table_name() . " WHERE review_status = %s AND actor_id = %d AND action_history_id = %d",
	            $review_status, $actor_id, $history_id  ) );
	   return $result;
	}

	static function get_review_action_by_id ( $id )
	{
	   global $wpdb;
	   $result = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM " . FCUtility::get_action_table_name() . " WHERE ID = %d", $id ) );
	   return $result;
	}

	static function get_review_action_by_history_id ( $history_id )
	{
	   global $wpdb;
	   $result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM " . FCUtility::get_action_table_name() . " WHERE action_history_id = %d ORDER BY ID DESC", $history_id ) );
	   return $result;
	}

	static function get_review_action_by_status ( $review_status, $history_id )
	{
	   global $wpdb;
	   $result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM " . FCUtility::get_action_table_name() . " WHERE review_status = %s AND action_history_id = %d ORDER BY ID DESC", $review_status, $history_id ) );
	   return $result;
	}

	static function insert_to_table($table, $data)
	{
		global $wpdb;
		$result = $wpdb->insert($table, $data);
		if( $result ){

			$row = $wpdb->get_row("SELECT max(ID) as maxid FROM $table");
			if($row)
				return $row->maxid ;
			else
				return false;
		}else{
			return false;
		}
	}

   static function get_users_by_role($role, $postId=null, $decision=null)
   {
      global $wpdb;
      if( count( $role ) > 0 )
      {
         $userstr = "";
         $post_author_id = "";
         // Instead of using WP_User_Query, we have to go this route, because user role editor
         // plugin has implemented the pre_user_query hook and excluded the administrator users to appear in the list

         if ($postId != null) {
            $post = get_post($postId);
            $post_author_id = $post->post_author;
         }


         foreach ( $role as $k => $v ){
            if ($k == 'owfpostauthor') { // this is a custom role added by oasis workflow
               $author_user = new WP_User( $post_author_id );
               $users = array($author_user);
            }
            else {
               $user_role = '%' . $k . '%';
               $users = $wpdb->get_results( $wpdb->prepare( "SELECT users_1.ID, users_1.display_name FROM {$wpdb->base_prefix}users users_1
               					INNER JOIN {$wpdb->base_prefix}usermeta usermeta_1 ON ( users_1.ID = usermeta_1.user_id )
   									WHERE (usermeta_1.meta_key = '{$wpdb->prefix}capabilities' AND CAST( usermeta_1.meta_value AS CHAR ) LIKE %s)",
               $user_role ) );
            }
            foreach ( $users as $user ) {
               $current_user = get_current_user_id();
               /*
               if ($decision != null && $decision == 'complete' && $user->ID == $current_user) { // exclude the current user from the user list in case of success flow
                  continue;
               }
               */
               $userObj = new WP_User( $user->ID );
               if ( !empty( $userObj->roles ) && is_array( $userObj->roles ) ) {
                  foreach ( $userObj->roles as $userrole )
                  {
                     if ( $userrole == $k || 'owfpostauthor' == $k) // if the selected role is 'postauthor'- the custom role.
                     {
                        $part["ID"] = $user->ID ;
                        if ($user->ID == $post_author_id) {
                           $part["name"] = $user->display_name . ' (Post Author)';
                        }
                        else {
                           $part["name"] = $user->display_name;
                        }
                        $userstr[] =(object) $part ;
                        break;
                     }
                  }
               }
            }
         }
         return (object)$userstr;
      }
      return "" ;

   }

	static function get_new_version($parentid)
	{
		global $wpdb;
		$row = $wpdb->get_row( $wpdb->prepare( "SELECT max(version) as maxversion FROM " . FCUtility::get_workflows_table_name() . " WHERE parent_id=%s OR ID=%s", $parentid, $parentid));
		$current_version = $row->maxversion;
		return $current_version + 1 ;
	}

	static function same_as_save($tablename, $iid)
	{
		global $wpdb;
		$result = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $tablename WHERE ID = %d", $iid ) ) ;
		if( $result ){
			foreach ( $result as $k => $v ) {
				if( $k == "ID" ) continue ;
				$data[$k] = $v ;
			}
			$newId = FCWorkflowBase::insert_to_table($tablename, $data) ;
			if( $newId )
				return $newId ;
			else
				return false ;
		}else{
			return false;
		}
	}

	static function get_date_int($ddate=null, $frm="-")
	{
		$ddate = ( $ddate ) ? $ddate : current_time( 'mysql', 0 ) ;
		$arr = explode($frm, $ddate) ;
		return $arr[0] * 10000 + $arr[1] * 100 + $arr[2] * 1   ;
	}

   static function format_date_for_db($ddate, $frm="/")
   {
   	$date = DateTime::createFromFormat(get_option( 'date_format' ), $ddate );
   	$date_with_mysql_format = $date->format('Y-m-d');
      return $date_with_mysql_format ;
   }
   
   static function format_date_for_db_wp_default($ddate, $frm="/")
   {
   	$date = DateTime::createFromFormat(OASISWF_EDIT_DATE_FORMAT, $ddate );
   	$date_with_mysql_format = $date->format('Y-m-d');
   	return $date_with_mysql_format ;
   }   

   static function format_date_for_display($ddate, $frm="-", $dateform="date")
   {
   	// only date
      if( $dateform == "date" ){
         if( $ddate == "0000-00-00" ) return "";
         if( $ddate ){
            $formatted_date = mysql2date( get_option( 'date_format' ), $ddate );
            return $formatted_date;
         }
      }else{ //date and time both
         $s_ddate = explode( " ", $ddate ) ;

         if( $s_ddate[0] == "0000-00-00" ) return "";

         if( $s_ddate[0] ){
         	$date_time_format = get_option( 'date_format' ) . " " . get_option('time_format');
            $formatted_date = mysql2date( $date_time_format, $ddate );
            return $formatted_date;
         }
      }
   }
   
   static function format_date_for_display_and_edit( $ddate ) {
   	if( $ddate == "0000-00-00" ) return "";
   	if( $ddate ){
   		$formatted_date = mysql2date( OASISWF_EDIT_DATE_FORMAT, $ddate, false );
   		return $formatted_date;
   	}   	
   }

	static function get_page_link($count_posts,$pagenum,$per_page=20)
	{
		$allpages=ceil($count_posts / $per_page);
		$base= esc_url(add_query_arg( 'paged', '%#%' ));
		$page_links = paginate_links( array(
			'base' => $base,
			'format' => '',
			'total' => $allpages,
			'current' => $pagenum
		));
		$page_links_text = sprintf( '<span class="displaying-num">' . __( 'Displaying %s-%s of %s', "oasisworkflow" ) . '</span>%s',
				number_format_i18n( ( $pagenum - 1 ) * $per_page + 1 ),
				number_format_i18n( min( $pagenum * $per_page, $count_posts ) ),
				number_format_i18n( $count_posts ),
				$page_links
				);
		echo $page_links_text;
	}

	static function get_postcount_in_wf($wfid)
	{
		global $wpdb;
		$sql = "SELECT DISTINCT(A.post_id)
					FROM
						(SELECT AA.post_id, BB.workflow_id
							FROM
							(SELECT * FROM " . FCUtility::get_action_history_table_name() . " WHERE action_status='assignment') AS AA
							LEFT JOIN " . FCUtility::get_workflow_steps_table_name() . " AS BB
							ON AA.step_id=BB.ID) as A
					WHERE A.workflow_id=$wfid" ;
		$result = $wpdb->get_results( $sql ) ;
		return count( $result );
		//return $wfid ;
	}

	static function get_pre_next_date($ddate, $frm="next", $days=1)
	{
		$date = new DateTime($ddate);

		$dstamp = $date->format("U");

		if( $frm == "next" )
			$dstamp = $dstamp + 3600 * 24 * $days ;
		else if ($frm == "pre" )
			$dstamp = $dstamp - 3600 * 24 * $days ;

		return gmdate("Y-m-d", $dstamp) ;
	}

   static function get_assigned_post($postid = null, $selected_user = null, $frm = "rows")
   {
      global $wpdb;
      $user_id = $selected_user;
      
      // use white list approach to set order by clause
      $orderby = array(
      		'post_title' => 'post_title',
      		'post_type' => 'post_type',
      		'post_author' => 'post_author',
      		'due_date' => 'due_date'
      );
      
      $sortorder = array(
      		'asc' => 'ASC',
      		'desc' => 'DESC',
      );
      
      // default order by
      $orderbycol = " ORDER BY A.due_date, posts.post_title"; // default order by column      
      
      if ( isset($_GET['orderby']) && $_GET['orderby'] ) {
      	// sanitize data
      	$user_provided_orderby = sanitize_text_field( $_GET['orderby'] );
      	$user_provided_order = sanitize_text_field( $_GET['order'] );
      	if (  array_key_exists ( $user_provided_orderby, $orderby )) {
      		$orderbycol = " ORDER BY " . $orderby[$user_provided_orderby] . " " . $sortorder[$user_provided_order];
      	}
      }

      if( $postid ) {
      	$w = "WHERE (assign_actor_id = $user_id OR actor_id = $user_id) AND post_id = " . $postid . $orderbycol;
      }
      else if(isset($user_id)) {
      	$w = "WHERE assign_actor_id = $user_id OR actor_id = $user_id " . $orderbycol ;
      }
      else {
      	$w = $orderbycol;
      }

      $sql = "SELECT A.*, B.review_status, B.actor_id, B.next_assign_actors, B.step_id as review_step_id, B.action_history_id, 
      			B.update_datetime, posts.post_title, users.display_name as post_author, posts.post_type FROM
							(SELECT * FROM " . FCUtility::get_action_history_table_name() . " WHERE action_status = 'assignment') as A
							LEFT OUTER JOIN
							(SELECT * FROM " . FCUtility::get_action_table_name() . " WHERE review_status = 'assignment') as B
							ON A.ID = B.action_history_id
							JOIN 	{$wpdb->posts} AS posts 
							ON  posts.ID = A.post_id
							JOIN {$wpdb->base_prefix}users AS users 
							ON users.ID = posts.post_author
      					$w" ;
      
      if( $frm == "rows" ) {
      	$result = $wpdb->get_results( $sql ) ;
      } else {
      	$result = $wpdb->get_row( $sql ) ;
      }

      return $result;
   }

   static function get_count_assigned_post()
   {
      $selected_user = isset( $_GET['user'] ) ? intval( sanitize_text_field( $_GET["user"] )) : get_current_user_id();
      $wfactions = FCWorkflowBase::get_assigned_post( null, $selected_user ) ;
      return count($wfactions);
   }

	static function get_pre_next_action($fromid)
	{
		$action = FCWorkflowBase::get_action_history_by_id( $fromid ) ;
		if($action->action_status == "processed"){
			return $action->ID ;
		}else{
			FCWorkflowBase::get_pre_next_action($action->from_id);
		}
	}

	static function get_pre_action($wfid)
	{
		$action = FCWorkflowBase::get_action_history_by_id( $wfid ) ;
		if( $action->from_id == 0 ){
			return $action->ID ;
		}else{
			return FCWorkflowBase::get_pre_next_action($action->from_id);
		}
	}
	
   static function get_assignment_comment_from_post( $post_id ) {
      global $wpdb;
      $table = FCUtility::get_action_history_table_name();
      $sql = "SELECT `ID`, `comment`  FROM `$table` 
      	WHERE `post_id` = '%d' 
      	AND `action_status` NOT IN ('submitted', 'reassigned', 'claimed', 'claim_cancel') 
      	GROUP BY `from_id` ";
      return $wpdb->get_results( $wpdb->prepare( $sql, $post_id ) );
   }

   static function get_review_status_comment_by_id( $action_history_ids ) {
      global $wpdb;
      $table = FCUtility::get_action_table_name();
      $sql = "SELECT *  FROM `$table` 
      	WHERE `review_status` = 'reassigned' 
      	AND `action_history_id` IN ('%s')";
      return $wpdb->get_results( $wpdb->prepare( $sql, implode( "','", $action_history_ids ) ) );
   }

   static function get_comment_count( $actionid, $is_inbox_comment = FALSE, $post_id = FALSE ) {
      $i = 0;
      
      // in case of inbox comments, we need to count all the previous comments as well
      if ( $is_inbox_comment && $post_id > 0 ) {
      	$action_history_ids = array();
         $results = self::get_assignment_comment_from_post( $post_id );
         if ( $results ) {
            foreach ( $results as $result ) {
            	$action_history_ids[] = $result->ID;
               if ( !empty( $result->comment ) ) {
               	$comments = json_decode( $result->comment );
                  $i = $i + count( $comments );
               }
            }
         }
         if ( ! empty( $action_history_ids ) ) {
         	$results = self::get_review_status_comment_by_id( $action_history_ids );
         	if ( $results ) {
         		foreach ( $results as $result ) {
         			if ( !empty( $result->comments ) ) {
         				$i++;
         			}
         		}
         	}
         }         
      } else { // non inbox page, like history
      	$action = FCWorkflowInbox::get_action_history_by_id( $actionid );
      	if ( $action ) {
      		$comments = json_decode( $action->comment );
      		if ( $comments ) {
      			foreach ( $comments as $comment ) {
      				if ( $comment->comment ) {
      					$i++;
      				}
      			}
      		}
      	}      	
      }
      
      return $i;
   }
	
	
	static function get_gpid_dbid($wpinfo, $stepid, $frm="")
	{
		if( is_object( $wpinfo ) ){
			$wf_steps = $wpinfo->steps ;
		}else{
			if( is_numeric( $wpinfo ) ){
				$workflow = FCWorkflowBase::get_workflow_by_id( $wpinfo ) ;
				$info = json_decode( $workflow->wf_info ) ;
				$wf_steps = $info->steps ;
			}else{
				$info = json_decode( $wpinfo ) ;
				$wf_steps = $info->steps ;
			}
		}

		if( $wf_steps ){
			if( is_numeric( $stepid ) ){
				foreach ( $wf_steps as $k => $v ){
					if( $stepid == $v->fc_dbid ){
						if( $frm == "lbl" )
							return $v->fc_label ;
						if( $frm == "process" )
							return $v->fc_process ;

						return $v->fc_addid ;
					}
				}
			}else{
				if( $frm == "lbl" )
					return $wf_steps->$stepid->fc_label ;
				if( $frm == "process" )
					return $wf_steps->$stepid->fc_process ;
				return $wf_steps->$stepid->fc_dbid ;
			}
		}

		return false;
	}

	static function get_process_steps($stepid, $direct="source")
	{
		$step = FCProcessFlow::get_step_by_id( $stepid ) ;
		if( $step ){
			$workflow = FCProcessFlow::get_workflow_by_id( $step->workflow_id ) ;
			if( $workflow )
			{
				$info = json_decode( $workflow->wf_info );
				$conns = $info->conns ;
				$stepgpid = FCProcessFlow::get_gpid_dbid( $info, $stepid );
				$all_path = get_site_option("oasiswf_path") ;
				foreach ($all_path as $k => $v) {
					$path[$v[1]] = $k ;
				}
            $steps = array();
				if( $conns ){
					if( $direct == "source" )
						foreach ($conns as $k => $v){
							if( $stepgpid == $v->sourceId ){
								$color = $v->connset->paintStyle->strokeStyle ;
								$steps[$path[$color]][FCProcessFlow::get_gpid_dbid($info, $v->targetId )] = FCProcessFlow::get_gpid_dbid($info, $v->targetId, "lbl" ) ;
							}
						}
					else{
						foreach ($conns as $k => $v){
							if( $stepgpid == $v->targetId ){
								$color = $v->connset->paintStyle->strokeStyle ;
								$steps[$path[$color]][FCProcessFlow::get_gpid_dbid($info, $v->sourceId)] =  FCProcessFlow::get_gpid_dbid($info, $v->sourceId, "lbl") ;
							}
						}
					}
					if( count($steps) > 0 )	return $steps ;
				}
			}
		}
		return false;
	}

	static function get_user_name($userid)
	{
		$user = get_userdata($userid) ;
		if( $user )return $user->data->display_name ;
	}
}

/*************************************/
/*     Workflow validate             */
/*************************************/
include( OASISWF_PATH . "includes/workflow-validate.php" ) ;

/*************************************/
/*     Workflow create               */
/*************************************/
include( OASISWF_PATH . "includes/workflow-crud.php" ) ;

/*************************************/
/*     Workflow list                 */
/*************************************/
include( OASISWF_PATH . "includes/workflow-list.php" ) ;

/*************************************/
/*     Workflow inbox                */
/*************************************/
include( OASISWF_PATH . "includes/workflow-inbox.php" ) ;

/*************************************/
/*     Workflow History              */
/*************************************/
include( OASISWF_PATH . "includes/workflow-history.php" ) ;

/*************************************/
/*      Workflow flow process        */
/*************************************/
include( OASISWF_PATH . "includes/process-flow.php" ) ;


if( isset($_POST['save_action']) && $_POST["save_action"] == "workflow_save" )
{
	FCWorkflowCRUD::save();
}

if( isset($_POST['save_action']) && $_POST["save_action"] == "workflow_as_save" )
{
	FCWorkflowCRUD::as_save();
}

if( isset($_GET['page']) && sanitize_text_field( $_GET["page"] ) == "oasiswf-admin" && isset($_GET['action']) && sanitize_text_field( $_GET["action"] ) == "delete" )
{
	FCWorkflowList::delete();
}
?>