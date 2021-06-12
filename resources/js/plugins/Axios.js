import axios from 'axios'

export default (Vue, options) => {
    Vue.$axios = Vue.prototype.$axios = axios.create(options);
};