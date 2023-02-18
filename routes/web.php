    <?php
    use App\Http\Controllers\Admin\ordersController;
    use App\Http\Controllers\Admin\productsController;
    use App\Http\Controllers\Admin\subcategoryController;
    use App\Http\Controllers\Admin\categoryController;
    use App\Http\Controllers\Admin\dashboardcontroller;
    use App\Http\Controllers\Homecontroller;
    use App\Http\Controllers\clientcontroller;

    use App\Http\Controllers\ProfileController;
    use Illuminate\Foundation\Application;
    use Illuminate\Support\Facades\Route;
    use Inertia\Inertia;




    Route::controller(Homecontroller::class)->group(function () {
        Route::get('/','index')->name('home');

    });


    Route::controller(clientcontroller::class)->group(function () {

        Route::get('/category/{id}/{slug}','Category')->name('category');

        Route::get('/product-details/{id}/{slug}','Singleproduct')->name('singleproduct');

        Route::get('/newrelease','Newreleas_product')->name('newrelease');



    });

    Route::middleware(['auth','role:user'])->group(function () {

        Route::controller(clientcontroller::class)->group(function () {

            Route::get('/addtocart','Addtocart')->name('addtocart');

            Route::post('/product-addtocart','proAddtocart')->name('proaddtocart');

            Route::get('/items-remove/{id}','productitemremove')->name('removeitem');

            Route::get('/shipping-address','ShippingAddress')->name('shippingaddress');

            Route::post('/addshipping-address','addShippingAddress')->name('addshippingaddress');

            Route::get('/checkout','Checkouts')->name('checkout');

            Route::post('/place-order','Addplaceorder')->name('placeorder');

            Route::get('/userprofile','Userprofile')->name('userprofile');

            Route::get('/userprofile/pending-orders','Pendingorders')->name('pendingorder');

            Route::get('/userprofile/history','History')->name('history');




            Route::get('/todayesdeals','Todayesdeals')->name('todayesdeals');

            Route::get('/customerservice','Customerservice')->name('customerservice');



        });

    });



    // Route::get('/', function () {
    //     return Inertia::render('user.layouts.user_template', [
    //         'canLogin' => Route::has('login'),
    //         'canRegister' => Route::has('register'),
    //         'laravelVersion' => Application::VERSION,
    //         'phpVersion' => PHP_VERSION,
    //     ]);
    // });

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');



    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


    Route::middleware(['auth','role:admin'])->group(function () {

        Route::controller(dashboardcontroller::class)->group(function () {
            Route::get('/admin/dashboard', 'index')->name('admindashboard');

        });

        Route::controller(categoryController::class)->group(function () {
            Route::get('/admin/add-category', 'addcategory')->name('addcategory');
            Route::get('/admin/all-category', 'allcategory')->name('allcategory');
            Route::post('/admin/storecategory', 'storecategory')->name('storecategory');

            Route::get('/admin/edite-category/{id}', 'Editecategory')->name('editecategory');
            Route::post('/admin/update-category', 'updatecategory')->name('updatecategory');
            Route::get('/admin/delete-category/{id}', 'Deletcategory')->name('deletecategory');


        });



        Route::controller(subcategoryController::class)->group(function () {
            Route::get('/admin/add-subcategory', 'addsubcat')->name('addsubcategory');
            Route::get('/admin/all-sub-category', 'allsubcat')->name('allsubcategory');

            Route::post('/admin/storesubcategory', 'storesubcategory')->name('storesubcategory');

            Route::get('/admin/edite-subcategory/{id}', 'Editesubcat')->name('editesubcategory');
            Route::get('/admin/delete-subcategory/{id}', 'Deletcsubategory')->name('deletesubcategory');
            Route::post('/admin/update-subcategory', 'Updatesubcategory')->name('updatesubcategory');

        });




        Route::controller(productsController::class)->group(function () {
            Route::get('/admin/add-product', 'addproduct')->name('addproduct');
            Route::get('/admin/all-product', 'allproduct')->name('allproduct');
            Route::post('/admin/storeproduct', 'Storeproduct')->name('storeproduct');

            Route::get('/admin/editeproductimg/{id}', 'Editeproductimg')->name('editeproductimg');


            Route::post('/admin/update-productimg', 'Updateproductimg')->name('updateproductimg');
            Route::get('/admin/edite-product/{id}', 'Editeproduct')->name('editeproduct');
            Route::post('/admin/update-product', 'Updateproduct')->name('updateproduct');


            Route::get('/admin/delete-product/{id}', 'Deleteproduct')->name('deleteproduct');

        });

        Route::controller(ordersController::class)->group(function () {
            Route::get('/admin/pending-orders', 'pendingord')->name('pendingorders');
            Route::get('/admin/completed-orders', 'completeord')->name('completeorders');
            Route::get('/admin/cancel-orders', 'cancelord')->name('cancelorders');

        });


    });


    require __DIR__.'/auth.php';






