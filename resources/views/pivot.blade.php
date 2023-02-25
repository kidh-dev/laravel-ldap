@extends('adminlte::page')

@section('title', 'Pivot')
@section('plugins.Pivot', true)

@section('content_header')
    <h1>Contoh Pivot</h1>
@stop

@section('content')
    <div id="output"></div>
@stop

@section('js')

    <script>
        $(function() {
            var derivers = $.pivotUtilities.derivers;

            var renderers = $.extend(
                $.pivotUtilities.renderers,
                $.pivotUtilities.plotly_renderers,
                $.pivotUtilities.d3_renderers,
                $.pivotUtilities.export_renderers
            );

            $.getJSON("{{url('tes/mps.json')}}", function(mps) {
                $("#output").pivotUI(mps, {
                    renderers: renderers,
                    derivedAttributes: {
                        "Age Bin": derivers.bin("Age", 10),
                        "Gender Imbalance": function(mp) {
                            return mp["Gender"] == "Male" ? 1 : -1;
                        }
                    },
                    cols: ["Age Bin"],
                    rows: ["Gender"],
                    rendererName: "Table Barchart"
                });
            });
        });
    </script>
@stop
