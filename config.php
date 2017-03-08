<?php
require_once('vendor/autoload.php');

$stripe = array(
  "secret_key"      => "sk_test_LbC6vVqCENo1WhVAPaniqJ0d",
  "publishable_key" => "pk_test_uWYohL9FRpNOS7XyNJlWBqX9"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>