import Axios from 'axios';

class Method {
    static insert(url = '', data){
        Axios.post(url, data)
        .then()
    }
}

export default Method;
