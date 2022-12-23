@extends('admin_layout')
@section('admin_content')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <span class="breadcrumb-item active">Thống kê, báo cáo</span>
        </nav>
    </div>
</div>
<div>
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                            <i class="anticon anticon-dollar"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0" id="totalRevenue">{{$revenueStatistic}}</h2>
                            <p class="m-b-0 text-muted">Tổng doanh thu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-cyan">
                            <i class="anticon anticon-line-chart"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0" id="totalBenefit">{{$benefitStatistic}}</h2>
                            <p class="m-b-0 text-muted">Tổng lợi nhuận</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="col-md-6 col-lg-3" asp-area="Admin" asp-controller="AdminOrders"  asp-action="Index" >
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-gold">
                            <i class="anticon anticon-profile"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{$orderStatistic}}</h2>
                            <p class="m-b-0 text-muted">Đơn hàng</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a class="col-md-6 col-lg-3" asp-area="Admin" asp-controller="AdminCustomers"  asp-action="Index">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-purple">
                            <i class="anticon anticon-user"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{$cusStatistic}}</h2>
                            <p class="m-b-0 text-muted">Khách hàng</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <select class="form-control" style="width: 150px;" id="year">
                        @foreach ($yyyy as $key=>$item)
                            <option value="{{$item}}">Năm {{$item}} </option>
                        @endforeach
                    </select>
                    <figure class="highcharts-figure">
                        <div id="container1"></div>
                    </figure>
                </div>
            </div>
                
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <br>
                    <figure class="highcharts-figure" style="margin-top: 16px;">
                        <div id="container2"></div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Xếp hạng thương hiệu</h5>
                    </div>
                    <div class="d-flex align-items-center m-t-20">
                        <h1 class="m-b-0 m-r-10 font-weight-normal">4.5</h1>
                        <div class="star-rating m-t-15">
                            <input type="radio" id="star1-5" name="rating-1" value="5" checked disabled /><label for="star1-5" title="5 star"></label>
                            <input type="radio" id="star1-4" name="rating-1" value="4" disabled /><label for="star1-4" title="4 star"></label>
                            <input type="radio" id="star1-3" name="rating-1" value="3" disabled /><label for="star1-3" title="3 star"></label>
                            <input type="radio" id="star1-2" name="rating-1" value="2" disabled /><label for="star1-2" title="2 star"></label>
                            <input type="radio" id="star1-1" name="rating-1" value="1" disabled /><label for="star1-1" title="1 star"></label>
                        </div>
                    </div>
                    <p><span class="text-success font-weight-bold">+0.6</span> điểm so với tháng trước</p>
                    <div class="m-t-30" style="height: 150px">
                        <canvas class="chart" id="rating-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Sản phẩm bán chạy</h5>
                        <div>
                            <a href="javascript:void(0);" class="btn btn-sm btn-default">Xem tất cả</a>
                        </div>
                    </div>
                    <div class="m-t-30">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Mã</th>
                                        <th>Tên sản phẩm</th>
                                        <th>SL đã bán</th>
                                        <th>Tổng tiền</th>
                                        <th style="max-width: 70px">Tồn kho</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($topProId != null): ?>
                                        @for ($i=0; $i < count($topProId); $i++)
                                            <tr>
                                                <td class="proid"></td>
                                                <td>
                                                    <div class="media align-items-center">
                                                        <div class="avatar avatar-image rounded">
                                                            <img class="proimg" alt="">
                                                        </div>
                                                        <div class="m-l-10">
                                                            <span class="proname"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="sales"></td>
                                                <td class="earning"></td>
                                                <td>
                                                    <div class="progress progress-sm w-100 m-b-0">
                                                        <div class="progress-bar" ></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="stockLeft">
                                                    </div>
                                                </td>
                                            </tr>
                                        @endfor
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" align="center">Không có sản phẩm nào đã được bán.</td>
                                            <td><input type="hidden" class="proid" value="0"/></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <input id="memberStatistic" type="hidden" value="{{$memberStatistic}}" />
    <input id="guestStatistic" type="hidden" value="{{$guestStatistic}}" />

    @foreach ($revenueStatisticByMonth as $key=>$item)
    <input class="revenueStatisticByMonth" type="hidden" value="{{$item}}" />
    @endforeach
    @foreach ($benefitStatisticByMonth as $key=>$item)
    <input class="benefitStatisticByMonth" type="hidden" value="{{$item}}" />
    @endforeach

    @foreach ($topProId as $key=>$item)
    <input class="topProId" type="hidden" value="{{$item}}" />
    @endforeach
    @foreach ($topProImg as $key=>$item)
    <input class="topProImg" type="hidden" value="{{ $item->imgdata}}" />
    @endforeach
    @foreach ($topProName as $key=>$item)
    <input class="topProName" type="hidden" value="{{$item}}" />
    @endforeach
    @foreach ($topProSales as $key=>$item)
    <input class="topProSales" type="hidden" value="{{$item}}" />
    @endforeach
    @foreach ($topProEarning as $key=>$item)
    <input class="topProEarning" type="hidden" value="{{$item}}" />
    @endforeach
    @foreach ($topProStockLeft as $key=>$item)
    <input class="topProStockLeft" type="hidden" value="{{$item}}" />
    @endforeach
    
    @foreach ($yyyy as $key=>$item)
    <input class="yyyy" type="hidden" value="{{$item}}" />
    @endforeach

    <button type="button" onclick="window.print()" class="btn btn-warning m-r-5" style="float: right; width: 200px">
        In thống kê
    </button>
    <br />
