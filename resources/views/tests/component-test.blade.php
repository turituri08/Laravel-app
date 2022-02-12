{{-- resources/views/components/tests/app.blade.phpコンポーネントを呼び込む --}}
<x-tests.app>
    {{-- 名前付きスロット{{ $header }}にヘッダーという文字を差し込む
    一つのコンポーネントに複数のスロットを差し込みたい場合に使用する --}}
    <x-slot name="header">ヘッダー</x-slot>
{{-- resources/views/components/tests/app.blade.phpの{{ $slot }}には<x-tests.app>で囲まれた箇所が差し込まれる --}}
コンポーネントテスト
</x-tests.app>