<?php

namespace App\Observers;

use App\Models\BlogCategory as BlogCategoryAlias;
use Illuminate\Support\Str;

class BlogCategoryObserver
{
    /**
     * Handle the blog category "created" event.
     *
     * @param BlogCategoryAlias $blogCategory
     * @return void
     */
    public function created(BlogCategoryAlias $blogCategory)
    {
        //
    }

    /**
     * @param BlogCategoryAlias $blogCategory
     */
    public function creating(BlogCategoryAlias $blogCategory)
    {
        $this->setSlug($blogCategory);
    }

    /**
     * Handle the blog category "updated" event.
     *
     * @param BlogCategoryAlias $blogCategory
     * @return void
     */
    public function updated(BlogCategoryAlias $blogCategory)
    {
        //
    }

    /**
     * Handle the blog category "updated" event.
     *
     * @param BlogCategoryAlias $blogCategory
     * @return void
     */
    public function updating(BlogCategoryAlias $blogCategory)
    {
        $this->setSlug($blogCategory);
    }
    /**
     * Handle the blog category "deleted" event.
     *
     * @param BlogCategoryAlias $blogCategory
     * @return void
     */
    public function deleted(BlogCategoryAlias $blogCategory)
    {
        //
    }

    /**
     * Handle the blog category "restored" event.
     *
     * @param BlogCategoryAlias $blogCategory
     * @return void
     */
    public function restored(BlogCategoryAlias $blogCategory)
    {
        //
    }

    /**
     * Handle the blog category "force deleted" event.
     *
     * @param BlogCategoryAlias $blogCategory
     * @return void
     */
    public function forceDeleted(BlogCategoryAlias $blogCategory)
    {
        //
    }

    /**
     * @param BlogCategoryAlias $blogCategory
     */
    protected function setSlug(BlogCategoryAlias $blogCategory)
    {
        if (empty($blogCategory->slug)) {
            $blogCategory->slug = Str::slug($blogCategory->title);
        }
    }
}
