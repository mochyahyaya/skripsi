@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
          </span> Grooming
        </h3>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">List Data Grooming</h4>
            <div class="card-description">
                <button type="button" class="btn btn-gradient-primary btn-fw" data-toggle="modal" data-target="#modal-insert">
                    Tambah Data
                  </button>
            </div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th> Nama Pet </th>
                  <th> Jenis Grooming</th>
                  <th> Price </th>
                  <th> Penjemputan </th>
                  <th> Status </th>
                  <th>  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    @foreach ($grooms as $value)
                    <td>{{$value->pets->name}}</td>
                    <td>{{$value->service}}</td>
                    <td>{{$value->price}}</td>
                    <td>{{$value->status}}</td>
                    <td>{{$value->pickup}}</td>
                    @endforeach
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      {{-- Insert Modal --}}
      <div class="modal fade" id="modal-insert">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Tambah Data</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" class="forms-sample">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="akses_id">
                        <div class="row">
                            <div class="form-group">
                                <label for="username">Nama Pemilik</label>
                                <select id="username" class="form-control select2bs4">
                                    <option value="" selected disabled>--Pilih Nama Pemilik--</option>
                                    @foreach ($users as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                              </div>
                        </div>
                        <div class="row">
                            <div class="forms-group">
                                <label for="" class="col-form-label">Nama Pet</label>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-gradient-secondary btn-fw" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-gradient-primary btn-fw tambah_data">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        // $('.select2bs4').select2({
        //   theme: 'bootstrap4'
        // })
    </script>
@endpush