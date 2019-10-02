<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use PhpParser\Node\Stmt\TryCatch;

class CheckinBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Book $book) 
    {
        try {
            $book->checkin(auth()->user());
        } catch (\Throwable $th) {
            //dd($th->getMessage());
            return response([$th->getMessage()],404);
        }
        
    }
}
