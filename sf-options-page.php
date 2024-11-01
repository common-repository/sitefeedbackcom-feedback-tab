<?php
	//Options setting form
	/* Login Info will help us connect username with SiteFeedback.com analytics page
	 * Users will have options for where they want to display the feedback widget in their wordpress site. By default widget appears only in post pages. 
	 * By checking the check box users can add widget in homepage, archive page as well as pages.
	 */
	 
	 
	$wfsf_options = array();
	$wfsf_options['username'] = get_option('wfsf_username', false);
	$wfsf_options['password'] = get_option('wfsf_password', false);
	$wfsf_options['email'] = get_option('wfsf_email', false);
	$wfsf_options['showhomepage'] = get_option('wfsf_showhomepage', false);
	$wfsf_options['showarchive'] = get_option('wfsf_showarchive', false);
	$wfsf_options['showpages'] = get_option('wfsf_showpages', false);
	?>		
		<div class="wrap">  
    	<?php    echo "<h1>" . __( 'SiteFeedback.com Widget Settings') . "</h1>"; ?>    	
    	<form name="oscimp_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">  
    		 <hr>
    		 <?php    echo "<h2>" . __( 'SiteFeedback.com Account Info') . "</h2>"; ?>
    		<h4>1. Register for a SiteFeedback.com Account</h4>
    		 If you haven't registered with SiteFeedback.com please <a href="http://www.sitefeedback.com/register.php" target="_blank"><b>Register Now !</b></a>. Registration is easy and it's free. Once you registered, you will be able to manage your site and user comments.</p>

    		<h4>2. Link Your Account</h4>
    		 <p>Please enter your SiteFeedback.com <b>username</b> and <b>password</b> below and SAVE to link your WordPress site with your SiteFeedback.com account. Don't worry. Your information is secured.<br> Linking your account gtives you access to SiteFeedback.com <a href="http://www.sitefeedback.com/analytics/" target="_blank">analytics</a>. You can monitor user feedback and more. You can link the same SiteFeedback.com account to multiple sites.</p>
            
            <p><?php _e("<strong>Username:</strong> " ); ?><input type="text" name="wfsf_username" value="<?php echo get_option('wfsf_username', false); ?>" size="20"></p>  
	        <p><?php _e("<strong>Password:</strong> " ); ?><input type="password" name="wfsf_password" value="<?php echo get_option('wfsf_password', false); ?>" size="20"></p>  
	        <p><?php _e("<strong>Email:</strong> " ); ?><input type="text" name="wfsf_email" value="<?php echo get_option('wfsf_email', false); ?>" size="20"> (optional)</p>        
       		
       		<hr> 
       		
       		<?php    echo "<h2>" . __( 'Where Do You Want Feedback Widget to Appear?!') . "</h2>"; ?>
       		<p>By default Feedback widget are added only to <b>post pages</b>. If you want to display feedback widget in other sections, please check below.</p>
       		<table>
       			<table class="form-table">
               		<th scope="row"><b><?php _e("Homepage:", 'addthis_trans_domain' ); ?></b></th>
					<td valign="top"><input type="checkbox" name="wfsf_showhomepage" value="true" <?php echo (get_option('wfsf_showhomepage') == true ? 'checked="checked"' : ''); ?>/></td>
				</tr>
				<tr>
					<th scope="row"><b><?php _e("Pages:", 'addthis_trans_domain' ); ?></b><br>Pages such as "About," "Contact," etc.</th>
					<td valign="top"><input type="checkbox" name="wfsf_showpages" value="true" <?php echo (get_option('wfsf_showpages')  == true ? 'checked="checked"' : ''); ?>/></td>
				</tr>
				<tr>
					<th scope="row"><b><?php _e("Archives:", 'addthis_trans_domain' ); ?></b><br>Pages such as Category pages, Tag pages, Author pages and Date Archive pages.</th>
					<td valign="top"><input type="checkbox" name="wfsf_showarchive" value="true" <?php echo (get_option('wfsf_showarchive')  == true ? 'checked="checked"' : ''); ?>/></td>
				</tr>				
       		</table>
       		<hr>
	       <p class="submit">  
        	<input type="submit" name="WFSFSubmit" value="<?php _e('Save Settings') ?>" />  
        </p>  
    	</form>  
		</div>  