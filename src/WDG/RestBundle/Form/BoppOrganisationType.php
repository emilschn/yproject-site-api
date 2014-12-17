<?php

namespace WDG\RestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BoppOrganisationType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('organisation_name')
            ->add('organisation_creation_date')
            ->add('organisation_type')
            ->add('organisation_legalform')
            ->add('organisation_idnumber')
            ->add('organisation_rcs')
            ->add('organisation_capital')
            ->add('organisation_address')
            ->add('organisation_postalcode')
            ->add('organisation_city')
            ->add('organisation_country')
            ->add('organisation_ape')
            ->add('organisation_website_url')
            ->add('organisation_societe_url')
            ->add('organisation_twitter_url')
            ->add('organisation_facebook_url')
            ->add('organisation_linkedin_url')
            ->add('organisation_viadeo_url')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WDG\RestBundle\Entity\BoppOrganisation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'organisation';
    }
}
