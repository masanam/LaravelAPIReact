<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Admin\Favorit;

class FavoritApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_favorit()
    {
        $favorit = Favorit::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/favorits', $favorit
        );

        $this->assertApiResponse($favorit);
    }

    /**
     * @test
     */
    public function test_read_favorit()
    {
        $favorit = Favorit::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/favorits/'.$favorit->id
        );

        $this->assertApiResponse($favorit->toArray());
    }

    /**
     * @test
     */
    public function test_update_favorit()
    {
        $favorit = Favorit::factory()->create();
        $editedFavorit = Favorit::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/favorits/'.$favorit->id,
            $editedFavorit
        );

        $this->assertApiResponse($editedFavorit);
    }

    /**
     * @test
     */
    public function test_delete_favorit()
    {
        $favorit = Favorit::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/favorits/'.$favorit->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/favorits/'.$favorit->id
        );

        $this->response->assertStatus(404);
    }
}
