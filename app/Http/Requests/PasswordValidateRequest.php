<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordValidateRequest extends FormRequest
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
            'current_password' => ['required', 'string', 'min:8'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
            'date' => ['required', 'date_format:Y-m-d'],
        ];
    }

    /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'current_password' => '現在のパスワード',
            'new_password' => '新しいパスワード',
        ];
    }

    /**
     * バリデーションメッセージ
     * @return array
     */
    public function messages()
    {
        return [
            'current_password.required' => ':attributeが正しくありません',
            'current_password.string' => ':attributeが正しくありません',
            'current_password.min' => ':attributeが正しくありません',
            'new_password.required' => ':attributeを入力してください',
            'new_password.min' => ':attributeは8文字以上で入力してください',
            'new_password.confirmed' => ':attributeが一致しません。',
        ];
    }

    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $auth = Auth::user();

            if (!(Hash::check($this->input('current_password'), $auth->password))) {
                $validator->errors()->add('current_password', 'パスワードが間違っています。');
            }
        });
    }
}
