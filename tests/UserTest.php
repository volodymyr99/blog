<?php

use PHPUnit\Framework\TestCase;
//use classes\User;
//set_include_path("c:\openserver\domains\blog\classes");
//include_once "QueryBuilder.php";
require_once "c:\openserver\domains\blog\classes\QueryBuilder.php";
require_once "c:\openserver\domains\blog\classes\User.php";



class UserTest extends TestCase
{
    protected $user;

    protected function setUp(): void
    {
        $this->user = new User(); // Create an instance of the User class for each test
        // You may need to initialize any dependencies required by the User class
    }

    public function testRegisterUserSuccess()
    {
        // Simulate a POST request with the required data
        $_POST['name'] = 'John Doe';
        $_POST['register_email'] = 'john@example.com';
        $_POST['register_password'] = 'password123';

        // You may need to mock the database connection and the query execution
        $mockDb = $this->createMock(PDO::class);
        $this->user->setDb($mockDb);

        $mockQuery = $this->createMock(PDOStatement::class);
        $mockQuery->method('execute')->willReturn(true);
        $mockDb->method('prepare')->willReturn($mockQuery);

        $this->user->registerUser();

        // Assert that the successRegister property is true
        $this->assertTrue($this->user->successRegister);
    }

    // Add more test methods for other scenarios (e.g., failed registration, login, and password reset)

    protected function tearDown(): void
    {
        $this->user = null; // Release the instance of the User class after each test
    }
}