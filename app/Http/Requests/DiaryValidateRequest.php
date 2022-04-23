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
            'status' => ['required', 'regex:/^[1-2]{1}$/'],
            'health_id' => ['required'],
            'mood_id' => ['required'],
            'weather_id' => ['required'],
            'content' => ['required', 'max:500'],
            'diary_imgs.*' => ['image', 'max:10000', 'mimes:png,jpeg']
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
            'health_id' => '体調',
            'mood_id' => '気分',
            'weather_id' => '天気',
            'content' => '本文',
            'diary_imgs.*' => '画像',
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
            'health_id.required' => ':attributeを選択してください。',
            'health_id.regex' => ':attributeを正しく選択してください。',
            'mood_id.required' => ':attributeを選択してください。',
            'weather_id.required' => ':attributeを選択してください。',
            'content.required' => ':attributeを入力してください。',
            'content.max' => ':attributeは500文字以内で入力してください。'
        ];
    }
}
