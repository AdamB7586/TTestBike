<?php

namespace TheoryTest\Bike;

class LearnTest extends \TheoryTest\Car\LearnTest
{   
    protected $categories = ['dvsa' => 'dsacat', 'casestudy' => 'casestudyno'];
    protected $sortBy = ['dvsa' => 'dsaqposition', 'casestudy' => 'caseqposition'];
    
    public function __construct(\DBAL\Database $db, \Configuration\Config $config, \Smarty $layout, $user, $userID = false, $templateDir = false, $theme = 'bootstrap') {
        parent::__construct($db, $config, $layout, $user, $userID, $templateDir, $theme);
        $this->setImagePath(DS.'images'.DS.'motorcycle'.DS);
    }
    
    /**
     * Sets the tables
     */
    public function setTables()
    {
        parent::setTables();
        $this->questionsTable = $this->config->table_motorcycle_questions;
        $this->learningProgressTable = $this->config->table_motorcycle_progress;
        $this->progressTable = $this->config->table_motorcycle_test_progress;
    }
}
