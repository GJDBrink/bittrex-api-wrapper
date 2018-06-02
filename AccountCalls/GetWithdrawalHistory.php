<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 1/9/2018
 * Time: 9:47 PM
 */


namespace BittrexApi\AccountCalls;

use BittrexApi\AccountCalls\AccountCall;
use BittrexApi\WithdrawalHistory;

class GetWithdrawalHistory extends AccountCall
{
    public $endpoint = 'account/getwithdrawalhistory';

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
        $destination = new WithdrawalHistory();

        return $this->castObject($destination, $sourceObject);
    }

}