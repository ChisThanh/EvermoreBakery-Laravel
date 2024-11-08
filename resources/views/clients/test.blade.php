@extends('layouts.main')
@section('content')
    <form action="" method="POST">
        <input type="hidden" name="redirect">
        <input type="text" name="bill_id" value="123123">
        <input type="text" name="amount" value="10000">
        <button type="submit">submit</button>
    </form>
@endsection