@extends('layouts.frontend')

@section('content')


<div class="form-style-5">
<form method="GET" action="/user_filter/results">
<fieldset>
<legend><span class="number">1</span> Фільтр</legend>
<select id="category_user_filter" name="field4">
@foreach($categories as $row)
<option value="{{$row->id}}">{{ $row->name }}</option>
@endforeach
</select>  
<h>Від</h><input type="date" name="from_date" placeholder="Від *">
<h>До</h><input type="date" name="to_date" placeholder="До *">
  
</fieldset>

<input type="submit" value="Фільтрувати" />
</form> <Br> <Br> <Br>
</div>

<div class="stunning-header stunning-header-bg-lightviolet">
            <div class="stunning-header-content">
                  <h1 class="stunning-header-title">Результати фільтрування: {{ $query }}</h1>
            </div>
      </div>

      <div class="container">
            <div class="row medium-padding120">
                  <main class="main">
                              
                     <div class="row">
                   @if($posts->count() > 0)
                       <div class="case-item-wrap">
                        @foreach($posts as $post)
                              
                              <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                                    <div class="case-item">
                                          <div class="case-item__thumb mouseover poster-3d lightbox shadow animation-disabled" data-offset="5">
                                          <img src="{{ $post->featured }}" alt="our case">
                                          </div>
                                          <a href="{{ route('post.single', ['slug' => $post->slug ]) }}"><h6 class="case-item__title">{{ $post->title }}</h6></a>
                                    </div>
                              </div>

                        @endforeach
                      </div>

                      
                      @else

                          <div class="stunning-header stunning-header-bg-lightviolet">
                            <div class="stunning-header-content">
                                <h2 class="stunning-header-title" style="color:#fff "> Таких статтей немає</h2>
                                <br>
                                
                               <h1 style="color: #51bcaa"><a href="{{ route('index') }}"> Повернутись на головну сторінку</a></h1> 
                            </div>
                        </div>

                      @endif
                </div>

                        </main>
            </div>
      </div>

@stop

<style>
a.button10 {
  display: inline-block;
  color: black;
  font-size: 125%;
  font-weight: 700;
  text-decoration: none;
  user-select: none;
  padding: .25em .5em;
  outline: none;
  border: 1px solid rgb(250,172,17);
  border-radius: 7px;
  background: rgb(255,212,3) linear-gradient(rgb(255,212,3), rgb(248,157,23));
  box-shadow: inset 0 -2px 1px rgba(0,0,0,0), inset 0 1px 2px rgba(0,0,0,0), inset 0 0 0 60px rgba(255,255,0,0);
  transition: box-shadow .2s, border-color .2s;
  margin-top: 10px;
  margin-left: 10px;
  margin-bottom: 10px;
} 
a.button10:hover {
  box-shadow: inset 0 -1px 1px rgba(0,0,0,0), inset 0 1px 2px rgba(0,0,0,0), inset 0 0 0 60px rgba(255,255,0,.5);
}
a.button10:active {
  padding: calc(.25em + 1px) .5em calc(.25em - 1px);
  border-color: rgba(177,159,0,1);
  box-shadow: inset 0 -1px 1px rgba(0,0,0,.1), inset 0 1px 2px rgba(0,0,0,.3), inset 0 0 0 60px rgba(255,255,0,.45);
}

<style type="text/css">
.form-style-5{
	max-width: 500px;
	padding: 10px 20px;
	background: #f4f7f8;
	margin: 10px auto;
	padding: 20px;
	background: #f4f7f8;
	border-radius: 8px;
	font-family: Georgia, "Times New Roman", Times, serif;
}
.form-style-5 fieldset{
	border: none;
}
.form-style-5 legend {
	font-size: 1.4em;
	margin-bottom: 10px;
}
.form-style-5 label {
	display: block;
	margin-bottom: 8px;
}
.form-style-5 input[type="text"],
.form-style-5 input[type="date"],
.form-style-5 input[type="datetime"],
.form-style-5 input[type="email"],
.form-style-5 input[type="number"],
.form-style-5 input[type="search"],
.form-style-5 input[type="time"],
.form-style-5 input[type="url"],
.form-style-5 textarea,
.form-style-5 select {
	font-family: Georgia, "Times New Roman", Times, serif;
	background: rgba(255,255,255,.1);
	border: none;
	border-radius: 4px;
	font-size: 15px;
	margin: 0;
	margin-right: 10px;
	margin-left: 10px;
	outline: 0;
	padding: 10px;
	width: 30%;
	box-sizing: border-box; 
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box; 
	background-color: #e8eeef;
	color:#8a97a0;
	-webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
	box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
	margin-bottom: 30px;
}
.form-style-5 input[type="text"]:focus,
.form-style-5 input[type="date"]:focus,
.form-style-5 input[type="datetime"]:focus,
.form-style-5 input[type="email"]:focus,
.form-style-5 input[type="number"]:focus,
.form-style-5 input[type="search"]:focus,
.form-style-5 input[type="time"]:focus,
.form-style-5 input[type="url"]:focus,
.form-style-5 textarea:focus,
.form-style-5 select:focus{
	background: #d2d9dd;
}
.form-style-5 select{
	-webkit-appearance: menulist-button;
	height:35px;
}
.form-style-5 .number {
	background: #1abc9c;
	color: #fff;
	height: 30px;
	width: 30px;
	display: inline-block;
	font-size: 0.8em;
	margin-right: 4px;
	line-height: 30px;
	text-align: center;
	text-shadow: 0 1px 0 rgba(255,255,255,0.2);
	border-radius: 15px 15px 15px 0px;
}

.form-style-5 input[type="submit"],
.form-style-5 input[type="button"]
{
	position: relative;
	display: block;
	padding: 19px 39px 18px 39px;
	color: #FFF;
	margin: 0 auto;
	background: #1abc9c;
	font-size: 18px;
	text-align: center;
	font-style: normal;
	width: 100%;
	border: 1px solid #16a085;
	border-width: 1px 1px 3px;
	margin-bottom: 10px;
}
.form-style-5 input[type="submit"]:hover,
.form-style-5 input[type="button"]:hover
{
	background: #109177;
}
</style>

</style>