/**
 * SchoolSphere-Pro — Admin JS
 */

document.addEventListener('DOMContentLoaded', function() {
    const sidebarToggle = document.getElementById('adminSidebarToggle');
    const sidebar = document.getElementById('adminSidebar');
    const overlay = document.getElementById('adminSidebarOverlay');

    if (sidebarToggle && sidebar && overlay) {
        function openSidebar() {
            sidebar.classList.add('admin-sidebar--open');
            overlay.classList.add('admin-sidebar-overlay--active');
            document.body.style.overflow = 'hidden'; // prevent scrolling on mobile
        }

        function closeSidebar() {
            sidebar.classList.remove('admin-sidebar--open');
            overlay.classList.remove('admin-sidebar-overlay--active');
            document.body.style.overflow = '';
        }

        sidebarToggle.addEventListener('click', openSidebar);
        overlay.addEventListener('click', closeSidebar);
    }
});
