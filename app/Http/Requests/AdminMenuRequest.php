<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Response;
use Reponse;
class AdminMenuRequest extends FormRequest
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
            'name' => 'required|min:3',
            'orders' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'color.required' =>'vui lòng nhập tên',
            'price.required' => 'Vui lòng nhập giá'
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return ['errors' => $validator->getMessageBag()->toArray()];
    }
}
