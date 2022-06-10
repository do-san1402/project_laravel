@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Quản lý banner
        </div>
        <div class="row w3-res-tb">
       
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
            
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
                
                <th>Tên banner</th>
                <th>Mô tả banner</th>
                <th>Slide ảnh</th>
                <th>Hiển thị</th>
                <th style="width:30px;"></th>

            </tr>
            </thead>
            <tbody>
            @foreach($all_banner as $key => $value)
            <tr>
                
                <td>{{$value ->slide_name}}</td>
                
                <td><span class="text-ellipsis">{!!$value ->slide_desc!!}</span></td>
                
                <td><img src="{{asset('/uploads/banner').'/'.$value ->image}}" alt="" width="100px" height="100px"></td>
                <td>
                    
                    <span class="text-ellipsis">
                        <?php
                        if($value ->status == 0 ) {
                           ?>
                                <a href="{{url('/active-slide/'.$value ->id )}}"><i class="fa-thumbs-styling fa fa-thumbs-down"></i></a>
                           <?php
                        }else {
                           ?>
                           <a href="{{url('/unactive-slide/'.$value ->id )}}"><i class="fa-thumbs-styling fa fa-thumbs-up"></i></a>
                           <?php
                        }
                        ?>
                    </span>
                </td>
                <td>
                    <a href="{{url('/edit-banner/'.$value ->id)}}" class="active" ui-toggle-class="">
                        <i class="fa fa-check text-success text-active"></i>
                    </a>
                    <a href="{{url('/delete-slide/'.$value ->id)}}" onclick="return confirm('Bạn có chắc xóa slide này?')" class="active" ui-toggle-class="">
                        <i class="fa fa-times text-danger text"></i>
                    </a>
                </td>
                
            </tr>
           @endforeach
            </tbody>
        </table>
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