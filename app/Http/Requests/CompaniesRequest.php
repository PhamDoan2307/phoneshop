<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompaniesRequest extends FormRequest
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
            'name'       => 'required|unique:companies,name,' . $this->id . '|max:30',
            'address'    => 'required|min:5',
            'tel'        => 'required|digits_between:10,11|unique:companies,tel,'.$this->id,
            'fax'        => 'required|digits_between:10,11'
        ];
    }

    public function messages()
    {
        return [
            'name.required'     =>  'Vui lòng nhập tên!',
            'name.unique'       =>  'Tên đã tồn tại!Vui lòng chọn tên khác',
            'name.max'          =>  'Tên chỉ gồm nhiều nhất 30 ký tự',
            'name.min'          =>  'Tên quá ngắn!Vui lòng nhập lại',
            'address.required'  =>  'Vui lòng nhập địa chỉ!',
            'address.min'       =>  'Địa chỉ ít nhất là 10 ký tự',
            'tel.required'      =>  'Vui lòng nhập số điện thoại',
            'tel.digits_between'=>  'Số điện thoại phải là số và nằm trong khoảng 10-11 ký tự',
            'fax.required'      =>  'Vui lòng nhập số fax',
            'fax.digits_between'=>  'Số fax phải là số và nằm trong khoảng 10-11 ký tự',
        ];
    }
}
