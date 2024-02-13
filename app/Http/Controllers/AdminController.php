<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\Screening;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $customers;
    protected $screenings;
    public function __construct()
    {
        $this->customers = new Customer();
        $this->screenings = new Screening();
    }
    public function index()
    {
        $screenings = $this->screenings->get();
        return view('admin.dashboard', compact([
            'screenings'
        ]));
    }
    public function storeData(Request $request){
        try{
            $this->customers->create([
                'nik' => $request->nik,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'birth_date' => $request->birth_date,
                'full_address' => $request->full_address,
                'full_address' => $request->full_address,
                'created_by' => 'xxx',
                'screening_id' => $request->screening_id,
                'status' => 'waiting'
            ]);
            return 'Berhasil';
        }catch(Exception $error){
            return $error;
        }
    }
    public function getData(){
        try{
            $customers = $this->customers->selectRaw('customers._id,nik,first_name,last_name,birth_date,full_address,customers.status, screenings.name')
                    ->join('screenings', 'customers.screening_id', 'screenings._id')->get();
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil mendapatkan data',
                'data' => $customers
            ],200);
        }catch(Exception $error){
            return response()->json([
                'status' => 'success',
                'message' => $error
            ],500);
        }
    }
}