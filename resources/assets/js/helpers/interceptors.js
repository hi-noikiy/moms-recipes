import axios from 'axios';
import store from '~/store';
import router from '~/router';
import { AUTH_LOGGED_OUT } from '~/store/mutation-types';

export default function setup() {
    axios.interceptors.response.use(undefined, function (err) {
        return new Promise(function (resolve, reject) {
            if (err.response.status === 401 && err.config && !err.config.__isRetryRequest) {
                // if you ever get an unauthorized, logout the user
                store.dispatch(AUTH_LOGGED_OUT);
            } else {
                throw err;
            }
        });
    });
}
