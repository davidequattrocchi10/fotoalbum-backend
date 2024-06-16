<x-mail::message>
    # You received a new message from: {{$lead->name}}
    His email is: {{$lead->address}}

    # Message:
    {{$lead->message}}

    <x-mail::button :url="'http://127.0.0.1:8000/admin/photos'" color="success">
        Go to admin
    </x-mail::button>


    Thanks,
    {{ config('app.name') }}
</x-mail::message>