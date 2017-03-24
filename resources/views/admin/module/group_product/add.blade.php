<div class=" form-group has-success has-feedback add">
    <button id="add1" class="btn btn-primary btn-add">Thêm mới <i class="icon-arrow-right14 position-left"></i></button>
    <form action="{{route('admin.groupproduct.postAdd')}}" id="add" class="form-validate-jquery" method="post" novalidate="novalidate"
          enctype="multipart/form-data">
        <?php if (isset($_GET['number'])) {
            $number = $_GET['number'];
        } else {
            $number = 0;
        }
        ?>
        @for($i=0;$i<=$number;$i++)
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h2 class="panel-title" style="text-align: center">Thêm mới danh mục thứ {{$i}}</h2>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse" class="rotate-180"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                                <legend class="text-semibold"><i class="icon-info3 position-left"></i> Thông tin
                                    chung
                                </legend>
                                <div class="form-group">

                                    <label>Enter your name:</label>
                                    <input type="text" id="name{{$i}}" name="name[]" required="required" class="form-control checkUnique" placeholder="">
                                    @if($errors->has('name.'.$i))
                                       <p style="color: red">{{$errors->first('name.'.$i)}}</p>
                                        @endif
                                    <p style="color:red" class="error1"></p>
                                </div>

                                <div class="form-group">
                                    <label>Chọn công ty:</label>
                                    <select id="company{{$i}}" data-placeholder="Chọn công ty" required="required" name="company[]" class="select">
                                        {{--<option></option>--}}
                                        @foreach($company as  $cp)
                                        <option value="{{$cp->id}}">{{$cp->name}}</option>
                                            @endforeach
                                    </select>
                                    @if($errors->has('company'))
                                        {{$errors->first('company')}}
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="describe">Mô tả</label>
                                        <textarea rows="5" cols="5" id="describe{{$i}}" name="describe[]" class="form-control describe"
                                      required  ></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="text-semibold">Trạng thái</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status[{{$i}}]" value="1" class="styled" required="required"
                                                   checked>
                                            Đang hoạt động
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status[{{$i}}]" value="0" class="styled" required="required">
                                            Ngừng hoạt động
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-md-6">
                            <fieldset>
                                <legend class="text-semibold"><i class="icon-image2 position-left"></i> Ảnh
                                </legend>
                                <div class="form-group">
                                    <label for="image{{$i}}">Chọn ảnh:</label>
                                    <input type="file" id="image{{$i}}" name="image[]" class="file-input"
                                           data-show-upload="false" data-show-caption="true"
                                           data-show-preview="true">
                                </div>
                                @if($errors->has('image'))
                                    {{$errors->first('image')}}
                                @endif

                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="number" value="{{$number}}">
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
        {{--@endif--}}
        <div class="text-left">
            <button id="add" class="btn btn-primary btn-add">Thêm mới <i class="icon-arrow-right14 position-left"></i></button>
        </div>
    </form>

</div>
<script type="text/javascript" src="{{url('public/admin/assets/js/plugins/loaders/blockui.min.js')}}"></script>

<script type="text/javascript" src="{{url('public/admin/assets/js/pages/form_select2.js')}}"></script>

{{--<script type="text/javascript" src="{{url('public/admin/assets/js/plugins/forms/selects/select2.min.js')}}"></script>--}}

<script type="text/javascript" src="{{url('public/admin/assets/js/pages/uploader_bootstrap.js')}}"></script>
<script type="text/javascript" src="{{url('public/admin/assets/js/pages/form_validation.js')}}"></script>
