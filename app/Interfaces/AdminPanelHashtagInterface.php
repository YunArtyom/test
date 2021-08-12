<?php

namespace App\Interfaces;

use App\Http\Requests\Hashtag\CreateHashtagRequest;

interface AdminPanelHashtagInterface
{
    public function all();

    public function allWithRelations();

    public function create(CreateHashtagRequest $request);

    public function edit();

    public function delete();
}
