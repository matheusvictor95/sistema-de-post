<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdatePost extends FormRequest
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

    public function rules()
    {
        $id = $this->segment(2);

        $rules = [
            'title' => [
                'required',
                'min:3',
                'max:160',
                //'unique:posts',
                Rule::unique('posts')->ignore($id),
            ],
            'content' => ['nullable', 'min:5', 'max:100000'],
            'image' => ['required', 'image']
        ];

        if ($this->method ()== 'PUT') {
            $rules['image'] = ['nullable', 'image'];
        }
        return $rules;
    }

    public function messages(){
return trans('validation');
    }
}
