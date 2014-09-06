<html>
<script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'clean'
 };
 </script>
  <body>
    <form action="" method="post">
<?php
error_reporting(0);
require_once('recaptchalib.php');

// Get a key from https://www.google.com/recaptcha/admin/create
$publickey = "6LcvB_ISAAAAABLdeNnq39nhIG0aHVEdc3lhycbi";
$privatekey = "	6LcvB_ISAAAAAInUf2BqtX85jTxnXtG_NlLpqFpw";

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;

# was there a reCAPTCHA response?
if ($_POST["recaptcha_response_field"]) {
        $resp = recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]);

        if ($resp->is_valid) {
                echo "You got it!";
        } else {
                # set the error code so that we can display it
                $error = $resp->error;
        }
}
echo recaptcha_get_html($publickey, $error);
?>
    <br/>
    <input type="submit" value="submit" />
    </form>
  </body>
</html>
<!--h3friends.com
Domain Name:	h3friends.com
This is a global key. It will work across all domains.

Public Key:	6LfVAfMSAAAAAKK_m1T2InTy_8Pb7kQC58zq3bN3
Use this in the JavaScript code that is served to your users

Private Key:	6LfVAfMSAAAAAJGHOyz8sv4H1m2Y1DHimFzX5bjN
Use this when communicating between your server and our server. Be sure to keep it a secret.

Delete these keys
Resources:	
reCAPTCHA plugins and libraries
reCAPTCHA API Documentation
Now what?	
SUBSCRIBE to important reCAPTCHA service announcements.
Install reCAPTCHA on your site. This is done in two parts. First, you need to add some HTML that displays the reCAPTCHA widget. Second, you need to configure your form to contact our servers to verify reCAPTCHA solutions. Here are specific instructions for: PHP and MediaWiki. For other environments, visit our resources page.
If you need help, post your questions in the reCAPTCHA forum.
->

