@component('mail::message')
Olá este é um email

Nome: <b>{{$reply_name}}</b>

Email: {{$reply_email}}

Sobre: {{$subject}}

Message:

@component('mail::panel')
test
@endcomponent
@endcomponent