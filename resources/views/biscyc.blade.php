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
{{-- @dd($bc) --}}
<div class="row">
  <!-- DOM/Jquery table start -->
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header py-2">
        <div class="row d-flex align-items-center">
          <div class="col-6">
            <h5>Tipe Industri : {{$bc[0]->nama}}</h5>
          </div>
          <div class="col-6 text-end">
            <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalBisCyc" data-tipeIndustri="{{$bc[0]->id}}" onclick="modalFormAddBisCyc(this)"><i data-feather="plus"></i>Tambah Buis Cycle</a>
          </div>
        </div>
      </div>
      <div class="card-body p-0 border border-0">
        {{-- Accordion Bis Cyc --}}
        <div class="accordion" id="accordionIndustri">
          @foreach ($bc[0]->bisCycs as $biscyc)
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingBisCyc{{ $biscyc->id }}">
                <button class="accordion-button collapsed fw-bold py-2 ps-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBisCyc{{ $biscyc->id }}">
                  Business Cycle: {{ $biscyc->namaBisCyc }}
                </button>
              </h2>
              <div id="collapseBisCyc{{ $biscyc->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionIndustri">
                <div class="accordion-body border-bottom-0 px-0">
                  <!-- Description -->
                  <div class="row">
                    <div class="col-6">
                      <div class="py-2 ps-3">
                        <strong>Business Cycle:</strong>
                        <p class="mb-0">{{$biscyc->codeBisCyc}} - {{ $biscyc->namaBisCyc }}</p>
                      </div>
                    </div>
                    <div class="col-6 text-end">
                      <button type="button" class="btn btn-sm btn-outline-primary me-2" data-id-cycle="{{$biscyc->id}}" data-bs-toggle="modal" data-bs-target="#modalCO" onclick="modalAddCO(this)"><i data-feather="plus"></i> Tambah CO</button>
                    </div>
                  </div>
                  <!-- Nested Accordion: CO Objs -->
                  <div class="accordion" id="collapseCoObj">
                    @foreach ($biscyc->co_objs as $co_obj)
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingCoObj{{ $co_obj->id }}">
                          <button class="accordion-button collapsed fw-bold ps-4 py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCoObj{{ $co_obj->id }}">
                            Control Objective: {{ $co_obj->codeCO }}
                          </button>
                        </h2>
                        <div id="collapseCoObj{{ $co_obj->id }}" class="accordion-collapse collapse" data-bs-parent="#collapseCoObj">
                          <div class="accordion-body border-bottom-0 px-0">
                            <div class="row">
                              <div class="col-6">
                                <div class="py-2 ps-4">
                                  <strong>Control Objective:</strong>
                                  <p class="mb-0">{{ $co_obj->control_obj }}</p>
  
                                  <!-- Asersi -->
                                  <div class="mt-3">
                                    <strong>Asersi:</strong>
                                    <ul class="mb-0">
                                      @for ($i = 1; $i <= 3; $i++)
                                        @php $asersi = 'asersi' . $i; @endphp
                                        @if (!is_null($co_obj->$asersi))
                                          <li>{{ $co_obj->$asersi }}</li>
                                        @endif
                                      @endfor
                                    </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="col-6 text-end">
                                <button type="button" class="btn btn-sm btn-outline-primary me-2" data-id-co="{{$co_obj->id}}" data-bs-toggle="modal" data-bs-target="#modalCA" onclick="modalAddCA(this)"><i data-feather="plus"></i> Tambah CA</button>
                              </div>
                            </div>

                            <!-- Nested Accordion: Co Acts -->
                            <div class="accordion" id="accordionCoActs">
                              @foreach ($co_obj->co_acts as $co_act)
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingCoAct{{ $co_act->id }}">
                                    <button class="accordion-button collapsed fw-bold ps-5 py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCoAct{{ $co_act->id }}">
                                      Control Activity: {{ $co_act->codeCA }}
                                    </button>
                                  </h2>
                                  <div id="collapseCoAct{{ $co_act->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionCoActs">
                                    <div class="accordion-body border-bottom-0 px-0">
                                      <div class="row">
                                        <div class="col-6">
                                          <div class="mb-3 ps-5">
                                            <strong>Control Activity:</strong>
                                            <p class="mb-0">{{ $co_act->control_act }}</p>
                                          </div>
                                        </div>
                                        <div class="col-6 text-end">
                                          <button type="button" class="btn btn-sm btn-outline-primary me-2" data-id-ca="{{$co_act->id}}" data-bs-toggle="modal" data-bs-target="#modalRisk" onclick="modalAddRisk(this)"><i data-feather="plus"></i> Tambah Risk</button>
                                        </div>
                                        <div class="col-12">
                                          <div class="ps-5">
                                            <strong>Risk:</strong>
                                            <ul>
                                              @foreach ($co_act->risks as $risk)
                                                  <li>{{$risk->risk}}</li>
                                              @endforeach
                                            </ul>
                                          </div>
                                        </div>
                                      </div>

                                      <!-- Accordion Risk -->
                                      {{-- <div class="accordion" id="accordionRisks">
                                        @foreach ($co_act->risks as $risk)
                                          <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingRisk{{ $risk->id }}">
                                              <button class="accordion-button collapsed fw-bold py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRisk{{ $risk->id }}">
                                                Risk: {{ $risk->risk }}
                                              </button>
                                            </h2>
                                            <div id="collapseRisk{{ $risk->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionRisks">
                                              <div class="accordion-body px-4">
                                                <strong>Risk Detail:</strong>
                                                <p class="mb-0">{{ $risk->risk }}</p>
                                              </div>
                                            </div>
                                          </div>
                                        @endforeach
                                      </div> --}}
                                      <!-- End Risk Accordion -->

                                    </div>
                                  </div>
                                </div>
                              @endforeach
                            </div>
                            <!-- End CO Acts -->
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                  <!-- End CO Objs -->
                </div>
              </div>
            </div>
          @endforeach
        </div>

      </div>
    </div>
  </div>
