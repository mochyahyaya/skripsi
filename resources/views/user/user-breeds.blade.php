@extends('layouts.user')

@section('content')
    <section id="features" class="features section-bg">
        <div class="" id="modal-create">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Grooming</h6>
                    </div>
                    <form action="" method="post" class="forms-sample">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="forms-group">
                                    <label for="username">Nama Pemilik</label>
                                    <select id="username" class="form-control select2bs4">
                                        <option value="" selected disabled>--Pilih Nama Pemilik--</option>
                                        {{-- @foreach ($users as $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach --}}
                                    </select>
                                  </div>
                            </div>
                            <div class="row">
                                <div class="forms-group">
                                    <label for="petname" class="col-form-label">Nama Pet</label>
                                    <select id="petname" class="form-control select2bs4" name="petname">
                                      <option value="" selected disabled>--Pilih Nama Pet--</option>
                                      {{-- @foreach ($pets as $value)
                                          <option value="{{$value->id}}">{{$value->name}}</option>
                                      @endforeach --}}
                                  </select>
                                </div>
                            </div>
                            <div class="row">
                              <div class="forms-group">
                                  <label for="service" class="col-form-label">Jenis Grooming</label>
                                  <select id="service" name="service" class="form-control select2bs4">
                                    <option value="" selected disabled>--Pilih Grooming--</option>
                                    <option value="Lengkap">Lengkap</option>
                                    <option value="Jamur">Jamur</option>
                                    <option value="Kutu">Kutu</option>
                                </select>
                              </div>
                            </div>
                            <div>
                              <input type="hidden" name="price" id="price">
                            </div>
                          </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary btn-fw tambah_data">Grooms</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>
     </section><!-- End App Features Section -->
@endsection

@push('scripts')

@endpush 