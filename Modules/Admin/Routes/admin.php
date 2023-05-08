<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'AdminController@index')->name('admin.dashboard.index');

Route::get('activity', [
    'as' => 'admin.activity.index',
    'uses' => 'ActivityController@index',
    'middleware' => 'can:admin.activity.index',
]);
Route::post('sra/storeremark', [
    'as' => 'admin.sra.storeremark',
    'uses' => 'SraController@storeremark',
    'middleware' => 'can:admin.sra.storeremark',
]);
Route::post('sra/getchekbox_data', [
    'as' => 'admin.sra.sra_chk',
    'uses' => 'SraController@getchekbox_data',
    'middleware' => 'can:admin.sra.sra_chk',
]);
Route::post('sra/store_overall_remark', [
    'as' => 'admin.sra.store_overall_remark',
    'uses' => 'SraController@store_overall_remark',
    'middleware' => 'can:admin.sra.store_overall_remark',
]);
Route::post('sra/storeremark_election', [
    'as' => 'admin.sra.storeremark_election',
    'uses' => 'SraController@storeremark_election',
    'middleware' => 'can:admin.sra.storeremark_election',
]);
Route::get('sra', [
    'as' => 'admin.sra.index',
    'uses' => 'SraController@index',
    'middleware' => 'can:admin.sra.index',
]);

Route::get('missingelectiondocuments', [
    'as' => 'admin.missingelectiondocuments.index',
    'uses' => 'MissingelectiondocumentsController@index',
    'middleware' => 'can:admin.missingelectiondocuments.index',
]);
Route::get('missingelectiondocuments/manualdata/{hid}', [
    'as' => 'admin.missingelectiondocuments.manualdata',
    'uses' => 'MissingelectiondocumentsController@manualdata',
    'middleware' => 'can:admin.missingelectiondocuments.manualdata',
]);

Route::post('missingelectiondocuments/storemanualdata', [
    'as' => 'admin.missingelectiondocuments.storemanualdata',
    'uses' => 'MissingelectiondocumentsController@storeManualData',
    'middleware' => 'can:admin.missingelectiondocuments.storeManualData',
]);

Route::get('missingelectricitydocuments', [
    'as' => 'admin.missingelectricitydocuments.index',
    'uses' => 'MissingelectricitydocumentsController@index',
    'middleware' => 'can:admin.missingelectricitydocuments.index',
]);
Route::get('missingelectricitydocuments/manualdata/{hid}', [
    'as' => 'admin.missingelectricitydocuments.manualdata',
    'uses' => 'MissingelectricitydocumentsController@manualdata',
    'middleware' => 'can:admin.missingelectricitydocuments.manualdata',
]);

Route::post('missingelectricitydocuments/storemanualdata', [
    'as' => 'admin.missingelectricitydocuments.storemanualdata',
    'uses' => 'MissingelectricitydocumentsController@storeManualData',
    'middleware' => 'can:admin.missingelectricitydocuments.storeManualData',
]);

// Route::get('sra/electricity', [\App\Http\Controllers\HomeController::class, 'listingproof'])->name('proof');
Route::get('sra/detail/{hid}', [
    'as' => 'admin.sra.electricity',
    'uses' => 'SraController@detail',
    'middleware' => 'can:admin.sra.electricity',
]);


Route::get('sra/work_status/{status}', [
    'as' => 'admin.sra.work_status',
    'uses' => 'SraController@work_status',
    'middleware' => 'can:admin.sra.work_status',
]);

Route::post('sra/detail/{hid}', [
    'as' => 'admin.sra.electricity',
    'uses' => 'SraController@detail',
    'middleware' => 'can:admin.sra.electricity',
]);

/*Route::get('sra/electricity/{hid}', [
    'as' => 'admin.sra.electricity',
    'uses' => 'SraController@listingproof',
    'middleware' => 'can:admin.sra.electricity',
]);
Route::post('sra/electricity/{hid}', [
    'as' => 'admin.sra.electricity',
    'uses' => 'SraController@listingproof',
    'middleware' => 'can:admin.sra.electricity',
]);*/


Route::get('sra/elections/{hid}', [
    'as' => 'admin.sra.election',
    'uses' => 'SraController@election',
    'middleware' => 'can:admin.sra.election',
]);

Route::get('sra/manualdata/{id}/{hid}', [
    'as' => 'admin.sra.manualdata',
    'uses' => 'SraController@manualdata',
    'middleware' => 'can:admin.sra.manualdata',
]);

Route::get('sra/missing_document', [
    'as' => 'admin.sra.missing_document',
    'uses' => 'SraController@missing_document',
    'middleware' => 'can:admin.sra.missing_document',
]);

Route::post('sra/storemanualdata', [
    'as' => 'admin.sra.storemanualdata',
    'uses' => 'SraController@storeManualData',
    'middleware' => 'can:admin.sra.storeManualData',
]);

Route::get('sra/manualdataelection/{id}/{hid}', [
    'as' => 'admin.sra.manualdataelection',
    'uses' => 'SraController@manualdataelection',
    'middleware' => 'can:admin.sra.manualdataelection',
]);

