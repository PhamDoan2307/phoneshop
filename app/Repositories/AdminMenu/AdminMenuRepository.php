<?php
/**
 * Created by PhpStorm.
 * User: yaphe
 * Date: 3/7/2017
 * Time: 11:17 AM
 */
namespace App\Repositories\AdminMenu;

use App\Models\AdminMenu;

class AdminMenuRepository implements AdminMenuRepositoryInterFace
{

    protected $AdminMenu;

    public function __construct(AdminMenu $adminMenu)
    {
        $this->AdminMenu = $adminMenu;
    }

    public function getAll()
    {
       return $this->AdminMenu->all();
    }

    /**
     * Get post only published
     * @return mixed
     */
    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public function create(array $attributes)
    {
        return $this->AdminMenu->create($attributes);
    }

    public function update($id, array $attributes)
    {
        return $this->AdminMenu->findOrFail($id)->update($attributes);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}