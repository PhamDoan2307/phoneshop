<?php
/**
 * Created by PhpStorm.
 * User: yaphe
 * Date: 2/20/2017
 * Time: 12:48 AM
 */
namespace App\Repositories\Color;
use App\Models\Color;

class ColorRepository implements ColorRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    protected $color;

    /**
     * Get all posts only published
     * @return mixed
     */
    public function __construct(Color $color)
    {
        $this->color = $color;
    }

    public function getAll()
    {
        return $this->color->all();
    }

    /**
     * Get post only published
     * @param $id int Post ID
     * @return mixed
     */
    public function getById($id)
    {
        //
        return $this->color->find($id);
    }

    public function create(array $attributes)
    {
        return $this->color->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $data=$this->getById($id);
        return $data->update($attributes);
    }

    public function delete($id)
    {
        return $this->getById($id)->delete();
        return true;
    }
}