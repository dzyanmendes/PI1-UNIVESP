<?php

namespace App\Database;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;

class MyTests extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected function setUp(): void
    {
        parent::setUp();

        // teste de conexao online
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // teste de desconexao
    }
}