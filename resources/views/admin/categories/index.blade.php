@extends('layouts.app')



@section('content')
	 <div class="panel panel-default">
	 	<div class="panel-body">
	 		
			<table class="table table-hover">
		 		<thead>
					<th>Назва категорії</th>

					<th>Редагування</th>
					@if(Auth::user()->admin)<th>Видалення</th>@endif

					<tbody>

						@if($categories->count())
						 @foreach($categories as $category)

			              <tr>
			              	<td>
			              		{{ $category->name }}
			              	</td>

			              	<td>
			              	<a class="btn btn-info" href="{{ route('category.edit',['id'=>$category->id]) }}">
			              	
			              			<span class="glyphicon glyphicon-pencil"></span>
			              	</a>
			              	</td>
							@if(Auth::user()->admin)
			              	<td>
			              	<a class="btn btn-danger" href="{{ route('category.delete',['id'=>$category->id]) }}">
			              	
			              			Видалити
			              	</a>
			              	</td>
							@endif

			              </tr>
			             

						 @endforeach

						 @else 
                              <tr>
                              	<th colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">
                              		Ще немає категорій 
                              	</th>
                              </tr>

						 @endif
					</tbody>
				</thead>
				
			</table>
			{{$categories->links()}}
	 	</div>
	 </div>
	

@stop