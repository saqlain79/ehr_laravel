<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\PatientMiddleware;
use App\Http\Middleware\DoctorMiddleware;
use App\Http\Middleware\AdminMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



//authentication
route::get('/login', [LoginController::class, 'login'])->name('login');
route::post('/login_post', [LoginController::class, 'login_post'])->name('login_post');
route::get('/register', [RegisterController::class, 'register'])->name('register');
route::post('/register_post', [RegisterController::class, 'register_post'])->name('register_post');
route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
//auth ends

route::get('/index', [HomeController::class, 'index'])->name('index');

route::get('/', [HomeController::class, 'home'])->name('home')->middleware('auth');

route::middleware(['auth'])->group(function () {

    //patient info
    route::get('/patient', [HomeController::class, 'patient'])->name('patient');
    
    //vaccine info
    route::get('/vaccine', [HomeController::class, 'vaccine'])->name('vaccine');
    
    //allergy info
    route::get('/allergy', [HomeController::class, 'allergy'])->name('allergy');
    
    //clinic info
    route::get('/clinic', [HomeController::class, 'clinic'])->name('clinic');
    
    //patient allergy info
    route::get('/patient_allergy', [HomeController::class, 'patient_allergy'])->name('patient_allergy');
    
    //doctor info
    route::get('/doctor', [HomeController::class, 'doctor'])->name('doctor');
    
    //patient vaccine clinic info
    route::get('/patient_vaccine_clinic', [HomeController::class, 'patient_vaccine_clinic'])->name('patient_vaccine_clinic');
    
    //medical report info
    route::get('/medical_report', [HomeController::class, 'medical_report'])->name('medical_report');
    
    //prescription info
    route::get('/prescription', [HomeController::class, 'prescription'])->name('prescription');
    
    //medicine info
    route::get('/medicine', [HomeController::class, 'medicine'])->name('medicine');
    
    //userpage
    route::get('/userpage/{id}', [HomeController::class, 'userpage'])->name('userpage');
    route::post('/userpage_edit/{id}', [AdminController::class, 'userpage_edit'])->name('userpage_edit');

    route::get('/patientdata/{id}', [HomeController::class, 'patientdata'])->name('patientdata');

        //edit and submit routes
        route::post('/patient_submit', [AdminController::class, 'patient_submit'])->name('patient_submit');
        // route::get('/patient_edit/{id}', [AdminController::class, 'patient_edit'])->name('patient_edit');
        route::post('/patient_edit_update/{id}', [AdminController::class, 'patient_edit_update'])->name('patient_edit_update');
        route::post('/vaccine_submit', [AdminController::class, 'vaccine_submit'])->name('vaccine_submit');
        // route::get('/vaccine_edit/{id}', [AdminController::class, 'vaccine_edit'])->name('vaccine_edit');
        route::post('/vaccine_edit_update/{id}', [AdminController::class, 'vaccine_edit_update'])->name('vaccine_edit_update');
        route::post('/allergy_submit', [AdminController::class, 'allergy_submit'])->name('allergy_submit');
        // route::get('/allergy_edit/{id}', [AdminController::class, 'allergy_edit'])->name('allergy_edit');
        route::post('/allergy_edit_update/{id}', [AdminController::class, 'allergy_edit_update'])->name('allergy_edit_update');
        route::get('/allergy_table', [AdminController::class, 'allergy_table'])->name('allergy_table');
        route::post('/clinic_submit', [AdminController::class, 'clinic_submit'])->name('clinic_submit');
        route::get('/clinic_edit/{id}', [AdminController::class, 'clinic_edit'])->name('clinic_edit');
        route::post('/clinic_edit_update/{id}', [AdminController::class, 'clinic_edit_update'])->name('clinic_edit_update');
        route::get('/clinic_table', [AdminController::class, 'clinic_table'])->name('clinic_table');
        route::post('/patient_allergy_submit', [AdminController::class, 'patient_allergy_submit'])->name('patient_allergy_submit');
        route::post('/patient_allergy_edit_update/{patient_id}/{allergy_id}', [AdminController::class, 'patient_allergy_edit_update'])->name('patient_allergy_edit_update');
        route::post('/patient_vaccine_clinic_submit', [AdminController::class, 'patient_vaccine_clinic_submit'])->name('patient_vaccine_clinic_submit');
        route::post('/patient_vaccine_clinic_edit_update/{patient_id}/{vaccine_id}/{clinic_id}', [AdminController::class, 'patient_vaccine_clinic_edit_update'])->name('patient_vaccine_clinic_edit_update');
        route::post('/medical_report_submit', [AdminController::class, 'medical_report_submit'])->name('medical_report_submit');
        route::post('/medical_report_edit_update/{id}', [AdminController::class, 'medical_report_edit_update'])->name('medical_report_edit_update');
        route::post('/prescription_submit', [AdminController::class, 'prescription_submit'])->name('prescription_submit');
        route::post('/prescription_edit_update/{id}', [AdminController::class, 'prescription_edit_update'])->name('prescription_edit_update');
        route::post('/medicine_submit', [AdminController::class, 'medicine_submit'])->name('medicine_submit');
        route::post('/medicine_edit_update/{medicine_name}/{prescription_id}', [AdminController::class, 'medicine_edit_update'])->name('medicine_edit_update');

        
    

        //delete routes
        route::post('/doctor_submit', [AdminController::class, 'doctor_submit'])->name('doctor_submit');
        route::get('/doctor_edit/{id}', [AdminController::class, 'doctor_edit'])->name('doctor_edit');
        route::post('/doctor_edit_update/{id}', [AdminController::class, 'doctor_edit_update'])->name('doctor_edit_update');
        route::get('/patient_delete/{id}', [AdminController::class, 'patient_delete'])->name('patient_delete');
        route::get('/vaccine_delete/{id}', [AdminController::class, 'vaccine_delete'])->name('vaccine_delete');
        route::get('/allergy_delete/{id}', [AdminController::class, 'allergy_delete'])->name('allergy_delete');
        route::get('/clinic_delete/{id}', [AdminController::class, 'clinic_delete'])->name('clinic_delete');
        route::get('/patient_allergy_delete/{patient_id}/{allergy_id}', [AdminController::class, 'patient_allergy_delete'])->name('patient_allergy_delete');
        route::get('/doctor_delete/{id}', [AdminController::class, 'doctor_delete'])->name('doctor_delete');
        route::get('/patient_vaccine_clinic_delete/{patient_id}/{vaccine_id}/{clinic_id}', [AdminController::class, 'patient_vaccine_clinic_delete'])->name('patient_vaccine_clinic_delete');
        route::get('/medical_report_delete/{id}', [AdminController::class, 'medical_report_delete'])->name('medical_report_delete');
        route::get('/prescription_delete/{id}', [AdminController::class, 'prescription_delete'])->name('prescription_delete');
        route::get('/medicine_delete/{medicine_name}/{prescription_id}', [AdminController::class, 'medicine_delete'])->name('medicine_delete');

    

});