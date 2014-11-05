<?php

namespace WDG\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SfWdgDiscussionsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('discussionTitle')
            ->add('discussionContent')
            ->add('discussionPrivacy')
            ->add('discussionType')
            ->add('projects', 'entity', array(
                'class' => 'WDG\CoreBundle\Entity\SfWdgProjects',
                'property' => 'id',
              )
            )
            ->add('users', 'entity', array(
                'class' => 'WDG\CoreBundle\Entity\SfWdgUsers',
                'property' => 'id',
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
            'data_class' => 'WDG\CoreBundle\Entity\SfWdgDiscussions',
            'csrf_protection' => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'discussions';
    }
}
