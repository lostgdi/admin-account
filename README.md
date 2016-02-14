# admin-account

<h1>Installation</h1>
<ul>
  <li>Run <b>composer require lostgdi/admin-account</b></li>
  <li>Add <b>Lostgdi\Admin\App\Providers\AdminServiceProvider::class,</b> to providers in config/app.php</li>
  <li>Add <b>'Admin' => Lostgdi\Admin\App\Facades\Admin::class,</b> to aliases in config/app.php</li>
  <li>Add <b>'auth_admin_account' => \Lostgdi\Admin\App\Http\Middleware\AuthenticateAdminAccount::class,</b> to routeMiddleware in app/http/kernel.php</li>
  <li>Add <b>'auth_admin_account_manager' => \Lostgdi\Admin\App\Http\Middleware\AuthenticateAdminAccountManager::class,</b> to routeMiddleware in app/http/kernel.php</li>
  <li>Run <b>php artisan vendor:publish</b></li>
  
</ul>

<h1>DataBase Setup</h1>
<caption>Note: You should handle your user table , depanding on your situation. Either drop user table then excute the migrate command or your way of dealing.</caption>
<ul>
  <li>Run <b>php artisan migrate</b></li>
  <li>Run <b>php artisan db:seed --class=DatabaseSeeder_user</b></li>
</ul>

<h1>Usage</h1>
<ul>
  <li>http://127.0.0.1:8000/auth</li>
</ul>


