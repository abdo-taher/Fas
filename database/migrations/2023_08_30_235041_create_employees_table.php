<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('employees_code')->comment('كود الموظف التلقائي لايتغير');
            $table->integer('fingerprint_code')->comment('كود بصمة الموظف من جهاز البصمة لايتغير');
            $table->string("emp_name", 300);
            $table->integer('religion_id')->unsigned()->comment('حقل الديانة');
            $table->integer('blood_type_id')->unsigned()->comment('حقل فصيلة الدم');
            $table->foreign('religion_id')->references('id')->on('religions')->onUpdate('cascade');
            $table->foreign('blood_type_id')->references('id')->on('blood_types')->onUpdate('cascade');
            $table->string("residence_address", 300)->comment("عنوان الاقامة الفعلي للموظف");
            $table->integer('children_number')->default(0);
            $table->tinyInteger('emp_gender')->comment("نوع الجنس  - واحد ذكر - اثنين انثي");
            $table->integer('marital_status_id')->unsigned()->comment('الحالة الاجتماعية');
            $table->integer('military_services_id')->unsigned()->comment('الحالة العسكرية');
            $table->foreign("marital_status_id")->references('id')->on('marital_status')->onUpdate('cascade');
            $table->foreign("military_services_id")->references('id')->on('military_services')->onUpdate('cascade');
            $table->date("emp_military_date_from")->nullable()->comment("تاريخ بداية الخدمة العسكرية");
            $table->date("emp_military_date_to")->nullable()->comment("تاريخ نهاية الخدمة العسكرية");
            $table->date("emp_delay_date_from")->nullable()->comment("تاريخ بداية التاجيل من الخدمة العسكرية");
            $table->date("emp_delay_date_to")->nullable()->comment("تاريخ نهاية التاجيل من الخدمة العسكرية");
            $table->string("emp_military_wepon")->nullable()->comment("نوع سلاح الخدمة العسكرية");
            $table->date("exemption_date")->nullable()->comment("تاريخ الاعفاء من الخدمه العسكرية");
            $table->string("exemption_reason", 300)->nullable()->comment("ٍسبب الاعفاء من الخدمه العسكرية ");
            $table->tinyInteger("does_has_Driving_License")->default(0)->comment("هل يمتلك رخصه قياده");
            $table->integer('driving_license_id')->nullable()->comment('نوع رخصة القيادة')->unsigned();
            $table->foreign('driving_license_id')->references('id')->on('driving_licenses')->onUpdate('cascade');
            $table->string("driving_License_degree", 50)->nullable()->comment("رقم رخصه القيادة");
            $table->integer('qualif_type_id')->nullable()->unsigned()->comment("نوع المؤهل");
            $table->integer('Qualifications_id')->nullable()->unsigned()->comment("المؤهل التعليمي");
            $table->foreign("qualif_type_id")->references("id")->on("qualif_types")->onUpdate("cascade");
            $table->foreign("Qualifications_id")->references("id")->on("qualifications")->onUpdate("cascade");
            $table->string("Qualifications_year", 10)->nullable()->comment("سنة التخرج");
            $table->integer('graduation_estimate_id')->nullable()->unsigned()->comment("التقدير");
            $table->foreign("graduation_estimate_id")->references("id")->on("graduation_estimates")->onUpdate("cascade");
            $table->string("Graduation_specialization", 225)->nullable()->comment("تخصص التخرج");
            $table->date("emp_start_date")->nullable()->comment("تاريخ بدء العمل للموظف");
            $table->tinyInteger("Functiona_status")->default(0)->comment("حالة الموظف واحد يعمل - صفر خارج الخدمة");
            $table->integer('Resignations_id')->nullable()->unsigned()->comment("نوع ترك العمل");
            $table->foreign("Resignations_id")->references("id")->on("resignations")->onUpdate("cascade");
            $table->date("Date_resignation")->nullable()->comment("تاريخ ترك العمل");
            $table->string("resignation_cause")->nullable()->comment("سبب ترك العمل");
            $table->tinyInteger("MotivationType")->default(0)->comment("صفر لايوجد - واحد ثابت - اثنين متغير");
            $table->decimal("Motivation", 10, 2)->nullable()->default(0)->comment("قيمة الحافز الثابت ان وجد");
            $table->tinyInteger("sal_cach_or_visa")->default(1)->comment("نوع صرف الراتب - واحد كاش - اثنين فيزا بنكي");
            $table->string("bank_number_account", 50)->nullable()->comment("رقم حساب البنك للموظف");
            $table->tinyInteger("is_Disabilities_processes")->default(0)->comment("هل له اعاقة  - واحد يوجد صفر لايوجد");
            $table->integer("Disabilities_processes_id")->unsigned()->nullable()->comment("نوع الاعاقة");
            $table->foreign("Disabilities_processes_id")->references('id')->on('disabilities_processes')->onUpdate("cascade");
            $table->tinyInteger("has_Relatives")->default(0)->comment("هل له اقارب بالعمل ");
            $table->string("Relatives_details", 600)->nullable()->comment("تفاصيل الاقارب بالعمل");
            $table->string("urgent_person_details", 600)->nullable()->comment("تفاصيل شخص يمكن الرجوع اليه للوصول للموظف");
            $table->decimal("daily_work_hour", 10, 2)->nullable()->comment("عدد ساعات العمل للموظف وهذا في حالة ان ليس له شفت ثابت");
            $table->integer('emp_jobs_id')->nullable()->unsigned()->comment("نوع الوظيفة");
            $table->integer('emp_nationality_id')->nullable()->unsigned()->comment("الجنسية");
            $table->foreign("emp_jobs_id")->references("id")->on("job_categories")->onUpdate("cascade");
            $table->foreign("emp_nationality_id")->references("id")->on("nationalitys")->onUpdate("cascade");
            $table->string("emp_national_idenity", 50)->nullable()->comment("رقم البطاقة الشخصية - او رقم الهوية");
            $table->date("emp_end_identityIDate")->nullable()->comment("تاريخ نهاية البطاقة الشخصية - بطاقة الهوية");
            $table->string("emp_identityPlace", 225)->nullable()->comment("مكان اصدار بطاقة الهوية الشخصية");
            $table->integer('emp_Departments_id')->nullable()->unsigned()->comment("الادراة");
            $table->foreign("emp_Departments_id")->references("id")->on("departments")->onUpdate("cascade");
            $table->string("emp_cafel")->nullable()->comment("اسم الكفيل ");
            $table->boolean("is_forgin")->default(false)->comment("هل هو اجنبي ");
            $table->string("emp_pasport_no", 100)->nullable()->comment("رقم الباسبور ان وجد");
            $table->string("emp_pasport_from", 100)->nullable()->comment("مكان استخراج الباسبور");
            $table->date("emp_pasport_exp")->nullable()->comment("تاريخ انتهاء الباسبور");
            $table->string("emp_home_tel", 50)->nullable()->comment("رقم هاتف المنزل");
            $table->string("emp_work_tel", 50)->nullable()->comment("رقم هاتف العمل");
            $table->string("emp_email", 100)->nullable()->comment(" ايميل  الموظف");
            $table->string("emp_photo", 100)->nullable()->comment(" صورة  الموظف");
            $table->string("emp_cv", 100)->nullable()->comment(" السيرة الذاتية للموظف");
            $table->decimal("emp_sal", 10, 2)->default(0)->comment("راتب الموظف");
            $table->integer('language_id')->nullable()->unsigned()->comment(" اللغه التي يتكلم بها الاساسية");
            $table->integer('country_id')->nullable()->unsigned()->comment(" دولة الموظف");
            $table->integer('governorate_id')->nullable()->unsigned()->comment("محافظة الموظف");
            $table->integer('center_id')->nullable()->unsigned()->comment(" مدينة الموظف");
            $table->foreign("language_id")->references("id")->on("languages")->onUpdate("cascade");;
            $table->foreign("country_id")->references("id")->on("countrys")->onUpdate("cascade");;
            $table->foreign("governorate_id")->references("id")->on("governorates")->onUpdate("cascade");;
            $table->foreign("center_id")->references("id")->on("centers")->onUpdate("cascade");;
            $table->date("brith_date")->nullable()->comment("تاريخ ميلاد الموظف");
            $table->date("work_date_start")->nullable()->comment("تاريخ بداية العمل");
            $table->tinyInteger("is_has_fixced_shift")->nullable()->comment("هل للموظف شفت ثابت");
            $table->boolean("shift_type")->default(false)->comment('هل للموظف شفت ثابت');
            $table->integer("shift_type_id")->unsigned()->comment('فترة عمل الموظف');
            $table->foreign("shift_type_id")->references("id")->on("shitfts_type")->onUpdate("cascade");
            $table->decimal("day_price", 10, 2)->nullable()->comment("سعر يوم الموظف");
            $table->text("notes")->nullable()->comment("الملاحظات علي الموظف");
            $table->tinyInteger("isSocialnsurance")->default(0)->comment("هل للموظف تأمين اجتماعي");
            $table->decimal("Socialnsurancecutmonthely", 10, 2)->nullable()->comment("  قيمة استقطاع التأمين الاجتماعي الشهري للموظف");
            $table->tinyInteger("ismedicalinsurance")->default(0)->comment("هل للموظف تأمين طبي");
            $table->decimal("medicalinsurancecutmonthely", 10, 2)->nullable()->comment("  قيمة استقطاع التأمين الطبي الشهري للموظف");
            $table->tinyInteger("Does_have_fixed_allowances")->default(0)->comment("هل له بدلات ثابته");
            $table->tinyInteger("does_has_ateendance")->default(1)->comment("هل ملزم الموظف بعمل بصمه حضور وانصراف");
            $table->tinyInteger("is_done_Vaccation_formula")->default(0)->comment("هل تمت المعادله التلقائية لاحتساب الرصيد السنوي للموظف");
            $table->tinyInteger("is_active_for_Vaccation")->default(0)->comment("هل هذا الموظف ينزل له رصيد اجازات	");
            $table->integer("Annual_leave_balance")->nullable()->comment("رصيد الاجازات السنوية ان وجد");
            $table->tinyInteger("is_Sensitive_manager_data")->default(0)->comment("هل بيانات حساساه للمديرين مثلا ولاتظهر الا بصلاحيات خاصة	");
            $table->integer("branch_id")->unsigned()->comment("الفرع التابع له الموظف ");
            $table->date("date_of_being_hired")->nullable()->comment("تاريخ تعين الموظف ");
            $table->foreign("branch_id")->references('id')->on('branches')->onUpdate('cascade');
            $table->string("Someone_we_can_reach")->nullable()->comment("شخص يمكن الوصل الية في الحالة الضرورية");
            $table->integer("Phone_we_can_reach")->nullable()->comment("رصيد الاجازات السنوية ان وجد");
            $table->integer("added_by");
            $table->integer("updated_by")->nullable();
            $table->integer("com_code");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
