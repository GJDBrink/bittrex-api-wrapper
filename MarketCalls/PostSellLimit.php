<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 1/9/2018
 * Time: 9:44 PM
 */

namespace BittrexApi\MarketCalls;

use BittrexApi\MarketCalls\MarketCall;
use BittrexApi\SellLimit;

class PostSellLimit extends MarketCall
{
    private $endpoint = 'market/selllimit';
    private $market;
    private $quantity;
    private $rate;

    public function __construct($client, $market, $quantity, $rate)
    {
        $this->client = $client;
        $this->market = $market;
        $this->quantity = $quantity;
        $this->rate = $rate;
    }

    public function execute(){
        $result = $this->client->call($this->endpoint, array(
            'market' => $this->market,
            'quantity' => $this->quantity,
            'rate' => $this->rate));

        if($result->success){
            return $this->cast($result->result);
        }

    }

    public function cast($sourceObject)
    {
        $destination = new SellLimit();

        return $this->castObject($destination, $sourceObject);
    }

}