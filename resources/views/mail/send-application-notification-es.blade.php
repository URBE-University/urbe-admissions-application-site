@component('mail::message')
**Hola!** 👋

Gracias por aplicar a URBE University. Su aplicacion ha sido guardada, y usted puede continuar donde la dejó haciendo clic en el botón abajo.

@component('mail::button', ['url' => $url])
Continuar aplicacion
@endcomponent

Gracias por escoger URBE,<br>
El equipo de admisiones de URBE University
@endcomponent
