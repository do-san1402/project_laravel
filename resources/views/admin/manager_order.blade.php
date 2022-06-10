@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
        Danh sách đơn hàng
        </div>
        <div class="row w3-res-tb">
        
        <div class="col-sm-4">
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
                
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Thời gian đặt hàng</th>
                <th>Tình trạng đơn hàng</th>
                <th style="width:30px;"></th>
            </tr>
            </thead>
            <tbody>
            <?php
                $stt = 0;
            ?>
            @foreach($all_order as $key => $ord)
            <?php
                $stt++;
            ?>
            <tr>
                <td>{{$stt}}</td>
                <td>{{$ord ->order_code}}</td>
                <td>{{$ord ->created_at}}</td>
                <td>
                    
                    @if($ord->order_status == 1) 
                        Đơn hàng mới
                    @elseif($ord->order_status == 2)
                       Đã giao
                    @else
                        Đã hũy
                    @endif
                </td>
                
                
                
                    



               
                <td>
                    <a href="{{url('/edit-order/'.$ord ->order_code)}}" class="active" ui-toggle-class="">
                        <i class="fa fa-check text-success text-active"></i>
                    </a>
                    <a href="{{url('/delete-order/'.$ord->order_code)}}" onclick="return confirm('Bạn có chắc xóa sản phẩm này?')" class="active" ui-toggle-class="">
                      
                        <i class="fa-solid fa-delete-left"></i>
                    </a>
                </td>
            </tr>
           @endforeach
            </tbody>
        </table>
        </div>
        
    </div>
</div>
@endsection