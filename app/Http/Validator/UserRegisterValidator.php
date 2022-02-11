<?php

namespace App\Http\Validator;

use Illuminate\Validation\Validator;

class UserRegisterValidator extends Validator
{
    /**
     * 全角文字列判定
     * 
     * @param string $value 判定する文字列
     * @return bool 全て全角ひらがな、全角カタカナ、漢字、全角英数字、全角アルファベットならtrue、それ以外はfalse
     */
    public function validateZenkaku($attribute, $value, $parameters)
    {
        // Unicodeマッチングパターン
        // \\x{3041}-\\x{3096} : 平仮名
        // \\x{30A1}-\\x{30F4} : カタカナ(全角)
        // \\x{3400}-\\x{4DB5}\\x{4E00}-\\x{9FCB}\\x{F900}-\\x{FA6A} : 漢字
        // \\x{FF10}-\\x{FF19} : 英数字(全角)
        // \\x{FF21}-\\x{FF3A} : 大文字アルファベット(全角)
        // \\x{FF41}-\\x{FF5A} : 小文字アルファベット(全角)
        $pattern = '/\A[\\x{3041}-\\x{3096}\\x{30A1}-\\x{30F4}\\x{3400}-\\x{4DB5}\\x{4E00}-\\x{9FCB}\\x{F900}-\\x{FA6A}\\x{FF10}-\\x{FF19}\\x{FF21}-\\x{FF3A}\\x{FF41}-\\x{FF5A}]+\z/u';

        return preg_match($pattern, $value) === 1;   
    } 

     /**
     * 全角カナ文字列判定
     *
     * 判定対象の文字列が全て全角カナ文字列か判定
     * 
     * @param string $value 判定する文字列
     * @return bool 判定文字列が全て全角カナ文字列ならtrue、それ以外はfalse
     */
    protected function validateKana(?string $value): bool
    {
        // Unicodeマッチングパターン
        // \\x{30A1}-\\x{30F4} : カタカナ(全角)
        $pattern = '/\A[\\x{30A1}-\\x{30F4}]+\z/u';

        return preg_match($pattern, $value) === 1;
    }
}
