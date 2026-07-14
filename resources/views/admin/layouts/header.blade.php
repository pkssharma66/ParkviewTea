<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">

    <div class="container-fluid">

        <h4 class="mb-0">Dashboard</h4>

        <div class="dropdown ms-auto">

            <button class="btn btn-light dropdown-toggle d-flex align-items-center"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false">

                @if(auth('admin')->user()->photo)
                    <img src="{{ asset('uploads/admin/'.auth('admin')->user()->photo) }}"
                        width="35"
                        height="35"
                        class="rounded-circle me-2">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth('admin')->user()->name) }}"
                        width="35"
                        height="35"
                        class="rounded-circle me-2">
                @endif

                {{ auth('admin')->user()->name }}

            </button>

            <ul class="dropdown-menu dropdown-menu-end">

                <li>
                    <a class="dropdown-item"
                        href="{{ route('admin.profile') }}">
                        👤 My Profile
                    </a>
                </li>

                <li>
                    <a class="dropdown-item"
                        href="{{ route('admin.change.password') }}">
                        🔒 Change Password
                    </a>
                </li>

                <li><hr class="dropdown-divider"></li>

                <li>

                    <form action="{{ route('admin.logout') }}"
                        method="POST">

                        @csrf

                        <button class="dropdown-item text-danger">
                            🚪 Logout
                        </button>

                    </form>

                </li>

            </ul>

        </div>

    </div>

</nav>