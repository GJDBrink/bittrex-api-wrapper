<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 12/23/2017
 * Time: 5:52 PM
 */

namespace BittrexApi\PublicCalls;

use BittrexApi\Ticker;

class GetTicker extends PublicCall
{
    public $endpoint = 'public/getticker';

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
        $destination = new Ticker();

        return $this->castObject($destination, $sourceObject);
    }

}