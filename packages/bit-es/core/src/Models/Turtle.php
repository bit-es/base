<?php

namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Turtle extends Model
{
    use \Bites\Core\Traits\HasCategories, \Bites\Core\Traits\HasClassStructuredAttributes;

    protected $table = 'c_turtles';

    protected $guarded = [];

    public function orgUnit()
    {
        return $this->belongsTo(OrgUnit::class);
    }

    public function supplier()
    {
        return $this->belongsTo(OrgRole::class, 'supplier_id');
    }

    public function customer()
    {
        return $this->belongsTo(OrgRole::class, 'customer_id');
    }

    public function orgRole()
    {
        return $this->belongsTo(OrgRole::class, 'org_role_id');
    }

    public function sop()
    {
        return $this->belongsTo(Document::class, 'sop_id');
    }

    public function wi()
    {
        return $this->belongsTo(Document::class, 'wi_id');
    }

    public function form()
    {
        return $this->belongsTo(Document::class, 'form_id');
    }

    public function workflows()
    {
        return $this->hasMany(Workflow::class, 'turtle_id');
    }

    public static function resolveAndCreate(array $data): self
    {

        $data['org_unit_id'] = ! empty($data['org_unit']) ? OrgUnit::firstOrCreate(['name' => $data['org_unit']], ['description' => 'created from Turtle:'.$data['code'].' - '.$data['name']])->id : null;
        $data['supplier_id'] = ! empty($data['supplier']) ? OrgRole::firstOrCreate(['name' => $data['supplier']], ['description' => 'created from Turtle:'.$data['code'].' - '.$data['name']])->id : null;
        $data['customer_id'] = ! empty($data['customer']) ? OrgRole::firstOrCreate(['name' => $data['customer']], ['description' => 'created from Turtle:'.$data['code'].' - '.$data['name']])->id : null;
        $data['org_role_id'] = ! empty($data['org_role']) ? OrgRole::firstOrCreate(['name' => $data['org_role']], ['description' => 'created from Turtle:'.$data['code'].' - '.$data['name']])->id : null;

        $data['sop_id'] = ! empty($data['sop']) ? Document::firstOrCreate(['code' => $data['sop']], ['title' => $data['sop'], 'type' => 'SOP'])->id : null;
        $data['wi_id'] = ! empty($data['wi']) ? Document::firstOrCreate(['code' => $data['wi']], ['title' => $data['wi'], 'type' => 'WI'])->id : null;
        $data['form_id'] = ! empty($data['form']) ? Document::firstOrCreate(['code' => $data['form']], ['title' => $data['form'], 'type' => 'FORM'])->id : null;

        $categoryData = $data['category'] ?? null;
        unset($data['org_unit'], $data['supplier'], $data['customer'], $data['org_role'], $data['sop'], $data['wi'], $data['form'], $data['category'], $data['categories']); // Clean up

        $turtle = self::create($data); // Create Turtle
        if ($categoryData) {
            $turtle->addCategoryFromJson(['category' => $categoryData]);
        } // Attach category if present

        return $turtle;
    }
}
