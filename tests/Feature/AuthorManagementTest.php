<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;
use App\Author;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_author_can_be_created()
    {
        // American string date format "MM/dd/yyyy"
        $this->post('/authors', $this->data());

        $author = Author::all();
        $this->assertCount(1, $author);
        $this->assertInstanceOf(Carbon::class,$author->first()->dob);
        $this->assertEquals('1978/12/05', $author->first()->dob->format('Y/m/d'));
    }

    /** @test */
    public function an_author_name_is_required()
    {
        $response = $this->post('/authors',array_merge($this->data(),['name' => '']));
        //dd(request()->session()->all());
        $response->assertSessionHasErrors('name');
        $this->assertCount(0, Author::all());
    }  
    
    /** @test */
    public function an_author_dob_is_required()
    {
        $response = $this->post('/authors',array_merge($this->data(),['dob' => '']));
        $response->assertSessionHasErrors('dob');
        $this->assertCount(0, Author::all());
    }       

    private function data()
    {
        return [
            'name'  => 'Author Name',
            'dob'   => '12/05/1978'
        ];
    }


}
