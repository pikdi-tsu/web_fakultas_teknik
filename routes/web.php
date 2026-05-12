<?php

use App\Http\Controllers\Admin\AdminAssignmentController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminCplController;
use App\Http\Controllers\Admin\AdminCurriculumController;
use App\Http\Controllers\Admin\AdminDedicationController;
use App\Http\Controllers\Admin\AdminDocumentController;
use App\Http\Controllers\Admin\AdminHeroController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminInformationController;
use App\Http\Controllers\Admin\AdminLectureController;
use App\Http\Controllers\Admin\AdminOrganizationController;
use App\Http\Controllers\Admin\AdminPartnerController;
use App\Http\Controllers\Admin\AdminPracticeController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminPublicationController;
use App\Http\Controllers\Admin\AdminResearchController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminSubjectController;
use App\Http\Controllers\Admin\AdminTestimonyController;
use App\Http\Controllers\Admin\AdminThesisController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResearchAndDedicationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\ThesisController;
use Illuminate\Support\Facades\Route;



Route::get('/', [BerandaController::class, 'index'])->name('beranda');

Route::get('/tentang-kami', [ProfileController::class, 'index'])->name('profil');

Route::get('/daftar-dosen', [LectureController::class, 'index'])->name('profil');
Route::get('/daftar-dosen/{lecturer}', [LectureController::class, 'select'])->name('profil');

Route::get('/studiInformatika', [StudyController::class, 'informatika'])->name('program-studi');
Route::get('/studiSistemInformasi', [StudyController::class, 'sistemInformasi'])->name('program-studi');
Route::get('/studiRekayasaKomputer', [StudyController::class, 'rekayasaKomputer'])->name('program-studi');

Route::get('/kurikulum/{study}', [CurriculumController::class, 'select'])->name('program-studi');

Route::get('/kemahasiswaanO&UKM', [OrganizationController::class, 'index'])->name('kemahasiswaan');
Route::get('/kemahasiswaanLM', [ServiceController::class, 'index'])->name('kemahasiswaan');

Route::get('/jadwalSidang', [ThesisController::class, 'index'])->name('kemahasiswaan');
Route::get('/jadwalSidang/{thesis}', [ThesisController::class, 'select'])->name('kemahasiswaan');

Route::get('/jadwalSeminar', [PracticeController::class, 'index'])->name('kemahasiswaan');
Route::get('/jadwalSeminar/{practice}', [PracticeController::class, 'select'])->name('kemahasiswaan');

Route::get('/pusat-informasi', [InformationController::class, 'index'])->name('pusat-informasi');
Route::get('/pusat-informasi/{information}', [InformationController::class, 'select'])->name('pusat-informasi');
Route::get('/dokumen', [DocumentController::class, 'index'])->name('pusat-informasi');

Route::get('/risetDosen', [ResearchAndDedicationController::class, 'riset'])->name('riset&pengabdian');
Route::get('/risetDosen/{research}', [ResearchAndDedicationController::class, 'selectRiset'])->name('riset&pengabdian');
Route::get('/pengabdianDosen', [ResearchAndDedicationController::class, 'pengabdian'])->name('riset&pengabdian');
Route::get('/pengabdianDosen/{dedication}', [ResearchAndDedicationController::class, 'selectPengabdian'])->name('riset&pengabdian');
Route::get('/tugasAkhirMhs', [ResearchAndDedicationController::class, 'tugasAkhir'])->name('riset&pengabdian');
Route::get('/tugasAkhirMhs/{assignment}', [ResearchAndDedicationController::class, 'selectTugasAkhir'])->name('riset&pengabdian');
Route::get('/publikasiMhs', [ResearchAndDedicationController::class, 'publikasi'])->name('riset&pengabdian');
Route::get('/publikasiMhs/{publication}', [ResearchAndDedicationController::class, 'selectPublikasi'])->name('riset&pengabdian');
Route::get('/projectBasedLearning', [ResearchAndDedicationController::class, 'proyek'])->name('riset&pengabdian');
Route::get('/projectBasedLearning/{project}', [ResearchAndDedicationController::class, 'selectProyek'])->name('riset&pengabdian');

Route::get('/mitra', [PartnerController::class, 'index'])->name('mitra');

// ------------------------------------------------------------------------------Admin Route
Auth::routes([
    'register' => true, // Mematikan halaman register
    'reset' => true     // Menghidupan halaman lupa password
]);

Route::get('/home', [AdminHomeController::class, 'index'])->name('home');

