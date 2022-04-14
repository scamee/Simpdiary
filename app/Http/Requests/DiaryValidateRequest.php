<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaryValidateRequest extends FormRequest
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
            'diary_date' => ['bail', 'required', 'date_format:Y-m-d'],
            'title' => ['required', 'max:20'],
            'select' => ['bail', 'required', 'regex:/^[1-3]{1}$/'],
            'content' => ['required', 'max:1000'],
            'diary_img' => ['file', 'image', 'mimes:png,jpeg']
        ];
    }

    /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'select' => '体調',
            'content' => '本文'
        ];
    }

    /**
     * バリデーションメッセージ
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => ':attributeを入力してください。',
            'title.max' => ':attributeは20文字以下で入力してください。',
            'select.required' => ':attributeを選択してください。',
            'select.regex' => ':attributeを正しく選択してください。',
            'content.required' => ':attributeを入力してください。',
            'content.max' => ':attributeは1000文字以内で入力してください。'
        ];
    }
}
