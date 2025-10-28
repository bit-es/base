<?php

namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Workflow extends Model
{
    use \Bites\Core\Traits\HasCategories, \Bites\Core\Traits\HasClassStructuredAttributes;

    protected $table = 'c_workflows';

    protected $guarded = [];

    public function turtle()
    {
        return $this->belongsTo(Turtle::class, 'id');
    }

    public function nodes()
    {
        return $this->hasMany(WorkflowState::class);
    }

    public function transitions()
    {
        return $this->hasMany(WorkflowTransition::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

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

    public function updateInitialAndFinalNodes(): void
    {
        $nodes = $this->nodes()->orderBy('sort')->get();

        foreach ($nodes as $index => $node) {
            $node->update([
                'is_initial' => $index === 0,
                'is_final' => $index === $nodes->count() - 1,
            ]);
        }
    }
}
