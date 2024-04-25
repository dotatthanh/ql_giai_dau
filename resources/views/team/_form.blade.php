@csrf
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="name">Tên đội bóng <span class="text-danger">*</span></label>
            <input id="name" name="name" type="text" class="form-control" placeholder="Tên đội bóng" value="{{ old('name', $data_edit->name ?? '') }}">
            {!! $errors->first('name', '<span class="error">:message</span>') !!}
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="logo">Logo @if ($routeType == 'create')<span class="text-danger">*</span>@endif</label>
            <input id="logo" name="logo" type="file" class="form-control">
            {!! $errors->first('logo', '<span class="error">:message</span>') !!}
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Lưu lại</button>
<a href="{{ route('teams.index') }}" class="btn btn-secondary waves-effect">Quay lại</a>