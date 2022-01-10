import React, { useEffect, useState } from "react";
import axios from "axios";
import './Create.css';
import { useForm } from "react-hook-form";

var cors = require('cors');

function App() {
    
    

    const { register, handleSubmit } = useForm({ shouldUseNativeValidation: true });

    const [data, setData] = useState('');
    const [post, setPost] = useState({});
    const [list, setList] = useState([]);



    const baseURL = "http://localhost:8000/api/products/create";
    const allURL = "http://localhost:8000/api/products/all";
    const deleteURL = "http://localhost:8000/api/products/";




  useEffect(() => {
    update()
  }, []);

    useEffect(() => {
      console.log("O que está vindo no data...")
      console.log(data);
      const object = JSON.parse(data|| "[]");
      setList(object.data);
  
     }, [data])

     useEffect(() => {
      jsonToArray();
      console.log("O que está vindo no list...");
      console.log(list);
     }, [list]);


     function jsonToArray() {

        list && list.map(function(obj) {
        return Object.keys(obj).map(function(key) {
            return obj[key];
        });
    });
     }

    function update() {
      console.log("Banco de dados conectado ao Front-End. API retornando dados:")
      const response = axios.get(allURL)
      .then(response => JSON.stringify(response))
      .then(query => setData(query));

    return response;
    }


    
    function APIDelete(postID){
      console.log(postID)
      axios.delete(deleteURL+''+postID).then((response) => console.log(response));
      update()
  }
    
    const onSubmit = (data) => { 
            update() 
            ////create via GET
          //const baseURI = `?msg=test&name="${data.name}"&desc=${data.desc}`;

          axios.post(baseURL, data).then((recurse) => setPost(recurse))
       
           };
    return (
      <>

        <h4 className="blue"> Adicionado: </h4>
        <h1 className="blue">{data.name}</h1>
        <h4 className="blue"> Descrição: {data.desc} </h4>

        <form className="form-inline d-flex col-8 mx-auto" onSubmit={handleSubmit(onSubmit)}>

        <label for="staticEmail2" class="sr-only"><h4>Nome: </h4> </label>
      <input className="form-control"
        {...register("name", { required: "Especifique o nome do produto." })} 
      /> 
 <label for="staticEmail2" class="sr-only"><h4>Desc: </h4> </label>
            <input className="form-control"
        {...register("desc", { required: "Coloque a descrição." })} 
      />

      <input type="submit" class="btn btn-dark"  />

    </form>
       

      



    <div className=" d-flex col-8 m-auto">

<table className="table table-hover">
            <thead>
                <tr>
                    <th className="text-center">ID</th>
                    <th className="text-center">Name</th>
                    <th className="text-center">Desc</th>
                    <th className="text-center"></th>
                </tr>
            </thead>

            <tbody>
        {
  list &&
      list.map(l => (
              <tr key={l.id}>
              <td>{l.id}</td>
              <td>{l.name}</td>
              <td>{l.desc}</td>
              <td>

              <button className="btn btn-danger" onClick={() => APIDelete(l.id)}>
                            X </button>
              </td>
           
          </tr> ))}
    

          </tbody>

          </table>

          </div>




      </>
    );
  }
  
  export default App;