Route::resource('heroes', AdminHeroController::class)->except('show');
Route::resource('testimonies', AdminTestimonyController::class)->except('show');
Route::resource('services', AdminServiceController::class)->except('show');
Route::resource('organizations', AdminOrganizationController::class)->except('show');
Route::resource('informations', AdminInformationController::class)->except('show');
Route::resource('researchs', AdminResearchController::class)->except('show');
Route::resource('dedications', AdminDedicationController::class)->except('show');
Route::resource('assignments', AdminAssignmentController::class)->except('show');
Route::resource('publications', AdminPublicationController::class)->except('show');
Route::resource('projects', AdminProjectController::class)->except('show');
Route::resource('lecturers', AdminLectureController::class)->except('show');
Route::resource('partners', AdminPartnerController::class)->except('show');
Route::resource('contacts', AdminContactController::class)->except('show');
Route::resource('theses', AdminThesisController::class)->except('show');
Route::resource('practices', AdminPracticeController::class)->except('show');
Route::resource('document', AdminDocumentController::class)->except('show');
Route::resource('studies.cpls', AdminCplController::class)->except('show');
Route::resource('studies.subjects', AdminSubjectController::class)->except('show');

Route::put('/updateHelp/{help}', [AdminContactController::class, 'updateHelp']);

Route::get('/adminPengaturan', [AdminHomeController::class, 'setting'])->name('adminPengaturan');
Route::get('/adminUserPassword', [AdminUserController::class, 'indexPassword'])->name('adminUserPassword');
Route::put('/adminUserPassword/{user}', [AdminUserController::class, 'updatePassword']);
Route::get('/adminUserEmail', [AdminUserController::class, 'indexEmail'])->name('adminUserEmail');
Route::put('/adminUserEmail/{user}', [AdminUserController::class, 'updateEmail']);

Route::get('/adminProfil', [AdminHomeController::class, 'profil'])->name('profil');
Route::put('/adminProfil/{profile}', [AdminHomeController::class, 'profilUpdate'])->name('profilUpdate');

Route::get('/adminStudi/{study}', [AdminHomeController::class, 'select'])->name('studi');
Route::put('/studi/{study}', [AdminHomeController::class, 'studiUpdate'])->name('studiUpdate');

Route::get('/adminKurikulum/{curriculum}', [AdminCurriculumController::class, 'select'])->name('kurikulum');
Route::put('/kurikulum/{curriculum}', [AdminCurriculumController::class, 'update'])->name('kurikulumUpdate');

Route::get('/adminJurnalDosen/{lecturer}', [AdminLectureController::class, 'selectJournal'])->name('jurnalDosen');

Route::get('/adminDosenPublikasi/{lecturer}', [AdminLectureController::class, 'createPublication']);
Route::post('/adminDosenPublikasi/create/{lecturer}', [AdminLectureController::class, 'storePublication']);
Route::get('/adminDosenPublikasi/edit/{lpublication}', [AdminLectureController::class, 'editPublication']);
Route::put('/adminDosenPublikasi/update/{lpublication}', [AdminLectureController::class, 'updatePublication']);
Route::delete('/adminDosenPublikasi/delete/{lpublication}', [AdminLectureController::class, 'destroyPublication']);

Route::get('/adminDosenPengabdian/{lecturer}', [AdminLectureController::class, 'createDedication']);
Route::post('/adminDosenPengabdian/create/{lecturer}', [AdminLectureController::class, 'storeDedication']);
Route::get('/adminDosenPengabdian/edit/{ldedication}', [AdminLectureController::class, 'editDedication']);
Route::put('/adminDosenPengabdian/update/{ldedication}', [AdminLectureController::class, 'updateDedication']);
Route::delete('/adminDosenPengabdian/delete/{ldedication}', [AdminLectureController::class, 'destroyDedication']);

Route::get('/adminDosenKIntelektual/{lecturer}', [AdminLectureController::class, 'createIntelectual']);
Route::post('/adminDosenKIntelektual/create/{lecturer}', [AdminLectureController::class, 'storeIntelectual']);
Route::get('/adminDosenKIntelektual/edit/{lintelectual}', [AdminLectureController::class, 'editIntelectual']);
Route::put('/adminDosenKIntelektual/update/{lintelectual}', [AdminLectureController::class, 'updateIntelectual']);
Route::delete('/adminDosenKIntelektual/delete/{lintelectual}', [AdminLectureController::class, 'destroyIntelectual']);


// ------------------------------------------------------------------------------Refresh Token

Route::get('/refresh-token', function () {
    return response()->json(['token' => csrf_token()]);
});

?>
