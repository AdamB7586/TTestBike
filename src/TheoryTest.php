<?php

namespace TheoryTest\Bike;

class TheoryTest extends \TheoryTest\Car\TheoryTest
{
    protected $scriptVar = 'bike';
    
    /**
     * Sets the tables
     */
    protected function setTables()
    {
        parent::setTables();
        $this->testsTable = $this->config->table_motorcycle_positions;
        $this->questionsTable = $this->config->table_motorcycle_questions;
        $this->learningProgressTable = $this->config->table_motorcycle_progress;
        $this->progressTable = $this->config->table_motorcycle_test_progress;
    }
}
