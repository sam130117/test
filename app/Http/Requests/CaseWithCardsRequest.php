<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CaseWithCardsRequest extends FormRequest
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
        $cardRules = (new CardsRequest)->rules();
        $rules = [
            'title'               => 'required|string',
            'client_email'        => 'required|email|unique:cases,client_email,' . $this->id,
            'website'             => 'required|string',
            'country'             => 'required|string',
            'user_id'             => 'nullable|exists:users,id',
            'cards'               => 'nullable|array',
            'cards.*.name'        => $cardRules['name'],
            'cards.*.total_value' => $cardRules['total_value'],
            'cards.*.card_type'   => $cardRules['card_type'],
            'cards.*.close_date'  => $cardRules['close_date'],
        ];
        $cards = $this->cards;

        if ($cards)
            foreach ($cards as $key => $card)
                $rules['cards.' . $key . '.last_number'] = $cardRules['last_number'] . $card['id'];

        return $rules;
    }
}
