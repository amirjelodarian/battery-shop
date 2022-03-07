<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'company'            => 'required|min:2|max:255',
            'brand'              => 'required|min:2|max:255',
            'type'               => 'required|min:2|max:255',
            'for_what'           => 'required|min:2|max:255',
            'warranty'           => 'required|min:2|max:255',
            'title'              => 'required|min:2|max:255',
            'price'              => 'required|min:2|max:255',
            'category.*'         => 'required|min:2|max:255',
            'product_image'      => 'required_if:product_image_name,==,null|mimes:jpeg,jpg,png|max:2048',
            'product_image_name' => 'required_if:product_image,==,null|exists:product_photos,name',
        ];
    }
}
