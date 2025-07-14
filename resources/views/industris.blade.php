@extends('template.template')

@section('content')


<div class="row">
    <!-- DOM/Jquery table start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Tipe Industri</h5>
            </div>
            <div class="card-body">
                <div class="dt-responsive">
                    <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Industri</th>
                            <th>Tipe Industri</th>
                            <th class="d-flex justify-content-center">
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalAddTypeIndustri" onclick="tambahTipe()">
                                    <i data-feather='plus-square'></i>
                                </button>
                            </th>
                        </tr>
                    </thead>
                        @foreach ($tis as $tipe)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <th>{{$tipe->kodeIndustri}}</a></th>
                                <th><a href="/controls/{{$tipe->id}}">{{$tipe->nama}}</a></th>
                                <th class="d-flex justify-content-center">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modalAddTypeIndustri" class="btn btn-outline-warning" onclick="ubahTipe(this)" data-ti-id="{{$tipe->id}}" data-ti-nama="{{$tipe->nama}}" data-ti-kode="{{$tipe->kodeIndustri}}"><i data-feather="edit"></i></button>
                                </th>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalAddTypeIndustri" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tipeIndustriForm" action="#" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="kodeIndustri" class="form-label">Kode Industri</label>
                        <input type="input" name="kodeIndustri" value="" class="form-control" id="kodeIndustri" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipeindustri" class="form-label">Tipe Industri</label>
                        <input type="input" name="nama" value="" class="form-control" id="tipeindustri" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@push('script')
    <script>
        function tambahTipe(){
            document.getElementById('tipeIndustriForm').action = '/industri/store';
        }

        function ubahTipe(element){
            
            var id = element.getAttribute('data-ti-id');
            var nama = element.getAttribute('data-ti-nama');
            var kodeIndustri = element.getAttribute('data-ti-kode');

            document.getElementById('tipeIndustriForm').action = '/industri/update/' + id;
            document.getElementById('tipeindustri').value = nama;
            document.getElementById('kodeIndustri').value = kodeIndustri;
        }
    </script>
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