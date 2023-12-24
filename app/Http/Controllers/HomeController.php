<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Vaccine;
use App\Models\Allergy;
use App\Models\Clinic;
use App\Models\PatientAllergy;
use App\Models\Doctor;
use App\Models\PatientVaccineClinic;
use App\Models\MedicalReport;
use App\Models\Prescription;
use App\Models\Medicine;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        return view ('index');
    }

    public function home()
    {
        $user = auth()->user();
        return view ('admin.home', compact('user'));
    }

    public function patient()
    {
        $patient = Patient::all();
        return view('admin.pages.patient', compact('patient'));
    }

    public function vaccine()
    {
        $vaccine = Vaccine::all();
        return view('admin.pages.vaccine',compact('vaccine'));
    }

    public function allergy()
    {
        $allergy = Allergy::all();
        return view('admin.pages.allergy', compact('allergy'));
    }

    public function clinic()
    {
        $clinic = Clinic::all();
        return view('admin.pages.clinic',compact('clinic'));
    }

    public function patient_allergy()
    {
        $patient = Patient::all();
        $pt = Patient::all();
        $allergy = Allergy::all();
        $all = Allergy::all();
        $patientallergy = DB::table('patient_allergies')
            ->join('patients','patient_allergies.patient_id','=','patients.id')
            ->join('allergies','patient_allergies.allergy_id','=','allergies.id')
            ->select('patient_allergies.*','patients.last_name','allergies.allergyname','allergies.type')
            ->get();

        return view('admin.pages.patientallergy', compact('patient', 'allergy', 'patientallergy', 'pt', 'all'));
    }

    public function doctor()
    {
        $doctor = Doctor::all();
        $clinic = Clinic::all();
        $cl = Clinic::all();
        return view('admin.pages.doctor', compact('clinic', 'doctor', 'cl'));
    }

    public function patient_vaccine_clinic()
    {
        $vaccine = Vaccine::all();
        $vc = Vaccine::all();
        $clinic = Clinic::all();
        $cl = Clinic::all();
        $patient = Patient::all();
        $pt = Patient::all();
        $pvcjoin = DB::table('patient_vaccine_clinics')
            ->join('patients','patient_vaccine_clinics.patient_id','=','patients.id')
            ->join('vaccines','patient_vaccine_clinics.vaccine_id','=','vaccines.id')
            ->join('clinics','patient_vaccine_clinics.center_id','=','clinics.id')
            ->select('patient_vaccine_clinics.*','patients.last_name','vaccines.vaccinename','clinics.clinicname')
            ->get();

        return view('admin.pages.patientvaccineclinic', compact('pvcjoin','vaccine', 'clinic', 'patient', 'vc', 'cl', 'pt'));
    }

    public function medical_report()
    {
        $patient = Patient::all();
        $pt = Patient::all();
        $doctor = Doctor::all();
        $doc = Doctor::all();
        $medicalreport = DB::table('medical_reports')
            ->join('patients','medical_reports.patient_id','=','patients.id')
            ->join('doctors','medical_reports.doctor_id','=','doctors.id')
            ->select('medical_reports.*','patients.last_name','doctors.doctor_name', 'doctors.email', 'patients.email')
            ->get();
        return view('admin.pages.medicalreport', compact('patient', 'doctor','medicalreport', 'pt', 'doc'));
    }

    public function prescription()
    {
        $medicalreport = MedicalReport::all();
        $medrep = MedicalReport::all();
        $prescription = Prescription::all();
        $medicine = Medicine::all();
        $prc = DB::table('prescriptions')
            ->join('medicines','prescriptions.id','=','medicines.prescription_id')
            ->select('prescriptions.*','medicines.medicine_name','dosage')
            ->get();
        return view('admin.pages.prescription', compact('medicalreport', 'prescription','medrep','prc'));
    }

    public function medicine()
    {
        $prescription = Prescription::all();
        $pres = Prescription::all();
        $medicine = Medicine::all();
        return view('admin.pages.medicine', compact('medicine','prescription','pres'));
    }

    public function userpage($id)
    {
        $user = auth()->user()->id;

        return view('admin.pages.userpage',compact('user'));
    }

    public function patientdata($id)
    {
        $pd = DB::table('patients')
            ->join('patient_allergies','patients.id','=','patient_allergies.patient_id')
            ->join('allergies','patient_allergies.allergy_id','=','allergies.id')
            ->select('patients.*','patient_allergies.*','allergies.allergyname','allergies.type')
            ->where('patients.id','=',$id)
            ->get();
        
        $pd1 = $pd;
        
        $mlr = DB::table('medical_reports')
            ->join('patients','medical_reports.patient_id','=','patients.id')
            ->join('doctors','medical_reports.doctor_id','=','doctors.id')
            ->select('medical_reports.*','patients.last_name','doctors.doctor_name', 'doctors.email', 'patients.email')
            ->get();

        return view('admin.pages.patientdata',compact('mlr','pd','pd1'));
    }

    
}
