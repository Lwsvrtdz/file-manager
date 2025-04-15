<?php

namespace App\Http\Requests;

use App\Models\File;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ParentIdBaseRequest extends FormRequest
{
    public ?File $parent = null;

    public function authorize(): bool
    {
        $this->parent = File::query()->where('id', $this->input('parent_id'))->first();

        if ($this->parent && !$this->parent->isRoot() && !$this->parent->isOwnedBy(auth()->user()->id)) {
            return false;
        }

        return true;
    }

    public function rules(): array
    {

        return [
            'parent_id' => [
                Rule::exists(File::class, 'id')
                ->where(function(Builder $query) {
                    return $query
                        ->whereIsFolder(true)
                        ->whereCreatedBy(auth()->user()->id);
                })
            ],
        ];
    }
}