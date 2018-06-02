<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 26-May-18
 * Time: 00:38
 */

namespace BittrexApi;


class Order
{

    public $AccountId;
    public $OrderUuid;
    public $Exchange;
    public $Type;
    public $Quantity;
    public $QuantityRemaining;
    public $Limit;
    public $Reserved;
    public $ReserveRemaining;
    public $CommisionReserved;
    public $CommisionReserveRemaining;
    public $CommisionPaid;
    public $Price;
    public $PricePerUnit;
    public $Opened;
    public $Closed;
    public $IsOpen;
    public $Sentinel;
    public $CancelInitiated;
    public $ImmediateOrCancel;
    public $IsConditional;
    public $Condition;
    public $ConditionTarget;

}