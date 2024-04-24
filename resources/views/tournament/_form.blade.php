<div class="card">
    <div class="card-body">

        <h4 class="card-title">Thông tin cơ bản</h4>
        <p class="card-title-desc">Điền tất cả thông tin bên dưới</p>
        @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="name">Tiêu đề <span class="text-danger">*</span></label>
                    <input id="name" name="name" type="text" class="form-control" placeholder="Tiêu đề" value="{{ old('name', $data_edit->name ?? '') }}">
                    {!! $errors->first('name', '<span class="error">:message</span>') !!}
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="image">Ảnh @if ($routeType == 'create')<span class="text-danger">*</span>@endif</label>
                    <input id="image" name="image" type="file" class="form-control">
                    {!! $errors->first('image', '<span class="error">:message</span>') !!}
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="group_number">Số bảng đấu <span class="text-danger">*</span></label>
                    <input id="group_number" name="group_number" type="number" class="form-control" value="{{ old('group_number', $data_edit->group_number ?? '') }}">
                    {!! $errors->first('group_number', '<span class="error">:message</span>') !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-3">Mô tả <span class="text-danger">*</span></h4>

        <textarea id="description" class="summernote mb-2" name="description">{{ isset($data_edit->description) ? $data_edit->description : '' }}</textarea>
        {!! $errors->first('description', '<span class="error">:message</span>') !!}

        <div class="mt-3">
            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Lưu lại</button>
            <a href="{{ route('tournaments.index') }}" class="btn btn-secondary waves-effect">Quay lại</a>
        </div>
    </div>

</div>