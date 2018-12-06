<?php

namespace App\Http\Requests;

use App\Models\Cards;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CasesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'last_number' => 'required|string',
            'total_value' => 'required|numeric',
            'card_type' => 'required|in:' . Cards::TYPE_CREDIT . ',' . Cards::TYPE_DEBIT,
            'close_date' => 'date',
            'case_id' => 'nullable|exists:cases,id'
        ];
    }
}
