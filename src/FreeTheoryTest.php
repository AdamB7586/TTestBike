<?php

namespace TheoryTest\Bike;

class FreeTheoryTest extends \TheoryTest\Car\FreeTheoryTest
{
    protected $testType = 'bike';
    protected $scriptVar = 'bikefree';

    /**
     * Create a new Theory Test for the test number given
     * @param int $theorytest Should be the test number
     */
    public function createNewTest($theorytest = 1)
    {
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
    protected function chooseQuestions($testNo)
    {
        if (!session_id()) {
            session_name(SESSION_NAME);
            session_start();
        }
        $_SESSION['test'.$testNo.'q'] = serialize($this->questions);
        $questions = $this->db->selectAll($this->testsTable, ['test' => $testNo], ['prim'], ['position' => 'ASC']);
        foreach ($questions as $i => $question) {
            $this->questions[($i + 1)] = $question['prim'];
        }
        $_SESSION['test'.$testNo.'q'] = serialize($this->questions);
        $_SESSION['test'.$testNo.'a'] = serialize($this->useranswers);
        return true;
    }
    
    /**
     * Sets the Test Name
     * @param string $name Sets the current test name
     */
    protected function setTestName($name = '')
    {
        if (!empty($name)) {
            $this->testName = $name;
        } else {
            $this->testName = 'Free Motorcycle Theory Test '.$this->getTest();
        }
    }
}
