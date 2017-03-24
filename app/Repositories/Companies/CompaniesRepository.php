<?php

/**
 * Created by PhpStorm.
 * User: yaphe
 * Date: 2/28/2017
 * Time: 10:27 PM
 */
namespace App\Repositories\Companies;

use App\Models\Company;

class CompaniesRepository implements CompaniesRepositoryInterface
{
    protected $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function getAll()
    {
       return $this->company->all();
    }

    /**
     * Get post only published
     * @return mixed
     */
    public function getById($id)
    {
        return $this->company->findOrFail($id);
    }

    public function create(array $attributes)
    {
        return $this->company->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $input=$this->getById($id);
        return $input->update($attributes);
    }

    public function delete($id)
    {
        $input=$this->getById($id);
        $input->delete();
        return true;
    }
}