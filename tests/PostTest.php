<?php

use PHPUnit\Framework\TestCase;
//use classes\Post;
//require_once "Post.php";
require_once "c:\openserver\domains\blog\classes\QueryBuilder.php";
require_once "c:\openserver\domains\blog\classes\Post.php";

class PostTest extends TestCase
{
    private $post;

    protected function setUp(): void
    {
        // Create a mock of the QueryBuilder class
        $this->post = $this->getMockBuilder(Post::class)
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();
    }

    public function testCreatePost()
    {
        $_POST['title'] = 'Test Title';
        $_POST['description'] = 'Test Description';

        // Mock the database connection and query
        $mockQuery = $this->getMockBuilder(PDOStatement::class)
            ->getMock();
        $mockQuery->expects($this->once())
            ->method('execute')
            ->with([$this->equalTo('Test Title'), $this->equalTo('Test Description'), $this->anything(), $this->anything()])
            ->willReturn(true);
        $this->post->db = $this->getMockBuilder(PDO::class)
            ->getMock();
        $this->post->db->expects($this->once())
            ->method('prepare')
            ->with('INSERT INTO posts VALUES(NULL,?,?,?,?)')
            ->willReturn($mockQuery);

        $this->post->createPost(123);

        $this->assertTrue($this->post->successPost);
    }

    public function testGetAll()
    {
        // Mock the database connection and query
        $mockQuery = $this->getMockBuilder(PDOStatement::class)
            ->getMock();
        $mockQuery->expects($this->once())
            ->method('fetchAll')
            ->with(PDO::FETCH_OBJ)
            ->willReturn(['post1', 'post2']); // Replace with actual data
        $this->post->db = $this->getMockBuilder(PDO::class)
            ->getMock();
        $this->post->db->expects($this->once())
            ->method('prepare')
            ->with('SELECT * from posts')
            ->willReturn($mockQuery);

        $result = $this->post->getAll();

        $this->assertEquals(['post1', 'post2'], $result);
    }

    // Add more test methods for the remaining functions...

    // For example:
    // public function testGetUser()
    // public function testDeletePost()
    // public function testGetAllUserPosts()
    // public function testGetSinglePost()
    // public function testGetAllComments()
    // public function testAddComment()
}