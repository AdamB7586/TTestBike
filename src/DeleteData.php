<?php
namespace TheoryTest\Bike;

class DeleteData extends \TheoryTest\Car\DeleteData
{
    
    public function setTables()
    {
        parent::setTables();
        $this->learningProgressTable = $this->config->table_motorcycle_progress;
        $this->progressTable = $this->config->table_motorcycle_test_progress;
    }
}
