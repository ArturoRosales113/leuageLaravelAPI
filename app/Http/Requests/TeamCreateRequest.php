<?php

namespace App\Http\Requests;

// use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\BaseRequest;

class TeamCreateRequest extends BaseRequest
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
            'league_id' => 'required',
            'icon_path' => 'required',
            'img_path' => 'required'
        ];
    }
}
