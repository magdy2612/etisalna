<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanySystems\StoreRequest;
use App\Http\Requests\CompanySystems\UpdateRequest;
use App\Models\CompanySystems;
use App\Models\System;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanySystemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(int $company_id)
    {
        $resources = CompanySystems::with('system')->where('company_id', '=', $company_id)->get();
        return view('dashboard.admin.company_systems.list', compact('resources', 'company_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(int $company_id)
    {
        $systems = System::all();
        $resources = CompanySystems::where('company_id', '=', $company_id)->get();
        return view('dashboard.admin.company_systems.create', compact('resources', 'systems', 'company_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param int $company_id
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(int $company_id, Request $request): RedirectResponse
    {
        $resource = new CompanySystems();
        $resource->create(array_merge(['company_id' => $company_id], $request->all()));
        $request->session()->flash('message', 'Successfully created resource');
        return redirect()->route('company.systems.index', $company_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $company_id
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $company_id, int $id)
    {
        $resource = CompanySystems::with('system')->find($id);
        return view('dashboard.admin.company_systems.edit', ['resource' => $resource, 'company_id' => $company_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, int $id): RedirectResponse
    {
        $resource = CompanySystems::find($id);
        $resource->update($request->only(['link', 'start_date', 'end_date']));
        $request->session()->flash('message', 'Successfully edited resource');
        return redirect()->route('company.systems.index', $resource->company_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $resource = CompanySystems::find($id);
        if ($resource) {
            $resource->delete();
        }
        return redirect()->route('company.systems.index');
    }
}