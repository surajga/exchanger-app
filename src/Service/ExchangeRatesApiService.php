<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpClient\HttpClient;
use App\Entity\Constants;

/**
 * 
 *
 * @author surajga
 */
class ExchangeRatesApiService {

    /**
     * Constructor function
     */
    public function __construct() {
        
    }

    /**
     * Get current exchange rates
     * @param String $base
     * @return Array $exchangeRates
     */
    public function getCurrentExchangeRate($base) {

        $objHttpClient = HttpClient::create();
        $responseData = $objHttpClient->request('GET', Constants::EXCHANGE_RATE_API_URL . 'latest?base=' . $base)->getContent();
        $data = json_decode($responseData, true);

        foreach ($data['rates'] as $currency => $rate) {
            $exchangeRates[] = array(
                'base_currency' => $base,
                'currency' => $currency,
                'exchange_rate' => $rate
            );
        }

        return $exchangeRates;
    }
}
