

export default class GetBreadcrumb{

    private _errno: number = 0;
    private _error: string|null = null;

    public static ERR_FETCH: number = 1;
    private static ERR_FETCH_MSG: string = "Errore durante l'esecuzione della richiesta";

    private static FETCH_URL: string = "/www.lafilosofiadibianca.com/wp-content/plugins/breadcrumb/scripts/getbreadcrumb.php";

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

    public async getBreadcrumb(): Promise<string>{
        let response: string = "";
        this._errno = 0;
        try{
            await this.getBreadcrumbPromise().then(res => {
                console.log(res);
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
            fetch(GetBreadcrumb.FETCH_URL).then(res => {
                resolve(res.text())
            }).catch(err => {
                reject(err)
            })
        });
    }


}