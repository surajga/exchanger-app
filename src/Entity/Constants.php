<?php

namespace App\Entity;

/**
 * Description of Constants
 *
 * @author surajga
 */
class Constants {

    const DEFAULT_CURRENCY = 'USD';
    const BASE_CURRENCIES = array('USD', 'INR');
    const CURRENCY_LIST = array('AUD', 'BGN', 'BRL', 'CAD', 'CHF', 'CNY', 'CZK', 'DKK', 'EUR', 'GBP', 'HKD', 'HRK', 'HUF', 'IDR', 'ILS', 'INR', 'ISK', 'JPY', 'KRW', 'MXN', 'MYR', 'NOK', 'NZD', 'PHP', 'PLN');
    const EXCHANGE_RATE_API_URL = 'http://api.exchangeratesapi.io/'; // Ideally this should go to env configuration but for now we are not using any other env config variable

}
