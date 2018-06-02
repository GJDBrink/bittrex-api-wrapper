<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 12/23/2017
 * Time: 5:54 PM
 */

namespace BittrexApi\PublicCalls;

use BittrexApi\PublicCalls\PublicCall;
use BittrexApi\ApiClient;
use BittrexApi\Trade;

class GetMarketHistory extends PublicCall
{

    public $endpoint = 'public/getmarkethistory';

    /** @var ApiClient */
    private $client;

    private $market;

    private $trades;

    public function __construct($client, $market)
    {
        $this->client = $client;
        $this->market = $market;
    }

    public function execute(){
        $result = $this->client->call($this->endpoint, array('market' => $this->market));

        if($result->success){
            foreach ($result->result as $trade){
                $this->trades[] = $this->cast($trade);
            }
        }

        return $this->trades;
    }

    public function cast($sourceObject)
    {
        $destination = new Trade();

        return $this->castObject($destination, $sourceObject);
    }

}