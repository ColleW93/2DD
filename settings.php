<?php
	define("DOMAIN_AGREEMENT", "11383");
	define("DOMAIN_MERCHANT", "3457");
	define("DOMAIN_API_KEY", "d32f6c877f1ccd8b0d0eeecfc517eafa4a585909c6297fff32f07369f532f2f5");
// Skift overstående til kundens, findes i gatewayen under integration
	define("DOMAIN_SUCCESS", "http://demobls.dk/version2-1/success.php");
	define("DOMAIN_CANCEL", "http://demobls.dk/version2-1/cancel.php");
	define("DOMAIN_CALLBACK", "http://demobls.dk/version2-1/index.php");
// Skift overstående til kundens adresser
	define("CURRENCY", ($_POST["currency"])); // Skift denne til EUR,USD, eller anden valuta hvis det ønskes
	define("SHOP_EMAIL", "bl@demobls.dk"); // Skift mailen til kundens (Kopi af betalingen fremsendes hertil) 
	define("ORDER_ID", date("d-m-Y_H-i"));
?>
