<?php

// use App\Http\Controllers\DestroyController;
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
use App\Http\Livewire\Admin\AllocationComponent;
use App\Http\Livewire\Admin\ShowTenantComponent;
use App\Http\Livewire\Admin\AddLandlordComponent;
use App\Http\Livewire\Admin\AddLocationComponent;
use App\Http\Livewire\Admin\AddPropertyComponent;
use App\Http\Livewire\Admin\AddNewMemberComponent;
use App\Http\Livewire\Admin\EditLocationComponent;
use App\Http\Livewire\Admin\EditPropertyComponent;
use App\Http\Livewire\Admin\PropertyTypeComponent;
// use App\Http\Livewire\Landlord\AddTenantComponent;
use App\Http\Livewire\Admin\ShowLandlordComponent;
use App\Http\Livewire\Web\PropertyDetailComponent;
use App\Http\Livewire\Admin\AddAllocationComponent;
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

//post routes
Route::post('/property/type/delete/{id}', [App\Http\Controllers\DestroyController::class,'deleteType']);
Route::post('/property/delete/{id}', [App\Http\Controllers\DestroyController::class,'deleteProperty']);
Route::post('/location/delete/{id}', [App\Http\Controllers\DestroyController::class, 'deleteLocation']);
Route::post('/allocation/delete/{id}', [App\Http\Controllers\DestroyController::class, 'deleteAllocation']);
Route::post('/', [\App\Http\Controllers\ConsultationController::class, 'storeConsultation'])->name('consultation');
Route::post('/about', [\App\Http\Controllers\SubscriberController::class, 'StoreSubscribers'])->name('subscribe');
Route::post('/landlord/property/delete/{id}', [\App\Http\Controllers\Landlord\LandlordController::class, 'delete']);

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
    // Route::get('tenant/show/{id}', ShowTenantComponent::class)->name('admin.tenant.show');
    Route::get('landlords', LandlordComponent::class)->name('admin.landlords');
    Route::get('landlord/add', AddLandlordComponent::class)->name('admin.landlord.add');
    Route::get('landlord/view/{id}', [App\Http\Controllers\Admin\AgreementController::class,'show'])->name('admin.landlord.show');
    Route::get('allocate', AllocationComponent::class)->name('admin.allocation');
    Route::get('allocation/add', AddAllocationComponent::class)->name('admin.allocation.add');
    Route::get('allocation/{allocation}', [App\Http\Controllers\Admin\ShowAllocationController::class,'show'])->name('admin.allocation.show');
    // Route::get('allocations', [App\Http\Controllers\Admin\AgreementController::class,'index'])->name('admin.agreements');
    Route::post('allocations', [App\Http\Controllers\Admin\AgreementController::class,'store'])->name('admin.agreement.store');
    Route::get('allocation/show/{tenant}',[App\Http\Controllers\Admin\AgreementController::class,'show'])->name('admin.tenant.show');
    Route::post('allocation/{id}',[App\Http\Controllers\Admin\AgreementController::class,'update'])->name('admin.agreement.update');
    Route::get('payments', [App\Http\Controllers\Admin\MakePaymentController::class, 'index'])->name('admin.payments');
    Route::post('payments', [App\Http\Controllers\Admin\MakePaymentController::class, 'store'])->name('admin.payment.store');
});

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
    Route::get('lease/add', \App\Http\Livewire\Landlord\LandlordAddLeaseComponent::class)->name('landlord.lease.add');
});

Route::prefix('tenant')->middleware('auth','isTenant')->group(function () {
    Route::get('dashboard', TenantDashboardComponent::class)->name('tenant.dashboard');
});
