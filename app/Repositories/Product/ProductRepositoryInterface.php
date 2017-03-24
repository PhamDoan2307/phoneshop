<?php

/**
 * Created by PhpStorm.
 * User: yaphe
 * Date: 3/3/2017
 * Time: 12:18 PM
 */
namespace App\Repositories\Product;

use App\Repositories\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
//    lấy dữ liệu từ group product
    public function getGroup();

//    lấy dữ liệu từ bảng màu sắc
    public function getColor();

//    lưu id của màu,điện thoại vào bảng trung gian colorProduct
    public function addColor(array $attribute);

//    Sửa bảng colorProduct theo id điện thoại
    public function updateColor(array $attribute, $id);

//    thêm các ảnh thuộc điện thoại vào bảng productImages
    public function addImage(array $attribute);

//    Sửa các ảnh thuộc điện thoại theo id của đt đó
    public function updateImage($id, array $attribute);

//    Tìm kiếm các ảnh của điện thoại theo id của đt
    public function findImage($id);

//    Tìm kiếm màu sắc theo id của điện thoại trong bảng colorProduct
    public function getColorByID($id);

//    tìm kiếm id của ảnh để xóa ảnh
    public function getImage($id);

//    tìm kiếm màu sắc theo id của color
    public function findColor($id);

    public function getNameGroup($group_id);


}