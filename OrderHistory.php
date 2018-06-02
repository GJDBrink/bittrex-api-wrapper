<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 26-May-18
 * Time: 00:29
 */

namespace BittrexApi;


class OrderHistory
{
    public $OrderUuid;
    public $Exchange;
    public $TimeStamp;
    public $OrderType;
    public $Limit;
    public $Quantity;
    public $QuantityRemaining;
    public $Commission;
    public $Price;
    public $PricePerUnit;
    public $IsConditional;
    public $Condition;
    public $ConditionTarget;
    public $ImmediateOrCancel;

}