</div>

{{-- Modal BisCyc --}}
<div class="modal modal-sm fade" id="modalBisCyc" tabindex="-1" aria-labelledby="labelModalBisCyc" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="labelModalBisCyc">Tambah BisCyc</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formModalTambahBisCyc" action="#" method="POST">
            @csrf
            <div class="mb-3">
                <label for="namaBisCyc" class="form-label">Buisness Cycle <span class="text-danger fw-bold">*</span></label>
                <input type="input" name="namaBisCyc" class="form-control" id="namaBisCyc" required>
            </div>
            <div class="mb-3">
                <label for="codeBisCyc" class="form-label">Code Buisness Cycle <span class="text-danger fw-bold">*</span></label>
                <input type="input" name="codeBisCyc" class="form-control" id="codeBisCyc" required>
            </div>
            <input type="hidden" name="tipe_industri_id" id="input-ti" value="#" required>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Modal CO --}}
<div class="modal modal-lg fade" id="modalCO" tabindex="-1" aria-labelledby="labelModalCO" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="labelModalCO">Tambah Control Objective</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formModalTambahCO" action="#" method="POST">
            @csrf
            <div class="mb-3">
                <label for="codeco" class="form-label">CodeCO <span class="text-danger fw-bold">*</span></label>
                <input type="input" name="codeco" class="form-control" id="codeco" required>
            </div>
            <div class="mb-3">
                <label for="controlobj" class="form-label">Control Objective <span class="text-danger fw-bold">*</span></label>
                <textarea name="controlobj" id="controlobj" cols="10" rows="10" class="form-control" required></textarea>
            </div>
            <div class="row">
              <div class="col-3">
                <div class="mb-3">
                  <label for="asersi1">Asersi 1 <span class="text-danger fw-bold">*</span></label>
                  <select class="form-control" aria-label="asersi1" name="asersi1" required>
                    <option selected disabled>-- Pilih Asersi --</option>
                    <option value="Validity">Validity</option>
                    <option value="Recording">Recording</option>
                    <option value="Completeness">Completeness</option>
                    <option value="Cut Off">Cut Off</option>
                    <option value="Valuation">Valuation</option>
                    <option value="Presentation">Presentation</option>
                  </select>
                </div>
              </div>
              <div class="col-3">
                <div class="mb-3">
                  <label for="asersi2">Asersi 2</label>
                  <select class="form-control" aria-label="asersi2" name="asersi2">
                    <option selected disabled>-- Pilih Asersi --</option>
                    <option value="Validity">Validity</option>
                    <option value="Recording">Recording</option>
                    <option value="Completeness">Completeness</option>
                    <option value="Cut Off">Cut Off</option>
                    <option value="Valuation">Valuation</option>
                    <option value="Presentation">Presentation</option>
                  </select>
                </div>
              </div>
              <div class="col-3">
                <div class="mb-3">
                  <label for="asersi3">Asersi 3</label>
                  <select class="form-control" aria-label="asersi3" name="asersi3">
                    <option selected disabled>-- Pilih Asersi --</option>
                    <option value="Validity">Validity</option>
                    <option value="Recording">Recording</option>
                    <option value="Completeness">Completeness</option>
                    <option value="Cut Off">Cut Off</option>
                    <option value="Valuation">Valuation</option>
                    <option value="Presentation">Presentation</option>
                  </select>
                </div>
              </div>
              <div class="col-3">
                <div class="mb-3">
                  <label for="asersi4">Asersi 4</label>
                  <select class="form-control" aria-label="asersi4" name="asersi4">
                    <option selected disabled>-- Pilih Asersi --</option>
                    <option value="Validity">Validity</option>
                    <option value="Recording">Recording</option>
                    <option value="Completeness">Completeness</option>
                    <option value="Cut Off">Cut Off</option>
                    <option value="Valuation">Valuation</option>
                    <option value="Presentation">Presentation</option>
                  </select>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Modal CA --}}
