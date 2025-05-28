<?php
use App\Http\Controllers\AccountantController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\AdvancedPaymentController;
use App\Http\Controllers\AmbulanceCallController;
use App\Http\Controllers\AmbulanceController;
use App\Http\Controllers\AppointmentCalendarController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BedAssignController;
use App\Http\Controllers\BedController;
use App\Http\Controllers\BedTypeController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\BirthReportController;
use App\Http\Controllers\BloodBankController;
use App\Http\Controllers\BloodDonationController;
use App\Http\Controllers\BloodDonorController;
use App\Http\Controllers\BloodIssueController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CallLogController;
use App\Http\Controllers\CaseHandlerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChargeCategoryController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\CurrencySettingController;
use App\Http\Controllers\DeathReportController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DiagnosisCategoryController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorDepartmentController;
use App\Http\Controllers\DoctorHolidayController;
use App\Http\Controllers\DoctorOPDChargeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\Employee;
use App\Http\Controllers\EmployeePayrollController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FrontServiceController;
use App\Http\Controllers\FrontSettingController;
use App\Http\Controllers\GeneratePatientIdCardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HospitalScheduleController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\InvestigationReportController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\IpdBillController;
use App\Http\Controllers\IpdChargeController;
use App\Http\Controllers\IpdConsultantRegisterController;
use App\Http\Controllers\IpdDiagnosisController;
use App\Http\Controllers\IpdOperationController;
use App\Http\Controllers\IpdPatientDepartmentController;
use App\Http\Controllers\IpdPaymentController;
use App\Http\Controllers\IpdPrescriptionController;
use App\Http\Controllers\IpdTimelineController;
use App\Http\Controllers\IssuedItemController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemStockController;
use App\Http\Controllers\LabTechnicianController;
use App\Http\Controllers\LiveConsultationController;
use App\Http\Controllers\LiveMeetingController;
use App\Http\Controllers\LunchBreakController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ManualBillPaymentController;
use App\Http\Controllers\MedicineBillController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\NoticeBoardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\OpdDiagnosisController;
use App\Http\Controllers\OpdPatientDepartmentController;
use App\Http\Controllers\OpdTimelineController;
use App\Http\Controllers\OperationCategoryController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\OperationReportController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PathologyCategoryController;
use App\Http\Controllers\PathologyParameterController;
use App\Http\Controllers\PathologyTestController;
use App\Http\Controllers\PathologyUnitController;
use App\Http\Controllers\Patient;
use App\Http\Controllers\PatientAdmissionController;
use App\Http\Controllers\PatientCaseController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientDiagnosisTestController;
use App\Http\Controllers\PatientIdCardTemplateController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentGatewayController;
use App\Http\Controllers\PaymentReportController;
use App\Http\Controllers\PharmacistController;
use App\Http\Controllers\PostalController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\PurchaseMedicineController;
use App\Http\Controllers\RadiologyCategoryController;
use App\Http\Controllers\RadiologyTestController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VaccinatedPatientController;
use App\Http\Controllers\VaccinationController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\Web;
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

Route::get('/users/creates', function () {
    return view('users.new_create');
});

// Routes for Landing Page starts

