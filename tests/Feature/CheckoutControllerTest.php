<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckoutControllerTest extends TestCase
{
    /**
     * @test
     * @testdox 確認訂單是否有商品與結帳金額
     * A basic feature test example.
     *
     * @return void
     */
    public function shouldDisplayTotalAmountWhenVisitCheckoutPage()
    {
        $totalAmount = 100;
        $response = $this->post('/checkout', ['totalAmount' => $totalAmount]);

        $response->assertStatus(200)
            ->assertViewIs('checkout.index')
            ->assertViewHas('totalAmount', $totalAmount)
            ->assertSeeText('已確認收到您的訂單')
            ->assertSeeText('訂單金額總計：' . $totalAmount);
    }
}
