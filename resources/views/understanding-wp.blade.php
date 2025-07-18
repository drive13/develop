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
    <div class="row">
    <!-- DOM/Jquery table start -->
    <div class="col-sm-12">
        <div class="card">
            <!-- detail klien? -->
            {{-- <div class="card-header py-2"> 
                <h3>Leadsheet : 
                    {{$ls[0]['kodeLeadsheet']}}
                </h3>
            </div> --}}
            <div class="card-body">
                <div class="top my-2 border-bottom">
                    <h5>
                        <strong class="me-5">Objective</strong>:
                        {{$ca->co_obj->control_obj}}
                    </h5>
                    <h5><strong class="me-5">{{$ca->kodeCA}}</strong>&nbsp;&nbsp;&nbsp;: {{$ca->control_act}}</h5>
                    <h5>
                        <strong class="me-5">Risiko</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        <ul>
                        @foreach ($ca->risks as $risk)
                            <li>{{$risk->risk}}</li>
                        @endforeach
                        </ul>
                    </h5>
                </div>
                <div class="bottom">
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
                            @foreach ($aCA as $aca)
                            {{-- @dd($aCA) --}}
                                <form action="/understanding/update" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <tr>
                                        <td class="text-center">
                                            {{$loop->iteration}}
                                        </td>
                                        <td class="text-center"><input class="form-control" type="text" name="activityCA" id="activityCA" value="{{$aca->activityCA}}" readonly required></td>
                                        <td class="text-center">
                                            <select class="form-control" name="dijalankan" id="dijalankan" required>
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected($aca->dijalankan === 0)>Tidak</option>
                                                <option value="1" @selected($aca->dijalankan === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <select class="form-control" name="sop" id="sop" required>
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected($aca->sop === 0)>Tidak</option>
                                                <option value="1" @selected($aca->sop === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Berikan penjelasan" name="penjelasanActivity" id="penjelasanActivity" style="height: 10px !important;">{{$aca->penjelasanActivity}}</textarea>
                                                <label for="penjelasanActivity">Penjelasan / Evidence</label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <input class="form-control" type="file" id="attachments" name="attachments[]" multiple>
                                                </div>
                                                <div class="col-3 text-start">
                                                    <div class="attachments">
                                                        Attachments:
                                                        <ul>
                                                        @if ($aca->attachments !== Null)
                                                            @foreach ($aca->attachments as $att)
                                                            <li>
                                                                <a href="{{ asset('storage/uploads/'.$att) }}" target="_blank">{{$att}}</a><br>
                                                            </li>
                                                            @endforeach
                                                        @else
                                                            <li>Tidak ada attachments</li>
                                                        @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <input type="hidden" name="kodeActivityCA" id="kodeActivityCA" value="{{$aca->kodeActivityCA}}" required>
                                        <td class="text-center">
                                            <button type="submit" class="btn btn-sm btn-warning">Update</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
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
                <form action="/understandingCA/create" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="activityCA" class="form-label">Activity</label>
                        <input type="input" name="activityCA" class="form-control" id="activityCA" required>
                    </div>
                    <input type="hidden" name="klspca" value="{{$klspca}}" required>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
            });
        </script>
    @endif
@endpush
