@if($item->selected)
    <span class="fas fa-check text-green-400 cursor-pointer px-2" 
    onclick ="event.preventDefault();document.getElementById('form-deselect-{{$item->id}}').submit()" > 

    <form style="display:none" id="{{'form-deselect-'.$item->id}}" method="post"
        action="{{route('item.deselect',$item->id)}}">
    @csrf
    @method('delete')
    </form>

@else
    <span onclick ="event.preventDefault();document.getElementById('form-select-{{$item->id}}').submit()" 
    class="fas fa-check text-gray-200 cursor-pointer px-2">
    <form style="display:none" id="{{'form-select-'.$item->id}}" method="post"
        action="{{route('item.select',$item->id)}}">
    @csrf
    @method('put')
    </form>
@endif