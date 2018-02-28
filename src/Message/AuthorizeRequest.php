<?php

namespace Omnipay\Paystack\Message;

use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\ResponseInterface;

class AuthorizeRequest extends AbstractRequest
{
    /**
     * @var string
     */
    static protected $endpoint = 'https://api.paystack.co/transaction/initialize';

    /**
     * @inheritdoc
     */
    public function getData()
    {
        $this->validate('email', 'amount');

        $data['email'] = $this->getEmail();
        $data['amount'] = $this->getAmount();
        $data['callback_url'] = $this->getReturnUrl();

        return $data;
    }

    /**
     * @inheritdoc
     */
    public function sendData($data)
    {
        $this->httpRequest->headers->add([
            'authorization' => 'Bearer ' . $this->getSecret(),
            'content-type' => 'application/json',
            'cache-control' => 'no-cache',
        ]);

        return $this->response = new AuthorizeResponse(
            $this,
            $data,
            static::$endpoint
        );
    }

    /**
     * @param string $value
     *
     * @return AuthorizeRequest
     */
    public function setEmail(string $value): AuthorizeRequest
    {
        return $this->setParameter('email', $value);
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->getParameter('email');
    }

    protected function getSecret()
    {
        return $this->getTestMode()
            ? 'pk_test_adeb5992925c218ba85317cbf7a87236f496ad53'
            : 'pk_test_adeb5992925c218ba85317cbf7a87236f496ad53';
    }
}
