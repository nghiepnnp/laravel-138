<?php


Route::get('/', 'frontend\HomeController@index')->name('index');
Route::get('/index', 'frontend\HomeController@index');
Route::get('/trang-chu', 'frontend\HomeController@index');

Route::get('/gioi-thieu', 'frontend\HomeController@gioi_thieu');

Route::get('/doi-tra-bao-hanh', 'frontend\HomeController@bao_hanh');

Route::get('/san-pham','frontend\ProductController@index');
Route::get('/san-pham/{slug}','frontend\ProductController@category');

Route::get('/tin-tuc','frontend\PostController@index');
Route::get('/tin-tuc/{slug}','frontend\PostController@postdetail');

Route::get('/gio-hang','frontend\CartController@index');

Route::get('/gio-hang/{id}','frontend\CartController@getcart');
Route::post('/gio-hang/{id}','frontend\CartController@postcart');


Route::get('/lien-he','frontend\ContactController@index')->name('contact_index');
Route::post('/lien-he','frontend\ContactController@postinsert')->name('contact_insert');


Route::get('login', 'backend\AuthController@getlogin')->name('login');
Route::post('login', 'backend\AuthController@postlogin')->name('postlogin');
Route::get('logout', 'backend\AuthController@logout')->name('logout');


Route::group(['prefix' =>'admin', 'middleware'=>'LoginAdmin'], function() {
	Route::get('/','backend\DashboardController@index')->name('dashboard');
	Route::group(['prefix' =>'product'], function(){
		
		Route::get('/','backend\ProductController@index')->name('product_index');

		Route::get('trash','backend\ProductController@trash')->name('product_trash');

		Route::get('insert','backend\ProductController@getinsert')->name('product_getinsert');
		Route::post('insert','backend\ProductController@postinsert')->name('product_postinsert');
		
		Route::get('update/{id}','backend\ProductController@getupdate')->name('product_getupdate');
		Route::post('update/{id}','backend\ProductController@postupdate')->name('product_postupdate');

		Route::get('status/{id}','backend\ProductController@status')->name('product_status');
		Route::get('deltrash/{id}','backend\ProductController@deltrash')->name('product_deltrash');
		
		Route::get('retrash/{id}','backend\ProductController@retrash')->name('product_retrash');
		Route::get('delete/{id}','backend\ProductController@delete')->name('product_delete');

	});

	Route::group(['prefix' =>'category'], function(){
		Route::get('/','backend\CategoryController@index')->name('category_index');

		Route::get('trash','backend\CategoryController@trash')->name('category_trash');

		Route::get('insert','backend\CategoryController@getinsert')->name('category_getinsert');
		Route::post('insert','backend\CategoryController@postinsert')->name('category_postinsert');
		
		Route::get('update/{id}','backend\CategoryController@getupdate')->name('category_getupdate');
		Route::post('update/{id}','backend\CategoryController@postupdate')->name('category_postupdate');

		Route::get('status/{id}','backend\CategoryController@status')->name('category_status');
		Route::get('deltrash/{id}','backend\CategoryController@deltrash')->name('category_deltrash');
		
		Route::get('retrash/{id}','backend\CategoryController@retrash')->name('category_retrash');
		Route::get('delete/{id}','backend\CategoryController@delete')->name('category_delete');

	});
	Route::group(['prefix' =>'user'], function(){
		Route::get('/','backend\UserController@index')->name('user_index');

		Route::get('trash','backend\UserController@trash')->name('user_trash');

		Route::get('insert','backend\UserController@getinsert')->name('user_getinsert');
		Route::post('insert','backend\UserController@postinsert')->name('user_postinsert');
		
		Route::get('update/{id}','backend\UserController@getupdate')->name('user_getupdate');
		Route::post('update/{id}','backend\UserController@postupdate')->name('user_postupdate');

		Route::get('status/{id}','backend\UserController@status')->name('user_status');
		Route::get('deltrash/{id}','backend\UserController@deltrash')->name('user_deltrash');
		
		Route::get('retrash/{id}','backend\UserController@retrash')->name('user_retrash');
		Route::get('delete/{id}','backend\UserController@delete')->name('user_delete');
	});
	Route::group(['prefix' =>'post'], function(){
		Route::get('/','backend\PostController@index')->name('post_index');

		Route::get('trash','backend\PostController@trash')->name('post_trash');

		Route::get('insert','backend\PostController@getinsert')->name('post_getinsert');
		Route::post('insert','backend\PostController@postinsert')->name('post_postinsert');
		
		Route::get('update/{id}','backend\PostController@getupdate')->name('post_getupdate');
		Route::post('update/{id}','backend\PostController@postupdate')->name('post_postupdate');

		Route::get('status/{id}','backend\PostController@status')->name('post_status');
		Route::get('deltrash/{id}','backend\PostController@deltrash')->name('post_deltrash');
		
		Route::get('retrash/{id}','backend\PostController@retrash')->name('post_retrash');
		Route::get('delete/{id}','backend\PostController@delete')->name('post_delete');
	});

	Route::group(['prefix' =>'contact'], function(){
		Route::get('/','backend\ContactController@index')->name('contact_index');

		Route::get('trash','backend\ContactController@trash')->name('contact_trash');

		Route::get('status/{id}','backend\ContactController@status')->name('contact_status');
		Route::get('deltrash/{id}','backend\ContactController@deltrash')->name('contact_deltrash');
		
		Route::get('retrash/{id}','backend\ContactController@retrash')->name('contact_retrash');
		Route::get('delete/{id}','backend\ContactController@delete')->name('contact_delete');
	});
	Route::group(['prefix' =>'topic'], function(){
		Route::get('/','backend\TopicController@index')->name('topic_index');

		Route::get('trash','backend\TopicController@trash')->name('topic_trash');

		Route::get('insert','backend\TopicController@getinsert')->name('topic_getinsert');
		Route::post('insert','backend\TopicController@postinsert')->name('topic_postinsert');
		
		Route::get('update/{id}','backend\TopicController@getupdate')->name('topic_getupdate');
		Route::post('update/{id}','backend\TopicController@postupdate')->name('topic_postupdate');

		Route::get('status/{id}','backend\TopicController@status')->name('topic_status');
		Route::get('deltrash/{id}','backend\TopicController@deltrash')->name('topic_deltrash');
		
		Route::get('retrash/{id}','backend\TopicController@retrash')->name('topic_retrash');
		Route::get('delete/{id}','backend\TopicController@delete')->name('topic_delete');

	});
	Route::group(['prefix' =>'single-page'], function(){
		Route::get('/','backend\SinglePageController@index')->name('singlepage_index');

		Route::get('trash','backend\SinglePageController@trash')->name('singlepage_trash');

		Route::get('insert','backend\SinglePageController@getinsert')->name('singlepage_getinsert');
		Route::post('insert','backend\SinglePageController@postinsert')->name('singlepage_postinsert');
		
		Route::get('update/{id}','backend\SinglePageController@getupdate')->name('singlepage_getupdate');
		Route::post('update/{id}','backend\SinglePageController@postupdate')->name('singlepage_postupdate');

		Route::get('status/{id}','backend\SinglePageController@status')->name('singlepage_status');
		Route::get('deltrash/{id}','backend\SinglePageController@deltrash')->name('singlepage_deltrash');
		
		Route::get('retrash/{id}','backend\SinglePageController@retrash')->name('singlepage_retrash');
		Route::get('delete/{id}','backend\SinglePageController@delete')->name('singlepage_delete');

	});
	Route::group(['prefix' =>'slider'], function(){
		
		Route::get('/','backend\SliderController@index')->name('slider_index');

		Route::get('trash','backend\SliderController@trash')->name('slider_trash');

		Route::get('insert','backend\SliderController@getinsert')->name('slider_getinsert');
		Route::post('insert','backend\SliderController@postinsert')->name('slider_postinsert');
		
		Route::get('update/{id}','backend\SliderController@getupdate')->name('slider_getupdate');
		Route::post('update/{id}','backend\SliderController@postupdate')->name('slider_postupdate');

		Route::get('status/{id}','backend\SliderController@status')->name('slider_status');
		Route::get('deltrash/{id}','backend\SliderController@deltrash')->name('slider_deltrash');
		
		Route::get('retrash/{id}','backend\SliderController@retrash')->name('slider_retrash');	 
		Route::get('delete/{id}','backend\SliderController@delete')->name('slider_delete');

	});
	Route::group(['prefix' =>'menu'], function(){
		
		Route::get('/','backend\MenuController@index')->name('menu_index');

		Route::get('trash','backend\MenuController@trash')->name('menu_trash');

		Route::get('insert','backend\MenuController@getinsert')->name('menu_getinsert');
		Route::post('insert','backend\MenuController@postinsert')->name('menu_postinsert');
		
		Route::get('update/{id}','backend\MenuController@getupdate')->name('menu_getupdate');
		Route::post('update/{id}','backend\MenuController@postupdate')->name('menu_postupdate');

		Route::get('status/{id}','backend\MenuController@status')->name('menu_status');
		Route::get('deltrash/{id}','backend\MenuController@deltrash')->name('menu_deltrash');
		
		Route::get('retrash/{id}','backend\MenuController@retrash')->name('menu_retrash');	 
		Route::get('delete/{id}','backend\MenuController@delete')->name('menu_delete');

	});
		Route::group(['prefix' =>'order'], function(){
		
		Route::get('/','backend\OrderController@index')->name('order_index');

		Route::get('trash','backend\OrderController@trash')->name('order_trash');	

		Route::get('status/{id}','backend\OrderController@status')->name('order_status');
		Route::get('deltrash/{id}','backend\OrderController@deltrash')->name('order_deltrash');
		
		Route::get('retrash/{id}','backend\OrderController@retrash')->name('order_retrash');	 
		Route::get('delete/{id}','backend\OrderController@delete')->name('order_delete');

		Route::get('detail/{id}','backend\OrderController@detail')->name('order_detail');

	});

});





Route::get('{slug}','frontend\ProductController@detail');


