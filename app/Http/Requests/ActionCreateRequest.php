<?php

namespace App\Http\Requests;

// use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\BaseRequest;

class ActionCreateRequest extends BaseRequest
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
            'event_id' => 'required',
            'game_id' => 'required',
            'player_id' => 'required',
            'eventTime' => 'required'
        ];
    }
}
