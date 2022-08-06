
<?php
    $MERCHANT_KEY = "GpUr6trc"; // add your id
    $SALT = "9BF4Bs5Gxl"; // add your id

    //$PAYU_BASE_URL = "https://sandboxsecure.payu.in";
    $PAYU_BASE_URL = "https://secure.payu.in";
    $action = '';
    $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
    $posted = array();
    $posted = array(
        'key' => $MERCHANT_KEY,
        'txnid' => $txnid,
        'productinfo' => $take,
        'surl' => route('ecom.ecomPayyouPayment'),
        'furl' => url('paymentfailed'),
        'service_provider' => 'payu_paisa',
        'firstname' => $name,
        'address1' => $address,
        'email' => $email,
        'phone' => $phone,
        'udf1' => Auth::user()->id,
        'udf2' => $landmark,
        'udf3' => $pincode,
        'udf4' => $city_id,
        'udf5' => $seller_id,
        'amount' => $total_cart_price,
        
    );

    if(empty($posted['txnid'])) {
        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
    } 
    else 
    {
        $txnid = $posted['txnid'];
    }

    $hash = '';
    $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
    
    if(empty($posted['hash']) && sizeof($posted) > 0) {
        $hashVarsSeq = explode('|', $hashSequence);
        $hash_string = '';  
        foreach($hashVarsSeq as $hash_var) {
            $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
            $hash_string .= '|';
        }
        $hash_string .= $SALT;

        $hash = strtolower(hash('sha512', $hash_string));
        $action = $PAYU_BASE_URL . '/_payment';
    } 
    elseif(!empty($posted['hash'])) 
    {
        $hash = $posted['hash'];
        $action = $PAYU_BASE_URL . '/_payment';
    }

?>
<script>
   var hash = '<?php echo $hash ?>';
   function submitPayuForm() {
     if(hash == '') {
       return;
     }
     var payuForm = document.forms.payuForm;
          payuForm.submit();
   }
 </script>
<body onload="submitPayuForm()">
   Processing.....
<form class="col" method="post" action="{{$action}}" name="payuForm">
   <input type="hidden" name="amount" value="{{$total_cart_price}}" />
   <input type="hidden" name="firstname" value="{{$name}}" />
   <input type="hidden" name="email" value="{{$email}}" />
   <input type="hidden" name="phone" value="{{$phone}}" />
   <input type="hidden" name="address1" value="{{$address}}">
   <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
   <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
   <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
   <input type="hidden" name="productinfo" value="{{$take}}">
   <input type="hidden" name="surl" value="{{route('ecom.ecomPayyouPayment')}}" />
   <input type="hidden" name="furl" value="{{url('paymentfailed')}}" />
   <input type="hidden" name="service_provider" value="payu_paisa"  />
   <input type="hidden" name="udf1" value="{{Auth::user()->id}}"/>
   <input type="hidden" name="udf2" value="{{$landmark}}"/>
   <input type="hidden" name="udf3" value="{{$pincode}}"/>
   <input type="hidden" name="udf4" value="{{$city_id}}"/>
   <input type="hidden" name="udf5" value="{{$seller_id}}"/>
</form>
</body>
