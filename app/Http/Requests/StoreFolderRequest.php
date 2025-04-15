<?php

namespace App\Http\Requests;

use App\Models\File;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Validation\Rule;

class StoreFolderRequest extends ParentIdBaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return array_merge(parent::rules(),
            [
                'name'=> ['required', 'string', 'max:255',
                    Rule::unique(File::class, 'name')
                        ->where('created_by', auth()->user()->id)
                        ->where('parent_id', $this->parent_id)
                        ->whereNull('deleted_at')
                ]
            ]
        );
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'Folder ":input" already exists.',
        ];
    }
}