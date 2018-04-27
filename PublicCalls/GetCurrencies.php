<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 12/23/2017
 * Time: 5:52 PM
 */

namespace BittrexApi\PublicCalls;

use BittrexApi\Currency;

class GetCurrencies extends PublicCall
{

    public $endpoint = 'public/getcurrencies';

    private $currencies;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function execute(){
        $result = $this->client->call($this->endpoint);

        if($result->success){
            foreach ($result->result as $currency){
                $this->currencies[] = $this->cast($currency);
            }
        }

        echo '<pre>';
        var_dump($this->currencies[0]);
        echo '</pre>';
    }

    public function cast($sourceObject)
    {
        $destination = new Currency();

        return $this->castObject($destination, $sourceObject);
    }

}