import { AUTH_LOGIN, AUTH_LOGOUT, AUTH_SUCCESS, AUTH_ERROR } from '~/store/mutation-types'

const state = {
    token: localStorage.getItem('user-token') || '',
    status: ''
}

const getters = {
    isAuthenticated: state => !!state.token,
    authStatus: state => state.status,
}

const actions = {
    [AUTH_LOGIN]: ({ commit, dispatch }, user) => {
        return new Promise((resolve, reject) => {
            commit(AUTH_LOGIN);

            axios({url: 'auth', data: user, method: 'POST'})
                .then(response => {
                    const token = response.data.token;
                    localStorage.setItem('user-token', token);
                    axios.defaults.headers.common['Authorization'] = token;
                    commit(AUTH_SUCCESS, token);
                    dispatch(USER_REQUEST);
                    resolve(response);
                })
                .catch(err => {
                    commit(AUTH_ERROR, err);
                    localStorage.removeItem('user-token');
                    reject(err);
                })
        });
    },
    [AUTH_LOGOUT]: ({ commit, dispatch }) => {
        return new Promise((resolve, reject) => {
            commit(AUTH_LOGOUT);
            localStorage.removeItem('user-token');
            delete axios.defaults.headers.common['Authorization'];
            resolve();
        })
    }
}

const mutations = {
    [AUTH_LOGIN]: (state) => {
        state.status = 'loading';
    },
    [AUTH_LOGOUT]: (state) => {
        state.status = '';
    },
    [AUTH_SUCCESS]: (state, token) => {
        state.status = 'success';
        state.token = token;
    },
    [AUTH_ERROR]: (state) => {
        state.status = 'error';
    },
}

export default {
    state,
    getters,
    actions,
    mutations
}