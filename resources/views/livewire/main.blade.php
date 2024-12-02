<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
      <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
          <span class="app-brand-text">Amigo Chat</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
          <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
      </div>

      <div class="menu-inner-shadow"></div>
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
            <i class="bx bx-search fs-4 lh-0"></i>
            <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User Dropdown -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                    <img src="build/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                    <a class="dropdown-item" href="#">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar avatar-online">
                                <img src="build/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-semibold d-block">{{ $friend->name }}</span>
                                <small class="text-muted">Admin</small>
                            </div>
                        </div>
                    </a>
                    </li>
                    <li>
                    <div class="dropdown-divider"></div>
                    </li>
                    <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i><span class="align-middle">My
                        Profile</span></a></li>
                    <li><a class="dropdown-item" href="#"><i class="bx bx-cog me-2"></i><span
                        class="align-middle">Settings</span></a></li>
                    <li>
                    <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                        <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                        <span class="flex-grow-1 align-middle">Billing</span>
                        <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                    </a>
                    </li>
                    <li>
                    <div class="dropdown-divider"></div>
                    </li>
                    <li>
                    <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                        @csrf
                        <button type="submit" class="btn btn-light">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                        </button>
                    </form>
                    </li>
                </ul>
                </li>
                <!--/ User -->
            </ul>
            </div>
        </div>
      <br>

      <div class="row">
        <div class="col">
          <div class="nav-align-top mb-4">
            <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
              <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                  data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home"
                  aria-selected="true">
                  <i class="tf-icons bx bx-user"></i>
                  <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger">3</span>
                </button>
              </li>
              <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                  data-bs-target="#navs-pills-justified-profile" aria-controls="navs-pills-justified-profile"
                  aria-selected="false">
                  <i class="tf-icons bi bi-people"></i>
                </button>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
                <ul class="menu-inner py-1">
                  @foreach ($friends as $Amigo)
                  <li class="menu-item {{---active--}}">
                    <div class="menu-link" wire:click='toggle_chat_box({{ $Amigo->id }})'>
                      <i class="menu-icon tf-icons bx bx-home-circle"></i>
                      <div data-i18n="Analytics">{{ $Amigo->name }}</div>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
              <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
                <ul class="menu-inner py-1">
                  <li class="menu-item {{---active--}}">
                    <a href="/" class="menu-link">
                      <i class="menu-icon tf-icons bx bx-home-circle"></i>
                      <div data-i18n="Analytics">Groups</div> <!-- Fixed typo from "Grops" to "Groups" -->
                    </a>
                  </li>
                  <li class="menu-item {{---active--}}">
                    <a href="/" class="menu-link">
                      <i class="menu-icon tf-icons bx bx-home-circle"></i>
                      <div data-i18n="Analytics">Groups</div>
                    </a>
                  </li>
                  <li class="menu-item {{---active--}}">
                    <a href="/" class="menu-link">
                      <i class="menu-icon tf-icons bx bx-home-circle"></i>
                      <div data-i18n="Analytics">Groups</div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </aside>

    <div class="layout-page">
      <livewire:header />
      <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">
            <div class="col-md-6 col-lg-12">
              <div class="card overflow-hidden mb-4" style="height: 60vh">

                <div class="card-body" id="vertical-example">
                  <div class="card">
                    <div class="card-body msg_card_body">
                      @if (isset($messages))

@forelse ($messages as $message) {{-- Messages Here --}}

                      <div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                          <img width="40" src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg"
                            class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                          {{ $message->content }}
                          <span class="msg_time">8:40 AM, Today</span>
                        </div>
                      </div>

                      <div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send">
                          Hi Khalid i am good tnx how about you?
                          <span class="msg_time_send">8:55 AM, Today</span>
                        </div>
                        <div class="img_cont_msg">
                          <img width="40"
                            src=""
                            class="rounded-circle user_img_msg">
                        </div>
                      </div>
                      @empty
                      <h1> empty </h1>
@endforelse
                      @endif

                    </div>

                  </div>
                </div>
              </div>
            </div>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Hello -- World! {{ $friend->name }}"
                aria-label="Recipient's username with two button addons">
              <button class="btn btn-light" type="button"><span class="text-primary"><i
                    class="fas fa-location-arrow"></i></span></button>
              <label for="upload" class="btn btn-light text-info" tabindex="0">
                <i class="fas fa-paperclip"></i>
                <input type="file" id="upload" hidden />
              </label>
            </div>
          </div>
        </div>

        <footer class="content-footer footer bg-footer-theme">
          <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
            <div class="mb-2 mb-md-0">
              &copy;
              <script>
                document.write(new Date().getFullYear());
              </script>
              ALmax, made with ❤️ by
              <a href="https://github.com/ALmax-git/" target="_blank" class="footer-link fw-bolder">Group 13</a>
            </div>
            <div>
              <a href="https://github.com/ALmax-git/" class="footer-link me-4" target="_blank">License</a>
              <a href="https://github.com/ALmax-git/Amigo-chat" target="_blank"
                class="footer-link me-4">Documentation</a>
              <a href="mailto:alimustaphashettima@gmail.com" target="_blank" class="footer-link me-4">Support</a>
            </div>
          </div>
        </footer>
        <div class="content-backdrop fade"></div>
      </div>
    </div>
  </div>
  <div class="layout-overlay layout-menu-toggle"></div>
</div>
