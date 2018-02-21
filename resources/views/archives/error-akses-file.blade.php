@extends('layouts.app')

@section('content')
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

<!-- Styles -->
<style>
    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
<div class="container">
    <div class="content">
        <div class="title m-b-md">
            {{ $pesan_error }}
        </div>
    </div>
</div>
@endsection
