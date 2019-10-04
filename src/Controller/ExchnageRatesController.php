<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Service\ExchangeRatesApiService;
use App\Entity\ExchangeRates;
use App\Entity\Constants;

class ExchnageRatesController extends AbstractController {

//    const DEFAULT_CURRENCY = 'USD';
//    const BASE_CURRENCIES = array('USD', 'INR');
//    const CURRENCY_LIST = array('AUD', 'GBP', 'EUR', 'INR', 'USD');

    /**
     * Constructor function
     */
    public function __construct() {
        
    }

    /**
     * @Route("/", name="exchange", methods={"GET"})
     */
    public function index() {
        return $this->render('exchange_rates/index.html.twig');
    }

    /**
     * @Route("/rates", name="show_rates", methods={"GET"})
     */
    public function showExchangeRates(Request $request) {
        $baseCurrency = ($request->query->get('base')) ? $request->query->get('base') : Constants::DEFAULT_CURRENCY;
        $exchangeRatesData = $this->getDoctrine()
                ->getRepository(ExchangeRates::class)
                ->findBy(array('base_currency' => $baseCurrency));


        return $this->render('exchange_rates/rates.html.twig', array(
                    'base_currency' => $baseCurrency,
                    'base_currencies' => Constants::BASE_CURRENCIES,
                    'exchange_rates' => json_decode($this->serializeObjectToJson($exchangeRatesData)),
                    'currnecy_list' => Constants::CURRENCY_LIST));
    }

    /**
     * @Route("/exchange/add", name="addExchangeRates", methods={"POST"})
     */
    public function addExchangeRate(Request $request) {
        $baseCurrency = $request->request->get('base_currency');
        $currency = $request->request->get('currency');
        $exchangeRate = $request->request->get('exchangeRate');
        $insertId = $this->saveExchangeRate($baseCurrency, $currency, $exchangeRate);
        return new Response('Data saved');
    }

    /**
     * @Route("/exchange/update", name="updateExchangeRate", methods={"PUT"})
     */
    public function updateExchangeRate(Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $exchangeRates = $entityManager->getRepository(ExchangeRates::class)
                ->find($request->request->get('id'));

        if (!is_null($exchangeRates)) {
            $exchangeRates->setBaseCurrency($request->request->get('base_currency'));
            $exchangeRates->setCurrency($request->request->get('currency'));
            $rateValue = number_format((float) $request->request->get('exchangeRate'), 2, '.', '');
            $exchangeRates->setExchangeRate($rateValue);
            $exchangeRates->setUpdatedDatetime(new \DateTime('@' . strtotime('now')));
            $entityManager->persist($exchangeRates);
            $entityManager->flush();
            return new Response('Data saved ' . $exchangeRates->getId());
        }

        return new Response('Could not save data. Please try again');
    }

    /**
     * @Route("/exchange/delete", name="deleteExchangeRate", methods={"GET"})
     */
    public function deleteExchangeRate(Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $exchangeRates = $entityManager->getRepository(ExchangeRates::class)
                ->find($request->query->get('id'));

        if (!is_null($exchangeRates)) {
            $entityManager->remove($exchangeRates);
            $entityManager->flush();
            return $this->redirectToRoute('show_rates');
        }
        return new Response('Could not delete');
    }

    /**
     * @Route("/refresh_rates", name="latestRates", methods={"GET"})
     */
    public function getExchangeRates(ExchangeRatesApiService $objService, Request $request) {
        $base = $request->query->get('base');
        $exchangeRates = $objService->getCurrentExchangeRate($base);
        $this->refreshExchangeRates($exchangeRates);
        return $this->redirectToRoute('show_rates', array('base' => $base,));
    }

    /**
     * Save exchange rates information to DB
     * @param Array $exchangeRates
     */
    private function refreshExchangeRates($exchangeRates) {
        foreach ($exchangeRates as $row) {
            $this->saveExchangeRate($row['base_currency'], $row['currency'], $row['exchange_rate']);
        }
    }

    /**
     * Function to serilize objects data into JSON data
     */
    private function serializeObjectToJson($inputObject) {
        $serilizer = $this->container->get('serializer');
        $jsondata = $serilizer->serialize($inputObject, 'json');

        return $jsondata;
    }

    /**
     * Function to save exchange rate data in database table
     * 
     * @param type $baseCurrency
     * @param type $currency
     * @param type $exchangeRate
     */
    public function saveExchangeRate($baseCurrency, $currency, $rate) {
        $entityManager = $this->getDoctrine()->getManager();
        $exchangeRates = new ExchangeRates();
        $exchangeRates->setBaseCurrency($baseCurrency);
        $exchangeRates->setCurrency($currency);
        $rateValue = number_format((float) $rate, 2, '.', '');
        $exchangeRates->setExchangeRate($rateValue);
        $exchangeRates->setCreatedDatetime(new \DateTime('@' . strtotime('now')));
        $entityManager->persist($exchangeRates);
        $entityManager->flush();
    }
}
