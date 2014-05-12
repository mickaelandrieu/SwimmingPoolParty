<?php

namespace Sw\Bundle\RestSwimmingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SwimmingPoolType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('address')
            ->add('zipCode')
            ->add('latitude')
            ->add('longitude')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sw\Bundle\RestSwimmingBundle\Entity\SwimmingPool'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sw_bundle_restswimmingbundle_swimmingpool';
    }
}
