<?php

namespace App\Action;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserAction
{
    public function handle(?string $name, ?int $offset, ?int $limit): Collection
    {
        $query = User::query();

        if ($name) {
            $query->where('name', 'like', $name);
        }

        if ($offset) {
            $query->offset($offset);
        }

        if ($limit) {
            $query->limit($limit);
        }

        return $query->get();
    }
}