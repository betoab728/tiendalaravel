@props(['color' => 'gray'])

@php
    switch ($color) {
	    case 'gray':
            $clases = 'bg-gray-600 inline-flex justify-centrer items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition';
            break;
        case 'red':
            $clases = 'bg-red-600 inline-flex justify-centrer items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition';
            break;
        case 'orange':
            $clases = 'bg-orange-600 inline-flex justify-center items-center px-4 py-2 bg-orange-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 active:bg-orange-900 focus:outline-none focus:border-orange-900 focus:ring focus:ring-orange-300 disabled:opacity-25 transition';
            break;
        default:
            $clases = 'bg-blue-600 inline-flex justify-centrer items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition';
            break;
    }
@endphp

<button {{ $attributes->merge(['type' => 'submit', 'class' => $clases ]) }}>
    {{ $slot }}
</button>
