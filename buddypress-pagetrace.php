<?php
function create_bpt_menu() {
	add_submenu_page('bp-general-settings','BP Pagtrace','BP Pagetrace','administrator','bpt-settings','bpt_admin_page');
	add_action('admin_init', 'register_bpt_settings');
}
add_action(is_multisite() ? 'network_admin_menu' : 'admin_menu','create_bpt_menu');
	
function register_bpt_settings(){	
	$input_field_names = array('bpt_display_tool');
	foreach ($input_field_names as $field_name){ register_setting( 'bpt_settings', $field_name ); }
}

function bpt_admin_page(){
	if(isset($_POST['bpt_submit'])){		
		if(!isset($_POST['bpt_option']['bpt_display_tool'])) $_POST['bpt_option']['bpt_display_tool'] = 'false';
		foreach((array)$_POST['bpt_option'] as $key => $value){
			update_option($key,$value);
		}
	}
	$bpt_display_tool = get_option('bpt_display_tool');
	?>

<div class="wrap">
    <div class="bps_form">
        <h2>BP Pagetrace Settings</h2>
        <?php if(isset($_POST['bpt_submit'])) : ?>
        <div id="message" class="updated fade">
            <p>
                <?php _e( 'Settings Saved', 'bpt' ) ?>
            </p>
        </div>
        <?php endif; ?>
        <form name="BPTform" method="post" action="">
            <?php settings_fields('bpt_settings'); ?>
            <!-- Sidebar List -->
            <p style="margin-bottom:30px;">
                <label style="display:block;" class="input_label">ON/OFF Switch:</label>
                <br />
                <input name="bpt_option[bpt_display_tool]" type="checkbox" <?php if($bpt_display_tool == 'true') echo 'checked'; ?> value="true" />
                <span class="checkbox_text">Turn off Buddypress Pagetrace</span><br />
            </p>
            <p>
                <input name="bpt_submit" type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
            </p>
        </form>
    </div><!-- /.bps_form --> 
</div><!-- /.wrap -->
<?
}

function bp_trace_page_data(){
	global $bp;
	$the_component_name = $bp->current_component;
	$the_action_name = $bp->current_action;
	$plugin_url = get_bloginfo('wpurl') . '/wp-content/plugins/buddypress-pagetrace/';
	//Only display if logged in
	if(!is_user_logged_in() || get_option('bpt_display_tool') == 'true') return;
	?>
<style type="text/css">
	<!--
	#bp_pagetrace,#bp_pagetrace p { background-image:url(<?php echo $plugin_url ?>60pc_black.png); background-repeat: repeat;}
	#bp_pagetrace {position:fixed; z-index:999;padding:6px;}
	#bp_pagetrace p {display:inline; padding:2px 8px; font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;}
	#bp_pagetrace em {color:#CEFFFF;}
	#bp_pagetrace em.first {margin-right:26px;}
	-->
	</style>
<div id="bp_pagetrace">
    <p> Component = <em class="first">
        <?php if($the_component_name != '') echo $the_component_name; else echo 'Null';	?>
        </em> Action = <em>
        <?php if($the_action_name != '') echo $the_action_name; else echo 'Null'; ?>
        </em> </p>
</div>
<?php
}
add_action('bp_header','bp_trace_page_data');
?>