<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreListingFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'company' => 'required',
            'tags' => 'required',
            'location' => 'required',
            'website'=> 'required',
            'email' => 'required|email',
            'description'=> 'required',
            'logo'=>'image|mimes:jpeg,png,gif'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'The title field is required.',
            'company.required' => 'The company filed is reuired',
            'tags.required' => 'The tags feild is required',
            'location.required' => 'The location field is required',
            'website.required' => 'The website field is required',
            'email.required' => 'The email field is required',
            'description.required'=>'The job description field is required',
            'logo.image' => 'The uploaded file must be an image.',
            'logo.mimes' => 'Only JPEG, PNG, and GIF formats are allowed for the image.',
        ];
    }
}
