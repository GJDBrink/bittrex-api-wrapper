<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 16-Jun-18
 * Time: 22:25
 */

namespace BittrexApi;


class OpenOrder
{

    public $Uuid;
    public $OrderUuid;
    public $Exchange;
    public $OrderType;
    public $Quantity;
    public $QuantityRemaining;
    public $Limit;
    public $CommissionPaid;
    public $Price;
    public $PricePerUnit;
    public $Opened;
    public $Closed;
    public $CancelInitiated;
    public $ImmediateOrCancel;
    public $IsConditional;
    public $Condition;
    public $ConditionTarget;

}