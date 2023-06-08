import React, { useContext } from 'react';
import { useParams } from 'react-router-dom';
import { BlogContextData } from '../../contexts/BlogContext';
import ReactMarkdown from 'react-markdown';
import rehypeRaw from 'rehype-raw';
import emojione from 'emojione';

const BlogEdit = () => {
    const {id} = useParams();
    const {blogs, loading} = useContext(BlogContextData);

    const blog = blogs.find(blog => blog.id === +id);
    const emojified = loading? "" : emojione.shortnameToImage(blog.main_text);
    return (
        <div className='blogPage'>
            <h1>{!loading && blog.title}</h1>
            {!loading && <img src={blog.blog_files_data[0].file_url} alt="" width="100%" height="400px"/>}
            {!loading && <ReactMarkdown rehypePlugins={[rehypeRaw]}>{emojified}</ReactMarkdown>}
        </div>
    );
}

export default BlogEdit;
