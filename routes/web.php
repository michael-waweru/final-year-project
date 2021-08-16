<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Web\BlogComponent;
use App\Http\Livewire\Web\HomeComponent;
use App\Http\Livewire\Web\AboutComponent;
use App\Http\Livewire\Web\ContactComponent;
use App\Http\Livewire\Admin\TenantComponent;
use App\Http\Livewire\Web\PropertyComponent;
use App\Http\Livewire\Admin\EditTypeComponent;
use App\Http\Livewire\Admin\LandlordComponent;
use App\Http\Livewire\Admin\LocationComponent;
use App\Http\Livewire\Admin\AddTenantComponent;
use App\Http\Livewire\Admin\DashboardComponent;
use App\Http\Livewire\Admin\AddLandlordComponent;
use App\Http\Livewire\Admin\AddLocationComponent;
use App\Http\Livewire\Admin\AddPropertyComponent;
use App\Http\Livewire\Admin\AddNewMemberComponent;
use App\Http\Livewire\Admin\EditLocationComponent;
use App\Http\Livewire\Admin\EditPropertyComponent;
use App\Http\Livewire\Admin\PropertyTypeComponent;
use App\Http\Livewire\Web\PropertyDetailComponent;
use App\Http\Livewire\Admin\AddPropertyTypeComponent;
use App\Http\Livewire\Tenant\TenantDashboardComponent;
use App\Http\Livewire\Landlord\LandlordTenantComponent;
use App\Http\Livewire\Landlord\LandlordDashboardComponent;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', HomeComponent::class)->name('homepage');
Route::get('/who-we-are', AboutComponent::class)->name('about');
Route::get('/our-properties', PropertyComponent::class)->name('property');
Route::get('/property/{slug}', PropertyDetailComponent::class)->name('property.detail');
Route::get('/contact-us', ContactComponent::class)->name('contact');
Route::get('/blog', BlogComponent::class)->name('blog');

Route::middleware(['middleware'=>'preventBackHistory'])->group(function () {
    Auth::routes();
});

//Admin Routes
Route::prefix('admin')->middleware('auth','isAdmin')->group(function () {
    Route::get('dashboard', DashboardComponent::class)->name('admin.dashboard');
    Route::get('member/add', AddNewMemberComponent::class)->name('admin.member.add');
    Route::get('properties', \App\Http\Livewire\Admin\PropertyComponent::class)->name('admin.properties');
    Route::get('property/add', AddPropertyComponent::class)->name('admin.property.add');
    Route::get('property/edit/{property_slug}', EditPropertyComponent::class)->name('admin.property.edit');
    Route::get('property/type', PropertyTypeComponent::class)->name('admin.property.type');
    Route::get('property/type/add', AddPropertyTypeComponent::class)->name('admin.type.add');
    Route::get('property/type/edit/{type_slug}', EditTypeComponent::class)->name('admin.type.edit');
    Route::get('locations', LocationComponent::class)->name('admin.locations');
    Route::get('location/add', AddLocationComponent::class)->name('admin.location.add');
    Route::get('location/edit/{location_slug}', EditLocationComponent::class)->name('admin.location.edit');
    Route::get('tenants', TenantComponent::class)->name('admin.tenants');
    Route::get('tenant/add', AddTenantComponent::class)->name('admin.tenant.add');
    Route::get('show/user/{tenant}',[App\Http\Controllers\Admin\ShowTenantController::class,'show'])->name('admin.tenant.show');
    Route::get('landlords', LandlordComponent::class)->name('admin.landlords');
    Route::get('landlord/add', AddLandlordComponent::class)->name('admin.landlord.add');
    Route::get('allocate', [App\Http\Controllers\Admin\AllocationController::class, 'index'])->name('admin.allocation');
    Route::post('allocation/add', [App\Http\Controllers\Admin\AllocationController::class, 'store'])->name('admin.allocation.add');
    Route::post('allocation/{allocation}', [App\Http\Controllers\Admin\AllocationController::class, 'update'])->name('admin.allocation.update');
    Route::get('allocation/edit/{allocation}', [App\Http\Controllers\Admin\AllocationController::class,'edit'])->name('admin.allocation.edit');
    Route::delete('allocation/{allocation}', [App\Http\Controllers\Admin\AllocationController::class, 'destroy'])->name('admin.allocation.destroy');
    Route::get('allocation/show/{allocation}',[App\Http\Controllers\Admin\AllocationController::class,'show'])->name('admin.allocation.show');
    Route::get('payments', [App\Http\Controllers\Admin\MakePaymentController::class, 'index'])->name('admin.payments');
    Route::post('payments', [App\Http\Controllers\Admin\MakePaymentController::class, 'store'])->name('admin.payment.store');
    Route::get('payment/show/{payment}',[App\Http\Controllers\Admin\MakePaymentController::class,'show'])->name('admin.payment.show');
    Route::post('payment/refund', [App\Http\Controllers\Admin\RefundController::class, 'store'])->name('admin.refund.store');
    Route::get('invoices', [App\Http\Controllers\Admin\InvoiceController::class, 'index'])->name('admin.invoices');
    Route::get('all-invoices', [App\Http\Controllers\Admin\InvoiceController::class, 'view'])->name('admin.invoices.view');
    Route::get('invoices/add', [App\Http\Controllers\Admin\InvoiceController::class, 'add'])->name('admin.invoice.add');
    Route::post('invoices/add', [App\Http\Controllers\Admin\InvoiceController::class, 'store'])->name('admin.invoice.store');
    Route::get('invoice/edit/{invoice}', [App\Http\Controllers\Admin\InvoiceController::class,'edit'])->name('admin.invoice.edit');
    Route::post('invoice/{invoice}', [App\Http\Controllers\Admin\InvoiceController::class, 'update'])->name('admin.invoice.update');
    Route::post('invoices-pay', [App\Http\Controllers\Admin\InvoicePayController::class, 'store'])->name('admin.invoice.pay');
});

