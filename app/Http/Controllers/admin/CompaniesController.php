<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Companies\StoreRequest;
use App\Http\Requests\Companies\UpdateRequest;
use App\Models\Company;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $resources = Company::all();
        return view('dashboard.admin.companies.list', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('dashboard.admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $resource = new Company();
        $resource->create($request->all());
        $request->session()->flash('message', 'Successfully created resource');
        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        $resource = Company::find($id);
        return view('dashboard.admin.companies.show', ['resource' => $resource]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $resource = Company::find($id);
        return view('dashboard.admin.companies.edit', ['resource' => $resource]);
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
        $resource = Company::find($id);
        $resource->update($request->all());
        $request->session()->flash('message', 'Successfully edited resource');
        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $resource = Company::find($id);
        if ($resource) {
            $resource->delete();
        }
        return redirect()->route('companies.index');
    }
}
