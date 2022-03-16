@component('mail::message')
# Bienvneido {{ $user->name }}

Eres parte de PlayMaker, 

Para iniciar sesión utiliza tu email:
# {{ $user->email }}

Tu contraseña es:
# {{ $password }}

@component('mail::button', ['url' => 'http://playmakerleagues.com.mx/login'])
Inicia Sesion
@endcomponent

Gracias,<br>
PlayMaker
@endcomponent
