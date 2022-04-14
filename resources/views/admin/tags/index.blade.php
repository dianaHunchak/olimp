@extends('layouts.app')



@section('content')




	 <div class="panel panel-default">
	 	<div class="panel-body">
	 		
			<table class="table table-hover">
		 		<thead>
					<th>Назва тегу</th>

					<th>Редагування</th>
					@if(Auth::user()->admin) <th>Видалення</th> @endif

					<tbody>

						@if($tags->count())
						 @foreach($tags as $tag)

			              <tr>
			              	<td>
			              		{{ $tag->tag }}
			              	</td>

			              	<td>
			              	<a class="btn btn-info" href="{{ route('tag.edit',['id'=>$tag->id]) }}">
			              	
			              			<span class="glyphicon glyphicon-pencil"></span>
			              	</a>
			              	</td>
			              	@if(Auth::user()->admin)<td>
			              	<a class="btn btn-danger" href="{{ route('tag.delete',['id'=>$tag->id]) }}">
			              	
			              			Видалити
			              	</a>
			              	</td>@endif
			              </tr>
			             

						 @endforeach

						 @else 
                              <tr>
                              	<th colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">
                              		Поки що немає тегів 
                              	</th>
                              </tr>

						 @endif
					</tbody>
				</thead>
			</table>
			{{$tags->links()}}
	 	</div>
	 </div>
	

@stop