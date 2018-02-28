<?php

namespace Omnipay\Paystack;

use Omnipay\Common\AbstractGateway;
use Omnipay\Paystack\Message\AuthorizeRequest;
use Omnipay\Paystack\Message\InitialiseRequest;

/**
 * @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface capture(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface purchase(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface completePurchase(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface refund(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface void(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface createCard(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = array())
 */
class StandardGateway extends AbstractGateway
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Paystack Standard';
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function authorize(array $parameters = [])
    {
        return $this->createRequest(AuthorizeRequest::class, $parameters);
    }
}
