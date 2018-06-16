<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 1/9/2018
 * Time: 9:44 PM
 */

namespace BittrexApi\MarketCalls;

use BittrexApi\MarketCalls\MarketCall;

class PostCancel extends MarketCall
{
    private $endpoint = 'market/cancel';
    private $uuid;

    public function __construct($client, $uuid)
    {
        $this->client = $client;
        $this->uuid = $uuid;
    }

    public function execute(){
        $result = $this->client->call($this->endpoint, array('uuid' => $this->uuid));

        if($result->success){
            return $result->result;
        }

    }

}