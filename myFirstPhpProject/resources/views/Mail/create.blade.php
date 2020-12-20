@section("content")
    <body>
    <h1>hi create new mail</h1>
    <div class="container">
        <form method="post" enctype="multipart/form-data" action="{{route('mail.send')}}">
            <div class="box-body">

                <div class="form-group">
                    <label for="name">Mail</label>
                    <input type="text" class="form-control @error('mail') is-invalid @enderror"
                           placeholder="mail" name="mail" value="{{old('mail')}}"/>
                    @error('mail')
                    <p class="text-danger">{{$errors->first('mail')}}</p>
                    @enderror
                </div>
            </div>
            <input type="hidden" name="_token" id='csrf_toKen' value="{{ csrf_toKen() }}">
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </form>
    </div>

    </body>
@endsection
