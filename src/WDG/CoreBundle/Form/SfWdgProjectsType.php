<?php

namespace WDG\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SfWdgProjectsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('wpProjectId')
            ->add('projectName')
            ->add('projectDescription')
            ->add('organisations')
            ->add('events')
            ->add('news')
            ->add('discussions')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WDG\CoreBundle\Entity\SfWdgProjects'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wdg_corebundle_sfwdgprojects';
    }
}
