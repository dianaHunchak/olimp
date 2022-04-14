@extends('layouts.app')


@section('content')

     
      @include('admin.includes.errors')

<div class="panel panel-default">
      <div class="panel-heading">
      	Створити новий тег
      </div>

      <div class="panel-body">
      	<form action="{{ route('tag.store') }}" method="POST">
      		
      		{{ csrf_field() }}

            <div class="form-group">
            	<label for="tag">Назва тегу</label>
            	<input type="text" name="tag" placeholder="Введіть назву тегу" class="form-control">
            </div>

            <div class="from-group">
            	 <div class="text-right">
            	 	<button class="btn btn-success" type="submit">Створити тег</button>
            	 </div>
            </div>



      	</form>
      </div>

  </div>

@stop