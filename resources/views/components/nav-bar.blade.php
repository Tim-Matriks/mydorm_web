<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between align-items-center mb-3">
    <div class="d-flex align-items-center">
        <button class="btn btn-outline-secondary me-2"><i class="bx bx-menu"></i></button>
        <h1 class="h4 mb-0">{{ $slot }}</h1>
    </div>
    <div class="d-flex align-items-center">
        <a href="#" class="btn btn-light position-relative me-3">
            <i class="bx bxs-bell fs-4"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                8
                <span class="visually-hidden">unread messages</span>
            </span>
        </a>
        <a href="#" class="profile">
            <img src="../assets/images/avatar.jpg" alt="avatar" class="rounded-circle" width="40" height="40">
        </a>
    </div>
</nav>
<!-- NAVBAR -->