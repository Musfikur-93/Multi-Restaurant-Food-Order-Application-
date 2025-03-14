<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ManageController;
use App\Http\Controllers\Admin\ManageOrderController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RoleController;

use App\Http\Controllers\Client\RestaurantController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\CouponController;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\FilterController;



//////////////////////////// Start User All Route //////////////////////////

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'Index'])->name('index');

Route::get('/dashboard', function () {
    return view('frontend.dashboard.profile');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/profile/store', [UserController::class, 'ProfileStore'])->name('profile.store');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::get('/change/password', [UserController::class, 'ChangePassword'])->name('change.password');
    Route::post('/user/password/update', [UserController::class, 'UserPasswordUpdate'])->name('user.password.update');

    // Get Wishlist Data for User
    Route::get('/all/wishlist', [HomeController::class, 'AllWishlist'])->name('all.wishlist');
    Route::get('/wishlist/remove/{id}', [HomeController::class, 'WishlistRemove'])->name('wishlist.remove');

    Route::controller(ManageOrderController::class)->group(function(){
        Route::get('/user/order/list', 'UserOrderList')->name('user.order.list');
        Route::get('/user/order/details/{id}', 'UserOrdersDetails')->name('user.order.details');
        Route::get('/user/invoice/download/{id}', 'UserInvoiceDownload')->name('user.invoice.download');

    }); // End Order Route

});

require __DIR__.'/auth.php';

//////////////////////////// End User All Route //////////////////////////



//////////////////////////// Start Admin All Route //////////////////////////

Route::middleware('admin')->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');

Route::controller(CityController::class)->group(function(){
    Route::get('/all/city', 'AllCity')->name('all.city');
    Route::post('/store/city', 'StoreCity')->name('store.city');
    Route::get('/edit/city/{id}', 'EditCity');
    Route::post('/update/city', 'UpdateCity')->name('update.city');
    Route::get('/delete/city/{id}', 'DeleteCity')->name('delete.city');

}); // End Category Route


Route::controller(CategoryController::class)->group(function(){
    Route::get('/all/category', 'AllCategory')->name('all.category')->middleware(['permission:category.all']);
    Route::get('/add/category', 'AddCategory')->name('add.category');
    Route::post('/store/category', 'StoreCategory')->name('store.category');
    Route::get('/edit/category/{id}', 'EditCategory')->name('edit.category');
    Route::post('/update/category', 'UpdateCategory')->name('update.category');
    Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category');

}); // End Category Route



Route::controller(ManageController::class)->group(function(){
    Route::get('/admin/all/product', 'AdminAllProduct')->name('admin.all.product');
    Route::get('/admin/add/product', 'AdminAddProduct')->name('admin.add.product');
    Route::post('/admin/store/product', 'AdminStoreProduct')->name('admin.store.product');
    Route::get('/admin/edit/product/{id}', 'AdminEditProduct')->name('admin.edit.product');
    Route::post('/admin/update/product', 'AdminUpdateProduct')->name('admin.update.product');
    Route::get('/admin/delete/product/{id}', 'AdminDeleteProduct')->name('admin.delete.product');

    Route::get('/adminchangeStatus', 'AdminChangeStatus');

}); // End Product Route


Route::controller(ManageController::class)->group(function(){
    Route::get('/pending/restraurant', 'PendingRestraurant')->name('pending.restraurant');
    Route::get('/clientchangeStatus', 'ClientChangeStatus');
    Route::get('/approve/restraurant', 'ApproveRestraurant')->name('approve.restraurant');

}); // End Restraurant Pending/Approve Route


Route::controller(ManageController::class)->group(function(){
    Route::get('/all/banner', 'AllBanner')->name('all.banner');
    Route::post('/store/banner', 'StoreBanner')->name('store.banner');
    Route::get('/edit/banner/{id}', 'EditBanner');
    Route::post('/update/banner', 'UpdateBanner')->name('update.banner');
    Route::get('/delete/banner/{id}', 'DeleteBanner')->name('delete.banner');

}); // End Banner Route


