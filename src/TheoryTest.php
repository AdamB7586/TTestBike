<?php

namespace TheoryTest\Bike;

class TheoryTest extends \TheoryTest\Car\TheoryTest{
    
    protected $testType = 'bike';
    
    /**
     * Choose the questions for the test
     * @param int $testNo This should be the test number you which to get the questions for
     * @return boolean If the test questions are inserted into the database will return true else returns false
     */
    protected function chooseQuestions($testNo){
        $questions = $this->db->selectAll($this->questionsTable, ['mocktestbikeno' => $testNo], ['prim'], ['mocktestbikeqposition' => 'ASC']);
        $this->db->delete($this->progressTable, ['user_id' => $this->getUserID(), 'test_id' => $testNo, 'type' => $this->getTestType()]);
        unset($_SESSION['test'.$this->getTest()]);
        foreach($questions as $q => $question){
            $this->questions[($q + 1)] = $question['prim'];
        }
        return $this->db->insert($this->progressTable, ['user_id' => $this->getUserID(), 'questions' => serialize($this->questions), 'answers' => serialize([]), 'test_id' => $testNo, 'started' => date('Y-m-d H:i:s'), 'status' => 0, 'type' => $this->getTestType()]);
    }
}