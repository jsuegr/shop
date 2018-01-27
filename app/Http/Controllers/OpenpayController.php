<?php

namespace App\Http\Controllers;
require_once 'vendor/autoload.php';

use Illuminate\Http\Request;

class OpenpayController extends Controller
{
    //

	public function __construct(){
		$openpay = Openpay::getInstance('mzi3n9jplzsfvk30dqlb', 
	  'sk_b7bfb7b8696b41eca236e27590588e5a');
	}

	public function add_customer(){
		$customerData = array(
		'name' => 'Teofilo',
		'last_name' => 'Velazco',
		'email' => 'teofilo@payments.com',
		'phone_number' => '4421112233',
		'address' => array(
				'line1' => 'Privada Rio No. 12',
				'line2' => 'Co. El Tintero',
				'line3' => '',
				'postal_code' => '76920',
				'state' => 'Querétaro',
				'city' => 'Querétaro.',
				'country_code' => 'MX'));
		$customer = $openpay->customers->add($customerData);
	}

	public function get_customer(){
		$customer = $openpay->customers->get('a9ualumwnrcxkl42l6mh');
	}

	
	public function update_customer()
	{
		$customer = $openpay->customers->get('a9ualumwnrcxkl42l6mh');
		$customer->name = 'Juan';
		$customer->last_name = 'Godinez';
		$customer->save();
	}


	public function add_card()
	{
		$cardData = array(
		'holder_name' => 'Teofilo Velazco',
		'card_number' => '4916394462033681',
		'cvv2' => '123',
		'expiration_month' => '12',
		'expiration_year' => '15',
		'address' => array(
				'line1' => 'Privada Rio No. 12',
				'line2' => 'Co. El Tintero',
				'line3' => '',
				'postal_code' => '76920',
				'state' => 'Querétaro',
				'city' => 'Querétaro.',
				'country_code' => 'MX'));

		$customer = $openpay->customers->get('a9ualumwnrcxkl42l6mh');
		$card = $customer->cards->add($cardData);
	}

	public function get_card()
	{
		$openpay = Openpay::getInstance('moiep6umtcnanql3jrxp', 'sk_3433941e467c1055b178ce26348b0fac');

		$customer = $openpay->customers->get('a9ualumwnrcxkl42l6mh');
		$card = $customer->cards->get('k9pn8qtsvr7k7gxoq1r5');
	}

	public function delete_card()
	{
		$customer = $openpay->customers->get('a9ualumwnrcxkl42l6mh');
		$card = $customer->cards->get('k9pn8qtsvr7k7gxoq1r5');
		$card->delete();
	}

	public function make_charge()
	{
		$chargeData = array(
			'source_id' => 'tvyfwyfooqsmfnaprsuk',
			'method' => 'card',
			'amount' => 100,
			'description' => 'Cargo inicial a mi cuenta',
			'order_id' => 'ORDEN-00070');

		$customer = $openpay->customers->get('a9ualumwnrcxkl42l6mh');
		$charge = $customer->charges->create($chargeData);
	}

	public function get_charge()
	{
		$customer = $openpay->customers->get('a9ualumwnrcxkl42l6mh');
		$charge = $customer->charges->get('tvyfwyfooqsmfnaprsuk');
	}

	public function make_refund()
	{		
		$refundData = array('description' => 'Reembolso' );
		$customer = $openpay->customers->get('a9ualumwnrcxkl42l6mh');
		$charge = $customer->charges->get('tvyfwyfooqsmfnaprsuk');
		$charge->refund($refundData);
	}

	/*
	$customer = array(
	     'name' => "Josue Garcia",
	     'last_name' => "Rodriguez",
	     'phone_number' => "525568625718",
	     'email' => "jsuegr@gmail.com");

	$chargeData = array(
	    'method' => 'card',
	    'source_id' => $_POST["token_id"],
	    'amount' => (float)451,
	    'description' => "Pago con tarjeta",
	    //'use_card_points' => $_POST["use_card_points"], // Opcional, si estamos usando puntos
	    'device_session_id' => $_POST["deviceIdHiddenFieldName"],
	    'customer' => $customer
	    );
	$charge = $openpay->charges->create($chargeData);
	$array = json_decode(json_encode($charge,true));
	//print_r($array);
	echo $charge->card->brand;

	$findData = array(
	'creation[gte]' => '2013-01-01',
	'creation[lte]' => '2013-12-31',
	'offset' => 0,
	'limit' => 5);

	$chargeList = $openpay->charges->getList($findData);
	for($i=0;$i<count($charge);$i++){
		echo $charge[$i];	
	}
*/	

}
