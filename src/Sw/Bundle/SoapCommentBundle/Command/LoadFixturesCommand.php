<?php
namespace Sw\Bundle\SoapCommentBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Faker;

class LoadFixturesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('sw:load:fixtures-comments')
            ->setDescription('Load all fixtures')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $folderPath =  $this->getContainer()->get('kernel')->getRootDir() . '/data';
            $xmlPath = $folderPath . '/comments.xml';
            $fs = new Filesystem();
            $fs->mkdir($folderPath);
            $fs->touch($xmlPath);

            $xmlObj = $this->buildXmlObj();
            $xmlObj->save($xmlPath);
            $output->writeln('All comments loaded in application.');
        } catch (IOException $e) {
            $output->writeln($e->getMessage());
        }catch (Exception $e) {
            $output->writeln($e->getMessage());
        }
    }

    private function buildXmlObj()
    {
        $doc = new \DOMDocument('1.0', 'utf-8');
        $doc->formatOutput = true;
        $xmlObj = $this->buildComments($doc);

        return $xmlObj;
    }

    private function buildComments(\DOMDocument $doc)
    {
        $faker = Faker\Factory::create();

        $swimmingPoolIds = [2919,2920,2921,2923,2924,2925,2926,2927,2928,2929,2931,2932,2933,2934,2935,2937,2938,2939,2940,2942,2943,2944,2946,2947,3324,3325,4012,5041,1734];
        $root = $doc->createElement('comments');

        foreach($swimmingPoolIds as $id) {
            $comment = $doc->createElement('comment');
            $rank = $doc->createElement('rank', rand(1,5));
            $author = $doc->createElement('author', $faker->name());
            $swimmingPoolId = $doc->createElement('swimmingPoolId', $id);

            $rank = $comment->appendChild($rank);
            $author = $comment->appendChild($author);
            $swimmingPoolId = $comment->appendChild($swimmingPoolId);

            $comment = $root->appendChild($comment);
        }

        $root = $doc->appendChild($root);
        return $doc;
    }
}

