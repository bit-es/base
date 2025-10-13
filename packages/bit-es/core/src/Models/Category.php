<?php
namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;


class Category extends Model
{
    protected $table = 'c_categories';
    
    protected $fillable = [
        'name',
        'parent_id',
        'type',
    ];

    /**
     * Subcategories of this category.
     */
    public function sub() { return $this->hasMany(Category::class, 'parent_id'); }
    public function parent() { return $this->belongsTo(Category::class, 'parent_id'); }
    public function categorizables() { return $this->morphedByMany(Model::class, 'categorizable'); }

    public static function resolveAndCreate(array $data): self
    {
        // Create parent category
        $category = self::firstOrCreate([
            'name' => $data['name'],
            'parent_id' => $data['parent_id'] ?? null,
        ]);
        // If children exist, create them and return the first child
        if (!empty($data['sub']) && is_array($data['sub'])) {
            foreach ($data['sub'] as $childData) {
                $childData['parent_id'] = $category->id;
                return self::resolveAndCreate($childData); // Return child instead of parent
            }
        }
        return $category;
    }
}















































































