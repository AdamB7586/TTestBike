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
        $this->testsTable = $this->config->table_motorcycle_positions;
        $this->questionsTable = $this->config->table_motorcycle_questions;
        $this->learningProgressTable = $this->config->table_motorcycle_progress;
        $this->progressTable = $this->config->table_motorcycle_test_progress;
    }
}
