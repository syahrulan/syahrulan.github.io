<?php

use App\Models\Post;
use App\Models\Video;
use App\Models\Team;
use App\Models\Training;
use App\Models\Project;
use App\Models\Workspace;
use App\Models\WorkspaceImage;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardVideoController;
use App\Http\Controllers\DashboardTeamController;
use App\Http\Controllers\DashboardTrainingController;
use App\Http\Controllers\DashboardProjectController;
use App\Http\Controllers\DashboardWorkspaceController;
use App\Http\Controllers\ChatbotController;


// HOMEPAGE START ------------------------------------------------------------------------------------------------------------------------->
Route::get('/', function () {
    $videos = Video::latest()->take(6)->get(); // Fix case-sensitive model name
    $teams = Team::orderBy('id', 'asc')->get();  // Add a `take(6)` for consistency
    $training = Training::latest()->take(4)->get();  // Add a `take(6)` for consistency
    return view('homepage.home', [
        'videos' => $videos,
        'teams' => $teams,
        'trainings' => $training
    
    ]);
});
Route::get('/trainings', function () {
    $trainings = Training::latest()->get(); // Ambil semua data training
    return view('Homepage.trainings', compact('trainings')); // Kirim data ke view
});
Route::get('/posts', function () {
    // Start with the base query
    $posts = Post::latest();
    // Apply the search filter if 'search' parameter is present
    if(request('search')){
        $posts->where('title', 'like', '%' . request('search') . '%');
    }
    // Paginate the results
    $posts = $posts->paginate(6);
    // Pass the paginated results to the view
    return view('Homepage.posts', ['posts' => $posts]);
});
Route::get('/contactus', function () {
    return view('Homepage.contactus');
});
// HOMEPAGE END ------------------------------------------------------------------------------------------------------------------------->


// PBL PAGE START ------------------------------------------------------------------------------------------------------------------------->
Route::get('/whatpbl', function () {
    return view('pblpage.whatpbl');
});
Route::get('/pbl', function () {
     // Start with the base query
 $workspaces = Workspace::latest();
  // Paginate the results
  $workspaces = $workspaces->paginate(6);
    return view('pbl', ['workspaces' => $workspaces]);
});

Route::get('/workspace', function () {
    return view('workspace');
});



// PBL PAGE END ------------------------------------------------------------------------------------------------------------------------->

// PROJECTS PAGE START  ------------------------------------------------------------------------------------------------------------------------->
// Business Management
Route::get('/business', function () {
    $projects = Project::where('kategori', 'BUSINESS MANAGEMENT')->latest()->get();
    return view('projects.manajemenbisnis', compact('projects'));
});
// Electrical Engineering
Route::get('/electrical', function () {
    $projects = Project::where('kategori', 'ELECTRICAL ENGINEERING')->latest()->get();
    return view('projects.electro', compact('projects'));
});
// Informatics Engineering
Route::get('/informatics', function () {
    $projects = Project::where('kategori', 'INFORMATICS ENGINEERING')->latest()->get();
    return view('projects.informatika', compact('projects'));
});
// Mechanical Engineering
Route::get('/mechanical', function () {
    $projects = Project::where('kategori', 'MECHANICAL ENGINEERING')->latest()->get();
    return view('projects.mesin', compact('projects'));
});
// PROJECTS PAGE END ------------------------------------------------------------------------------------------------------------------------->


// PAGE SLUG START ------------------------------------------------------------------------------------------------------------------------->
Route::get('/trainings/{training:slug}', function (Training $training) {
    return view('training', compact('training')); // Pastikan tetap ke 'training'
});
Route::get('/videos/{video:slug}', function (Video $video) {
    $recentNews = Post::latest()->take(5)->get(); // Ambil berita terbaru
    return view('videocomplete', ['video' => $video, 'recentNews' => $recentNews]);
});
Route::get('/posts/{post:slug}',  function (Post $post) {
    return view('post', ['post' => $post]);
});

Route::get('/workspace/{workspace:slug}',  function (Workspace $workspace) {
    return view('workspace', ['workspace' => $workspace]);
});
// PAGE SLUG END ------------------------------------------------------------------------------------------------------------------------->


// AUTH START ------------------------------------------------------------------------------------------------------------------------->
// login
Route::get('/login',  [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',  [LoginController::class, 'authenticate']);
Route::post('/logout',  [LoginController::class, 'logout']);
// register
Route::get('/register',  [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',  [RegisterController::class, 'store']);
// AUTH END ------------------------------------------------------------------------------------------------------------------------->


// DASHBOARD START ------------------------------------------------------------------------------------------------------------------------->
Route::get('/dashboard',  function() {
    return view('dashboard.index');
})->middleware('auth');

// POSTS
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource( '/dashboard/posts', DashboardPostController::class)->middleware('auth');
// VIDEOPOST
Route::get('/dashboard/videopost/checkSlug', [DashboardVideoController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/videopost', DashboardVideoController::class)->middleware('auth');
// TEAMS
Route::get('/dashboard/teams/checkSlug',[DashboardTeamController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/teams', DashboardTeamController::class)->middleware('auth');
// TRAININGS
Route::get('/dashboard/trainings/checkSlug',[DashboardTrainingController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/trainings', DashboardTrainingController::class)->middleware('auth');
// PROJECTS
Route::get('/dashboard/projects/checkSlug',[DashboardProjectController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/projects', DashboardProjectController::class)->middleware('auth');
// WORKSPACES
Route::get('/dashboard/workspaces/checkSlug',[DashboardWorkspaceController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/workspaces', DashboardWorkspaceController::class)->middleware('auth');
// DASHBOARD END ------------------------------------------------------------------------------------------------------------------------->

Route::post('/chatbot', [ChatbotController::class, 'chat']);




