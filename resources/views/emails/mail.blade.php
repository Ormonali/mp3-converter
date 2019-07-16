@component('mail::message')
# Ваш запрос на mp3


@component('mail::button', ['url' => 'http://localhost/mp3-converter/public/download/{{$filename}}'])
Скачать
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
