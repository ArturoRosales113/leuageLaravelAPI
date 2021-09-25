<?php

namespace App\Http\Requests;

// use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\BaseRequest;

class GameCreateRequest extends BaseRequest
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
            'modality_id' => 'required',
            'team1_id' => 'required',
            'team2_id' => 'required',
            'league_id' => 'required',
            'field_id' => 'required',
            'start_time' => 'required',
            'result1' => 'required',
            'icon_path' => 'required',
            'img_path' => 'required'
        ];
    }
}


