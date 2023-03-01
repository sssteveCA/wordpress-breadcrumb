

export default class GetBreadcrumb{

    private _errno: number = 0;
    private _error: string|null = null;

    public static ERR_FETCH: number = 1;
    private static ERR_FETCH_MSG: string = "Errore durante l'esecuzione della richiesta";

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

    
}