<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Borrow;
use App\Http\Resources\BorrowResource;


class BorrowController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show']);
    }

    public function index()
    {
      return response()->json(Borrow::all()->paginate(25), 200);
    }
    public function store(Request $request, Book $book)
    {
        if (Borrow::find(['book_id' => $book->id])) {
          return response()->json(['error' => 'book is borrowed'], 403);
        }
        $borrow = Borrow::firstOrCreate(
            [
            'user_id' => $request->user()->id,
            'book_id' => $book->id,
            ]
        );

      $new_borrow = new BorrowResource($borrow);
      return response()->json($new_borrow, 200);
    }

    public function destroy(Borrow $borrow)
    {
      $borrow->delete();

      return response()->json(null, 204);
    }
}
