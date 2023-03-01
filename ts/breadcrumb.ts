import {GetBreadcrumb} from "./classes/requests/getbreadcrumb.js";
import { BreadcrumbVars, GetBreadcrumbData } from "./types.js";

declare const breadcrumb_vars: BreadcrumbVars;

jQuery(()=>{
    //console.log(breadcrumb_vars);
    fetchBreadcrumb(breadcrumb_vars);
});

/**
 * Get the breadcrumb from backend
 * @param breadcrumb_vars the information of the current viewed page
 */
function fetchBreadcrumb(breadcrumb_vars: BreadcrumbVars): void{
    if(breadcrumb_vars.category == "" && breadcrumb_vars.front == "" && breadcrumb_vars.home == "" ){
        let breadcrumbData: GetBreadcrumbData = {
        post_id: breadcrumb_vars.post_id 
        }
        let breadcrumb: GetBreadcrumb = new GetBreadcrumb(breadcrumbData);
        breadcrumb.getBreadcrumb().then(res => {
            if(res != ""){
                insertBreadcrumb(res);
            }
        })
    }
}

/**
 * Insert the breadcrumb after the menu
 * @param breadcrumb the HTML of the breadcrumb
 */
function insertBreadcrumb(breadcrumb: string): void{
    let masthead = jQuery('#masthead');
    jQuery(breadcrumb).insertAfter(masthead);
}