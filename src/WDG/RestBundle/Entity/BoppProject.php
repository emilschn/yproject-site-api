<?php

namespace WDG\RestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entity\BoppProject
 *
 * @ORM\Entity(repositoryClass="BoppProjectRepository")
 * @ORM\Table(name="bopp_project")
 */
class BoppProject
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $project_wp_id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $project_name;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $project_slogan;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_description;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_video_url;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_image_url;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_category;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_business_sector;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_funding_type;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_funding_duration;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_return_on_investment;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_investor_benefit;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_summary;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_economy_excerpt;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_social_excerpt;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_environment_excerpt;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_mission;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_economy;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_social;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_environment;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_measure_performance;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_good_point;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_context_excerpt;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_market_excerpt;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_context;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_market;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_worth_offer;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_client_collaborator;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_business_core;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_income;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_cost;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_clients_canvas;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_worth_offer_canvas;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_chain_distribution_canvas;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_customers_relations_canvas;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_source_of_income_canvas;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_ressources_canvas;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_collaborators_canvas;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_activities_canvas;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_cost_structure_canvas;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_financial_board;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_perspectives;

    /**
     * @ORM\Column(type="text")
     */
    protected $project_other_information;

    /**
     * @ORM\OneToMany(targetEntity="BoppDiscussion", mappedBy="boppProject")
     * @ORM\JoinColumn(name="id", referencedColumnName="bopp_project_id")
     */
    protected $boppDiscussions;

    /**
     * @ORM\OneToMany(targetEntity="BoppEvent", mappedBy="boppProject")
     * @ORM\JoinColumn(name="id", referencedColumnName="bopp_project_id")
     */
    protected $boppEvents;

    /**
     * @ORM\OneToMany(targetEntity="BoppNews", mappedBy="boppProject")
     * @ORM\JoinColumn(name="id", referencedColumnName="bopp_project_id")
     */
    protected $boppNews;

    /**
     * @ORM\OneToMany(targetEntity="BoppProjectManagement", mappedBy="boppProject")
     * @ORM\JoinColumn(name="id", referencedColumnName="bopp_project_id")
     */
    protected $boppProjectManagements;

    /**
     * @ORM\OneToMany(targetEntity="BoppTask", mappedBy="boppProject")
     * @ORM\JoinColumn(name="id", referencedColumnName="bopp_project_id")
     */
    protected $boppTasks;

    public function __construct()
    {
        $this->boppDiscussions = new ArrayCollection();
        $this->boppEvents = new ArrayCollection();
        $this->boppNews = new ArrayCollection();
        $this->boppProjectManagements = new ArrayCollection();
        $this->boppTasks = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Entity\BoppProject
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of project_wp_id.
     *
     * @param integer $project_wp_id
     * @return \Entity\BoppProject
     */
    public function setProjectWpId($project_wp_id)
    {
        $this->project_wp_id = $project_wp_id;

        return $this;
    }

    /**
     * Get the value of project_wp_id.
     *
     * @return integer
     */
    public function getProjectWpId()
    {
        return $this->project_wp_id;
    }

    /**
     * Set the value of project_name.
     *
     * @param string $project_name
     * @return \Entity\BoppProject
     */
    public function setProjectName($project_name)
    {
        $this->project_name = $project_name;

        return $this;
    }

    /**
     * Get the value of project_name.
     *
     * @return string
     */
    public function getProjectName()
    {
        return $this->project_name;
    }

    /**
     * Set the value of project_slogan.
     *
     * @param string $project_slogan
     * @return \Entity\BoppProject
     */
    public function setProjectSlogan($project_slogan)
    {
        $this->project_slogan = $project_slogan;

        return $this;
    }

    /**
     * Get the value of project_slogan.
     *
     * @return string
     */
    public function getProjectSlogan()
    {
        return $this->project_slogan;
    }

    /**
     * Set the value of project_description.
     *
     * @param string $project_description
     * @return \Entity\BoppProject
     */
    public function setProjectDescription($project_description)
    {
        $this->project_description = $project_description;

        return $this;
    }

    /**
     * Get the value of project_description.
     *
     * @return string
     */
    public function getProjectDescription()
    {
        return $this->project_description;
    }

    /**
     * Set the value of project_video_url.
     *
     * @param string $project_video_url
     * @return \Entity\BoppProject
     */
    public function setProjectVideoUrl($project_video_url)
    {
        $this->project_video_url = $project_video_url;

        return $this;
    }

    /**
     * Get the value of project_video_url.
     *
     * @return string
     */
    public function getProjectVideoUrl()
    {
        return $this->project_video_url;
    }

    /**
     * Set the value of project_image_url.
     *
     * @param string $project_image_url
     * @return \Entity\BoppProject
     */
    public function setProjectImageUrl($project_image_url)
    {
        $this->project_image_url = $project_image_url;

        return $this;
    }

    /**
     * Get the value of project_image_url.
     *
     * @return string
     */
    public function getProjectImageUrl()
    {
        return $this->project_image_url;
    }

    /**
     * Set the value of project_category.
     *
     * @param string $project_category
     * @return \Entity\BoppProject
     */
    public function setProjectCategory($project_category)
    {
        $this->project_category = $project_category;

        return $this;
    }

    /**
     * Get the value of project_category.
     *
     * @return string
     */
    public function getProjectCategory()
    {
        return $this->project_category;
    }

    /**
     * Set the value of project_business_sector.
     *
     * @param string $project_business_sector
     * @return \Entity\BoppProject
     */
    public function setProjectBusinessSector($project_business_sector)
    {
        $this->project_business_sector = $project_business_sector;

        return $this;
    }

    /**
     * Get the value of project_business_sector.
     *
     * @return string
     */
    public function getProjectBusinessSector()
    {
        return $this->project_business_sector;
    }

    /**
     * Set the value of project_funding_type.
     *
     * @param string $project_funding_type
     * @return \Entity\BoppProject
     */
    public function setProjectFundingType($project_funding_type)
    {
        $this->project_funding_type = $project_funding_type;

        return $this;
    }

    /**
     * Get the value of project_funding_type.
     *
     * @return string
     */
    public function getProjectFundingType()
    {
        return $this->project_funding_type;
    }

    /**
     * Set the value of project_funding_duration.
     *
     * @param string $project_funding_duration
     * @return \Entity\BoppProject
     */
    public function setProjectFundingDuration($project_funding_duration)
    {
        $this->project_funding_duration = $project_funding_duration;

        return $this;
    }

    /**
     * Get the value of project_funding_duration.
     *
     * @return string
     */
    public function getProjectFundingDuration()
    {
        return $this->project_funding_duration;
    }

    /**
     * Set the value of project_return_on_investment.
     *
     * @param string $project_return_on_investment
     * @return \Entity\BoppProject
     */
    public function setProjectReturnOnInvestment($project_return_on_investment)
    {
        $this->project_return_on_investment = $project_return_on_investment;

        return $this;
    }

    /**
     * Get the value of project_return_on_investment.
     *
     * @return string
     */
    public function getProjectReturnOnInvestment()
    {
        return $this->project_return_on_investment;
    }

    /**
     * Set the value of project_investor_benefit.
     *
     * @param string $project_investor_benefit
     * @return \Entity\BoppProject
     */
    public function setProjectInvestorBenefit($project_investor_benefit)
    {
        $this->project_investor_benefit = $project_investor_benefit;

        return $this;
    }

    /**
     * Get the value of project_investor_benefit.
     *
     * @return string
     */
    public function getProjectInvestorBenefit()
    {
        return $this->project_investor_benefit;
    }

    /**
     * Set the value of project_summary.
     *
     * @param string $project_summary
     * @return \Entity\BoppProject
     */
    public function setProjectSummary($project_summary)
    {
        $this->project_summary = $project_summary;

        return $this;
    }

    /**
     * Get the value of project_summary.
     *
     * @return string
     */
    public function getProjectSummary()
    {
        return $this->project_summary;
    }

    /**
     * Set the value of project_economy_excerpt.
     *
     * @param string $project_economy_excerpt
     * @return \Entity\BoppProject
     */
    public function setProjectEconomyExcerpt($project_economy_excerpt)
    {
        $this->project_economy_excerpt = $project_economy_excerpt;

        return $this;
    }

    /**
     * Get the value of project_economy_excerpt.
     *
     * @return string
     */
    public function getProjectEconomyExcerpt()
    {
        return $this->project_economy_excerpt;
    }

    /**
     * Set the value of project_social_excerpt.
     *
     * @param string $project_social_excerpt
     * @return \Entity\BoppProject
     */
    public function setProjectSocialExcerpt($project_social_excerpt)
    {
        $this->project_social_excerpt = $project_social_excerpt;

        return $this;
    }

    /**
     * Get the value of project_social_excerpt.
     *
     * @return string
     */
    public function getProjectSocialExcerpt()
    {
        return $this->project_social_excerpt;
    }

    /**
     * Set the value of project_environment_excerpt.
     *
     * @param string $project_environment_excerpt
     * @return \Entity\BoppProject
     */
    public function setProjectEnvironmentExcerpt($project_environment_excerpt)
    {
        $this->project_environment_excerpt = $project_environment_excerpt;

        return $this;
    }

    /**
     * Get the value of project_environment_excerpt.
     *
     * @return string
     */
    public function getProjectEnvironmentExcerpt()
    {
        return $this->project_environment_excerpt;
    }

    /**
     * Set the value of project_mission.
     *
     * @param string $project_mission
     * @return \Entity\BoppProject
     */
    public function setProjectMission($project_mission)
    {
        $this->project_mission = $project_mission;

        return $this;
    }

    /**
     * Get the value of project_mission.
     *
     * @return string
     */
    public function getProjectMission()
    {
        return $this->project_mission;
    }

    /**
     * Set the value of project_economy.
     *
     * @param string $project_economy
     * @return \Entity\BoppProject
     */
    public function setProjectEconomy($project_economy)
    {
        $this->project_economy = $project_economy;

        return $this;
    }

    /**
     * Get the value of project_economy.
     *
     * @return string
     */
    public function getProjectEconomy()
    {
        return $this->project_economy;
    }

    /**
     * Set the value of project_social.
     *
     * @param string $project_social
     * @return \Entity\BoppProject
     */
    public function setProjectSocial($project_social)
    {
        $this->project_social = $project_social;

        return $this;
    }

    /**
     * Get the value of project_social.
     *
     * @return string
     */
    public function getProjectSocial()
    {
        return $this->project_social;
    }

    /**
     * Set the value of project_environment.
     *
     * @param string $project_environment
     * @return \Entity\BoppProject
     */
    public function setProjectEnvironment($project_environment)
    {
        $this->project_environment = $project_environment;

        return $this;
    }

    /**
     * Get the value of project_environment.
     *
     * @return string
     */
    public function getProjectEnvironment()
    {
        return $this->project_environment;
    }

    /**
     * Set the value of project_measure_performance.
     *
     * @param string $project_measure_performance
     * @return \Entity\BoppProject
     */
    public function setProjectMeasurePerformance($project_measure_performance)
    {
        $this->project_measure_performance = $project_measure_performance;

        return $this;
    }

    /**
     * Get the value of project_measure_performance.
     *
     * @return string
     */
    public function getProjectMeasurePerformance()
    {
        return $this->project_measure_performance;
    }

    /**
     * Set the value of project_good_point.
     *
     * @param string $project_good_point
     * @return \Entity\BoppProject
     */
    public function setProjectGoodPoint($project_good_point)
    {
        $this->project_good_point = $project_good_point;

        return $this;
    }

    /**
     * Get the value of project_good_point.
     *
     * @return string
     */
    public function getProjectGoodPoint()
    {
        return $this->project_good_point;
    }

    /**
     * Set the value of project_context_excerpt.
     *
     * @param string $project_context_excerpt
     * @return \Entity\BoppProject
     */
    public function setProjectContextExcerpt($project_context_excerpt)
    {
        $this->project_context_excerpt = $project_context_excerpt;

        return $this;
    }

    /**
     * Get the value of project_context_excerpt.
     *
     * @return string
     */
    public function getProjectContextExcerpt()
    {
        return $this->project_context_excerpt;
    }

    /**
     * Set the value of project_market_excerpt.
     *
     * @param string $project_market_excerpt
     * @return \Entity\BoppProject
     */
    public function setProjectMarketExcerpt($project_market_excerpt)
    {
        $this->project_market_excerpt = $project_market_excerpt;

        return $this;
    }

    /**
     * Get the value of project_market_excerpt.
     *
     * @return string
     */
    public function getProjectMarketExcerpt()
    {
        return $this->project_market_excerpt;
    }

    /**
     * Set the value of project_worth_offer.
     *
     * @param string $project_worth_offer
     * @return \Entity\BoppProject
     */
    public function setProjectWorthOffer($project_worth_offer)
    {
        $this->project_worth_offer = $project_worth_offer;

        return $this;
    }

    /**
     * Get the value of project_worth_offer.
     *
     * @return string
     */
    public function getProjectWorthOffer()
    {
        return $this->project_worth_offer;
    }

    /**
     * Set the value of project_client_collaborator.
     *
     * @param string $project_client_collaborator
     * @return \Entity\BoppProject
     */
    public function setProjectClientCollaborator($project_client_collaborator)
    {
        $this->project_client_collaborator = $project_client_collaborator;

        return $this;
    }

    /**
     * Get the value of project_client_collaborator.
     *
     * @return string
     */
    public function getProjectClientCollaborator()
    {
        return $this->project_client_collaborator;
    }

    /**
     * Set the value of project_business_core.
     *
     * @param string $project_business_core
     * @return \Entity\BoppProject
     */
    public function setProjectBusinessCore($project_business_core)
    {
        $this->project_business_core = $project_business_core;

        return $this;
    }

    /**
     * Get the value of project_business_core.
     *
     * @return string
     */
    public function getProjectBusinessCore()
    {
        return $this->project_business_core;
    }

    /**
     * Set the value of project_income.
     *
     * @param string $project_income
     * @return \Entity\BoppProject
     */
    public function setProjectIncome($project_income)
    {
        $this->project_income = $project_income;

        return $this;
    }

    /**
     * Get the value of project_income.
     *
     * @return string
     */
    public function getProjectIncome()
    {
        return $this->project_income;
    }

    /**
     * Set the value of project_cost.
     *
     * @param string $project_cost
     * @return \Entity\BoppProject
     */
    public function setProjectCost($project_cost)
    {
        $this->project_cost = $project_cost;

        return $this;
    }

    /**
     * Get the value of project_cost.
     *
     * @return string
     */
    public function getProjectCost()
    {
        return $this->project_cost;
    }

    /**
     * Set the value of project_clients_canvas.
     *
     * @param string $project_clients_canvas
     * @return \Entity\BoppProject
     */
    public function setProjectClientsCanvas($project_clients_canvas)
    {
        $this->project_clients_canvas = $project_clients_canvas;

        return $this;
    }

    /**
     * Get the value of project_clients_canvas.
     *
     * @return string
     */
    public function getProjectClientsCanvas()
    {
        return $this->project_clients_canvas;
    }

    /**
     * Set the value of project_worth_offer_canvas.
     *
     * @param string $project_worth_offer_canvas
     * @return \Entity\BoppProject
     */
    public function setProjectWorthOfferCanvas($project_worth_offer_canvas)
    {
        $this->project_worth_offer_canvas = $project_worth_offer_canvas;

        return $this;
    }

    /**
     * Get the value of project_worth_offer_canvas.
     *
     * @return string
     */
    public function getProjectWorthOfferCanvas()
    {
        return $this->project_worth_offer_canvas;
    }

    /**
     * Set the value of project_chain_distribution_canvas.
     *
     * @param string $project_chain_distribution_canvas
     * @return \Entity\BoppProject
     */
    public function setProjectChainDistributionCanvas($project_chain_distribution_canvas)
    {
        $this->project_chain_distribution_canvas = $project_chain_distribution_canvas;

        return $this;
    }

    /**
     * Get the value of project_chain_distribution_canvas.
     *
     * @return string
     */
    public function getProjectChainDistributionCanvas()
    {
        return $this->project_chain_distribution_canvas;
    }

    /**
     * Set the value of project_customers_relations_canvas.
     *
     * @param string $project_customers_relations_canvas
     * @return \Entity\BoppProject
     */
    public function setProjectCustomersRelationsCanvas($project_customers_relations_canvas)
    {
        $this->project_customers_relations_canvas = $project_customers_relations_canvas;

        return $this;
    }

    /**
     * Get the value of project_customers_relations_canvas.
     *
     * @return string
     */
    public function getProjectCustomersRelationsCanvas()
    {
        return $this->project_customers_relations_canvas;
    }

    /**
     * Set the value of project_source_of_income_canvas.
     *
     * @param string $project_source_of_income_canvas
     * @return \Entity\BoppProject
     */
    public function setProjectSourceOfIncomeCanvas($project_source_of_income_canvas)
    {
        $this->project_source_of_income_canvas = $project_source_of_income_canvas;

        return $this;
    }

    /**
     * Get the value of project_source_of_income_canvas.
     *
     * @return string
     */
    public function getProjectSourceOfIncomeCanvas()
    {
        return $this->project_source_of_income_canvas;
    }

    /**
     * Set the value of project_ressources_canvas.
     *
     * @param string $project_ressources_canvas
     * @return \Entity\BoppProject
     */
    public function setProjectRessourcesCanvas($project_ressources_canvas)
    {
        $this->project_ressources_canvas = $project_ressources_canvas;

        return $this;
    }

    /**
     * Get the value of project_ressources_canvas.
     *
     * @return string
     */
    public function getProjectRessourcesCanvas()
    {
        return $this->project_ressources_canvas;
    }

    /**
     * Set the value of project_activities_canvas.
     *
     * @param string $project_activities_canvas
     * @return \Entity\BoppProject
     */
    public function setProjectActivitiesCanvas($project_activities_canvas)
    {
        $this->project_activities_canvas = $project_activities_canvas;

        return $this;
    }

    /**
     * Get the value of project_activities_canvas.
     *
     * @return string
     */
    public function getProjectActivitiesCanvas()
    {
        return $this->project_activities_canvas;
    }

    /**
     * Set the value of project_cost_structure_canvas.
     *
     * @param string $project_cost_structure_canvas
     * @return \Entity\BoppProject
     */
    public function setProjectCostStructureCanvas($project_cost_structure_canvas)
    {
        $this->project_cost_structure_canvas = $project_cost_structure_canvas;

        return $this;
    }

    /**
     * Get the value of project_cost_structure_canvas.
     *
     * @return string
     */
    public function getProjectCostStructureCanvas()
    {
        return $this->project_cost_structure_canvas;
    }

    /**
     * Set the value of project_financial_board.
     *
     * @param string $project_financial_board
     * @return \Entity\BoppProject
     */
    public function setProjectFinancialBoard($project_financial_board)
    {
        $this->project_financial_board = $project_financial_board;

        return $this;
    }

    /**
     * Get the value of project_financial_board.
     *
     * @return string
     */
    public function getProjectFinancialBoard()
    {
        return $this->project_financial_board;
    }

    /**
     * Set the value of project_perspectives.
     *
     * @param string $project_perspectives
     * @return \Entity\BoppProject
     */
    public function setProjectPerspectives($project_perspectives)
    {
        $this->project_perspectives = $project_perspectives;

        return $this;
    }

    /**
     * Get the value of project_perspectives.
     *
     * @return string
     */
    public function getProjectPerspectives()
    {
        return $this->project_perspectives;
    }

    /**
     * Set the value of project_other_information.
     *
     * @param string $project_other_information
     * @return \Entity\BoppProject
     */
    public function setProjectOtherInformation($project_other_information)
    {
        $this->project_other_information = $project_other_information;

        return $this;
    }

    /**
     * Get the value of project_other_information.
     *
     * @return string
     */
    public function getProjectOtherInformation()
    {
        return $this->project_other_information;
    }

    /**
     * Add BoppDiscussion entity to collection (one to many).
     *
     * @param \Entity\BoppDiscussion $boppDiscussion
     * @return \Entity\BoppProject
     */
    public function addBoppDiscussion(BoppDiscussion $boppDiscussion)
    {
        $this->boppDiscussions[] = $boppDiscussion;

        return $this;
    }

    /**
     * Remove BoppDiscussion entity from collection (one to many).
     *
     * @param \Entity\BoppDiscussion $boppDiscussion
     * @return \Entity\BoppProject
     */
    public function removeBoppDiscussion(BoppDiscussion $boppDiscussion)
    {
        $this->boppDiscussions->removeElement($boppDiscussion);

        return $this;
    }

    /**
     * Get BoppDiscussion entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoppDiscussions()
    {
        return $this->boppDiscussions;
    }

    /**
     * Add BoppEvent entity to collection (one to many).
     *
     * @param \Entity\BoppEvent $boppEvent
     * @return \Entity\BoppProject
     */
    public function addBoppEvent(BoppEvent $boppEvent)
    {
        $this->boppEvents[] = $boppEvent;

        return $this;
    }

    /**
     * Remove BoppEvent entity from collection (one to many).
     *
     * @param \Entity\BoppEvent $boppEvent
     * @return \Entity\BoppProject
     */
    public function removeBoppEvent(BoppEvent $boppEvent)
    {
        $this->boppEvents->removeElement($boppEvent);

        return $this;
    }

    /**
     * Get BoppEvent entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoppEvents()
    {
        return $this->boppEvents;
    }

    /**
     * Add BoppNews entity to collection (one to many).
     *
     * @param \Entity\BoppNews $boppNews
     * @return \Entity\BoppProject
     */
    public function addBoppNews(BoppNews $boppNews)
    {
        $this->boppNews[] = $boppNews;

        return $this;
    }

    /**
     * Remove BoppNews entity from collection (one to many).
     *
     * @param \Entity\BoppNews $boppNews
     * @return \Entity\BoppProject
     */
    public function removeBoppNews(BoppNews $boppNews)
    {
        $this->boppNews->removeElement($boppNews);

        return $this;
    }

    /**
     * Get BoppNews entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoppNews()
    {
        return $this->boppNews;
    }

    /**
     * Add BoppProjectManagement entity to collection (one to many).
     *
     * @param \Entity\BoppProjectManagement $boppProjectManagement
     * @return \Entity\BoppProject
     */
    public function addBoppProjectManagement(BoppProjectManagement $boppProjectManagement)
    {
        $this->boppProjectManagements[] = $boppProjectManagement;

        return $this;
    }

    /**
     * Remove BoppProjectManagement entity from collection (one to many).
     *
     * @param \Entity\BoppProjectManagement $boppProjectManagement
     * @return \Entity\BoppProject
     */
    public function removeBoppProjectManagement(BoppProjectManagement $boppProjectManagement)
    {
        $this->boppProjectManagements->removeElement($boppProjectManagement);

        return $this;
    }

    /**
     * Get BoppProjectManagement entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoppProjectManagements()
    {
        return $this->boppProjectManagements;
    }

    /**
     * Add BoppTask entity to collection (one to many).
     *
     * @param \Entity\BoppTask $boppTask
     * @return \Entity\BoppProject
     */
    public function addBoppTask(BoppTask $boppTask)
    {
        $this->boppTasks[] = $boppTask;

        return $this;
    }

    /**
     * Remove BoppTask entity from collection (one to many).
     *
     * @param \Entity\BoppTask $boppTask
     * @return \Entity\BoppProject
     */
    public function removeBoppTask(BoppTask $boppTask)
    {
        $this->boppTasks->removeElement($boppTask);

        return $this;
    }

    /**
     * Get BoppTask entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoppTasks()
    {
        return $this->boppTasks;
    }

    public function __sleep()
    {
        return array('id', 'project_wp_id', 'project_name', 'project_slogan', 'project_description', 'project_video_url', 'project_image_url', 'project_category', 'project_business_sector', 'project_funding_type', 'project_funding_duration', 'project_return_on_investment', 'project_investor_benefit', 'project_summary', 'project_economy_excerpt', 'project_social_excerpt', 'project_environment_excerpt', 'project_mission', 'project_economy', 'project_social', 'project_environment', 'project_measure_performance', 'project_good_point', 'project_context_excerpt', 'project_market_excerpt', 'project_worth_offer', 'project_client_collaborator', 'project_business_core', 'project_income', 'project_cost', 'project_clients_canvas', 'project_worth_offer_canvas', 'project_chain_distribution_canvas', 'project_customers_relations_canvas', 'project_source_of_income_canvas', 'project_ressources_canvas', 'project_activities_canvas', 'project_cost_structure_canvas', 'project_financial_board', 'project_perspectives', 'project_other_information');
    }

    /**
     * Set project_context
     *
     * @param string $projectContext
     * @return BoppProject
     */
    public function setProjectContext($projectContext)
    {
        $this->project_context = $projectContext;

        return $this;
    }

    /**
     * Get project_context
     *
     * @return string 
     */
    public function getProjectContext()
    {
        return $this->project_context;
    }

    /**
     * Set project_market
     *
     * @param string $projectMarket
     * @return BoppProject
     */
    public function setProjectMarket($projectMarket)
    {
        $this->project_market = $projectMarket;

        return $this;
    }

    /**
     * Get project_market
     *
     * @return string 
     */
    public function getProjectMarket()
    {
        return $this->project_market;
    }

    /**
     * Set project_collaborators_canvas
     *
     * @param string $projectCollaboratorsCanvas
     * @return BoppProject
     */
    public function setProjectCollaboratorsCanvas($projectCollaboratorsCanvas)
    {
        $this->project_collaborators_canvas = $projectCollaboratorsCanvas;

        return $this;
    }

    /**
     * Get project_collaborators_canvas
     *
     * @return string 
     */
    public function getProjectCollaboratorsCanvas()
    {
        return $this->project_collaborators_canvas;
    }
}
