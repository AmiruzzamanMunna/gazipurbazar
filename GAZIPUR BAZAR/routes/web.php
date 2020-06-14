<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/test','TestController@test');
Route::post('/test','TestController@testadd');
Route::get('/', 'UserController@index')->name('user.index');
Route::get('/emailValidate','User\UserRegistrationController@emailValidate')->name('user.emailValidate');
Route::get('/UserRegistration','User\UserRegistrationController@signUP')->name('user.signUP');
Route::post('/UserRegistration','User\UserRegistrationController@signUPStore')->name('user.signUPStore');

// Password Reset Link

Route::get('/user/resetform','PasswordResetController@userResetForm')->name('password.userResetForm');
Route::post('/user/resetform','PasswordResetController@userResetMail')->name('password.userResetMail');

Route::get('/user/resetlink/{token}','PasswordResetController@userSendResetlink')->name('password.userSendResetlink');
Route::post('/user/resetlink/{token}','PasswordResetController@userResetPass')->name('password.userResetPass');

Route::get('/userlogin','User\UserLoginController@login')->name('user.login');
Route::post('/userlogin','User\UserLoginController@loginCheck')->name('user.loginCheck');

Route::get('/newarrival','UserController@newarrival')->name('user.newarrival');
Route::get('/discount','UserController@discount')->name('user.discount');

Route::get('/ladies-index', 'UserController@ladiesIndex')->name('user.ladiesIndex');
Route::get('/ladies/clothingpage/{name}','UserController@ladiesClothing')->name('user.ladiesClothing');
Route::get('/ladies/Juwellaypage/{name}','UserController@ladiesJuwellay')->name('user.ladiesJuwellay');
Route::get('/ladies/Cosmaticpage/{name}','UserController@ladiesCosmatic')->name('user.ladiesCosmatic');
Route::get('/ladies/Shoespage/{name}','UserController@ladiesShoes')->name('user.ladiesShoes');

Route::get('/gents-index', 'UserController@gentsIndex')->name('user.gentsIndex');
Route::get('/gents/clothingpage/{name}','UserController@gentsClothing')->name('user.gentsClothing');
Route::get('/gents/Cosmaticpage/{name}','UserController@gentsCosmatic')->name('user.gentsCosmatic');
Route::get('/gents/Shoespage/{name}','UserController@gentsShoes')->name('user.gentsShoes');

Route::get('/leather-index', 'UserController@leatherIndex')->name('user.leatherIndex');
Route::get('/leather/bagpage/{name}','UserController@leatherBag')->name('user.leatherBag');
Route::get('/leather/beltpage/{name}','UserController@leatherBelt')->name('user.leatherBelt');
Route::get('/leather/Shoespage/{name}','UserController@leatherShoes')->name('user.leatherShoes');

Route::get('/electric-index', 'UserController@electricIndex')->name('user.electricIndex');
Route::get('/computeraccessoriespage/{name}','UserController@computerAccessories')->name('user.computerAccessories');
Route::get('/electronicspage/{name}','UserController@electronics')->name('user.electronics');
Route::get('/securityServillancepage/{name}','UserController@securityServillance')->name('user.securityServillance');

Route::get('/gadgetpage/{name}','UserController@gadgetPage')->name('user.gadgetPage');

Route::get('/household-index', 'UserController@houseHoldIndex')->name('user.houseHoldIndex');

Route::get('/household/cusionspage/{name}','UserController@cushions')->name('user.cushions');
Route::get('/household/throwsBlanketspage/{name}','UserController@throwsBlankets')->name('user.throwsBlankets');
Route::get('/household/mirrorspage/{name}','UserController@mirrors')->name('user.mirrors');
Route::get('/household/curtainspage/{name}','UserController@curtains')->name('user.curtains');

