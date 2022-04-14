@extends('layouts.app')

@section('content')

            <div class="col-md-3">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                         Опубліковано:
                    </div>


                    <div class="panel-body">
                        <h1 class="text-center">
                            {{ $posts_count }}
                        </h1>
                    </div>
                </div>                

            </div>
         <div class="col-md-3">
                <div class="panel panel-danger">
                    <div class="panel-heading text-center">
                         В корзині:
                    </div>


                    <div class="panel-body">
                        <h1 class="text-center">
                            {{ $trashed_count }}
                        </h1>
                    </div>
                </div>


                

            </div>
         <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                         Користувачі:
                    </div>


                    <div class="panel-body">
                        <h1 class="text-center">
                            {{ $users_count }}
                        </h1>
                    </div>
                </div>


                

            </div>
         <div class="col-md-3">
                <div class="panel panel-success">
                    <div class="panel-heading text-center">
                         Категорії:
                    </div>


                    <div class="panel-body">
                        <h1 class="text-center">
                            {{ $categories_count }}
                        </h1>
                    </div>
                </div>                

            </div>
         
            
            
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Привіт!</h3>
                    </div>
                    <div class="panel-content text-left" >
                        <h> За допомогою цієї адмін-панелі Ви маєте можливість:</h>
                        <p></p>
                        <p>1. Задавати налаштування свого профілю, який буде відображатись для інших користувачів. Ви можете змінювати Ваш нікнейм, фото, інформацію про Вас. </p>
                        <p>2. Переглядати весь список статтей, а також категорій і тегів, до яких вони відносяться</p>
                        <p>3. Створювати нові категорії, статті або теги.</p>
                        <p>Категорія - це те основне, до чого належить стаття, теги мають другорядне значення. При створенні статті Ви можете використовувати редактор, для вставки зображень, відео, посилань на ресурси і тому подібне. Удачі! :)</p>


                    </div>
                    <div class="panel-footer">Інструкція</div>
                </div>
            </div>
            
          
            
        </div>
    </div>
    

        
   
@endsection
