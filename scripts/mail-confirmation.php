<?php
if ( $_POST && isset( $nameErr ) ) {
  ?>
<p class="error">Please complete the missing item(s) indicated.</p>
<?php
} elseif ( $_POST && isset( $emailErr ) ) {
    ?>
<p class="error">Please complete the missing item(s) indicated.</p>
}
<?php
} elseif ( $_POST && !$mailSent ) {
    ?>
<p class="error">Sorry, there was a problem sending your message. Please try later.</p>
<?php
} elseif ( $_POST && $mailSent ) {
    ?>
<p>Your message has been sent. Thank you for your enquiry.</p>
<?php } ?>
