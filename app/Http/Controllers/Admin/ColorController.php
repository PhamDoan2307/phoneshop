<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ColorRequest;
use App\Repositories\Color\ColorRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    //
    protected $path='admin.module.color.';
    protected $color;

    public function __construct(ColorRepositoryInterface $colorRepository)
    {
        $this->color = $colorRepository;
    }

    public function getList()
    {
        $data = $this->color->getAll();
        return view(''.$this->path.'list', compact('data'));
    }

    public function getAdd()
    {
        return view(''.$this->path.'add');
    }

    public function postAdd(ColorRequest $request)
    {
        $input=$request->all();
//        print_r($input);
        $input['admin_id']='1';
        $this->color->create($input);
        return redirect()->route('admin.color.getList')->with(['success' =>'Thêm mới thành công']);
    }

    public function getEdit($id)
    {
        $data=$this->color->getById($id);
        return view(''.$this->path.'edit',compact('data'));

    }

    public function postEdit(ColorRequest $request,$id)
    {
        $input=$request->only('color','price','status');
        $input['admin_id']='1';
        $this->color->update($id,$input);
        return redirect()->route('admin.color.getList')->with(['success' =>'Sửa thành công']);
    }

    public function delete(){

    }

}
