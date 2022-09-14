<?php

namespace App\Http\Controllers\Admin;

use App\Models\Position;
use App\Http\Controllers\Controller;
use App\Http\Requests\Official\OfficialRequest;
use App\Models\Official;
use Yajra\DataTables\Facades\DataTables;

class OfficialController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return DataTables::of(Official::with('position')->get())
                   ->addIndexColumn()
                   ->addColumn('actions', function($row) {

                    $btn = "
                        <div class='dropdown'>
                            <a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='fas fa-ellipsis-v'></i>
                            </a>
                            <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>

                                <a class='dropdown-item' role='button' onclick='c_edit(`#m_official`, `.official_form :input`, [`#m_official_title`, `Edit official`], [`.btn_add_official`, `.btn_update_official`], $row, {rname:`admin.officials.create`, target:[`#d_positions`], column:[`name`], r_model:[$row->position]})'>Edit</a>";


                                if ($row->is_active !== 1) {
                                    $btn .= "
                                            <a class='dropdown-item' href='javascript:void(0)' 
                                            onclick='crud_activate_deactivate($row->id, `admin.officials.update` , `activate`, `.official_dt`, `Mark as Active`)'>Mark as Active</a>";
                                } else {
                                    $btn .= "
                                            <a class='dropdown-item' href='javascript:void(0)' 
                                            onclick='crud_activate_deactivate($row->id, `admin.officials.update` , `deactivate`, `.official_dt`, `Mark as Inactive`)'>Mark as Inactive</a>";
                                }


                               $btn .="<a class='dropdown-item' role='button' onclick='c_destroy($row->id,`admin.officials.destroy`,`.official_dt`)'>Delete</a>
                            </div>
                        </div> ";
    
                    return $btn;
    
                   })
                   ->rawColumns(['actions'])
                   ->make(true);
        }

        return view('admin.official.index');
    }

    public function create()
    {
        return $this->res(['results' => Position::all()]);
    }

    public function store(OfficialRequest $request)
    {
        Official::create($request->validated());

        return $this->res(['success' => 'Official Added Successfully']);
    }

  
    public function update(OfficialRequest $request, Official $official)
    {
        if($request->option)
        {
            // Activate || Deactivate User
            return $request->option == 'activate' ? $official->update(['is_active' => 1]) : $official->update(['is_active' => 0]);
        }

        $official->update($request->validated());

        return $this->res(['success' => 'Official Updated Successfully']);
    }

    public function destroy(Official $official)
    {
        $official->delete();

       return $this->res(['success' => 'Official Deleted Successfully']);
    }
}
