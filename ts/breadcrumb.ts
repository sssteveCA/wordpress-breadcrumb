import {GetBreadcrumb, GetBreadcrumbData} from "./classes/requests/getbreadcrumb.js";

declare const breadcrumb_vars: any;

jQuery(()=>{
    console.log("breadcrumb.ts jquery");
    console.log(breadcrumb_vars);
    let breadcrumbData: GetBreadcrumbData = {
        post_id: breadcrumb_vars.post_id 
    }
    let breadcrumb: GetBreadcrumb = new GetBreadcrumb(breadcrumbData);
    breadcrumb.getBreadcrumb();
});