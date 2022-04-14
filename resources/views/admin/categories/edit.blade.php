@extends('layouts.app')


@section('content')

     
     @include('admin.includes.errors')

<div class="panel panel-default">
      <div class="panel-heading">
      	Оновити категорію:{{$category->name}}
      </div>

      <div class="panel-body">
      	<form action="{{ route('category.update', ['id'=>$category->id]) }}" method="POST">
      		
      		{{ csrf_field() }}

            <div class="form-group">
            	<label for="name">Назва категорії</label>
            	<input type="text" name="name" value="{{ $category->name }}" placeholder="Enter Your Blog Category Name" class="form-control">
            </div>

            <div class="from-group">
            	 <div class="text-right">
            	 	<button class="btn btn-success" type="submit">Оновити категорію</button>
            	 </div>
            </div>



      	</form>
      </div>

  </div>

@stop
