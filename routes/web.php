<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\PropertyController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\PropertyCategoryController;
use App\Http\Controllers\Home\PropertyLocationController;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('frontend/index');
});


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'HomeMain')->name('home');
});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth'])->group(function () {




//Admin All Routes
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'profile')->name('admin.profile');
        Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile');
        Route::get('/change/password', 'ChangePassword')->name('change.password');
        Route::post('/update/password', 'UpdatePassword')->name('update.password');
        
        Route::get('/add/agent', 'AddAgent')->name('add.agent');
        Route::post('/store/agent', 'StoreAgent')->name('store.agent');
        Route::get('/all/agent', 'AllAgent')->name('all.agent');
        Route::get('/delete/agent/{id}', 'DeleteAgent')->name('delete.agent');
    });

        // Property All Route 
    Route::controller(PropertyController::class)->group(function () {
        Route::get('/all/property', 'AllProperty')->name('all.prop');
        Route::get('/add/prop', 'AddProperty')->name('add.prop');
        Route::post('/store/property', 'StoreProperty')->name('store.property');
        Route::get('/edit/property/{id}', 'EditProperty')->name('edit.props');
        Route::post('/update/property', 'UpdateProperty')->name('update.property');
        Route::post('/update/property/cover', 'UpdatePropertyCover')->name('update.property.cover');
        Route::post('/update/property/multi', 'UpdatePropertyMulti')->name('update.property.multiimage');
        Route::get('/delete/property/multi/{id}', 'MultiImageDelete')->name('property.multiimg.delete');
        Route::post('/store/property/more/photo', 'StorePropertyMorePhoto')->name('store.property.more.photo');
        Route::get('/delete/property/{id}', 'DeleteProperty')->name('delete.props');

        Route::get('/search/property/byid/{keyword?}', 'SearchPropertyById')->name('search.prop.id');
        Route::get('/all/property/featued', 'AllPropertyFeatured')->name('all.prop.featured');
        Route::get('/all/property/contract', 'AllPropertyContract')->name('all.prop.contract');
        Route::get('/add/property/contract', 'AddPropertyContract')->name('add.prop.contract');
        Route::post('/store/property/contract', 'StorePropContract')->name('store.prop.contract');
        Route::get('/edit/property/contract/{id}', 'EditPropContract')->name('edit.props.contract');
        Route::post('/update/property/contract', 'UpdatePropContract')->name('update.prop.contract');
        Route::get('/delete/property/contract/{id}', 'DeletePropertyContract')->name('delete.props.contract');
    });



    //Home Property Category All Routes
    Route::controller(PropertyCategoryController::class)->group(function () {
        Route::get('/all/prop/category', 'AllPropCategory')->name('all.prop.category');
        Route::get('/add/prop/category', 'AddPropCategory')->name('add.prop.category');
        Route::post('/store/prop/category', 'StorePropCategory')->name('store.prop.category');
        Route::get('/edit/prop/category/{id}', 'EditPropCategory')->name('edit.prop.category');
        Route::post('/update/prop/category/{id}', 'UpdatePropCategory')->name('update.prop.category');
        Route::get('/delete/prop/category/{id}', 'DeletePropCategory')->name('delete.prop.category');
    });

    //Home Property Location All Routes
    Route::controller(PropertyLocationController::class)->group(function () {
        Route::get('/all/prop/location', 'AllPropLocation')->name('all.prop.location');
        Route::get('/add/prop/location', 'AddPropLocation')->name('add.prop.location');
        Route::post('/store/prop/location', 'StorePropLocation')->name('store.prop.location');
        Route::get('/edit/prop/location/{id}', 'EditPropLocation')->name('edit.prop.location');
        Route::post('/update/prop/location/{id}', 'UpdatePropLocation')->name('update.prop.location');
        Route::get('/delete/prop/location/{id}', 'DeletePropLocation')->name('delete.prop.location');
    });

    //Home Blog Category All Routes
    Route::controller(BlogCategoryController::class)->group(function () {
        Route::get('/all/blog/category', 'AllBlogCategory')->name('all.blog.category');
        Route::get('/add/blog/category', 'AddBlogCategory')->name('add.blog.category');
        Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');
        Route::get('/edit/blog/category/{id}', 'EditBlogCategory')->name('edit.blog.category');
        Route::post('/update/blog/category/{id}', 'UpdateBlogCategory')->name('update.blog.category');
        Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');
    });


    // About All Route 
    Route::controller(AboutController::class)->group(function () {
        Route::get('/about/page/setting', 'AboutPageSetting')->name('about.page.setting');
        Route::post('/update/about/page', 'UpdateAboutPage')->name('update.about.page');
        
    });

     // Contact All Route 
    Route::controller(ContactController::class)->group(function () {
        Route::get('/contact/page/setting', 'ContactPageSetting')->name('contact.page.setting');
        Route::post('/update/contact/page', 'UpdateContactPage')->name('update.contact.page');
        
    });


});




// Blog All Route 
Route::controller(BlogController::class)->group(function () {
    Route::get('/all/blog', 'AllBlog')->name('all.blog')->middleware('auth');
    Route::get('/add/blog', 'AddBlog')->name('add.blog')->middleware('auth');
    Route::post('/store/blog', 'StoreBlog')->name('store.blog')->middleware('auth');
    Route::get('/edit/blog/{id}', 'EditBlog')->name('edit.blog')->middleware('auth');
    Route::post('/update/blog', 'UpdateBlog')->name('update.blog')->middleware('auth');
    Route::get('/delete/blog/{id}', 'DeleteBlog')->name('delete.blog')->middleware('auth');
    Route::get('/blog', 'HomeBlog')->name('home.blog');
    Route::get('/blog/details/{id}', 'BlogDetails')->name('blog.details');
    Route::get('/category/blog/{id}', 'CategoryBlog')->name('category.blog');
});

// About All Route 
Route::controller(AboutController::class)->group(function () {
    Route::get('/about', 'HomeAbout')->name('home.about');
 
});

// Contatct All Route 
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'HomeContatct')->name('home.contact');
});

// Property All Route 
Route::controller(PropertyController::class)->group(function () {
    Route::get('/property/sell', 'HomePropSell')->name('home.prop.sell');
    Route::get('/property/rent', 'HomePropRent')->name('home.prop.rent');
    Route::get('/property/all', 'HomePropAll')->name('home.prop.all');
    Route::get('/property/view-list', 'HomePropList')->name('home.prop.list');
    Route::get('/property/details/{id}', 'PropDetails')->name('prop.details');
    Route::get('/property/category/{id}', 'PropCategory')->name('home.prop.cat');

    Route::get('/property/search/{keyword?}', 'PropertySearch')->name('prop.search');
    
    
});

//Messages All Routes
Route::controller(MessageController::class)->group(function () {
    Route::get('/all/messages', 'AllMessages')->name('all.messages')->middleware('auth');
    Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message')->middleware('auth');
    Route::get('/read/message/{id}', 'ReadMessage')->name('read.message')->middleware('auth');
    Route::post('/store/message', 'StoreMessage')->name('store.message');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';