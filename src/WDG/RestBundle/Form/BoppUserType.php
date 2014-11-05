<?php

namespace WDG\RestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BoppUserType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user_wp_id')
            ->add('user_gender')
            ->add('user_name')
            ->add('user_surname')
            ->add('user_username')
            ->add('user_birthday_date')
            ->add('user_birthday_city')
            ->add('user_address')
            ->add('user_postal_code')
            ->add('user_city')
            ->add('user_email')
            ->add('user_linkedin_url')
            ->add('user_twitter_url')
            ->add('user_facebook_url')
            ->add('user_viadeo_url')
            ->add('user_picture_url')
            ->add('user_website_url')
            ->add('user_activation_key')
            ->add('user_password')
            ->add('user_signup_date')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WDG\RestBundle\Entity\BoppUser'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'user';
    }
}
