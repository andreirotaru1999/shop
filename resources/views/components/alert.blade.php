<div>
    @if(session()->has('message'))
        {{$slot}}
        <div class="py-4 px-2 bg-green-300" style="text-align:center;">{{session()->get('message')}}</div>
    @elseif(session()->has('error'))
        {{$slot}}
        <div class="py-4 ;px-2 bg-red-300" style="text-align:center;">{{session()->get('error')}}</div>
        @elseif(session()->has('notification'))
        {{$slot}}
        <div class="py-4 ;px-2 bg-yellow-300" style="text-align:center;">{{session()->get('notification')}}</div>
    @endif

    @if ($errors->any())
    <div class="py-4 ;px-2 bg-red-300" style="text-align:center;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
</div>