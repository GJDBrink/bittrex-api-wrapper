<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 02-Jun-18
 * Time: 22:47
 */

namespace BittrexApi;


class WithdrawalHistory
{
    public $PaymentUuid;
    public $Currency;
    public $Amount;
    public $Address;
    public $Opened;
    public $Authorized;
    public $PendingPayment;
    public $TxCost;
    public $TxId;
    public $Canceled;
    public $InvalidAddress;

}