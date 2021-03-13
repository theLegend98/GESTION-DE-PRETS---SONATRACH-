<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('change-password', 'ChangePasswordController@index');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');


Route::put('demande/{id}/setValidCU', 'DemandeController@setValidCU')->name('demande.setValidCU');
Route::put('demande/{id}/setRefusCU', 'DemandeController@setRefusCU')->name('demande.setRefusCU');
Route::put('demande/{id}/setValidADM', 'DemandeController@setValidADM')->name('demande.setValidADM');
Route::put('demande/{id}/setRefusADM', 'DemandeController@setRefusADM')->name('demande.setRefusADM');
Route::put('Agent/{id}/editTel', 'AgentController@editTel')->name('Agent.editTel');
Route::resource('demande','DemandeController');
Route::resource('Agent','AgentController');
Route::resource('User','userController');
Route::resource('Quota','QuotaController');

Route::group(['middleware' => 'disablepreventback'],function(){
    Auth::routes();
    Route::get('/ADMINISTRATEUR', 'AdministrateurController@index')->name('ADMINISTRATEUR')->middleware('Administrateur');
    Route::get('/CHEFUNITE', 'ChefUniteController@index')->name('CHEFUNITE')->middleware('chefunite');
    Route::get('/NORMAL', 'NormalAgetController@index')->name('NORMAL')->middleware('NormalAgent');
    Route::get('/HistoriqueDemande', 'NormalAgetController@toHistorique')->name('Historique')->middleware('NormalAgent');
    Route::get('/ProfilAgent', 'NormalAgetController@toProfil')->name('ToProfil')->middleware('NormalAgent');
    Route::get('/ProfilChefunite', 'ChefUniteController@toProfil')->name('ToProfilCU')->middleware('chefunite');
    Route::get('/ProfilAdministrateur', 'AdministrateurController@toProfil')->name('ToProfilADM')->middleware('Administrateur');
    Route::get('/ProfilCommission', 'CommissionController@toProfil')->name('ToProfilCO')->middleware('COMMISSION');
    Route::get('/ProfilSYS', 'SysAdmController@toProfil')->name('ToProfilSYS')->middleware('SYSADM');
    Route::get('/ConsultationPretfin', 'NormalAgetController@toPret')->name('ToPret')->middleware('NormalAgent');
    Route::get('/SYSADM', 'SysAdmController@index')->name('SYSADM')->middleware('SYSADM');
    Route::get('/COMMISSION', 'CommissionController@index')->name('COMMISSION')->middleware('COMMISSION');
    Route::get('/DemandePret','NormalAgetController@redirectDem' )->name('create')->middleware('NormalAgent');
    Route::get('/AjouterAgent', 'SysAdmController@ajouterA')->name('AddAG')->middleware('SYSADM');
    Route::get('/AjouterUser', 'SysAdmController@ajouterU')->name('AddUS')->middleware('SYSADM');
    Route::get('/ConsulterAgents', 'SysAdmController@consulterA')->name('showAG')->middleware('SYSADM');
    Route::get('/ConsulterUsers', 'SysAdmController@consulterU')->name('showUS')->middleware('SYSADM');
    Route::get('/ConsultationPret', 'NormalAgetController@redirectCons')->name('demandes')->middleware('NormalAgent');
    Route::get('/ConsultationPretfin', 'NormalAgetController@redirectConsfin')->name('prestagent')->middleware('NormalAgent');
    Route::get('/ConsultationPretCU','ChefUniteController@redirectCons')->name('pretCU')->middleware('chefunite');
    Route::get('/ConsultationPretfinCU','ChefUniteController@redirectConsfin')->name('pretfinCU')->middleware('chefunite');
    Route::get('/ConsultationPretADM','AdministrateurController@redirectCons')->name('pretADM')->middleware('Administrateur');
    Route::get('/ConsultationPretfinADM','AdministrateurController@redirectConsfin')->name('pretfinADM')->middleware('Administrateur');
    Route::get('/ConsultationPretCOM','CommissionController@redirectCons')->name('pretCOM')->middleware('COMMISSION');
    Route::get('/DeclarerQuota', 'CommissionController@redirectQuota')->name('Quota')->middleware('COMMISSION');
    Route::get('/demandes/pdf','AdministrateurController@export_pdf')->middleware('Administrateur');
    Route::Post('/defineQuota', 'CommissionController@defineQuota')->name('DQuota')->middleware('COMMISSION');
    Route::post('/profile', 'userController@update_avatar');
});
