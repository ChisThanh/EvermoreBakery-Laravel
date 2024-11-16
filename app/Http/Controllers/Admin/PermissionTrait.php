<?php
namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

trait PermissionTrait
{
	public function checkPermission()
	{
		$user = backpack_auth()->user();
		if (!$user->hasPermission('all-create')) {
			CRUD::denyAccess('create');
		}
		if (!$user->hasPermission('all-update')) {
			CRUD::denyAccess('update');
		}
		if (!$user->hasPermission('all-delete')) {
			CRUD::denyAccess('delete');
		}
	}
}