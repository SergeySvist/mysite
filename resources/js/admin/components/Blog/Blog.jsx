import React from 'react';
import { NavLink, Outlet } from 'react-router-dom';

const Blog = ({blog}) => {
    return (
        <div className='list-item'>
            <NavLink to={`/blogs/${blog.id}`} key={blog.id}>
                <img src={blog.blog_files_data[0].file_url} alt="" width="100%" height="80%"/>
                <p>{blog.title}</p>
            </NavLink>
        </div>
    );
}

export default Blog;
