<?php

use \Illuminate\Support\Facades\DB;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Laravel');
    }

    public function testDB()
    {
        $db = DB::connection()->getDatabaseName();
        $this->assertEquals('watergo', $db);
    }

    public function testRedis()
    {
        $redis = Redis::connection();
        $redis->set('name', 'Taylor');
        $values = $redis->get('name');
        $this->assertEquals('Taylor', $values);
    }

}
