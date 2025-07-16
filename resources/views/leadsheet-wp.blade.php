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
                <h3>Leadsheet : XXXXX harusnya klient -- harusnya ada proses generate halaman ini</h3>
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
            -->
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kode Test</th>
                            <th>Control Activity</th>
                            <th>Kecukupan Desain</th>
                            <th>TOC (Y/N)</th>
                            <th>Issue</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('css')
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

@endpush