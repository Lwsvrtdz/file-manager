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

    /**
     * Scope a query to only include folders.
     */
    public function scopeWhereIsFolder($query, bool $isFolder = true)
    {
        return $query->where('is_folder', $isFolder);
    }

    /**
     * Scope a query to only include files created by the given user.
     */
    public function scopeWhereCreatedBy($query, int $userId)
    {
        return $query->where('created_by', $userId);
    }

    public function isOwnedBy($userId): bool
    {
        return $this->created_by == $userId;
    }
}
