import axios from "axios";

const api = axios.create({
  baseURL: "https://api.github.com",
});

api.defaults.headers.authorization = `Bearer ${token}`;


export default api;