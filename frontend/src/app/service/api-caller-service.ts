import { Observable } from 'rxjs';

export interface ApiCallerService<T,R> {

doCall(param: T): Promise<R>;

}
