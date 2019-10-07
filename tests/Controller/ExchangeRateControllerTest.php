<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExchangeRateControllerTest
 *
 * @author surajga
 */

namespace App\Tests\Controller;

use App\Entity\ExchangeRates;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Persistence\ObjectManager;

class ExchangeRateControllerTest extends WebTestCase {

    /**
     * @dataProvider getUrls
     */
    public function testUrls(string $url) {
        $client = static::createClient();
        $client->request('GET', $url);
        $this->assertSame(Response::HTTP_OK, $client->getResponse()->getStatusCode(), sprintf('The %s public URL loads correctly.', $url));
    }

    public function getUrls() {
        yield ['/'];
        yield ['/rates'];
    }

    /**
     * @dataProvider getExchangeRateAddData
     */
    public function testAddExchangeRate($base, $currency, $rate) {
        $this->assertNotNull($base);
        $this->assertIsString($base);
        $this->assertNotNull($currency);
        $this->assertIsString($base);
        $this->assertNotNull($rate);
        $this->assertIsFloat($rate);

        $formData = array(
            'base_currency' => $base,
            'currency' => $currency,
            'exchangeRate' => $rate
        );
        $client = static::createClient();
        $crawler = $client->request('POST', '/exchange/add', $formData);

        /** @var ExchangeRates $exchangeRate */
        $exchangeRate = $client->getContainer()
                ->get('doctrine')
                ->getRepository(ExchangeRates::class)
                ->findOneBy(array('currency' => $currency, 'base_currency' => $base, 'exchange_rate' => $rate));

        $this->assertNotNull($exchangeRate);
        $this->assertSame($base, $exchangeRate->getBaseCurrency());
        $this->assertSame($currency, $exchangeRate->getCurrency());
        $this->assertSame($rate, $exchangeRate->getExchangeRate());
    }

    /**
     * Data provider for function testAddExchangeRate
     */
    public function getExchangeRateAddData() {
        yield['USD', 'INR', 67.67];
        yield['USD', 'GBP', 1.22];
        yield['USD', NULL, 1.22];
    }

    /**
     * @dataProvider getExchangeRateEditData
     */
    public function testUpdateExchangeRate($id, $base, $currency, $rate) {
        $this->assertNotNull($base);
        $this->assertIsString($base);
        $this->assertNotNull($currency);
        $this->assertIsString($base);
        $this->assertNotNull($rate);
        $this->assertIsFloat($rate);

        $formData = array(
            'id' => $id,
            'base_currency' => $base,
            'currency' => $currency,
            'exchangeRate' => $rate
        );
        $client = static::createClient();
        $crawler = $client->request('PUT', '/exchange/update', $formData);

        /** @var ExchangeRates $exchangeRate */
        $exchangeRate = $client->getContainer()
                ->get('doctrine')
                ->getRepository(ExchangeRates::class)
                ->findOneBy(array('id' => $id));

        $this->assertSame($base, $exchangeRate->getBaseCurrency());
        $this->assertSame($currency, $exchangeRate->getCurrency());
        $this->assertSame($rate, $exchangeRate->getExchangeRate());
    }

    /**
     * Data provider for function testUpdateExchangeRate
     */
    public function getExchangeRateEditData() {
        yield[1, 'USD', 'INR', 67.69];
        yield[2, 22, 'GBP', 1.23];
        yield[2, 'INR', 'GBP', 'XYZ'];
        yield[3, NULL, 'GBP', 1.23];
    }

    /**
     * @dataProvider getDeleteId
     */
    public function testDeleteExchangeRate($id) {
        $formData = array(
            'id' => $id
        );
        $client = static::createClient();

        /** @var ExchangeRates $foundExchangeRate */
        $foundExchangeRate = $client->getContainer()
                ->get('doctrine')
                ->getRepository(ExchangeRates::class)
                ->findOneBy(array('id' => $id));
        $this->assertNotNull($foundExchangeRate);

        $crawler = $client->request('GET', '/exchange/delete', $formData);
        $crawler = $client->followRedirect();

        /** @var ExchangeRates $exchangeRate */
        $exchangeRate = $client->getContainer()
                ->get('doctrine')
                ->getRepository(ExchangeRates::class)
                ->findOneBy(array('id' => $id));
        $this->assertNull($exchangeRate);
    }

    /**
     *  Data provider for tesDeleteExchangeRate
     */
    public function getDeleteId() {
        yield[3];
        yield[4];
    }

}
