@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm user
                </header>
                @php
                    $status = session() -> get('message_success');
                    if($status) {
                        echo " <div class='alert alert-success' role='alert'>$status</div>";
                        session() -> put('message_success' , null);
                            
                    }
                @endphp
                
                
                
                
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{url('add-user')}}" method="post">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên user</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="admin_name">
                            @error('admin_name') 
                                <small class="form-text text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email uers</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="admin_email">
                            @error('admin_email') 
                                <small class="form-text text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="admin_phone">
                            @error('admin_phone') 
                                <small class="form-text text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" class="form-control" id="exampleInputEmail1"  name="admin_password">
                            @error('admin_password') 
                                <small class="form-text text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                        <button type="submit" name="add_brand_product" class="btn btn-info">Thêm user</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
    
</div>
@endsection