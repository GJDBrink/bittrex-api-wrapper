<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 25-May-18
 * Time: 22:14
 */

namespace BittrexApi;


class DepositHistory
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