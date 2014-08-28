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
            ->add('projectCreationDate')
            ->add('projectName')
            ->add('projectSlogan')
            ->add('projectDescription')
            ->add('projectVideo')
            ->add('projectImageVideo')
            ->add('projectImageCover')
            ->add('projectCategory')
            ->add('projectBusinessSector')
            ->add('projectFundingType')
            ->add('projectFundingDuration')
            ->add('projectReturnOnInvestment')
            ->add('projectInvestorBenefit')
            ->add('projectSummary')
            ->add('projectEconomyExcerpt')
            ->add('projectSocialExcerpt')
            ->add('projectEnvironmentExcerpt')
            ->add('projectMission')
            ->add('projectEconomy')
            ->add('projectSocial')
            ->add('projectEnvironment')
            ->add('projectMeasurePerformance')
            ->add('projectGoodPoint')
            ->add('projectContextExcerpt')
            ->add('projectMarketExcerpt')
            ->add('projectContext')
            ->add('projectMarket')
            ->add('projectWorthOffer')
            ->add('projectClientCollaborator')
            ->add('projectBusinessCore')
            ->add('projectIncome')
            ->add('projectCost')
            ->add('projectCollaboratorsCanvas')
            ->add('projectActivitiesCanvas')
            ->add('projectRessourcesCanvas')
            ->add('projectWorthOfferCanvas')
            ->add('projectCustomersRelationsCanvas')
            ->add('projectChainDistributionsCanvas')
            ->add('projectClientsCanvas')
            ->add('projectCostStructureCanvas')
            ->add('projectSourceOfIncomeCanvas')
            ->add('projectFinancialBoard')
            ->add('projectPerspectives')
            ->add('projectOtherInformation')
            ->add('tasks')
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
            'data_class' => 'WDG\CoreBundle\Entity\SfWdgProjects',
            'csrf_protection' => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'projects';
    }
}
