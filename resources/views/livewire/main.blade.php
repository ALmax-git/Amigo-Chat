<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
      <div class="app-brand demo">
        <a href="/" class="app-brand-link">
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
                  <li class="w-100 mb-1">
                    <div class="menu-link btn btn-outline-info" wire:click='toggleChatBox({{ $Amigo->id }})'>
                      <i class="menu-icon tf-icons bx bx-user-circle"></i>
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
          <form wire:submit="sendMessage" class="row">
              <div class="col-md-6 col-lg-12">
                  {{-- <div class="card overflow-hidden mb-4" style="height: 60vh"> --}}
                      {{-- <div class="card-body" id="vertical-example"> --}}
                          <div class="card" style="overflow-y: auto; height: 65vh; border: 1px solid #ccc;">
                              <div class="card-body msg_card_body" wire:poll='loadMessages'>
                                  @forelse ($messages as $message)
                                      @if ($message->sender_id === Auth::id())
                                          <!-- Outgoing Message -->
                                          <div class="d-flex justify-content-end mb-4">
                                              <div class="w-50 msg_cotainer_send p-2" style="border: 1px solid black; border-radius: 5px; text-align: right">
                                                 {{ $message->content }}<br>
                                                  <small class="msg_time_send">{{ $message->created_at->format('g:i A, M d') }}</small>
                                              </div>
                                          </div>
                                      @else
                                          <!-- Incoming Message -->
                                          <div class="d-flex justify-content-start  mb-4">
                                              {{-- <div class="img_cont_msg">
                                                  <img width="40" src="https://via.placeholder.com/40" class="rounded-circle user_img_msg" alt="Friend Image">
                                              </div> --}}
                                              <div class="w-50 msg_cotainer p-2" style="border: 1px solid black; border-radius: 5px;">
                                                 {{ $message->content }}<br> 
                                                  <small class="msg_time">{{ $message->created_at->format('g:i A, M d') }}</small>
                                              </div>
                                          </div>
                                      @endif
                                  @empty
                                      <p>No messages yet. Say Hi to {{ $friend->name }}!</p>
                                  @endforelse
                              </div>
                          </div>
                      {{-- </div>
                  </div> --}}
              </div>

        <div class="input-group">
            <input type="text" class="form-control" wire:model="new_text_message" placeholder="Hello {{ $friend->name }}">
            <button type="submit" class="btn btn-outline-success">
                <span class="text-primary"><i class="fas fa-location-arrow"></i></span>
            </button>
            <label for="upload" class="btn btn-light text-info" tabindex="0">
                <i class="fas fa-paperclip"></i>
                <input type="file" id="upload" hidden />
            </label>
        </div>
    </form>
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
