<?php

namespace WDG\RestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use WDG\RestBundle\EventListener\PatchSubscriber;

class BoppProjectType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $subscriber = new PatchSubscriber();
        $builder->addEventSubscriber($subscriber);
        $builder
            ->add('project_wp_id')
            ->add('project_name')
            ->add('project_slogan')
            ->add('project_description')
            ->add('project_video_url')
            ->add('project_image_url')
            ->add('project_category')
            ->add('project_business_sector')
            ->add('project_funding_type')
            ->add('project_funding_duration')
            ->add('project_return_on_investment')
            ->add('project_investor_benefit')
            ->add('project_summary')
            ->add('project_economy_excerpt')
            ->add('project_social_excerpt')
            ->add('project_environment_excerpt')
            ->add('project_mission')
            ->add('project_economy')
            ->add('project_social')
            ->add('project_environment')
            ->add('project_measure_performance')
            ->add('project_good_point')
            ->add('project_context_excerpt')
            ->add('project_market_excerpt')
            ->add('project_context')
            ->add('project_market')
            ->add('project_worth_offer')
            ->add('project_client_collaborator')
            ->add('project_business_core')
            ->add('project_income')
            ->add('project_cost')
            ->add('project_clients_canvas')
            ->add('project_worth_offer_canvas')
            ->add('project_chain_distribution_canvas')
            ->add('project_customers_relations_canvas')
            ->add('project_source_of_income_canvas')
            ->add('project_ressources_canvas')
            ->add('project_activities_canvas')
            ->add('project_collaborators_canvas')
            ->add('project_cost_structure_canvas')
            ->add('project_financial_board')
            ->add('project_perspectives')
            ->add('project_other_information')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WDG\RestBundle\Entity\BoppProject'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'project';
    }
}
