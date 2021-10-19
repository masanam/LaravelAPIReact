<?php namespace Tests\Repositories;

use App\Models\Admin\Favorit;
use App\Repositories\Admin\FavoritRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FavoritRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FavoritRepository
     */
    protected $favoritRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->favoritRepo = \App::make(FavoritRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_favorit()
    {
        $favorit = Favorit::factory()->make()->toArray();

        $createdFavorit = $this->favoritRepo->create($favorit);

        $createdFavorit = $createdFavorit->toArray();
        $this->assertArrayHasKey('id', $createdFavorit);
        $this->assertNotNull($createdFavorit['id'], 'Created Favorit must have id specified');
        $this->assertNotNull(Favorit::find($createdFavorit['id']), 'Favorit with given id must be in DB');
        $this->assertModelData($favorit, $createdFavorit);
    }

    /**
     * @test read
     */
    public function test_read_favorit()
    {
        $favorit = Favorit::factory()->create();

        $dbFavorit = $this->favoritRepo->find($favorit->id);

        $dbFavorit = $dbFavorit->toArray();
        $this->assertModelData($favorit->toArray(), $dbFavorit);
    }

    /**
     * @test update
     */
    public function test_update_favorit()
    {
        $favorit = Favorit::factory()->create();
        $fakeFavorit = Favorit::factory()->make()->toArray();

        $updatedFavorit = $this->favoritRepo->update($fakeFavorit, $favorit->id);

        $this->assertModelData($fakeFavorit, $updatedFavorit->toArray());
        $dbFavorit = $this->favoritRepo->find($favorit->id);
        $this->assertModelData($fakeFavorit, $dbFavorit->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_favorit()
    {
        $favorit = Favorit::factory()->create();

        $resp = $this->favoritRepo->delete($favorit->id);

        $this->assertTrue($resp);
        $this->assertNull(Favorit::find($favorit->id), 'Favorit should not exist in DB');
    }
}
