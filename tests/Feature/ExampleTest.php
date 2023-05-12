<?php

namespace Tests\Feature;

use App\Models\Tenant;
use Carbon\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TenantTest extends TestCase
{
    /**
     * Test Get All tenants.
     *
     * @return void
     */
    public function testBasicTest()
    {

        $response = $this->get('');
        $response->assertStatus(200);
    }




}
