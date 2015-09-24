<?php
/*
 Plugin Name: WP Live Comments Validation
 Plugin URI: http://www.wpchandra.com/
 Description: Using WP Live Comments Validation plugin to validate comments form using jquery validation. This plugin allow you to easy way to validate comment form.
 Version: 1.0
 Author: Chandrakesh Kumar 
 Author URI: http://www.wpchandra.com/  
 License: GPL3     
 */      
  
 //add jquery validation and jquery 
 function wp_live_comments_validation_scripts() {
	if(is_single() ) {
		wp_enqueue_script('jquery-validate',plugin_dir_url( __FILE__ ) . 'js/jquery.validate.min.js',array('jquery'),'1.10.0',true);
		wp_enqueue_style('jquery-validate',plugin_dir_url( __FILE__ ) . 'styles/style.css',array(),'1.0');
	}
} 
function wp_live_comments_validation_init() { ?> 
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			
			$('#commentform').validate({
				rules: {
					author: {
						required: true,
						minlength: 2
					},
					
					email: {
						required: true,
						email: true
					},
					
					url: {
						url: true
					},
					
					comment: {
						required: true,
						minlength: 20
					}
				},
				
				messages: {
					author: "Please enter a valid name.",
					email: "Please enter a valid email address.",
					url: "Please a valid website address.",
					comment: "Message must be at least 20 characters."
				}
			});
		});
	</script>
<?php }
//add jquery validation
add_action('template_redirect', 'wp_live_comments_validation_scripts');
//add scripts to footer
add_action('wp_footer', 'wp_live_comments_validation_init', 999);

?>