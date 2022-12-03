<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Systems\StoreRequest;
use App\Http\Requests\Systems\UpdateRequest;
use App\Models\System;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SystemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $resources = System::all();
        return view('dashboard.admin.systems.list', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('dashboard.admin.systems.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $resource = new System();
        $resource->create($request->all());
        $request->session()->flash('message', 'Successfully created resource');
        return redirect()->route('systems.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        $resource = System::find($id);
        return view('dashboard.admin.systems.show', ['resource' => $resource]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $resource = System::find($id);
        return view('dashboard.admin.systems.edit', ['resource' => $resource]);
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
        $resource = System::find($id);
        $resource->update($request->all());
        $request->session()->flash('message', 'Successfully edited resource');
        return redirect()->route('systems.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $resource = System::find($id);
        if ($resource) {
            $resource->delete();
        }
        return redirect()->route('systems.index');
    }
}
