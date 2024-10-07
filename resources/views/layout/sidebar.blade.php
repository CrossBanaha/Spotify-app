<div>
    <div class="sidebar h-max grid grid-cols-2 gap-[10px] grid-flow-row">
        <div>
            <img src="{{ asset('/images/spotify-icon.png') }}">
            <a href="{{ route('spotifys.index')}}" class="btn-gray p-[5px]">Home</a>
            <button class="btn-gray p-[5px]">Search</button>
        </div>
    </div>
    <div class="sidebar min-h-[60%]">
        <button class="btn-gray p-[5px]">Your Library</button>
        <div class="mini-box">
            <h1>Create your first list</h1>
            <button class="btn-white px-[12px] py-[8px] hover:px-[13px] mt-1">create</button>
        </div>
    </div>
</div>