<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://anowar.net
 * @since      1.0.0
 *
 * @package    Wp_Login_Customize
 * @subpackage Wp_Login_Customize/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<dvi id="wrapper">


    <form method="post" name="cleanup_options" action="options.php">

        <?php
        
        //Grab all options
        $options = get_option($this->plugin_name);

        //logo
        $login_logo_id = $options['login_logo_id'];
        $login_logo = wp_get_attachment_image_src( $login_logo_id,'medium' ,false);
        $login_logo_url = $login_logo[0];



        //background
        $login_bg_id = $options['login_bg_id'];
        $login_bg = wp_get_attachment_image_src( $login_bg_id,'medium',false);
        $login_bg_url = $login_bg[0];





        $login_background_color = $options['login_background_color'];
        $login_background_size = $options['bg_size'];
        $login_form_background_color = $options['login_form_background_color'];
        $login_button_primary_color = $options['login_button_primary_color'];
        $login_link_color = $options['login_link_color'];
        $custom_css = $options['custom_css'];

        settings_fields( $this->plugin_name );
        do_settings_sections( $this->plugin_name );


        ?>

        <!-- Login page customizations -->


        <h2><?php _e('Add logo and Background', $this->plugin_name);?></h2>

        <!-- add your logo to login -->
        <fieldset id="anr_logo">
            <legend class="screen-reader-text"><span><?php esc_attr_e('Upload Login Logo', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name;?>-login_logo">
                <input type="hidden" id="login_logo_id" name="<?php echo $this->plugin_name;?>[login_logo_id]" value="<?php echo $login_logo_id; ?>" />
                <input id="upload_login_logo_button" type="button" class="button" value="<?php _e( 'Upload Logo', $this->plugin_name); ?>" />
                <span><?php esc_attr_e('Upload Login Logo', $this->plugin_name);?></span>
            </label>
            <div id="upload_logo_preview" class="wp_cbf-upload-preview-logo <?php if(empty($login_logo_id)) echo 'hidden'?>">
                <br>
                <img src="<?php echo $login_logo_url; ?>" />
                <button id="wp_login-delete_logo_button" class="wp_cbf-delete-image">X</button>
            </div>
        </fieldset>


        <br>
        <!-- add your bg to login -->
        <fieldset id="anr_bg">
            <legend class="screen-reader-text"><span><?php esc_attr_e('Upload Login Page Background', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name;?>-login_bg">
                <input type="hidden" id="login_bg_id" name="<?php echo $this->plugin_name;?>[login_bg_id]" value="<?php echo $login_bg_id; ?>" />
                <input id="upload_login_bg_button" type="button" class="button" value="<?php _e( 'Upload login background', $this->plugin_name); ?>" />
                <span><?php esc_attr_e('Upload Login background', $this->plugin_name);?></span>
            </label>
            <div id="upload_bg_preview" class="wp_cbf-upload-preview-bg <?php if(empty($login_bg_id)) echo 'hidden'?>">
                <br>
                <img src="<?php echo $login_bg_url; ?>" />
                <button id="wp_login-delete_bg_button" class="wp_cbf-delete-image">X</button>
            </div>
        </fieldset>

        <div>
            <h2><?php _e('Background size', $this->plugin_name);?></h2>

            <input type="radio" name="<?php echo $this->plugin_name;?>[bg_size]" value="cover"<?php checked( 'cover' == $login_background_size ); ?> /> Cover
            <input type="radio" name="<?php echo $this->plugin_name;?>[bg_size]" value="contain"<?php checked( 'contain' == $login_background_size ); ?> />Contain
            <input type="radio" name="<?php echo $this->plugin_name;?>[bg_size]" value="auto"<?php checked( 'auto' == $login_background_size ); ?> />Auto
        </div>
<hr>

        <!-- add your logo to login -->
        <div id="anr_color_area">
        <h2><?php _e('Add Colors', $this->plugin_name);?></h2>

        <!-- login background color-->
        <fieldset class="wp_admin_customize-admin-colors">
            <legend class="screen-reader-text"><span><?php _e('Login Pgae Background Color', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name;?>-login_background_color">
                <span><?php esc_attr_e('Login Background Color', $this->plugin_name);?></span><br>
                <input type="text" class="<?php echo $this->plugin_name;?>-color-picker" id="<?php echo $this->plugin_name;?>-login_background_color" name="<?php echo $this->plugin_name;?>[login_background_color]" value="<?php echo $login_background_color;?>" />

            </label>
        </fieldset>
        <br>

        <!-- login background color-->
        <fieldset class="wp_admin_customize-admin-colors">
            <legend class="screen-reader-text"><span><?php _e('Login Form Background Color', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name;?>-login_form_background_color">
                <span><?php esc_attr_e('Login Form Background Color', $this->plugin_name);?></span><br>
                <input type="text" class="<?php echo $this->plugin_name;?>-color-picker" id="<?php echo $this->plugin_name;?>-login_form_background_color" name="<?php echo $this->plugin_name;?>[login_form_background_color]" value="<?php echo $login_form_background_color;?>" />
            </label>
        </fieldset>
        <br>

        <!-- login buttons and links primary color-->
        <fieldset class="wp_admin_customize-admin-colors">
            <legend class="screen-reader-text"><span><?php _e('Login Button Color', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name;?>-login_button_primary_color">
                <span><?php esc_attr_e('Login Button Color', $this->plugin_name);?></span><br>
                <input type="text" class="<?php echo $this->plugin_name;?>-color-picker" id="<?php echo $this->plugin_name;?>-login_button_primary_color" name="<?php echo $this->plugin_name;?>[login_button_primary_color]" value="<?php echo $login_button_primary_color;?>" />
            </label>
        </fieldset>
            <br>
        <!-- login link color-->
        <fieldset class="wp_admin_customize-admin-colors">
            <legend class="screen-reader-text"><span><?php _e('Login  Links Color', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name;?>-login_link_color">
                <span><?php esc_attr_e('Login Links Color', $this->plugin_name);?></span><br>
                <input type="text" class="<?php echo $this->plugin_name;?>-color-picker" id="<?php echo $this->plugin_name;?>-login_link_color" name="<?php echo $this->plugin_name;?>[login_link_color]" value="<?php echo $login_link_color;?>" />
            </label>
        </fieldset>


            <h2><?php esc_attr_e( 'Custom css', $this->plugin_name ); ?></h2>
            <p>Add custom css for login page (<b>don't add &lt; style &gt; tag </b>)</p>
            <fieldset>
                <fieldset>
                    <textarea cols="80" rows="10" id="<?php echo $this->plugin_name;?>-custom_css" name="<?php echo $this->plugin_name;?>[custom_css]"><?php if(!empty($custom_css)) echo $custom_css;?></textarea>

                </fieldset>
            </fieldset>


        <?php submit_button(__('Save all changes', $this->plugin_name), 'primary','submit', TRUE); ?>

    </form>

</dvi>