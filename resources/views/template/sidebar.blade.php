<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="../dashboard/index.html" class="b-brand text-primary">
        <!-- ========   Change your logo from here   ============ -->
        <img src="../assets/images/logo-dark.svg" class="img-fluid logo-lg" alt="logo">
      </a>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
            <span class="pc-mtext">Dashboard</span>
          </a>
        </li>

        <li class="pc-item pc-caption">
          <label>Controls</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="/controls" class="pc-link">
            <span class="pc-micon">
              <i class="ti ti-menu"></i>
            </span>
            <span class="pc-mtext">Input Controls</span>
          </a>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="#" class="pc-link"><span class="pc-micon"><i class="ti ti-menu"></i></span><span class="pc-mtext">Understanding</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            {{-- @dd($tis) --}}
            @foreach ($tis as $ti)
              @if ($ti->kodeIndustri === 'ITGC')
                <li class="pc-item pc-hasmenu">
                  <a href="#" class="pc-link">{{$ti->nama}}<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                  <ul class="pc-submenu">
                    @foreach ($ti->bisCycs as $bisCyc)
                      <li class="pc-item pc-hasmenu">
                        <a href="#!" class="pc-link">{{$bisCyc->kodeBisCyc}}<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                        <ul class="pc-submenu">
                          @foreach ($bisCyc->co_objs as $co_obj)
                            <li class="pc-item pc-hasmenu">
                              <a class="pc-link" href="#!">{{$co_obj->kodeCO}}<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a> <!-- Ke halaman leadsheet per CO -->
                              <ul class="pc-submenu" style="padding-left: 30px !important;">
                                @foreach ($co_obj->co_acts as $co_act)
                                  <li class="pc-item" >
                                    <a class="pc-link" href="#!">{{$co_act->kodeCA}}</a> <!-- Ke halaman pengisian activity per CA -->
                                  </li>
                                @endforeach
                              </ul>
                            </li>
                          @endforeach
                        </ul>
                      </li>
                    @endforeach
                  </ul>
                </li>
              @endif
            @endforeach
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- [ Sidebar Menu ] end --> 