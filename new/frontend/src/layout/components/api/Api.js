import React, { useEffect, useState } from "react";
import axios from "axios";
import cors from "cors";

function App() {
    const baseURL = "http://localhost:8000/";


    const [post, setPost] = useState(null);

    useEffect(() => {
      axios.get(baseURL, cors()).then((response) => {
        setPost(response.data);
      }).then((data) => console.log(data))
    }, []);

    console.log(post);
  
    if (!post) return null;

    return (
      <>
        <h1>{post.title}</h1>
      <p>{post.msg}</p>
      </>
    );
  }
  
  export default App;