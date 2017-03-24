<?php
namespace App\Repositories\Product;

use App\Models\ColorProduct;
use App\Models\Color;
use App\Models\GroupProduct;
use App\Models\Product;
use App\Models\ProductImage;
use App\Repositories\Product\ProductRepositoryInterface;

/**
 * Created by PhpStorm.
 * User: yaphe
 * Date: 3/3/2017
 * Time: 12:18 PM
 */
class ProductRepository implements ProductRepositoryInterface
{
//    Tạo các biến kế thừa các models

//Kế thừa model Product
    protected $product;

//    Kế thừa model ProductGroup
    protected $group;

//    Kế thừa Model Color
    protected $color;

//    Kế thừ model ColorProduct
    protected $colorProduct;

//    Kế thừa model ProductImage
    protected $image;

//    Khởi tạo hàm khởi tạo
    public function __construct(Product $product, GroupProduct $groupProduct, Color $color, ColorProduct $colorProduct, ProductImage $productImage)
    {
        $this->product = $product;
        $this->group = $groupProduct;
        $this->color = $color;
        $this->colorProduct = $colorProduct;
        $this->image = $productImage;
    }

//    Lấy toàn bộ điện thoai
    public function getAll()
    {
        return $this->product->all();
    }

//    Tìm kiếm đt theo id
    public function getById($id)
    {
        return $this->product->findOrFail($id);
    }

//Tạo mới đt
    public function create(array $attributes)
    {
        return $this->product->create($attributes);
    }

//    Cập nhật đt
    public function update($id, array $attributes)
    {
        $data = $this->product->findOrFail($id);
        return $data->update($attributes);
    }

//Xóa đt
    public function delete($id)
    {
        return $this->product->findOrFail($id)->delete();
        return true;
    }

//  Lấy dữ liệu bảng group
    public function getGroup()
    {
        return $this->group->all();
    }

//    Lấy dữ liệu bảng color
    public function getColor()
    {
        return $this->color->where('status', '=', '1')->get();
    }

//    lấy dữ liệu bảng ProductImage theo id của các ảnh
    public function getImage($idImg)
    {
        return $this->image->findOrFail($idImg);
    }

//    Thêm mới bảng colorProduct(color_id,product_id)
    public function addColor(array $attribute)
    {
        return $this->colorProduct->create($attribute);
    }

//    Thêm mới bảng ProductImage(productId)
    public function addImage(array $attribute)
    {
        return $this->image->create($attribute);
    }

//    Ìm kiếm ảnh theo id đt
    public function findImage($id)
    {
        return $this->product->findOrFail($id)->images;
    }

//    tìm kiếm màu trong bảng colorProduct theo productId
    public function getColorByID($id)
    {
        return $this->colorProduct->where('product_id', $id)->get();
    }

//    tìm kiếm ảnh trong bảng colorProduct theo Quan hệ ánh xạ Eloquent (colors nằm trong Models Product)
    public function findColor($id)
    {
        return $this->product->findOrFail($id)->colors;
    }

//    Sửa màu bảng ColorProdcut Theo id đt
    public function updateColor(array $attribute, $id)
    {

        return $this->colorProduct->findOrFail($id)->update($attribute);
    }

//    Sửa ảnh theo id đt
    public function updateImage($id, array $attribute)
    {

        return $this->image->findOrFail($id)->update($attribute);
    }
    public function getNameGroup($group_id)
    {
        return $this->group->select('name')->where('id',$group_id)->get();
    }
}