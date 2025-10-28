<?php

namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class Menu extends Model
{
    use HasRoles;

    protected $guard_name = 'web';

    protected $fillable = [
        'category',
        'title',
        'icon',
        'icon_type',
        'description',
        'internal_link',
        'external_link',
        'is_active',
    ];

    protected $attributes = [
        'is_active' => false,
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'menu_role');
    }

    // Scope to filter menus based on user's roles
    public function scopeVisibleToUser($query, $user)
    {
        $roleNames = $user->roles->pluck('name');

        return $query->whereHas('roles', fn ($q) => $q->whereIn('name', $roleNames));
    }

    public static function resolveAndCreate(array $data): self
    {
        $roleNames = $data['roles'] ?? null;
        unset($data['roles']); // Clean up
        $menu = self::create($data);

        if ($roleNames) {
            $menu->assignRole($roleNames);
        } // Attach role if present

        return $menu;
    }
}
