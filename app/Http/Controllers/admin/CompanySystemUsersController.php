<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CompanySystems;
use App\Models\CompanySystemUsers;
use App\Models\Users;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanySystemUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(int $company_system_id)
    {
        $resources = CompanySystemUsers::with('user')->where('company_system_id', '=', $company_system_id)->get();
        return view('dashboard.admin.company_systems_users.list', compact('resources', 'company_system_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(int $company_system_id)
    {
        $company_system = CompanySystems::find($company_system_id);
        $company_id = $company_system->company_id;
        $users = Users::whereCompanyId($company_id)->get();
        $resources = CompanySystemUsers::where('company_system_id', '=', $company_system_id)->get();
        return view('dashboard.admin.company_systems_users.create', compact('resources', 'users', 'company_system_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param int $company_system_id
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(int $company_system_id, Request $request): RedirectResponse
    {
        $resource = new CompanySystemUsers();
        $resource->create(array_merge(['company_system_id' => $company_system_id], $request->all()));
        $request->session()->flash('message', 'Successfully created resource');
        return redirect()->route('company.system.users.index', $company_system_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $company_system_id
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $company_system_id, int $id)
    {
        $resource = CompanySystemUsers::with('user')->find($id);
        return view('dashboard.admin.company_systems_users.edit', ['resource' => $resource, 'company_system_id' => $company_system_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $company_system_id
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $company_system_id, int $id): RedirectResponse
    {
        $resource = CompanySystemUsers::find($id);
        $resource->update($request->only(['username', 'password']));
        $request->session()->flash('message', 'Successfully edited resource');
        return redirect()->route('company.system.users.index', $company_system_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $company_systems_users, int $id)
    {
        $resource = CompanySystemUsers::find($id);
        if ($resource) {
            $resource->delete();
        }
        return redirect()->route('company.system.users.index', $company_systems_users);
    }
}
