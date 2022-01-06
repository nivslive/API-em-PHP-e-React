import axios from 'axios';
import env from './Env.js';


const api = axios.create({
    baseURL: env.BASE_URL
});

export default api;