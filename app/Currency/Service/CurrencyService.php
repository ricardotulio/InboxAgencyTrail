<?php

namespace InboxAgency\Currency\Service;

use InboxAgency\Session\SessionInterface as Session;

class CurrencyService implements CurrencyServiceInterface
{
    const DEFAULT_CURRENCY = 'BRL';

    private $session;

    private $currencies = [
        'BRL' => [
            'symbol' => 'R$',
            'rate' => 3.9
        ],
        'EUR' => [
            'symbol' => '€',
            'rate' => 1
        ],
        'USD' => [
            'symbol' => 'U$',
            'rate' => 1.17
        ],
    ];

    /**
     * @codeCoverageIgnore
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getCurrencies()
    {
        return $this->currencies;
    }

    public function set($code)
    {
        return $this->session->set('currency', $this->currencies[$code]);
    }

    public function get()
    {
        $currency = $this->session->get('currency');

        if ($currency == null) {
            $currency = $this->currencies[self::DEFAULT_CURRENCY];
        }

        return $currency;
    }
}
