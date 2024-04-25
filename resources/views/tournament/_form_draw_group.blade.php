<div class="card">
    <div class="card-body">

        @csrf
        <h4 class="card-title">Thông tin cơ bản</h4>
        <p class="card-title-desc">Điền tất cả thông tin bên dưới</p>

    </div>
</div>


<div class="card repeater">
    <div class="card-body">
        <h4 class="card-title mb-4">Danh sách đội</h4>
        {!! $errors->first('group_teams', '<span class="error">:message</span>') !!}

        <div data-repeater-list="group_teams">
            @if ($group->groupTeams->count() > 0)
                @foreach ($group->groupTeams as $item)
                <div data-repeater-item class="row">
                    <div class="form-group col-lg-9 custom-validate-select">
                        <label for="name">Tên đội bóng</label>
                        <select class="form-control select2" name="team_id" required="">
                            <option value="">Chọn đội bóng</option>
                            @foreach ($teams as $team)
                            <option value="{{ $team->id }}" {{ isset($item->team_id) && $item->team_id == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <label>Thao tác</label>
                        <input data-repeater-delete="" type="button" class="btn btn-danger btn-block" value="Xóa">
                    </div>
                </div>
                @endforeach
            @else
            <div data-repeater-item="" class="row">
                <div class="form-group col-lg-9 custom-validate-select">
                    <label for="name">Tên đội bóng</label>
                    <select class="form-control select2" name="team_id" required="">
                        <option value="">Chọn đội bóng</option>
                        @foreach ($teams as $team)
                        <option value="{{ $team->id }}" {{ isset($data_edit->team_id) && $data_edit->team_id == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-3">
                    <label>Thao tác</label>
                    <input data-repeater-delete="" type="button" class="btn btn-danger btn-block" value="Xóa">
                </div>
            </div>
            @endif
        </div>
        <input data-repeater-create="" type="button" class="btn btn-success mt-3 mt-lg-0" value="Thêm">
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="mt-3">
            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Lưu lại</button>
            <a href="{{ route('tournaments.draw', $group->tournament) }}" class="btn btn-secondary waves-effect">Quay lại</a>
        </div>
    </div>
</div>
