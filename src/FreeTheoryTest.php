<?php

namespace TheoryTest\Bike;

class FreeTheoryTest extends \TheoryTest\Car\FreeTheoryTest{
    protected $testType = 'bike';

    /**
     * Create a new Theory Test for the test number given
     * @param int $theorytest Should be the test number
     */
    public function createNewTest($theorytest = 1){
        $this->clearCookies($theorytest);
        $this->setTest($theorytest);
        $this->setTestName();
        $this->chooseQuestions($theorytest);
        return $this->buildTest();
    }
    
    /**
     * Chooses the test questions an inserts them into the session
     * @param int $testNo The current test number
     * @return boolean Returns true
     */
    protected function chooseQuestions($testNo){
        if(!session_id()){
            session_name(SESSION_NAME);
            session_start();
        }
        $questions = $this->db->selectAll($this->questionsTable, array('mocktestbikeno' => $testNo), array('prim'), array('mocktestbikeqposition' => 'ASC'));
        $q = 1;
        foreach($questions as $question){
            $this->questions[$q] = $question['prim'];
            $this->useranswers[$q]['answer'] = '';
            $this->useranswers[$q]['flagged'] = 0;
            $this->useranswers[$q]['status'] = 0;
            $q++;
        }
        $_SESSION['test'.$testNo.'q'] = serialize($this->questions);
        $_SESSION['test'.$testNo.'a'] = serialize($this->useranswers);
        return true;
    }
    
    /**
     * Sets the Test Name
     * @param string $name Sets the current test name
     */
    protected function setTestName($name = ''){
        if(!empty($name)){
            $this->testName = $name;
        }
        else{
            $this->testName = 'Free Motorcycle Theory Test '.$this->getTest();
        }
    }
}
