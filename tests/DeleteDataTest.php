<?php

namespace TheoryTest\Bike\Tests;

use TheoryTest\Bike\DeleteData;

class DeleteDataTest extends SetUp
{
    
    protected $delete;
    
    protected function setUp(): void
    {
        self::$user->login($GLOBALS['LOGIN_EMAIL'], $GLOBALS['LOGIN_PASSWORD']);
        $this->delete = new DeleteData(self::$db, self::$config, self::$user);
    }
    
    /**
     * @covers TheoryTest\Car\DeleteData::deleteData
     */
    public function testDeleteData()
    {
        $this->markTestIncomplete();
    }
}
