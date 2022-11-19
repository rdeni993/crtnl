{{-- Navigation --}}
<nav class="d-flex align-items-center justify-content-between p-4 bg-light">
    
    {{-- Page Title --}}
    <div>
        {{-- Present Account Type --}}
        <p class="m-0"><small>{{ Str::ucfirst($accountType) }}</small></p>
        
        {{-- Page Title --}}
        <h5>{{ $pageTitle }}</h5>
    </div>

    {{-- Nav --}}
    <div class="d-inline-flex">
        <form action="{{ url('/search') }}" method="GET">
        <div class="search bg-white rounded me-4">
            <div class="input-group">
                <input type="search" name="q" class="form-control rounded bg-transparent border-0" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <button class="btn">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        </form>

        <a href="{{ route('logout') }}" class="btn">
            <i class="fa fa-sign-out me-2"></i> 
            <span>Sign Out</span>
        </a>    
    </div>

</nav>