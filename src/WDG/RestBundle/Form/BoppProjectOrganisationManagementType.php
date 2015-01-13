<?php

namespace WDG\RestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BoppProjectOrganisationManagementType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('boppOrganisation', 'entity', array(
                'class' => 'WDG\RestBundle\Entity\BoppOrganisation',
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
            'data_class' => 'WDG\RestBundle\Entity\BoppProjectOrganisationManagement',
            'csrf_protection' => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'project_organisation_management';
    }
}