Route::controller(ManageOrderController::class)->group(function(){
    Route::get('/pending/order', 'PendingOrder')->name('pending.order');
    Route::get('/confirm/order', 'ConfirmOrder')->name('confirm.order');
    Route::get('/processing/order', 'ProcessingOrder')->name('processing.order');
    Route::get('/deliverd/order', 'DeliverdOrder')->name('deliverd.order');

    Route::get('/admin/order/details/{id}', 'AdminOrderDetails')->name('admin.order.details');

}); // End Order Route


Route::controller(ManageOrderController::class)->group(function(){
    Route::get('/pending_to_confirm/{id}', 'PendingToConfirm')->name('pending_to_confirm');
    Route::get('/confirm_to_processing/{id}', 'ConfirmToProcessing')->name('confirm_to_processing');
    Route::get('/processing_to_deliverd/{id}', 'ProcessingToDeliverd')->name('processing_to_deliverd');

}); // End Order Route


Route::controller(ReportController::class)->group(function(){
    Route::get('/admin/all/report', 'AdminAllReport')->name('admin.all.report');
    Route::post('/admin/search/bydate', 'AdminSearchByDate')->name('admin.search.bydate');
    Route::post('/admin/search/bymonth', 'AdminSearchByMonth')->name('admin.search.bymonth');
    Route::post('/admin/search/byyear', 'AdminSearchByYear')->name('admin.search.byyear');

}); // End Report Route


Route::controller(ReviewController::class)->group(function(){
    Route::get('/admin/pending/review', 'AdminPendingReview')->name('admin.pending.review');
    Route::get('/admin/approve/review', 'AdminApproveReview')->name('admin.approve.review');
    Route::get('/reviewchangeStatus', 'ReviewChangeStatus');

}); // End admin Review Route


Route::controller(RoleController::class)->group(function(){
    Route::get('/all/permission', 'AllPermission')->name('all.permission');
    Route::get('/add/permission', 'AddPermission')->name('add.permission');
    Route::post('/permission/store', 'StorePermission')->name('permission.store');
    Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
    Route::post('/permission/update', 'UpdatePermission')->name('permission.update');
    Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');

    // Excel Permission Import and Export
    Route::get('/import/permission', 'ImportPermission')->name('import.permission');
    Route::get('/export', 'Export')->name('export');
    Route::post('/import', 'Import')->name('import');

}); // End Permission Route


Route::controller(RoleController::class)->group(function(){
    Route::get('/all/roles', 'AllRoles')->name('all.roles');
    Route::get('/add/roles', 'AddRoles')->name('add.roles');
    Route::post('/roles/store', 'StoreRoles')->name('roles.store');
    Route::get('/edit/roles/{id}', 'EditRoles')->name('edit.roles');
    Route::post('/roles/update', 'UpdateRoles')->name('roles.update');
    Route::get('/delete/roles/{id}', 'DeleteRoles')->name('delete.roles');

}); // End Role Route


Route::controller(RoleController::class)->group(function(){
    Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission');
    Route::post('/role/permission/store', 'RolesPermissionStore')->name('role.permission.store');
    Route::get('/all/roles/permission', 'AllRolesPermission')->name('all.roles.permission');

    Route::get('/admin/edit/roles/{id}', 'AdminEditRoles')->name('admin.edit.roles');
    Route::post('/admin/roles/update/{id}', 'AdminRolesUpdate')->name('admin.roles.update');
    Route::get('/admin/delete/roles/{id}', 'AdminDeleteRoles')->name('admin.delete.roles');

}); // End Role Permission Route


