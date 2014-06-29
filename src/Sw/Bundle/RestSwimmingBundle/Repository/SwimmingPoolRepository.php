<?php

namespace Sw\Bundle\RestSwimmingBundle\Repository;

use Doctrine\ORM\EntityRepository;

class SwimmingPoolRepository extends EntityRepository
{
    public function findByZipcode($zipCode)
    {
        $query = $this->createQueryBuilder('s')
                      ->where('s.zipCode LIKE :zipcode')
                      ->setParameter('zipcode', $zipCode.'%');

        return $query->getQuery()->getResult();
    }
}
