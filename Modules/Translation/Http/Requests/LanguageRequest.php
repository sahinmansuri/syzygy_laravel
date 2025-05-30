<?php

namespace Modules\Translation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Translation\Rules\LanguageNotExists;

class LanguageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string',
            'locale' => ['required', new LanguageNotExists],
        ];
    }
}
