<div class="card">
    <div class="card-body">

        @csrf
        <h4 class="card-title">Thông tin cơ bản</h4>
        <p class="card-title-desc">Điền tất cả thông tin bên dưới</p>
        
        {!! $errors->first('prescription_details', '<span class="error">:message</span>') !!}

        {{-- <div data-repeater-list="prescription_details" class="row">
            <div data-repeater-item="" class="col-4">
                <div class="row">
                    <div class="form-group col-lg-9 custom-validate-select">
                        <label for="name">Tên đội bóng</label>
                        <select class="form-control select2" name="medicine_id" required="">
                            <option value="">Chọn đội bóng</option>
                            @foreach ($teams as $team)
                            <option value="{{ $team->id }}" {{ isset($data_edit->medicine_id) && $data_edit->medicine_id == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <label>Thao tác</label>
                        <input data-repeater-delete="" type="button" class="btn btn-danger btn-block" value="Xóa">
                    </div>
                </div>

            </div>
        </div>
        <input data-repeater-create="" type="button" class="btn btn-success mt-3 mt-lg-0" value="Thêm"> --}}

        
    </div>
</div>



<div>
    <div data-repeater-list="outer-group" class="outer">
        <div data-repeater-item  class="outer" >
          <input type="text" name="text-123" value="A" class="outer" style="display:none"/>
          <input data-repeater-delete type="button" value="Delete" class="outer" style="display:none"/>
          <div class="inner-repeater">
            <div data-repeater-list="inner-group" class="inner">
              <div data-repeater-item class="inner">
                <input type="text" name="inner-text-input" value="B" class="inner"  />
                <input data-repeater-delete type="button" value="Delete" class="inner"/>
              </div>
            </div>
            <input data-repeater-create type="button" value="Add" class="inner"/>
          </div>
        </div>
      </div>
      <input data-repeater-create type="button" value="Add" class="outer"/>
</div>


<div class="card">
    <div class="card-body">
        <div class="mt-3">
            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Lưu lại</button>
            <a href="{{ route('tournaments.index') }}" class="btn btn-secondary waves-effect">Quay lại</a>
        </div>
    </div>

</div>
