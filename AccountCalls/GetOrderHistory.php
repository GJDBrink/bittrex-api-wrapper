<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 1/9/2018
 * Time: 9:46 PM
 */

namespace BittrexApi\AccountCalls;

use BittrexApi\OrderHistory;

class GetOrderHistory extends AccountCall
{
    public $endpoint = 'account/getorderhistory';

    /** @var ApiClient */
    private $client;

    private $market;

    private $orders;

    public function __construct($client, $market)
    {
        $this->client = $client;
        $this->market = $market;
    }

    public function execute(){
        $result = $this->client->call($this->endpoint, $this->market);

        if($result->success){
            foreach ($result->result as $order){
                $this->orders[] = $this->cast($order);
            }
        }

        return $this->orders;
    }

    public function cast($sourceObject)
    {
        $destination = new OrderHistory();

        return $this->castObject($destination, $sourceObject);
    }

}