<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagValidateRequest extends FormRequest
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
            'tag-title' => ['required', 'max:10'],
            'tag-setday' => ['required', 'date_format:Y-m-d']
        ];
    }
    /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'tag1-title' => 'タイトル',
            'tag1-setday' => '日付'
        ];
    }

    /**
     * バリデーションメッセージ
     * @return array
     */
    public function messages()
    {
        return [
            'tag1-title.required' => ':attributeを入力してください。',
            'tag1-title.max' => ':attributeは10文字以下で入力してください。',
            'tag1-setday.required' => ':attributeを入力してください。',
            'tag1-setday.date_format' => ':attributeを入力してください。'
        ];
    }
}
