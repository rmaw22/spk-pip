<?php

namespace App\Http\Requests\Siswa;

use App\Http\Requests\Request;

class StoreRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nis' => 'unique:students|regex:/^[0-9]{8}+$/',
            'nama' => 'min:2|regex:/^[a-z A-Z]+$/',
            'tempat_lahir' => 'min:2|regex:/^[a-zA-Z]+$/',
            'phone' => 'min:6|regex:/^[0-9+]+$/',
        ];

    }

    public function messages()
    {
        return [
            'nis.unique' => 'NIS Sudah Digunakan',
            'nis.regex' => 'Hanya Boleh 8 Digit Angka Dibelakangnya',
            'nama.min' => 'Minimal Menggunakan 2 Karakter',
            'nama.regex' => 'Hanya Boleh Menggunakan Huruf Besar/Kecil/Tombol Space',
            'tempat_lahir.min' => 'Minimal Menggunakan 2 Karakter',
            'tempat_lahir.regex' => 'Hanya Boleh Menggunakan Huruf Besar/Kecil',
            'phone.min' => 'Minimal Menggunakan 6 Karakter',
            'phone.regex' => 'Hanya Boleh Menggunakan Huruf Besar/Kecil/Tanda +',
        ];
    }
}
