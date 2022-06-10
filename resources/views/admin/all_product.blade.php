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
                <th>Tên sản phẩm</th>
                <th>SL sản phẩm</th>
                <th>Hiển thị</th>
                <th>Giá</th>
                <th>Ảnh</th>
                <th>Danh mục</th>
                <th>Thương hiệu</th>
                <th style="width:30px;"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($all as $key => $value)
            <tr>
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{$value ->product_name}}</td>
                <td>{{$value ->product_quantity}}</td>
                <td>
                    
                    <span class="text-ellipsis">
                        <?php
                        if($value ->product_status == 0 ) {
                           ?>
                                <a href="{{url('/active-product/'.$value ->id )}}"><i class="fa-thumbs-styling fa fa-thumbs-down"></i></a>
                           <?php
                        }else {
                           ?>
                           <a href="{{url('/unactive-product/'.$value ->id )}}"><i class="fa-thumbs-styling fa fa-thumbs-up"></i></a>
                           <?php
                        }
                        ?>
                    </span>
                </td>
                <td>{{$value ->product_price}}đ</td>
                <td><img src="{{asset('/uploads/product').'/'.$value ->product_image}}" alt="" width="100px" height="100px"></td>
                
                
                    <td>{{$all_bonus ->category_name}}</td>
                    <td>{{$all_bonus ->brand_name}}</td>



                <td><span class="text-ellipsis">{{$value ->created_at}}</span></td>
                <td>
                    <a href="{{url('/edit-product/'.$value ->id)}}" class="active" ui-toggle-class="">
                        <i class="fa fa-check text-success text-active"></i>
                    </a>
                    <a href="{{url('/delete-product/'.$value->id)}}" onclick="return confirm('Bạn có chắc xóa sản phẩm này?')" class="active" ui-toggle-class="">
                        <i class="fa fa-times text-danger text"></i>
                    </a>
                </td>
            </tr>
           @endforeach
            </tbody>
        </table>
        <form action="{{url('import-csv-product')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <input type="file" name="file" accept=".xlsx"><br>
         <input type="submit" value="Import file Execl" name="import_csv" class="btn btn-warning">
          </form>
         <form action="{{url('export-csv-product')}}" method="POST">
            @csrf
         <input type="submit" value="Export file Excel" name="export_csv" class="btn btn-success">
        </form>
  
        </div>
        <footer class="panel-footer">
        <div class="row">
            
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
        </div>
        </footer>
    </div>
</div>
@endsection