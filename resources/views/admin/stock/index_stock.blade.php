@extends('admin_layout')
@section('admin_content')
<div class="page-header">
     <h2 class="header-title">Brili Fresh</h2>
     <div class="header-sub-title">
          <nav class="breadcrumb breadcrumb-dash">
               <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i
                         class="anticon anticon-home m-r-5"></i>Trang chủ</a>
               <span class="breadcrumb-item active">Quản lý kho</span>
          </nav>
     </div>
</div>

<div class="card">
     <div class="card-body">
          <div class="row m-b-30">
               <div class="col-lg-8">
                    <div class="d-md-flex">
                         <div class="m-b-10 m-r-15">
                         <b>Mã cửa hàng</b>
                              <select id="store" class="form-control">
                                   <option value="" selected>Tất cả</option>
                                   @foreach ($insert_store_id as $key =>$store_id)
                                   <option value="{{$store_id->StoreID}}">{{$store_id->StoreID}} </option>
                                   @endforeach
                              </select>
                         </div>
                         <div class="m-b-10 m-r-15" style="margin-left: 12px">
                        <b>Tình trạng tồn kho</b>
                        <select id="status" class="form-control" >
                            <option value="" selected>Tất cả</option>
                            <option value="1">Còn hàng</option>
                            <option value="2">Hết hàng</option>
                        </select>
                    </div>
                    </div>
               </div>
               <div class="col-lg-4 text-right">
                    <button class="btn btn-primary" id="createbtn">
                         <i class="anticon anticon-plus-circle m-r-5"></i>
                         <span>Thêm mới kho</span>
                    </button>
               </div>
          </div>
          <div style="float: right;">
               <div>
                    <span
                         style="background-color: #FFFFFF; height: 20px; width: 20px; border-radius: 50%; border: 1px solid; display: inline-block;"></span>
                    <label style="float: right; margin-left: 8px; margin-bottom: 4px;"
                         class="text-dark font-weight-semibold">Còn hàng</label>
               </div>
               <div>
                    <span
                         style="background-color: #ffa8a8; height: 20px; width: 20px; border-radius: 50%; border: 1px solid; display: inline-block;"></span>
                    <label style="float: right; margin-left: 8px;" class="text-dark font-weight-semibold">Hết
                         hàng</label>
               </div>
          </div>
          <div class="table-responsive">
               <table class="table table-hover e-commerce-table">
                    <thead>
                         <tr>
                              <th>ID cửa hàng</th>
                              <th style="width: 300px;">Địa chỉ</th>
                              <th>ID sản phẩm</th>
                              <th>Tên sản phẩm</th>
                              <th>Số lượng</th>
                              <th></th>
                         </tr>
                    </thead>
                    <tbody>
                         @foreach($index_stock as $key =>$stock)
                         <tr class="rowitem">
                              <td  class="storeId" >{{$stock->StoreID}}</td>
                              <td>{{$stock->Store_SpecificAddress}}, {{$stock->Store_Ward}}, {{$stock->Store_District}},
                                   {{$stock->Store_City}}</td>

                              <td>{{$stock->ProID}}</td>
                              <td>{{$stock->Pro_ProName}}</td>
                              <td class="quantity"> {{$stock->Quantity}}</td>

                              <td class="text-left">
                                   <a href="/edit-stock/{{$stock->StoreID}}/{{$stock->ProID}}"
                                        class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                        <i class="anticon anticon-edit"></i>
                                   </a>
                                   <a href="/delete-stock/{{$stock->StoreID}}/{{$stock->ProID}}"
                                        class="btn btn-icon btn-hover btn-sm btn-rounded">
                                        <i class="anticon anticon-delete"></i>
                                   </a>
                                   <a href="/detail-stock/{{$stock->StoreID}}/{{$stock->ProID}}">
                                        Xem chi tiết
                                   </a>
                              </td>
                         </tr>
                         @endforeach
                    </tbody>
               </table>
          </div>
     </div>
</div>


<script>
$('#store, #status').change(function(){
        var a = $('#store').val();
        var b = $('#status').val();
        $(".rowitem").show();
        for (var i = 0; i < $(".storeId").length; i++) {
            var c = $(".storeId")[i].innerText;
            var d = $(".quantity")[i].innerText;
            if (((a!=c)&&a!="") || ((b==1) && (d==0)) || ((b==2) && (d!=0))) {
                $(".rowitem")[i].style.display = 'none';
            }
        }
    })

$('#createbtn').click(function() {
     var a = $('#store').val();
     window.location.href = "/index.php/create-stock/" + a;
})

for (var i = 0; i < $('.quantity').length; i++) {
     if ($('.quantity')[i].innerHTML == 0) {
          $('.rowitem')[i].style.backgroundColor = "#ffa8a8";
          $('.rowitem')[i].style.color = "#FFFFFF";
     }
}
</script>
@endsection