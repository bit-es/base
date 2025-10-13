<?php

namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Workflow extends Model
{
    use \Bites\Core\Traits\BitesModel, \Bites\Core\Traits\HasCategories;
    
    protected $table = 'c_workflows';
    protected $guarded = [];
    
    public function turtle() { return $this->belongsTo(Turtle::class, 'id'); }

    public function states() { return $this->hasMany(WorkflowState::class); }
    public function transitions() { return $this->hasMany(WorkflowTransition::class); }
    public function requests() { return $this->hasMany(Request::class); }
    public static function resolveAndCreate(array $data): self
    {
        $categoryData = $data['category'] ?? null;
        unset($data['category']); // Clean up

        $workflow = self::create($data); // Create Turtle
        if ($categoryData) {
            $workflow->addCategoryFromJson(['category' => $categoryData]);
        } // Attach category if present

        return $workflow;
    }
}









































































