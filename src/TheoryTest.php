<?php

namespace TheoryTest\Bike;

class TheoryTest extends \TheoryTest\Car\TheoryTest
{
    
    protected $testType = 'bike';
    
    protected $scriptVar = 'bike';
    
    /**
     * Sets the tables
     */
    protected function setTables()
    {
        parent::setTables();
        $this->testsTable = $this->config->table_bike_theory_tests;
    }
}
