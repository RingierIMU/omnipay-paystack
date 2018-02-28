<?php

namespace Omnipay\Paystack\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\Common\Message\RequestInterface;

class AuthorizeResponse extends AbstractResponse implements RedirectResponseInterface
{
    protected $redirectUrl;

    public function __construct(RequestInterface $request, $data, $redirectUrl)
    {
        parent::__construct($request, $data);
        $this->redirectUrl = $redirectUrl;
    }

    /**
     * @return bool
     */
    public function isSuccessful()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isRedirect()
    {
        return true;
    }

    /**
     * @return mixed
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    /**
     * @return string
     */
    public function getRedirectMethod()
    {
        return 'POST';
    }

    /**
     * @return array
     */
    public function getRedirectData()
    {
        return $this->getData();
    }
}
