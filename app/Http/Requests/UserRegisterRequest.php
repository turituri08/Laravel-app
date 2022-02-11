<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 現在認証されているユーザーからのリクエストによって表されるアクションを実行できるか判定
        // ここではリクエスト先のパス情報、つまり呼び出されるアクションがstoreかどうか確認
        if($this->path() === "user/register/store"){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email:rfc,dns'],
            'first_name' => ['required', 'max:20', 'zenkaku'],
            'last_name' => ['required', 'max:20', 'zenkaku'],
            'password' => ['required', 'confirmed', 'min:8', 'max:24'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'メールアドレスは必須入力です',
            'email.email' => '正しい形式で入力してください',
            'first_name.required' => '性は必須入力です',
            'first_name.max' => '20文字以内で入力してください',
            'first_name.zenkaku' => '全角文字で入力してください',
            'last_name.required' => '名は必須入力です',
            'last_name.max' => '20文字以内で入力してください',
            'last_name.zenkaku' => '全角文字で入力してください',
            'password.required' => 'パスワードは必須入力です',
            'password.comfirmed' => '確認用に入力されたパスワードと一致しません',
            'password.min' => '8文字以上で入力してください',
            'password.max' => '24文字以内で入力してください'
        ];
    }
}
