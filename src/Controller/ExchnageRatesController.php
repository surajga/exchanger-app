<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpClient\HttpClient;
use App\Service\ExchangeRatesApiService;
use App\Entity\ExchangeRates;

class ExchnageRatesController extends AbstractController {

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
        $baseCurrency = ($request->query->get('base')) ? $request->query->get('base') : 'USD';
        $exchangeRatesData = $this->getDoctrine()
                ->getRepository(ExchangeRates::class)
                ->findBy(array('base_currency' => $baseCurrency));


        return $this->render('exchange_rates/rates.html.twig', [
                    'base_currency' => $baseCurrency,
                    'base_currencies' => array('USD', 'INR'),
                    'exchange_rates' => json_decode($this->serializeObjectToJson($exchangeRatesData)),
                    'currnecy_list' => array('AUD', 'GBP', 'EUR', 'INR', 'USD')]);
    }

    /**
     * @Route("/exchange/add", name="addExchangeRates", methods={"POST"})
     */
    public function addExchangeRate(Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $exchangeRates = new ExchangeRates();
        $exchangeRates->setbaseCurrency($request->request->get('base_currency'));
        $exchangeRates->setCurrency($request->request->get('currency'));
        $exchangeRates->setExchangeRate(number_format((float) $request->request->get('exchangeRate'), 2, '.', ''));
        $exchangeRates->setCreatedDatetime(new \DateTime('@' . strtotime('now')));
        $exchangeRates->setUpdatedDatetime(new \DateTime('@' . strtotime('now')));

        $entityManager->persist($exchangeRates);
        $entityManager->flush();

        return new Response('Data saved ' . $exchangeRates->getId());
    }

    /**
     * @Route("/exchange/update", name="updateExchangeRate", methods={"PUT"})
     */
    public function updateExchangeRate(Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $exchangeRates = $entityManager->getRepository(ExchangeRates::class)
                ->find($request->request->get('id'));

        if (!is_null($exchangeRates)) {
            $exchangeRates->setbaseCurrency($request->request->get('base_currency'));
            $exchangeRates->setCurrency($request->request->get('currency'));
            $exchangeRates->setExchangeRate(number_format((float) $request->request->get('exchangeRate'), 2, '.', ''));
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
        return $this->redirectToRoute('show_rates');
    }

    /**
     * Save exchange rates information to DB
     * @param Array $exchangeRates
     */
    private function refreshExchangeRates($exchangeRates) {
        $entityManager = $this->getDoctrine()->getManager();

        foreach ($exchangeRates as $row) {
            $exchangeRates = new ExchangeRates();
            $exchangeRates->setBaseCurrency($row['base_currency']);
            $exchangeRates->setCurrency($row['currency']);
            $exchangeRates->setExchangeRate(number_format((float) $row['exchange_rate'], 2, '.', ''));
            $exchangeRates->setCreatedDatetime(new \DateTime('@' . strtotime('now')));
            $exchangeRates->setUpdatedDatetime(new \DateTime('@' . strtotime('now')));
            $entityManager->persist($exchangeRates);
        }
        $entityManager->flush();
    }

    /**
     * Function to serilize objects data into JSON data
     */
    private function serializeObjectToJson($inputObject) {
        $serilizer = $this->container->get('serializer');
        $jsondata = $serilizer->serialize($inputObject, 'json');

        return $jsondata;
    }

}
