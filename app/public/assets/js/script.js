
document.addEventListener('DOMContentLoaded', function() {
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.querySelector('.sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const wrapper = document.querySelector('.wrapper');
    
    // Toggle sidebar function
    function toggleSidebar() {
        if (window.innerWidth <= 768) {
            // Mobile behavior
            sidebar.classList.toggle('show');
            sidebarOverlay.classList.toggle('active');
        } else {
            // Desktop behavior
            wrapper.classList.toggle('sidebar-collapsed');
        }
    }
    
    // Toggle sidebar on button click
    sidebarToggle.addEventListener('click', function(e) {
        e.stopPropagation(); // Prevent event bubbling
        toggleSidebar();
    });
    
    // Close sidebar when clicking outside on mobile
    sidebarOverlay.addEventListener('click', function() {
        if (window.innerWidth <= 768) {
            sidebar.classList.remove('show');
            sidebarOverlay.classList.remove('active');
        }
    });
    
    // Close sidebar when clicking on nav items (optional)
    document.querySelectorAll('.sidebar .nav-link').forEach(item => {
        item.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
                sidebar.classList.remove('show');
                sidebarOverlay.classList.remove('active');
            }
        });
    });
    
    // Auto-close sidebar when resizing to desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            sidebar.classList.remove('show');
            sidebarOverlay.classList.remove('active');
            wrapper.classList.remove('sidebar-collapsed');
        }
    });
});