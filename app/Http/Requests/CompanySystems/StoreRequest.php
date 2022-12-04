<?php

namespace App\Http\Requests\CompanySystems;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            // 'system_id' => 'required|exists:systems,id|unique:company_systems,company_id,system_id',
            'start_date' => 'required|before:end_date',
            'end_date' => 'required|after:start_date',
        ];
    }
}
