@component('mail::message')
<h1>Ciao {{$user->name}}</h1>

@component('mail::button', ['url' => route('admin.index')])
Vai al to sito
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