Route::get('/furnitureindex','UserController@furnitureIndex')->name('user.furnitureIndex');
Route::get('/furniture/sofaspage/{name}','UserController@sofas')->name('user.sofas');
Route::get('/furniture/chairspage/{name}','UserController@chairs')->name('user.chairs');
Route::get('/furniture/ottomanspage/{name}','UserController@ottomans')->name('user.ottomans');
Route::get('/furniture/tablespage/{name}','UserController@tables')->name('user.tables');
Route::get('/furniture/entertainmentCenterpage/{name}','UserController@entertainmentCenter')->name('user.entertainmentCenter');
Route::get('/furniture/bedRoomspage/{name}','UserController@bedRooms')->name('user.bedRooms');

Route::get('/toysShowIndex', 'UserController@toysShowIndex')->name('user.toysShowIndex');
Route::get('/toysShow/toyspage/{name}','UserController@mirrors')->name('user.toys');
Route::get('/toysShow/showpiecepage/{name}','UserController@showPieces')->name('user.showPieces');


Route::get('/giftIndex/{name}', 'UserController@giftIndex')->name('user.giftIndex');

Route::get('/flowersindex','UserController@flowersIndex')->name('user.flowersindex');
Route::get('/flowers/romancepage/{name}','UserController@romance')->name('user.romance');
Route::get('/flowers/anniversarypage/{name}','UserController@anniversary')->name('user.anniversary');
Route::get('/flowers/rosespage/{name}','UserController@roses')->name('user.roses');
Route::get('/flowers/birthdaypage/{name}','UserController@birthday')->name('user.birthday');
Route::get('/flowers/thankyou/{name}','UserController@thankyou')->name('user.thankyou');
Route::get('/flowers/sympathypage/{name}','UserController@sympathy')->name('user.sympathy');

Route::get('/books&magazineindex','UserController@booksIndex')->name('user.booksIndex');
Route::get('/books&magazine/bookspage/{name}','UserController@books')->name('user.books');
Route::get('/books&magazine/magazinepage/{name}','UserController@magazine')->name('user.magazine');

Route::get('/food&groceriesindex','UserController@foodIndex')->name('user.foodIndex');
Route::get('/food&groceries/groceriespage/{name}','UserController@groceries')->name('user.groceries');
Route::get('/food&groceries/breadBakerypage/{name}','UserController@breadBakery')->name('user.breadBakery');
Route::get('/food&groceries/fruitsVegitablespage/{name}','UserController@fruitsVegitables')->name('user.fruitsVegitables');
Route::get('/food&groceries/meatFishpage/{name}','UserController@meatFish')->name('user.meatFish');
Route::get('/food&groceries/freshMilkpage/{name}','UserController@freshMilk')->name('user.freshMilk');

Route::get('/event-index', 'UserController@eventIndex')->name('user.eventIndex');
Route::get('/event/page', 'UserController@weddingEventPage')->name('user.weddingEventPage');
Route::get('/event/birthdaypage', 'UserController@birthdayEventPage')->name('user.birthdayEventPage');
Route::get('/event/hospitalitypage', 'UserController@HospitalityEventPage')->name('user.HospitalityEventPage');
Route::get('/event/otherspage', 'UserController@othersEventPage')->name('user.othersEventPage');
Route::get('/event/otherspage', 'UserController@othersEventPage')->name('user.othersEventPage');
Route::get('/lighting', 'UserController@lightIndex')->name('user.lightIndex');

Route::get('/famous&tradational-index', 'UserController@famousTradionalIndex')->name('user.famousTradionalIndex');
Route::get('/famous&tradational/nakshikathaPage/{name}', 'UserController@nakshikatha')->name('user.nakshikatha');
Route::get('/famous&tradational/potteryTerracottaPage/{name}', 'UserController@potteryTerracotta')->name('user.potteryTerracotta');
Route::get('/famous&tradational/shitolpatiPage/{name}', 'UserController@shitalPati')->name('user.shitalPati');

Route::get('/parts&accessories-index', 'UserController@partsAccessoriesIndex')->name('user.partsAccessoriesIndex');
Route::get('/parts&accessories/bikespage/{name}', 'UserController@bikes')->name('user.bikes');
Route::get('/parts&accessories/carspage/{name}', 'UserController@cars')->name('user.cars');

