{{-- slot make it able to open and close tag x-card --}}
<div {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-200 rounded p-6']) }}>
    {{ $slot }}
</div>
