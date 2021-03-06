@extends('layouts.app')


@section('content')

     
      @include('admin.includes.errors')

<div class="panel panel-default">
      <div class="panel-heading">
      	Створити нового користувача
      </div>

      <div class="panel-body">
      	<form action="{{ route('user.store') }}" method="POST">
      		
      		{{ csrf_field() }}

            <div class="form-group">
                  <label for="name">Ім'я</label>
                  <input type="text" name="name" placeholder="Enter Your User Name" class="form-control">
            </div>
            <div class="form-group">
            	<label for="email">Email</label>
            	<input type="email" name="email" placeholder="Enter Your User Email" class="form-control">
            </div>

            <div class="from-group">
            	 <div class="text-right">
            	 	<button class="btn btn-success" type="submit">Створити користувача</button>
            	 </div>
            </div>



      	</form>
      </div>

  </div>

@stop