//Landlord Routes
Route::prefix('landlord')->middleware('auth','isLandlord')->group(function () {
    Route::get('dashboard', LandlordDashboardComponent::class)->name('landlord.dashboard');
    Route::get('all-tenants', LandlordTenantComponent::class)->name('landlord.tenants');
    Route::get('tenant/add', \App\Http\Livewire\Landlord\AddTenantComponent::class)->name('landlord.tenant.add');
    Route::get('allocation/show/{tenant}',[App\Http\Controllers\Landlord\LandlordController::class,'show'])->name('landlord.tenant.show');
    Route::get('my-properties', \App\Http\Livewire\Landlord\LandlordPropertyComponent::class)->name('landlord.myproperties');
    Route::get('property/add',  \App\Http\Livewire\Landlord\LandlordAddPropertyComponent::class)->name('landlord.property.add');
    Route::get('property/edit/{property_slug}', \App\Http\Livewire\Landlord\LandlordEditPropertyComponent::class)->name('landlord.property.edit');
    Route::get('all-locations', \App\Http\Livewire\Landlord\LandlordLocationComponent::class)->name('landlord.locations');
    Route::get('location/add', \App\Http\Livewire\Landlord\LandlordAddLocationComponent::class)->name('landlord.location.add');
    Route::get('my-leases', \App\Http\Livewire\Landlord\LandlordLeasesComponent::class)->name('landlord.myleases');
    Route::get('lease/add', [App\Http\Controllers\Landlord\AllocationController::class, 'index'])->name('landlord.lease.add');
    Route::post('lease/save', [App\Http\Controllers\Landlord\AllocationController::class, 'store'])->name('landlord.lease.save');
    Route::get('lease/show/{id}', [App\Http\Controllers\Landlord\AllocationController::class, 'show'])->name('landlord.lease.show');
    Route::get('lease/edit/{lease}', [App\Http\Controllers\Landlord\AllocationController::class,'edit'])->name('landlord.lease.edit');
    Route::post('lease/{lease}', [App\Http\Controllers\Landlord\AllocationController::class, 'update'])->name('landlord.lease.update');
    Route::delete('lease/{lease}', [App\Http\Controllers\Landlord\AllocationController::class, 'destroy'])->name('landlord.lease.destroy');
    Route::get('my-invoices/all', [App\Http\Controllers\Landlord\InvoiceController::class, 'view'])->name('landlord.invoices.view');
    Route::get('invoice/add', [App\Http\Controllers\Landlord\InvoiceController::class, 'add'])->name('landlord.invoice.add');
    Route::post('invoices/add', [App\Http\Controllers\Landlord\InvoiceController::class, 'store'])->name('landlord.invoice.store');
    Route::get('invoice/edit/{invoice}', [App\Http\Controllers\Landlord\InvoiceController::class,'edit'])->name('landlord.invoice.edit');
    Route::post('invoice/{invoice}', [App\Http\Controllers\Landlord\InvoiceController::class, 'update'])->name('landlord.invoice.update');
    Route::get('pay-invoices', [App\Http\Controllers\Landlord\PayInvoiceController::class, 'index'])->name('landlord.pay.invoices');
    Route::post('pay-invoices', [App\Http\Controllers\Landlord\PayInvoiceController::class, 'store'])->name('landlord.invoice.pay');
    Route::get('my-payments', [App\Http\Controllers\Landlord\MakePaymentController::class, 'index'])->name('landlord.payments');
    Route::post('payments', [App\Http\Controllers\Landlord\MakePaymentController::class, 'store'])->name('landlord.payment.store');
    Route::get('payment/show/{payment}',[App\Http\Controllers\Landlord\MakePaymentController::class,'show'])->name('landlord.payment.show');
    Route::get('expenses', [App\Http\Controllers\Landlord\ExpenseController::class, 'index'])->name('landlord.expenses');
    Route::post('expense', [App\Http\Controllers\Landlord\ExpenseController::class, 'store'])->name('landlord.expense.store');
    Route::get('expense/edit/{expense}', [App\Http\Controllers\Landlord\ExpenseController::class,'edit'])->name('landlord.expense.edit');
    Route::post('expense/{expense}', [App\Http\Controllers\Landlord\ExpenseController::class, 'update'])->name('landlord.expense.update');
});

