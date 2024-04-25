<div class="card">
    <div class="card-body">

        <h4 class="card-title">Thông tin cơ bản</h4>
        <p class="card-title-desc">Điền tất cả thông tin bên dưới</p>
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="tournament_id">Tên giải đấu</label>
                    <select class="form-control select2" name="tournament_id" required="">
                        <option value="">Chọn giải đấu</option>
                        @foreach ($tournaments as $tournament)
                            <option value="{{ $tournament->id }}"
                                {{ isset($data_edit->tournament_id) && $data_edit->tournament_id == $tournament->id ? 'selected' : '' }}>
                                {{ $tournament->name }}</option>
                        @endforeach
                        {!! $errors->first('tournament_id', '<span class="error">:message</span>') !!}
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="team1_id">Đội 1</label>
                    <select class="form-control select2" name="team1_id">
                        <option value="">Chọn đội</option>
                        @foreach ($teams as $team)
                            <option value="{{ $team->id }}"
                                {{ isset($data_edit->team1_id) && $data_edit->team1_id == $team->id ? 'selected' : '' }}>
                                {{ $team->name }}</option>
                        @endforeach
                        {!! $errors->first('team1_id', '<span class="error">:message</span>') !!}
                    </select>
                </div>

                @if ($routeType == 'update')
                    <div class="form-group">
                        <label for="score_team1">Điểm đội 1</label>
                        <input id="name" name="score_team1" type="number" class="form-control"
                            placeholder="Điểm đội 1" value="{{ old('score_team1', $data_edit->score_team1 ?? '') }}">
                        {!! $errors->first('score_team1', '<span class="error">:message</span>') !!}
                    </div>
                @endif
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="team2_id">Đội 2</label>
                    <select class="form-control select2" name="team2_id">
                        <option value="">Chọn đội</option>
                        @foreach ($teams as $team)
                            <option value="{{ $team->id }}"
                                {{ isset($data_edit->team2_id) && $data_edit->team2_id == $team->id ? 'selected' : '' }}>
                                {{ $team->name }}</option>
                        @endforeach
                        {!! $errors->first('team2_id', '<span class="error">:message</span>') !!}
                    </select>
                </div>
                @if ($routeType == 'update')
                    <div class="form-group">
                        <label for="score_team2">Điểm đội 2</label>
                        <input id="name" name="score_team2" type="number" class="form-control"
                            placeholder="Điểm đội 2" value="{{ old('score_team2', $data_edit->score_team2 ?? '') }}">
                        {!! $errors->first('score_team2', '<span class="error">:message</span>') !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@if ($routeType == 'update')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-3">Mô tả <span class="text-danger">*</span></h4>

            <textarea id="description" class="summernote mb-2" name="description">{{ isset($data_edit->description) ? $data_edit->description : '' }}</textarea>
            {!! $errors->first('description', '<span class="error">:message</span>') !!}

        </div>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <div class="mt-3">
            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Lưu lại</button>
            <a href="{{ route('matchs.index') }}" class="btn btn-secondary waves-effect">Quay lại</a>
        </div>
    </div>
</div>
