@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
        Danh sách sản phẩm
        </div>
        <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
            <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
            </select>
            <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
            <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
                <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
            </div>
        </div>
        </div>
        <div class="table-responsive">
            <?php
                $status = session() -> get('message_all');
                    if($status) {
                        echo " <div class='alert alert-success' role='alert'>$status</div>";
                        session() -> put('message_all', null); 
                    }
              
            ?>
        <table class="table table-striped b-t b-light">
            <thead>
            <tr>
                <th style="width:20px;">
                <label class="i-checks m-b-none">
                    <input type="checkbox"><i></i>
                </label>
                </th>
                <th>Tên User</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th>Auth</th>
                <th>Admin</th>
                <th>User</th>
                <th style="width:30px;"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($admin as $key => $value)
            <form action="{{url('/assign-roles')}}" method="POST">
                @csrf
                <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>{{$value ->admin_name}}</td>
                    <td>{{$value ->admin_email}} <input type="hidden" name="admin_email" value="{{$value ->admin_email}}"> <input type="hidden" name="admin_id" value="{{$value ->id}}"></td>
                    <td>{{$value ->admin_phone}}</td>
                    <td>{{$value ->admin_password}}</td>
                    <td>
                        <input type="checkbox" name="author_role" {{$value -> hasRoles('author') ? 'checked' : ''}}>
                    </td>
                    <td>  
                        <input type="checkbox" name="admin_role" {{$value -> hasRoles('admin') ? 'checked' : ''}}>
                    </td>
                    <td>  
                        <input type="checkbox" name="user_role" {{$value -> hasRoles('user') ? 'checked' : ''}}>
                    </td>
                    <td style="display:flex">
                        <p><input type="submit" value="Phân quyền" class="btn btn-sm btn-default"></p>
                        <a class="btn btn-sm btn-danger" href="{{url('delete-user-roles/'.$value->id)}}">Xóa User</a>
                    </td>
                </tr>
            </form>
           @endforeach
            </tbody>
        </table>
        {{-- <form action="{{url('import-csv-product')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <input type="file" name="file" accept=".xlsx"><br>
         <input type="submit" value="Import file Execl" name="import_csv" class="btn btn-warning">
          </form>
         <form action="{{url('export-csv-product')}}" method="POST">
            @csrf
         <input type="submit" value="Export file Excel" name="export_csv" class="btn btn-success">
        </form> --}}
  
        </div>
        <footer class="panel-footer">
        {{-- <div class="row">
            
            <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
                <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                <li><a href="">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
            </div>
        </div> --}}
        </footer>
    </div>
</div>
@endsection