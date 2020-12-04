<?php

class PPMFWC_Gateway_Yehhpay extends PPMFWC_Gateway_Abstract
{

  public static function getId()
  {
    return 'pay_gateway_yehhpay';
  }

  public static function getName()
  {
    return 'Yehhpay';
  }

  public static function getOptionId()
  {
    return 1877;
  }

  public function init_form_fields()
  {
    parent::init_form_fields();

    $this->form_fields['ask_birthdate'] = array(
      'title' => esc_html(__('Ask birthdate', PPMFWC_WOOCOMMERCE_TEXTDOMAIN)),
      'type' => 'checkbox',
      'description' => esc_html(__('Ask the customer for his birthdate, this will fasten the checkout process', PPMFWC_WOOCOMMERCE_TEXTDOMAIN)),
      'default' => 'yes'
    );

  }

  public function payment_fields()
  {
    parent::payment_fields();
    $ask_birthdate = $this->get_option('ask_birthdate');
    if ($ask_birthdate == 'yes') {
      echo esc_html(__('Birthdate: ', PPMFWC_WOOCOMMERCE_TEXTDOMAIN)) . ' <input name="birthdate_yehhpay" id="birthdate_yehhpay">';

      $js = 'jQuery( "#birthdate_yehhpay" ).css("width","125px").datepicker({ changeMonth: true, changeYear: true, yearRange:"-100:+0", dateFormat: "dd-mm-yy" });';
        wp_enqueue_style('jquery-ui', PPMFWC_PLUGIN_URL . 'assets/css/jquery-ui.min.css');
        wp_enqueue_script('jquery-ui-datepicker');

      echo "
    <script type='text/javascript'>
        jQuery(document).ready(function(){
            " . $js . "
        });
    </script>
    ";
    }
  }

}
