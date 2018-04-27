<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 12/24/2017
 * Time: 12:46 AM
 *
 * Class to wrap a stdClass from JSON to a Market object
 */

namespace BittrexApi;

class Market
{
    public $MarketCurrency;
    public $BaseCurrency;
    public $MarketCurrencyLong;
    public $BaseCurrencyLong;
    public $MinTradeSize;
    public $MarketName;
    public $IsActive;
    public $Created;
    public $Notice;
    public $IsSponsored;
    public $LogoUrl;

}