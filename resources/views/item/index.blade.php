@extends('item.layout')

@section('content')

<h1 class="bg-blue-500 text-white font-bold py-2 px-4 rounded" style="text-align:center">Shop</h1>
    <x-alert/>
    <div class="p-2">
        <div class="table__actions" >
            <a href="/item/create" class="p-2 bg-blue-400 text-white cursor pointer rounded">Add new item </a>
            <form action="{{ route('item.index') }}" method="GET"  >
                <input type="text" name="search" required class="py-2 px-2 border rounded" />
                <button type="submit" class="mx-5 p-2 text-white bg-blue-400 cursor pointer rounded" >Search</button>
                    
            </form>
           
        </div>
        <table class="table-fixed">
            <thead>
                <tr>
                <th>
                    <form method="get" action="/item/OrderBy" >
                        <button value=1 name="name" class="fas fa-arrow-up px-1"> </button>
                        Name
                        <button value=2 name="name"  class="fas fa-arrow-down px-1"/>
                    </form>
                </th>
                <th>
                    <form method="get" action="/item/OrderBy">
                        <button value=3 name="name" class="fas fa-arrow-up px-1"/> </button>
                        Price
                        <button value=4 name="name"  class="fas fa-arrow-down px-1"/>
                    </form>
                </th>
                <th>
                    <form method="get" action="/item/OrderBy">
                        <button value=5 name="name" class="fas fa-arrow-up px-1"/></button>
                        Quantity
                        <button value=6 name="name"  class="fas fa-arrow-down px-1"/>
                    </form>
                </th>
                <th>Description</th>
                <th>Comment</th>
                <th>
                   
                    <form method="get" action="/item/OrderBy">
                        <button value=7 name="name" class="fas fa-arrow-up  px-1"/></button>
                        Rating
                        <button value=8 name="name"  class="fas fa-arrow-down px-1"/>
                    </form>
                </th>
                <th>
                    
                    <form method="get" action="/item/OrderBy">
                        <button value=9 name="name" class="fas fa-arrow-up px-1"/></button>
                        Selected
                        <button value=10 name="name"  class="fas fa-arrow-down px-1"/>
                    </form>
                </th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td style="text-align:center;"> {{$item->name}}</td>
                        <td style="text-align:center;">{{$item->price}}</td>
                        <td style="text-align:center;">{{$item->quantity}}</td>
                        <td style="text-align:center;">{{$item->description}}</td>
                        <td style="text-align:center;">{{$item->comment}}</td>
                        <td style="text-align:center;">{{$item->rating}}</td>
                        <td style="text-align:center;">
                             @include('item.SelectButton')
                        </td>
                        <td style="text-align:center;">
                            <a href="{{'/item/'.$item->id.'/edit'}}" class=" text-yellow-400 cursor pointer text-white">   
                            <span class="fas fa-edit  px-2"></a>
                            <span class="fas fa-trash text-red-500  px-2 cursor-pointer" 
                                  onclick ="event.preventDefault();
                                  if(confirm('Are you sure you want to delete this item?')){
                                  document.getElementById('form-delete-{{$item->id}}')
                                  .submit()
                            }"/>
                            <form  class="delete "method="post" id="{{'form-delete-'.$item->id}}"  action="{{route('item.delete',$item->id)}}" >
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
        </tbody>    
    </div>
 @endsection

