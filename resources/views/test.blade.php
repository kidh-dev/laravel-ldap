@extends('adminlte::page')

@section('title', 'test')
@section('plugins.DateRangePicker', true)

@section('content_header')
<h1>
    Test Plugin
</h1>
@stop

@section('content')
{{-- Minimal --}}
<x-adminlte-date-range name="drBasic"/>

{{-- Disabled with predefined config --}}
@php
$config = [
    "timePicker" => true,
    "startDate" => "js:moment().subtract(6, 'days')",
    "endDate" => "js:moment()",
    "locale" => ["format" => "YYYY-MM-DD HH:mm"],
];
@endphp
<x-adminlte-date-range name="drDisabled" :config="$config" disabled/>

{{-- Prepend slot and custom ranges enables --}}
<x-adminlte-date-range name="drCustomRanges" enable-default-ranges="Last 30 Days">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-info">
            <i class="fas fa-calendar-alt"></i>
        </div>
    </x-slot>
</x-adminlte-date-range>

{{-- Label and placeholder --}}
<x-adminlte-date-range name="drPlaceholder" placeholder="Select a date range..."
    label="Date Range">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-danger">
            <i class="far fa-lg fa-calendar-alt"></i>
        </div>
    </x-slot>
</x-adminlte-date-range>
@push('js')<script>$(() => $("#drPlaceholder").val(''))</script>@endpush

{{-- SM size with single date/time config --}}
@php
$config = [
    "singleDatePicker" => true,
    "showDropdowns" => true,
    "startDate" => "js:moment()",
    "minYear" => 2000,
    "maxYear" => "js:parseInt(moment().format('YYYY'),10)",
    "timePicker" => true,
    "timePicker24Hour" => true,
    "timePickerSeconds" => true,
    "cancelButtonClasses" => "btn-danger",
    "locale" => ["format" => "YYYY-MM-DD HH:mm:ss"],
];
@endphp
<x-adminlte-date-range name="drSizeSm" label="Date/Time" igroup-size="sm" :config="$config">
    <x-slot name="appendSlot">
        <div class="input-group-text bg-dark">
            <i class="fas fa-calendar-day"></i>
        </div>
    </x-slot>
</x-adminlte-date-range>

{{-- LG size with some config and add-ons --}}
@php
$config = [
    "showDropdowns" => true,
    "startDate" => "js:moment()",
    "endDate" => "js:moment().subtract(1, 'days')",
    "minYear" => 2000,
    "maxYear" => "js:parseInt(moment().format('YYYY'),10)",
    "timePicker" => true,
    "timePicker24Hour" => true,
    "timePickerIncrement" => 30,
    "locale" => ["format" => "YYYY-MM-DD HH:mm"],
    "opens" => "center",
];
@endphp
<x-adminlte-date-range name="drSizeLg" label="Date/Time Range" label-class="text-primary"
    igroup-size="lg" :config="$config">
    <x-slot name="prependSlot">
        <div class="input-group-text text-primary">
            <i class="fas fa-lg fa-calendar-alt"></i>
        </div>
    </x-slot>
    <x-slot name="appendSlot">
        <x-adminlte-button theme="outline-primary" label="Review" icon="fas fa-lg fa-clipboard-check"/>
    </x-slot>
</x-adminlte-date-range>
@stop
