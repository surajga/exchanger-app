<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApiServiceTest
 *
 * @author surajga
 */

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpClient\HttpClient;

class ApiServiceTest extends WebTestCase {

    /**
     * @dataProvider getUrls
     */
    public function testApiUrl(string $apiUrl) {
        $objHttpClient = HttpClient::create();
        $response = $objHttpClient->request('GET', $apiUrl);
        $this->assertEquals(200, $response->getStatusCode());        

        $data = json_decode($response->getContent(),true);
        $this->assertArrayHasKey('rates', $data);
    }

    public function getUrls() {
        yield ['http://api.exchangeratesapi.io/latest?base=USD'];
        yield ['http://api.exchangeratesapi.io/latest?base=INR'];
    }

}
