@extends('layouts.app')

@section('content')

	 <div class="panel panel-default">
	 	<div class="panel-body">
	 		
			<table class="table table-hover">
		 		<thead>
					<th>Фото</th>

					<th>Ім'я</th>
					<th>Права</th>
					<th>Видалити</th>

					<tbody>
                       @if($users->count()>0)

						 @foreach($users as $user)

		              <tr>
		              	<td>
		              		<img style="width: 60px;height: 60px;border-radius: 50%;" src="{{ asset($user->avatar) }}" alt="">
		              	</td>
		              	  <td>
		              	  	{{ $user->name }}
		              	  </td>
		              	  <td>
		              	  	    @if($user->admin)
		              	  	    <a href="{{ route('user.not_admin', ['id'=>$user->id]) }}" class="btn btn-xs btn-danger">Видалити адміна</a>
 
		              	  	    @else

		              	  	    <a href="{{ route('user.admin', ['id'=>$user->id]) }}" class="btn btn-xs btn-success">Зробити адміном</a>
  
		              	  	    @endif
		              	  </td>
		              	  
		              	  	<td>
                              @if(Auth::id() !== $user->id)
                                    <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-xs btn-danger">Видалити</a>
                              @endif
                              </td>
		              </tr>
		             

					 @endforeach

	                  @else

	                  <tr>
	                  	<th colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">Стаття ще не створена</th>
	                  </tr>

                          @endif

                          <iframe src="https://minnit.chat/besida?embed&nickname=" style="border:none;width:90%;height:500px;" allowTransparency="true"></iframe><br><a href="https://minnit.chat/besida" target="_blank">HTML5 Chatroom powered by Minnit Chat</a>

					</tbody>
				</thead>
			</table>
	 	</div>
	 </div>
	

@stop