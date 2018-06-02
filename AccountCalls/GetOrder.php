<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 1/9/2018
 * Time: 9:46 PM
 */

namespace BittrexApi\AccountCalls;

use BittrexApi\Order;

class GetOrder extends AccountCall
{
    public $endpoint = 'account/getorder';

    /** @var ApiClient */
    private $client;

    private $uuid;

    public function __construct($client, $uuid)
    {
        $this->client = $client;
        $this->uuid = $uuid;
    }

    public function execute(){
        $result = $this->client->call($this->endpoint,array('uuid' => $this->uuid));

        if($result->success){
            return $this->cast($result->result);
        }

    }

    public function cast($sourceObject)
    {
        $destination = new Order();

        return $this->castObject($destination, $sourceObject);
    }


}