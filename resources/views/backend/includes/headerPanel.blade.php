<div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="input-group hidden-xs-down wd-170 transition">
          <input id="searchbox" type="text" class="form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-secondary" type="button"><i class="fas fa-search"></i></button>
          </span>
        </div><!-- input-group -->
      </div><!-- br-header-left -->     
        @php
              $id = Auth::user()->id;
              $profileimgShow = App\Models\User::find($id);
        @endphp



      <div class="br-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down"><b>{{Auth::user()->name}}</b></span>
              <img src="{{!empty($profileimgShow->profile_image) ? asset('backend/adminimage/'.$profileimgShow->profile_image) : asset('backend/'.'defaultimage.png')}}" class="wd-32 rounded-circle" alt="">
              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-250">
              <div class="tx-center">
                <a href=""><img src="{{!empty($profileimgShow->profile_image) ? asset('backend/adminimage/'.$profileimgShow->profile_image) : asset('backend/'.'defaultimage.png')}}" class="wd-80 rounded-circle" alt=""></a>
                <h6 class="logged-fullname">{{Auth::user()->name}}</h6>
                <p>{{Auth::user()->email}}</p>
              </div>
              <hr>
              <div class="tx-center">
                <span class="profile-earning-label">Earnings After Taxes</span>
                <h3 class="profile-earning-amount">$13,230 <i class="icon ion-ios-arrow-thin-up tx-success"></i></h3>
                <span class="profile-earning-text">Based on list price.</span>
              </div>
              <hr>
              <ul class="list-unstyled user-profile-nav">
                <li><a href="{{route('editeprofile')}}"><i class="icon ion-ios-person"></i> Edit Profile</a></li>
                <li><a href=""><i class="icon ion-ios-gear"></i> Settings</a></li>
                <li><a href=""><i class="icon ion-ios-download"></i> Downloads</a></li>
                <li><a href=""><i class="icon ion-ios-star"></i> Favorites</a></li>
                <li><a href=""><i class="icon ion-ios-folder"></i> Collections</a></li>
                <li>
                <!-- <form method="POST" action="{{ route('logout') }}">
                    @csrf -->
                    <!-- onclick="event.preventDefault(); -->
                                        <!-- this.closest('form').submit();" -->
                  <a href="{{route('signoutrouter')}}">
                    <i class="icon ion-power"></i> Sign Out
                  </a>
                  <!-- </form> -->
                </li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
      </div><!-- br-header-right -->
    </div>