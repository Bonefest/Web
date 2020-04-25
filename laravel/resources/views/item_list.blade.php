@extends('item_parent')
@section('css')
html, body {
    background-color: rgb(250, 250, 250);
    color: #636b6f;
    font-family: 'Nunito', sans-serif;
    font-weight: 200;
    height: 100vh;
    margin: 0;
}

.title {
    font-size: 84px;
}

.delete_button input {
    width: 10%;
    padding: 10px 5px 10px 5px;
    border-radius: 0px;
    border: 0px;
    background-color: rgb(217, 33, 76);
    margin-bottom: 20px;
    margin-left: 20px;

    font-size: 18px;
    color: #EAEAEA;
}

.item {
    background-color: #EAEAEA;
    margin-bottom: 5px;
    box-shadow: 0px 1.5px rgb(200, 200, 200);
}

.item > a {
    color: #636b6f;
    padding: 0 25px;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
}


.m-b-md {
    margin-bottom: 30px;
}

.create_item {

    background-color: rgba(240, 240, 240, 10);
    text-align: center;
}

.create_item input {
        width: 10%;
        padding: 10px 5px 10px 5px;
        border-radius: 0px;
        border: 2px solid #999;
        background-color: rgba(240, 240, 240, 255);
        margin-bottom: 20px;
}
@endsection

@section('title')
    Item list
@stop

@section('body')
@if(count($items) > 0)
    <div class="title m-b-md">
        Item list
     </div>

    <form id = "delete" method="post">
        @foreach ($items as $item)
           
            <div class = "item">
                <input type = "checkbox" name="checkbox[]" id = "delete" value="{{$item->id}}">
                <a href="item/{{$item->id}}">{{$item->name}}: {{$item->price}}$</a>
            </div>
        @endforeach

        <div class = "delete_button">
            <input type="submit" value="Delete">
        </div>

        <input type="hidden" name = "post_type" value = "delete_items">        
    </form>
@else
    <div class="title m-b-md">
        Items not found!
    </div>

@endif

<div class = "create_item">

    <h2>Create new item </h2>

    <form id = "create" method="post">
          <label for="item_name">Item name</label><br>
          <input type="text" id = "item_name" name="item_name" placeholder="Type name"><br>

          <label for="item_price">Item price</label><br>
          <input type="number" id = "item_price" name="item_price" placeholder="Type price"><br>

          <input type="submit" value="Create">

          <input type="hidden" name = "post_type" value = "create_item">
    </form>
</div>
@endsection