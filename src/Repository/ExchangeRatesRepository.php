<?php

namespace App\Repository;

use App\Entity\ExchangeRates;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ExchangeRates|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExchangeRates|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExchangeRates[]    findAll()
 * @method ExchangeRates[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExchangeRatesRepository extends ServiceEntityRepository {

    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, ExchangeRates::class);
    }

     /**
     * Save exchange rates data into database table
     * @param JSON $exchangeRatesData
     * @return int
     */

    private function saveExchangeRate($exchangeRates,$baseCurrency) {
        $objEntityManager = $this->getDoctrine()->getManager();

        foreach ($exchangeRates->rates as $key => $exchangeRate) {
            $objExchangeRate = new ExchangeRates();
            $objExchangeRate->setBaseCurrency($baseCurrency);
            $objExchangeRate->setCurrency($key);
            $objExchangeRate->setExchangeRate(number_format((float) $exchangeRate, 2, '.', ''));
            $objExchangeRate->setCreatedDatetime(new \DateTime('@' . strtotime('now')));

            $objEntityManager->persist($objExchangeRate);
        }

        $objEntityManager->flush();
    }

}
