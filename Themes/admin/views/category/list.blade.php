@extends('../layouts.master')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
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
                            <td class=" ">{{$category->name}} @if(isset($category->sub)) <i class="fa fa-chevron-down"></i> @endif</td>
                            <td class=" ">{{$category->title}}</td>
                            <td class=" "><img src="{{$category->image}}"></td>
                            <td class=" last"><a href="{{route(ADMIN_CATEGORY_EDIT, [$category->id])}}">Edit</a>
                            </td>
                        </tr>
                        @foreach($category->sub as $sub)
                            <tr class="sub pointer">
                                <td class=" ">{{$sub->name}}</td>
                                <td class=" ">{{$sub->title}}</td>
                                <td class=" "><img src="{{$sub->image}}"></td>
                                <td class=" last"><a href="{{route(ADMIN_CATEGORY_EDIT, [$sub->id])}}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>

                {!! $categories->render() !!}
            </div>
        </div>
    </div>
@endsection