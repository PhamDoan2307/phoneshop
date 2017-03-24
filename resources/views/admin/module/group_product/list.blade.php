@extends('admin.master')
@section('title')
    Danh sách loại sản phẩm
@endsection
@section('content')
    <div class="content-wrapper">

        <!-- Page header -->
        @include('admin.blocks.page-header')
                <!-- /page header -->
        <!-- Content area -->
        <div class="content">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <select data-placeholder="Chọn số lượng muốn thêm" name="number" class="select">
                                <option></option>
                                @for($i=1;$i<=20;$i++)
                                    <option value="{{$i-1}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        Đã có lỗi xảy ra!Vui lòng xem lại:
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="jui-tabs-basic ui-tabs ui-widget ui-widget-content ui-corner-all">
                    <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all"
                        role="tablist">
                        <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab"
                            tabindex="0" aria-controls="tabs-basic-1" aria-labelledby="ui-id-91" aria-selected="true"
                            aria-expanded="true"><a href="#tabs-basic-3" class="ui-tabs-anchor" role="presentation"
                                                    tabindex="-1" id="ui-id-91"><i class="icon-menu7 position-left"></i>
                                Danh sách loại sản phẩm</a></li>
                        <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-basic-2"
                            aria-labelledby="ui-id-92" aria-selected="false" aria-expanded="false"><a
                                    href="#tabs-basic-2" class="ui-tabs-anchor" role="presentation" tabindex="-1"
                                    id="ui-id-92">Thêm mới loại sản phẩm<i class="icon-mention position-right"></i></a>
                        </li>
                        {{--<li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-basic-3" aria-labelledby="ui-id-93" aria-selected="false" aria-expanded="false"><a href="#tabs-basic-3" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-93"><i class="icon-gear"></i></a></li>--}}
                    </ul>
                    <div id="tabs-basic-3"  aria-labelledby="ui-id-91"
                         class="ui-tabs-panel ui-widget-content ui-corner-bottom getAdd" role="tabpanel" aria-hidden="false"
                         style="display: block;">

                        <div id="modal_iconified" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title"><i class="icon-menu7"></i> &nbsp;Modal with icons
                                        </h5>
                                    </div>

                                    <div class="modal-body">
                                        <div class="alert alert-info alert-styled-left text-blue-800 content-group">
                                            <span class="text-semibold">Here we go!</span> Example of an alert
                                            inside modal.
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                        </div>

                                        <h6 class="text-semibold"><i class="icon-law position-left"></i> Sample
                                            heading with icon</h6>
                                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio,
                                            dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac
                                            consectetur ac, vestibulum at eros.</p>

                                        <hr>

                                        <p><i class="icon-mention position-left"></i> Aenean lacinia bibendum nulla
                                            sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl
                                            consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus
                                            auctor fringilla.</p>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross"></i>
                                            Close
                                        </button>
                                        <button id="save" class="btn btn-primary"><i class="icon-check"></i> Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /iconified modal -->
                        <div class="panel panel-primary readList">
                            <div class="panel-heading">
                                <h3 class="panel-title">Danh sách loại sản phẩm</h3>
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                        <li><a data-action="close"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <table class="table datatable-save-state">
                                <thead>
                                <tr>
                                    {{--<th>First Name</th>--}}
                                    <th>Tên loại sản phẩm</th>
                                    <th>Tên công ty</th>
                                    <th>Mô tả</th>
                                    <th>Ngày tạo</th>
                                    <th>Trạng thái</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $dt)
                                    <tr>
                                        {{--<td>Marth</td>--}}
                                        <td><a href="#">{{$dt->name}}</a></td>
                                        <td>{{$dt->company->name}}</td>
                                        <td>{{$dt->describe}}</td>
                                        <td>{{changeDate($dt->created_at)}}</td>
                                        <td>@if($dt->status==1)<span
                                                    class="label label-success">Đang hoạt động</span> @else <span
                                                    class="label label-warning">Ngừng hoạt đông</span> @endif</td>
                                        <td class="text-center">
                                            <ul class="icons-list">
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>

                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a data-toggle="modal" id="{{$dt->id}}"
                                                               data-target="#modal_iconified"><i
                                                                        class="icon-file-pdf"></i> Sửa</a></li>
                                                        <li><a href="#"><i class="icon-file-excel"></i> Xóa</a></li>
                                                        {{--<li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>--}}
                                                    </ul>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{--{{ $data->links() }}--}}
                        </div>

                    </div>
                    <div id="tabs-basic-2" aria-labelledby="ui-id-92"
                         class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-hidden="true"
                         style="display: none;">
                        <!-- Iconified modal -->
                        <div class="getAdd1">
                            @include('admin.module.group_product.add')
                        </div>

                    </div>
                </div>
            </div>
            <!-- Footer -->
            <div class="footer text-muted">
                © 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov"
                                                                    target="_blank">Eugene Kopyov</a>
            </div>
            <!-- /footer -->

        </div>
        <!-- /content area -->

    </div>
    <script>
        $(document).ready(function () {
           {{--getAdd();--}}
            {{--function getAdd() {--}}
                {{--$.ajax({--}}
                    {{--type: 'post',--}}
                    {{--dataType: 'html',--}}
                    {{--url: '{{url('admin/groupproduct/add')}}',--}}
                    {{--success: function (data) {--}}
                        {{--$('.getAdd').html(data)--}}
                    {{--}--}}
                {{--})--}}
            {{--}--}}

            $('select[name=number]').on('change',function(){
               var number=$(this).val();
               $.ajax({
                   type:'get',
                   data:{number:number},
                   url:'groupproduct/add',
                   success: function (data) {
                       $('.getAdd1').empty();
                       $('.getAdd1').append(data);
                   }
               })
           });
            $('input[name="name[]"]').keyup(function () {
               var name=$(this).val();
                var token=$('input[name="_token"]').val();
                $.ajax({
                    type:"post",
                    url:'groupproduct/checkName',
                    data:{name:name,_token:token},
//                    dataType:'json',
                    success:function(data){
                        $('.error1').html(data)
                    }
                })
            });
            $('#save').click(function () {
                $('.navbar-top').removeClass('modal-open');
                $('.modal-backdrop').css('display', 'none');
                $('#modal_iconified').removeClass('in').css('display', 'none');

            });

//                $('.btn-add').click(function () {
//                    var name=$('#name').val();
//                    var company_id = $('select#company').val();
////                    var describe=$('.describe');
////                    $('.describe').each(function () {
////                        alert($(this).val());
////                    });
////                    alert(describe)
//                })

        })
    </script>
@endsection