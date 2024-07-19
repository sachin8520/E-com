<?php
/*
- Use PAYTM_ENVIRONMENT as 'PROD' if you wanted to do transaction in production environment else 'TEST' for doing transaction in testing environment.
- Change the value of PAYTM_MERCHANT_KEY constant with details received from Paytm.
- Change the value of PAYTM_MERCHANT_MID constant with details received from Paytm.
- Change the value of PAYTM_MERCHANT_WEBSITE constant with details received from Paytm.
- Above details will be different for testing and production environment.
*/

define('PAYTM_ENVIRONMENT', 'PROD'); // PROD

define('PAYTM_MERCHANT_KEY', 'hfY4tD#QQ6h#81sU'); //Change this constant's value with Merchant key received from Paytm.
define('PAYTM_MERCHANT_MID', 'IWxbsS52723333114565'); //Change this constant's value with MID (Merchant ID) received from Paytm.
define('PAYTM_MERCHANT_WEBSITE', 'DEFAULT'); //Change this constant's value with Website name received from Paytm.

//define('PAYTM_MERCHANT_KEY', '6CXb9j7pd88czRQ8'); //Change this constant's value with Merchant key received from Paytm.
//define('PAYTM_MERCHANT_MID', 'dzeVDw42602842441648'); //Change this constant's value with MID (Merchant ID) received from Paytm.
//define('PAYTM_MERCHANT_WEBSITE', 'DEFAULT'); //Change this constant's value with Website name received from Paytm.

$PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/order/status';
$PAYTM_TXN_URL='https://securegw.paytm.in/order/process';
if (PAYTM_ENVIRONMENT == 'PROD') {
	$PAYTM_STATUS_QUERY_NEW_URL='/TxnStatus.php';
	$PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
}

define('PAYTM_REFUND_URL', '');
define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
define('PAYTM_TXN_URL', $PAYTM_TXN_URL);
?>
