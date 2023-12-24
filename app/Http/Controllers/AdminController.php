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

class AdminController extends Controller
{
    

    public function patient_submit(Request $request)
    {
        $patient = new Patient();

        $patient->first_name = $request->first_name;
        $patient->last_name = $request->last_name;
        $patient->NID = $request->NID;
        $patient->phone = $request->phone;
        $patient->email = $request->email;
        $patient->address = $request->address;
        $patient->date_of_birth = $request->date_of_birth;
        $patient->gender = $request->gender;
        $patient->blood_group = $request->blood_group;

        $patient->save();

        return redirect()->back();
    }

    // public function patient_edit($id)
    // {
    //     $patient = Patient::find($id);
    //     return view('admin.pages.patient', compact('patient'));
    // }

    public function patient_edit_update(Request $request, $id)
    {
        $patient = Patient::find($id);

        $patient->first_name = $request->first_name;
        $patient->last_name = $request->last_name;
        $patient->NID = $request->NID;
        $patient->phone = $request->phone;
        $patient->email = $request->email;
        $patient->address = $request->address;
        $patient->date_of_birth = $request->date_of_birth;
        $patient->gender = $request->gender;

        $patient->save();

        return redirect()->route('patient');
    }

    public function patient_delete($id)
    {
        $patient = Patient::find($id);
        $patient->delete();

        return redirect()->back();
    }


    public function vaccine_submit(Request $request)
    {
        $vaccine = new Vaccine();

        $vaccine->vaccinename = $request->vaccinename;
        $vaccine->quantity = $request->quantity;
        $vaccine->targetDisease = $request->targetDisease;
        $vaccine->company = $request->company;

        $vaccine->save();

        return redirect()->back();
    }

    // public function vaccine_edit($id)
    // {
    //     $vcc = Vaccine::find($id);
    //     return view('admin.pages.vaccine_edit', compact('vcc'));
    // }

    public function vaccine_edit_update(Request $request, $id)
    {
        $vaccine = Vaccine::find($id);

        $vaccine->vaccinename = $request->vaccinename;
        $vaccine->quantity = $request->quantity;
        $vaccine->targetDisease = $request->targetDisease;
        $vaccine->company = $request->company;

        $vaccine->save();

        return redirect()->route('vaccine');
    }

    public function vaccine_delete($id)
    {
        $vaccine = Vaccine::find($id);
        $vaccine->delete();

        return redirect()->back();
    }

    

    public function allergy_table()
    {
        $allergy = Allergy::all();
        return view('allergy.allergy_table', compact('allergy'));
    }

    public function allergy_submit(Request $request)
    {
        $allergy = new Allergy();

        $allergy->allergyname = $request->name;
        $allergy->type = $request->type;
        $allergy->description = $request->description;

        $allergy->save();

        return redirect()->back();
    }

    // public function allergy_edit($id)
    // {
    //     $allergy = Allergy::find($id);
    //     return view ('allergy.allergy_edit', compact('allergy'));
    // }

    public function allergy_edit_update(Request $request, $id)
    {
        $allergy = Allergy::find($id);

        $allergy->allergyname = $request->allergyname;
        $allergy->type = $request->type;
        $allergy->description = $request->description;

        $allergy->save();

        return redirect()->route('allergy');
    }

   

    public function clinic_table()
    {
        $clinic = Clinic::all();
        return view('clinic.clinic_table', compact('clinic'));}

    public function clinic_submit(Request $request)
    {
        $clinic = new Clinic();

        $clinic->clinicname = $request->clinicname;
        $clinic->location = $request->location;
        $clinic->contact = $request->contact;
        $clinic->email = $request->email;

        $clinic->save();

        return redirect()->back();
    }

    public function clinic_edit($id)
    {
        $clinic = Clinic::find($id);
        return view('clinic.clinic_edit', compact('clinic'));
    }

    public function clinic_edit_update(Request $request, $id)
    {
        $clinic = Clinic::find($id);

        $clinic->clinicname = $request->name;
        $clinic->location = $request->location;
        $clinic->contact = $request->contact;
        $clinic->email = $request->email;

        $clinic->save();

        return redirect()->route('clinic');
    }

    // public function clinic_delete($id)
    // {
    //     $clinic = Clinic::find($id);
    //     $clinic->delete();

    //     return redirect()->back();
    // }

    

    public function patient_allergy_submit(Request $request)
    {
        $patientallergy = new PatientAllergy();

        $patientallergy->patient_id = $request->patient_id;
        $patientallergy->allergy_id = $request->allergy_id;

        $patientallergy->save();
        return redirect()->back();
    }

    public function patient_allergy_edit_update($patient_id, $allergy_id, Request $request)
    {
        DB::update('UPDATE patient_allergies SET patient_id=?, allergy_id=? WHERE patient_id=? AND allergy_id=?',[
            $request->patient_id,
            $request->allergy_id,
            $patient_id,
            $allergy_id,
        ]);

        return redirect()->back();
    }

    public function patient_allergy_delete($patient_id, $allergy_id)
    {
        $patientallergy = PatientAllergy::where('patient_id', $patient_id)->where('allergy_id', $allergy_id)->delete(); //i need to use first() here because i am using where() method to find the data and where() method returns a collection of data and i need to use first() to get the first data from the collection
        // $patientallergy->delete();

        return redirect()->back();
    }

    

    public function doctor_submit(Request $request)
    {
        $doctor = new Doctor();

        $doctor->doctor_name = $request->doctor_name;
        $doctor->contact = $request->contact;
        $doctor->email = $request->email;
        $doctor->dob = $request->dob;
        $doctor->license_num = $request->license_num;
        $doctor->specialty = $request->specialty;
        $doctor->years_of_exp = $request->years_of_exp;
        $doctor->center_id = $request->center_id;

        $doctor->save();

        return redirect()->back();
    }

