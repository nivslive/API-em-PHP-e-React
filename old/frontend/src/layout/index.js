import React, { useEffect, useState } from "react";
import api from "./services/api";
import env from './Env.js';

export default function App() {
  const [user, setUser] = useState();

  useEffect(() => {
    api
      .get(env.BASE_URL+"/api/")
      .then((response) => setUser(response.data))
      .catch((err) => {
        console.error("ops! ocorreu um erro" + err);
      });
  }, []);



  return (
    <div className="App">
      <p>Usuário: {user?.login}</p>
      <p>Biografia: {user?.bio}</p>
    </div>
  );
}