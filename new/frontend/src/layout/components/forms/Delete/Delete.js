import React, { useEffect, useState } from "react";
import axios from "axios";
import './Delete.css';
import { useForm } from "react-hook-form";


function App() {
    
    

  

    const [data, setData] = useState({});


    const baseURL = "http://localhost:8000/api/delete-all-products";
  

    const onSubmit = (data) => { setData(data);
          
          console.log(data);
          
            ////create via GET
          //const baseURI = `?msg=test&name="${data.name}"&desc=${data.desc}`;


          axios.get(baseURL).then(response => console.log(response)); 
          window.location.reload(); 
        };

    //if (!onSubmit) return null;

    return (
      <>
      
      <button className="btn btn-danger" onClick={() => onSubmit()}> Deletar todos </button>
       
      </>
    );
  }
  
  export default App;