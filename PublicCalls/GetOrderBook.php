<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 12/23/2017
 * Time: 5:53 PM
 */

namespace BittrexApi\PublicCalls;

use BittrexApi\PublicCalls\PublicCall;
use BittrexApi\SellOrder;
use BittrexApi\BuyOrder;

class GetOrderBook extends PublicCall
{
    public $endpoint = 'public/getorderbook';
    private $market;
    private $type;

    private $sells;
    private $buys;

    public function __construct($client, $market, $type)
    {
        $this->client = $client;
        $this->market = $market;
        $this->type = $type;
    }

    public function execute(){
        $result = $this->client->call($this->endpoint, array('market' => $this->market, 'type' => $this->type));


        if($result->success){

            foreach ($result->result->buy as $buy){

                echo '<pre>';
                print_r($buy);
                echo '</pre>';

                $this->buys[] = $this->castObject($buy, new BuyOrder());
            }

            foreach ($result->result->buy as $sell){
                $this->sells[] = $this->castObject($sell, new SellOrder());
            }
        }

        return array($this->buys, $this->sells);
    }

}