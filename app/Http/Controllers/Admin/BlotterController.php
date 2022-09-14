<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blotter\BlotterRequest;
use App\Models\Blotter;
use App\Services\ImageUploadService;
use Yajra\DataTables\Facades\DataTables;

class BlotterController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return DataTables::of(Blotter::all())
                   ->addIndexColumn()
                   ->addColumn('actions', function($row) {

                    $route_show = route('admin.blotters.show', $row);
                    $route_edit = route('admin.blotters.edit', $row);

                    $btn = "
                        <div class='dropdown'>
                            <a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='fas fa-ellipsis-v'></i>
                            </a>
                            <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>

                                <a class='dropdown-item' role='button' href='$route_show'>View</a>

                                <a class='dropdown-item' role='button' href='$route_edit'>Edit</a>

                                <a class='dropdown-item' role='button' onclick='c_destroy($row->id,`admin.blotters.destroy`,`.blotter_dt`)'>Delete</a>
                            </div>
                        </div> ";
    
                    return $btn;
    
                   })
                   ->rawColumns(['actions'])
                   ->make(true);
        }

        return view('admin.blotter.index');
    }

    public function store(BlotterRequest $request, ImageUploadService $service)
    {
       $blotter = Blotter::create($request->validated());

       if($request->image) 
       {
          $service->handleImageUpload(model:$blotter, images:$request->image, collection:'blotter_images', conversion_name:'card', action:'create');
       }

       return $this->res(['success' => 'Blotter Record Added Successfully']);
    }

    public function show(Blotter $blotter)
    {
        return view('admin.blotter.show', ['blotter' => $blotter->load('media')]);
    }

    public function edit(Blotter $blotter)
    {
        return view('admin.blotter.edit', ['blotter' => $blotter]);
    }

    public function update(BlotterRequest $request, Blotter $blotter, ImageUploadService $service)
    {

       $blotter->update($request->validated());

       if($request->image) 
       {
          $service->handleImageUpload(model:$blotter, images:$request->image, collection:'blotter_images', conversion_name:'card', action:'update');
       }

       return to_route('admin.blotters.index')->with('success', 'Blotter Record Updated Successfully');
    }

    public function destroy(Blotter $blotter)
    {
        $blotter->delete();

       return $this->res(['success' => 'Blotter Record Deleted Successfully']);
    }
}
