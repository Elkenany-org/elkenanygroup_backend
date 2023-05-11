<input type="text" class="mySearch mx-auto d-block" id="mySearch" onkeyup="search(this.value)" placeholder="بحث" title="Type in a category">
<ul>

    <li class=" nav-item @if(request()->routeIs('News.index') || request()->routeIs('News.archive')) active @else noneactive @endif nav-item-has-children">
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
    
    <li class=" nav-item @if(request()->routeIs('category.index') || request()->routeIs('category.archive')) active @else noneactive @endif nav-item-has-children">
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
    
        
    <li class=" nav-item @if(request()->routeIs('job.index') || request()->routeIs('job.archive')) active @else noneactive @endif nav-item-has-children">
        <a class="search collapsed" class="" data-bs-toggle="collapse" data-bs-target="#ddmenu_3"
           aria-controls="ddmenu_3" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-briefcase"></i>
            </span>
            <span class="text">الوظائف</span>
        </a>
        <ul id="ddmenu_3" class="dropdown-nav collapse" style="">
            <li>
                <a href="{{route('job.index')}}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    عرض
                </a>
                <a href="{{route('job.create')}}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    اضافة
                </a>
            </li>
            <li>
            </li>
        </ul>
    </li>
    
    <li class=" nav-item @if(request()->routeIs('info.index') || request()->routeIs('info.archive')) active @else noneactive @endif nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_5"
        aria-controls="ddmenu_5" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-circle-info"></i>
            </span>
            <span class="text">البيانات</span>
        </a>
        <ul id="ddmenu_5" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('info.index') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    عرض
                </a>
            </li>
            <li>
                <a href="{{ route('info.create') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    اضافة
                </a>
            </li>
        </ul>
    </li>


    <li class="nav-item @if(request()->routeIs('contactus.index') || request()->routeIs('contactus.archive')) active @endif">
        <a class="search " href="{{route('contactus.index')}}">
              <span class="icon">
                <i class="fa-solid fa-message"></i>
              </span>
            <span class="text">الشكاوي</span>
        </a>
    </li>
    {{-- @if (Auth::check() && Auth::user()->email == "amr.esmail@elkenany.com")
        <li class="nav-item @if(request()->routeIs('add_user')) active @endif">
            <a class="search " href="{{route('add_user')}}">
                <span class="icon">
                    <i class="fa-solid fa-user"></i>
                </span>
                <span class="text">اضافة ادمن</span>
            </a>
        </li>
    @endif --}}

   

    

    


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
    