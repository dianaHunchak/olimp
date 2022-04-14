@extends('layouts.app')


@section('content')

     
     @include('admin.includes.errors')

<div class="panel panel-default">
      <div class="panel-heading">
      	Редагувати статтю: {{$posts->title}}
      </div>

      <div class="panel-body">
      	<form action="{{ route('posts.update',['id'=>$posts->id]) }}" method="POST" enctype="multipart/form-data">
      		
      		{{ csrf_field() }}

            <div class="form-group">
            	<label for="title">Назва</label>
            	<input type="text" name="title" value="{{ $posts->title }}" placeholder="Введіть назву статті" class="form-control">
            </div>

            <div class="form-group">
            	<label for="category">Виберіть категорію</label>
            	<select name="category_id" id="category_id" class="form-control">
                     @foreach($categories as $category)

                      <option value="{{$category->id}}"
                          @if ($posts->category->id == $category->id)
                             selected 
                          @endif

                        >{{$category->name}}</option>

                     @endforeach     
                  </select>
            </div>
            <div class="form-group">
               <label for="tags">Виберіть тег</label>
               @foreach($tags as $tag)
                   <div class="checkbox">
                     <label for=""><input name="tags[]" value="{{$tag->id}}" type="checkbox"
                         
                         @foreach ($posts->tags as $t)
                            @if ($tag->id == $t->id)
                               checked 
                            @endif
                         @endforeach


                        >{{ $tag->tag }}</label>
                   </div>
               @endforeach    

            </div>
            <div class="form-group">
                  <label for="featured">Картинка</label>
                  <input type="file" name="featured"  class="form-control">
            </div>


			 <div class="form-group">
            	<label for="body">Контент</label>
            	<textarea name="body" id="body" cols="30" rows="10" placeholder="Введіть контент" class="form-control">{{ $posts->body }}</textarea>
              
        </div>
         <h1>Завантаження файлів завдань</h1>

            <upload-file-component :files="{{ $posts->downloads ?? '[]' }}"></upload-file-component>
            <div class="from-group">
            	 <div class="text-right">
            	 	<button class="btn btn-success" type="submit">Відредагувати статтю</button>
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

<script>
  
  $(document).ready(function() {
  $('#body').summernote();
});

</script>

@stop
