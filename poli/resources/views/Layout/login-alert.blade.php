@if(session()->has('success'))
    <div class="alert alert-danger" role="alert">
        ehem
    </div>
@elseif(session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
@endif
