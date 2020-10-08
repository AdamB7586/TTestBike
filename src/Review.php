<?php

namespace TheoryTest\Bike;

class Review extends \TheoryTest\Car\Review
{
    public $where = ['bikequestion' => 'Y', 'alertcasestudy' => 'IS NULL'];
    
    protected $testType = 'BIKE';
}
