@extends('layouts.default')

@section('toolbar')
<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
    <!--begin::Page title-->
    <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">orden de trabajo List</h1>
        <!--end::Title-->
        <!--begin::Separator-->
        <span class="h-20px border-gray-200 border-start mx-4"></span>
        <!--end::Separator-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">
                <a href="../../demo13/dist/index.html" class="text-muted text-hover-primary">Home</a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-dark">orden de trabajo</li>
            <!--end::Item-->
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title-->
</div>
@endsection

@section('contents')
<!--begin::Container-->
<div id="kt_content_container" class="container-xxl">
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search orden de trabajo" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <!--begin::Add customer-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">Add orden de trabajo</button>
                    <!--end::Add customer-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                    <div class="fw-bolder me-5">
                    <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
                    <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
                </div>
                <!--end::Group actions-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
                            </div>
                        </th>
                        <th class="min-w-100px">Number</th>
                        <th class="min-w-100px">Owner</th>
                        <th class="min-w-100px">Organization</th>
                        <th class="min-w-100px">COMPLETION DATE</th>
                        <th class="text-end min-w-70px">Actions</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-bold text-gray-600">
                    @foreach($workOrders as $workOrder)
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <input name="id" value="{{ $workOrder->id }}" class="d-none"/>
                                {{ $workOrder->number }}
                            </td>
                            <td>
                                @if(json_decode($workOrder->owner))
                                    {{ json_decode($workOrder->owner)->name }}
                                @endif
                            </td>
                            <td>
                                {{ $workOrder->organization}}
                            </td>
                            <td>
                                {{ $workOrder->completeDate}}
                            </td>
                            <!--begin::Action=-->
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                <span class="svg-icon svg-icon-5 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon--></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a class="menu-link px-3" onclick="onCreatePdf({{$workOrder}})">export</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a class="menu-link px-3" data-kt-customer-table-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                            <!--end::Action=-->
                        </tr>
                    @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
    <!--begin::Modal - Customers - Add-->
    <div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" action="#" id="kt_modal_add_customer_form" data-kt-redirect="/work-order">
                    @csrf
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_customer_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bolder">Add orden de trabajo</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_client_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold mb-2">Number</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" name="number" value="" />
                                <!--end::Input-->
                            </div>
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Owner</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Select a client"></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="owner" aria-label="Select Owner" data-control="select2" data-placeholder="Select Owner..." data-dropdown-parent="#kt_modal_add_customer" class="form-select form-select-solid fw-bolder">
                                    <option value="">Select Owner...</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <div class="fw-bolder fs-3 rotate collapsible mb-7">AirCraft</div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row g-9 mb-7">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Envelop</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="" name="envelop" value="" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-3 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Model</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="" name="envelop_model" value="" />
                                    <!--end::Input-->
                                </div>
                                <div class="col-md-3 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">S/N</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="" name="envelop_sn" value="" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row g-9 mb-7">
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-bold mb-2">REGISTRATION</label>
                                    <input class="form-control form-control-solid" placeholder="" name="registration" value="" />
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-bold mb-2">LAST INSPECTION DATE</label>
                                    <input class="form-control form-control-solid" placeholder="" name="last_date" value="" />
                                </div>
                            </div>
                            <div class="row g-9 mb-7">
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-bold mb-2">TOTAL HOURS</label>
                                    <input class="form-control form-control-solid" placeholder="" name="total_hour" value="" />
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-bold mb-2">HOURS SINCE LAST INSPECTION</label>
                                    <input class="form-control form-control-solid" placeholder="" name="last_hour" value="" />
                                </div>
                            </div>
                            <div class="row g-9 mb-7">
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-bold mb-2">BASKET</label>
                                    <input class="form-control form-control-solid" placeholder="" name="basket" value="" />
                                </div>
                                <div class="col-md-3 fv-row">
                                    <label class="required fs-6 fw-bold mb-2">MODEL</label>
                                    <input class="form-control form-control-solid" placeholder="" name="basket_model" value="" />
                                </div>
                                <div class="col-md-3 fv-row">
                                    <label class="required fs-6 fw-bold mb-2">S/N</label>
                                    <input class="form-control form-control-solid" placeholder="" name="basket_sn" value="" />
                                </div>
                            </div>
                            <div class="row g-9 mb-7">
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-bold mb-2">BURNER</label>
                                    <input class="form-control form-control-solid" placeholder="" name="burner" value="" />
                                </div>
                                <div class="col-md-3 fv-row">
                                    <label class="required fs-6 fw-bold mb-2">MODEL</label>
                                    <input class="form-control form-control-solid" placeholder="" name="burner_model" value="" />
                                </div>
                                <div class="col-md-3 fv-row">
                                    <label class="required fs-6 fw-bold mb-2">S/N</label>
                                    <input class="form-control form-control-solid" placeholder="" name="burner_sn" value="" />
                                </div>
                            </div>
                            <div id="cylinders">
                                <div class="row g-9 mb-7">
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-6 fw-bold mb-2">CYLINDERS</label>
                                        <input class="form-control form-control-solid" placeholder="" value="" id="new_cylinder"/>
                                    </div>
                                    <div class="col-md-3 fv-row">
                                        <label class="required fs-6 fw-bold mb-2">MODEL</label>
                                        <input class="form-control form-control-solid" placeholder="" value="" id="new_cylinder_model"/>
                                    </div>
                                    <div class="col-md-3 fv-row">
                                        <label class="required fs-6 fw-bold mb-2">S/M</label>
                                        <input class="form-control form-control-solid" placeholder="" value="" id="new_cylinder_sn"/>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary mb-7" onclick="addCylinder()">Add Cylinder</button>
                            
                            <div id="requested_tasks">
                                <div class="fv-row mb-7">
                                    <label class="required fs-6 fw-bold mb-2">REQUESTED TASKS</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="" id="new_requested_task" value="" />
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary mb-7" onclick="addRequestedTasks()">Add REQUESTED TASKS</button>
                            <div class="row g-9 mb-7">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">WORK ORDER CAO ACCEPTATION</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="" name="work_accept" value="" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">DATE</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="" name="work_accept_date" value="" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row g-9 mb-7">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">OWNER/OPERATOR WO APPROVAL</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="" name="owner_approval" value="" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">DATE</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="" name="owner_approval_date" value="" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <div id="performed_tasks">
                                <div class="fv-row mb-7">
                                    <label class="required fs-6 fw-bold mb-2">PERFORMED TASKS</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="" id="new_performed_task" value="" />
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary mb-7" onclick="addPerformedTasks()">Add Performed Tasks</button>
                            <div id="certificates">
                                <div class="row g-9 mb-7">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold mb-2">CERTIFICATES ISSUED</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" placeholder="" id="new_certificate" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold mb-2">REFERENCE NR.</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" placeholder="" id="new_certificate_reference" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold mb-2">DATE</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" placeholder="" id="new_certificate_date" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary mb-7" onclick="addCertificates()">Add Certificate</button>
                            <div id="comments">
                                <div class="fv-row mb-7">
                                    <label class="required fs-6 fw-bold mb-2">COMMENTS AND/OR NON-CONFORMITIES</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="" id="new_comment" value="" />
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary mb-7" onclick="addComments()">Add Comments</button>
                            <div class="row g-9 mb-7">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">ORGANIZATION</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="" name="organization" value="" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">COMPLETION DATE</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="" name="complete_date" value="" />
                                    <!--end::Input-->
                                </div>
                            </div>
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light me-3">Discard</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
    <!--end::Modal - Customers - Add-->
</div>
<!--end::Container-->
@endsection

@section("custom_js")
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="assets/js/custom/apps/work-order/list/list.js"></script>
<script src="assets/js/custom/apps/work-order/add.js"></script>

<script src="assets/js/my/work-order/jspdf.umd.min.js"></script>
<script src="assets/js/my/work-order/jspdf.plugin.autotable.js"></script>

<script src="assets/js/my/work-order/index.js"></script>
@endsection