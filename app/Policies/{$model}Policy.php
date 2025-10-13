<?php
namespace App\Policies;

use App\Models\User;

class {$model}Policy
{
    public function viewAny(User $user, string $model): bool { return $user->can("viewAny {$model}");}
    public function view(User $user, $modelInstance): bool {  $model = class_basename($modelInstance); return $user->can("view {$model}"); }
    public function create(User $user, string $model): bool { return $user->can("create {$model}"); }
    public function update(User $user, $modelInstance): bool { $model = class_basename($modelInstance); return $user->can("update {$model}"); }
    public function delete(User $user, $modelInstance): bool { $model = class_basename($modelInstance); return $user->can("delete {$model}");}
    public function restore(User $user, $modelInstance): bool { $model = class_basename($modelInstance); return $user->can("restore {$model}"); }
    public function forceDelete(User $user, $modelInstance): bool { $model = class_basename($modelInstance); return $user->can("forceDelete {$model}"); }
}





