<?php

namespace Bites\Core\Traits;

trait GetModelClasses
{
    public function resolveModelClass(string $modelName): ?string
    {
        $namespaces = array_merge(
            ['App\\Models\\'],
            $this->discoverModelNamespaces(base_path('packages/Bites'))
        );

        foreach ($namespaces as $namespace) {
            $class = $namespace.$modelName;
            if (class_exists($class)) {
                return $class;
            }
        }

        return null;
    }

    protected function discoverModelNamespaces(string $basePath): array
    {

        $namespaces = [
            'App\\Models\\',
            'Bites\\Core\\Models\\',
            'Bites\\Dms\\Models\\',
            'Bites\\Eam\\Models\\',
            'Bites\\Erp\\Models\\',
            'Bites\\Hrm\\Models\\',
            'Bites\\Lms\\Models\\',
            'Bites\\Mes\\Models\\',
            'Bites\\Qas\\Models\\',
        ];

        //         foreach (glob($basePath . '/*', GLOB_ONLYDIR) as $packagePath) {
        //             $packageName = basename($packagePath);
        //             $modelsPath = $packagePath . '/src/Models';
        // dump($modelsPath);
        //             if (is_dir($modelsPath)) {
        //                 $namespaces[] = "Bites\\{$packageName}\\Models\\";
        //             }
        //         }

        return $namespaces;
    }
}
