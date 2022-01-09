import React, { useEffect, useState } from "react";
import axios from "axios";
import './Show.css';
import { useForm } from "react-hook-form";
import cors from "cors";


function App(props) {
    


  const baseURL = "http://localhost:8000/api/products/all";

  const deleteURL = "http://localhost:8000/api/products/";

      const [posts, setPosts] = useState([]);

    useEffect(() => {
        axios.get(baseURL).then(result => {
            setPosts(result.data);
        })
    }, []);




    function APIDelete(postID){
        console.log(postID)
        axios.delete(deleteURL+''+postID).then((response) => console.log(response));
    }

   

    


    if (!posts) return null;



    return (
      <>

      <table className="table">
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


                    posts.map(post => (

                        <tr key={post.id}>
                            <td>{post.id}</td>
                            <td>{post.name}</td>
                            <td>{post.desc}</td>
                            <td>


                            <button onClick={() => APIDelete(post.id)}>
                            Deletar </button>


                   

                            </td>
                         
                        </tr>
                    ))
                }
  
          </tbody>

    </table>
      </>



    );
  }
  
  export default App;