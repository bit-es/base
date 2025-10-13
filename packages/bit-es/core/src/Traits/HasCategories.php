<?php

namespace Bites\Core\Traits;

use Bites\Core\Models\Category;

trait HasCategories
{
    /**
     * Get all categories associated with the model.
     */
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function addCategory(Category $category): void
    {
        $this->categories()->attach($category);
    }

    public function removeCategory(Category $category): void
    {
        $this->categories()->detach($category);
    }

    public function syncCategories(array $categoryIds): void
    {
        $this->categories()->sync($categoryIds);
    }

    public function addCategoryFromJson(array $data): void
    {
        $categoryData = $data['category'] ?? null;
        // dump($categoryData);
        if ($categoryData && isset($categoryData['name'])) {
            $category = Category::resolveAndCreate($categoryData);
            $this->addCategory($category);
        }
    }
}
