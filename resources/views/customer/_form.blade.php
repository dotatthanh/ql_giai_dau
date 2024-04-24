@csrf
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="name">Họ và tên <span class="text-danger">*</span></label>
            <input id="name" name="name" type="text" class="form-control" placeholder="Họ và tên" value="{{ old('name', $data_edit->name ?? '') }}">
            {!! $errors->first('name', '<span class="error">:message</span>') !!}
        </div>

        <div class="form-group">
            <label for="gender">Giới tính <span class="text-danger">*</span></label>
            <div class="form-check form-check">
                <input type="radio" class="form-check-input" id="nam" name="gender" value="Nam" {{ isset($data_edit->gender) && $data_edit->gender == 'Nam' ? 'checked' : '' }} checked>
                <label class="form-check-label" for="nam">Nam</label>
            </div>
            <div class="form-check form-check">
                <input type="radio" class="form-check-input" id="nu" name="gender" value="Nữ" {{ isset($data_edit->gender)  && $data_edit->gender == 'Nữ' ? 'checked' : '' }}>
                <label class="form-check-label" for="nu">Nữ</label>
            </div>
            {!! $errors->first('gender', '<span class="error">:message</span>') !!}
        </div>

        <div class="form-group">
            <label for="birthday">Ngày sinh <span class="text-danger">*</span></label>
            <div class="docs-datepicker">
                <div class="input-group">
                    <input type="text" class="form-control docs-date" name="birthday" placeholder="Chọn ngày sinh" autocomplete="off" value="{{ old('birthday', isset($data_edit->birthday) ? date('d-m-Y', strtotime($data_edit->birthday)) : '') }}">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-secondary docs-datepicker-trigger" disabled="">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div class="docs-datepicker-container"></div>
            </div>
            {!! $errors->first('birthday', '<span class="error">:message</span>') !!}
        </div>

        @if ($routeType == 'create')
            <div class="form-group">
                <label for="userpassword">Mật khẩu <span class="text-danger">*</span></label>
                
                <div class="input-group" id="show_hide_password">
                    <input type="password" class="form-control" id="userpassword" placeholder="Nhập mật khẩu" autocomplete="new-password" name="password">
                    <div class="input-group-addon">
                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                    </div>
                </div>  
                {!! $errors->first('password', '<span class="error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label for="password_confirmation">Xác nhận mật khẩu <span class="text-danger">*</span></label>

                <div class="input-group" id="show_hide_password_confirmation">
                    <input type="password" class="form-control" id="password_confirmation" placeholder="Nhập xác nhận mật khẩu" name="password_confirmation">
                    <div class="input-group-addon">
                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                    </div>
                </div>        
            </div>

        @endif
        
        <div class="form-group">
            <label for="university">Trường đại học</label>
            <input id="university" name="university" type="text" class="form-control" placeholder="Trường đại học" value="{{ old('university', $data_edit->university ?? '') }}">
            {!! $errors->first('university', '<span class="text-danger">:message</span>') !!}
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="email">Email <span class="text-danger">*</span></label>
            <input id="email" name="email" type="text" class="form-control" placeholder="Email" value="{{ old('email', $data_edit->email ?? '') }}">
            {!! $errors->first('email', '<span class="error">:message</span>') !!}
        </div>

        <div class="form-group">
            <label for="avatar">Ảnh đại diện</label>
            <input id="avatar" name="avatar" type="file" class="form-control">
            {!! $errors->first('avatar', '<span class="error">:message</span>') !!}
        </div>

        <div class="form-group">
            <label for="phone">Số điện thoại <span class="text-danger">*</span></label>
            <input id="phone" name="phone" type="number" min="0" class="form-control" placeholder="Số điện thoại" value="{{ old('phone', $data_edit->phone ?? '') }}">
            {!! $errors->first('phone', '<span class="error">:message</span>') !!}
        </div>

         <div class="form-group">
            <label for="province_id">Tỉnh/Thành phố <span class="text-danger">*</span></label>
            <select name="province_id" id="province_id" class="form-control" onchange="getDistricts($(this).val())">
                @foreach ($provinces as $province)
                <option value="{{ $province->id }}">{{ $province->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('province_id', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group">
            <label for="district_id">Quận/Huyện <span class="text-danger">*</span></label>
            <select name="district_id" id="district_id" class="form-control">
                @foreach($provinces->first()->districts as $districts)
                    <option value="{{ $districts->id }}">{{ $districts->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('district_id', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group">
            <label for="address">Địa chỉ <span class="text-danger">*</span></label>
            <input id="address" name="address" type="text" class="form-control" placeholder="Địa chỉ" value="{{ old('address', $data_edit->address ?? '') }}">
            {!! $errors->first('address', '<span class="error">:message</span>') !!}
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Lưu lại</button>
<a href="{{ route('customers.index') }}" class="btn btn-secondary waves-effect">Quay lại</a>