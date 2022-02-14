@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>

        <ul class="mt-1 text-center list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
