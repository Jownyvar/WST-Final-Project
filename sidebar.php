<div class="col-2 d-none d-lg-flex flex-column"
    style="background-color: #F5F5F5; height: calc(100vh - 56px); overflow-y: auto; padding: 20px;">
    <div class="d-flex flex-column h-100">
        <div class="text-center mb-4">
            <h2><strong>Dashboard</strong></h2>
        </div>
        <nav class="nav flex-column flex-grow-1">
            <a class="nav-link d-flex align-items-center mb-3 px-3 py-2 rounded" href="index.php" data-button="Home"
                style="color: #495057;">
                <img src="images/icons8_home.svg" alt="Home" class="me-3" style="width: 24px; height: 24px;">
                <span>Home</span>
            </a>
            <a class="nav-link d-flex align-items-center mb-3 px-3 py-2 rounded" href="manage-candidates.php"
                data-button="Manage Candidates" style="color: #495057;">
                <img src="images/icons8_admin_settings_male.svg" alt="Manage Candidates" class="me-3"
                    style="width: 24px; height: 24px;">
                <span>Manage Candidates</span>
            </a>
        </nav>
        <div class="mt-auto text-center">
            <small>© 2026 WST Project</small>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
    <div class="offcanvas-header">
        <div class="text-center mb-4">
            <h2><strong>Dashboard</strong></h2>
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="d-flex flex-column h-100">
            <nav class="nav flex-column flex-grow-1">
                <a class="nav-link d-flex align-items-center mb-3 px-3 py-2 rounded" href="index.php" data-button="Home"
                    style="color: #495057;">
                    <img src="images/icons8_home.svg" alt="Home" class="me-3" style="width: 24px; height: 24px;">
                    <span>Home</span>
                </a>
                <a class="nav-link d-flex align-items-center mb-3 px-3 py-2 rounded" href="manage-candidates.php"
                    data-button="Manage Candidates" style="color: #495057;">
                    <img src="images/icons8_admin_settings_male.svg" alt="Manage Candidates" class="me-3"
                        style="width: 24px; height: 24px;">
                    <span>Manage Candidates</span>
                </a>
            </nav>
            <div class="mt-auto text-center">
                <small>© 2026 WST Project</small>
            </div>
        </div>
    </div>
</div>

<script>
    const sidebarButtons = document.querySelectorAll('.nav-link[data-button]');
    let selectedSidebarButton = localStorage.getItem('selectedSidebarButton');

    function setActiveSidebarButton(name) {
        sidebarButtons.forEach(link => {
            if (link.dataset.button === name) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    }

    sidebarButtons.forEach(link => {
        link.addEventListener('click', function () {
            const name = this.dataset.button;
            localStorage.setItem('selectedSidebarButton', name);
            setActiveSidebarButton(name);
        });
    });

    if (selectedSidebarButton) {
        setActiveSidebarButton(selectedSidebarButton);
    } else {
        const currentLink = Array.from(sidebarButtons).find(link => link.href === window.location.href);
        if (currentLink) setActiveSidebarButton(currentLink.dataset.button);
    }
</script>

<style>
    .nav-link.active {
        background-color: #7C1F1F !important;
        color: white !important;
        font-weight: bold;
    }

    .nav-link:hover {
        background-color: #da8b8b !important;
        color: white !important;
    }
</style>