<div class="modal fade" id="modalCA" tabindex="-1" aria-labelledby="labelModalCA" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="labelModalCA">Tambah Control Activity</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formModalTambahCA" action="#" method="POST">
            @csrf
            <div class="mb-3">
                <label for="codeCA" class="form-label">Code CA <span class="text-danger fw-bold">*</span></label>
                <input type="input" name="codeCA" class="form-control" id="codeCA" required>
            </div>
            <div class="mb-3">
                <label for="controlact" class="form-label">Control Activity <span class="text-danger fw-bold">*</span></label>
                <textarea name="controlact" id="controlact" cols="10" rows="10" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Modal Rsik --}}
<div class="modal fade" id="modalRisk" tabindex="-1" aria-labelledby="labelModalRisk" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="labelModalRisk">Tambah Control Activity</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formModalTambahRisk" action="#" method="POST">
            @csrf
            <div class="mb-3">
                <label for="risk" class="form-label">Risk<span class="text-danger fw-bold">*</span></label>
                <textarea name="risk" id="risk" cols="10" rows="10" class="form-control" required></textarea>
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
      function modalFormAddBisCyc(element){
        var tipeIndustri = element.getAttribute('data-tipeIndustri');
        // alert(tipeIndustri);
        document.getElementById('formModalTambahBisCyc').action = '/bis-cyc/' + tipeIndustri;
        document.getElementById('input-ti').value = tipeIndustri;
        // console.log(tipeIndustri);
      }

      function modalAddCO(element){
        var idBisCyc = element.getAttribute('data-id-cycle');
        
        document.getElementById('formModalTambahCO').action = '/co/' + idBisCyc;
      }

      function modalAddCA(element){
        
        var co_id = element.getAttribute('data-id-co');

        document.getElementById('formModalTambahCA').action = '/ca/' + co_id;
      }

      function modalAddRisk(element){
        var ca_id = element.getAttribute('data-id-ca');
        
        document.getElementById('formModalTambahRisk').action = '/risk/' + ca_id;
        
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