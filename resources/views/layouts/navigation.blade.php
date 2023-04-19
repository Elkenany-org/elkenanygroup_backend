<input type="text" class="mySearch mx-auto d-block" id="mySearch" onkeyup="search(this.value)" placeholder="بحث" title="Type in a category">
<ul>

    <li class=" nav-item @if(request()->routeIs('home')) active @endif">
        <a class="search " href="{{ route('News.index') }}">
              <span class="icon">
                <svg width="22" height="22" viewBox="0 0 22 22">
                  <path
                          d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z"
                  />
                </svg>
              </span>
            <span class="text">{{ __('Dashboard') }}</span>
        </a>
    </li>

    <li class=" nav-item @if(request()->routeIs('users.index')) active @endif">
        <a class="search " href="{{ route('users.index') }}">
              <span class="icon">
                <i class="fa-solid fa-phone fa-sm"></i>
              </span>
            <span class="text">اتصل بنا</span>
        </a>
    </li>
    <li class="nav-item @if(request()->routeIs('Complaints.index') || request()->routeIs('Complaints.archive')) active @endif">
        <a class="search " href="{{ route('Complaints.index') }}">
              <span class="icon">
                <i class="fa-solid fa-message"></i>
              </span>
            <span class="text">الشكاوي</span>
        </a>
    </li>

    {{-- <li class="nav-item @if(request()->routeIs('about')) active @endif">
        <a href="{{ route('about') }}">
            <span class="icon">
                <svg width="22" height="22" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                </svg>
            </span>
            <span class="text">الاخبار</span>
        </a>
    </li>

     --}}
    <li class=" nav-item @if(request()->routeIs('News.index')) active @else noneactive @endif nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_2"
           aria-controls="ddmenu_2" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-newspaper fa-sm"></i>
            </span>
            <span class="text">الاخبار</span>
        </a>
        <ul id="ddmenu_2" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('News.index') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    عرض
                </a>
            </li>
            <li>
                <a href="{{ route('News.create') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    اضافة
                </a>
            </li>
        </ul>
    </li>

    <li class=" nav-item nav-item-has-children">
        <a class="search collapsed"  class="" data-bs-toggle="collapse" data-bs-target="#ddmenu_4"
           aria-controls="ddmenu_4" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-list"></i>
            </span>
            <span class="text">اقسام الاخبار</span>
        </a>
        <ul id="ddmenu_4" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('category.index') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    عرض
                </a>
            </li>
            <li>
                <a href="{{ route('category.create') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    اضافة
                </a>
            </li>
        </ul>
    </li>

    <li class=" nav-item nav-item-has-children">
        <a class="search collapsed" class="" data-bs-toggle="collapse" data-bs-target="#ddmenu_3"
           aria-controls="ddmenu_3" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-briefcase"></i>
            </span>
            <span class="text">الوظائف</span>
        </a>
        <ul id="ddmenu_3" class="dropdown-nav collapse" style="">
            <li>
                <a href="{{route('Jobs.index')}}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    عرض
                </a>
                <a href="{{route('Jobs.create')}}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    اضافة
                </a>
            </li>
            <li>
            </li>
        </ul>
    </li>

    

    


</ul>

<script>
    function search (input) 
    {
        input = input.toLowerCase()
        let links = document.querySelectorAll(".search")

        for (let index = 0; index < links.length; index++) {
            if (links[index].textContent.toLowerCase().includes(input)) {
                links[index].style.display = "flex"
            }   else {
                links[index].style.display = "none"
            }
        }
    }
</script>
    