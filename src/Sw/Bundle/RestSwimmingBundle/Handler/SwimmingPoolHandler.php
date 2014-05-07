<?php
namespace Sw\Bundle\RestSwimmingBundle\Handler;

class SwimmingPoolHandler
{
    // ..
    public function __construct($om, $entityClass)
    {
        $this->om = $om;
        $this->entityClass = $entityClass;
        $this->repository = $this->om->getRepository($this->entityClass);
    }

    // ...
    public function get($id)
    {
        return $this->repository->find($id);
    }
}