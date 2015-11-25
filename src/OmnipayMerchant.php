<?php

/*
 * Yii2 extension for payment processing with Omnipay, Payum and more later
 *
 * @link      https://github.com/hiqdev/yii2-merchant
 * @package   yii2-merchant
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\yii2\merchant;

use Omnipay\Omnipay;

/**
 * OmnipayMerchant class.
 */
class OmnipayMerchant extends AbstractMerchant
{
    public $requestClass = 'hiqdev\yii2\merchant\OmnipayRequest';

    public $responseClass = 'hiqdev\yii2\merchant\OmnipayResponse';

    /**
     * Omnipay Gateway object.
     */
    protected $_worker;

    public function getWorker()
    {
        if ($this->_worker === null) {
            $this->_worker = Omnipay::create($this->gateway)->initialize($this->data);
        }

        return $this->_worker;
    }

    public function getAssetDir()
    {
        return method_exists($this->getWorker(), 'getAssetDir') ? $this->getWorker()->getAssetDir() : null;
    }
}