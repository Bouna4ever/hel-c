<?php

namespace App\Http\Requests;

use App\Enums\ProfilStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreProfilRequest extends FormRequest
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
            "nom" => ["required", "string", "min:2"],
            "prenom" => ["required", "string", "min:2"],
            "image" => ["required", "mimes:jpeg,jpg,png"],
            "status" => ["required", new Enum(ProfilStatusEnum::class)],
        ];
        return [
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nom.required' => "Le nom est obligatoire et doit être minimum 2 lettres",
            'prenom.required' => "Le prénom est obligatoire et doit être minimum 2 lettres",
            'image.required' => "L'image est obligatoire et doit etre de type jpg, jpegou png",
            'status.required' => "Le status est obligatore est doit être un élément de ce groupe: (inactif, actif, en attente)",
        ];
    }
}
