<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 1/9/2018
 * Time: 9:45 PM
 */

namespace BittrexApi\AccountCalls;

use BittrexApi\AccountCalls\AccountCall;
use BittrexApi\Balance;

class GetBalances extends AccountCall
{

    public $endpoint = 'account/getbalances';

    /** @var ApiClient */
    private $client;

    private $balances;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function execute(){
        $result = $this->client->call($this->endpoint);

        if($result->success){
            foreach ($result->result as $balance){
                $this->balances[] = $this->cast($balance);
            }
        }

        echo '<pre>';
        var_dump($this->balances);
        echo '</pre>';
    }

    public function cast($sourceObject)
    {
        $destination = new Balance();

        return $this->castObject($destination, $sourceObject);
    }

}