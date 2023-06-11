<?php

namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function getAllAuthor()
    {
        $authors = Author::all();
        return $authors;
    }
}