Route::get('/medicineEmergency-Index', 'UserController@medicineEmergencyIndex')->name('user.medicineEmergencyIndex');
Route::get('/medicineEmergency/medicinepage/{name}', 'UserController@medicine')->name('user.medicine');
Route::get('/medicineEmergency/fastaidkitpage/{name}', 'UserController@fastAidKit')->name('user.fastAidKit');

Route::get('/search/','UserController@searchItem')->name('user.searchItem');

Route::get('/productDetails/{id}','UserController@productDetails')->name('productDetails');

Route::get('/aboutus','UserController@aboutUs')->name('user.aboutUs');
Route::get('/policy','UserController@policy')->name('user.policy');
Route::get('/contact-us','UserController@contactus')->name('user.contactus');
Route::get('/cart','User\CartController@cartIndex')->name('cart.cartIndex');
Route::post('/cart/add','User\CartController@addCart')->name('cart.addCart');

Route::group(['middleware'=>['userSess']],function(){

	Route::get('/logout','User\UserLoginController@logout')->name('user.logout');

	Route::get('/account','User\ProfileController@userAccount')->name('user.userAccount');

	
	
	Route::get('/cart/getAllCart','User\CartController@getAllCart')->name('cart.getAllCart');

	Route::post('/cart/edit','User\CartController@cartEdit')->name('cart.cartEdit');
	Route::post('/cart/update','User\CartController@cartUpdate')->name('cart.cartUpdate');
	Route::post('/cart/remove','User\CartController@cartRemove')->name('cart.cartRemove');

	Route::get('/checkout','User\CheckOutController@checkOut')->name('order.checkOut');
	Route::post('/checkout','User\CheckOutController@checkOutStore')->name('order.checkOutStore');

	Route::get('/invoice/{id}','UserController@invoiceIndex')->name('user.invoice');
	Route::get('/download/{id}','PdfController@pdfdownload')->name('pdf.pdfdownload');

	Route::get('/orderDetails/{id}','UserController@customerOrder')->name('user.customerOrder');
	Route::get('/todayOrder','User\ProfileController@todayOrder')->name('user.todayOrder');
	Route::get('/orderHistory','User\ProfileController@orderHistory')->name('user.orderHistory');
	Route::get('/updateProfile','User\ProfileController@updateProfile')->name('user.updateProfile');
	Route::post('/updateProfile','User\ProfileController@updateProfileUpdate')->name('user.updateProfileUpdate');

});





// Admin Panel


Route::get('/admin/admin-index','Admin\AdminLoginController@adminLogin')->name('admin.adminLogin');
Route::post('/admin/admin-index','Admin\AdminLoginController@adminLoginVerify')->name('admin.adminLoginVerify');

// Password Reset Link

Route::get('/password/reset/','PasswordResetController@showResetForm')->name('password.showResetForm');
Route::post('/password/email','PasswordResetController@sendResetLinkEmail')->name('password.sendResetLinkEmail');
Route::get('/password/reset/{token}','PasswordResetController@reset')->name('password.reset');
Route::post('/password/reset/{token}','PasswordResetController@resetPass')->name('password.resetPass');


