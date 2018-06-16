<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 1/9/2018
 * Time: 9:44 PM
 */

namespace BittrexApi\MarketCalls;

use BittrexApi\MarketCalls\MarketCall;
use BittrexApi\OpenOrder;

class GetOpenOrders extends MarketCall
{
    public $endpoint = 'market/getopenorders';

    private $market;

    private $openOrders;

    public function __construct($client, $market = '')
    {
        $this->client = $client;
        $this->market = $market;
    }

    public function execute(){
        $result = $this->client->call($this->endpoint, array('market' => $this->market));

        if($result->success){
            foreach ($result->result as $openOrder){
                $this->openOrders[] = $this->cast($openOrder);
            }
        }

        return $this->openOrders;
    }

    public function cast($sourceObject)
    {
        $destination = new OpenOrder();

        return $this->castObject($destination, $sourceObject);
    }

}