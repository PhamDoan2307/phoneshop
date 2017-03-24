<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:products,name,' . $this->id,
            'group' => 'required',
            'color' => 'required',
            'content'  =>'required',
            'price'   =>'required'
            //
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên điện thoại.',
            'name.unique' => 'Tên đã tồn tại!Vui lòng chọn tên khác',
            'group.required' =>'Vui lòng chọn loại điện thoại!',
            'color.required' =>'Vui lòng chọn màu sắc'
        ];
    }
}