    public function doctor_edit($id)
    {
        $doctor = Doctor::find($id);
        $clinic = Clinic::all();
        return view('doctor.doctor_edit', compact('clinic', 'doctor'));
    }

    public function doctor_edit_update(Request $request, $id)
    {
        $doctor = Doctor::find($id);

        $doctor->doctor_name = $request->doctor_name;
        $doctor->contact = $request->contact;
        $doctor->email = $request->email;
        $doctor->dob = $request->dob;
        $doctor->license_num = $request->license_num;
        $doctor->specialty = $request->specialty;
        $doctor->years_of_exp = $request->years_of_exp;
        $doctor->center_id = $request->center_id;

        $doctor->save();

        return redirect()->route('doctor');
    }

    public function doctor_delete($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();

        return redirect()->back();
    }

    

    public function patient_vaccine_clinic_submit(Request $request)
    {
    
        $pvc = new PatientVaccineClinic();

        $pvc->patient_id = $request->patient_id;
        $pvc->vaccine_id = $request->vaccine_id;
        $pvc->center_id = $request->center_id;

        $pvc->vaccination_date = $request->vaccination_date;
        $pvc->dosage = $request->dosage;
        $pvc->vaccine_administrator = $request->vaccine_administrator;

        $pvc->save();

        return redirect()->back();
    }

    public function patient_vaccine_clinic_edit_update($patient_id, $vaccine_id, $clinic_id, Request $request)
    {
        DB::update('UPDATE patient_vaccine_clinics SET patient_id = ?, vaccine_id = ?, center_id = ?, vaccination_date = ?, dosage = ?, vaccine_administrator = ? WHERE patient_id = ? AND vaccine_id = ? AND center_id = ?', [
            $request->patient_id,
            $request->vaccine_id,
            $request->center_id,
            $request->vaccination_date,
            $request->dosage,
            $request->vaccine_administrator,
            $patient_id,
            $vaccine_id,
            $clinic_id
        ]);
    
        return redirect()->back();
    }

    public function patient_vaccine_clinic_delete()
    {
        $pvc = PatientVaccineClinic::where('patient_id', $patient_id)->where('vaccine_id', $vaccine_id)->where('center_id', $clinic_id)->delete();

        return redirect()->back();
    }

    

    public function medical_report_submit(Request $request)
    {
        $medicalreport = new MedicalReport();

        $medicalreport->patient_id = $request->patient_id;
        $medicalreport->doctor_id = $request->doctor_id;
        $medicalreport->visit_reason = $request->visit_reason;
        $medicalreport->visit_date = $request->visit_date;
        $medicalreport->diagnosis = $request->diagnosis;
        $medicalreport->test = $request->test;
        $medicalreport->test_results = $request->test_results;
        $medicalreport->temperature = $request->temperature;
        $medicalreport->blood_pressure = $request->blood_pressure;
        $medicalreport->heart_rate = $request->heart_rate;
        $medicalreport->blood_oxygen = $request->blood_oxygen;
        $medicalreport->remarks = $request->remarks;

        $medicalreport->save();

        return redirect()->back();
    }

    public function medical_report_edit_update($id, Request $request)
    {
        $medicalreport = MedicalReport::find($id);

        $medicalreport->patient_id = $request->patient_id;
        $medicalreport->doctor_id = $request->doctor_id;
        $medicalreport->visit_reason = $request->visit_reason;
        $medicalreport->visit_date = $request->visit_date;
        $medicalreport->diagnosis = $request->diagnosis;
        $medicalreport->test = $request->test;
        $medicalreport->test_results = $request->test_results;
        $medicalreport->temperature = $request->temperature;
        $medicalreport->blood_pressure = $request->blood_pressure;
        $medicalreport->heart_rate = $request->heart_rate;
        $medicalreport->blood_oxygen = $request->blood_oxygen;
        $medicalreport->remarks = $request->remarks;

        $medicalreport->save();

        return redirect()->back();
    }

    public function medical_report_delete()
    {
        $medicalreport = MedicalReport::where('patient_id', $patient_id)->where('doctor_id', $doctor_id)->delete();
        return redirect()->back();
    }

    
    public function prescription_submit(Request $request)
    {
        $prescription = new Prescription();

        $prescription->report_id = $request->report_id;

        $prescription->save();

        return redirect()->back();
    }

    public function prescription_edit_update($id, Request $request)
    {
        $prescription = Prescription::find($id);

        $prescription->report_id = $request->report_id;

        $prescription->save();

        return redirect()->back();
    }

    public function prescription_delete($id)
    {
        $prescription = Prescription::find($id);
        $prescription->delete();

        return redirect()->back();
    }

    public function medicine_submit(Request $request)
    {
        $medicine = new Medicine();

        $medicine->medicine_name = $request->medicine_name;
        $medicine->prescription_id = $request->prescription_id;
        $medicine->medicine_type = $request->medicine_type;
        $medicine->dosage = $request->dosage;

        $medicine->save();

        return redirect()->back();

    }

    public function medicine_edit_update($medicine_name, $prescription_id, Request $request)
    {
        
        DB::update('UPDATE medicines SET medicine_name=?, prescription_id=?, medicine_type=?, dosage=? WHERE medicine_name=? AND prescription_id=?',[
            $request->medicine_name,
            $request->prescription_id,
            $request->medicine_type,
            $request->dosage,
            $medicine_name,
            $prescription_id
        ]);

        return redirect()->back();
    }

    public function medicine_delete($id)
    {
        $medicine = Medicine::find($id);
        $medicine->delete();

        return redirect()->back();
    }

    public function userpage_edit($id, Request $request)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->newpassword);
        $user->save();

        return redirect()->back();
    }
}
