import axios from "axios";
import React, { useEffect, useState } from "react";
import { baseURL } from '../config';

const BlogContextData = React.createContext();
const client = axios.create({baseURL});

const BlogContext = ({children}) => {
    const [blogs, setBlogs] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(()=>{
        const getBlogs = async ()=>
        {
            const responce = await client.get('/api/blogs');
            setBlogs(responce.data.data[0]);
            setLoading(false);
            
        }
        getBlogs();
    },[]);

    return (
        <BlogContextData.Provider value={{blogs, loading}}>
            {children}
        </BlogContextData.Provider>
    );
}

export { BlogContext, BlogContextData};
