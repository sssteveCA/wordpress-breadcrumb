import {GetBreadcrumb, GetBreadcrumbData} from "./classes/requests/getbreadcrumb.js";

declare const breadcrumb_vars: any;

jQuery(()=>{
    //console.log(breadcrumb_vars);
    let breadcrumbData: GetBreadcrumbData = {
        post_id: breadcrumb_vars.post_id 
    }
    let breadcrumb: GetBreadcrumb = new GetBreadcrumb(breadcrumbData);
    breadcrumb.getBreadcrumb().then(res => {
        if(res != ""){
            insertBreadcrumb(res);
        }
    })
});

/**
 * Insert the breadcrumb after the menu
 * @param breadcrumb the HTML of the breadcrumb
 */
function insertBreadcrumb(breadcrumb: string): void{
    let masthead = jQuery('#masthead');
    jQuery(breadcrumb).insertAfter(masthead);
}