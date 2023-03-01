import GetBreadcrumb from "./classes/requests/getbreadcrumb.js";

declare const breadcrumb_vars: any;

jQuery(()=>{
    console.log("breadcrumb.ts jquery");
    console.log(breadcrumb_vars);
    let breadcrumb: GetBreadcrumb = new GetBreadcrumb();
    breadcrumb.getBreadcrumb();
});