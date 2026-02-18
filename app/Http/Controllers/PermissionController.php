<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function getRouteActions()
    {
        $routes = Route::getRoutes();
        $actions = [];

        foreach ($routes as $route) {
            $name = $route->getName();

            if ($name && $name !== 'login' && $name !== 'getRouteActions' && $name !== 'login' && $name !== 'logout') {
                $actions[] = $name;

                Permission::Create([
                    'name' => $name
                ]);
            }
        }
    }

}
