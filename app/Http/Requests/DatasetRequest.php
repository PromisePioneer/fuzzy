<?php

namespace App\Http\Requests;

use App\Models\Dataset;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DatasetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required'],
            'pendapatan_ortu' => ['required', 'numeric'],
            'tanggungan_ortu' => ['required', 'numeric'],
            'jumlah_prestasi' => ['required', 'numeric'],
            'nilai_raport' => ['required', 'numeric'],
            'nilai_essay' => ['required', 'numeric'],
        ];
    }
}
