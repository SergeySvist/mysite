import axios from "axios";
import React, { useContext, useEffect, useState } from "react";
import { baseURL } from '../config';
import { AuthContextData } from "./AuthContext";
import { useNavigate } from "react-router-dom";

const BlogContextData = React.createContext();
const client = axios.create({baseURL});

const BlogContext = ({children}) => {
    const {token, login, logout} = useContext(AuthContextData);
    const [blogs, setBlogs] = useState([]);
    const [loading, setLoading] = useState(true);
    const navigate = useNavigate();

    useEffect(()=>{
        const getBlogs = async ()=>
        {
            const responce = await client.get('/api/blogs');
            setBlogs(responce.data.data[0]);
            setLoading(false);
        }
        getBlogs();
    },[]);

    const createBlog = async (blog)=>
    {
        const formData = new FormData();
        formData.append('title', blog.title);
        formData.append('main_text', blog.main_text);
        formData.append('avatar', blog.avatar);
        
        const resp = await client.post("/api/blogs", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
            "x-rapidapi-host": "file-upload8.p.rapidapi.com",
            "x-rapidapi-key": "your-rapidapi-key-here",
            'Authorization':`Bearer ${token}`,
          },
          params: {lang: "en"},
        });

        console.log(resp);
        setBlogs([...blogs, resp.data.data[0]]);
        return navigate("/blogs");
    }

    const updateBlog = async (blog)=>
    {
        const formData = new FormData();
        formData.append('title', blog.title);
        formData.append('main_text', blog.main_text);
        blog.avatar && formData.append('avatar', blog.avatar);
        
        const resp = await client.post(`/api/blogs/${blog.id}`, formData, {
          headers: {
            "Content-Type": "multipart/form-data",
            "x-rapidapi-host": "file-upload8.p.rapidapi.com",
            "x-rapidapi-key": "your-rapidapi-key-here",
            'Authorization':`Bearer ${token}`,
          },
          params: {lang: "en", _method: "PATCH"},
        });

        console.log(resp);
        setBlogs(blogs.map(f => f.id === resp.data.data[0].id ? {...resp.data.data[0]} : f));
        return navigate("/blogs");
    }
    
    const deleteBlog = async (id)=>
    {
        const resp = await client.delete(`/api/blogs/${id}`, {headers: {'Authorization':`Bearer ${token}`}});
        setBlogs(blogs.filter(blog => blog.id !== resp.data.data[0]));
        console.log(resp);
        return navigate("/blogs");
    }

    return (
        <BlogContextData.Provider value={{blogs, handlers: {createBlog, updateBlog, deleteBlog}, loading}}>
            {children}
        </BlogContextData.Provider>
    );
}

export { BlogContext, BlogContextData};
