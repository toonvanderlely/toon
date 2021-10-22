<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserStoriesTest extends TestCase
{
    public function test_REQ2_PublicCategoryPage()
    {
        $category = \App\Category::first();
        $product = $category->products[1];
        $response = $this->get('/categories/' . $category->id);
        $response->assertStatus(200);
        $response->assertSeeText($product->title);
    }

    public function test_REQ4_DiscountedPriceOnModel()
    {
        $product = \App\Product::where('discount', '>', '0')->first();
        $origPrice = $product->getOriginal('price');
        $discPrice = $product->price;

        $discount = $origPrice * ($product->discount / 100); //Korting in euro's
        $finalPrice = $origPrice - $discount;               //Haal korting af van prijs
        $finalPrice = number_format($finalPrice, 2);               //Zorg altijd voor 2 decimalen

        $this->assertEquals($finalPrice, $discPrice);
    }

    public function test_REQ4_DiscountedPriceInHTML()
    {
        $product = \App\Product::where('discount', '>', '0')->first();
        $origPrice = $product->getOriginal('price');
        $discount = $origPrice * ($product->discount / 100); //Korting in euro's
        $finalPrice = $origPrice - $discount;               //Haal korting af van prijs
        $finalPrice = number_format($finalPrice, 2);               //Zorg altijd voor 2 decimalen

        $response = $this->get('/winkel/' . $product->id);
        $response->assertStatus(200);
        $response->assertSeeText($finalPrice);
    }

    public function test_REQ6_OrderStatusExists()
    {
        $order = \App\Order::first();
        $this->assertArrayHasKey('delivered', $order->getAttributes(), "Order heeft geen attribuut 'delivered'");
    }

    public function test_REQ7_OrderStatusChanges()
    {
        $order = \App\Order::first();
        $statusBefore = $order->delivered;
        $user = \App\User::first();
        $response = $this->actingAs($user)->get('/admin/orders/' . $order->id . '/toggle');
        $response->assertRedirect('/admin/orders');
        $order = $order->fresh();
        $this->assertNotEquals($statusBefore, $order->delivered, "Orderstatus is niet gewijzigd");
    }

    public function test_REQ9_ProductEditHasDiscount()
    {
        $product = \App\Product::where('discount', '>', '0')->first();
        $origPrice = $product->getOriginal('price');
        $user = \App\User::first();

        $response = $this->actingAs($user)->get('/admin/products/' . $product->id . '/edit');
        $response->assertStatus(200);
        $response->assertSee($origPrice);
        $response->assertSee($product->discount);
    }

    public function test_REQ10_ProductEditContainsCategory()
    {
        $product = \App\Product::first();
        $category = \App\Category::first();
        $user = \App\User::first();
        
        $response = $this->actingAs($user)->get('/admin/products/' . $product->id . '/edit');
        $response->assertStatus(200);
        $response->assertSeeText($category->name);
    }

    public function test_REQ11a_CategoryPageHasProducts()
    {
        $category = \App\Category::first();
        $product = $category->products[1];
        $this->assertArrayHasKey('title', $product->getAttributes(), "Product lijkt niet gevonden");
        $user = \App\User::first();
        $response = $this->actingAs($user)->get('/admin/categories/' . $category->id . '/edit');
        $response->assertStatus(200);
        $response->assertSeeText($product->title);
    }
}   
