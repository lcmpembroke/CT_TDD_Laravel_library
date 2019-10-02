<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Book;
use App\Author;
//use SessionHandler;

class BookManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_book_can_be_added_to_the_library()
    {
        $response = $this->post('/books', $this->data());

        $book = Book::first();
        $this->assertCount(1,Book::all(),'ERROR=book count added was not 1');
        $response->assertRedirect($book->path());
    }


    /** @test */
    public function a_book_must_have_a_title()
    {
        $response = $this->post('/books', array_merge($this->data(), ['title' => '']));
        $response->assertSessionHasErrors('title');
    }    


    /** @test */
    public function a_book_must_have_an_author()
    {
        $response = $this->post('/books', array_merge($this->data(), ['author_id' => '']));
        $response->assertSessionHasErrors('author_id');
    }  

    /** @test */
    public function a_book_title_can_be_updated()
    {
        $this->post('/books', array_merge($this->data(), ['title' => 'Book title to be changed']));

        $book = Book::first();

        $response = $this->patch($book->path(), array_merge($this->data(), ['title' => 'Updated Title']));

        $this->assertEquals('Updated Title', Book::first()->title);
        $response->assertRedirect($book->fresh()->path());
    }    

    /** @test */
    public function a_book_author_can_be_updated()
    {
        $this->post('/books', $this->data());

        $book = Book::first();

        $response = $this->patch($book->path(), array_merge($this->data(), ['author_id' => 'Updated Author']));
        $this->assertEquals(2, Book::first()->author_id);
        $response->assertRedirect($book->fresh()->path());
    }  

    /** @test */
    public function a_book_can_be_deleted()
    {
        $this->post('/books', $this->data());

        $book = Book::first();
        $this->assertCount(1, Book::all(),'one book found before delete');

        $response = $this->delete($book->path());

        $this->assertCount(0, Book::all(),'book not found after delete');
        $response->assertRedirect('/books');
    }        

    /** @test */
    public function a_new_author_is_automatically_added()
    {
        $this->withoutExceptionHandling();
        // on adding a book, need to add an author if not there already
        $this->post('/books', [
            'title'     => 'Book title',
            'author_id'    => 'Good author',            
        ]);   
        $book = Book::first();
        $author = Author::first();

        //dd($book);

        $this->assertEquals($author->id, $book->author_id);
        $this->assertCount(1, Author::all(),'ERROR=an author was not added');                     
    }

     private function data()
     {
         return [
             'title'     => 'A book title',
             'author_id'    => 'Good author',            
         ];
     }  
}
