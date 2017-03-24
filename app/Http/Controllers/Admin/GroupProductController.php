<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GroupProductRequest;
use App\Models\GroupProduct;
use App\Repositories\GroupProduct\GroupProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\GroupProduct\GroupProductRepository;
use Illuminate\Support\Facades\Input;

class GroupProductController extends Controller
{
    //
    var $path = 'resources/upload/';
    protected $groupProductRepository;

    public function __construct(GroupProductRepositoryInterface $groupProductRepository)
    {
        $this->groupProductRepository = $groupProductRepository;
    }

    public function getList()
    {
        $path = $this->path;
        $data = $this->groupProductRepository->getAll();
        $module = 'Danh sách loại sản phẩm';
        $company = $this->groupProductRepository->getCompany();
        return view('admin.module.group_product.list', compact('data', 'path', 'module', 'company'));
    }

//    public function postList(Request $request)
//    {
//        $path = $this->path;
//        if (isset($request->number)) {
//            $number = $request->number;
//        } else {
//            $number = 1;
//        }
//
//        $data = $this->groupProductRepository->getAll();
////        $module='Danh sách loại sản phẩm';
//        return view('admin.module.group_product.add', compact('data', 'path', 'number'));
//    }

    public function readList()
    {
        $path = $this->path;
        $data = $this->groupProductRepository->paginate(2);
//        $module='Danh sách loại sản phẩm';
        return view('admin.module.group_product.readList', compact('data', 'path'));
    }

    public function getAdd()
    {
        $company = $this->groupProductRepository->getCompany();
        return view('admin.module.group_product.add', compact('company'));
    }

    public function checkName(Request $request)
    {
        $name = $request->name;
//        echo $name;
        $result = $this->groupProductRepository->checkName($name);
    //        echo $result;
        if ($result==0) {
          return "Khả dụng";
        }else{
            return "Tên đã tồn tại";
        }
    }

    public function postAdd(GroupProductRequest $request)
    {
//        Lấy dữ liệu đẩy vào array trong bảng group
        print_r($request->name);
//        foreach($request->name as $image){
//           echo $image['name'];
//        }
//        foreach($request->only('name','company','describe','status') as $name){
//            print_r($name.'<br>');
//        }
//        $input = $request->only('name', 'describe','status');
//        $input['company_id']=$request->company;
//        $input['image'] = $request->file('image')->getClientOriginalName();
//        $request->file('image')->move('resources/upload', $input['image']);
//        $input['admin_id']='1';
//        $this->groupProductRepository->create($input);
//        return redirect()->route('admin.groupproduct.getList')->with(['success' => 'Thêm mới thành công']);

    }

    public function getEdit($id)
    {
        $company = $this->groupProductRepository->getCompany();
        $data = $this->groupProductRepository->getById($id);
        $path = $this->path;
        return view('admin.module.groupproduct.edit', compact('data', 'path', 'company'));
    }

    public function postEdit(Request $request, $id)
    {
        $input = $request->only('name', 'describe', 'status');
        $input['company_id'] = $request->company;
        if ($request->file('image1') != null) {
            $input['image'] = $request->file('image1')->getClientOriginalName();
            $request->file('image1')->move('resources/upload', $input['image']);
        }
        $input['admin_id'] = '1';
        $this->groupProductRepository->update($id, $input);
        return redirect()->route('admin.groupproduct.getList')->with(['success' => 'Sửa thành công']);
    }
}
