@component('mail::message')
# Bienvneido {{ $user->name }}

Eres parte de PlayMaker, 

Para iniciar sesión utiliza tu email:
# {{ $user->email }}

Tu contraseña es:
# {{ $password }}

@component('mail::button', ['url' => ''])
Inicia Sesion
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
