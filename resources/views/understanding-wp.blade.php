@extends('template.template')

@section('content')
{{-- @dd($klspca, $aCA) --}}
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
                    <div class="row">
                        <div class="col-1">
                            Objective
                        </div>
                        <div class="col">
                            : {{$ca->co_obj->control_obj}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            {{$ca->kodeCA}}
                        </div>
                        <div class="col">
                            : {{$ca->control_act}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            Risiko
                        </div>
                        <div class="col">
                            :
                            <ul>
                                @foreach ($ca->risks as $risk)
                                    <li>{{$risk->risk}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col"></div>
                    </div>
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
                                {{-- <th class="text-center">
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahActivity">Tambah Activity</button>
                                </th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($aCA as $aCA) --}}
                            {{-- @dd($aCA) --}}
                                {{-- <form action="/understanding/update" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <tr>
                                        <td class="text-center">
                                            {{$loop->iteration}}
                                        </td>
                                        <td class="text-center"><input class="form-control" type="text" name="activityCA" id="activityCA" value="{{$aCA->activityCA}}" readonly required></td>
                                        <td class="text-center">
                                            <select class="form-control" name="dijalankan" id="dijalankan" required>
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected($aCA->dijalankan === 0)>Tidak</option>
                                                <option value="1" @selected($aCA->dijalankan === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <select class="form-control" name="sop" id="sop" required>
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected($aCA->sop === 0)>Tidak</option>
                                                <option value="1" @selected($aCA->sop === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Berikan penjelasan" name="penjelasanActivity" id="penjelasanActivity" style="height: 10px !important;">{{$aCA->penjelasanActivity}}</textarea>
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
                                                        @if ($aCA->attachments !== Null)
                                                            @foreach ($aCA->attachments as $att)
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
                                        <input type="hidden" name="kodeActivityCA" id="kodeActivityCA" value="{{$aCA->kodeActivityCA}}" required>
                                        <td class="text-center">
                                            <button type="submit" class="btn btn-sm btn-warning">Update</button>
                                        </td>
                                    </tr>
                                </form> --}}

                                {{-- 
                                /**
                                * understanding di rubah jadi plain html text, data langsung di update dari input
                                *
                                * tampilan understanding berdasarkan kode CA yang di parsing dari kontroler
                                */
                                --}}
                                <form action="/understanding/update-ca/{{$klspca}}" enctype="multipart/form-data" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{-- Kriteria CA MC0101 --}}
                                    <tr>
                                        <td class="text-center">
                                            1
                                            <!-- $loop->iteration --> <!-- ganti index array-->
                                        </td>
                                        <td class="text-center"><input class="form-control" type="text" name="activityCA[0]" id="activityCA_1" value="Terdapat proses inisiasi proyek dan perencanaan fungsi sistem." readonly required></td>
                                        <td class="text-center">
                                            <select class="form-control" name="dijalankan[0]" id="dijalankan_1">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[0]) && $aCA[0]->dijalankan === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[0]) && $aCA[0]->dijalankan === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <select class="form-control" name="sop[0]" id="sop_0">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[0]) && $aCA[0]->sop === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[0]) && $aCA[0]->sop === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Berikan penjelasan" name="penjelasanActivity[0]" id="penjelasanActivity_0" style="height: 10px !important;">{{$aCA[0]->penjelasanActivity ?? ''}}</textarea>
                                                <label for="penjelasanActivity">Penjelasan / Evidence</label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <input class="form-control" type="file" id="attachments_0" name="attachments[0][]" multiple>
                                                </div>
                                                <div class="col-3 text-start">
                                                    <div class="attachments">
                                                        Attachments:
                                                        <ul>
                                                        @if (!empty($aCA[0]->attachments))
                                                            @foreach ($aCA[0]->attachments as $att)
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
                                        <input type="hidden" name="kodeActivityCA[0]" id="kodeActivityCA_0" value="{{$aCA[0]->kodeActivityCA ?? $klspca.'&&001'}}" required>
                                        {{-- <td class="text-center">
                                            <button type="submit" class="btn btn-sm btn-warning">Update</button>
                                        </td> --}}
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            2
                                            <!-- $loop->iteration --> <!-- ganti index array-->
                                        </td>
                                        <td class="text-center"><input class="form-control" type="text" name="activityCA[1]" id="activityCA_1" value="Terdapat proses pendefinisian kebutuhan pengguna." readonly required></td>
                                        <td class="text-center">
                                            <select class="form-control" name="dijalankan[1]" id="dijalankan_1">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[1]) && $aCA[1]->dijalankan === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[1]) && $aCA[1]->dijalankan === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <select class="form-control" name="sop[1]" id="sop_1">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[1]) && $aCA[1]->sop === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[1]) && $aCA[1]->sop === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Berikan penjelasan" name="penjelasanActivity[1]" id="penjelasanActivity_1" style="height: 10px !important;">{{$aCA[1]->penjelasanActivity ?? ''}}</textarea>
                                                <label for="penjelasanActivity">Penjelasan / Evidence</label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <input class="form-control" type="file" id="attachments_1" name="attachments[1][]" multiple>
                                                </div>
                                                <div class="col-3 text-start">
                                                    <div class="attachments">
                                                        Attachments:
                                                        <ul>
                                                        @if (!empty($aCA[1]->attachments))
                                                            @foreach ($aCA[1]->attachments as $att)
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
                                        <input type="hidden" name="kodeActivityCA[1]" id="kodeActivityCA_1" value="{{$aCA[1]->kodeActivityCA ?? $klspca.'&&002'}}" required>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            3
                                            <!-- $loop->iteration --> <!-- ganti index array-->
                                        </td>
                                        <td class="text-center"><input class="form-control" type="text" name="activityCA[2]" id="activityCA_2" value="Terdapat proses perancangan sistem / functional specification." readonly required></td>
                                        <td class="text-center">
                                            <select class="form-control" name="dijalankan[2]" id="dijalankan_2">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[2]) && $aCA[2]->dijalankan === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[2]) && $aCA[2]->dijalankan === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <select class="form-control" name="sop[2]" id="sop_2">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[2]) && $aCA[2]->sop === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[2]) && $aCA[2]->sop === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Berikan penjelasan" name="penjelasanActivity[2]" id="penjelasanActivity_2" style="height: 10px !important;">{{$aCA[2]->penjelasanActivity ?? ''}}</textarea>
                                                <label for="penjelasanActivity">Penjelasan / Evidence</label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <input class="form-control" type="file" id="attachments_2" name="attachments[2][]" multiple>
                                                </div>
                                                <div class="col-3 text-start">
                                                    <div class="attachments">
                                                        Attachments:
                                                        <ul>
                                                        @if (!empty($aCA[2]->attachments))
                                                            @foreach ($aCA[2]->attachments as $att)
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
                                        <input type="hidden" name="kodeActivityCA[2]" id="kodeActivityCA_2" value="{{$aCA[2]->kodeActivityCA ?? $klspca.'&&003'}}" required>
                                        {{-- <td class="text-center">
                                            <button type="submit" class="btn btn-sm btn-warning">Update</button>
                                        </td> --}}
                                    </tr>
                                    
                                    <tr>
                                        <td class="text-center">
                                            4
                                            <!-- $loop->iteration --> <!-- ganti index array-->
                                        </td>
                                        <td class="text-center"><input class="form-control" type="text" name="activityCA[3]" id="activityCA_3" value="Terdapat pengaturan pelaksanaan perubahan/pemrograman sistem." readonly required></td>
                                        <td class="text-center">
                                            <select class="form-control" name="dijalankan[3]" id="dijalankan_3">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[3]) && $aCA[3]->dijalankan === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[3]) && $aCA[3]->dijalankan === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <select class="form-control" name="sop[3]" id="sop_3">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[3]) && $aCA[3]->sop === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[3]) && $aCA[3]->sop === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Berikan penjelasan" name="penjelasanActivity[3]" id="penjelasanActivity_3" style="height: 10px !important;">{{$aCA[3]->penjelasanActivity ?? ''}}</textarea>
                                                <label for="penjelasanActivity">Penjelasan / Evidence</label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <input class="form-control" type="file" id="attachments_3" name="attachments[3][]" multiple>
                                                </div>
                                                <div class="col-3 text-start">
                                                    <div class="attachments">
                                                        Attachments:
                                                        <ul>
                                                        @if (!empty($aCA[3]->attachments))
                                                            @foreach ($aCA[3]->attachments as $att)
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
                                        <input type="hidden" name="kodeActivityCA[3]" id="kodeActivityCA_3" value="{{$aCA[3]->kodeActivityCA ?? $klspca.'&&004'}}" required>
                                        {{-- <td class="text-center">
                                            <button type="submit" class="btn btn-sm btn-warning">Update</button>
                                        </td> --}}
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            5
                                            <!-- $loop->iteration --> <!-- ganti index array-->
                                        </td>
                                        <td class="text-center"><input class="form-control" type="text" name="activityCA[4]" id="activityCA_4" value="Terdapat pemisahan lingkungan pengembangan, pengujian, dan production." readonly required></td>
                                        <td class="text-center">
                                            <select class="form-control" name="dijalankan[4]" id="dijalankan_4">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[4]) && $aCA[4]->dijalankan === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[4]) && $aCA[4]->dijalankan === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <select class="form-control" name="sop[4]" id="sop_3">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[4]) && $aCA[4]->sop === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[4]) && $aCA[4]->sop === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Berikan penjelasan" name="penjelasanActivity[4]" id="penjelasanActivity_4" style="height: 10px !important;">{{$aCA[4]->penjelasanActivity ?? ''}}</textarea>
                                                <label for="penjelasanActivity">Penjelasan / Evidence</label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <input class="form-control" type="file" id="attachments_4" name="attachments[4][]" multiple>
                                                </div>
                                                <div class="col-3 text-start">
                                                    <div class="attachments">
                                                        Attachments:
                                                        <ul>
                                                        @if (!empty($aCA[4]->attachments))
                                                            @foreach ($aCA[4]->attachments as $att)
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
                                        <input type="hidden" name="kodeActivityCA[4]" id="kodeActivityCA_4" value="{{$aCA[4]->kodeActivityCA ?? $klspca.'&&005'}}" required>
                                        {{-- <td class="text-center">
                                            <button type="submit" class="btn btn-sm btn-warning">Update</button>
                                        </td> --}}
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            6
                                            <!-- $loop->iteration --> <!-- ganti index array-->
                                        </td>
                                        <td class="text-center"><input class="form-control" type="text" name="activityCA[5]" id="activityCA_5" value="Terdapat proses pengujian teknis dan keamanan di server test dan server production." readonly required></td>
                                        <td class="text-center">
                                            <select class="form-control" name="dijalankan[5]" id="dijalankan_5">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[5]) && $aCA[5]->dijalankan === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[5]) && $aCA[5]->dijalankan === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <select class="form-control" name="sop[5]" id="sop_5">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[5]) && $aCA[5]->sop === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[5]) && $aCA[5]->sop === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Berikan penjelasan" name="penjelasanActivity[5]" id="penjelasanActivity_5" style="height: 10px !important;">{{$aCA[5]->penjelasanActivity ?? ''}}</textarea>
                                                <label for="penjelasanActivity">Penjelasan / Evidence</label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <input class="form-control" type="file" id="attachments_5" name="attachments[5][]" multiple>
                                                </div>
                                                <div class="col-3 text-start">
                                                    <div class="attachments">
                                                        Attachments:
                                                        <ul>
                                                        @if (!empty($aCA[5]->attachments))
                                                            @foreach ($aCA[5]->attachments as $att)
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
                                        <input type="hidden" name="kodeActivityCA[5]" id="kodeActivityCA_5" value="{{$aCA[5]->kodeActivityCA ?? $klspca.'&&006'}}" required>
                                        {{-- <td class="text-center">
                                            <button type="submit" class="btn btn-sm btn-warning">Update</button>
                                        </td> --}}
                                    </tr>

                                    
                                    <tr>
                                        <td class="text-center">
                                            7
                                            <!-- $loop->iteration --> <!-- ganti index array-->
                                        </td>
                                        <td class="text-center"><input class="form-control" type="text" name="activityCA[6]" id="activityCA_6" value="Terdapat proses konversi data." readonly required></td>
                                        <td class="text-center">
                                            <select class="form-control" name="dijalankan[6]" id="dijalankan_6">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[6]) && $aCA[6]->dijalankan === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[6]) && $aCA[6]->dijalankan === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <select class="form-control" name="sop[6]" id="sop_5">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[6]) && $aCA[6]->sop === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[6]) && $aCA[6]->sop === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Berikan penjelasan" name="penjelasanActivity[6]" id="penjelasanActivity_6" style="height: 10px !important;">{{$aCA[6]->penjelasanActivity ?? ''}}</textarea>
                                                <label for="penjelasanActivity">Penjelasan / Evidence</label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <input class="form-control" type="file" id="attachments_6" name="attachments[6][]" multiple>
                                                </div>
                                                <div class="col-3 text-start">
                                                    <div class="attachments">
                                                        Attachments:
                                                        <ul>
                                                        @if (!empty($aCA[6]->attachments))
                                                            @foreach ($aCA[6]->attachments as $att)
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
                                        <input type="hidden" name="kodeActivityCA[6]" id="kodeActivityCA_6" value="{{$aCA[6]->kodeActivityCA ?? $klspca.'&&007'}}" required>
                                        {{-- <td class="text-center">
                                            <button type="submit" class="btn btn-sm btn-warning">Update</button>
                                        </td> --}}
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            8
                                            <!-- $loop->iteration --> <!-- ganti index array-->
                                        </td>
                                        <td class="text-center"><input class="form-control" type="text" name="activityCA[7]" id="activityCA_7" value="Terdapat proses pengujian yang melibatkan user." readonly required></td>
                                        <td class="text-center">
                                            <select class="form-control" name="dijalankan[7]" id="dijalankan_7">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[7]) && $aCA[7]->dijalankan === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[7]) && $aCA[7]->dijalankan === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <select class="form-control" name="sop[7]" id="sop_7">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[7]) && $aCA[7]->sop === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[7]) && $aCA[7]->sop === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Berikan penjelasan" name="penjelasanActivity[7]" id="penjelasanActivity_7" style="height: 10px !important;">{{$aCA[7]->penjelasanActivity ?? ''}}</textarea>
                                                <label for="penjelasanActivity">Penjelasan / Evidence</label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <input class="form-control" type="file" id="attachments_7" name="attachments[7][]" multiple>
                                                </div>
                                                <div class="col-3 text-start">
                                                    <div class="attachments">
                                                        Attachments:
                                                        <ul>
                                                        @if (!empty($aCA[7]->attachments))
                                                            @foreach ($aCA[7]->attachments as $att)
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
                                        <input type="hidden" name="kodeActivityCA[7]" id="kodeActivityCA_7" value="{{$aCA[7]->kodeActivityCA ?? $klspca.'&&008'}}" required>
                                        {{-- <td class="text-center">
                                            <button type="submit" class="btn btn-sm btn-warning">Update</button>
                                        </td> --}}
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            9
                                            <!-- $loop->iteration --> <!-- ganti index array-->
                                        </td>
                                        <td class="text-center"><input class="form-control" type="text" name="activityCA[8]" id="activityCA_8" value="Terdapat proses persetujuan sebelum deployment di production." readonly required></td>
                                        <td class="text-center">
                                            <select class="form-control" name="dijalankan[8]" id="dijalankan_8">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[8]) && $aCA[8]->dijalankan === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[8]) && $aCA[8]->dijalankan === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <select class="form-control" name="sop[8]" id="sop_8">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[8]) && $aCA[8]->sop === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[8]) && $aCA[8]->sop === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Berikan penjelasan" name="penjelasanActivity[8]" id="penjelasanActivity_8" style="height: 10px !important;">{{$aCA[8]->penjelasanActivity ?? ''}}</textarea>
                                                <label for="penjelasanActivity">Penjelasan / Evidence</label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <input class="form-control" type="file" id="attachments_8" name="attachments[8][]" multiple>
                                                </div>
                                                <div class="col-3 text-start">
                                                    <div class="attachments">
                                                        Attachments:
                                                        <ul>
                                                        @if (!empty($aCA[8]->attachments))
                                                            @foreach ($aCA[8]->attachments as $att)
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
                                        <input type="hidden" name="kodeActivityCA[8]" id="kodeActivityCA_8" value="{{$aCA[8]->kodeActivityCA ?? $klspca.'&&009'}}" required>
                                        {{-- <td class="text-center">
                                            <button type="submit" class="btn btn-sm btn-warning">Update</button>
                                        </td> --}}
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            10
                                            <!-- $loop->iteration --> <!-- ganti index array-->
                                        </td>
                                        <td class="text-center"><input class="form-control" type="text" name="activityCA[9]" id="activityCA_9" value="Terdapat pengaturan pelaksanaan deployment." readonly required></td>
                                        <td class="text-center">
                                            <select class="form-control" name="dijalankan[9]" id="dijalankan_9">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[9]) && $aCA[9]->dijalankan === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[9]) && $aCA[9]->dijalankan === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <select class="form-control" name="sop[9]" id="sop_9">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[9]) && $aCA[9]->sop === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[9]) && $aCA[9]->sop === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Berikan penjelasan" name="penjelasanActivity[9]" id="penjelasanActivity_9" style="height: 10px !important;">{{$aCA[9]->penjelasanActivity ?? ''}}</textarea>
                                                <label for="penjelasanActivity">Penjelasan / Evidence</label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <input class="form-control" type="file" id="attachments_9" name="attachments[9][]" multiple>
                                                </div>
                                                <div class="col-3 text-start">
                                                    <div class="attachments">
                                                        Attachments:
                                                        <ul>
                                                        @if (!empty($aCA[9]->attachments))
                                                            @foreach ($aCA[9]->attachments as $att)
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
                                        <input type="hidden" name="kodeActivityCA[9]" id="kodeActivityCA_9" value="{{$aCA[9]->kodeActivityCA ?? $klspca.'&&010'}}" required>
                                        {{-- <td class="text-center">
                                            <button type="submit" class="btn btn-sm btn-warning">Update</button>
                                        </td> --}}
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            11
                                            <!-- $loop->iteration --> <!-- ganti index array-->
                                        </td>
                                        <td class="text-center"><input class="form-control" type="text" name="activityCA[10]" id="activityCA_10" value="Terdapat pengaturan pelaksanaan post implementation review." readonly required></td>
                                        <td class="text-center">
                                            <select class="form-control" name="dijalankan[10]" id="dijalankan_10">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[10]) && $aCA[10]->dijalankan === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[10]) && $aCA[10]->dijalankan === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <select class="form-control" name="sop[10]" id="sop_10">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[10]) && $aCA[10]->sop === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[10]) && $aCA[10]->sop === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Berikan penjelasan" name="penjelasanActivity[10]" id="penjelasanActivity_10" style="height: 10px !important;">{{$aCA[10]->penjelasanActivity ?? ''}}</textarea>
                                                <label for="penjelasanActivity">Penjelasan / Evidence</label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <input class="form-control" type="file" id="attachments_10" name="attachments[10][]" multiple>
                                                </div>
                                                <div class="col-3 text-start">
                                                    <div class="attachments">
                                                        Attachments:
                                                        <ul>
                                                        @if (!empty($aCA[10]->attachments))
                                                            @foreach ($aCA[10]->attachments as $att)
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
                                        <input type="hidden" name="kodeActivityCA[10]" id="kodeActivityCA_10" value="{{$aCA[10]->kodeActivityCA ?? $klspca.'&&011'}}" required>
                                        {{-- <td class="text-center">
                                            <button type="submit" class="btn btn-sm btn-warning">Update</button>
                                        </td> --}}
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            12
                                            <!-- $loop->iteration --> <!-- ganti index array-->
                                        </td>
                                        <td class="text-center"><input class="form-control" type="text" name="activityCA[11]" id="activityCA_11" value="Terdapat pengaturan pelaksanaan pengembangan sistem oleh vendor." readonly required></td>
                                        <td class="text-center">
                                            <select class="form-control" name="dijalankan[11]" id="dijalankan_11">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[11]) && $aCA[11]->dijalankan === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[11]) && $aCA[11]->dijalankan === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <select class="form-control" name="sop[11]" id="sop_11">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[11]) && $aCA[11]->sop === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[11]) && $aCA[11]->sop === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Berikan penjelasan" name="penjelasanActivity[11]" id="penjelasanActivity_11" style="height: 10px !important;">{{$aCA[11]->penjelasanActivity ?? ''}}</textarea>
                                                <label for="penjelasanActivity">Penjelasan / Evidence</label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <input class="form-control" type="file" id="attachments_11" name="attachments[11][]" multiple>
                                                </div>
                                                <div class="col-3 text-start">
                                                    <div class="attachments">
                                                        Attachments:
                                                        <ul>
                                                        @if (!empty($aCA[11]->attachments))
                                                            @foreach ($aCA[11]->attachments as $att)
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
                                        <input type="hidden" name="kodeActivityCA[11]" id="kodeActivityCA_11" value="{{$aCA[11]->kodeActivityCA ?? $klspca.'&&012'}}" required>
                                        {{-- <td class="text-center">
                                            <button type="submit" class="btn btn-sm btn-warning">Update</button>
                                        </td> --}}
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            13
                                            <!-- $loop->iteration --> <!-- ganti index array-->
                                        </td>
                                        <td class="text-center"><input class="form-control" type="text" name="activityCA[12]" id="activityCA_13" value="Terdapat pengaturan pelaksanaan pengembangan sistem oleh vendor." readonly required></td>
                                        <td class="text-center">
                                            <select class="form-control" name="dijalankan[12]" id="dijalankan_12">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[12]) && $aCA[12]->dijalankan === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[12]) && $aCA[12]->dijalankan === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <select class="form-control" name="sop[12]" id="sop_12">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[12]) && $aCA[12]->sop === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[12]) && $aCA[12]->sop === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Berikan penjelasan" name="penjelasanActivity[12]" id="penjelasanActivity_12" style="height: 10px !important;">{{$aCA[12]->penjelasanActivity ?? ''}}</textarea>
                                                <label for="penjelasanActivity">Penjelasan / Evidence</label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <input class="form-control" type="file" id="attachments_12" name="attachments[12][]" multiple>
                                                </div>
                                                <div class="col-3 text-start">
                                                    <div class="attachments">
                                                        Attachments:
                                                        <ul>
                                                        @if (!empty($aCA[12]->attachments))
                                                            @foreach ($aCA[12]->attachments as $att)
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
                                        <input type="hidden" name="kodeActivityCA[12]" id="kodeActivityCA_12" value="{{$aCA[12]->kodeActivityCA ?? $klspca.'&&013'}}" required>
                                        {{-- <td class="text-center">
                                            <button type="submit" class="btn btn-sm btn-warning">Update</button>
                                        </td> --}}
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            14
                                            <!-- $loop->iteration --> <!-- ganti index array-->
                                        </td>
                                        <td class="text-center"><input class="form-control" type="text" name="activityCA[13]" id="activityCA_13" value="Terdapat pengaturan pelaksanaan pemeliharaan sistem oleh vendor." readonly required></td>
                                        <td class="text-center">
                                            <select class="form-control" name="dijalankan[13]" id="dijalankan_13">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[13]) && $aCA[13]->dijalankan === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[13]) && $aCA[13]->dijalankan === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <select class="form-control" name="sop[13]" id="sop_13">
                                                <option value="" disabled selected></option>
                                                <option value="0" @selected(isset($aCA[13]) && $aCA[13]->sop === 0)>Tidak</option>
                                                <option value="1" @selected(isset($aCA[13]) && $aCA[13]->sop === 1)>Ya</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Berikan penjelasan" name="penjelasanActivity[13]" id="penjelasanActivity_13" style="height: 10px !important;">{{$aCA[13]->penjelasanActivity ?? ''}}</textarea>
                                                <label for="penjelasanActivity">Penjelasan / Evidence</label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <input class="form-control" type="file" id="attachments_13" name="attachments[13][]" multiple>
                                                </div>
                                                <div class="col-3 text-start">
                                                    <div class="attachments">
                                                        Attachments:
                                                        <ul>
                                                        @if (!empty($aCA[13]->attachments))
                                                            @foreach ($aCA[13]->attachments as $att)
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
                                        <input type="hidden" name="kodeActivityCA[13]" id="kodeActivityCA_13" value="{{$aCA[13]->kodeActivityCA ?? $klspca.'&&014'}}" required>
                                        {{-- <td class="text-center">
                                            <button type="submit" class="btn btn-sm btn-warning">Update</button>
                                        </td> --}}
                                    </tr>
                                
                            {{-- @endforeach --}}
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                    </td>
                                </tr>
                                </form>
                            </tfoot>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<!-- Modal ----tidak pakai lagi -->
{{-- <div class="modal fade" id="modalTambahActivity" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="labelModalActivity" aria-hidden="true">
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
</div> --}}
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
