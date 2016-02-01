<?php

namespace Eboost\Mollie;

class MollieApiClientManager
{
    /**
     * The application instance.
     *
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * The default settings
     */
    protected $config;

    /**
     * Create a new Mollie instance.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @param array $config
     */
    public function __construct($app, $config = [])
    {
        $this->app = $app;
        $this->config = $config;
    }

    /**
     * @return \Mollie_API_Client
     * @throws \Mollie_API_Exception
     */
    public function client()
    {
        $mollie = new \Mollie_API_Client();

        if ($this->config['testMode']) {
            $mollie->setApiKey($this->config['apiKeys']['test']);
        } else {
            $mollie->setApiKey($this->config['apiKeys']['live']);
        }

        return $mollie;
    }

    /**
     * @return \Mollie_API_Resource_Payments
     */
    public function getPayments()
    {
        return $this->client()->payments;
    }

    /**
     * @return \Mollie_API_Resource_Payments_Refunds
     */
    public function getPaymentRefunds()
    {
        return $this->client()->payments_refunds;
    }

    /**
     * @return \Mollie_API_Resource_Issuers
     */
    public function getIssuers()
    {
        return $this->client()->issuers;
    }

    /**
     * @return \Mollie_API_Resource_Methods
     */
    public function getMethods()
    {
        return $this->client()->methods;
    }

}
