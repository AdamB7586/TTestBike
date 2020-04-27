<?php

namespace TheoryTest\Bike;

class RandomTest extends TheoryTest{
    
    /**
     * chooses the random questions for the test and inserts them into the database
     * @return boolean If the questions are inserted into the database will return true else returns false
     */
    protected function chooseQuestions($testNo = 15) {        
        $this->db->delete($this->progressTable, ['user_id' => $this->getUserID(), 'test_id' => $this->testNo, 'type' => $this->getTestType()]);
        $questions = $this->db->query("SELECT * FROM ((SELECT `prim` FROM `{$this->questionsTable}` WHERE `dsacat` = '1' AND `bikequestion` = 'Y' AND `alertcasestudy` IS NULL LIMIT 2)
UNION (SELECT `prim` FROM `{$this->questionsTable}` WHERE `dsacat` = '2' AND `bikequestion` = 'Y' AND `alertcasestudy` IS NULL LIMIT 3)
UNION (SELECT `prim` FROM `{$this->questionsTable}` WHERE `dsacat` = '3' AND `bikequestion` = 'Y' AND `alertcasestudy` IS NULL LIMIT 4)
UNION (SELECT `prim` FROM `{$this->questionsTable}` WHERE `dsacat` = '4' AND `bikequestion` = 'Y' AND `alertcasestudy` IS NULL LIMIT 3)
UNION (SELECT `prim` FROM `{$this->questionsTable}` WHERE `dsacat` = '5' AND `bikequestion` = 'Y' AND `alertcasestudy` IS NULL LIMIT 5)
UNION (SELECT `prim` FROM `{$this->questionsTable}` WHERE `dsacat` = '6' AND `bikequestion` = 'Y' AND `alertcasestudy` IS NULL LIMIT 4)
UNION (SELECT `prim` FROM `{$this->questionsTable}` WHERE `dsacat` = '7' AND `bikequestion` = 'Y' AND `alertcasestudy` IS NULL LIMIT 2)
UNION (SELECT `prim` FROM `{$this->questionsTable}` WHERE `dsacat` = '8' AND `bikequestion` = 'Y' AND `alertcasestudy` IS NULL LIMIT 4)
UNION (SELECT `prim` FROM `{$this->questionsTable}` WHERE `dsacat` = '9' AND `bikequestion` = 'Y' AND `alertcasestudy` IS NULL LIMIT 3)
UNION (SELECT `prim` FROM `{$this->questionsTable}` WHERE `dsacat` = '10' AND `bikequestion` = 'Y' AND `alertcasestudy` IS NULL LIMIT 4)
UNION (SELECT `prim` FROM `{$this->questionsTable}` WHERE `dsacat` = '11' AND `bikequestion` = 'Y' AND `alertcasestudy` IS NULL LIMIT 6)
UNION (SELECT `prim` FROM `{$this->questionsTable}` WHERE `dsacat` = '12' AND `bikequestion` = 'Y' AND `alertcasestudy` IS NULL LIMIT 1)
UNION (SELECT `prim` FROM `{$this->questionsTable}` WHERE `dsacat` = '13' AND `bikequestion` = 'Y' AND `alertcasestudy` IS NULL LIMIT 3)
UNION (SELECT `prim` FROM `{$this->questionsTable}` WHERE `dsacat` = '14' AND `bikequestion` = 'Y' AND `alertcasestudy` IS NULL LIMIT 1) ORDER BY RAND()) as a
UNION (SELECT `prim` FROM `{$this->questionsTable}` WHERE `casestudyno` = '".rand(29, 42)."');");
         
        unset($_SESSION['test'.$this->getTest()]);
        foreach($questions as $q => $question){
            $this->questions[($q + 1)] = $question['prim'];
        }
        return $this->db->insert($this->progressTable, ['user_id' => $this->getUserID(), 'questions' => serialize($this->questions), 'answers' => serialize([]), 'test_id' => $this->testNo, 'started' => date('Y-m-d H:i:s'), 'status' => 0, 'type' => $this->getTestType()]);
    }
}