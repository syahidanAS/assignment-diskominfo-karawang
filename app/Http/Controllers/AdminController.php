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
            if(!$request->_id){
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
                return response()->json([
                    'status' => 'success',
                    'message' => 'Berhasil menyimpan data',
                ],201);
            }else{
                $this->customers->where('_id', $request->_id)->update([
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
                return response()->json([
                    'status' => 'success',
                    'message' => 'Berhasil mengubah data',
                ],201);
            }


        }catch(Exception $error){
            return response()->json([
                'status' => 'success',
                'message' => 'Terjadi kesalahan!',
            ],500);
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

    public function getDataById($id){
        try{
            $response = $this->customers->where('_id', $id)->first();
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil mendapatkan data',
                'data' => $response
            ],200);
        }catch(Exception $error){
            return response()->json([
                'status' => 'success',
                'message' => 'Terjadi kesalahan!',
            ],500);
        }
    }
}
