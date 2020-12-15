<?php

namespace TheoryTest\Bike;

class Review extends \TheoryTest\Car\Review
{
    public $where = ['alertcasestudy' => 'IS NULL'];
    
    protected $testType = 'BIKE';
    
    /**
     * Sets the tables
     */
    public function setTables()
    {
        parent::setTables();
        $this->testsTable = $this->config->table_motorcycle_positions;
        $this->questionsTable = $this->config->table_motorcycle_questions;
        $this->learningProgressTable = $this->config->table_motorcycle_progress;
        $this->progressTable = $this->config->table_motorcycle_test_progress;
    }
    
    /**
     * Gets the section table for the learning section
     * @return array This will be the tables where learning questions are available
     */
    public function getSectionTables()
    {
        return [
            ['table' => $this->config->table_theory_dvsa_sections, 'name' => 'DVSA Category', 'section' => 'dvsa', 'sectionNo' => 'dsacat'],
            'case' => true
        ];
    }
}
