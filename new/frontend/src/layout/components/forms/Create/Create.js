import React, { useEffect, useState } from "react";
import axios from "axios";
import './Create.css';
import { useForm } from "react-hook-form";

var cors = require('cors');

function App() {
    
    

    const { register, handleSubmit } = useForm({ shouldUseNativeValidation: true });

    const [data, setData] = useState({});
    const [post, setPost] = useState(null);



    const baseURL = "http://localhost:8000/api/products/create";
    const allURL = "http://localhost:8000/api/products/all";
    useEffect(() => {setData(data); 
     })


    
    const onSubmit = (data) => { setData(data);
          

          
            ////create via GET
          //const baseURI = `?msg=test&name="${data.name}"&desc=${data.desc}`;

          

          axios.post(baseURL, data).then(response => console.log(response)).then((recurse) => setPost(recurse))
           };

    //if (!onSubmit) return null;

    return (
      <>

        <h4 className="blue"> Adicionado: </h4>
        <h1 className="blue">{data.name}</h1>
        <h4 className="blue"> Descrição: {data.desc} </h4>
        <form onSubmit={handleSubmit(onSubmit)}>
      <input
        {...register("name", { required: "Please enter your first name." })} 
      />

            <input
        {...register("desc", { required: "Please enter your description." })} 
      />

      <input type="submit"  />

    </form>
       
      </>
    );
  }
  
  export default App;