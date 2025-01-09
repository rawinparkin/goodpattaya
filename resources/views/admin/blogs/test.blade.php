@extends('admin.admin_master')
@section('admin')
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')
</script>
<link rel="stylesheet" href="{{ asset('backend/assets/plugins/trumbowyg/trumbowyg.min.css') }}">

<script src="{{ asset('backend/assets/plugins/trumbowyg/trumbowyg.min.js') }}"></script>



<div class="testtest">
    <textarea id="my-editor" class="testtest"></textarea>
</div>
<script>
    $('#my-editor').trumbowyg();
</script>

@endsection