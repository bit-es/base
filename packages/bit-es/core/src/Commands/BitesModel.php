<?php

namespace Bites\Core\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BitesModel extends Command
{
    protected $signature = 'bites:model {name} {space}';

    protected $description = 'Create a model with BitesModel trait, policy, Filament resource, and permissions';

    protected function generateFromStub(string $stubPath, array $replacements): string
    {
        $stub = File::get($stubPath);
        foreach ($replacements as $key => $value) {
            $stub = str_replace("{{ {$key} }}", $value, $stub);
        }

        return $stub;
    }

    public function handle()
    {
        $name = Str::studly($this->argument('name'));
        $space = trim($this->argument('space'), '/\\');
        $spacePath = str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $space);
        $spaceNamespace = str_replace(DIRECTORY_SEPARATOR, '\\', $spacePath);

        $isPackage = Str::startsWith($spacePath, 'packages'.DIRECTORY_SEPARATOR);
        $basePath = $isPackage ? base_path() : app_path();
        dump($name, $space, $spacePath, $spaceNamespace, $isPackage, $basePath);
        dump(base_path('stubs/bites-model.stub'));
        // Paths
        $modelPath = "{$basePath}/Models/{$spacePath}/{$name}.php";
        $policyPath = "{$basePath}/Policies/{$spacePath}/{$name}Policy.php";
        $resourcePath = "{$basePath}/Filament/Resources/{$spacePath}/{$name}Resource.php";
        $pagesPath = "{$basePath}/Filament/Resources/{$spacePath}/{$name}/Pages";
        dd($modelPath, $policyPath, $resourcePath, $pagesPath);
        // Ensure directories
        File::ensureDirectoryExists(dirname($modelPath));
        File::ensureDirectoryExists(dirname($policyPath));
        File::ensureDirectoryExists(dirname($resourcePath));
        File::ensureDirectoryExists($pagesPath);

        // Create Model
        if (! File::exists($modelPath)) {
            $modelContent = $this->generateFromStub(resource_path('stubs/bites-model.stub'), [
                'name' => $name,
                'namespace' => "App\\Models\\{$spaceNamespace}",
            ]);
            File::put($modelPath, $modelContent);
            $this->info("Model {$name} created.");
        } else {
            $this->warn("Model {$name} already exists.");
        }

        // Create Policy
        if (! File::exists($policyPath)) {
            $policyContent = $this->generateFromStub(resource_path('stubs/bites-policy.stub'), [
                'name' => $name,
                'namespace' => "App\\Policies\\{$spaceNamespace}",
            ]);
            File::put($policyPath, $policyContent);
            $this->info("Policy {$name}Policy created.");
        } else {
            $this->warn("Policy {$name}Policy already exists.");
        }

        // Create Filament Resource
        $formSchema = File::get(resource_path('stubs/filament/form-schema.stub'));
        $tableSchema = File::get(resource_path('stubs/filament/table-schema.stub'));

        $resourceContent = $this->generateFromStub(resource_path('stubs/filament/resource.stub'), [
            'model' => $name,
            'namespace' => "App\\Filament\\Resources\\{$spaceNamespace}",
            'formSchema' => trim($formSchema),
            'tableSchema' => trim($tableSchema),
        ]);
        File::put($resourcePath, $resourceContent);
        $this->info("Filament resource {$name}Resource created.");

        // Create Pages
        foreach (['create-page', 'edit-page', 'list-page'] as $type) {
            $stubPath = resource_path("stubs/filament/{$type}.stub");
            $pageName = ucfirst(Str::before($type, '-')).$name;
            $pageContent = $this->generateFromStub($stubPath, [
                'model' => $name,
                'namespace' => "App\\Filament\\Resources\\{$spaceNamespace}\\{$name}\\Pages",
            ]);
            File::put("{$pagesPath}/{$pageName}.php", $pageContent);
            $this->info("Page {$pageName} created.");
        }

        // Create Spatie Permissions
        try {
            $abilities = ['viewAny', 'view', 'create', 'update', 'delete', 'restore', 'forceDelete'];
            foreach ($abilities as $ability) {
                \Spatie\Permission\Models\Permission::findOrCreate("{$ability} {$name}");
            }
            $this->info("Spatie permissions created for {$name}.");
        } catch (\Exception $e) {
            $this->error('Failed to create permissions: '.$e->getMessage());
        }
    }
}
