<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Service\ExchangeRatesApiService;
use App\Entity\ExchangeRates;
use App\Entity\Constants;

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
    public function addExchangeRate(Request $request, ValidatorInterface $validator) {
        $validatorResponse = $this->validateExchangeRate($request, $validator);
        if ($validatorResponse['status'] == false) {
            return new JsonResponse(array('status' => 'invalid', 'errors' => $validatorResponse['errorMessages']));
        } else {
            $baseCurrency = $request->request->get('base_currency');
            $currency = $request->request->get('currency');
            $exchangeRate = number_format((float) $request->request->get('exchangeRate'), 2, '.', '');
            $this->saveExchangeRate($baseCurrency, $currency, $exchangeRate, false);
            return new JsonResponse(array('status' => 'done'));
        }
    }

    /**
     * @Route("/exchange/update", name="updateExchangeRate", methods={"PUT"})
     */
    public function updateExchangeRate(Request $request, ValidatorInterface $validator) {
        $validatorResponse = $this->validateExchangeRate($request, $validator);
        if ($validatorResponse['status'] == false) {
            return new JsonResponse(array('status' => 'invalid', 'errors' => $validatorResponse['errorMessages']));
        } else {
            $baseCurrency = $request->request->get('base_currency');
            $currency = $request->request->get('currency');
            $exchangeRate = number_format((float) $request->request->get('exchangeRate'), 2, '.', '');
            $this->saveExchangeRate($baseCurrency, $currency, $exchangeRate, $request->request->get('id'));
            return new JsonResponse(array('status' => 'done'));
        }
        return new JsonResponse(array('status' => 'error', 'errors' => 'Unable to save data. Please try agian!'));
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
            $this->saveExchangeRate($row['base_currency'], $row['currency'], $row['exchange_rate'],false);
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
     * @param type $updateFlag
     */
    public function saveExchangeRate($baseCurrency, $currency, $rate, $id = false) {
        $entityManager = $this->getDoctrine()->getManager();
        if ($id != false) {
            $exchangeRates = $entityManager->getRepository(ExchangeRates::class)->find($id);
            $exchangeRates->setUpdatedDatetime(new \DateTime('@' . strtotime('now')));
        } else {
            $exchangeRates = new ExchangeRates();
        }
        $exchangeRates->setBaseCurrency($baseCurrency);
        $exchangeRates->setCurrency($currency);
        $exchangeRates->setExchangeRate($rate);
        $exchangeRates->setCreatedDatetime(new \DateTime('@' . strtotime('now')));
        $entityManager->persist($exchangeRates);
        $entityManager->flush();
    }

    /**
     * Function to save exchange rate data in database table
     * 
     * @param Request $request
     * @param ValidatorInterface $validator
     * 
     */
    public function validateExchangeRate($request, $validator) {
        $baseCurrency = $request->request->get('base_currency');
        $currency = $request->request->get('currency');
        $exchangeRate = number_format((float) $request->request->get('exchangeRate'), 2, '.', '');
        $input = ['base_currency' => $baseCurrency, 'currency' => $currency, 'exchangeRate' => $exchangeRate];

        $constraints = new Assert\Collection([
            'base_currency' => [new Assert\NotBlank],
            'currency' => [new Assert\Length(['min' => 2]), new Assert\NotBlank, new Assert\Type('string')],
            'exchangeRate' => [new Assert\NotBlank],
        ]);

        $violations = $validator->validate($input, $constraints);
        if (count($violations) > 0) {
            $errorMessages = '';
            foreach ($violations as $violation) {
                $errorMessages .= $violation->getMessage();
            }
            return array('status' => false, 'errorMessages' => $errorMessages);
        } else {
            return array('status' => true);
        }
    }

}
