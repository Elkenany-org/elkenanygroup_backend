<input type="text" class="mySearch mx-auto d-block" id="mySearch" onkeyup="search(this.value)" placeholder="بحث" title="Type in a category">
<ul>

    <li class=" nav-item @if(request()->routeIs('News.index') || request()->routeIs('News.archive')) active @else noneactive @endif nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_1"
        aria-controls="ddmenu_1" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-newspaper fa-sm"></i>
            </span>
            <span class="text">الاخبار</span>
        </a>
        <ul id="ddmenu_1" class="dropdown-nav collapse">
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
            <a class="search collapsed"  class="" data-bs-toggle="collapse" data-bs-target="#ddmenu_2"
            aria-controls="ddmenu_2" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-list"></i>
            </span>
            <span class="text">اقسام الاخبار</span>
        </a>
        <ul id="ddmenu_2" class="dropdown-nav collapse">
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
    
    <li class=" nav-item @if(request()->routeIs('Articles.index') || request()->routeIs('Articles.archive')) active @else noneactive @endif nav-item-has-children">
        <a class="search collapsed" class="" data-bs-toggle="collapse" data-bs-target="#ddmenu_3"
           aria-controls="ddmenu_3" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-newspaper"></i>
            </span>
            <span class="text">المقالات</span>
        </a>
        <ul id="ddmenu_3" class="dropdown-nav collapse" style="">
            <li>
                <a href="{{route('Articles.index')}}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    عرض
                </a>
                <a href="{{route('Articles.create')}}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    اضافة
                </a>
            </li>
            <li>
            </li>
        </ul>
    </li>
        
    <li class=" nav-item @if(request()->routeIs('Jobs.index') || request()->routeIs('Jobs.archive')) active @else noneactive @endif nav-item-has-children">
        <a class="search collapsed" class="" data-bs-toggle="collapse" data-bs-target="#ddmenu_4"
           aria-controls="ddmenu_4" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-briefcase"></i>
            </span>
            <span class="text">الوظائف</span>
        </a>
        <ul id="ddmenu_4" class="dropdown-nav collapse" style="">
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
    
    <li class=" nav-item @if(request()->routeIs('Partners.index') || request()->routeIs('Partners.archive')) active @else noneactive @endif nav-item-has-children">
        <a class="search collapsed" class="" data-bs-toggle="collapse" data-bs-target="#ddmenu_40"
           aria-controls="ddmenu_40" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-briefcase"></i>
            </span>
            <span class="text">الشركاء</span>
        </a>
        <ul id="ddmenu_40" class="dropdown-nav collapse" style="">
            <li>
                <a href="{{route('Partners.index')}}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    عرض
                </a>
                <a href="{{route('Partners.create')}}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    اضافة
                </a>
            </li>
            <li>
            </li>
        </ul>
    </li>
    <li class=" nav-item @if(request()->routeIs('Employees.index') || request()->routeIs('Employees.create')) active @else noneactive @endif nav-item-has-children">
        <a class="search collapsed" class="" data-bs-toggle="collapse" data-bs-target="#ddmenu_400"
           aria-controls="ddmenu_400" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-briefcase"></i>
            </span>
            <span class="text">الموظفين</span>
        </a>
        <ul id="ddmenu_400" class="dropdown-nav collapse" style="">
            <li>
                <a href="{{route('Employees.index')}}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    عرض
                </a>
                <a href="{{route('Employees.create')}}">
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


    <li class="nav-item @if(request()->routeIs('Newcomers.index')) active @endif">
        <a class="search " href="{{route('Newcomers.index')}}">
              <span class="icon">
                <i class="fa-solid fa-message"></i>
              </span>
            <span class="text">المتقدمين لوظائف</span>
        </a>
    </li>
    <li class="nav-item @if(request()->routeIs('contactus.index') || request()->routeIs('contactus.archive')) active @endif">
        <a class="search " href="{{route('contactus.index')}}">
              <span class="icon">
                <i class="fa-solid fa-message"></i>
              </span>
            <span class="text">الشكاوي</span>
        </a>
    </li>
    <li class="nav-item @if(request()->routeIs('orders.index') || request()->routeIs('orders.archive')) active @endif">
        <a class="search " href="{{route('orders.index')}}">
              <span class="icon">
                <i class="fa-solid fa-message"></i>
              </span>
            <span class="text">الطلبات</span>
        </a>
    </li>
    @if (Auth::check() && Auth::user()->role == 'admin')
    <li class=" nav-item @if(request()->routeIs('users.index') || request()->routeIs('register_form')) active @else noneactive @endif nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_6"
        aria-controls="ddmenu_6" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon">
                <i class="fa-solid fa-circle-info"></i>
            </span>
            <span class="text">المستخدمين</span>
        </a>
        <ul id="ddmenu_6" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('users.index') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    عرض
                </a>
            </li>
            <li>
                <a href="{{ route('register_form') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    اضافة
                </a>
            </li>
        </ul>
    </li>
    @endif

    <li class=" nav-item @if(request()->routeIs('metadata.index') || request()->routeIs('metadata.create')) active @else noneactive @endif nav-item-has-children">
        <a class="search collapsed" class="" data-bs-toggle="collapse" data-bs-target="#ddmenu_7"
           aria-controls="ddmenu_7" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-link"></i>
            </span>
            <span class="text">Meta data</span>
        </a>
        <ul id="ddmenu_7" class="dropdown-nav collapse" style="">
            <li>
                <a href="{{route('metadata.index')}}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    show
                </a>
                <a href="{{route('metadata.create')}}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    add
                </a>
            </li>
        </ul>
    </li>
    <br>            
    <div class="col-12 d-flex justify-content-center align-items-center">
        <h5 class="font-weight-bold" style="color: #0d6efd;">Content</h5>
    </div>
    <br>
    <li class=" nav-item nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_8"
        aria-controls="ddmenu_8" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-circle-info"></i>
            </span>
            <span class="text">Home</span>
        </a>
        <ul id="ddmenu_8" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('content.show' ,['page_name' => 'home', 'type' => 'header1']) }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Header
                </a>
            </li>
        </ul>
    </li>
    <li class=" nav-item nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_9"
        aria-controls="ddmenu_9" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon">
            <i class="fa-solid fa-circle-info"></i>
        </span>
        <span class="text">About us</span>
    </a>
    <ul id="ddmenu_9" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('content.show' ,['page_name' => 'aboutus', 'type' => 'header']) }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Header
                </a>
            </li>
            <li>
                <a href="{{ route('content.show',['page_name' => 'aboutus', 'type' => 'body']) }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Body
                </a>
            </li>
            <li>
                <a href="{{ route('content.show' , ['page_name' => 'aboutus', 'type' => 'value1']) }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Values
                </a>
            </li>
            <li>
                <a href="{{ route('content.show',['page_name' => 'aboutus', 'type' => 'ceomessage']) }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Ceo message
                </a>
            </li>
            <li>
                <a href="{{ route('content.show',['page_name' => 'aboutus', 'type' => 'vision']) }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Vision & Objective
                </a>
            </li>
        </ul>
    </li>
    <li class=" nav-item nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_11"
        aria-controls="ddmenu_11" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon">
            <i class="fa-solid fa-circle-info"></i>
        </span>
        <span class="text">Our Companies</span>
        </a>
        <ul id="ddmenu_11" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('content.show',['page_name' => 'ourcompanies', 'type' => 'header']) }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Header
                </a>
            </li>
            <li>
                <a href="{{ route('content.show',['page_name' => 'ourcompanies', 'type' => 'activity']) }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Activity
                </a>
            </li>
            <li>
                <a href="{{ route('content.show',['page_name' => 'ourcompanies', 'type' => 'materials']) }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Materials
                </a>
            </li>
            <li>
                <a href="{{ route('content.show',['page_name' => 'ourcompanies', 'type' => 'experience']) }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Experience
                </a>
            </li>
        </ul>
    </li>
    <li class=" nav-item nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_14"
            aria-controls="ddmenu_14" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-circle-info"></i>
            </span>
            <span class="text">Partners</span>
        </a>
        <ul id="ddmenu_14" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('content.show',['page_name' => 'partners', 'type' => 'header']) }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Main Image
                </a>
            </li>
        </ul>
    </li>

    <li class=" nav-item nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_10"
        aria-controls="ddmenu_10" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon">
            <i class="fa-solid fa-circle-info"></i>
        </span>
        <span class="text">Careers</span>
        </a>
        <ul id="ddmenu_10" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('content.show' ,['page_name' => 'careers', 'type' => 'header']) }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Header
                </a>
            </li>
            <li>
                <a href="{{ route('content.show',['page_name' => 'careers', 'type' => 'reason1']) }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Reasons
                </a>
            </li>
            <li>
                <a href="{{ route('content.show',['page_name' => 'careers', 'type' => 'ourteam']) }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Our team
                </a>
            </li>
        </ul>
    </li>
    <li class=" nav-item nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_100"
        aria-controls="ddmenu_100" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon">
            <i class="fa-solid fa-circle-info"></i>
        </span>
        <span class="text">Jobs</span>
        </a>
        <ul id="ddmenu_100" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('content.show' ,['page_name' => 'Jobs', 'type' => 'header']) }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Header
                </a>
            </li>
        </ul>
    </li>
    
    <li class=" nav-item nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_13"
        aria-controls="ddmenu_13" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon">
            <i class="fa-solid fa-circle-info"></i>
        </span>
        <span class="text">Events</span>
        </a>
        <ul id="ddmenu_13" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('content.show',['page_name' => 'events', 'type' => 'header']) }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Main Image
                </a>
            </li>
        </ul>
    </li>
    <li class=" nav-item nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_12"
        aria-controls="ddmenu_12" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon">
            <i class="fa-solid fa-circle-info"></i>
        </span>
        <span class="text">Blog</span>
        </a>
        <ul id="ddmenu_12" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('content.show',['page_name' => 'blog', 'type' => 'header']) }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Main Image
                </a>
            </li>
        </ul>
    </li>
    <li class=" nav-item nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_122"
        aria-controls="ddmenu_122" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon">
            <i class="fa-solid fa-circle-info"></i>
        </span>
        <span class="text">Contact us</span>
        </a>
        <ul id="ddmenu_122" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('content.show',['page_name' => 'contactus', 'type' => 'header']) }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Main Image
                </a>
            </li>
        </ul>
    </li>
    
    <li class=" nav-item nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_15"
        aria-controls="ddmenu_15" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon">
            <i class="fa-solid fa-circle-info"></i>
        </span>
        <span class="text">Order Now</span>
        </a>
        <ul id="ddmenu_15" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('content.show',['page_name' => 'ordernow', 'type' => 'header']) }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Main Image
                </a>
            </li>
        </ul>
        <ul id="ddmenu_15" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('content.show',['page_name' => 'ordernow', 'type' => 'leftimage']) }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Left Image
                </a>
            </li>
        </ul>
        <ul id="ddmenu_15" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('content.show',['page_name' => 'ordernow', 'type' => 'rightimage']) }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Right Image
                </a>
            </li>
        </ul>
    </li>
    <li class=" nav-item nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_150"
        aria-controls="ddmenu_150" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon">
            <i class="fa-solid fa-circle-info"></i>
        </span>
        <span class="text">Footer</span>
        </a>
        <ul id="ddmenu_150" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('content.show',['page_name' => 'footer', 'type' => 'mainimage']) }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Main Image
                </a>
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
    