@extends('../layouts.master')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th>
                            <input type="checkbox" id="check-all" class="flat">
                        </th>
                        <th class="column-title">Name </th>
                        <th class="column-title">Title</th>
                        <th class="column-title">Image</th>
                        <th class="column-title no-link last"><span class="nobr">Action</span>
                        </th>
                        <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($categories as $i => $category)
                        <tr class="{{$i%2 == 0? 'odd' : 'even'}} pointer">
                            <td class="a-center ">
                                <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">{{$category->name}}</td>
                            <td class=" ">{{$category->title}}</td>
                            <td class=" "><img src="{{$category->image}}"></td>
                            <td class=" last"><a href="{{route(ADMIN_CATEGORY_EDIT, [$user->id])}}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {!! $categories->render() !!}
            </div>
        </div>
    </div>
@endsection