Route::group(['middleware'=>['adminSess']],function(){

	Route::get('/admin/logout','AdminController@logOut')->name('admin.logOut');

	Route::get('/admin/edit/{id}','AdminController@adminEdit')->name('admin.edit');
	Route::post('/admin/edit/{id}','AdminController@adminUpdate')->name('adminUpdate');

	Route::get('/admin/home','AdminController@index')->name('admin.index');


	Route::get('/admin/pageIndex','Admin\PageIndexController@pageIndex')->name('admin.pageIndex');
	Route::post('/admin/pageIndex','Admin\PageIndexController@pageIndexAdd')->name('admin.pageIndexAdd');

	Route::get('/admin/ladies-index/{id}','AdminController@ladiesIndexEdit')->name('admin.ladiesIndexEdit');
	Route::post('/admin/ladies-index/{id}','AdminController@ladiesIndexUpdate')->name('admin.ladiesIndexUpdate');

	Route::get('/admin/gents-index/{id}','AdminController@gentsIndexEdit')->name('admin.gentsIndexEdit');
	Route::post('/admin/gents-index/{id}','AdminController@gentsIndexUpdate')->name('admin.gentsIndexUpdate');

	Route::get('/admin/leather-index/{id}','AdminController@leatherIndexEdit')->name('admin.leatherIndexEdit');
	Route::post('/admin/leather-index/{id}','AdminController@leatherIndexUpdate')->name('admin.leatherIndexUpdate');

	Route::get('/admin/electric-index/{id}','AdminController@electricIndexEdit')->name('admin.electricIndexEdit');
	Route::post('/admin/electric-index/{id}','AdminController@electricIndexUpdate')->name('admin.electricIndexUpdate');

	Route::get('/admin/house-index/{id}','AdminController@houseIndexEdit')->name('admin.houseIndexEdit');
	Route::post('/admin/house-index/{id}','AdminController@houseIndexUpdate')->name('admin.houseIndexUpdate');

	Route::get('/admin/furniture-index/{id}','AdminController@furnitureIndexEdit')->name('admin.furnitureIndexEdit');
	Route::post('/admin/furniture-index/{id}','AdminController@furnitureIndexUpdate')->name('admin.furnitureIndexUpdate');

	Route::get('/admin/toy-index/{id}','AdminController@toysIndexEdit')->name('admin.toysIndexEdit');
	Route::post('/admin/toy-index/{id}','AdminController@toyIndexUpdate')->name('admin.toyIndexUpdate');

	Route::get('/admin/flower-index/{id}','AdminController@flowersIndexEdit')->name('admin.flowersIndexEdit');
	Route::post('/admin/flower-index/{id}','AdminController@flowersIndexUpdate')->name('admin.flowersIndexUpdate');

	Route::get('/admin/book-index/{id}','AdminController@booksIndexEdit')->name('admin.booksIndexEdit');
	Route::post('/admin/book-index/{id}','AdminController@booksIndexUpdate')->name('admin.booksIndexUpdate');

	Route::get('/admin/food-index/{id}','AdminController@foodIndexEdit')->name('admin.foodIndexEdit');
	Route::post('/admin/food-index/{id}','AdminController@foodIndexUpdate')->name('admin.foodIndexUpdate');

	Route::get('/admin/event-index','AdminController@eventIndex')->name('admin.eventIndex');
	Route::get('/admin/event-indexedit/{id}','AdminController@eventIndexEdit')->name('admin.eventIndexEdit');
	Route::post('/admin/event-indexedit/{id}','AdminController@eventIndexUpdate')->name('admin.eventIndexUpdate');

	Route::get('/admin/weddingevent','AdminController@eventWedding')->name('admin.eventWedding');
	Route::get('/admin/weddingupdate/{id}','AdminController@weddingEdit')->name('admin.weddingEdit');
	Route::post('/admin/weddingupdate/{id}','AdminController@weddingUpdate')->name('admin.weddingUpdate');

	Route::get('/admin/birthdayevent','AdminController@eventBirthday')->name('admin.eventBirthday');
	Route::get('/admin/birthdayedit/{id}','AdminController@eventBirthdayEdit')->name('admin.eventBirthdayEdit');
	Route::post('/admin/birthdayedit/{id}','AdminController@eventBirthdayUpdate')->name('admin.eventBirthdayUpdate');

	Route::get('/admin/hospitalityevent','AdminController@eventHospitality')->name('admin.eventHospitality');
	Route::get('/admin/hospitalityedit/{id}','AdminController@eventHospitalityEdit')->name('admin.eventHospitalityEdit');
	Route::post('/admin/hospitalityedit/{id}','AdminController@eventHospitalityUpdate')->name('admin.eventHospitalityUpdate');

	Route::get('/admin/othersevent','AdminController@eventOthers')->name('admin.eventOthers');
	Route::get('/admin/otherseventedit/{id}','AdminController@eventOthersEdit')->name('admin.eventOthersEdit');
	Route::post('/admin/otherseventedit/{id}','AdminController@eventOthersUpdate')->name('admin.eventOthersUpdate');

	Route::get('/admin/lighting','AdminController@lighIndex')->name('admin.lighIndex');
	Route::get('/admin/lightingedit/{id}','AdminController@lightIndexEdit')->name('admin.lightIndexEdit');
	Route::post('/admin/lightingedit/{id}','AdminController@lightIndexUpdate')->name('admin.lightIndexUpdate');

	Route::get('/admin/famous&tradationaledit/{id}','AdminController@famousTraditionalEdit')->name('admin.famousTraditionalEdit');
	Route::post('/admin/famous&tradationaledit/{id}','AdminController@famousTraditionalUpdate')->name('admin.famousTraditionalUpdate');

	Route::get('/admin/parts&accessoriesedit/{id}','AdminController@partsAccessoriesEdit')->name('admin.partsAccessoriesEdit');
	Route::post('/admin/parts&accessoriesedit/{id}','AdminController@partsAccessoriesUpdate')->name('admin.partsAccessoriesUpdate');

	Route::get('/admin/medicine&emergency/{id}','AdminController@medicineAccessoriesEdit')->name('admin.medicineAccessoriesEdit');
	Route::post('/admin/medicine&emergency/{id}','AdminController@medicineAccessoriesUpdate')->name('admin.medicineAccessoriesUpdate');

	Route::get('/admin/aboutusedit/{id}','AdminController@aboutUsEdit')->name('admin.aboutUsEdit');
	Route::post('/admin/aboutusedit/{id}','AdminController@aboutUsUpdate')->name('admin.aboutUsUpdate');

	Route::get('/admin/policyedit/{id}','AdminController@policyEdit')->name('admin.policyEdit');
	Route::post('/admin/policyedit/{id}','AdminController@policyUpdate')->name('admin.policyUpdate');

	Route::get('/admin/contactusedit/{id}','AdminController@contactUsEdit')->name('admin.contactUsEdit');
	Route::post('/admin/contactusedit/{id}','AdminController@contactUsUpdate')->name('admin.contactUsUpdate');

	Route::get('/admin/product/new','Admin\ProductController@index')->name('product.index');
	Route::post('/admin/product/new','Admin\ProductController@productStore')->name('product.productStore');
	Route::get('/admin/viewproduct','Admin\ProductController@viewAllproduct')->name('product.viewAllproduct');
	Route::get('/admin/productedit/{id}','Admin\ProductController@productEdit')->name('product.productEdit');
	Route::post('/admin/productedit/{id}','Admin\ProductController@editProductStore')->name('product.editProductStore');
	Route::get('/admin/productdelete/{id}','Admin\ProductController@deleteProduct')->name('product.deleteProduct');

	Route::get('/admin/order','Admin\OrderController@orderShow')->name('order.orderShow');
	Route::get('/admin/orderinfo/{id}','Admin\OrderController@orderInfoShow')->name('order.orderInfoShow');

	Route::get('/order/pending','AdminController@orderPending')->name('admin.orderPending');
	Route::get('/order/delivered','AdminController@orderDelivered')->name('admin.orderDelivered');
	Route::get('/order/canceled','AdminController@orderCanceled')->name('admin.orderCanceled');

	Route::get('/admin/statusdelivered/{id}','Admin\OrderController@statusdelivered')->name('order.statusdelivered');
	Route::get('/admin/statusreceived/{id}','Admin\OrderController@statusreceived')->name('order.statusreceived');
	Route::get('/admin/statuscancel/{id}','Admin\OrderController@statuscancel')->name('order.statuscancel');

});


