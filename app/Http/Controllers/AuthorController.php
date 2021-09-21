<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Author[]|Collection
     */
    public function index(): Collection|array
    {
        return Author::all();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Builder|Model
     */
    public function store(Request $request): Model|Builder
    {
        return Author::query()->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param Author $author
     * @return Author
     */
    public function show(Author $author): Author
    {
        return $author;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Author $author
     * @return Author
     */
    public function update(Request $request, Author $author): Author
    {
        return tap($author)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Author $author
     * @return bool
     */
    public function destroy(Author $author): bool
    {
        return $author->delete();
    }
}