//Tenant Routes
Route::prefix('tenant')->middleware('auth','isTenant')->group(function () {
    Route::get('dashboard', TenantDashboardComponent::class)->name('tenant.dashboard');
    Route::get('my-lease', App\Http\Livewire\Tenant\AllocationComponent::class)->name('tenant.lease');
    Route::get('my-lease/show/{allocation}', [App\Http\Controllers\ShowController::class, 'show'])->name('tenant.lease.show');
    Route::get('my-invoices', App\Http\Livewire\Tenant\InvoiceComponent::class)->name('tenant.invoices');
    Route::get('account/overview', App\Http\Livewire\Tenant\SettingsComponent::class)->name('tenant.settings');
    Route::get('account/settings/change-password', \App\Http\Livewire\Tenant\ChangePasswordComponentComponent::class )->name('tenant.change-password');
    Route::get('calendar', \App\Http\Livewire\Tenant\CalendarComponent::class)->name('tenant.calendar');
});

//post routes
Route::post('/property/type/delete/{id}', [App\Http\Controllers\DestroyController::class,'deleteType']);
Route::post('/property/delete/{id}', [App\Http\Controllers\DestroyController::class,'deleteProperty']);
Route::post('/location/delete/{id}', [App\Http\Controllers\DestroyController::class, 'deleteLocation']);
Route::post('/allocation/delete/{id}', [App\Http\Controllers\DestroyController::class, 'deleteAllocation']);
Route::post('/landlord/delete/{id}', [App\Http\Controllers\DestroyController::class, 'deleteLandlord']);
Route::post('/', [App\Http\Controllers\ConsultationController::class, 'storeConsultation'])->name('consultation');
Route::post('/add-subscriber', [App\Http\Controllers\SubscriberController::class, 'StoreSubscribers'])->name('subscribe');
Route::post('/landlord/property/delete/{id}', [App\Http\Controllers\Landlord\LandlordController::class, 'delete']);
Route::post('/invoice/delete/{id}', [App\Http\Controllers\Admin\InvoiceController::class, 'destroy']);
Route::post('/invoice-pay/delete/{id}', [App\Http\Controllers\Admin\InvoicePayController::class, 'destroy']);
Route::post('/expense/delete/{id}', [App\Http\Controllers\Landlord\ExpenseController::class, 'destroy']);
