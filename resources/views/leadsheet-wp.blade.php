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
                <h3>Leadsheet : {{$ls[0]->kodeLeadsheet}} </h3> <!-- harusnya ada proses generate halaman ini setelah ada penugasan pada klien -->
                {{-- <h5>
                    <strong>
                        @php
                        $a = App\Models\Co_Act::with('co_obj')->where('kodeCA', $ls['kodeTestCA'])->first();
                        // dd($a->co_obj->control_obj);
                        echo $a;
                        @endphp
                    </strong>
                        @php
                        echo ' - ' . $a->co_obj->control_obj;
                        @endphp
                </h5> --}}
            </div>
            <!--
                buat foreach untuk loop per co ca
                
                ->
            -->
            {{-- @dd($controls) --}}
            @php
                // Grouping dan lookup
                $grouped = $ls->groupBy(function($item) {
                    return substr($item->kodeCA, 0, 4);
                });

                $bisCycList = App\Models\BuisnessCycle::all()->keyBy('kodeBiscyc');
                $coObjList = App\Models\Co_Obj::all()->keyBy('kodeCO');
            @endphp

            <table class="table table-bordered">
                <tbody>
                    @foreach ($grouped as $groupKey => $items)
                        @php
                            $first = $items->first(); // item pertama dalam grup
                            $coobj = $coObjList[$first->kodeCO] ?? null;
                        @endphp

                        {{-- Header group --}}
                        <tr class="table-secondary fw-bold">
                            <td colspan="7">
                                {{ $groupKey }} —
                                Control Obj: {{ $coobj->control_obj ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Kode CA</th>
                            <th>Control Activity</th>
                            <th>Kecukupan Desain</th>
                            <th>TOC (Y/N)</th>
                            <th>Issue</th>
                            <th></th>
                        </tr>

                        @foreach ($items as $l)
                            <form action="/leadsheet/update" method="POST" >
                                @csrf
                                <tr>
                                    <td>
                                        <a href="/understanding/{{$l->kodeLeadsheet}}&&{{$l->kodeCO}}&&{{$l->kodeCA}}">
                                            {{ $l->kodeCA }}
                                        </a>
                                    </td>
                                    <td>
                                        @php
                                            $a = App\Models\Co_Act::where('kodeCA', $l->kodeCA)->first();
                                            echo $a->control_act;
                                        @endphp
                                    </td>
                                    <td>
                                        <select name="desain" id="" class="form-control">
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="test" id="" class="form-control">
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea name="issue" id="issue" name="issue" cols="30" rows="2" class="w-100"></textarea>
                                    </td>
                                    <input type="hidden" name="kodeLeadsheet" id="kodeLeadsheet" value="{{$l->kodeLeadsheet}}" required>
                                    <input type="hidden" name="kodeBisCyc" id="kodeBisCyc" value="{{$l->kodeBisCyc}}" required>
                                    <input type="hidden" name="kodeCO" id="kodeCO" value="{{$l->kodeCO}}" required>
                                    <input type="hidden" name="kodeCA" id="kodeCA" value="{{$l->kodeCO}}" required>
                                    <td class="text-center">
                                        <button type="submit" class="btn btn-sm btn-warning">Update</button>
                                    </td>
                                </tr>
                            </form>
                        @endforeach
                    @endforeach
                </tbody>
            </table>



            {{-- <div class="card-body">
                <table class="table">
                    @foreach ($ls as $l) <!-- harusnya query kodeleadsheet dulu, dapetin smua entry yang dari kodeleadsheet baru di loop -->
                    @php
                        $group = substr($l->kodeCA, 0,4);
                    @endphp
                        @php
                            $a = App\Models\BuisnessCycle::where('kodeBiscyc', $l->kodeBisCyc)->first(); 
                        @endphp
                        <thead>
                            <tr>
                                <th>
                                    {{$l->kodeBisCyc}} - {{$a->namaBisCyc}}
                                </th>
                                <th colspan="5"></th>
                            </tr>
                            <tr>
                                <td>{{$l->kodeCO}}</td>
                                <td>
                                    @php
                                        $b = App\Models\Co_Obj::where('kodeCO', $l->kodeCO)->first(); 
                                        // echo $b;
                                        echo $b->control_obj;
                                    @endphp
                                </td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td>Kode CA</td>
                                <td>Control Activity</td>
                                <td>Kecukupan Desain</td>
                                <td>TOC (Y/N)</td>
                                <td>Issue</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>--</td>
                                <td>--</td>
                                <td>-</td>
                                <td>--</td>
                                <td>-</td>
                                <td></td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div> --}}
        </div>
    </div>
@endsection

{{-- @push('css')
    <style>
    .table-form-input {
        border: none;
        background-color: transparent;
        padding: 0;
        margin: 0;
        width: 100%;
        font-size: 1rem;
        font-family: inherit;
        box-shadow: none;
        resize: none;
    }

    /* .table-form-input:focus {
        outline: none;
        background-color: #2e92f5;
    } */

    .table-select {
        appearance: none;
        background: transparent;
        border: none;
        width: 100%;
        padding: 0;
        font-size: 1rem;
        font-family: inherit;
    }

    /* .table-select:focus {
        outline: none;
        background-color: #65b0fcaf;
    } */
</style>

@endpush --}}
{{-- <td>
                                <a href="/prototypeWP-understanding/{{$ls['kodeTestCA']}}">
                                    {{$ls['kodeTestCA']}}
                                </a>
                            </td>
                            <td>
                                @php
                                    $a = App\Models\Co_Act::where('kodeCA', $ls['kodeTestCA'])->get();
                                    // dd($a);
                                    echo $a[0]->control_act;
                                @endphp
                            </td>
                            <td>
                                <select name="desain" class="table-select">
                                    <option value="-" {{ $ls['desain'] == '-' ? 'selected' : '' }} disabled>-</option>
                                    <option value="memadai" {{ $ls['desain'] == 'memadai' ? 'selected' : '' }}>Memadai</option>
                                    <option value="tidak memadai" {{ $ls['desain'] == 'tidak memadai' ? 'selected' : '' }}>Tidak Memadai</option>
                                </select>
                            </td>
                            <td>
                                <select name="test" class="table-select">
                                    <option value="-" {{ $ls['test'] == '-' ? 'selected' : '' }}>-</option>
                                    <option value="Y" {{ $ls['test'] == 'Y' ? 'selected' : '' }}>Y</option>
                                    <option value="N" {{ $ls['test'] == 'N' ? 'selected' : '' }}>N</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="issue" class="table-form-input" rows="5" cols="30" style="font-size:12px;">{{ $ls['issue'] }}</textarea>
                            </td>
                            <td>
                                <!-- Button modal buat update kecukupan/toc/issue tiap CA -->
                                <button type="button" class="btn btn-sm btn-warning"><i data-feather="edit"></i></button>
                            </td> --}}