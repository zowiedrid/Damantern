<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'username' => ['username', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'tanggallahir' => ['date'],
            'jeniskelamin' => ['string', 'max:255'],
            'alamat' => ['string', 'max:255'],
            'nohp' => ['max:20'],
            'asalinstansi' => ['string', 'max:255'],
            'jurusan' => ['string', 'max:255'],
            'semesterkelas' => ['max:20'],
            'mulaimagang' => ['date'],
            'selesaimagang' => ['date'],


        ];
    }
}
