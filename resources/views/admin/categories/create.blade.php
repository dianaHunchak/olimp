@extends('layouts.app')


@section('content')

     
      @include('admin.includes.errors')

<div class="panel panel-default">
      <div class="panel-heading">
      	Створити нову категорію
      </div>

      <div class="panel-body">
      	<form action="{{ route('category.store') }}" method="POST">
      		
      		{{ csrf_field() }}

            <div class="form-group">
            	<label for="name">Назва категорії</label>
            	<input type="text" name="name" placeholder="Введіть назву категорії" class="form-control">
            </div>

            <div class="from-group">
            	 <div class="text-right">
            	 	<button class="btn btn-success" type="submit">Створити категорію</button>
            	 </div>
            </div>



      	</form>
      </div>

  </div>

@stop