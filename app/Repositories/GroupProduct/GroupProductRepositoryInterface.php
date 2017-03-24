<?php
/**
 * Created by PhpStorm.
 * User: yaphe
 * Date: 2/20/2017
 * Time: 12:48 AM
 */
namespace App\Repositories\GroupProduct;


use App\Repositories\RepositoryInterface;

interface  GroupProductRepositoryInterface extends RepositoryInterface
{

    public function paginate($num);
    public function getCompany();
    public function checkName($name);
}