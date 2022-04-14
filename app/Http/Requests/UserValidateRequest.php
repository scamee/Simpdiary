<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserValidateRequest extends FormRequest
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
            'username' => ['required', 'max:10'],
            'date' => ['required', 'date_format:Y-m-d'],
            'birthday' => ['nullable', 'date_format:Y-m-d'],
            'hobby' => ['max:10'],
            'dream' => ['max:10'],
            'wanted' => ['max:10'],
        ];
    }

    /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'username' => 'ユーザー名',
            'birthday' => '誕生日',
            'hobby' => '趣味・特技',
            'dream' => '将来の夢',
            'wanted' => '欲しいもの',
        ];
    }

    /**
     * バリデーションメッセージ
     * @return array
     */
    public function messages()
    {
        return [
            'username.max' => ':attributeは10文字以内で入力してください。',
            'birthday.date_format' => ':attributeは正しく入力してください',
            'hobby.max' => ':attributeは10文字以内で入力してください',
            'dream.max' => ':attributeは10文字以内で入力してください',
            'wanted.max' => ':attributeは10文字以内で入力してください',
        ];
    }
}
