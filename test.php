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
use BittrexApi\AccountCalls\GetBalance;
use BittrexApi\AccountCalls\GetDepositAddress;
use BittrexApi\AccountCalls\GetDepositHistory;
use BittrexApi\AccountCalls\GetOrderHistory;
use BittrexApi\AccountCalls\GetWithdrawalHistory;
use BittrexApi\AccountCalls\DoWithdraw;

$client = new ApiClient();

//$call = new GetMarkets($client);

//$call = new GetCurrencies($client);

//$call = new GetTicker($client, 'BTC-LTC');

//$call = new GetMarketSummaries($client);

//$call = new GetDepositAddress($client, 'ETH');

//$call = new GetOrderHistory($client, 'BTC-VTC');
//$call = new GetWithdrawalHistory($client, 'BTC');
$call = new DoWithdraw($client, 'BTC', '1', '125Kh5VSnzV873yPpFnFpxyxbJ2RpUkgQX', '');

echo '<pre>';
print_r($call->execute());
echo '</pre>';