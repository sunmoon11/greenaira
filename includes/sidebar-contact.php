<?php

/**
 * This is the sidebar contact form used on the single ad page
 *
 */

$msg = '';

// if contact form has been submitted, send the email
if (isset($_POST['submit']) && $_POST['send_email'] == 'yes') {

    // get the submitted math answer
    $rand_post_total = (int)$_POST['rand_total'];

    // compare the submitted answer to the real answer
    $rand_total = (int)$_POST['rand_num'] + (int)$_POST['rand_num2'];

    // if it's a match then send the email
    if ($rand_total == $rand_post_total){
        cp_contact_ad_owner_email($post->ID);
        $msg = '<p class="green center"><strong>' . __( 'Your message has been sent!', APP_TD ) . '</strong></p>';
    } else {
        $msg = '<p class="red center"><strong>' . __( 'ERROR: Incorrect captcha answer', APP_TD ) . '</strong></p>';
    }
    
    if (!empty($_POST)) {
    $required_fields = array('agree');
    foreach ($required_fields as $value) {
        if (empty($_POST["$value"])) {
            $msg = '<p class="red center"><strong>' . __( 'Your must aggree terms and conditions!', APP_TD ) . '</strong></p>';
        }else{
            $msg = '<p class="green center"><strong>' . __( 'Your message has been sent!', APP_TD ) . '</strong></p>';
        }
    }            
    echo $errors;
}

}

?>

   <form name="mainform" id="mainform" class="form_contact" action="#priceblock2" method="post" enctype="multipart/form-data">

       <?php echo $msg; ?>

       <!--<p class="contact_msg"><?php //_e( 'To inquire about this ad listing, complete the form below to send a message to the ad poster.', APP_TD ); ?></p>-->

        <ol>
            <li>
                <label><?php _e( 'Name:', APP_TD ); ?></label>
                <input name="from_name" id="from_name" type="text" minlength="2" value="<?php if(isset($_POST['from_name'])) echo esc_attr( stripslashes($_POST['from_name']) ); ?>" class="text required" />
                <div class="clr"></div>
            </li>

            <li>
                <label><?php _e( 'Email:', APP_TD ); ?></label>
                <input name="from_email" id="from_email" type="text" minlength="5" value="<?php if(isset($_POST['from_email'])) echo esc_attr( stripslashes($_POST['from_email']) ); ?>" class="text required email" />
                <div class="clr"></div>
            </li>

            <li>
                <label><?php _e( 'Subject:', APP_TD ); ?></label>
                <input name="subject" id="subject" type="text" minlength="2" value="<?php _e( 'Re:', APP_TD ); ?> <?php the_title();?>" class="text required" />
                <div class="clr"></div>
            </li>

            <li>
                <label><?php _e( 'Message:', APP_TD ); ?></label>
                <textarea name="message" id="message" rows="" cols="" class="text required"><?php if(isset($_POST['message'])) echo esc_attr( stripslashes($_POST['message']) ); ?></textarea>
                <div class="clr"></div>
            </li>

            <li>
                <?php
                // create a random set of numbers for spam prevention
                $randomNum = '';
                $randomNum2 = '';
                $randomNumTotal = '';

                $rand_num = rand(0,9);
                $rand_num2 = rand(0,9);
                $randomNumTotal = $randomNum + $randomNum2;
                ?>
                <label><?php _e( 'Sum of', APP_TD ); ?> <?php echo $rand_num; ?> + <?php echo $rand_num2; ?> =</label>
                <input name="rand_total" id="rand_total" type="text" minlength="1" value="" class="text required number" />
                <div class="clr"></div>
            </li>

            <li style="margin-bottom: 10px;">
               <input type="checkbox" id="chkBoxHelp" name="agree" /> <?php AnythingPopup('1'); ?><br>
            </li>
            <li>
                <input name="submit" type="submit" id="submit_inquiry" class="btn_orange" value="<?php _e( 'Send Inquiry', APP_TD ); ?>" />
            </li>

        </ol>

        <input type="hidden" name="rand_num" value="<?php echo $rand_num; ?>" />
        <input type="hidden" name="rand_num2" value="<?php echo $rand_num2; ?>" />
        <input type="hidden" name="send_email" value="yes" />

   </form>