Route::get('sra/manualdataelection_missing/{hid}', [
    'as' => 'admin.sra.manualdataelection_missing',
    'uses' => 'SraController@manualdataelection_missing',
    'middleware' => 'can:admin.sra.manualdataelection_missing',
]);
Route::get('sra/manualdataelectricity_missing/{hid}', [
    'as' => 'admin.sra.manualdataelectricity_missing',
    'uses' => 'SraController@manualdataelectricity_missing',
    'middleware' => 'can:admin.sra.manualdataelectricity_missing',
]);

Route::post('sra/storemanualdataelection', [
    'as' => 'admin.sra.storemanualdataelection',
    'uses' => 'SraController@storeManualDataelection',
    'middleware' => 'can:admin.sra.storeManualDataelection',
]);
Route::get('sra/manualdata_pdf/{hid}', [
    'as' => 'admin.sra.manualdata_pdf',
    'uses' => 'SraController@manualdata_pdf',
    'middleware' => 'can:admin.sra.manualdata_pdf',
]);

Route::post('sra/storemanualdata_pdf', [
    'as' => 'admin.sra.storemanualdata_pdf',
    'uses' => 'SraController@storeManualData_pdf',
    'middleware' => 'can:admin.sra.storeManualData_pdf',
]);

Route::get('sra/vendormanagerindex', [
    'as' => 'admin.sra.vendormanagerindex',
    'uses' => 'SraController@vendormanagerindex',
    'middleware' => 'can:admin.sra.vendormanagerindex',
]);

Route::get('sra/documentlisting/{hid}', [
    'as' => 'admin.sra.documentlisting',
    'uses' => 'SraController@documentlisting',
    'middleware' => 'can:admin.sra.documentlisting',
]);

Route::get('sra/uplodemissingdocument/{hid}', [
    'as' => 'admin.sra.uplodemissingdocument',
    'uses' => 'SraController@uplodemissingdocument',
    'middleware' => 'can:admin.sra.uplodemissingdocument',
]);

Route::post('sra/storemissingdocument', [
    'as' => 'admin.sra.storemissingdocument',
    'uses' => 'SraController@storemissingdocument',
    'middleware' => 'can:admin.sra.storemissingdocument',
]);
Route::get('sra/gumasta/{hid}', [
    'as' => 'admin.sra.gumasta',
    'uses' => 'SraController@gumasta',
    'middleware' => 'can:admin.sra.gumasta',
]);
Route::get('sra/agreement/{hid}', [
    'as' => 'admin.sra.agreement',
    'uses' => 'SraController@agreement',
    'middleware' => 'can:admin.sra.agreement',
]);

Route::post('sra/storemanualdata_agreement', [
    'as' => 'admin.sra.storemanualdata_agreement',
    'uses' => 'SraController@storemanualdata_agreement',
    'middleware' => 'can:admin.sra.storemanualdata_agreement',
]);

Route::post('sra/store_integration_gumasta', [
    'as' => 'admin.sra.store_integration_gumasta',
    'uses' => 'SraController@store_integration_gumasta',
    'middleware' => 'can:admin.sra.store_integration_gumasta',
]);


Route::post('sra/storeremark_agreement', [
    'as' => 'admin.sra.storeremark_agreement',
    'uses' => 'SraController@storeremark_agreement',
    'middleware' => 'can:admin.sra.storeremark_agreement',
]);
Route::get('sra/final/{hid}', [
    'as' => 'admin.sra.final_submit',
    'uses' => 'SraController@showfinal',
    'middleware' => 'can:admin.sra.final_submit',
]);

Route::post('sra/final_submit', [
    'as' => 'admin.sra.final_submit',
    'uses' => 'SraController@final_submit',
    'middleware' => 'can:admin.sra.final_submit',
]);

Route::post('sra/final_ca_submit', [
    'as' => 'admin.sra.final_ca_submit',
    'uses' => 'SraController@final_ca_submit',
    'middleware' => 'can:admin.sra.final_ca_submit',
]);

Route::post('sra/storeremark_gumasta', [
    'as' => 'admin.sra.storeremark_gumasta',
    'uses' => 'SraController@storeremark_gumasta',
    'middleware' => 'can:admin.sra.storeremark_gumasta',
]);

Route::get('sra/report', [
    'as' => 'admin.sra.report',
    'uses' => 'SraController@report',
    'middleware' => 'can:admin.sra.report',
]);

Route::get('sra/viewreport', [
    'as' => 'admin.sra.viewreport',
    'uses' => 'SraController@viewreport',
    'middleware' => 'can:admin.sra.viewreport',
]);
Route::get('sra/adhar/{hid}', [
    'as' => 'admin.sra.adhar',
    'uses' => 'SraController@adhar',
    'middleware' => 'can:admin.sra.adhar',
]);
Route::post('sra/storeremark_adhar', [
    'as' => 'admin.sra.storeremark_adhar',
    'uses' => 'SraController@storeremark_adhar',
    'middleware' => 'can:admin.sra.storeremark_adhar',
]);
Route::post('sra/storemanualdata_adhar', [
    'as' => 'admin.sra.storemanualdata_adhar',
    'uses' => 'SraController@storemanualdata_adhar',
    'middleware' => 'can:admin.sra.storemanualdata_adhar',
]);
// Route::post('/manualdata/{id}/{hut_id}', [SraController::class, 'storeManualData'])->name('admin.sra.storemanualdata')->middleware('can:admin.sra.storeManualData');

