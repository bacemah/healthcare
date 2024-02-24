@component('mail::message')
Client : {{$client_name}}  <br>
Email : {{$client_email}} <br>
Time : {{$time}} <br>
Problem : {{$problem}} <br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
