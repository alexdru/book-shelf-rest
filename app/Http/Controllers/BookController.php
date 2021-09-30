<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection|Book[]
     */
    public function index(): array|Collection
    {
        return Book::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Builder|Model
     */
    public function store(Request $request): Model|Builder
    {
        return Book::query()->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param Book $book
     * @return Book
     */
    public function show(Book $book): Book
    {
        return $book;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Book $book
     * @return Book
     */
    public function update(Request $request, Book $book): Book
    {
        return tap($book)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Book $book
     * @return bool
     */
    public function destroy(Book $book): bool
    {
        return $book->delete();
    }

    /**
     * Search the specified resource with request params
     *
     * @param Request $request
     * @return Builder[]|Collection
     */
    public function search(Request $request): Collection|array
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $releaseDate = $request->input('release_date');

        return Book::query()
            ->when($title, fn($q) => $q->orWhere('title', 'like', "%{$title}%"))
            ->when($description, fn($q) => $q->orWhere('description', 'like', "%{$description}%"))
            ->when($releaseDate, fn($q) => $q->orWhere('release_date', 'like', "%{$releaseDate}%"))
            ->get();
    }
}
