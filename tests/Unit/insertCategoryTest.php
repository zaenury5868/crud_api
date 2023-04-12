<?php

namespace Tests\Unit;

use App\Models\Category;
use PHPUnit\Framework\TestCase;

class insertCategoryTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_insert_category(): void
    {
        $data = [
            'name' => 'Category Test',
            'is_publish' => 1,
        ];
    
        $category = Category::create($data);
    
        $this->assertEquals($data['name'], $category->name);
        $this->assertEquals($data['is_publish'], $category->is_publish);
    }
}
