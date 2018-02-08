@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/testing" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="text" name="waha[file][]">
        <input type="text" name="waha[file][]">
        <input type="text" name="waha[file][]">
        <input type="text" name="waha[file][]">
        <input type="submit" value="input">
    </form>
</div>
@endsection
