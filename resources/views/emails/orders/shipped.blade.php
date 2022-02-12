@component('mail::message')
# Hi, How are you doing

{{$data['message']}}

## Contact of deliverer : {{ $order->deliverer_phone }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
