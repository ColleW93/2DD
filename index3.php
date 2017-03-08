<?php
include 'settings.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PensoPay Payment Solution</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body>
<?php
if($_POST['paynow']){

	function sign($params, $api_key) {
		$flattened_params = flatten_params($params);
		ksort($flattened_params);
		$base = implode(" ", $flattened_params);

		return hash_hmac("sha256", $base, $api_key);
	}

	function flatten_params($obj, $result = array(), $path = array()) {
		if (is_array($obj)) {
			foreach ($obj as $k => $v) {
				$result = array_merge($result, flatten_params($v, $result, array_merge($path, array($k))));
			}
		} else {
			$result[implode("", array_map(function($p) { return "[{$p}]"; }, $path))] = $obj;
		}

		return $result;
	}
	$price = number_format($_POST['price'], 2);
	$price = $price*100;
  	$name = ($_POST['name']);
  	$email = ($_POST['email']);
  	$text = ($_POST['text']);
  	$params = array(
		"version"      => "v10",
		"merchant_id"  => DOMAIN_MERCHANT,
		"agreement_id" => DOMAIN_AGREEMENT,
		"order_id"     => ORDER_ID,
		"amount"       => (int)$price,
		"currency"     => CURRENCY,
		"continueurl" => DOMAIN_SUCCESS,
		"cancelurl"   => DOMAIN_CANCEL,
		"callbackurl" => DOMAIN_CALLBACK,
      	"payment_method" => "creditcard",
      	"autofee" => "1",
		"variables[name]" => $name,
		"variables[mail]" => $email,
		"variables[text]" => $text,
	);
	$params["checksum"] = sign($params, DOMAIN_API_KEY);

    $emailtemplate = ('
	<!DOCTYPE html>
	<html lang="en">
	<head>
	</head>
	<body>
		<h1>Hej '.$_POST['name'].' tak for din bestilling</h1>
		<label>Besked</label>
		<strong>'.$_POST['text'].'</strong>
	</body>
	</html>
	');

	$subject = 'Din bestilling er modtaget';
	$headers = "From: " . strip_tags(SHOP_EMAIL) . "\r\n";
	$headers .= "Reply-To: ". strip_tags(SHOP_EMAIL) . "\r\n";
	$headers .= "CC: ". strip_tags(SHOP_EMAIL) . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	mail($_POST['email'], $subject, $emailtemplate, $headers);
?>
	<form method="POST" action="https://payment.quickpay.net/framed">
		<input type="hidden" name="version" value="v10">
		<input type="hidden" name="merchant_id" value="<?php echo $params["merchant_id"]; ?>">
		<input type="hidden" name="agreement_id" value="<?php echo $params["agreement_id"]; ?>">
		<input type="hidden" name="order_id" value="<?php echo $params["order_id"]; ?>">
		<input type="hidden" name="amount" value="<?php echo $params["amount"]; ?>">
		<input type="hidden" name="currency" value="<?php echo $params["currency"]; ?>">
		<input type="hidden" name="continueurl" value="<?php echo $params["continueurl"]; ?>">
		<input type="hidden" name="cancelurl" value="<?php echo $params["cancelurl"]; ?>">
		<input type="hidden" name="callbackurl" value="<?php echo $params["callbackurl"]; ?>">
        <input type="hidden" name="variables[name]" value="<?php echo $params["variables[name]"]; ?>">
		<input type="hidden" name="variables[mail]" value="<?php echo $params["variables[mail]"]; ?>">
		<input type="hidden" name="variables[text]" value="<?php echo $params["variables[text]"]; ?>">
        <input type="hidden" name="payment_methods" value="creditcard">
      	<input type="hidden" name="autofee" value="1">
		<input type="hidden" name="checksum" value="<?php echo $params["checksum"]; ?>">
		<input type="submit" id="triggerpayment" value="Continue to payment...">
    <script>
        $( document ).ready(function() {
            $("#triggerpayment").trigger("click");
        });
	</script>

	</form>
<?php
}else
{

include 'form.php';

}
?>
</body>
</html>