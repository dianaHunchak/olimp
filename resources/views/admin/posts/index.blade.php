@extends('layouts.app')

@section('content')
		
		<form action="" method="GET" action="/filter">
			<select id="category_filter" name="category_field">
			@foreach($categories as $row)
			<option value="{{$row->id}}">{{ $row->name }}</option>
			@endforeach
			</select>  			
			<label for="from_date">Від   </label><input type="date" id="from_date" name="from_date" placeholder="from">
			<label for="to_date">до</label><input type="date" id="to_date" name="to_date" placeholder="to">
			<button class="btn btn-primary" type="submit">Фільтрувати</button>
			<button href="{{ route('posts') }}" class="btn btn-light" id="reset-date">Очистити</button>
		</form>
		

	 	<div class="panel panel-default">
	  	<div class="panel-body">
		 
	 	<table class="table table-hover" id="post_table">
		 		<thead>
					<th>Картинка </th>
					<th>Назва</th>
					<th>Категорія</th>
					<th>Дата створення</th>
					@if(Auth::user()->admin)<th>Автор</th>@endif
					<th>Редагувати</th>

					<tbody>
                       @if($posts->count()>0 )

						 @foreach($posts as $post)

			              <tr>
			              	<td>
			              		<img style="width: 90px;height: 50px;" src="{{ $post->featured}}" alt="{{$post->title}}">
			              	</td>

			              	<td>
			              	    {{ $post->title }}
			              	</td>
			              	<td>
			              	 	{{ $post->category->name }}
			              	 </td>
			              	  <td>
			              	 	{{ $post->updated_at }}
			              	 </td>
			              	 @if(Auth::user()->admin)<td>
			              	 	{{$post->user->name}}
			              	 </td>@endif

			           	 	<td>  
								<a style="font-size:24px" href="{{ route('posts.edit', ['id'=>$post->id]) }}">&#9998;</a>
                            	<a style="font-size:24px" href="{{ route('posts.delete', ['id'=>$post->id]) }}"><span class="glyphicon glyphicon-trash"></span></a>
							</td>

			              </tr>
			             

						 @endforeach

                          @else

                          <tr>
                          	<th colspan="8" style="background-color: rgb(23,45,67);color: white;" class="text-center">Ще немає статтей</th>
                          </tr>

                          @endif

					</tbody>
				</thead>
			</table>
			@if(Auth::user()->admin){{$posts->links()}}@endif
	 	</div>
	 </div>
	
@stop

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
$("#reset-date").click(function(){
    $('#date').val("").datepicker("update");
})
</script>

<style>
   .datesearch {
    float: right; /* Выравнивание по правому краю */
    margin: 0 0 5px 5px; /* Отступы вокруг фотографии */
   }

   label{
   	margin-left: 15px;
   	margin-right: 15px;
   }

   button {
   	margin-left: 10px;
   }
</style>


