<div class="br-logo"><a href=""><span>[</span>MunMun <i>plus</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="{{Route('dashboard')}}" class="br-menu-link active">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <!-- <span class="menu-item-label">Cards &amp; Widgets</span> -->
            <span class="menu-item-label">Slider</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('slider.manage')}}" class="sub-link">Manage slider</a></li>
            <li class="sub-item"><a href="{{route('slider.add')}}" class="sub-link">Add Slider</a></li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <!-- <span class="menu-item-label">Cards &amp; Widgets</span> -->
            <span class="menu-item-label">About</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('about.manage')}}" class="sub-link">Manage About</a></li>
            <li class="sub-item"><a href="{{route('about.add')}}" class="sub-link">ABout added</a></li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <!-- <span class="menu-item-label">Cards &amp; Widgets</span> -->
            <span class="menu-item-label">Portfolio</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('manage.portfolio')}}" class="sub-link">Manage Portfolio</a></li>
            <li class="sub-item"><a href="{{route('add.portfolio')}}" class="sub-link">Add Portfolio</a></li>
          </ul>
        </li>
        <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Information Summary</label>
      </ul><!-- br-sideleft-menu -->

      <br>
    </div>