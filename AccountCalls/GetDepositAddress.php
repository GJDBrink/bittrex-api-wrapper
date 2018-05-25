<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 1/9/2018
 * Time: 9:45 PM
 */

namespace BittrexApi\AccountCalls;

use BittrexApi\DepositAddress;

class GetDepositAddress extends AccountCall
{

    public $endpoint = 'account/getdepositaddress';

    /** @var ApiClient */
    private $client;

    private $currency;

    public function __construct($client, $currency)
    {
        $this->client = $client;
        $this->currency = $currency;
    }

    public function execute(){
        $result = $this->client->call($this->endpoint,array('currency' => $this->currency));

        if($result->success){
            return $this->cast($result->result);
        }

    }

    public function cast($sourceObject)
    {
        $destination = new DepositAddress();

        return $this->castObject($destination, $sourceObject);
    }

}