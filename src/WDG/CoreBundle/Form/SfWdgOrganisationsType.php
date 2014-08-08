<?php

namespace WDG\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SfWdgOrganisationsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('orgaName')
            ->add('orgaCreationDate')
            ->add('orgaImmatriculation')
            ->add('orgaHeadOffice')
            ->add('orgaAPEcode')
            ->add('orgaStrutureObject')
            ->add('orgaLegalRepresentative')
            ->add('orgaLegalRepresentativeCapacity')
            ->add('orgaKbisUrl')
            ->add('orgaIdDocLegalRepresentative')
            ->add('orgaWebsiteUrl')
            ->add('orgaSocieteUrl')
            ->add('orgaTwitterUrl')
            ->add('orgaFacebookUrl')
            ->add('projects')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WDG\CoreBundle\Entity\SfWdgOrganisations',
            'csrf_protection' => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'organisations';
    }
}