Route::controller(RoleController::class)->group(function(){
    Route::get('/all/admin', 'AllAdmin')->name('all.admin');
    Route::get('/add/admin', 'AddAdmin')->name('add.admin');
    Route::post('/admin/store', 'AdminStore')->name('admin.store');
    Route::get('/edit/admin/{id}', 'EditAdmin')->name('edit.admin');
    Route::post('/admin/update/{id}', 'AdminUpdate')->name('admin.update');
    Route::get('/delete/admin/{id}', 'DeleteAdmin')->name('delete.admin');


}); // End All Admin Route



}); // End Admin Group Middleware

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::post('/admin/login_submit', [AdminController::class, 'AdminLoginSubmit'])->name('admin.login_submit');
Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
Route::get('/admin/forget_password', [AdminController::class, 'AdminForgetPassword'])->name('admin.forget_password');
Route::post('/admin/password_submit', [AdminController::class, 'AdminPasswordSubmit'])->name('admin.password_submit');
Route::get('/admin/reset-password/{token}/{email}', [AdminController::class, 'AdminResetPassword']);
Route::post('/admin/reset_password_submit', [AdminController::class, 'AdminResetPasswordSubmit'])->name('admin.reset_password_submit');

//////////////////////////// End Admin All Route //////////////////////////



//////////////////////////// Start Client All Route //////////////////////////

Route::middleware(['client','status'])->group(function(){

    Route::controller(RestaurantController::class)->group(function(){
        Route::get('/all/menu', 'AllMenu')->name('all.menu');
        Route::get('/add/menu', 'AddMenu')->name('add.menu');
        Route::post('/store/menu', 'StoreMenu')->name('store.menu');
        Route::get('/edit/menu/{id}', 'EditMenu')->name('edit.menu');
        Route::post('/update/menu', 'UpdateMenu')->name('update.menu');
        Route::get('/delete/menu/{id}', 'DeleteMenu')->name('delete.menu');

    }); // End Category Route


    Route::controller(ProductController::class)->group(function(){
        Route::get('/all/product', 'AllProduct')->name('all.product');
        Route::get('/add/product', 'AddProduct')->name('add.product');
        Route::post('/store/product', 'StoreProduct')->name('store.product');
        Route::get('/edit/product/{id}', 'EditProduct')->name('edit.product');
        Route::post('/update/product', 'UpdateProduct')->name('update.product');
        Route::get('/delete/product/{id}', 'DeleteProduct')->name('delete.product');
        Route::get('/changeStatus', 'ChangeStatus');

    }); // End Product Route


    Route::controller(ProductController::class)->group(function(){
        Route::get('/all/gallery', 'AllGallery')->name('all.gallery');
        Route::get('/add/gallery', 'AddGallery')->name('add.gallery');
        Route::post('/store/gallery', 'StoreGallery')->name('store.gallery');
        Route::get('/edit/gallery/{id}', 'EditGallery')->name('edit.gallery');
        Route::post('/update/gallery', 'UpdateGallery')->name('update.gallery');
        Route::get('/delete/gallery/{id}', 'DeleteGallery')->name('delete.gallery');

    }); // End Product Route


    Route::controller(CouponController::class)->group(function(){
        Route::get('/all/coupon', 'AllCoupon')->name('all.coupon');
        Route::get('/add/coupon', 'AddCoupon')->name('add.coupon');
        Route::post('/store/coupon', 'StoreCoupon')->name('store.coupon');
        Route::get('/edit/coupon/{id}', 'EditCoupon')->name('edit.coupon');
        Route::post('/update/coupon', 'UpdateCoupon')->name('update.coupon');
        Route::get('/delete/coupon/{id}', 'DeleteCoupon')->name('delete.coupon');

    }); // End Product Route

    Route::controller(ManageOrderController::class)->group(function(){
        Route::get('/all/client/orders', 'AllClientOrders')->name('all.client.orders');
        Route::get('/client/order/details/{id}', 'ClientOrdersDetails')->name('client.order.details');

    }); // End Order Route

    Route::controller(ReportController::class)->group(function(){
        Route::get('/client/all/report', 'ClientAllReport')->name('client.all.reports');
        Route::post('/client/search/bydate', 'ClientSearchByDate')->name('client.search.bydate');
        Route::post('/client/search/bymonth', 'ClientSearchByMonth')->name('client.search.bymonth');
        Route::post('/client/search/byyear', 'ClientSearchByYear')->name('client.search.byyear');

    }); // End Order Route

    Route::controller(ReviewController::class)->group(function(){
        Route::get('/client/all/review', 'ClientAllReview')->name('client.all.reviews');

    }); // End Product Route

});

