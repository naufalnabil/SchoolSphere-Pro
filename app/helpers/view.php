<?php
/**
 * SchoolSphere-Pro — View Helpers
 *
 * Helper untuk rendering view dan layout.
 */

/**
 * Render view dalam layout.
 *
 * @param string $viewFile  Path relatif dari app/views/ (misal 'public/home.php')
 * @param array  $data      Data yang dikirim ke view
 * @param string $layout    Path relatif layout dari app/views/layouts/
 */
function render_view(string $viewFile, array $data = [], string $layout = 'public.php'): void
{
    // Ekstrak data agar bisa diakses sebagai variabel di view
    extract($data);

    // Tangkap konten view ke buffer
    ob_start();
    $viewFullPath = view_path($viewFile);
    if (file_exists($viewFullPath)) {
        include $viewFullPath;
    }
    $content = ob_get_clean();

    // Render layout dengan $content di dalamnya
    $layoutFullPath = view_path('layouts/' . $layout);
    if (file_exists($layoutFullPath)) {
        include $layoutFullPath;
    } else {
        echo $content;
    }
}
