<?php

namespace App\Repositories;

use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Model;

class BlogCategoryRepository extends CoreRepository
{
    /**
     * @return mixed|void
     */
    protected function getModelClass()
    {
        return BlogCategory::class;
    }

    /**
     * Получить модель для редактирования админки
     *
     * @param $id
     * @return mixed
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Получить список категорий для вывода в выподающем списке
     *
     * @return array|\Illuminate\Contracts\Foundation\Application[]|\Illuminate\Database\Eloquent\Collection|Model[]
     */
    public function getForComboBox()
    {
        $columns = implode(', ', [
            'id',
            'CONCAT (id, ". ", title) AS id_title',
        ]);

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;
    }

    /**
     * Получить категория для вывода пагинатора
     *
     * @param null $perPage
     * @return mixed
     */
    public function getAllWithPaginate($perPage = null)
    {
        $fields = ['id', 'title', 'parent_id'];

        $result = $this
            ->startConditions()
            ->with(['parentCategory:id,title'])
            ->paginate($perPage, $fields);

        return $result;
    }
}