<?php

/**
 * Created by PhpStorm.
 * User: yaphe
 * Date: 2/20/2017
 * Time: 11:22 AM
 */
namespace App\Repositories;
interface RepositoryInterface
{
    public function getAll();

    /**
     * Get post only published
     * @return mixed
     */
    public function getById($id);

    public function create(array $attributes);

    public function update($id, array $attributes);

    public function delete($id);
}