<?php
namespace Sw\Bundle\RestSwimmingBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Sw\Bundle\RestSwimmingBundle\Entity\SwimmingPool;

class LoadFixturesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('sw:load:fixtures')
            ->setDescription('Load all fixtures')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $rootDir = $this->getContainer()->get('kernel')->getRootDir();
        try {
            $json = file_get_contents($rootDir.'/../src/Sw/Bundle/RestSwimmingBundle/Fixtures/piscines.json', true);
            $swimmingPools = json_decode($json);
            $this->insertAll($swimmingPools);
            $output->writeln('All swimming Pools loaded in database.');
        } catch (Exception $e) {
            $output->writeln($e->getMessage());
        }
    }

    private function insertAll($jsonArray)
    {
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        foreach ($jsonArray as $item) {
            $swimmingPool = new SwimmingPool();
            $swimmingPool->setName($item->name)
                ->setId($item->id)
                ->setAddress($item->address)
                ->setZipCode($item->zipCode)
                ->setLatitude($item->lat)
                ->setLongitude($item->lon)
            ;

            $em->persist($swimmingPool);
        }
        $em->flush();
    }
}
