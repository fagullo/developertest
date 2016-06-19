<?php

use App\Product;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Testing relationships between user and products (wished proeducts).
     */
    public function testWhishlist()
    {
        $user = User::create([
            'email' => 'testuser@test.com',
            'name' => 'test',
            'password' => bcrypt('test'),
        ]);

        $this->assertCount(0, $user->wishes);

        $product = Product::create([
            'name' => 'p1',
            'price' => 7.5,
            'properties' => 'Some properties',
            'image' => 'Test image',
        ]);

        // Add this product to the wish list
        $user->wishes()->attach($product);
        $user->load('wishes');

        $this->assertCount(1, $user->wishes);
        $this->assertEquals($product->name, $user->wishes[0]->name);
        $this->assertEquals($product->price, $user->wishes[0]->price);
        $this->assertEquals($product->properties, $user->wishes[0]->properties);
        $this->assertEquals($product->image, $user->wishes[0]->image);

        $user->wishes()->detach($product);
        $user->load('wishes');
        $this->assertCount(0, $user->wishes);
    }
}
