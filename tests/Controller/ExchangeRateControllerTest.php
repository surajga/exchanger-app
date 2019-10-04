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

use App\Entity\ExchangeRate;
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
        $this->assertSame(
                Response::HTTP_OK, $client->getResponse()->getStatusCode(), sprintf('The %s public URL loads correctly.', $url)
        );
    }

    public function getUrls() {
        yield ['/'];
        yield ['/rates'];
    }


    /**
     * @dataProvider getExchangeRateAddData
     */
    public function testAddExchangeRate($base, $currency, $rate) {

        $crawler = $client->request('POST', '/exchange/add');
        $form = $crawler->selectButton('Save')->form([
            'base_currency' => $base,
            'currency' => $currency,
            'exchange_rate' => $rate,
        ]);
        $client->submit($form);
        $this->assertSame(Response::HTTP_FOUND, $client->getResponse()->getStatusCode());

        /** @var ExchangeRate $exchangeRate */
        $exchangeRate = $client->getContainer()
                ->get('doctrine')
                ->getRepository(ExchangeRate::class)
                ->findOneBy(array('currency' => $currency, 'base_currency' => $base));

        $this->assertNotNull($exchangeRate);
        $this->assertSame($base, $user->getBaseCurrency());
        $this->assertSame($currency, $user->getCurrency());
        $this->assertSame($rate, $user->getExchangeRate());
    }

    public function getExchangeRateAddData() {
        yield['USD', 'INR', 67.67];
        yield['USD', 'GBP', 1.22];
    }

    /**
     * @dataProvider getExchangeRateEditData
     */
    public function testEditExchangeRate($base, $currency, $rate) {

        $crawler = $client->request('PUT', '/exchange/update');
        $form = $crawler->selectButton('Update')->form([
            'base_currency' => $base,
            'currency' => $currency,
            'exchange_rate' => $rate,
        ]);
        $client->submit($form);
        $this->assertSame(Response::HTTP_FOUND, $client->getResponse()->getStatusCode());

        /** @var ExchangeRate $exchangeRate */
        $exchangeRate = $client->getContainer()
                ->get('doctrine')
                ->getRepository(ExchangeRate::class)
                ->findOneBy(array('currency' => $currency, 'base_currency' => $base));

        $this->assertNotNull($exchangeRate);
        $this->assertSame($base, $user->getBaseCurrency());
        $this->assertSame($currency, $user->getCurrency());
        $this->assertSame($rate, $user->getExchangeRate());
    }

    public function getExchangeRateData() {
        yield['USD', 'INR', 65.65];
        yield['USD', 'GBP', 1.22];
    }

}
