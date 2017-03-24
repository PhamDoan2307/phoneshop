<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CompaniesRequest;
use App\Repositories\Companies\CompaniesRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompaniesController extends Controller
{
    //
    protected $route='admin.company.getList';
    protected $path='admin.module.company.';
    protected $companiesRepository;
    public function __construct(CompaniesRepositoryInterface $companiesRepositoryInterface)
    {
        $this->companiesRepository=$companiesRepositoryInterface;
    }

    public function getList(){
        $data=$this->companiesRepository->getAll();
        return view($this->path.'list',compact('data'));
    }

    public function getAdd(){
        return view($this->path.'add');
    }

    public function postAdd(CompaniesRequest $request){
        $input=$request->only('name','tel','address','fax','status');
        $input['alias']=changeTitle($request->name);
        $input['admin_id']='1';
        $this->companiesRepository->create($input);
        return redirect()->route($this->route)->with(['success'=>'Thêm mới thành công!']);
    }
    public function getEdit($id){
        $data=$this->companiesRepository->getById($id);
        return view($this->path.'edit',compact('data'));
    }

    public function postEdit(CompaniesRequest $request,$id){
        $input=$request->only('name','address','tel','fax','status');
        $input['alias']=changeTitle($request->name);
        $input['admin_id']='1';
        $this->companiesRepository->update($id,$input);
        return redirect()->route($this->route)->with(['success' => 'Cập nhật thành công']);
    }

    public function delete(){

    }
}
