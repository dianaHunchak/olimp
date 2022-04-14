@extends('layouts.app')


@section('content')

     
     @include('admin.includes.errors')

<div class="panel panel-default">
      <div class="panel-heading">
      	Створити нову статтю
      </div>

      <div class="panel-body">
      	<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
      		
      		{{ csrf_field() }}

            <div class="form-group">
            	<label for="title">Назва</label>
            	<input type="text" name="title" placeholder="Введіть назву статті" class="form-control">
            </div>

            <div class="form-group">
            	<label for="category">Виберіть категорію</label>
            	<select name="category_id" id="category_id" class="form-control">
                     @foreach($categories as $category)

                      <option value="{{$category->id}}">{{$category->name}}</option>

                     @endforeach     
                  </select>
            </div>
            <div class="form-group">
               <label for="tags">Виберіть тег</label>
               @foreach($tags as $tag)
                   <div class="checkbox">
                      <label for=""><input name="tags[]" value="{{$tag->id}}" type="checkbox">{{ $tag->tag }}</label>
                   </div>
               @endforeach    

            </div>
            <div class="form-group">
                  <label for="featured">Картинка</label>
                  <input type="file" name="featured"  class="form-control">
            </div>


			 <div class="form-group">
            	<label for="body">Вміст</label>
            	<textarea name="body" id="body" cols="50" rows="20" placeholder="Введіть вміст статті" class="form-control"></textarea>
            </div>
            <h1>Завантаження файлів завдань</h1>

            <upload-file-component :files="{{ $post->downloads ?? '[]' }}"></upload-file-component>
            <div class="from-group">
            	 <div class="text-right">
            	 	<button class="btn btn-success" type="submit">Опублікувати</button>
            	 </div>
            </div>

           



      	</form>
      </div>
     
  </div>



@stop



@section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">

@stop




@section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
<script type="text/javascript" src="app/js/summernote-file.js"></script>

<script>
  
  $(document).ready(function() {
  $('#body').summernote({



     
  });
});

  

</script>

@stop