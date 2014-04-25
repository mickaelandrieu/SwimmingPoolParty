<?php
namespace Sw\Bundle\SoapCommentBundle\Type;

use BeSimple\SoapBundle\ServiceDefinition\Annotation as Soap;
use BeSimple\SoapCommon\Type\AbstractKeyValue;

class Comment extends AbstractKeyValue
{
    /**
     * @Soap\ComplexType("Sw\Bundle\SoapCommentBundle\Entity\Comment")
     */
    protected $value;
}
