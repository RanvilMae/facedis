<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use DataTables;
class StudentController extends Controller
{
   
    public function index()
    {
        if(\request()->ajax()){
            $data = Product::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('products.index');
    }
}