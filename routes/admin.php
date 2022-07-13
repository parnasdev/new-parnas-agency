<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "admin" middleware group. Enjoy building your Admin!
|
*/

Route::middleware(['auth:web' , 'role_access:panel'])->group(function () {
    Route::get('/panel' , \App\Http\Livewire\Admin\IndexPanel::class)->name('panel');

    Route::get('/tutorial' , \App\Http\Livewire\Admin\TutorialPage::class)->name('tutorial');

    Route::get('/files' , \App\Http\Livewire\Admin\IndexFile::class)->name('files.index');

    Route::prefix('posts')->name('posts.')->group(function () {
        Route::get('/' , \App\Http\Livewire\Admin\Posts\PostIndex::class)->name('index')->middleware('can:posts.read');
        Route::get('/create' , \App\Http\Livewire\Admin\Posts\PostCreate::class)->name('create')->middleware('can:posts.create');
        Route::get('/edit/{post}' , \App\Http\Livewire\Admin\Posts\PostEdit::class)->name('edit')->middleware('can:posts.edit');
    });

    Route::prefix('portfolio')->name('portfolio.')->group(function () {
        Route::get('/' , \App\Http\Livewire\Admin\Posts\PostIndex::class)->name('index')->middleware('can:posts.read');
        Route::get('/create' , \App\Http\Livewire\Admin\Posts\PostCreate::class)->name('create')->middleware('can:posts.create');
        Route::get('/edit/{post}' , \App\Http\Livewire\Admin\Posts\PostEdit::class)->name('edit')->middleware('can:posts.edit');
    });

    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/' , \App\Http\Livewire\Admin\Categories\CategoryIndex::class)->name('index')->middleware('can:categories.read');
        Route::get('/create' , \App\Http\Livewire\Admin\Categories\CategoryCreate::class)->name('create')->middleware('can:categories.create');
        Route::get('/edit/{category}' , \App\Http\Livewire\Admin\Categories\CategoryEdit::class)->name('edit')->middleware('can:categories.edit');
    });

    Route::prefix('links')->name('links.')->group(function () {
        Route::get('/' , \App\Http\Livewire\Admin\Links\LinkIndex::class)->name('index')->middleware('can:links.read');
        Route::get('/create' , \App\Http\Livewire\Admin\Links\LinkCreate::class)->name('create')->middleware('can:links.create');
        Route::get('/edit/{link}' , \App\Http\Livewire\Admin\Links\LinkEdit::class)->name('edit')->middleware('can:links.edit');
    });

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/' , \App\Http\Livewire\Admin\Users\UserIndex::class)->name('index')->middleware('can:users.read');
        Route::get('/create' , \App\Http\Livewire\Admin\Users\UserCreate::class)->name('create')->middleware('can:users.create');
        Route::get('/edit/{user}' , \App\Http\Livewire\Admin\Users\UserEdit::class)->name('edit')->middleware('can:users.edit');
    });

    Route::prefix('roles')->name('roles.')->group(function () {
        Route::get('/' , \App\Http\Livewire\Admin\Roles\RoleIndex::class)->name('index')->middleware('can:roles.read');
        Route::get('/create' , \App\Http\Livewire\Admin\Roles\RoleCreate::class)->name('create')->middleware('can:roles.create');
        Route::get('/edit/{role}' , \App\Http\Livewire\Admin\Roles\RoleEdit::class)->name('edit')->middleware('can:roles.edit');
    });

    Route::prefix('pages')->name('pages.')->group(function () {
        Route::get('/' , \App\Http\Livewire\Admin\Pages\PageIndex::class)->name('index')->middleware('can:pages.read');
        Route::get('/create' , \App\Http\Livewire\Admin\Pages\PageCreate::class)->name('create')->middleware('can:pages.create');
        Route::get('/edit/{post}' , \App\Http\Livewire\Admin\Pages\PageEdit::class)->name('edit')->middleware('can:pages.edit');
    });

    Route::prefix('setting')->name('settings.')->group(function () {
        Route::get('/' , \App\Http\Livewire\Admin\Setting\SettingPage::class)->name('index')->middleware('can:settings.read');
    });

    Route::prefix('tags')->name('tags.')->group(function () {
        Route::get('/' , \App\Http\Livewire\Admin\Tags\TagIndex::class)->name('index')->middleware('can:tags.read');
    });

    Route::prefix('comments')->name('comments.')->group(function () {
        Route::get('/{post?}' , \App\Http\Livewire\Admin\Comments\CommentIndex::class)->name('index')->middleware('can:comments.read');
    });

    Route::post('/editor-upload' , function () {
        $fileName = request()->file('file')->getClientOriginalName();
        $path = request()->file('file')->storeAs('editors', $fileName, 'uploads');
        return response()->json(['location'=>url("/uploads/$path")]);
    });

    Route::get('/getPost/{post_type}/{ignore?}' , function ($post_type , $ignore = null) {
        $q = request('q') ?? '';
        $posts = \App\Models\Post::query()->search($q)->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'text' => $item->title,
            ];
        });
        return response(['incomplete_results' => true , 'items' => $posts , 'total_count' => $posts->count()]);
    })->name('select_post');
});
Route::prefix('')->group(function () {
    Route::get('/login' , \App\Http\Livewire\Auth\Login::class)->name('login')->middleware('guest');
    Route::get('logout' , function () {
        auth()->logout();
        return redirect(route('login'));
    })->name('logout');
});
