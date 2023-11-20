@if(!empty($errors))
    @foreach ($errors->all() as $error)
        <div class="bg-red-50 color-red">{{ $error }}</div>
    @endforeach
@endif

@if ($message = Session::get('error'))
    <div class="bg-red-50 color-red">{{ $message }}</div>
@endif
