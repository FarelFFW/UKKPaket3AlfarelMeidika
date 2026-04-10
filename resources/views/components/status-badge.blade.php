@props(['status' => 'menunggu'])

@php
    $status = strtolower((string) $status);

    $classes = [
        'menunggu' => 'bg-amber-100 text-amber-700',
        'proses' => 'bg-blue-100 text-blue-700',
        'selesai' => 'bg-emerald-100 text-emerald-700',
        'pending' => 'bg-rose-100 text-rose-700',
    ];

    $tone = $classes[$status] ?? 'bg-slate-100 text-slate-700';
@endphp

<span class="inline-flex rounded-md px-2 py-1 text-[11px] font-bold uppercase tracking-wide {{ $tone }}">
    {{ $status }}
</span>
