<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method 
*/
$route['default_controller'] = 'users_controller'; 
$route['loginadmin'] = 'supper_admin_controller/supper_admin_login';
$route['download_student_excel_data'] = 'Excel_Upload_Controller/download_student_excel_data';
$route['notification-admin'] = 'supper_admin_controller/notification_admin';
$route['online_payment_details'] = 'supper_admin_controller/online_payment_details';

$route['common-mail-notification'] = 'supper_admin_controller/common_notifications';
$route['application-request'] = 'users_controller/application_request';
$route['about-us'] = 'users_controller/about_us';
$route['terms_and_condition'] = 'users_controller/terms_and_condition';
$route['division_and_class_master'] = 'supper_admin_controller/division_and_class_master';
$route['deshboard'] = 'supper_admin_controller/deshboard';
$route['admin-principle'] = 'supper_admin_controller/admin_principle';
$route['principle-registration'] = 'users_controller/principle_registration'; 
$route['principle-login'] = 'users_controller/principle_login'; 
$route['teacher-create'] = 'users_controller/teacher_creation'; 
$route['teacher-list'] = 'users_controller/teacher_list'; 
$route['principle-profile'] = 'users_controller/principle_profile'; 
$route['change-password'] = 'users_controller/change_password'; 
$route['admin-change-password'] = 'supper_admin_controller/admin_change_password';
$route['logout']='users_controller/logoutprinciple';
$route['teacher-login']='users_controller/teacher_login';
$route['teacher-profile']='users_controller/teacher_profile';
$route['student-list']='users_controller/student_list';
$route['new-student-registration']='users_controller/new_student_registration';
$route['create-event']='users_controller/eventcreation';
$route['holiday-list']='users_controller/holiday_list';
$route['student-attendance']='users_controller/student_attendance';
$route['attendance-student-list']='users_controller/attendance_student_list';
$route['parent-login']='users_controller/parent_login';
$route['parent-profile']='users_controller/parent_profile';
$route['create-clerek']='users_controller/create_clerek';
$route['student-list-clerk']='users_controller/student_list_clerk';
$route['comming_soons']='users_controller/comming_soons';
$route['individual_notification']='users_controller/individual_notification';
$route['parent_notifications']='users_controller/parent_notifications';
$route['common_notification']='users_controller/common_notification';
$route['clerk-list']='users_controller/clerk_list';
$route['school_invoice']='users_controller/school_invoice';
$route['schools_invoice_details']='users_controller/schools_invoice_details';
$route['invoice_view_details']='Supper_admin_controller/invoice_view_details';
$route['salesman_users']='Supper_admin_controller/salesman_users';
$route['partner_commision']='Supper_admin_controller/partner_commision';
$route['main_sliders']='Supper_admin_controller/main_sliders';
$route['invoice_details']='Supper_admin_controller/invoice_details';
$route['admin_import_student_excel_sheet']='Supper_admin_controller/admin_import_student_excel_sheet';
$route['schools_slider']='users_controller/schools_slider';
$route['student-fees-details']='users_controller/student_fees_details';
$route['attendance_calendar']='users_controller/attendance_calendar';
$route['contact-us']='users_controller/contact_us';
$route['view-exam-time-table']='users_controller/view_exam_time_table';
$route['clerk-application-request']='users_controller/clerk_application_request';
$route['our_teams']='users_controller/our_teams';
$route['notification']='users_controller/notification';
$route['create-time-table']='users_controller/create_time_table';
$route['salesman-school-details']='users_controller/salesman_school_details';
$route['view-schools-time-table']='users_controller/view_schools_time_table';
$route['create-examination-time-table']='users_controller/create_exam_time_table';
$route['student-attendance-list-admin']='users_controller/student_attendance_list_admin';
$route['create-student-result']='users_controller/create_student_result';
$route['view-student-result']='users_controller/view_student_result';
$route['view_application_request']='users_controller/view_application_request';
$route['student_history']='users_controller/student_history';
$route['bonafied_certificate']='users_controller/bonafied_certificate';
$route['download_excel_format']='excel_upload_controller/download_excel_format';
$route['nirgam_uttara']='users_controller/nirgam_uttara';
$route['leaving_ceritificate']='users_controller/leaving_ceritificate';
$route['sales-man-login']='users_controller/sales_man_login';
$route['salesman-profiles']='users_controller/sales_man_profiles';
$route['create-final-result']='users_controller/create_final_result';
$route['create-ghoswara']='users_controller/create_ghoswara';

