@extends('layouts.app')



@section('content')




	 <div class="panel panel-default">
	 	<div class="panel-body">
	 		
			<table class="table table-hover">
		 		<thead>
					<th>Картинка статті</th>

					<th>Назва</th>
					<!--<th>Редагувати</th>!-->
					<th>Відновити</th> 
					<th>Вдалити</th>

					<tbody>

						@if($posts->count()>0)
                            @foreach($posts as $post)

			              <tr>
			              	<td>
			              		<img style="width: 90px;height: 50px;" src="{{ $post->featured}}" alt="{{$post->title}}">
			              	</td>

			              	<td>
			              	      {{ $post->title }}
			              	</td>
			              	 <!--<td>Edit</td>!-->
			              	 <td><a class="btn btn-xs btn-success" href="{{ route('posts.restore', ['id'=>$post->id]) }}">Відновити</a>
			              	 </td>
			              	 <td><a class="btn btn-xs btn-danger" href="{{ route('post.kill', ['id'=>$post->id]) }}">Видалити</a>
			              	 </td>

			              </tr>
			             

						   @endforeach

						@else

                                  <tr>
                                  	<th colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">В корзині немає ще постів</th>
                                  </tr>

						@endif
						 
					</tbody>
				</thead>
			</table>
	 	</div>
	 </div>
	

@stop