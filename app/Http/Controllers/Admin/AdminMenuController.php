<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminMenuRequest;
use App\Repositories\AdminMenu\AdminMenuRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Validation\Validator;

class AdminMenuController extends Controller
{
    protected $adminMenuRepository;
    protected $route = 'admin.menu.getList';
    protected $path = 'admin.module.menu.';

    public function __construct(AdminMenuRepositoryInterface $adminMenuRepositoryInterFace)
    {
        $this->adminMenuRepository = $adminMenuRepositoryInterFace;
    }

    public function getList()
    {
        $data=$this->adminMenuRepository->getAll();
        return view('admin.module.menu.list',compact('data'));
    }

    public function getAdd()
    {
        $data=$this->adminMenuRepository->getAll();
        return view($this->path . 'add',compact('data'));
    }

    public function postAdd(AdminMenuRequest $request)
    {
        $input=$request->only('orders','name','link','publish','parent_id');
        $input['alias']=changeTitle($request->name);
        $input['admin_id']=1;
        $this->adminMenuRepository->create($input);
        return redirect()->route($this->route)->with(['success'=>'Thêm mới thành công']);
    }
}
