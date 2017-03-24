<?php
/**
 * Created by PhpStorm.
 * User: yaphe
 * Date: 2/20/2017
 * Time: 12:48 AM
 */
namespace App\Repositories\GroupProduct;
use App\Models\GroupProduct;
use App\Models\Company;
class GroupProductRepository implements GroupProductRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    protected $groupProduct;
    protected $company;
    /**
     * Get all posts only published
     * @return mixed
     */
    public function __construct(GroupProduct $groupProduct,Company $company)
    {
        $this->groupProduct = $groupProduct;
        $this->company =$company;
    }

    public function getAll()
    {
        return $this->groupProduct->all();
    }

    /**
     * Get post only published
     * @param $id int Post ID
     * @return mixed
     */
    public function getById($id)
    {
        //
        return $this->groupProduct->find($id);
    }

    public function paginate($num)
    {
       return $this->groupProduct->paginate($num);
    }

    public function create(array $attributes)
    {
        return $this->groupProduct->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $data=$this->groupProduct->find($id);
        return $data->update($attributes);
    }

    public function delete($id)
    {
        return $this->getById($id)->delete();
        return true;
    }

    public function getCompany()
    {
        return $this->company->all();
    }

    public function checkName($name)
    {
       return $this->groupProduct->where('name',$name)->count();
    }
}