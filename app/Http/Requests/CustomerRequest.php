<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'nik' => 'required|unique:customers',
            'birth_date' => 'required',
            'full_address' => 'required',
        ];
    }
    public function message()
    {
        return [
            'first_name.required' => 'Nama awal harus diisi',
            'last_name.required' => 'Nama akhir harus diisi',
            'nik.required' => 'NIK Harus diisi',
            'nik.unique' => 'NIK sudah digunakan',
            'birth_date.required' => 'Tanggal lahir harus diisi',
            'full_address.required' => 'Alamat Lengkap harus diisi',
        ];
    }
}