$route['bonafied_certificate_english_medium']='users_controller/bonafied_certificate_english_medium';
$route['nirgam_uttara_english_medium']='users_controller/nirgam_uttara_english_medium';
$route['leaving_ceritificate_english_medium']='users_controller/leaving_ceritificate_english_medium';
/*android api creeation Url vStart00v*/
$route['student_result_api']='Teachers_Api_Controller/student_result_api';
$route['particular_student_result_details_api']='Teachers_Api_Controller/particular_student_result_details_api';
$route['teacher_login_api']='Teachers_Api_Controller/teacher_login_api';
$route['view_student_api']='Teachers_Api_Controller/view_student_api';
$route['schools_time_table_api']='Teachers_Api_Controller/schools_time_table_api';
$route['todays_persent_abscent_halfday']='Teachers_Api_Controller/todays_persent_abscent_halfday';
$route['schools_examination_time_table_api']='Teachers_Api_Controller/schools_examination_time_table_api';
$route['add_notfication_select_dropdown_student_list_api']='Teachers_Api_Controller/add_notfication_select_dropdown_student_list_api';
$route['add_new_notifications_for_student_api']='Teachers_Api_Controller/add_new_notifications_for_student_api';
$route['update_notifications_individaul_api']='Teachers_Api_Controller/update_notifications_individaul_api';
$route['update_view_notification_individual_data_api']='Teachers_Api_Controller/update_view_notification_individual_data_api';
$route['view_all_notification_in_table_form_api']='Teachers_Api_Controller/view_all_notification_in_table_form_api'; 
$route['view_header_images_and_header_names_api']='Teachers_Api_Controller/view_header_images_and_header_names_api';
$route['student_attendance_api']='Teachers_Api_Controller/student_attendance_api';
$route['holidays_api_master']='Teachers_Api_Controller/holidays_api_master';
$route['student_attendance_list_api']='Teachers_Api_Controller/student_attendance_list_api';
$route['attendance_search_filter_api']='Teachers_Api_Controller/attendance_search_filter_api';
$route['common_notifications']='Teachers_Api_Controller/common_notifications';
$route['get_all_student_attendance_api']='Teachers_Api_Controller/get_all_student_attendance_api';
$route['student_attendance_status_list']='Teachers_Api_Controller/student_attendance_status_list';
/*android api creeation Url End*/
/*android api creation in parent side*/
$route['parent_login_api']='Parent_Api_Controller/parent_login_api';
$route['student_fees_details_api']='Parent_Api_Controller/student_fees_details_api';
$route['vimlai_header_sliders']='Parent_Api_Controller/vimlai_header_sliders';
$route['student_schools_time_tables_api']='Parent_Api_Controller/student_schools_time_tables_api';
$route['student_examination_api']='Parent_Api_Controller/student_examination_api';
$route['student_holiday_master_api']='Parent_Api_Controller/student_holiday_master_api';
$route['student_attendance_calendar_api']='Parent_Api_Controller/student_attendance_calendar_api';
$route['student_calendar_month_wise_filteration']='Parent_Api_Controller/student_calendar_month_wise_filteration';
$route['student_profiles_api']='Parent_Api_Controller/student_profiles_api';
$route['individual_parent_notification_api']='Parent_Api_Controller/individual_parent_notification_api';
$route['student_parent_result_api']='Parent_Api_Controller/student_parent_result_api';
$route['particular_student_parent_details_api']='Parent_Api_Controller/particular_student_parent_details_api';
$route['application_type']='Parent_Api_Controller/application_type';
$route['student_applications_submit']='Parent_Api_Controller/student_applications_submit';
$route['view_application_details']='Parent_Api_Controller/view_application_details';
$route['view_fees_details']='Parent_Api_Controller/view_fees_details';
$route['header_sliders']='Teachers_Api_Controller/header_sliders';
$route['school_logo_images']='Parent_Api_Controller/school_logo_images';


$route['checkout_payment']='Users_controller/checkout_payment';
$route['thank_you_payment_recived']='Users_controller/thank_you_payment_recived';
$route['procced_to_payment']='Users_controller/proced_to_payment';
/*end api creation in parent side*/
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
