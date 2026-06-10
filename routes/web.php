use Illuminate\Support\Facades\Route;

// Forzar la ruta raíz a que apunte a la vista principal real de tu proyecto
// REEMPLAZA 'welcome' por el nombre exacto de la vista de tu página de inicio (sin el .blade.php)
Route::get('/', function () {
    return view('welcome'); 
});

// Ruta de prueba rápida para asegurarnos al 100% de que responde
Route::get('/test-vivo', function () {
    return "¡Laravel está completamente vivo en Render!";
});
