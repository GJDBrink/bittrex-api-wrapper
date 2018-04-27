<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 12/13/2017
 * Time: 8:53 PM
 */



require('ApiClient.php');

use BittrexApi\ApiClient;
use BittrexApi\PublicCalls\GetMarkets;
use BittrexApi\PublicCalls\GetCurrencies;
use BittrexApi\PublicCalls\GetTicker;
use BittrexApi\PublicCalls\GetMarketSummaries;
use BittrexApi\PublicCalls\GetMarketHistory;
use BittrexApi\AccountCalls\GetBalances;

$client = new ApiClient();

//$call = new GetMarkets($client);

//$call = new GetCurrencies($client);

//$call = new GetTicker($client, 'BTC-LTC');

//$call = new GetMarketSummaries($client);

$call = new GetBalances($client);

$call->execute();