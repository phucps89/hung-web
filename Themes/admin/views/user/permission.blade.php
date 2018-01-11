@extends('../layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Permission</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" data-parsley-validate class="form-horizontal form-label-left">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th>
                                    <input type="checkbox" id="permission-check-all" class="flat">
                                </th>
                                <th class="column-title">Name </th>
                                <th class="column-title">Email</th>
                                </th>
                                <th class="bulk-actions" colspan="7">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($permissions as $i => $per)
                                <tr class="{{$i%2 == 0? 'odd' : 'even'}} pointer">
                                    <td class="a-center ">
                                        <input type="checkbox" class="flat" name="permission[{{$per->id}}]" @if($userHasPermission->contains('id', $per->id)) checked @endif>
                                    </td>
                                    <td class=" ">{{$per->name}}</td>
                                    <td class=" ">{{$per->description}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-primary" href="{{route(ADMIN_USER_LIST)}}">Cancel</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#permission-check-all').on('ifChecked', function(){
                $(".bulk_action input[name^='permission']").iCheck('check');
            })
            $('#permission-check-all').on('ifUnchecked', function(){
                $(".bulk_action input[name^='permission']").iCheck('uncheck');
            })
        })
    </script>
@endsection