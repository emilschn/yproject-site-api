<?php

namespace WDG\RestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BoppOrganisationManagementType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('boppUser', 'entity', array(
                'class' => 'WDG\RestBundle\Entity\BoppUser',
                'property' => 'id',
              )
            )

            ->add('boppRole', 'entity', array(
                'class' => 'WDG\RestBundle\Entity\BoppRole',
                'property' => 'role_slug',
              )
            )
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WDG\RestBundle\Entity\BoppOrganisationManagement',
            'csrf_protection' => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'organisation_management';
    }
}