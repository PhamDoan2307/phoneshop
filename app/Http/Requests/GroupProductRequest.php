<?php

namespace App\Http\Requests;

use App\Models\GroupProduct;
use App\Product;
use Illuminate\Foundation\Http\FormRequest;

class GroupProductRequest extends FormRequest
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
        $rules = [
        ];

//        for ($i = 1; $i < $this->request->get('number'); $i++) {
//            $rules['name' . $i] = 'required';
//            $rules['describe' . $i] = 'required';
////            $rules['image'.$i] ='required|image';
//        }
        for ($i = 0; $i <= $this->request->get('number'); $i++) {
            $rules['name.' . $i] = 'required|unique:group_products,name,' . $this->id;
            $rules['describe.' . $i] = 'required';
            $rules['image.' . $i] = 'required|image';
        }
        return $rules;

    }

    public function messages()
    {
        $messages = [

        ];
        for ($i = 0; $i <= $this->request->get('number'); $i++) {
            $messages['name.' . $i . '.required'] = 'Tên loại danh mục thứ ' . $i . ' còn trống.';
            $messages['name.' . $i . '.unique'] = 'Tên loại danh mục thứ ' . $i . ' đã tồn tại.';
            $messages['describe.' . $i . '.required'] = 'Thông tin mô tả thứ ' . $i . ' còn trống.';
            $messages['image.' . $i . '.required'] = 'Ảnh mô tả thứ ' . $i . ' còn trống!';
            $messages['image.' . $i . '.image'] = 'Sai định dạng ảnh file ' . $i;

        }
//        $messages['name.' . 1 . '.required'] = 'Tên loại danh mục thứ ' . 1 . ' còn trống.';
//        foreach ($this->request->get('name') as $key => $val) {
////            $key=$key+1;
////            if ($key == 0) {
////                $messages['name.0.required'] = 'Tên loại danh mục đầu tiên còn trống.';
////
////            } else{
//                $messages['name.' . $key . '.required'] = 'Tên loại danh mục thứ ' . $key=+1 . ' còn trống.';
////            }
//
//        }
//        return [
//            for(){
//                'name1.required' =>'fuck tou'
//            };
//
//        ];
        return $messages;
    }
}
