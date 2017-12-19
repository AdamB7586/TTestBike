<?php

namespace TheoryTest\Bike;

class Review extends \TheoryTest\Car\Review{
    public $where = array('bikequestion' => 'Y', 'alertcasestudy' => 'IS NULL');
    
    protected $testType = 'BIKE';
}
