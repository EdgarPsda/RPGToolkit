<?php

namespace Tests\Feature\Api;

use App\Hero;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HerosTest extends TestCase
{
    use RefreshDatabase;

    /** 
     * @test
     * @throws \Throwable
     * @endpoint ['GET', 'api/heros']
     */
    public function test_get_all_index()
    {
        $hero = $this->create(Hero::class);

        $response = $this->getJson(route('api.heros.index'));
        $response->assertOk();
        $response->assertJson([
            'data' => [
                [
                    'id' => $hero->id,
                    'firstName' => $hero->fname,
                    'lastName' => $hero->lname,
                    'level' => $hero->level,
                    'race' => $hero->race,
                    'class' => $hero->class,
                    'weapon' => $hero->weapon,
                    'stats' => $hero->stats
                ]
            ]
        ]);
    }

    /** 
     * @test
     * @throws \Throwable
     * @endpoint ['GET', 'api/heros/{hero}']
     */
    public function test_get_a_hero()
    {
        $hero = $this->create(Hero::class);

        $response = $this->getJson(route('api.heros.show', $hero));
        $response->assertOk();
        $response->assertJson([
            'data' => [
                'id' => $hero->id,
                'firstName' => $hero->fname,
                'lastName' => $hero->lname
            ]
        ]);
    }


    /** 
     * @test
     * @throws \Throwable
     * @endpoint ['POST', 'api/heros']
     */
    public function test_store_hero()
    {
        $hero = $this->create(Hero::class);
        $heroData = $this->make(Hero::class, ['id' => $hero->id]);

        $response = $this->postJson(route('api.heros.store'), $heroData->toArray());
        $response->assertStatus(201);
        $response->assertJson([
            'data' => [
                'firstName' => $heroData->fname
            ]
        ]);
    }

    /** 
     * @test
     * @throws \Throwable
     * @endpoint ['PUT', 'api/heros/{hero}']
     */
    public function test_update_hero()
    {
        $hero = $this->create(Hero::class);
        $heroData = $this->make(Hero::class, ['id' => $hero->id]);

        $response = $this->putJson(route('api.heros.update', $hero), $heroData->toArray());
        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'id' => $hero->id,
                'firstName' => $heroData->fname
            ]
        ]);

        $this->assertDatabaseHas('heroes', $heroData->toArray());
    }

    /** 
     * @test
     * @throws \Throwable
     * @endpoint ['DELETE', 'api/heros/{hero}']
     */
    public function test_delete_hero()
    {
        $hero = $this->create(Hero::class);

        $this->deleteJson(route('api.heros.destroy', $hero));

        $this->assertSoftDeleted('heroes', $hero->toArray());
    }
}
