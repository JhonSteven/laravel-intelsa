<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Laravel\Passport\Passport;

use App\Models\Student;
use App\User;

class StudentTest extends TestCase
{
    use RefreshDatabase;

    public function get_headers_token()
    {
        $this->seed();
        \Artisan::call('passport:install');
        
        $user = User::first();
        Passport::actingAs($user);
        
        $token = $user->createToken('Personal Access Token')->accessToken;
        
        return [ 'Authorization' => 'Bearer '.$token];
    }

    public function test_can_store_a_student()
    {
        $headers = $this->get_headers_token();

        $data = [
            "names" => "Jhon Stiven",
            "surnames" => "Parra Peña",
            "identification_number" => "1098759922",
            "date_of_birth" => "1994-09-15",
            "identification_type_id" => 1,
            "genre_id" => 1,
            "career_id" => 1,
        ];

        $this->post('/api/students', $data, $headers)
            ->assertStatus(201)
            ->assertJsonStructure(['message','success','stored']);
    }

    public function test_can_update_a_student()
    {
        $headers = $this->get_headers_token();

        $randomStudent = Student::all()->random();

        $data = [
            "names" => "Jhon Stiven",
        ];

        $this->put('/api/students/'.$randomStudent->id, $data, $headers)
            ->assertStatus(200)
            ->assertJsonStructure(['message','success','updated']);
    }

    public function test_can_show_a_student()
    {
        $headers = $this->get_headers_token();

        $randomStudent = Student::all()->random();
        $data = [];

        $this->get('/api/students/'.$randomStudent->id, $data, $headers)
            ->assertStatus(200)
            ->assertJson([
                "id" => $randomStudent->id,
                "names" => $randomStudent->names
            ]);
    }

    public function test_can_delete_a_student()
    {
        $headers = $this->get_headers_token();

        $randomStudent = Student::all()->random();
        $data = [];

        $this->delete('/api/students/'.$randomStudent->id, $data, $headers)
            ->assertStatus(200)
            ->assertJsonStructure(['message','success','deleted']);
    }
}
