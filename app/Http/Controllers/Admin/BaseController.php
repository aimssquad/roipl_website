<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class BaseController extends Controller
{
    protected $breadcrumbs = [];
    protected $entity = '';  // Entity like Role, City, Permission, etc.

    public function __construct($entity = 'Dashboard')
    {
        $this->entity = $entity;

        // Default breadcrumb: Home link
        $this->addBreadcrumb('Home', route('admin.dashboard'));

        // Add the breadcrumb for the current entity
        $this->addBreadcrumb($this->entity);

        // Automatically detect the current action and set breadcrumbs dynamically
        $this->setBreadcrumbBasedOnAction();
    }

    // Method to add a breadcrumb
    protected function addBreadcrumb($name, $url = '#')
    {
        $this->breadcrumbs[] = ['name' => $name, 'url' => $url];
    }

    // Automatically set breadcrumbs based on the action
    protected function setBreadcrumbBasedOnAction()
    {
        $routeName = Route::currentRouteName(); // Get the current route name

        switch ($routeName) {
            case "admin.roles.index":
                $this->addBreadcrumb("Manage {$this->entity}", route("admin.roles.index"));
                break;

            case "admin.roles.create":
                $this->addBreadcrumb("Create {$this->entity}", route("admin.roles.create"));
                break;

            case "admin.roles.edit":
                $this->addBreadcrumb("Edit {$this->entity}", route("admin.roles.edit", request('role')));
                break;

            default:
                break;
        }

        // Share breadcrumbs with the views
        $this->shareBreadcrumbsWithView();
    }

    // Method to share breadcrumbs with views
    protected function shareBreadcrumbsWithView()
    {
        view()->share('breadcrumbs', $this->breadcrumbs);
    }
}
