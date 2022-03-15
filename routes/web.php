<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;
use Laravel\Sail\Console\PublishCommand;

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


Route::get('/' , [PublicController::class , 'index'])->name('index');
//-----ROTTE ANNUNCI------
// rotta per schermata di tutti gli annunci
Route::get('/annunci' , [AnnouncementController::class , 'index'])->name('indexads');
// rotta per schermata del form
Route::get('/annunci/form' , [AnnouncementController::class , 'create'])->name('formads');
// rotta per schermata del submit del form ovvero quella che va nella action del form di create
Route::post('/annunci/form/submit' , [AnnouncementController::class , 'store'])->name('submitads');
// rotta per schermata del del dettaglio
Route::get('/annunci/show/{announcement}' , [AnnouncementController::class , 'show'])->name('showads');
//Rotta parametrica per gli annunci con filtro categoria 
Route::get('/category/{name}/{id}/announcements' , [PublicController::class, 'adsbycat'])->name('adsbycat');
//Rotta per revisore index
Route::get('/revisor/home', [RevisorController::class, 'index'])->name('indexrevisor');
//Rotte parametriche per revisore(accetta-rifiuta)
Route::post('/revisore/annoucement/{id}/accept', [RevisorController::class, 'accept'])->name('acceptads');
Route::post('/revisore/annoucement/{id}/reject', [RevisorController::class, 'reject'])->name('rejectads');
//Rotta per il submit di ricerca che sara di tipo get
Route::get('/annunci/filtrati' , [PublicController::class , 'search'])->name('search');
//Rotta del lavora con noi

// Route::get('/lavora_con_noi' , [AnnouncementController::class , 'workWithUs'])->name('workWithUs');
// Route::post('/lavora_con_noi/submit' , [AnnouncementController::class , 'workSubmit'])->name('submit');
// //Rotta "grazie per esserti candidato, ti faremo sapere al piu presto"
// Route::get('/lavora_con_noi/grazie' , [AnnouncementController::class , 'grazie'])->name('grazie');
Route::get('/lavora_con_noi' , [PublicController::class , 'workWithUs'])->name('workWithUs');
Route::post('/lavora_con_noi/submit' , [PublicController::class , 'workSubmit'])->name('submit');
Route::get('/lavora_con_noi/grazie' , [PublicController::class , 'grazie'])->name('grazie');
//Rotte pagina check revisore
Route::get('/revisore/indexconferm' , [RevisorController::class , 'indexconferm'])->name('indexconferm');

Route::post('/revisore/annoucement/{id}/accept1', [RevisorController::class, 'accept1'])->name('acceptads1');
Route::post('/revisore/annoucement/{id}/reject1', [RevisorController::class, 'reject1'])->name('rejectads1');


Route::delete('/announcement/images/remove', [AnnouncementController::class, 'removeImage'])->name('removeImage');
Route::get('/announcement/images' , [AnnouncementController::class , 'getImages'])->name('getImages');
Route::post('/announcement/images/upload' , [AnnouncementController::class , 'uploadImage'])->name('uploadImage');


Route::post('/locale/{locale}' , [PublicController::class , 'locale'])->name('locale');