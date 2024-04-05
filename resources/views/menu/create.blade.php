<?php
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Product</h1>
    <form action="{{ route('menu.store') }}" method="POST">
        @csrf
        <label for="column1">Column1:</label>
        <input type="text" id="column1" name="column1">
        <!-- Voeg meer velden toe voor elke kolom in uw menu tabel -->
        <input type="submit" value="Submit">
    </form>
</div>
@endsection
?>