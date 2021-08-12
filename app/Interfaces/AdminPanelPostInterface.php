<?php

namespace App\Interfaces;

use App\Http\Requests\Blog\Post\CreatePostRequest;
use Illuminate\Http\Request;

interface AdminPanelPostInterface
{
    public function all();

    public function allWithRelations();

    public function allWithFilters(Request $request);

    public function create(CreatePostRequest $request);

    public function edit();

    public function delete();
}
