<?php

namespace Tests\Feature;

use App\Models\AddressStore;
use App\Models\CustomerStore;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListOfCustomerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_list_customer(): void
    {
        $response =  $this->json('get', 'api/customer');

        $response->assertStatus(200);
    }

    public function test_detail_customer(): void
    {
        $customer = CustomerStore::factory()->create();
        $response =  $this->json('get', 'api/customer/' . $customer->id);

        $response->assertStatus(200);
    }

    public function test_add_new_customer(): void
    {
        $customer = [
            "title" => fake()->randomElement(['Mr', 'Mrs']),
            "name" => fake()->name(),
            "gender" => fake()->randomElement(['male', 'female']),
            "phone_number" => fake()->randomNumber(5),
            "image" => fake()->url('http'),
            "email" => fake()->email(),
        ];
        $response =  $this->json('post', 'api/customer/', $customer);

        $response->assertStatus(201);
    }

    public function test_add_new_address(): void
    {
        $customer = CustomerStore::factory()->create();

        $address = [
            "customer_id" => $customer->id,
            "address" => fake()->streetAddress(),
            "district" => fake()->address(),
            "city" => fake()->city(),
            "province" => fake()->country(),
            "postal_code" => fake()->randomNumber(5)
        ];
        $response =  $this->json('post', 'api/address/', $address);

        $response->assertStatus(201);
    }

    public function test_update_customer(): void
    {
        $customer = CustomerStore::factory()->create();

        $customerUpdate = [
            "title" => fake()->randomElement(['Mr', 'Mrs']),
            "name" => fake()->name(),
            "gender" => fake()->randomElement(['male', 'female']),
            "phone_number" => fake()->randomNumber(5),
            "image" => fake()->url('http'),
            "email" => fake()->email(),
        ];
        $response =  $this->json('patch', 'api/customer/' . $customer->id, $customerUpdate);

        $response->assertStatus(200);
    }

    public function test_update_address(): void
    {
        $customer = CustomerStore::factory()->create();
        $address = AddressStore::factory()->create([
            "customer_id" => $customer->id
        ]);
        $addressUpdate = [
            "address" => fake()->streetAddress(),
            "district" => fake()->address(),
            "city" => fake()->city(),
            "province" => fake()->country(),
            "postal_code" => fake()->randomNumber(5)
        ];
        $response =  $this->json('patch', 'api/address/' . $address->id, $addressUpdate);

        $response->assertStatus(200);
    }

    public function test_delete_customer(): void
    {
        $customer = CustomerStore::factory()->create();

        $response =  $this->json('delete', 'api/customer/' . $customer->id);

        $response->assertStatus(200);
    }

    public function test_delete_address(): void
    {
        $customer = CustomerStore::factory()->create();
        $address = AddressStore::factory()->create([
            "customer_id" => $customer->id
        ]);
        $response =  $this->json('delete', 'api/address/' . $address->id);

        $response->assertStatus(200);
    }
}
