import { Observable } from 'rxjs';

export interface ApiCallerService<T> {

doCall(param: T): Observable<Object>;

}
