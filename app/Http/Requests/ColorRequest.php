<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColorRequest extends FormRequest
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
            //
            'color' => 'required|unique:colors,color,' . $this->id,
            'price' => 'required'
        ];
    }

    public function messages()
    {
        return [

            'color.required' =>'Vui lòng nhập tên sản phẩm',
            'color.unique' =>'Tên sản phẩm bị trùng lặp',
            'price.required' =>'Vui lòng chọn giá!'
        ];
    }
}
