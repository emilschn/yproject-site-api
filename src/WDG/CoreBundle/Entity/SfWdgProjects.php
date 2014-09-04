<?php
namespace WDG\CoreBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SfWdgProjects
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", unique=true, nullable=true)
     */
    private $wpProjectId;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $projectCreationDate;    

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $projectName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $projectSlogan;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectDescription;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectVideo;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectImageVideo;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectImageCover;


    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectCategory;


    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectBusinessSector;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectFundingType;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectFundingDuration;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectReturnOnInvestment;    

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectInvestorBenefit;  

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectSummary;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectEconomyExcerpt;   

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectSocialExcerpt;   

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectEnvironmentExcerpt;   

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectMission;  

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectEconomy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectSocial;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectEnvironment;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectMeasurePerformance;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectGoodPoint;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectContextExcerpt;   

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectMarketExcerpt; 

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectContext;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectMarket;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectWorthOffer;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectClientCollaborator;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectBusinessCore;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectIncome;    

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectCost;    

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectCollaboratorsCanvas;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectActivitiesCanvas;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectRessourcesCanvas;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectWorthOfferCanvas;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectCustomersRelationsCanvas;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectChainDistributionsCanvas;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectClientsCanvas;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectCostStructureCanvas;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectSourceOfIncomeCanvas;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectFinancialBoard;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectPerspectives;


     /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectOtherInformation;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgTasks", inversedBy="projects")
     * @ORM\JoinColumn(name="sfWdgTasksId", referencedColumnName="id", unique=true)
     */
    private $tasks;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgOrganisations", inversedBy="projects")
     * @ORM\JoinColumn(name="sfWdgOrganisationsId", referencedColumnName="id", unique=true)
     */
    private $organisations;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgEvents", mappedBy="projects")
     */
    private $events;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgNews", mappedBy="projects")
     */
    private $news;

    /**
     * @ORM\OneToOne(targetEntity="SfWdgDiscussions", mappedBy="projects")
     */
    private $discussions;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgProjectsUsers", mappedBy="projects")
     */
    private $projectsUsers;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgProjectsTags", mappedBy="projects")
     */
    private $projectsTags;

    /**
     * @ORM\OneToMany(targetEntity="SfWdgProjectsComments", mappedBy="projects")
     */
    private $projectsComments;
    
        /**
     * Constructor
     */
    public function __construct()
    {
        $this->projectsUsers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->projectsTags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->projectsComments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getIdNoPrivate()
    {
         return htmlentities($this->id);  
    }

    /**
     * Set wpProjectId
     *
     * @param integer $wpProjectId
     * @return SfWdgProjects
     */
    public function setWpProjectId($wpProjectId)
    {
        $this->wpProjectId = $wpProjectId;

        return $this;
    }

    /**
     * Get wpProjectId
     *
     * @return integer 
     */
    public function getWpProjectId()
    {
        return $this->wpProjectId;
    }

    /**
     * Set projectCreationDate
     *
     * @param \DateTime $projectCreationDate
     * @return SfWdgProjects
     */
    public function setProjectCreationDate($projectCreationDate)
    {
        $this->projectCreationDate =  new \DateTime();

        return $this;
    }

    /**
     * Get projectCreationDate
     *
     * @return \DateTime 
     */
    public function getProjectCreationDate()
    {
        return $this->projectCreationDate;
    }

    /**
     * Set projectName
     *
     * @param string $projectName
     * @return SfWdgProjects
     */
    public function setProjectName($projectName)
    {
        $this->projectName = $projectName;

        return $this;
    }

    /**
     * Get projectName
     *
     * @return string 
     */
    public function getProjectName()
    {
        return $this->projectName;
    }

    /**
     * Set projectSlogan
     *
     * @param string $projectSlogan
     * @return SfWdgProjects
     */
    public function setProjectSlogan($projectSlogan)
    {
        $this->projectSlogan = $projectSlogan;

        return $this;
    }

    /**
     * Get projectSlogan
     *
     * @return string 
     */
    public function getProjectSlogan()
    {
        return $this->projectSlogan;
    }

    /**
     * Set projectDescription
     *
     * @param string $projectDescription
     * @return SfWdgProjects
     */
    public function setProjectDescription($projectDescription)
    {
        $this->projectDescription = $projectDescription;

        return $this;
    }

    /**
     * Get projectDescription
     *
     * @return string 
     */
    public function getProjectDescription()
    {
        return $this->projectDescription;
    }

    /**
     * Set projectVideo
     *
     * @param string $projectVideo
     * @return SfWdgProjects
     */
    public function setProjectVideo($projectVideo)
    {
        $this->projectVideo = $projectVideo;

        return $this;
    }

    /**
     * Get projectVideo
     *
     * @return string 
     */
    public function getProjectVideo()
    {
        return $this->projectVideo;
    }

    /**
     * Set projectImageVideo
     *
     * @param string $projectImageVideo
     * @return SfWdgProjects
     */
    public function setProjectImageVideo($projectImageVideo)
    {
        $this->projectImageVideo = $projectImageVideo;

        return $this;
    }

    /**
     * Get projectImageVideo
     *
     * @return string 
     */
    public function getProjectImageVideo()
    {
        return $this->projectImageVideo;
    }

    /**
     * Set projectImageCover
     *
     * @param string $projectImageCover
     * @return SfWdgProjects
     */
    public function setProjectImageCover($projectImageCover)
    {
        $this->projectImageCover = $projectImageCover;

        return $this;
    }

    /**
     * Get projectImageCover
     *
     * @return string 
     */
    public function getProjectImageCover()
    {
        return $this->projectImageCover;
    }

    /**
     * Set projectCategory
     *
     * @param string $projectCategory
     * @return SfWdgProjects
     */
    public function setProjectCategory($projectCategory)
    {
        $this->projectCategory = $projectCategory;

        return $this;
    }

    /**
     * Get projectCategory
     *
     * @return string 
     */
    public function getProjectCategory()
    {
        return $this->projectCategory;
    }

    /**
     * Set projectBusinessSector
     *
     * @param string $projectBusinessSector
     * @return SfWdgProjects
     */
    public function setProjectBusinessSector($projectBusinessSector)
    {
        $this->projectBusinessSector = $projectBusinessSector;

        return $this;
    }

    /**
     * Get projectBusinessSector
     *
     * @return string 
     */
    public function getProjectBusinessSector()
    {
        return $this->projectBusinessSector;
    }

    /**
     * Set projectFundingType
     *
     * @param string $projectFundingType
     * @return SfWdgProjects
     */
    public function setProjectFundingType($projectFundingType)
    {
        $this->projectFundingType = $projectFundingType;

        return $this;
    }

    /**
     * Get projectFundingType
     *
     * @return string 
     */
    public function getProjectFundingType()
    {
        return $this->projectFundingType;
    }

    /**
     * Set projectFundingDuration
     *
     * @param string $projectFundingDuration
     * @return SfWdgProjects
     */
    public function setProjectFundingDuration($projectFundingDuration)
    {
        $this->projectFundingDuration = $projectFundingDuration;

        return $this;
    }

    /**
     * Get projectFundingDuration
     *
     * @return string 
     */
    public function getProjectFundingDuration()
    {
        return $this->projectFundingDuration;
    }

    /**
     * Set projectReturnOnInvestment
     *
     * @param string $projectReturnOnInvestment
     * @return SfWdgProjects
     */
    public function setProjectReturnOnInvestment($projectReturnOnInvestment)
    {
        $this->projectReturnOnInvestment = $projectReturnOnInvestment;

        return $this;
    }

    /**
     * Get projectReturnOnInvestment
     *
     * @return string 
     */
    public function getProjectReturnOnInvestment()
    {
        return $this->projectReturnOnInvestment;
    }

    /**
     * Set projectInvestorBenefit
     *
     * @param string $projectInvestorBenefit
     * @return SfWdgProjects
     */
    public function setProjectInvestorBenefit($projectInvestorBenefit)
    {
        $this->projectInvestorBenefit = $projectInvestorBenefit;

        return $this;
    }

    /**
     * Get projectInvestorBenefit
     *
     * @return string 
     */
    public function getProjectInvestorBenefit()
    {
        return $this->projectInvestorBenefit;
    }

    /**
     * Set projectSummary
     *
     * @param string $projectSummary
     * @return SfWdgProjects
     */
    public function setProjectSummary($projectSummary)
    {
        $this->projectSummary = $projectSummary;

        return $this;
    }

    /**
     * Get projectSummary
     *
     * @return string 
     */
    public function getProjectSummary()
    {
        return $this->projectSummary;
    }

    /**
     * Set projectEconomyExcerpt
     *
     * @param string $projectEconomyExcerpt
     * @return SfWdgProjects
     */
    public function setProjectEconomyExcerpt($projectEconomyExcerpt)
    {
        $this->projectEconomyExcerpt = $projectEconomyExcerpt;

        return $this;
    }

    /**
     * Get projectEconomyExcerpt
     *
     * @return string 
     */
    public function getProjectEconomyExcerpt()
    {
        return $this->projectEconomyExcerpt;
    }

    /**
     * Set projectSocialExcerpt
     *
     * @param string $projectSocialExcerpt
     * @return SfWdgProjects
     */
    public function setProjectSocialExcerpt($projectSocialExcerpt)
    {
        $this->projectSocialExcerpt = $projectSocialExcerpt;

        return $this;
    }

    /**
     * Get projectSocialExcerpt
     *
     * @return string 
     */
    public function getProjectSocialExcerpt()
    {
        return $this->projectSocialExcerpt;
    }

    /**
     * Set projectEnvironmentExcerpt
     *
     * @param string $projectEnvironmentExcerpt
     * @return SfWdgProjects
     */
    public function setProjectEnvironmentExcerpt($projectEnvironmentExcerpt)
    {
        $this->projectEnvironmentExcerpt = $projectEnvironmentExcerpt;

        return $this;
    }

    /**
     * Get projectEnvironmentExcerpt
     *
     * @return string 
     */
    public function getProjectEnvironmentExcerpt()
    {
        return $this->projectEnvironmentExcerpt;
    }

    /**
     * Set projectMission
     *
     * @param string $projectMission
     * @return SfWdgProjects
     */
    public function setProjectMission($projectMission)
    {
        $this->projectMission = $projectMission;

        return $this;
    }

    /**
     * Get projectMission
     *
     * @return string 
     */
    public function getProjectMission()
    {
        return $this->projectMission;
    }

    /**
     * Set projectEconomy
     *
     * @param string $projectEconomy
     * @return SfWdgProjects
     */
    public function setProjectEconomy($projectEconomy)
    {
        $this->projectEconomy = $projectEconomy;

        return $this;
    }

    /**
     * Get projectEconomy
     *
     * @return string 
     */
    public function getProjectEconomy()
    {
        return $this->projectEconomy;
    }

    /**
     * Set projectSocial
     *
     * @param string $projectSocial
     * @return SfWdgProjects
     */
    public function setProjectSocial($projectSocial)
    {
        $this->projectSocial = $projectSocial;

        return $this;
    }

    /**
     * Get projectSocial
     *
     * @return string 
     */
    public function getProjectSocial()
    {
        return $this->projectSocial;
    }

    /**
     * Set projectEnvironment
     *
     * @param string $projectEnvironment
     * @return SfWdgProjects
     */
    public function setProjectEnvironment($projectEnvironment)
    {
        $this->projectEnvironment = $projectEnvironment;

        return $this;
    }

    /**
     * Get projectEnvironment
     *
     * @return string 
     */
    public function getProjectEnvironment()
    {
        return $this->projectEnvironment;
    }

    /**
     * Set projectMeasurePerformance
     *
     * @param string $projectMeasurePerformance
     * @return SfWdgProjects
     */
    public function setProjectMeasurePerformance($projectMeasurePerformance)
    {
        $this->projectMeasurePerformance = $projectMeasurePerformance;

        return $this;
    }

    /**
     * Get projectMeasurePerformance
     *
     * @return string 
     */
    public function getProjectMeasurePerformance()
    {
        return $this->projectMeasurePerformance;
    }

    /**
     * Set projectGoodPoint
     *
     * @param string $projectGoodPoint
     * @return SfWdgProjects
     */
    public function setProjectGoodPoint($projectGoodPoint)
    {
        $this->projectGoodPoint = $projectGoodPoint;

        return $this;
    }

    /**
     * Get projectGoodPoint
     *
     * @return string 
     */
    public function getProjectGoodPoint()
    {
        return $this->projectGoodPoint;
    }

    /**
     * Set projectContextExcerpt
     *
     * @param string $projectContextExcerpt
     * @return SfWdgProjects
     */
    public function setProjectContextExcerpt($projectContextExcerpt)
    {
        $this->projectContextExcerpt = $projectContextExcerpt;

        return $this;
    }

    /**
     * Get projectContextExcerpt
     *
     * @return string 
     */
    public function getProjectContextExcerpt()
    {
        return $this->projectContextExcerpt;
    }

    /**
     * Set projectMarketExcerpt
     *
     * @param string $projectMarketExcerpt
     * @return SfWdgProjects
     */
    public function setProjectMarketExcerpt($projectMarketExcerpt)
    {
        $this->projectMarketExcerpt = $projectMarketExcerpt;

        return $this;
    }

    /**
     * Get projectMarketExcerpt
     *
     * @return string 
     */
    public function getProjectMarketExcerpt()
    {
        return $this->projectMarketExcerpt;
    }

    /**
     * Set projectContext
     *
     * @param string $projectContext
     * @return SfWdgProjects
     */
    public function setProjectContext($projectContext)
    {
        $this->projectContext = $projectContext;

        return $this;
    }

    /**
     * Get projectContext
     *
     * @return string 
     */
    public function getProjectContext()
    {
        return $this->projectContext;
    }

    /**
     * Set projectMarket
     *
     * @param string $projectMarket
     * @return SfWdgProjects
     */
    public function setProjectMarket($projectMarket)
    {
        $this->projectMarket = $projectMarket;

        return $this;
    }

    /**
     * Get projectMarket
     *
     * @return string 
     */
    public function getProjectMarket()
    {
        return $this->projectMarket;
    }

    /**
     * Set projectWorthOffer
     *
     * @param string $projectWorthOffer
     * @return SfWdgProjects
     */
    public function setProjectWorthOffer($projectWorthOffer)
    {
        $this->projectWorthOffer = $projectWorthOffer;

        return $this;
    }

    /**
     * Get projectWorthOffer
     *
     * @return string 
     */
    public function getProjectWorthOffer()
    {
        return $this->projectWorthOffer;
    }

    /**
     * Set projectClientCollaborator
     *
     * @param string $projectClientCollaborator
     * @return SfWdgProjects
     */
    public function setProjectClientCollaborator($projectClientCollaborator)
    {
        $this->projectClientCollaborator = $projectClientCollaborator;

        return $this;
    }

    /**
     * Get projectClientCollaborator
     *
     * @return string 
     */
    public function getProjectClientCollaborator()
    {
        return $this->projectClientCollaborator;
    }

    /**
     * Set projectBusinessCore
     *
     * @param string $projectBusinessCore
     * @return SfWdgProjects
     */
    public function setProjectBusinessCore($projectBusinessCore)
    {
        $this->projectBusinessCore = $projectBusinessCore;

        return $this;
    }

    /**
     * Get projectBusinessCore
     *
     * @return string 
     */
    public function getProjectBusinessCore()
    {
        return $this->projectBusinessCore;
    }

    /**
     * Set projectIncome
     *
     * @param string $projectIncome
     * @return SfWdgProjects
     */
    public function setProjectIncome($projectIncome)
    {
        $this->projectIncome = $projectIncome;

        return $this;
    }

    /**
     * Get projectIncome
     *
     * @return string 
     */
    public function getProjectIncome()
    {
        return $this->projectIncome;
    }

    /**
     * Set projectCost
     *
     * @param string $projectCost
     * @return SfWdgProjects
     */
    public function setProjectCost($projectCost)
    {
        $this->projectCost = $projectCost;

        return $this;
    }

    /**
     * Get projectCost
     *
     * @return string 
     */
    public function getProjectCost()
    {
        return $this->projectCost;
    }

    /**
     * Set projectCollaboratorsCanvas
     *
     * @param string $projectCollaboratorsCanvas
     * @return SfWdgProjects
     */
    public function setProjectCollaboratorsCanvas($projectCollaboratorsCanvas)
    {
        $this->projectCollaboratorsCanvas = $projectCollaboratorsCanvas;

        return $this;
    }

    /**
     * Get projectCollaboratorsCanvas
     *
     * @return string 
     */
    public function getProjectCollaboratorsCanvas()
    {
        return $this->projectCollaboratorsCanvas;
    }

    /**
     * Set projectActivitiesCanvas
     *
     * @param string $projectActivitiesCanvas
     * @return SfWdgProjects
     */
    public function setProjectActivitiesCanvas($projectActivitiesCanvas)
    {
        $this->projectActivitiesCanvas = $projectActivitiesCanvas;

        return $this;
    }

    /**
     * Get projectActivitiesCanvas
     *
     * @return string 
     */
    public function getProjectActivitiesCanvas()
    {
        return $this->projectActivitiesCanvas;
    }

    /**
     * Set projectRessourcesCanvas
     *
     * @param string $projectRessourcesCanvas
     * @return SfWdgProjects
     */
    public function setProjectRessourcesCanvas($projectRessourcesCanvas)
    {
        $this->projectRessourcesCanvas = $projectRessourcesCanvas;

        return $this;
    }

    /**
     * Get projectRessourcesCanvas
     *
     * @return string 
     */
    public function getProjectRessourcesCanvas()
    {
        return $this->projectRessourcesCanvas;
    }

    /**
     * Set projectWorthOfferCanvas
     *
     * @param string $projectWorthOfferCanvas
     * @return SfWdgProjects
     */
    public function setProjectWorthOfferCanvas($projectWorthOfferCanvas)
    {
        $this->projectWorthOfferCanvas = $projectWorthOfferCanvas;

        return $this;
    }

    /**
     * Get projectWorthOfferCanvas
     *
     * @return string 
     */
    public function getProjectWorthOfferCanvas()
    {
        return $this->projectWorthOfferCanvas;
    }

    /**
     * Set projectCustomersRelationsCanvas
     *
     * @param string $projectCustomersRelationsCanvas
     * @return SfWdgProjects
     */
    public function setProjectCustomersRelationsCanvas($projectCustomersRelationsCanvas)
    {
        $this->projectCustomersRelationsCanvas = $projectCustomersRelationsCanvas;

        return $this;
    }

    /**
     * Get projectCustomersRelationsCanvas
     *
     * @return string 
     */
    public function getProjectCustomersRelationsCanvas()
    {
        return $this->projectCustomersRelationsCanvas;
    }

    /**
     * Set projectChainDistributionsCanvas
     *
     * @param string $projectChainDistributionsCanvas
     * @return SfWdgProjects
     */
    public function setProjectChainDistributionsCanvas($projectChainDistributionsCanvas)
    {
        $this->projectChainDistributionsCanvas = $projectChainDistributionsCanvas;

        return $this;
    }

    /**
     * Get projectChainDistributionsCanvas
     *
     * @return string 
     */
    public function getProjectChainDistributionsCanvas()
    {
        return $this->projectChainDistributionsCanvas;
    }

    /**
     * Set projectClientsCanvas
     *
     * @param string $projectClientsCanvas
     * @return SfWdgProjects
     */
    public function setProjectClientsCanvas($projectClientsCanvas)
    {
        $this->projectClientsCanvas = $projectClientsCanvas;

        return $this;
    }

    /**
     * Get projectClientsCanvas
     *
     * @return string 
     */
    public function getProjectClientsCanvas()
    {
        return $this->projectClientsCanvas;
    }

    /**
     * Set projectCostStructureCanvas
     *
     * @param string $projectCostStructureCanvas
     * @return SfWdgProjects
     */
    public function setProjectCostStructureCanvas($projectCostStructureCanvas)
    {
        $this->projectCostStructureCanvas = $projectCostStructureCanvas;

        return $this;
    }

    /**
     * Get projectCostStructureCanvas
     *
     * @return string 
     */
    public function getProjectCostStructureCanvas()
    {
        return $this->projectCostStructureCanvas;
    }

    /**
     * Set projectSourceOfIncomeCanvas
     *
     * @param string $projectSourceOfIncomeCanvas
     * @return SfWdgProjects
     */
    public function setProjectSourceOfIncomeCanvas($projectSourceOfIncomeCanvas)
    {
        $this->projectSourceOfIncomeCanvas = $projectSourceOfIncomeCanvas;

        return $this;
    }

    /**
     * Get projectSourceOfIncomeCanvas
     *
     * @return string 
     */
    public function getProjectSourceOfIncomeCanvas()
    {
        return $this->projectSourceOfIncomeCanvas;
    }

    /**
     * Set projectFinancialBoard
     *
     * @param string $projectFinancialBoard
     * @return SfWdgProjects
     */
    public function setProjectFinancialBoard($projectFinancialBoard)
    {
        $this->projectFinancialBoard = $projectFinancialBoard;

        return $this;
    }

    /**
     * Get projectFinancialBoard
     *
     * @return string 
     */
    public function getProjectFinancialBoard()
    {
        return $this->projectFinancialBoard;
    }

    /**
     * Set projectPerspectives
     *
     * @param string $projectPerspectives
     * @return SfWdgProjects
     */
    public function setProjectPerspectives($projectPerspectives)
    {
        $this->projectPerspectives = $projectPerspectives;

        return $this;
    }

    /**
     * Get projectPerspectives
     *
     * @return string 
     */
    public function getProjectPerspectives()
    {
        return $this->projectPerspectives;
    }

    /**
     * Set projectOtherInformation
     *
     * @param string $projectOtherInformation
     * @return SfWdgProjects
     */
    public function setProjectOtherInformation($projectOtherInformation)
    {
        $this->projectOtherInformation = $projectOtherInformation;

        return $this;
    }

    /**
     * Get projectOtherInformation
     *
     * @return string 
     */
    public function getProjectOtherInformation()
    {
        return $this->projectOtherInformation;
    }

    /**
     * Set tasks
     *
     * @param \WDG\CoreBundle\Entity\SfWdgTasks $tasks
     * @return SfWdgProjects
     */
    public function setTasks(\WDG\CoreBundle\Entity\SfWdgTasks $tasks = null)
    {
        $this->tasks = $tasks;

        return $this;
    }

    /**
     * Get tasks
     *
     * @return \WDG\CoreBundle\Entity\SfWdgTasks 
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * Set organisations
     *
     * @param \WDG\CoreBundle\Entity\SfWdgOrganisations $organisations
     * @return SfWdgProjects
     */
    public function setOrganisations(\WDG\CoreBundle\Entity\SfWdgOrganisations $organisations = null)
    {
        $this->organisations = $organisations;

        return $this;
    }

    /**
     * Get organisations
     *
     * @return \WDG\CoreBundle\Entity\SfWdgOrganisations 
     */
    public function getOrganisations()
    {
        return $this->organisations;
    }

    /**
     * Set events
     *
     * @param \WDG\CoreBundle\Entity\SfWdgEvents $events
     * @return SfWdgProjects
     */
    public function setEvents(\WDG\CoreBundle\Entity\SfWdgEvents $events = null)
    {
        $this->events = $events;

        return $this;
    }

    /**
     * Get events
     *
     * @return \WDG\CoreBundle\Entity\SfWdgEvents 
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Set news
     *
     * @param \WDG\CoreBundle\Entity\SfWdgNews $news
     * @return SfWdgProjects
     */
    public function setNews(\WDG\CoreBundle\Entity\SfWdgNews $news = null)
    {
        $this->news = $news;

        return $this;
    }

    /**
     * Get news
     *
     * @return \WDG\CoreBundle\Entity\SfWdgNews 
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * Set discussions
     *
     * @param \WDG\CoreBundle\Entity\SfWdgDiscussions $discussions
     * @return SfWdgProjects
     */
    public function setDiscussions(\WDG\CoreBundle\Entity\SfWdgDiscussions $discussions = null)
    {
        $this->discussions = $discussions;

        return $this;
    }

    /**
     * Get discussions
     *
     * @return \WDG\CoreBundle\Entity\SfWdgDiscussions 
     */
    public function getDiscussions()
    {
        return $this->discussions;
    }

    /**
     * Add projectsUsers
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjectsUsers $projectsUsers
     * @return SfWdgProjects
     */
    public function addProjectsUser(\WDG\CoreBundle\Entity\SfWdgProjectsUsers $projectsUsers)
    {
        $this->projectsUsers[] = $projectsUsers;

        return $this;
    }

    /**
     * Remove projectsUsers
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjectsUsers $projectsUsers
     */
    public function removeProjectsUser(\WDG\CoreBundle\Entity\SfWdgProjectsUsers $projectsUsers)
    {
        $this->projectsUsers->removeElement($projectsUsers);
    }

    /**
     * Get projectsUsers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjectsUsers()
    {
        return $this->projectsUsers;
    }

    /**
     * Add projectsTags
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjectsTags $projectsTags
     * @return SfWdgProjects
     */
    public function addProjectsTag(\WDG\CoreBundle\Entity\SfWdgProjectsTags $projectsTags)
    {
        $this->projectsTags[] = $projectsTags;

        return $this;
    }

    /**
     * Remove projectsTags
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjectsTags $projectsTags
     */
    public function removeProjectsTag(\WDG\CoreBundle\Entity\SfWdgProjectsTags $projectsTags)
    {
        $this->projectsTags->removeElement($projectsTags);
    }

    /**
     * Get projectsTags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjectsTags()
    {
        return $this->projectsTags;
    }

    /**
     * Add projectsComments
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjectsComments $projectsComments
     * @return SfWdgProjects
     */
    public function addProjectsComment(\WDG\CoreBundle\Entity\SfWdgProjectsComments $projectsComments)
    {
        $this->projectsComments[] = $projectsComments;

        return $this;
    }

    /**
     * Remove projectsComments
     *
     * @param \WDG\CoreBundle\Entity\SfWdgProjectsComments $projectsComments
     */
    public function removeProjectsComment(\WDG\CoreBundle\Entity\SfWdgProjectsComments $projectsComments)
    {
        $this->projectsComments->removeElement($projectsComments);
    }

    /**
     * Get projectsComments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjectsComments()
    {
        return $this->projectsComments;
    }

        public function __toString()
    {
        return $this->projectName;
    }
       
}
