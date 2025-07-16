@extends('template.template')

@section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif
    {{-- @dd($ls, $c) --}}
    <div class="row">
    <!-- DOM/Jquery table start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header py-2">
                <h3>Leadsheet : {{$ls[0]['kodeLeadsheet']}}</h3>
            </div>
            <div class="card-body">
                <div class="top my-2 border-bottom">
                    <h5>
                        <strong class="me-5">Risiko</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        {{-- @dd($ls) --}}
                        @php
                            $r = App\Models\Risk::where('kodeCA', $ls[0]['kodeTestCA'])->first();
                            echo $r->risk;
                        @endphp
                    </h5>
                    <h5>
                        <strong class="me-5">Objective</strong>:
                        @php
                            $o = App\Models\Co_Act::with('co_obj')->where('kodeCA', $ls[0]['kodeTestCA'])->first();
                            echo $o->co_obj->control_obj;
                        @endphp
                    </h5>
                    <h5><strong class="me-5">MC 01 01</strong>&nbsp;: Perusahaan memiliki proses pengembangan/pengadaan sistem yang lengkap dan memadai.</h5>
                </div>
                <div class="bottom">
                    {{-- <h5>Kriteria:</h5> --}}
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Activity</th>
                                <th class="text-center">Dijalankan</th>
                                <th class="text-center">SOP</th>
                                <th class="text-center">Penjelasan</th>
                                <th class="text-center">Attachments</th>
                                <th class="text-center">
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahActivity">Tambah Activity</button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="/understanding/{{'kodenya'}}">
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center"><input class="form-control" type="text" name="kriteria1" id="kriteria1" data-kriteria-act="kriteria1" required></td>
                                    <td class="text-center">
                                        <select class="form-control" name="kriteria1Done" id="kriteria1Done" required>
                                            <option value="" disabled selected></option>
                                            <option value="0">Tidak</option>
                                            <option value="1">Ya</option>
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <select class="form-control" name="kriteria1sop" id="kriteria1sop" required>
                                            <option value="" disabled selected></option>
                                            <option value="0">Tidak</option>
                                            <option value="1">Ya</option>
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Berikan penjelasan" id="kriteria1Penjelasan" style="height: 10px !important;"></textarea>
                                            <label for="kriteria1Penjelasan">Penjelasan / Evidence</label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="row">
                                            <div class="col">
                                                <input class="form-control" type="file" id="formFileMultiple" name="kriteria1attch" multiple>
                                            </div>
                                            <div class="col-3">
                                                <div class="attachments">
                                                    <a href="{{ asset('attachments/ini.png') }}" target="_blank">ini attachment1</a><br>
                                                    <a href="{{ asset('attachments/ini.png') }}" target="_blank">ini attachment1</a><br>
                                                    <a href="{{ asset('attachments/ini.png') }}" target="_blank">ini attachment1</a><br>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <button type="submit" class="btn btn-sm btn-warning">Update</button>
                                    </td>
                                </tr>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="modalTambahActivity" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="labelModalActivity" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="labelModalActivity">Tambah Activity</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/understandingCA" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="#" class="form-label">Activity</label>
                        <input type="input" name="#" value="" class="form-control" id="#" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
