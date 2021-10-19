<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Admin\User;

class UserApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_user()
    {
        $user = User::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/users', $user
        );

        $this->assertApiResponse($user);
    }

    /**
     * @test
     */
    public function test_read_user()
    {
        $user = User::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/users/'.$user->id
        );

        $this->assertApiResponse($user->toArray());
    }

    /**
     * @test
     */
    public function test_update_user()
    {
        $user = User::factory()->create();
        $editedUser = User::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/users/'.$user->id,
            $editedUser
        );

        $this->assertApiResponse($editedUser);
    }

    /**
     * @test
     */
    public function test_delete_user()
    {
        $user = User::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/users/'.$user->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/users/'.$user->id
        );

        $this->response->assertStatus(404);
    }
}
