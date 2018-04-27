<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 12/23/2017
 * Time: 5:53 PM
 */

namespace BittrexApi\PublicCalls;

use BittrexApi\PublicCalls\PublicCall;
use BittrexApi\MarketSummary;

class GetMarketSummary extends PublicCall
{
    public $endpoint = 'public/getmarketsummary';

    private $client;
    private $market;

    public function __construct($client, $market)
    {
        $this->client = $client;
        $this->market = $market;
    }

    public function execute(){
        $result = $this->client->call($this->endpoint, array('market' => $this->market));

        if($result->success){
            return $this->cast($result->result);
        }
    }

    public function cast($sourceObject)
    {
        $destination = new MarketSummary();

        return $this->castObject($destination, $sourceObject);
    }

}