<?php

namespace Tests\Feature;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @testdox 確認首頁是否顯示正確
     * A basic feature test example.
     *
     * @return void
     */
    public function shouldReturnStatus200WhenVisitHomePage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     * @testdox 確認首頁是否顯示商品資訊
     * A basic feature test example.
     *
     * @return void
     */
    public function shouldReturnHomeIndexViewAndProducts(){

        $products = factory(Product::class, 10)->create();

        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertViewIs('home.index')
            ->assertSeeText('購物車')
            ->assertSeeText('總價格 (新台幣)')
            ->assertViewHas('products');

        foreach ($products as $product) {
            $response->assertSeeText($product->name);
        }

        //$this->assertEquals($response['products']->toArray(), $products->toArray());
        $this->assertEquals($response['products']->reverse()->values()->toArray(), $products->toArray());

    }
}
