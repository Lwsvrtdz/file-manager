<?php

namespace App\Models;

use App\Traits\HasCreatorAndUpdater;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

class File extends Model
{
    use NodeTrait, SoftDeletes, HasCreatorAndUpdater;

    protected $casts = [
        'is_folder' => 'boolean',
    ];

    public function isOwnedBy($userId): bool
    {
        return $this->created_by == $userId;
    }
}
