<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Admin\Company;

class CompanyApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_company()
    {
        $company = Company::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/companies', $company
        );

        $this->assertApiResponse($company);
    }

    /**
     * @test
     */
    public function test_read_company()
    {
        $company = Company::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/companies/'.$company->id
        );

        $this->assertApiResponse($company->toArray());
    }

    /**
     * @test
     */
    public function test_update_company()
    {
        $company = Company::factory()->create();
        $editedCompany = Company::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/companies/'.$company->id,
            $editedCompany
        );

        $this->assertApiResponse($editedCompany);
    }

    /**
     * @test
     */
    public function test_delete_company()
    {
        $company = Company::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/companies/'.$company->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/companies/'.$company->id
        );

        $this->response->assertStatus(404);
    }
}
