<?php

namespace App\Repositories;

use App\Models\BlogPost;

class BlogPostRepository extends CoreRepository
{
    /**
     * @return mixed|void
     */
    protected function getModelClass()
    {
        return BlogPost::class;
    }

    /**
     * Получить категория для вывода пагинатора
     *
     * @return mixed
     */
    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id',
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->with([
                'category' => function ($query) {
                    $query->select('id', 'title');
                },
                'user:id,name'])
            ->orderBy('id', 'DESC')
            ->paginate(25);

        return $result;
    }

    /**
     * @param $id
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }
}