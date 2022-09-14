<?php

namespace App\Http\Controllers\Resident;

use App\Models\Request;
use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServicesRequest\ServicesRequest;
use Yajra\DataTables\Facades\DataTables;

class RequestController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return DataTables::of(Request::with('service')->whereBelongsTo(auth()->user())->orderBy('status', 'DESC')->get())
                   ->addIndexColumn()
                   ->addColumn('actions', function($row) {

                    $route_show = route('resident.requests.show', $row);

                    $btn = "
                        <div class='dropdown'>
                            <a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='fas fa-ellipsis-v'></i>
                            </a>
                            <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>

                            <a class='dropdown-item' role='button' href='$route_show'>View</a>";

                                if($row->status == Request::PENDING)
                                {
                                    $btn .= "<a class='dropdown-item' role='button' onclick='c_edit(`#m_request`, `.request_form :input`, [`#m_request_title`, `Edit request`], [`.btn_add_request`, `.btn_update_request`], $row, {rname:`resident.requests.create`, target:[`#d_services`], column:[`name`], r_model:[$row->service]})'>Edit</a>

                                             <a class='dropdown-item' role='button' onclick='c_destroy($row->id,`resident.requests.destroy`,`.request_dt`)'>Delete</a>";
                                }

                            $btn .= "</div>
                        </div> ";
    
                    return $btn;
    
                   })
                   ->rawColumns(['actions'])
                   ->make(true);
        }

        return view('resident.request.index');
    }

    public function create()
    {
        return $this->res(['results' => Service::all()]);
    }

    public function store(ServicesRequest $request,)
    {
       $new_request = auth()->user()->requests()->create($request->validated());

       $this->log_activity(model:$new_request, event:'requested', model_name: 'Service', model_property_name: $new_request->service->name);

       return $this->res(['success' => 'Resident Added Successfully']);
    }

    public function show(Request $request)
    {
        return view('resident.request.show', ['request' => $request->load('service')]);
    }

    public function update(ServicesRequest $services_request, Request $request)
    {
       $request->update($services_request->validated());

       $this->log_activity(model:$request, event:'updated a requested', model_name: 'Service', model_property_name: $request->service->name);

       return $this->res(['success' => 'Request Updated Successfully']);
    }

    public function destroy(Request $request)
    {
       $this->log_activity(model:$request, event:'deleted a requested', model_name: 'Service', model_property_name: $request->service->name);

       $request->delete();

       return $this->res(['success' => 'Request Deleted Successfully']);
    }

}
