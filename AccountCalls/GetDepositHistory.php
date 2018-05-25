<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 1/9/2018
 * Time: 9:47 PM
 */

namespace BittrexApi\AccountCalls;

use BittrexApi\DepositHistory;

class GetDepositHistory extends AccountCall
{

    public $endpoint = 'account/getdeposithistory';

    /** @var ApiClient */
    private $client;

    private $currency;

    private $depositHistories;

    public function __construct($client, $currency)
    {
        $this->client = $client;
        $this->currency = $currency;
    }

    public function execute(){
        $result = $this->client->call($this->endpoint,array('currency' => $this->currency));

        if($result->success){
            foreach ($result->result as $depositHistory){
                $this->depositHistories[] = $this->cast($depositHistory);
            }
        }

        return $this->depositHistories;

    }

    public function cast($sourceObject)
    {
        $destination = new DepositHistory();

        return $this->castObject($destination, $sourceObject);
    }

}