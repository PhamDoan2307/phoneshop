<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Repositories\GroupProduct\GroupProductRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use File;
//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

//use Illuminate\Support\Facades\Request;
//use Request;

class ProductController extends Controller
{
    //
    protected $route = 'admin.product.getList';

//    Kế thừa ProductRepository
    protected $productRepository;
//    protected $groupRepository;
    protected $path = 'admin.module.product.';

    public function __construct(ProductRepositoryInterface $productRepositoryInterface)
    {
        $this->productRepository = $productRepositoryInterface;
    }

    public function showById(Request $request)
    {
        $data=$this->productRepository->getById($request->id);
//        $name_group=$this->productRepository->getNameGroup($data->group_id);
        $data['name_group']=$data->group->name;
        return Response($data);
    }
    public function getList(Request $request)
    {
//        $data1 = $this->productRepository->getById($request->id);
        $color = $this->productRepository->getColor();
        $group = $this->productRepository->getGroup();
//        $images = $this->productRepository->findImage($request->id);
//        $colorProduct = $this->productRepository->getColorByID($request->id);
        $data = $this->productRepository->getAll();
        return view($this->path . 'list', compact('data','group','color'));
    }

    public function getAdd()
    {
        $data = $this->productRepository->getGroup();
        $color = $this->productRepository->getColor();
        return view($this->path . 'add', compact('data', 'color'));
    }

    public function postAdd(ProductRequest $request)
    {

        $input = $request->only('name', 'status', 'content', 'hot', 'price');
        $input['alias'] = changeTitle($request->name);
        $input['admin_id'] = '1';
        $input['group_id'] = $request->group;
        $input['image'] = $request->file('image')->getClientOriginalName();
        $request->file('image')->move('resources/upload', $input['image']);
        $data = $this->productRepository->create($input);
        $product_id = $data->id; //Lấy id vừa tạo ra
//        Lặp request color để lấy dữ liệu
        foreach ($request->color as $color) {
            $ip['color_id'] = $color;
            $ip['product_id'] = $product_id;
            $ip['admin_id'] = '1';
            $this->productRepository->addColor($ip);
        }
        foreach ($request->file('img_detail') as $item) {
            $img['product_id'] = $product_id;
            $img['admin_id'] = '1';
            $img['name'] = $item->getClientOriginalName();
            $item->move('resources/upload/img_detail', $img['name']);
            $this->productRepository->addImage($img);
        }
        return redirect()->route($this->route)->with(['success' => 'Thêm mới thành công']);
    }

    public function getEdit($id)
    {
        $data = $this->productRepository->getById($id);
        $color = $this->productRepository->getColor();
        $group = $this->productRepository->getGroup();
        $images = $this->productRepository->findImage($id);
        $colorProduct = $this->productRepository->getColorByID($id);
//        $colorProduct
        return view($this->path . 'edit', compact('data', 'color', 'group', 'images', 'colorProduct'));
    }

    public function postDelImg(Request $request)
    {
        $idImg = $request->idImg;
        $image_detail = $this->productRepository->getImage($idImg);
        $img = 'resources/upload/img_detail/' . $image_detail->image;
        if (File::exists($img)) {
            File::delete($img);
        }
        $image_detail->delete();
        return 'oke';
    }

    public function postEdit(ProductRequest $request, $id)
    {
        $input = $request->only('name', 'status', 'content', 'price', 'hot');
        $input['admin_id'] = '1';
        if (!empty($request->file('image'))) {
            $input['image'] = $request->file('image')->getClientOriginalName();
            $request->file('image')->move('resources/upload' , $input['image']);
        }
        $input['group_id'] = $request->group;

        foreach ($request->color as $color) {
            $ip['color_id'] = $color;
            $ip['product_id'] = $id;
            $ip['admin_id'] = 1;
            $this->productRepository->addColor($ip);
        }
        if (!empty($request->file('img_detail'))) {
            foreach ($request->file('img_detail') as $item) {
                $img['product_id'] = $id;
                $img['admin_id'] = '1';
                $img['name'] = $item->getClientOriginalName();
                $item->move('resources/upload/img_detail', $img['name']);
                $this->productRepository->addImage($img);
            }
        }
        $this->productRepository->update($id, $input);
        return redirect()->route($this->route)->with(['success' => 'Cập nhật thành công!']);
    }
}
