<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Note;

class NoteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_note_can_be_created()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/notes', [
            'note' => 'Test Note'
        ]);

        $response->assertRedirect('/notes');
        $this->assertCount(1, Note::all());
    }

    /** @test */
    public function a_note_can_be_updated()
    {
        $this->withoutExceptionHandling();
        $this->post('/notes', [
            'note' => 'Test Note'
        ]);

        $note = Note::first();

        $response = $this->put('/notes/' . $note->id, [
            'note' => 'Updated Note'
        ]);

        $response->assertRedirect('/notes/' . $note->id);
        $this->assertEquals('Updated Note', Note::first()->note);
    }

    /** @test */
    public function a_note_can_be_deleted()
    {
        $this->withoutExceptionHandling();
        $this->post('/notes', [
            'note' => 'Test Note'
        ]);

        $note = Note::first();

        $response = $this->delete('/notes/' . $note->id);

        $response->assertRedirect('/notes');
        $this->assertCount(0, Note::all());
    }
}