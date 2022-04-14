@extends('layouts.app')


@section('content')

     
      @include('admin.includes.errors')
    <div class="panel panel-default">
      <div class="panel-heading">
      	Редагувати профіль користувача
      </div>

      <div class="panel-body">
      <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
      		
      		{{ csrf_field() }}

            <div class="form-group">
                  <label for="name">Ім'я</label>
                  <input type="text" id="name" name="name" value="{{ $user->name }}" placeholder="Введіть Ваше ім'я" class="form-control">
            </div>
            <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" value="{{ $user->email }}" placeholder="Введіть Ваш новий Email" class="form-control">
            </div>
            <div class="form-group">
                  <label for="password">Новий пароль</label>
                  <input type="password" id="password" name="password" placeholder="Введіть Ваш новий пароль" class="form-control">
            </div>  
            <div class="form-group">
                  <label for="avatar">Завантажити нове фото</label>
                  <input value="{{ $user->avatar }}" id="avatar" type="file" name="avatar" class="form-control">
            </div>
            <div class="form-group">
                  <label for="about">Про вас</label>
                 <textarea class="form-control" name="about" id="about" cols="30" rows="10">{{ $user->about }}</textarea>
            </div>

            <div class="from-group">
            	 <div class="text-right">
            	 	<button class="btn btn-success" type="submit">Оновити профіль</button>
            	 </div>
            </div>
            </form>
      </div>

  </div>

@stop
