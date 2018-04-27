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

class GetMarketSummaries extends PublicCall
{
    public $endpoint = 'public/getmarketsummaries';

    /** @var ApiClient */
    private $client;

    private $markets;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function execute(){
        $result = $this->client->call($this->endpoint);

        if($result->success){
            foreach ($result->result as $market){
                $this->markets[] = $this->cast($market);
            }
        }

        echo '<pre>';
        var_dump($this->markets[0]);
        echo '</pre>';
    }

    public function cast($sourceObject)
    {
        $destination = new MarketSummary();

        return $this->castObject($destination, $sourceObject);
    }

}