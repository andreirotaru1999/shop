@extends('item.layout')

@section('content')

    <h1 class="bg-blue-500 text-white font-bold py-2 px-4 rounded" style="text-align:center">Add an item</h1>
    <div class="form__container">
    <x-alert />
        <form method="post" action="/item/create" class="py-5">
        @csrf
                <div class="form__field">
                    <label>Name <span style="color:red">*</span></label>
                    <input type="text" name="name" class="py-2 px-2 border rounded" />
                </div>

                <div class="form__field">
                    <label>Price <span style="color:red">*</span></label>
                    <input type="number" name="price" class="py-2 px-2 border rounded" />
                </div>

                <div class="form__field">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="py-2 px-2 border rounded" />
                </div>

                <div class="form__field">
                    <label>Description</label>
                    <input type="text" name="description" class="py-2 px-2 border rounded" />
                </div>

                <div class="form__field">
                    <label>Comment</label>
                    <input type="text" name="comment" class="py-2 px-2 border rounded" />
                </div>

                <div class="form__field">
                    <label>Rating</label>
                    <select name="rating" class="py-2 px-2 border rounded">
                        <option value=" "> </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <div class="action__buttons">
                    <input type="submit" value="Create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"/>
                    <a href="/item" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back</a>
                </div>

        </form>    
    </div>
@endsection
