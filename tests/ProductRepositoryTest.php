<?php

declare(strict_types=1);

use app\models\repositories\ProductRepository;
use PHPUnit\Framework\TestCase;

class ProductRepositoryTest extends TestCase
{
    protected $fixture;

    protected function setUp()
    {
        $this->fixture = new ProductRepository();
    }
    
    protected function tearDown()
    {
        $this->fixture = NULL;
    }

    public function testGetTableName()
    {
        $this->assertEquals('goods', $this->fixture->getTablename());
    }

    public function testGetEntityClass()
    {
        $this->assertEquals('app\models\entities\Product', $this->fixture->getEntityClass());
    }

    public function testParentClass()
    {
        $this->assertEquals('app\models\Repository', get_parent_class($this->fixture));
    }
}
