<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AlbumsongController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create');
    Route::post('/songs', [SongController::class, 'store'])->name('songs.store');
    Route::get('/songs/{song}/edit', [SongController::class, 'edit'])->name('songs.edit');
    Route::put('/songs/{song}', [SongController::class, 'update'])->name('songs.update');
    Route::delete('/songs/{song}', [SongController::class, 'destroy'])->name('songs.destroy');


    Route::get('/bands/create', [BandController::class, 'create'])->name('bands.create');
    Route::post('/bands', [BandController::class, 'store'])->name('bands.store');
    Route::get('/bands/{band}/edit', [BandController::class, 'edit'])->name('bands.edit');
    Route::put('/bands/{band}', [BandController::class, 'update'])->name('bands.update');
    Route::delete('/bands/{band}', [BandController::class, 'destroy'])->name('bands.destroy');


    Route::get('/albums/create', [AlbumController::class, 'create'])->name('albums.create');
    Route::post('/albums', [AlbumController::class, 'store'])->name('albums.store');
    Route::get('/albums/{album}/edit', [AlbumController::class, 'edit'])->name('albums.edit');
    Route::put('/albums/{album}', [AlbumController::class, 'update'])->name('albums.update');
    Route::delete('/albums/{album}', [AlbumController::class, 'destroy'])->name('albums.destroy');

    Route::delete('/albumsong/{album}', [AlbumsongController::class, 'destroy'])->name('albumsong.destroy');
    Route::post('/albumsong/{album}', [AlbumsongController::class, 'store'])->name('albumsong.store');
});


Route::get('/', [SongController::class, 'index'])->name('songs.index');

Route::get('/homepage', function () {
    return view('homepage');
});


Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
Route::get('/songs/{index}', [SongController::class, 'show'])->name('songs.show', );


Route::get('/bands', [BandController::class, 'index'])->name('bands.index');
Route::get('/bands/{index}', [BandController::class, 'show'])->name('bands.show', );


Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
Route::get('/albums/{index}', [AlbumController::class, 'show'])->name('albums.show', );

require __DIR__ . '/auth.php';
