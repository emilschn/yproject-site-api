<?php

namespace WDG\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SfWdgUsersType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('wpUserId')
            ->add('userGender')
            ->add('userName')
            ->add('userSurname')
            ->add('userUsername')
            ->add('userBirthdayDate')
            ->add('userBirthdayCity')
            ->add('userAddress')
            ->add('userPostalCode')
            ->add('userCity')
            ->add('userEmail')
            ->add('userLinkedinUrl')
            ->add('userTwitterUrl')
            ->add('userViadeoUrl')
            ->add('userPictureUrl')
            ->add('userSignupDate')
            ->add('userActivationKey')
            ->add('userPassword')
            ->add('tasks')
            ->add('comments')
            ->add('events')
            ->add('news')
            ->add('discussions')
            ->add('newsfeed')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WDG\CoreBundle\Entity\SfWdgUsers',
            'csrf_protection' => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'users';
    }
}
