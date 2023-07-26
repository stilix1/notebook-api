<?php

namespace Tests\Feature;

use App\Models\NotebookEntry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class NotebookControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     *
     * Тест метода GET /api/v1/notebook
     */
    public function test_get_notebook_entries()
    {
        NotebookEntry::factory(5)->create();

        $response = $this->getJson("/notebook");

        $response->assertStatus(200)
            ->assertJsonCount(5);
    }

    /**
     * Тест метода POST /api/v1/notebook
     */
    public function test_create_notebook_entry()
    {
        $data = [
            'full_name' => 'Test Test',
            'company' => 'Test TestInc',
            'phone' => '123-456-7890',
            'email' => 'test@test.com',
            'birthdate' => '1990-01-01',
            'photo' => 'https://test.com/photo.jpg',
        ];

        $response = $this->postJson("/api/v1/notebook", $data);

        $response->assertStatus(201)
            ->assertJson($data);

        $this->assertDatabaseHas('notebook_entries', $data);
    }

    /**
     * Тест метода POST /api/v1/notebook
     */
    public function test_update_notebook_entry()
    {
        $entry = NotebookEntry::factory()->create();

        $data = [
            'full_name' => 'Updated Name',
            'company' => 'XYZ Corp',
            'phone' => '987-654-3210',
            'email' => 'updated@example.com',
            'birthdate' => '1995-05-05',
            'photo' => 'https://example.com/updated.jpg',
        ];

        $response = $this->putJson("/api/v1/notebook/{$entry->id}", $data);

        $response->assertStatus(200)
            ->assertJson($data);

        $this->assertDatabaseHas('notebook_entries', $data);
    }

    /**
     * @test
     */
    public function test_delete_notebook_entry()
    {
        $entry = NotebookEntry::factory()->create();

        $response = $this->deleteJson("/api/v1/notebook/{$entry->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('notebook_entries', ['id' => $entry->id]);
    }
}
