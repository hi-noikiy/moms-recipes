import { AUTH_LOGIN, AUTH_LOGOUT, AUTH_SUCCESS, AUTH_ERROR, USER_REQUEST } from '~/store/mutation-types'

const state = {
    token: localStorage.getItem('user-token') || '',
    status: '',
    name: localStorage.getItem('user-name') || '',
    email: localStorage.getItem('user-email') || '',
    id: localStorage.getItem('user-id') || null,
}

const getters = {
    isAuthenticated: state => !!state.token,
    authStatus: state => state.status,
}

const actions = {
    [AUTH_LOGIN]: ({ commit, dispatch }, user) => {
        return new Promise((resolve, reject) => {
            commit(AUTH_LOGIN);

            axios({url: 'api/login', data: {...user, grant_type: 'password'}, method: 'POST'})
                .then(response => {
                    const token = response.data.access_token;
                    localStorage.setItem('user-token', token);
                    axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
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
            localStorage.removeItem('user-name');
            localStorage.removeItem('user-email');
            localStorage.removeItem('user-id');
            delete axios.defaults.headers.common['Authorization'];
            resolve();
        })
    },
    [USER_REQUEST]: ({ commit }) => {
        axios({ url: 'api/user', method: 'GET' })
            .then(response => {
                const user = response.data;
                localStorage.setItem('user-name', user.name);
                localStorage.setItem('user-email', user.email);
                localStorage.setItem('user-id', user.id);
                commit(USER_REQUEST, user);
            })
            .catch(err => {
                console.log(err);
            })
    }
}

const mutations = {
    [AUTH_LOGIN]: (state) => {
        state.status = 'loading';
    },
    [AUTH_LOGOUT]: (state) => {
        state.status = 'guest';
        state.token = '';
        state.name = '';
        state.email = '';
        state.id = null;
    },
    [AUTH_SUCCESS]: (state, token) => {
        state.status = 'success';
        state.token = token;
    },
    [AUTH_ERROR]: (state) => {
        state.status = 'error';
    },
    [USER_REQUEST]: (state, user) => {
        state.name = user.name;
        state.email = user.email;
        state.id = user.id;
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}