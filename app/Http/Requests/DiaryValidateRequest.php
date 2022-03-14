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
            'diary_date' => ['bail', 'required', 'regex:/^[0-9]{4}-[0-9]{2}-[0-9]{1,2}$/'],
            'user_id' => ['bail', 'required', 'integer'],
            'title' => ['required', 'max:20'],
            'select' => ['bail', 'required', 'regex:/^[1-3]{1}$/'],
            'content' => ['required', 'max:1000'],
            /* 'set_day' => ['required', 'regex:/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/'] */
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
            'content' => '本文',
            /* 'tag_title' => 'タイトル', */
            /* 'set_day' => '日付' */
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
            'content.max' => ':attributeは1000文字以内で入力してください。',
            /* 'set_day.required' => ':attributeを入力してください。',
            'set_day.regex' => ':attributeを入力してください。', */
        ];
    }
}
