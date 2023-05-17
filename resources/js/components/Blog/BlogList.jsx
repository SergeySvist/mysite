import React, { useContext, useEffect, useState } from 'react';
import { baseURL } from '../../config';
import Blog from './Blog';
import { BlogContextData } from '../../contexts/BlogContext';

const client = axios.create({baseURL});

const BlogList = () => {
    const {blogs} = useContext(BlogContextData);

    return (
        <div className='blogList'>
            <div className="header">
                <div className="search-container">
                    <input className='search' type="text" placeholder='Search by blog name or tag...'/>
                    <button className='btn btn-dark'><i class="bi bi-search"></i></button>
                </div>
            </div>
            <div className="list">
                {blogs.map(blog=><Blog blog={blog} key={blog.id}></Blog>)}
            </div>
        </div>
    );
}

export default BlogList;
