@extends('../layouts.master')

@section('content')
    <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>

    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
            <tr class="headings">
                <th>
                    <input type="checkbox" id="check-all" class="flat">
                </th>
                <th class="column-title">Name </th>
                <th class="column-title">Email</th>
                <th class="column-title">Avatar</th>
                <th class="column-title no-link last"><span class="nobr">Action</span>
                </th>
                <th class="bulk-actions" colspan="7">
                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                </th>
            </tr>
            </thead>

            <tbody>
                @foreach($users as $i => $user)
                    <tr class="{{$i%2 == 0? 'odd' : 'even'}} pointer">
                        <td class="a-center ">
                            <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td class=" ">{{$user->name}}</td>
                        <td class=" ">{{$user->email}}</td>
                        <td class=" "></td>
                        <td class=" last"><a href="{{route(ADMIN_USER_EDIT, [$user->id])}}">Edit</a> |
                            <a href="{{route(ADMIN_USER_PERMISSION, [$user->id])}}">Permission</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $users->render() !!}
    </div>
@endsection