@component('mail::message')
# Introduction

Verificaiton Code :  {{$code}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
