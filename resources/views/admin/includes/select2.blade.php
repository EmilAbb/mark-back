@push('js')
    <script src="{{asset('_assets/plugins/select2/js/select2.full.js')}}"></script>
    <script>
        $('.select2').select2();
    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{asset('_assets/plugins/select2/css/select2.css')}}">
@endpush
