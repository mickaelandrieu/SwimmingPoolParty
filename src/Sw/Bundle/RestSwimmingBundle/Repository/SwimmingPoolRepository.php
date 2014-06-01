<?php

namespace Sw\Bundle\RestSwimmingBundle\Repository;

use Doctrine\ORM\EntityRepository;

class SwimmingPoolRepository extends EntityRepository
{
    public function findAll()
    {
    	$json = file_get_contents(__DIR__ . "/../Fixtures/piscines.json");
        return $json;
    }
}