</div>

<script>
    var a = $("#totalRevenue").text();
    a = a.replace('.00', '');
    a = Number(a).toLocaleString('en');
    $("#totalRevenue").text(a + ' đ');

    var b = $("#totalBenefit").text();
    b = b.replace('.00', '');
    b = Number(b).toLocaleString('en');
    $("#totalBenefit").text(b + ' đ');

    
   var a = parseInt($("#memberStatistic").val());
   var b = parseInt($("#guestStatistic").val());
    Highcharts.chart('container2', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Cơ cấu khách hàng'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Customers',
            colorByPoint: true,
            data: [{
                name: 'Thành viên',
                y: a,
                sliced: true,
                selected: true
            }, {
                name: 'Khách vãng lai',
                y: b
            }]
        }]
    });

    Highcharts.chart('container1', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Doanh số hàng tháng'
        },
        xAxis: {
            categories: [
                'Thg1',
                'Thg2',
                'Thg3',
                'Thg4',
                'Thg5',
                'Thg6',
                'Thg7',
                'Thg8',
                'Thg9',
                'Thg10',
                'Thg11',
                'Thg12'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Số tiền (triệu đồng)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} triệu</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Doanh thu',
            data: [parseFloat($(".revenueStatisticByMonth")[0].value)/1000000, parseFloat($(".revenueStatisticByMonth")[1].value)/1000000, parseFloat($(".revenueStatisticByMonth")[2].value)/1000000, parseFloat($(".revenueStatisticByMonth")[3].value)/1000000, parseFloat($(".revenueStatisticByMonth")[4].value)/1000000, parseFloat($(".revenueStatisticByMonth")[5].value)/1000000, parseFloat($(".revenueStatisticByMonth")[6].value)/1000000, parseFloat($(".revenueStatisticByMonth")[7].value)/1000000, parseFloat($(".revenueStatisticByMonth")[8].value)/1000000, parseFloat($(".revenueStatisticByMonth")[9].value)/1000000, parseFloat($(".revenueStatisticByMonth")[10].value)/1000000, parseFloat($(".revenueStatisticByMonth")[11].value)/1000000]
            
        }, {
            name: 'Lợi nhuận',
            data: [parseFloat($(".benefitStatisticByMonth")[0].value)/1000000, parseFloat($(".benefitStatisticByMonth")[1].value)/1000000, parseFloat($(".benefitStatisticByMonth")[2].value)/1000000, parseFloat($(".benefitStatisticByMonth")[3].value)/1000000, parseFloat($(".benefitStatisticByMonth")[4].value)/1000000, parseFloat($(".benefitStatisticByMonth")[5].value)/1000000, parseFloat($(".benefitStatisticByMonth")[6].value)/1000000, parseFloat($(".benefitStatisticByMonth")[7].value)/1000000, parseFloat($(".benefitStatisticByMonth")[8].value)/1000000, parseFloat($(".benefitStatisticByMonth")[9].value)/1000000, parseFloat($(".benefitStatisticByMonth")[10].value)/1000000, parseFloat($(".benefitStatisticByMonth")[11].value)/1000000]

        }]
    });


   
    if ($(".proid")[0].value != 0) {
        for (var i = 0; i < $(".earning").length; i++) {
            $(".proid")[i].innerHTML = $(".topProId")[i].value;
            $(".proimg")[i].src = "/public/upload/product/"+ $(".topProImg")[i].value;
            
            $(".proname")[i].innerHTML = $(".topProName")[i].value;
            $(".sales")[i].innerHTML = $(".topProSales")[i].value;
            $(".earning")[i].innerHTML = $(".topProEarning")[i].value;
            $(".stockLeft")[i].innerHTML = $(".topProStockLeft")[i].value;


            var c = $(".earning")[i].innerHTML;
            c = c.replace('.0000', '');
            c = Number(c).toLocaleString('en');
            $(".earning")[i].innerHTML = c + ' đ';

            var d = $(".stockLeft")[i].innerHTML;
            $(".progress-bar")[i].style.width = d + "%";

            if (d < 20) {
                $(".progress-bar")[i].style.backgroundColor = "red";
            } else if (d < 60) {
                $(".progress-bar")[i].style.backgroundColor = "yellow";
            } else {
                $(".progress-bar")[i].style.backgroundColor = "green";
            }
        }

    }

    $("#year option[value=" + $(".stockLeft")[0].value + "]").attr("selected",true);
    var g = window.location.pathname.split('/');
    var h = g[2];

    $("#year option[value=" + h + "]").attr("selected",true);
    $("#year").change(function(){
        var f =  $("#year").val();
        window.location = "/index-statistic/" + f;
    })
 
</script>
@endsection