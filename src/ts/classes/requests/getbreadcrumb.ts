import { GetBreadcrumbData } from "../../types";


export class GetBreadcrumb{

    private _post_id: string;
    private _errno: number = 0;
    private _error: string|null = null;

    constructor(data: GetBreadcrumbData){
        this._post_id = data.post_id;
    }

    public static ERR_FETCH: number = 1;
    private static ERR_FETCH_MSG: string = "Errore durante l'esecuzione della richiesta";

    private static FETCH_URL: string = "/www.lafilosofiadibianca.com/wp-content/plugins/breadcrumb/scripts/getbreadcrumb.php";

    get post_id(){return this._post_id;}
    get errno(){return this._errno;}
    get error(){
        switch(this._errno){
            case GetBreadcrumb.ERR_FETCH:
                this._error = GetBreadcrumb.ERR_FETCH_MSG;
                break;
            default:
                this._error = null;
                break;
        }
        return this._error;
    }

    /**
     * Get the generated HTML breadcrumb of the current post
     * @returns the HTML of the breadcrumb to display
     */
    public async getBreadcrumb(): Promise<string>{
        let response: string = "";
        this._errno = 0;
        try{
            await this.getBreadcrumbPromise().then(res => {
                //console.log(res);
                response = res;
            }).catch(err => {
                throw err;
            })
        }catch(e){
            this._errno = GetBreadcrumb.ERR_FETCH;
        }
        return response;
    }

    private async getBreadcrumbPromise(): Promise<string>{
        return await new Promise<string>((resolve,reject)=>{
            fetch(`${GetBreadcrumb.FETCH_URL}?post_id=${this._post_id}`).then(res => {
                resolve(res.text())
            }).catch(err => {
                reject(err)
            })
        });
    }


}