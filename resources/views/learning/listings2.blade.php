<h1>{{ $heading }}</h1>

@php
    $test = 1;
@endphp
{{-- this comes from php above: --}}
{{ $test }}

@if (count($listings2) == 2)
    <p style="color: red">Here is your lists:</p>
@else
    <p>nothing is there</p>
@endif

{{-- the ones with @ named directive --}}
@foreach ($listings2 as $listing)
    <h2>{{ $listing['title'] }}</h2>
    <p>{{ $listing['description'] }}</p>
@endforeach

{{-- unless is equal to if not --}}
@unless (count($listings2) == 1)
    <p>hello</p>
@else
    <p>bye</p>
@endunless
<p>--------------------------------------------</p>
<p style="color: red">this one comes from model:</p>
@foreach ($listings2 as $listing)
    <h2>
        <a href="/listings/phpMyAdminDB/{{ $listing['id'] }}"> {{ $listing['title'] }}</a>
    </h2>
    <p>{{ $listing['description'] }}</p>
@endforeach
