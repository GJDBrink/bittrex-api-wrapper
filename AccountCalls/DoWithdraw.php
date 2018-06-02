<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 1/9/2018
 * Time: 9:46 PM
 */

namespace BittrexApi\AccountCalls;

use BittrexApi\AccountCalls;
use BittrexApi\Withdraw;

class DoWithdraw extends AccountCall
{
    public $endpoint = 'account/withdraw';

    /** @var ApiClient */
    private $client;

    private $currency;
    private $quantity;
    private $address;
    private $paymentid;

    public function __construct($client, $currency, $quantity, $address, $paymentid)
    {
        $this->client = $client;
        $this->currency = $currency;
        $this->quantity = $quantity;
        $this->address = $address;
        $this->paymentid = $paymentid;
    }

    public function execute(){
        $result = $this->client->call($this->endpoint,array(
            'currency' => $this->currency,
            'quantity' => $this->quantity,
            'address' => $this->address,
            'paymentid' => $this->paymentid));

        if($result->success){
            return $this->cast($result->result);
        }

    }

    public function cast($sourceObject)
    {
        $destination = new Withdraw();

        return $this->castObject($destination, $sourceObject);
    }

}