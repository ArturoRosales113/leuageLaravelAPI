<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
// use Illuminate\Foundation\Http\FormRequest;

class RefereeStoreRequest extends BaseRequest
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
            'user_id' => 'required',
            'refereeType_id' => 'required',
            'numero' => 'required',
            'edad' => 'required',
            'estatura' => 'required',
            'peso' => 'required',
            'is_active' => 'required',
            'icon_path' => 'required',
            'img_path' => 'required'
        ];
    }
}
