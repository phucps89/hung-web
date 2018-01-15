@extends('../layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add / Edit Category</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="name" value="{{$category->name ?? old('name')}}" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Title <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="title" name="title" value="{{$category->title ?? old('title')}}" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Image <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="imageInput" name="image" required="required" class="form-control col-md-7 col-xs-12">
                                <div>
                                    <button type="button" class="btn btn-default" id="browseFile">Browse</button>
                                </div><br>
                                <img id="imageView" src="{{@$category->image}}" width="100">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a class="btn btn-primary" href="{{route(ADMIN_CATEGORY_LIST)}}">Cancel</a>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{asset('ckfinder/ckfinder.js')}}"></script>
    <script type="text/javascript">
        $(document).on('click', '#browseFile', function(){
            CKFinder.popup( {
                chooseFiles: true,
                width: 800,
                height: 600,
                onInit: function( finder ) {
                    finder.on( 'files:choose', function( evt ) {
                        var file = evt.data.files.first();
                        var output = document.getElementById( 'imageInput' );
                        output.value = file.getUrl();
                        $('#imageView').attr('src', file.getUrl());
                    } );

                    finder.on( 'file:choose:resizedImage', function( evt ) {
                        var output = document.getElementById( 'imageInput' );
                        output.value = evt.data.resizedUrl;
                        $('#imageView').attr('src', evt.data.resizedUrl);
                    } );
                }
            } );
        })

    </script>
@endsection