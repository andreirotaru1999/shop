@extends('item.layout')

@section('content')
    <div >
        <h1 class="bg-blue-500 text-white font-bold py-2 px-4 rounded" style="text-align:center">Edit {{$item->name}}</h1>
        <x-alert/>
        <div class="form__container">
            <form method="post" action="{{route('item.update',$item->id)}}" class="py-5">
                @csrf
                    @method('patch')
                <div class="form__field">
                    <label>Name <span style="color:red">*</span></label>
                    <input type="text" name="name" value="{{$item->name}}" class="py-2 px-2 border rounded" />
                </div>

                <div class="form__field">
                    <label>Price <span style="color:red">*</span></label>
                    <input type="number" name="price" value="{{$item->price}}" class="py-2 px-2 border rounded" />
                </div>

                <div class="form__field">
                    <label>Quantity</label>
                    <input type="number" name="quantity" value="{{$item->quantity}}" class="py-2 px-2 border rounded" />
                </div>

                <div class="form__field">
                    <label>Description</label>
                    <input type="text" name="description" value="{{$item->description}}" class="py-2 px-2 border rounded" />
                </div>

                <div class="form__field">
                    <label>Comment</label>
                    <input type="text" name="comment" value="{{$item->comment}}" class="py-2 px-2 border rounded" />
                </div>

                <div class="form__field">
                    <label>Rating</label>
                    <select name="rating" class="py-2 px-2 border rounded" >
                        <option value=" "> </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <div class="action__buttons">
                    <input type="submit" value="Edit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"/>
                    <a href="/item" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back</a>
                </div>

            </form>
        </div>          
    </div>

    <script>
    $(".delete").on("submit", function(){
        return confirm("Are you sure?");
    });
    </script>

@endsection