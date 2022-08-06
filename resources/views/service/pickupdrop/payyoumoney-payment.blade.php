
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
    'productinfo' => $sellerService,
    'surl' => route('pickUp.payyouPayment'),
    'furl' => url('paymentfailed'),
    'service_provider' => 'payu_paisa',
    'firstname' => $name,
    'address1' => $pickUpLa.'-'.$dropAdd,
    'email' => $email,
    'phone' => $phone,
    'udf1' => auth::id(),
    'udf2' =>$pickUpAdd.'-'.$pickUpLo ,
    'udf3' =>$dropLa.'-'.$quantity ,
    'udf4' =>$dropLo.'-'. $distance,
    'udf5' => $seller_id.'-'.$delCon,
    'amount' => $amount,

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
    <input type="hidden" name="amount" value="{{$amount}}" />
    <input type="hidden" name="firstname" value="{{$name}}" />
    <input type="hidden" name="email" value="{{$email}}" />
    <input type="hidden" name="phone" value="{{$phone}}" />
    <input type="hidden" name="address1" value="{{$pickUpLa.'-'.$dropAdd}}">
    <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
    <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
    <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
    <input type="hidden" name="productinfo" value="{{$sellerService}}"/>
    <input type="hidden" name="surl" value="{{route('pickUp.payyouPayment')}}" />
    <input type="hidden" name="furl" value="{{url('paymentfailed')}}" />
    <input type="hidden" name="service_provider" value="payu_paisa"  />
    <input type="hidden" name="udf1" value="{{auth::id()}}"/>
    <input type="hidden" name="udf2" value="{{$pickUpAdd.'-'.$pickUpLo}}"/>
    <input type="hidden" name="udf3" value="{{$dropLa.'-'.$quantity }}"/>
    <input type="hidden" name="udf4" value="{{$dropLo.'-'. $distance}}"/>
    <input type="hidden" name="udf5" value="{{$seller_id.'-'.$delCon}}"/>

</form>
</body>