Route::middleware(['client'])->group(function(){
    Route::get('/client/dashboard', [ClientController::class, 'ClientDashboard'])->name('client.dashboard');
    Route::get('/client/profile', [ClientController::class, 'ClientProfile'])->name('client.profile');
    Route::post('/client/profile/store', [ClientController::class, 'ClientProfileStore'])->name('client.profile.store');
    Route::get('/client/change/password', [ClientController::class, 'ClientChangePassword'])->name('client.change.password');
    Route::post('/client/password/update', [ClientController::class, 'ClientPasswordUpdate'])->name('client.password.update');

}); // End Client Dashboard Route

Route::get('/client/login', [ClientController::class, 'ClientLogin'])->name('client.login');
Route::get('/client/register', [ClientController::class, 'ClientRegister'])->name('client.register');
Route::post('/client/register/submit', [ClientController::class, 'ClientRegisterSubmit'])->name('client.register.submit');
Route::get('/client/forget_password', [ClientController::class, 'ClientForgetPassword'])->name('client.forget_password');
Route::post('/client/password_submit', [ClientController::class, 'ClientPasswordSubmit'])->name('client.password_submit');
Route::get('/client/reset-password/{token}/{email}', [ClientController::class, 'ClientResetPassword']);
Route::post('/client/reset_password_submit', [ClientController::class, 'ClientResetPasswordSubmit'])->name('client.reset_password_submit');
Route::post('/client/login_submit', [ClientController::class, 'ClientLoginSubmit'])->name('client.login_submit');
Route::get('/client/logout', [ClientController::class, 'Clientlogout'])->name('client.logout');

//////////////////////////// End Client All Route //////////////////////////


//////////////////////////////////////////// Frontend Route Accessable for All /////////////////////////////////////

Route::controller(HomeController::class)->group(function(){
    Route::get('/restaurant/details/{id}', 'RestaurantDetails')->name('res.details');
    Route::post('/add-wish-list/{id}', 'AddWishList');

}); // End Product Route


Route::controller(CartController::class)->group(function(){
    Route::get('/add_to_cart/{id}', 'AddToCart')->name('add_to_cart');
    Route::post('/cart/update-Quentity', 'CartUpdateQuentity')->name('cart.updateQuentity');
    Route::post('/cart/remove', 'CartRemove')->name('cart.remove');
    Route::post('/apply-coupon', 'ApplyCoupon');
    Route::get('/coupon-remove', 'CouponRemove');
    Route::get('/checkout', 'ShopCheckout')->name('checkout');

});

Route::controller(OrderController::class)->group(function(){
    Route::post('/cash_order', 'CashOrder')->name('cash_order');
    Route::post('/stripe_order', 'StripeOrder')->name('stripe_order');
    // Mark Notification as Read
    Route::post('/mark-notification-as-read/{notification}', 'MarkAsRead');
}); // End of cash order


Route::controller(ReviewController::class)->group(function(){
    Route::post('/review/store', 'ReviewStore')->name('review.store');
}); // End Product Route

Route::controller(FilterController::class)->group(function(){
    Route::get('/list/restaurant', 'ListRestaurant')->name('list.restaurant');
    Route::get('/filter/products', 'FilterProducts')->name('filter.products');
}); // End Product Route

