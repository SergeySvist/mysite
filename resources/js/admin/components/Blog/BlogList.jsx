import React, { useContext, useEffect, useState } from 'react';
import Blog from './Blog';
import { BlogContextData } from '../../contexts/BlogContext';
import { NavLink } from 'react-router-dom';



const BlogList = () => {
    const {blogs, loading} = useContext(BlogContextData);

    return (
        <div className='blogList'>
            <div className="header">
                <div className="search-container">
                    <input className='search' type="text" placeholder='Search by blog name or tag...'/>
                    <button className='btn search-button btn-dark'><i class="bi bi-search"></i></button>
                    <NavLink className="btn button btn-dark" to={`/blogs/create`}>Add blog</NavLink>
                </div>
            </div>
            <div className="list">
                {blogs.map(blog=><Blog blog={blog} key={blog.id}></Blog>)}
            </div>
        </div>
    );
}

export default BlogList;
